
function enviarcorreo(){
    $.post("../../controller/email.php?op=enviarcorreo",function(data){
        swal.fire({
            title: "Correcto",
            text: "Envio de Correos Exitoso!",
            icon: "success",
            confirmButtonText: "Aceptar",
        })
    });
}