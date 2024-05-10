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
document.addEventListener('DOMContentLoaded', function () {

    const formularioContacto = document.querySelector('form');
    const submitButton = document.getElementById('submit-button');
    const messageError = document.querySelector('.form-message.error');
    const messageSuccess = document.querySelector('.form-message.success');

    console.log(submitButton);
    
    submitButton.addEventListener('click', function(event)  {
        event.preventDefault();

        if (validateForm()) {
            messageSuccess.style.display = 'block';
            messageError.style.display = 'none';

           formularioContacto.submit();
        } else{
            messageError.style.display = 'block';
            messageSuccess.style.display = 'none';

        }
       });


    function validateForm() {
    const nombre = document.querySelector('input[name="nombre"]').value.trim();
    const tel = document.querySelector('input[name="telefono"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const mensaje = document.querySelector('textarea[name="mensaje"]').value.trim();


    if (nombre === '') {
        console.log('Nombre está vacío');
        return false;
    }
    if (email === '') {
        console.log('Email está vacío');
        return false;
    }
    if (tel === '') {
        console.log('Teléfono está vacío');
        return false;
    }
    if (mensaje === '') {
        console.log('Mensaje está vacío');
        return false;
    }
    return true;

};
});



    
    
    
    

     




   



// function agregarAlCarrito(event) {
//     event.preventDefault(); // Evita que el formulario se envíe automáticamente
//     const formulario = event.target.form;
    
//     Swal.fire({
//         title: '¿Quieres añadir el producto al carrito?',
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonText: 'Sí, añadir',
//         cancelButtonText: 'No, cancelar',
//     }).then((result) => {
//         if (result.isConfirmed) {
//                 formulario.submit();
//             // Puedes usar JavaScript para enviar el formulario manualmente
//             //
//         }
//     });
// }