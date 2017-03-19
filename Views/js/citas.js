$(document).ready(function(){

});
function Verificar(){
	nombre = document.getElementById('Nombres').value;
	AParterno = document.getElementById('ApellidoP').value;
	AMaterno = document.getElementById('ApellidoM').value;
	telefono = document.getElementById('Celular').value;
	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		Mensaje();
	 	return false;
	}else if (AParterno == null || AParterno.length == 0 || /^\s+$/.test(AParterno) ) {
		Mensaje();
		return false;
	}else if (AMaterno == null || AMaterno.length == 0 || /^\s+$/.test(AMaterno) ) {
		Mensaje();
		return false;
	}else if (telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) || isNaN(telefono) || telefono.length > 10) {
		Mensaje();
		return false;
	}
	return true;
}
function Mensaje(){
	document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
		"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
        "<strong>Error:</strong> Verifica tus datos.</div>";
}
//Agregar verificacion de limites de caracteres que soporta la bd
//checar expresiones regulares en javascript
//verificar y cerrar las conexiones despues de las consultas a las bd
