$(document).ready(function(){
  //manejo del boton modificar de consulta view en consultar
  /*if (document.getElementById('id_cita') != null) {
    var id_cita_ = document.getElementById('id_cita').value;
    var horarios = $("#slt-horarios");
    var op = 4;
    $.ajax({
        data: {
          id_cita : id_cita_,
          Opcion : op
        },
        url:   './Controller/cita_controller.php',
        type:  'POST',
        dataType: 'json',
        beforeSend: function ()
        {
        },
        success:  function (r)
        {
          $("#Cambiar").prop('disabled', false);
          $("#slt-horarios").prop('disabled', true);
          $("#Reservar").prop('disabled', true);
          $('#Registro').prop('disabled',true);
          $("#datepicker").datepicker("disable");
          document.getElementById('Nombres').value=r[0]['nombres'];
          document.getElementById('Apellidos').value=r[0]['apellidos'];
          document.getElementById('Celular').value=r[0]['telefono'];

          horarios.append('<option value="' + r[0]['hora'] + '">' +r[0]['hora']+ '</option>');
        },
        error: function()
        {
          Mensaje("Ocurrio un error al obtener los datos de la cita, Porfavor intentelo mas tarde");
        }
    });
  }else {
    //dejamos todo por default
    $("#slt-horarios").prop('disabled', true);
    $("#Reservar").prop('disabled', true);
    $("#Cambiar").prop('disabled', true);
    $('#Registro').prop('disabled',true);
  }*/
  //Manejo del boton ingresar del login
  if (document.getElementById('bt-login') != null) {
    $("#bt-login").click(function(){
      var Rfc_ = document.getElementById('rfc').value;
      var pass = document.getElementById('pass').value;
      if (Verificar()) {
        $.ajax({
            data: {
              Rfc : Rfc_,
              Pass : pass
            },
            url:   './Controllers/login_controller.php',
            type:  'POST',
            dataType: 'json',
            beforeSend: function ()
            {
            },
            success:  function (r)
            {
              $('html, body').animate({ scrollTop: 0 }, 'slow');
              document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
                "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
                    "<strong>Exito!:</strong> Datos correctos :) Redireccionando . . .</div>";
              setTimeout(function () {
                window.location.replace("./index.php?Opcion=Inicio");
              }, 2000); ///despues de 3 seg*/
            },
            error: function()
            {
              Mensaje("Ocurrio un error al conectar con el servidor Porfavor intentelo mas tarde ");
            }
        });
      }
    });
  }
  if (document.getElementById('bt-Salir') != null) {
    $("#bt-Salir").click(function(){
      $.ajax({
          data: {
            Salir : 'Si'
          },
          url:   './Controllers/login_controller.php',
          type:  'POST',
          beforeSend: function ()
          {
          },
          success:  function (r)
          {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
              "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
                  "<strong>Exito!:</strong> Sesion cerrada :) Redireccionando . . .</div>";
            setTimeout(function () {
              window.location.replace("./index.php");
            }, 2000); ///despues de 3 seg*/
          },
          error: function()
          {
            Mensaje("Ocurrio un error al conectar con el servidor Porfavor intentelo mas tarde ");
          }
      });
    });
  }
});
  /*$("#Registro").click(function(){
    if(Verificar()){
      var op = 2;
      var id_cita_ = document.getElementById('id_cita').value;
      var nombres_ = document.getElementById('Nombres').value;
      var apellidos_ = document.getElementById('Apellidos').value;
      var telefonos_ = document.getElementById('Celular').value;
      $.ajax({
          data: {
            nombres : nombres_,
            apellidos : apellidos_,
            telefonos : telefonos_,
            Opcion : op,
            id_cita : id_cita_
          },
          url:   './Controller/cita_controller.php',
          type:  'POST',
          dataType: 'json',
          beforeSend: function ()
          {
            $('#Registro').prop('disabled',true);
            $("#Cambiar").prop('disabled', true);
          },
          success:  function (r)
          {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
        			"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
        	        "<strong>Exito!:</strong> Cita agendada correctamente :) Redireccionando . . .</div>";
            setTimeout(function () {
              window.location.replace("./index.php?Opcion=Consulta&id_cita="+ document.getElementById('id_cita').value);
            }, 3000); ///despues de 3 seg
          },
          error: function()
          {
            Mensaje("Ocurrio un error al agendar su cita, Porfavor intentelo mas tarde");
            $('#Registro').prop('disabled',false);
            $("#Cambiar").prop('disabled', false);
          }
      });
    }
  });*/
function Verificar(){
	var Rfc = document.getElementById('rfc').value;
	var pass = document.getElementById('pass').value;
	if( Rfc == null || Rfc.length == 0 || /^\s+$/.test(Rfc)) {
		Mensaje("");
	 	return false;
	}else if (pass == null || pass.length == 0 || /^\s+$/.test(pass) ) {
		Mensaje("");
		return false;
	}
	if (Rfc.length > 13) {
		Mensaje(" R.F.C. Invalido");
		return false;
	}
	if ((pass.length) > 20) {
		Mensaje("Contraseña demasiado larga");
		return false;
	}
	return true;
}
function Mensaje(Msj){
	if (Msj.length == 0) {
		document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
			"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
	        "<strong>Error:</strong> Verifica tus datos.</div>";
	}else {
		document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
			"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
	        "<strong>Error:</strong> "+Msj+"</div>";
	}
  $('html, body').animate({ scrollTop: 0 }, 'slow');
}
