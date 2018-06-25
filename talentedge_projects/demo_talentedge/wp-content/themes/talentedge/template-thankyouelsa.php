<?php
/**
 * The template for displaying Elsa thank you page.
 *
 * Template Name: Elsa thank you
 *
 */
get_header();
?>


<div class="thanks-orange">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <div class="thanks_round_img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/thanks-check.png" alt="">
              </div>
              <h1>Thank You!</h1>
              <h2>Your Seat is confirmed.</h2>
              <p>Please check your email shortly for details.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="thanks-white">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <h3>Take your career to the Next Level</h3>
              <div class="logo_center"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/talent-blue.png"></div>
            </div>
          </div>
        </div>
      </div>

<?php get_footer(); ?>
