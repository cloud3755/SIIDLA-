$( document ).ready(function() {



    $( "#fechaIni" ).focus(function() {


        $fechaini = $(this).val();
        $("#fechaInih").val($fechaini);


    });

    $( "#fechaFinal" ).focus(function() {


        $fechaFinal = $(this).val();
        $("#fechaFinalh").val($fechaFinal);


    });


});