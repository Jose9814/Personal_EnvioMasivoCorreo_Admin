function init(){
    $("#producto_form").on("submit",function(e){
        guardaryeditar(e);  
    });
}

$(document).ready(function(){

    $('#producto_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip', 
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
            ],
        "ajax":{
            url:'../../controller/producto.php?op=listar',
            type: "post",
            succes: function(data){
                
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language":{
            "sProcessing":      "Procesando...",
            "sLengthMenu":      "Mostrar _MENU_ registros",
            "sZeroRecords":     "No se encontraron resultados",
            "sEmptyTable":      "Ningún dato disponible en esta tabla",
            "sInfo":            "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":       "Mostrando un total de 0 registros",
            "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":     "",
            "sSearch":          "Buscar:",
            "sUrl":             "",
            "sInfoThousands":   ",",
            "sLoadingRecords":  "Cargando...",
            "oPaginate": {
                "sFirst":   "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior",
            },
            "oAria": {
                "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending":  ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#producto_form")[0]);
    $.ajax({
        url: "../../controller/producto.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#mantenimientoproducto').modal('hide');
            $('#producto_data').DataTable().ajax.reload();
            swal.fire({
                title: "Correcto",
                text: "Registro Exitoso!",
                icon: "success",
                confirmButtonText: "Aceptar",
            })
        }
    });
}

function editar(prod_id){
    $('#lbltitulo').html("Editar Registro");
    $.post("../../controller/producto.php?op=mostrar", {prod_id: prod_id}, function(data){
        data = JSON.parse(data);
        $('#prod_id').val(data.prod_id);
        $('#prod_n').val(data.prod_n);
        $('#prod_precion').val(data.prod_precion);
        $('#prod_preciod').val(data.prod_preciod);
        $('#prod_url').val(data.prod_url);
        $('#prod_img').val(data.prod_img);
        $('#prod_cupon').val(data.prod_cupon);
        $('#prod_descrip').val(data.prod_descrip);
        $('#mantenimientoproducto').modal('show');
    });
}

function eliminar(prod_id){
    Swal.fire({
        title: 'Eliminar?',
        text: "Esta seguro de eliminar el registro?!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/producto.php?op=eliminar", {prod_id: prod_id}, function(data){
                $('#producto_data').DataTable().ajax.reload();
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente!',
            'success'
          )
        }
      })
}

function nuevo(){
    $('#lbltitulo').html("Nuevo Registro");
    $('#prod_id').val("");
    $('#producto_form')[0].reset();
    $('#mantenimientoproducto').modal('show');
}

init();