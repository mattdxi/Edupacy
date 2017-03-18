$(document).ready(function(){

});
function Verificar(){
	nombre = document.getElementById('Nombres').value;
	AParterno = document.getElementById('ApellidoP').value;
	AMaterno = document.getElementById('ApellidoM').value;
	telefono = document.getElementById('Celular').value;
	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>"+
		"<a href='#' class='close' data-dismiss='alert'>&times;</a>"+
        "<strong>Error:</strong> Verifica tus datos.</div>";
	  return false;
	}else if (AParterno == null || AParterno.length == 0 || /^\s+$/.test(AParterno) ) {
		return false;
	}else if (AMaterno == null || AMaterno.length == 0 || /^\s+$/.test(AMaterno) ) {
		return false;
	}else if (telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) ) {
		return false;
	}
	return true;
}