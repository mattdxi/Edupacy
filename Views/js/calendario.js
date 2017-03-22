now = new Date();
MaxDia="+2D";
if (now.getDay() == 4 || now.getDay() == 5) {
  MaxDia = "+4D";
}
$(function() {
  $( "#datepicker" ).datepicker({
    minDate: +1,
    maxDate: MaxDia,
    beforeShowDay: $.datepicker.noWeekends,
    dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
    monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ]
  });
});
$(document).ready(function(){
  //manejo del boton modificar de consulta view en consultar
  if (document.getElementById('id_cita') != null) {
    var id_cita_ = document.getElementById('id_cita').value;
    var horarios = $("#slt-horarios");
    var op = 4;
    if(id_cita.length > 0){
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
          error: function(eR, textStatus, errorThrown)
          {
            Mensaje("Ocurrio un error al obtener los datos de la cita, Porfavor intentelo mas tarde");
          }
      });
    }
  }else {
    //dejamos todo por default
    $("#slt-horarios").prop('disabled', true);
    $("#Reservar").prop('disabled', true);
    $("#Cambiar").prop('disabled', true);
    $('#Registro').prop('disabled',true);
  }
  //Manejo del boton cancelar de la consulta view
  if (document.getElementById('cancelar') != null) {
    $("#cancelar").click(function(){
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
        "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
            "<p><strong>Alerta!:</strong> ¿Desea cancelar su cita?</p>"+
            "<p><button id='ConfiCancelar' type='button' class='btn btn-danger'>Si</button>"+
            "<button type='button' class='btn btn-info' data-dismiss='alert'>No</button></p></div>";
            $("#ConfiCancelar").click(function(){
              var id_ = document.getElementById('folio').value;
              var op = 5;
              $.ajax({
                  data: {
                    id_cita : id_,
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
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
                			"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
                	        "<strong>Exito!:</strong> Cita cancelada correctamente :) Redireccionando . . .</div>";
                    setTimeout(function () {
                      window.location.replace("./index.php");
                    }, 3000); ///despues de 3 seg
                  },
                  error: function()
                  {
                    Mensaje("Ocurrio un error al cancelar la cita, Porfavor intentelo mas tarde");
                  }
              });
            });
    });
  }
  $("#Registro").click(function(){
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
  });
    // Hacemos la lógica que cuando nuestro calendario cambie de valor haga algo
    $("#datepicker").change(function(){
        // Guardamos el select de cursos
        var horarios = $("#slt-horarios");
        // Guardamos el select de alumnos
        var id_tramite = document.getElementById('id_tramite').value;
        var cal = $.datepicker.formatDate( "yy-mm-dd", $( "#datepicker" ).datepicker( "getDate" ) );//$(this);
       if(cal != '' && id_tramite !=''){
            $.ajax({
                data: {
                  fecha : cal,
                  id : id_tramite
                },
                url:   './Controller/hora_controller.php',
                type:  'POST',
                dataType: 'json',
                beforeSend: function ()
                {
                },
                success:  function (r)
                {
                    // Limpiamos el select
                    horarios.find('option').remove();
                    $(r).each(function(i, v){ // indice, valor
                        horarios.append('<option value="' + v + '">' + v+ '</option>');
                    })
                    horarios.prop('disabled', false);
                    $("#Reservar").prop('disabled', false);
                },
                error: function()
                {
                  Mensaje("Ocurrio un error al obtener el horario, Porfavor intentelo mas tarde");
                }
            });
        }
        else
        {
            horarios.find('option').remove();
            horarios.prop('disabled', true);
        }
    });

    // Hacemos la lógica que cuando nuestro boton sea seleccionado funcione
    $("#Reservar").click(function(){
        var horarios = $("#slt-horarios");
        var hora2 = $("#slt-horarios").val();
        var Op = 1;
        var Op2 = document.getElementById('op');
        var id_tramite2 = document.getElementById('id_tramite').value;
        var id_cita2 = document.getElementById('id_cita').value;
        var cal = $.datepicker.formatDate( "yy-mm-dd", $( "#datepicker" ).datepicker( "getDate" ) );
        if (Op2.value == 6) {
          Op2.value="";
          if(cal != '' && hora2 != '' && id_cita2 !=''){
              $.ajax({
                  data: {
                    fecha : cal,
                    id_cita : id_cita2,
                    hora : hora2,
                    Opcion : 6
                  },
                  url:   './Controller/cita_controller.php',
                  type:  'POST',
                  dataType: 'json',
                  beforeSend: function ()
                  {
                  },
                  success:  function (r)
                  {
                    Verificar_Respuesta(r);
                    $('#Registro').prop('disabled',false);
                  },
                  error: function()
                  {
                    Mensaje("Ocurrio un error al conectar con el servidor, Porfavor intentelo mas tarde");
                  }
              });

          }
          else
          {
              horarios.find('option').remove();
              horarios.prop('disabled', true);
          }
        }else{
          if(cal != '' && id_tramite2 !='' && hora2 != ''){
              $.ajax({
                  data: {
                    fecha : cal,
                    id_tramite : id_tramite2,
                    hora : hora2,
                    Opcion : Op
                  },
                  url:   './Controller/cita_controller.php',
                  type:  'POST',
                  dataType: 'json',
                  beforeSend: function ()
                  {
                  },
                  success:  function (r)
                  {
                    Verificar_Respuesta(r);
                  },
                  error: function()
                  {
                    Mensaje("Ocurrio un error al conectar con el servidor, Porfavor intentelo mas tarde");
                  }
              });

          }
          else
          {
              horarios.find('option').remove();
              horarios.prop('disabled', true);
          }
        }
    });
    $("#Cambiar").click(function(){
        $('#op').val(6);
        cancelar();
        $("#Reservar").prop('disabled', true);
        $("#Cambiar").prop('disabled', true);
        $("#datepicker").datepicker("enable");
        $("#slt-horarios").find('option').remove();
        $("#slt-horarios").prop('disabled', true);
    });
});

function Verificar(){
	nombre = document.getElementById('Nombres').value;
	Apellidos = document.getElementById('Apellidos').value;
	telefono = document.getElementById('Celular').value;
	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
		Mensaje("");
	 	return false;
	}else if (Apellidos == null || Apellidos.length == 0 || /^\s+$/.test(Apellidos) ) {
		Mensaje("");
		return false;
	}else if (telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) || isNaN(telefono)) {
		Mensaje("");
		return false;
	}
	if (nombre.length > 50) {
		Mensaje("Nombres demasiados largos");
		return false;
	}
	if ((Apellidos.length) > 30) {
		Mensaje("Apellidos demasiados largos");
		return false;
	}
	if (telefono.length > 10) {
		Mensaje("El numero de telefono debe contener solo 10 digitos");
		return false;
	}else if (telefono.length < 10) {
		Mensaje("El numero de telefono debe conterner al menos 10 digitos")
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
function Verificar_Respuesta(R){
  r = R;
  if (r['estado'] == 1) {
    $("#id_cita").val(r['id_cita']);
    apagar();
    $("#Cambiar").prop('disabled', false);
    $("#Reservar").prop('disabled', true);
    $("#slt-horarios").prop('disabled', true);
    $("#datepicker").datepicker("disable");
  }else if (r['estado'] == 0) {
    Mensaje("Horario ya ocupado por otro usuario, Porfavor intentelo con otra hora");
    $("#slt-horarios").find('option').remove();
    $("#slt-horarios").prop('disabled', true);
  }
}
var t;
var min = 120;
var d=new Date();
function interval(){
    t=1;
    contador = setInterval(function(){
        document.getElementById("testdiv").innerHTML=minutos(min-t++) +" restante";
    },1000,"JavaScript");
}
var timout;
function apagar(){
  $('html, body').animate({ scrollTop: 0 }, 'slow');
  document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
    "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
        "<strong>Exito!:</strong> Tiene 2 min para Completar su cita</div>";
        interval();
    timout=setTimeout(function(){
        Mensaje("Cita no completada")
        var id_ = document.getElementById('id_cita').value;
        var op = 5;
        $.ajax({
            data: {
              id_cita : id_,
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
              $('html, body').animate({ scrollTop: 0 }, 'slow');
              document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
                "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
                    "<strong>Exito!:</strong> Cita cancelada por favor intentelo nuevamente</div>";
            },
            error: function()
            {
              Mensaje("Ocurrio un error al cancelar la cita, Porfavor intentelo mas tarde");
            }
        });
        location.reload();
    },120000,"JavaScript");
}
function cancelar(){
    clearTimeout(timout);
    clearInterval(contador);
    document.getElementById("testdiv").innerHTML="Seleccione otra fecha y horario";
}
function minutos(time){
  var minutes = Math.floor( (time % 3600) / 60 );
  var seconds = time % 60;

  //Anteponiendo un 0 a los minutos si son menos de 10
  minutes = minutes < 10 ? '0' + minutes : minutes;

  //Anteponiendo un 0 a los segundos si son menos de 10
  seconds = seconds < 10 ? '0' + seconds : seconds;

  return result = minutes + ":" + seconds;
}
//Agregar verificacion de limites de caracteres que soporta la bd
//checar expresiones regulares en javascript
//verificar y cerrar las conexiones despues de las consultas a las bd
