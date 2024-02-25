<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
        <span class="close">x</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-header.webp" alt='Image en-tête du formulaire de contact'>
        </div>   
        <div class="modal-body">			
        
        <?php
			// Insert Contact form 
			echo do_shortcode('[contact-form-7 id="3a840c6" title="Contact NMota"] ');
		?>
	    </div>
    </div>

</div>