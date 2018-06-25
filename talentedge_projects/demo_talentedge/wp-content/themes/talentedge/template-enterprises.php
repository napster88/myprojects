<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Enterprises page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/enterprise.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">


        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(../images/marketing_landing.png);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1>Last mile services</h1>
                                <p>Empowering Workforce  and delivering result</p>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

         <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <p><?php echo  get_field('description');?></p>
                </div>
            </div>
        </div>

    

        <!-- ~~~~~~~~~~~~~ Two column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="twoColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container services">
                    <h2 class="title black-clr text-uppercase text-center">Our Services</h2>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="pad-LR-35 text-center margin-bottom-20">
                            <div><i class="fa icon-3 darkOrange"></i></div>
                            <h3 class="title black-clr text-uppercase darkOrange">Services</h3>
                            <p>A high degree of engagement is ensured through continuous interaction and gamification techniques. The Trainees are rewarded through contests and other focused events.et atqui placerat.</p>
                            <div class="text-center text-uppercase">
                                <a class="redirect_link" href="http://wordpress.stunnerweb.in/talentedgedev/html/dev/views/enterprise.html#">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="pad-LR-35 text-center margin-bottom-20">
                            <div><i class="fa icon-3 lightOrange"></i></div>
                            <h3 class="title black-clr text-uppercase lightOrange">Products</h3>
                            <p>A high degree of engagement is ensured through continuous interaction and gamification techniques. The Trainees are rewarded through contests and other focused events.et atqui placerat.</p>
                            <div class="text-center text-uppercase">
                                <a class="redirect_link" href="http://wordpress.stunnerweb.in/talentedgedev/html/dev/views/enterprise.html#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Service widget section ~~~~~~~~~~~~~ -->
        <div class="services_widget coverImg text-center" style="background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/whytalentedge.jpg)">
        </div>

        <!-- ~~~~~~~~~~~~~ Single column Industries we work section-1 ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <h2 class="title gray_black_clr text-uppercase margin-bottom-45">Industries We Work</h2>
                            <ul class="intestries_List carousel text-center owl-carousel">
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">IT</div>
                                </li>
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">HRM</div>
                                </li>
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">Marketing</div>
                                </li>
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">Finance</div>
                                </li>
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">Education</div>
                                </li>
                                <li>
                                    <div class="white rounded lightOrange_bg img-circle">
                                        <div><i class="fa icon-5"></i></div>
                                    </div>
                                    <div class="text-uppercase">Technology</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Single column our clients ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ourClients-fluid">
                        <div class="row">
                            <h2 class="title gray_black_clr text-uppercase margin-bottom-45">Our Clients</h2>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio s</p>
                            <div class="ourClients-wrapper">
                                <div class="ourClients owl-carousel">  
                                    <div class="item"><img src="../images/our-client-1.png"></div>
                                    <div class="item"><img src="../images/our-client-2.png"></div>
                                    <div class="item"><img src="../images/our-client-3.png"></div>
                                    <div class="item"><img src="../images/our-client-4.png"></div>
                                    <div class="item"><img src="../images/our-client-3.png"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ~~~~~~~~~~~~~ Two column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="dividerColumn">
                <div class="col-md-6 col-md-6 col-xs-12 left gray_black_clr">
                    <h3 class="">Find Your Best Resources for Enterprise</h3>
                    <p>At Talentedge, our education industry specialists keep abreast with the trends, latest in the sector and the policies. We understand these and assess its impact on business and learners. Watch this space for our insights and reports.</p>
                    <div class="text-left">
                        <a class="redirect_res btn-lightOrange white text-center text-uppercase" href="http://wordpress.stunnerweb.in/talentedgedev/html/dev/views/enterprise.html#">View our resources</a>
                    </div>
                </div>
                <div class="col-md-6 col-md-6 col-xs-12 right">
                    <div class="cover_full" style="background-image: url(&#39;../images/divider-enterprise.png&#39;)"></div>
                </div>
            </div>
        </div>

    </section>
<?php			
get_footer(); ?>
<script type="text/javascript">
    var $ = jQuery;

$(document).ready(function() {
     var learnerList = $('.ourClients').length;
    if (learnerList > 0) {
        $('.ourClients').owlCarousel({
            margin: 5,
            loop: true,
            items: 4,
            nav: false,
            dots: true,
            mouseDrag: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                },
                413: {
                    items: 2,
                    dots: true,
                },
                735: {
                    items: 4,
                }
            }
        });
    }
    if ($('.intestries_List').length) {
        $('.intestries_List').owlCarousel({
            loop: false,
            items: 6,
            nav: false,
            dots: false,
            mouseDrag: false,
            autoplay: false,
            responsive: {
                0: {
                    items: 2,
                    dots: true
                },
                413: {
                    items: 3,
                    dots: true
                },
                735: {
                    items: 4,
                    dots: true
                },
                1024: {
                    items: 6
                }
            }
        });
    } 
});
</script>