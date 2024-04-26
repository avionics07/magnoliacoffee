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