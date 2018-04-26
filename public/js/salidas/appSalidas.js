
var arraySalidas;

$(function(){
    arraySalidas = [];   
    $('#ProcesarSalida').on('click',submitForm );
    $('#printCheckList').on('click', PrintCheckList)
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
                    cantidad : parseInt($(this).find(".Cantidad").val()),
                    gin : $(this).find(".gin").text(),
                    lote : $(this).find(".lote").text(),
                    ubicacion : $(this).find(".ubicacion").text(),
                    fecha_caducidad : $(this).find(".fecha_caducidad").text(),
                    id_entrada_relacionada : $(this).data('identrada')
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
   //console.log(arraySalidas);return;
    $('#form').submit();
}

function PrintCheckList()
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');
//
    mywindow.document.write('<html><head><title>CheckList</title>');
    mywindow.document.write(
        '<link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">'+
        '<link rel="stylesheet" href="/css/Personalizados.css"></head><body>');
    mywindow.document.write('<h1>CheckList</h1>');
    mywindow.document.write($('#topCheckListTable').children().html());
    mywindow.document.write($('#checkListPrintArea').html());
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
//mywindow.open();
    mywindow.print();
    mywindow.close();

    return true;
}