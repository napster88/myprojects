<div class="clearfix">
            <div class="dividerColumn">
                <div class="col-md-6 col-md-6 col-xs-12 left gray_black_clr">
                    <h3 class=""><?php echo get_field('resources_headline','option')?></h3>
                    <p><?php echo get_field('resources_subheadline','option')?></p>
                    <div class="text-left">
    <a class="redirect_res btn-lightOrange white text-center text-uppercase" href="<?php echo home_url();?>/resources">View our resources</a>
                    </div>
                </div>
                <div class="col-md-6 col-md-6 col-xs-12 right">
                    <div class="cover_full" style="background-image: url('<?php echo get_field('resources_image','option');?>')"></div>
                </div>
            </div>
        </div>