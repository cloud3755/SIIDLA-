
var arrayGins;

$(function(){
    arrayGins = {};
    $("#fechaCaducidad").val(new Date().Hoy());
    $('#agregarEntrada').on('click', agregarRegistro);
    $('#Procesar').on('click', submitForm);
    $('.removegin').on('click', function(){
            quitarfila($(this));
    });
   
});



function agregarRegistro()
{
    var gin = $('#ginsel').val();
    var cantidad;
    var arrayGin = {};
    if($("#"+gin).length)
    {
        var can = parseFloat($('#'+gin).find('.Cantidad').val());
        
        $('#'+gin).find('.Cantidad').val(++can);
        arrayGins[gin]['cantidad'] = can;
        return;
    }

    var descripcion = $('#ginsel :selected').data('descripcion');
    cantidad = $('#cantidad').val();
    var lote = $('#lote').val();
    var ubicacion = $('#ubicacionsel').val();
    var fecha = $('#fechaCaducidad').val();
    var buttonDelete = '<button data-gin='+gin+' class="removegin">x</button>';

    
    arrayGin['gin'] = gin;
    arrayGin['descripcion'] = descripcion;
    arrayGin['cantidad'] = cantidad;
    arrayGin['lote'] = lote;
    arrayGin['ubicacion'] =ubicacion;
    arrayGin['fecha_caducidad'] = fecha;
    console.log(arrayGin);
    arrayGins[gin] = arrayGin;
    console.log(arrayGins);
    $('#tableEntrada tbody').append(
        '<tr class="trGin" id="'+gin+'">'+
            '<td>'+gin+'</td>'+
            '<td>'+descripcion+'</td>'+
            '<td ><input class="Cantidad overCero" type="number" value="'+cantidad+'" /></td>'+
            '<td>'+lote+'</td>'+
            '<td>'+ubicacion+'</td>'+
            '<td>'+fecha+'</td>'+
            '<td>'+buttonDelete+'</td>'+
        '</tr">'
    );
    $('.removegin').on('click', function(){quitarfila($(this));});
    $('.Cantidad').on('change',function(){cantidadChange($(this));});
}

function cantidadChange(e)
{
    var gin = e.parent().parent().attr('id');
    arrayGins[gin]['cantidad'] = e.val();
    console.log(arrayGins);
}

function quitarfila(e)
{
    gin = e.data('gin');
    
    $('#'+gin).remove();
    delete arrayGins[gin];
    
}

function submitForm()
{
    //base_64
    $('#datosEntrada').val(JSON.stringify(arrayGins));
    $('#id_sucursal').val($('#sucursal').val());
    //alert($('#sucursal').val());return;
    $('#form').submit();
}