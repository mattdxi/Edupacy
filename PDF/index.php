<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
  // Cabecera de página
  function Header()
  {
      // Logo
      $this->Image('./logo.jpg',10,8,33);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Movernos a la derecha
      $this->Cell(80);
      // Título
      $this->Cell(50,10,'Registro Civil',1,0,'C');
      // Salto de línea
      $this->Ln(20);
      // folio
      $this->SetTextColor('255','0','0');
      $this->Cell(50,7,"Folio:".$_GET['id_cita'],1,1,'R');
      $this->Ln(20);
  }

  // Pie de página
  function Footer()
  {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Número de página
      $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
  }
  function ImprovedTable($header, $data, $req)
  {
      // Anchuras de las columnas
      $w = array(55, 40, 45, 25);
      $num = count($header);
      // Cabeceras
      for($i=0;$i<$num;$i++){
          $this->Cell($w[$i],7,$header[$i],1,0,'C');
      }
      $this->Ln();
      $this->Cell($w[0],6,$data[0]['tramite'],'LR');
      $this->Cell($w[1],6,$data[0]['nombres'],'LR');
      $this->Cell($w[2],6,$data[0]['apellidos'],'LR');
      $this->Cell($w[3],6,$data[0]['telefono'],'LR');
      $this->Ln();
      // Línea de cierre
      $this->Cell(array_sum($w),0,'','T');
      $this->Ln(50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,'Requisitos:',0,1);
      $this->SetFont('Times','',12);
      $this->Ln(2);
      for($i=0;$i<count($req);$i++)
        $this->Cell(0,10,'*'.$req[$i]['Descripcion'],0,1);
  }
}
//
$id_cita = $_GET['id_cita'];
//comprobacion de llamado
if(!empty($id_cita)) {
  require_once("./pdf_model.php");
  $cita = new cita_model();
  $datos = $cita->get_cita($id_cita);
  $id_tra = $cita->get_id_tramite();
  $header = array('Tramite', 'Nombres','Apellidos','Telefonos');
  $req = $cita->get_requisitos($id_tra);
  // Creación del objeto de la clase heredada
  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Times','B',12);
  $pdf->SetX(135);
  $pdf->MultiCell(40,6,"Fecha:".$datos[0]['fecha']."\n Hora:".$datos[0]['hora'],'','R');
  $pdf->SetFont('Times','',12);
  $pdf->ImprovedTable($header,$datos,$req);
  $pdf->Output();
}else {
  exit("Ninguna cita expecificada");
}

?>
