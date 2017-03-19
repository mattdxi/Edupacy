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
  $("#Registro").click(function(){
    Verificar();
  });
  $("#slt-horarios").prop('disabled', true);
  $("#Reservar").prop('disabled', true);
  $("#Cambiar").prop('disabled', true);
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
        $("#Reservar").prop('disabled', true);
        $("#Cambiar").prop('disabled', true);
        $("#datepicker").datepicker("enable");
        $("#slt-horarios").find('option').remove();
        $("#slt-horarios").prop('disabled', true);
    });
});

function Verificar(){
	nombre = document.getElementById('Nombres').value;
	AParterno = document.getElementById('ApellidoP').value;
	AMaterno = document.getElementById('ApellidoM').value;
	telefono = document.getElementById('Celular').value;
	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
		Mensaje("");
	 	return false;
	}else if (AParterno == null || AParterno.length == 0 || /^\s+$/.test(AParterno) ) {
		Mensaje("");
		return false;
	}else if (AMaterno == null || AMaterno.length == 0 || /^\s+$/.test(AMaterno) ) {
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
	if ((AParterno.length + AMaterno.length) > 30) {
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
    alert("Tiene 2 min para completar el formulario");
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
//Agregar verificacion de limites de caracteres que soporta la bd
//checar expresiones regulares en javascript
//verificar y cerrar las conexiones despues de las consultas a las bd
