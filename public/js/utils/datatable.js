$('#dataTable').DataTable().destroy();
$('#dataTable').DataTable({
    searching: true,
    pageLength: 5,
    paging: true,
    order: [[ 2, "desc" ]],
    "language":{
        sInfo:"Mostrar _START_ a _END_ de _TOTAL_ Registros",
        sLengthMenu: "Mostrar _MENU_ Registros",
        sSearch:"Filtrar:",
        sFirst:"Primero",
        sLast:"Ultimo",
        sNext:"Siguiente",
        sPrevious:"Anterior" 
    }
});