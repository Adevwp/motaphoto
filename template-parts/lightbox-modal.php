<div id="lightbox" class="lightbox-popup">
    <!-- Close the lightbox -->
    <button class="lightbox-popup__close">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-close.svg" alt="Fermer la fenêtre">
    </button>
        <!-- See previous picture -->
    <button class="lightbox-popup__prev">
        <img class="prev-white" src="<?php echo get_template_directory_uri() . '\assets\images\icon-prev-white.svg'; ?> " alt="Photo précédente">
    </button>
    <!-- See next picture -->
    <button class="lightbox-popup__next">    
        <img class="next-white" src="<?php echo get_template_directory_uri() . '\assets\images\icon-next-white.svg'; ?> " alt="Photo suivante">
    </button>

    <!-- Picture in full size -->
    <div class="lightbox-popup__container">
      <img class="lightbox-img" src="" alt="">
    </div>

    <div class="lightbox-popup__info">
        <div class="lightbox__reference">
         <!-- Reference of the picture -->
        </div> 

        <div class="lightbox__category">
         <!-- Category of the picture -->
        </div> 
    </div>

</div>
