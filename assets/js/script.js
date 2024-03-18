// CONTACT MODAL
document.addEventListener('DOMContentLoaded', function () {
    // Get the modal
    const modal = document.getElementById('contact-myModal');

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName('contact-modal__content_close')[0];

    // Get the button that opens the modal from the menu
    const btn = document.getElementById('menu-item-33'); 
    if (btn) {
        btn.onclick = function() {
            modal.style.display = 'block';
        };
    }

    // Get the button that opens the modal from the single photo page
    const btn2 = document.getElementById('single-photo-interaction__contact_btn'); 
    if (btn2) {
        btn2.onclick = function() {
            modal.style.display = 'block';

            // Add the reference of the photo when the modal is opened from the bnt2 on single photo page
            const contactRefField = document.querySelector('input[name="your-subject"]'); 
            if (contactRefField) {
                const referenceElement = document.getElementById('reference');
                const reference = referenceElement ? referenceElement.textContent.trim() : '';
               
                // Set the reference value to the modal field
                contactRefField.value = reference;
            }
        };
    }
    
   
    // When the user clicks on <span> (x), close the modal
    if (span) {
        span.onclick = function() {
            modal.style.display = 'none';
        }
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
});


// SINGLE PHOTO NEXT AND PREV PHOTO THUMBNAIL

document.addEventListener('DOMContentLoaded', function () {
    const arrowLeft = document.querySelector('.arrow-left');
    const arrowRight = document.querySelector('.arrow-right');
    const navigationCardLeft = document.querySelector('.navigation-card-left');
    const navigationCardRight = document.querySelector('.navigation-card-right');

    function showElement(element) {
        if (element) {
            element.style.display = 'block';
        }
    }

    function hideElement(element) {
        if (element) {
            element.style.display = 'none';
        }
    }

    if (arrowLeft && navigationCardLeft) {
        arrowLeft.addEventListener('mouseenter', () => showElement(navigationCardLeft));
        arrowLeft.addEventListener('mouseleave', () => hideElement(navigationCardLeft));
        arrowLeft.addEventListener('focus', () => showElement(navigationCardLeft));
        arrowLeft.addEventListener('blur', () => hideElement(navigationCardLeft));
    }

    if (arrowRight && navigationCardRight) {
        arrowRight.addEventListener('mouseenter', () => showElement(navigationCardRight));
        arrowRight.addEventListener('mouseleave', () => hideElement(navigationCardRight));
        arrowRight.addEventListener('focus', () => showElement(navigationCardRight));
        arrowRight.addEventListener('blur', () => hideElement(navigationCardRight));
    }
});

// MENU BURGER


