<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Clients page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css//enterprise.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css//clients.css" rel="stylesheet" />
<style>
    .f2bg{background:#f2f2f2;}
    .wrapper-flex img{width:50%;}
</style>
 <!-- ~~~~~~~~~~~~~ single column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                 <div class="row">
                    <div class="col-md-10">
                            <h2 class="title black-clr text-uppercase text-left"><?php echo get_field('headline')?></h2>
                            <p class="text-left"><?php echo get_field('description')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

// check if the repeater field has rows of data
        $number=1;
if( have_rows('clients') ):?>
   
<div id="clients">
  <?php  while ( have_rows('clients') ) : the_row(); 
  if($number & 1){?>

   <section class="clientsdiv">
         <div class="container">
            <div class="wrapper-flex">
               
                <div class="col">
                <div class="clientcnt text-left">
                <?php echo get_sub_field('description');?>
                </div>
                </div>
                 <div class="col">
                    <img src="<?php echo get_sub_field('logo')?>"/>
                <h5 class="text-bold"><?php echo get_sub_field('client_name');?></h5>
                </div>
            </div>
         </div>
    </section>
  <?php

  } else { ?>
   <section class="clientsdiv f2bg">
         <div class="container">
            <div class="wrapper-flex">
                <div class="col">
                    <img src="<?php echo get_sub_field('logo')?>"/>
                <h5 class="text-bold"><?php echo get_sub_field('client_name');?></h5>
                </div>
                <div class="col">
                <div class="clientcnt text-left">
                <?php echo get_sub_field('description');?>
                </div>
                </div>
            </div>
         </div>
    </section>


  <?php
  
  }

  ?>
     
 <?php   $number++; endwhile; ?>
 </div>

<?php endif; ?>

 <?php include( locate_template( 'temp-resource.php',false, false ) ); ?>
<?php include( locate_template( 'template-request.php',false, false ) ); ?>

<?php			
get_footer(); ?>