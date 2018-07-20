$(function(){
     setAreas();
    $("#ProcesarSalida").on("click", ProcesarMovimientos );

});

thedataTables();

function  setAreas()
{
    var areas = $("#areaTemplate").html();
    $(".areaSelect").each(function()
    {
        var area = $(this).data('area');
        $(this).append(areas);
        $(this).val(area);
        $(this).addClass("selectpicker")
        $(this).selectpicker('refresh');
        //$(this).addClass("selectpicker");
        
    });
    //$('.selectpicker').selectpicker('render');
}

function ProcesarMovimientos()
{
    arrayCambioArea = [];
    $(".cambioAreaRow").each(
        function()
        {
            if($(this).find(".chkAplicar").is(':checked'))
            {
                var gin = $(this).find(".gin").text();
                var areaAnterior = $(this).find(".areaAnterior").val();
                var nuevaArea = $(this).find(".areaSelect :selected").text();
                var cantidad = $(this).find(".cantidad").val();
                var lote = $(this).find(".lote").val();
                var fecha_caducidad = $(this).find(".fecha_caducidad").val();
                var fechaHora_entrada = $(this).find(".fechaHora_entrada").val();
                var id_sucursal = $(this).find(".sucursalId").val();
                arrayCambioArea.push(
                {
                    gin : gin,
                    areaAnterior : areaAnterior,
                    nuevaArea : nuevaArea,
                    cantidad : cantidad,
                    lote : lote,
                    fecha_caducidad : fecha_caducidad,
                    fechaHora_entrada: fechaHora_entrada,
                    id_sucursal : id_sucursal
                }
                );
            }
        }
    );
    $("#datosCambioArea").val(JSON.stringify(arrayCambioArea));
    $('#form').submit();
}