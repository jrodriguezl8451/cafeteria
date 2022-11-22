// FUNCION PARA BORRAR RESIDUOS DE DATOS DENTRO DE LAS MODALES
function CancelarSelect(){   
    $('.select_cerrar option:selected').removeAttr('selected');
}

/* SWEET ALERTS:*/

//Funcion Alerta Validación
function alertas(title,confirmButtonColor) {
    Swal.fire({
        icon: 'warning',
        title: title,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: confirmButtonColor,
        iconColor: '#dc3545',
    })
}

//Funcion Alerta CRUD
function alertas_crud(icon,title,confirmButtonColor,iconColor) {
    Swal.fire({
        icon: icon,
        title: title,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: confirmButtonColor,
        iconColor: iconColor,
    })
}