$( document ).ready(function() {



    $( "#fechaIni" ).focus(function() {


        $fechaini = $(this).val();
        $("#fechaInih").val($fechaini);


    });

    $( "#fechaFinal" ).focus(function() {


        $fechaFinal = $(this).val();
        $("#fechaFinalh").val($fechaFinal);


    });


$('#formZip').submit(
    function(event)
    {
        var checked = $("input[class=least1]:checked").length;
        if(checked>0)
            return true;
        else
        {
            alert("Seleccione al menos 1 Pdo para descargar");
            event.preventDefault();
            return false;
        }
    }

);

});