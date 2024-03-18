jQuery(document).ready(function($) {
    const lightbox = $("#lightbox");
    let photos = [];
    let currentIndex = 0;

    // Update of photo list 
    function loadPhoto() {
        $('.photo-block').each(function() {
            const photoElement = $(this);
            const photoData = {
                url: photoElement.find('.photo-block__picture').attr('src'),
                ref: photoElement.find('.photo-overlay__reference').text(),
                cat: photoElement.find('.photo-overlay__category').text()
            };
            photos.push(photoData);
        });
    }

    // Function to open Lightbox
    function displayLightbox(index) {
        if (index < 0) {
            index = photos.length - 1;  // If index is, go to the last photo in order to create a loop
        } else if (index >= photos.length) {
            index = 0;  // If index is higher, go to the first picture
        }

        const photo = photos[index];
        lightbox.find(".lightbox-img").attr('src', photo.url);
        lightbox.find(".lightbox__reference").text(photo.ref);
        lightbox.find(".lightbox__category").text(photo.cat);
        lightbox.css('display', 'flex');
        currentIndex = index;
        $('body, html').css('overflow', 'hidden');
    }

    // On click on icon fullscreen open Lightbox
    $('.photo-block').on('click', '.photo-fullscreen', function() {
        const index = $(this).closest('.photo-block').index();
        displayLightbox(index);
    });

    // Navigation between pictures before anf after
    $(".lightbox-popup__prev").on('click', function() {
        displayLightbox(currentIndex - 1);
    });

    $(".lightbox-popup__next").on('click', function() {
        displayLightbox(currentIndex + 1);
    });

    // On clic on div close, close the Lightbox
    $(".lightbox-popup__close").on('click', function(event) {
        event.stopPropagation(); // Stop propagation of clic outside the element
        lightbox.css('display', 'none');
        $('body, html').css('overflow', '');
    });

    // On clic outside Lightbox content, close it 
    lightbox.on('click', function(event) {
        if (event.target == this) { // Vérify if it is #ligthbox
            lightbox.css('display', 'none');
            $('body, html').css('overflow', '');
        }
    });

   // No propagation in container of lighbox 
    $(".lightbox-popup__container").on('click', function(event) {
        event.stopPropagation(); // Stop propagation of clic outside the element
    });

    // Initialise array photo after all function and event
    loadPhoto();
});