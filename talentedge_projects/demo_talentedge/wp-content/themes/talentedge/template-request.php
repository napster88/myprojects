<div class="requestfordemo">
	<div class="container">
		<div class="row row-centered">
		 <h2 class="title white text-uppercase margin-bottom-25"><?php echo get_field('request_headline','option')?></h2>
		<div class="col-md-9 col-centered">

		<div class="guidForm">
        <?php
        echo do_shortcode('[gravityform id=18 title=false description=false ajax=true tabindex=30]');
        ?>
    </div>
    	<p><?php echo get_field('footer_email','option')?></p>
		</div>
		</div>
	</div>
</div>