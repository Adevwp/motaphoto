document.addEventListener('DOMContentLoaded', function () {
    // Get the modal
    const modal = document.getElementById('contact-myModal');

    // Get the two buttons that opens the modal
    const btn = document.getElementById('menu-item-33'); // Button on the menu
    const btn2 = document.getElementById('single-photo-interaction__contact_btn'); // Button on single-photo.php 

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName('contact-modal__content_close')[0];

    // When the user clicks on one of the button, open the modal
    btn.onclick = function() {
        modal.style.display = 'block';
    }; 

    btn2.onclick = function() {
        modal.style.display = 'block';
    }; 

    // TODO ajouter la récupération de la référence de la photo 
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = 'none';
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
});