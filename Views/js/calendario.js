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
function imprimir(){
  document.getElementById('msj').innerHTML=$.datepicker.formatDate( "yy-mm-dd", $( "#datepicker" ).datepicker( "getDate" ) );
}
$(document).ready(function(){
  // Bloqueamos el SELECT de los cursos
  $("#slt-horarios").prop('disabled', true);

//codigo alternativo para el change function del datepicker
  /*$(".datepicker").datepicker({
    onSelect: function(dateText) {
      //display("Selected date: " + dateText + "; input's current value: " + this.value);
      var horarios = $("#slt-horarios");
      var cal = dateText;
      alert(cal);
    }
  });*/


    // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
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
                    //alumnos.prop('disabled', true);
                },
                success:  function (r)
                {
                    //alumnos.prop('disabled', false);

                    // Limpiamos el select
                    horarios.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        horarios.append('<option value="' + v + '">' + v+ '</option>');
                    })

                    horarios.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error al obtener el horario, Porfavor intentelo mas tardes');
                    //alumnos.prop('disabled', false);
                }
            });
        }
        else
        {
            horarios.find('option').remove();
            horarios.prop('disabled', true);
        }
    });
});
