$(function(){
     setAreas();
    $("#ProcesarSalida").on("click", ProcesarMovimientos );

});

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
                arrayCambioArea.push(
                {
                    gin : gin,
                    areaAnterior : areaAnterior,
                    nuevaArea : nuevaArea
                }
                );
            }
        }
    );
    $("#datosCambioArea").val(JSON.stringify(arrayCambioArea));
    $('#form').submit();
}