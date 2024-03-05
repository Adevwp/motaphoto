<!-- The Modal -->
<div id="contact-myModal" class="contact-modal">

  <!-- Modal content -->
    <div class="contact-modal__content">
        <div class="contact-modal__content_header">
        <span class="contact-modal__content_close">FERMER</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-header.webp" alt='Image en-tête du formulaire de contact'>
        </div>   
        <div class="contact-modal__content_body">			
        
        <?php
			// Insert Contact form 
			echo do_shortcode('[contact-form-7 id="3a840c6" title="Contact NMota"] ');
		?>
	    </div>
    </div>

</div>