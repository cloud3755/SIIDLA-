$( document ).ready(function() {


    $fechaini = localStorage.getItem("fechaIni");
    $fechaFinal= localStorage.getItem("fechaFinal");


    $("#fechaInih").val($fechaini);
    $("#fechaFinalh").val($fechaFinal);



    $( "#fechaIni" ).change(function() {
        $fechaini = $(this).val();
        localStorage.setItem("fechaIni", $fechaini);
    });

    $( "#fechaFinal" ).change(function() {
        $fechaFinal = $(this).val();
        localStorage.setItem("fechaFinal", $fechaFinal);

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