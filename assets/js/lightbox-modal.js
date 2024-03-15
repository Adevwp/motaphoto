jQuery(document).ready(function($) {
    const lightbox = $("#lightbox");
    let photos = [];
    let currentIndex = 0;

    // Mise à jour de la liste des photos
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

    // Fonction pour ouvrir la lightbox
    function displayLightbox(index) {
        if (index < 0) {
            index = photos.length - 1;  // Si index est négatif, aller à la dernière photo
        } else if (index >= photos.length) {
            index = 0;  // Si index dépasse, revenir à la première photo
        }

        const photo = photos[index];
        lightbox.find(".lightbox-img").attr('src', photo.url);
        lightbox.find(".lightbox__reference").text(photo.ref);
        lightbox.find(".lightbox__category").text(photo.cat);
        lightbox.css('display', 'flex');
        currentIndex = index;
        $('body, html').css('overflow', 'hidden');
    }

    // Ouverture de la lightbox au clic
    $('.photo-block').on('click', '.photo-fullscreen', function() {
        const index = $(this).closest('.photo-block').index();
        displayLightbox(index);
    });

    // Navigation entre les images
    $(".lightbox-popup__prev").on('click', function() {
        displayLightbox(currentIndex - 1);
    });

    $(".lightbox-popup__next").on('click', function() {
        displayLightbox(currentIndex + 1);
    });

 


    // Fermeture de la lightbox lors du clic sur le bouton de fermeture
    $(".lightbox-popup__close").on('click', function(event) {
        console.log('Close button clicked');
        event.stopPropagation(); // Empêche la propagation pour que l'événement ne remonte pas au conteneur de la lightbox
        lightbox.css('display', 'none');
        $('body, html').css('overflow', '');
    });

    // Fermeture de la lightbox lors du clic en dehors de l'image (sur la lightbox elle-même)
    lightbox.on('click', function(event) {
        if (event.target == this) { // Vérifie si l'événement est déclenché par la lightbox et non par des éléments enfants
            console.log('Lightbox background clicked');
            lightbox.css('display', 'none');
            $('body, html').css('overflow', '');
        }
    });


   // Empêcher la propagation de l'événement de clic sur l'image pour éviter la fermeture
   $(".lightbox-popup__container").on('click', function(event) {
        event.stopPropagation();
    });

    // Mise à jour initiale des photos
    loadPhoto();
});
