document.addEventListener('DOMContentLoaded', function () {

    eventListeners();
});

function eventListeners() {
    const navegacionHeader = document.querySelector('.mobile-menu');
    
    if (navegacionHeader) {
        navegacionHeader.addEventListener('click', navegacionResponsive);
    }
    

    const navegacionSidebar = document.querySelector('.mobile-menu-sidebar');   

    if (navegacionSidebar) {
        navegacionSidebar.addEventListener('click', navegacionResponsiveSidebar);
    }
}

function navegacionResponsive() {
        const navegacionHeader = document.querySelector('.navegacion-header');

        if (navegacionHeader.classList.contains('mostrar')) {
            navegacionHeader.classList.remove('mostrar');
        } else {
            navegacionHeader.classList.add('mostrar');
        }
    }


function navegacionResponsiveSidebar() {
    const navegacionHeader = document.querySelector('.navegacion-sidebar');

        if (navegacionHeader.classList.contains('mostrar')) {
            navegacionHeader.classList.remove('mostrar');
        } else {
            navegacionHeader.classList.add('mostrar');
        }
    
}


function agregarAlCarrito(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente
    const formulario = event.target.form;
    Swal.fire({
        title: '¿Quieres añadir el producto al carrito?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí, añadir',
        cancelButtonText: 'No, cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
                formulario.submit();
            // Puedes usar JavaScript para enviar el formulario manualmente
            //
        }
    });
}