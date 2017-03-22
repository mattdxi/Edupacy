$(document).ready(function(){
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
            error: function(xhr, ajaxOptions, thrownError)
            {
                console.log(xhr);
                console.log(ajaxOptions);
                console.log(thrownError);
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
function Atender(id_cita_){
  $.ajax({
      data: {
        id_cita : id_cita_,
        Opcion : 3
      },
      url:   './Controllers/citas_controller.php',
      type:  'POST',
      beforeSend: function ()
      {
        $('.btn').prop('disabled', true);
      },
      success:  function (r)
      {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
          "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
              "<strong>Exito!:</strong> Operacion Exitosa</div>";
        setTimeout(function () {
          location.reload(true);
        }, 1000); ///despues de 3 seg*/
      },
      error: function()
      {
        Mensaje("Ocurrio un error al conectar con el servidor Porfavor intentelo mas tarde ");
        $('.btn').prop('disabled', false);
      }
  });
}
function Cancelar(id_cita_){
  $('html, body').animate({ scrollTop: 0 }, 'slow');
  document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
    "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
        "<p><strong>Alerta!:</strong> ¿Desea cancelar su cita?</p>"+
        "<p><button id='ConfiCancelar' type='button' class='btn btn-danger'>Si</button>"+
        "<button type='button' class='btn btn-info' data-dismiss='alert'>No</button></p></div>";
        $("#ConfiCancelar").click(function(){
          var op = 2;
          $.ajax({
              data: {
                id_cita : id_cita_,
                Opcion : op
              },
              url:   './Controllers/citas_controller.php',
              type:  'POST',
              dataType: 'json',
              beforeSend: function ()
              {
                $('.btn').prop('disabled', true);
              },
              success:  function (r)
              {
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                document.getElementById("mensaje").innerHTML = "<div class='alert alert-success'>"+
                  "<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
                      "<strong>Exito!:</strong> Cita cancelada correctamente :)</div>";
                setTimeout(function () {
                  location.reload(true);
                }, 1000); ///despues de 3 seg
              },
              error: function()
              {
                $('.btn').prop('disabled', false);
                Mensaje("Ocurrio un error al cancelar la cita, Porfavor intentelo mas tarde");
              }
          });
        });
}
function Fecha() {
  var fecha = document.getElementById('fecha').value;
  window.location.replace("./index.php?Opcion=Inicio&Op=Citas&fecha="+fecha);
}
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
