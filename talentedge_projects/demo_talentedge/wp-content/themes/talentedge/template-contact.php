<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Contact page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap-widget.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/contact.css" rel="stylesheet" />
<style>
    .gform_body input{color:#333;}
    .gfield_error input, .gerror{border-bottom:1px solid red !important;}
    .validation_message{display:none;}
    #field_15_8 .validation_message, #field_16_8 .validation_message{display:block !important;}
</style>
	<!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
    <div class="sectionBanner">
        <div id="view_hero" style="background-color: #2e509b" class="te-banner-top coverImg cover_full white">
            <div class="container zIndex2">
                <div class="left-te col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <div class="clearfix">
                        <div class="banner-components text-center">
                            <h1><?php echo get_field('headline');?></h1>
                            <h3><?php echo get_field('subheadline');?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
    </div>

    <!-- ~~~~~~~~~~~~~ offerSection section ~~~~~~~~~~~~~ -->
    <div class="offerSection margin-top-25 margin-bottom-25">
        <div class="container">
            <div class="">
                    <div class="offerTab margin-top-25">
                        <div id="rootwizard">
                            <ul class="nav nav-tabs nav-justified hidden" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_Learners" aria-controls="tab_Learners" role="tab" data-toggle="tab"><span>For Learners<em class="downArrow"></em></span> </a></li>
                                <!-- <li role="presentation"><a href="#tab_Corporate" aria-controls="tab_Corporate" role="tab" data-toggle="tab"><span>For Corporate
                                <em class="downArrow"></em></span> </a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab_Learners">
                                    <div class="clearfix row">
                                    	<div class="col-md-8 col-sm-12 col-xs-12">
	                                        <h2><?php echo get_field('general_text');?></h2>
                                            <ul class="list-contact">
	                                            <?php

                                            // check if the repeater field has rows of data
                                            if( have_rows('general') ):

                                                // loop through the rows of data
                                                while ( have_rows('general') ) : the_row();

                                                    ?>
                                                    <li>
                                                    <div class="logo-favicon cell"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-favicon.png" /></div>
                                                    <div class="cell">
                                                        <h5><?php echo get_sub_field('company_name');?></h5>
                                                        <p><?php echo get_sub_field('address');?></p>
                                                        <div class="contact_no">Contact No: <a href="#"><?php echo get_sub_field('phone_nunber');?></a></div>
                                                    </div>
                                                </li>
                                                    <?php

                                                endwhile;
                                            endif;

                                            ?>
	                                        </ul>

                                             <h2><?php echo get_field('master_text');?></h2>
                                            <ul class="list-contact">
                                                <?php

                                            // check if the repeater field has rows of data
                                            if( have_rows('master_franchise') ):

                                                // loop through the rows of data
                                                while ( have_rows('master_franchise') ) : the_row();

                                                    ?>
                                                    <li>
                                                    <div class="logo-favicon cell"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-favicon.png" /></div>
                                                    <div class="cell">
                                                        <h5><?php echo get_sub_field('company_name');?></h5>
                                                        <p><?php echo get_sub_field('address');?></p>
                                                        <div class="contact_no">Contact No: <a href="#"><?php echo get_sub_field('phone_nunber');?></a></div>
                                                    </div>
                                                </li>
                                                    <?php

                                                endwhile;
                                            endif;

                                            ?>
                                            </ul>
                                             <h2><?php echo get_field('unit_text');?></h2>
                                            <ul class="list-contact">
                                                <?php

                                            // check if the repeater field has rows of data
                                            if( have_rows('unit_franchise') ):

                                                // loop through the rows of data
                                                while ( have_rows('unit_franchise') ) : the_row();

                                                    ?>
                                                    <li>
                                                    <div class="logo-favicon cell"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-favicon.png" /></div>
                                                    <div class="cell">
                                                        <h5><?php echo get_sub_field('company_name');?></h5>
                                                        <p><?php echo get_sub_field('address');?></p>
                                                        <div class="contact_no">Contact No: <a href="#"><?php echo get_sub_field('phone_nunber');?></a></div>
                                                    </div>
                                                </li>
                                                    <?php

                                                endwhile;
                                            endif;

                                            ?>
                                            </ul>
                                             <h2><?php echo get_field('corporate_text');?></h2>
                                            <ul class="list-contact">
                                               
                                                 <?php

                                            // check if the repeater field has rows of data
                                            if( have_rows('corporate') ):

                                                // loop through the rows of data
                                                while ( have_rows('corporate') ) : the_row();

                                                    ?>
                                                    <li>
                                                    <div class="logo-favicon cell"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-favicon.png" /></div>
                                                    <div class="cell">
                                                        <h5><?php echo get_sub_field('company_name');?></h5>
                                                        <p><?php echo get_sub_field('address');?></p>
                                                        <div class="contact_no">Contact No: <a href="#"><?php echo get_sub_field('phone_nunber');?></a></div>
                                                    </div>
                                                </li>
                                                    <?php

                                                endwhile;
                                            endif;

                                            ?>
                                            </ul>
                                        </div>
                                    	<div class="col-md-4 col-sm-12 col-xs-12">
						                    <div class="form-wrapper">
						                        <?php
												echo do_shortcode('[gravityform id=15 title=false description=false ajax=true tabindex=30]');
												?>
											</div>
										</div>
                                    </div>
                                </div>
                                <!-- <div role="tabpanel" class="tab-pane" id="tab_Corporate">
                                    <div class="clearfix row">
                                    	<div class="col-md-8 col-sm-12 col-xs-12">
	                                        
	                                    </div>
                                    	<div class="col-md-4 col-sm-12 col-xs-12">
						                    <div class="form-wrapper">
						                        <?php
													//echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=30]');
													?>
											</div>
										</div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php			
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.bootstrap.wizard.js"></script>
<script>
jQuery(document).ready(function() {
jQuery("#gform_submit_button_15").click(function() {
return GravityFormValidation_15(gform_15);
});
jQuery("#gform_submit_button_16").click(function() {
return GravityFormValidation_15(gform_16);
});
});

function GravityFormValidation_15(Form){
var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
var onlyc = /^[a-zA-Z ]*$/;
var check = false;


if(!numericReg.test($('#input_15_6').val()) || $('#input_15_6').val()=='') {
$('#input_15_6').addClass('gerror');
}
else{
$('#input_15_6').removeClass('gerror');
check =  true;
}

if(!onlyc.test($('#input_15_5').val()) || $('#input_15_5').val()=='') {
$('#input_15_5').addClass('gerror');

}
else{
$('#input_15_5').removeClass('gerror');
check = true;
}

if(!onlyc.test($('#input_15_3').val()) || $('#input_15_3').val()=='') {
$('#input_15_3').addClass('gerror');

}
else{
$('#input_15_3').removeClass('gerror');
check = true;
}


if(!onlyc.test($('#input_15_2').val()) || $('#input_15_2').val()=='') {
$('#input_15_2').addClass('gerror');
}
else{
$('#input_15_2').removeClass('gerror');
check = true;
}

return check;
}

function GravityFormValidation_16(Form){
var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
var onlyc = /^[a-zA-Z ]*$/;
var check = false;


if(!numericReg.test($('#input_16_6').val()) || $('#input_16_6').val()=='') {
$('#input_16_6').addClass('gerror');
}
else{
$('#input_16_6').removeClass('gerror');
check =  true;
}

if(!onlyc.test($('#input_16_5').val()) || $('#input_16_5').val()=='') {
$('#input_16_5').addClass('gerror');

}
else{
$('#input_16_5').removeClass('gerror');
check = true;
}

if(!onlyc.test($('#input_16_3').val()) || $('#input_16_3').val()=='') {
$('#input_16_3').addClass('gerror');

}
else{
$('#input_16_3').removeClass('gerror');
check = true;
}


if(!onlyc.test($('#input_16_2').val()) || $('#input_16_2').val()=='') {
$('#input_16_2').addClass('gerror');
}
else{
$('#input_16_2').removeClass('gerror');
check = true;
}

return check;
}
</script>