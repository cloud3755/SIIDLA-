
var arraySalidas;

$(function(){
    arraySalidas = [];   
    $('#ProcesarSalida').on('click',submitForm );
});



function setArraySalidas()
{
    $(".salidaRow").each(function()
    {
        if($(this).find(".chkAplicar").is(':checked'))
        {
            arraySalidas.push(
                {
                    id: parseInt($(this).attr("id")),
                    cantidad : parseInt($(this).find(".Cantidad").val())
                }
            );
        }
    }
    );
}


function submitForm()
{
    setArraySalidas();
    $('#datosSalida').val(JSON.stringify(arraySalidas));
   
    $('#form').submit();
}