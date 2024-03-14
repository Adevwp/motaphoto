
// Open and close Ligthbox 
jQuery(document).ready(function($) {
  
    // Open Lightbox when click on .photo-fullscreen
    $('.photo-block').on('click', '.photo-fullscreen', function(event){
        event.preventDefault();    
        $('.lightbox-popup').css({
            display: 'flex', 
        });
    });

    // Close Lightbox on click on .lightbox-close 
    $(".lightbox__close").on('click', function(event){
        event.preventDefault();
        $(".lightbox-popup").css('display','none');
    });

    // When user click anywhere outside of the lightbo, close it
    $(window).on('click', function(event){
        if(event.target == $(".lightbox-popup")[0]) {
            $(".lightbox-popup").css('display','none'); 
        }
    });

  });

// Dynamic content of the lightbox 