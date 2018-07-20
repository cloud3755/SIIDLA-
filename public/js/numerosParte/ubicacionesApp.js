
thedataTables("dataTable", '/getubicaciones', 
[
    {data: 'id', name: 'id'},
    {data: 'ubicacion', name: 'ubicacion'},
    {data: 'id', name: 'id'}
]
);



$("#chkRango").on("change",
    function()
    {
        if($(this).is(':checked'))
        {
            $(".chkStatus").prop("disabled", false);
        }
        else
        {
            $(".chkStatus").prop("disabled", true);
        }
    }
);

$("form").submit(
    function()
    {
        var min = $("#inferior").val();
        var max = $("#superior").val();
        if(min > max)
        {
            alert("Inferior debe ser inferior a superior");
            return false;
        }
        return true;
    }

);