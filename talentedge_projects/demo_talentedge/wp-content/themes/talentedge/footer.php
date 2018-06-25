<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
<style>
.no-results ul{border: none !important;box-shadow: none !important;padding: 0px;}
#notfound_results{display:none;}
.notext{    font-size: 13px;}
</style>
<?php
$page = get_page_by_title( 'About' );
  global $wp_query;
            $tag = $wp_query->get_queried_object();
            $catId = $tag->name;

?>
<!-- ~~~~~~~~~~ news letter ~~~~~~~~~~ -->
<?php if (!is_checkout()) {?>
    <section class="subscibe-section" id="subscibe-section">
        <div class="subscibe text-center">

        <?php
        if (is_tax( 'course-categories' )) {
            ?>
            <h2>Not sure which <?php echo $catId;?> course to take? Let's talk!</h2>
            <?php
        } else {
        ?>

        <?php $classes = get_body_class();
            if (is_home()) { ?>
            <h2><?php echo get_field('mf_homepage','option'); ?> </h2>

        <?php
            } else if (is_page('Browse Courses')) { ?>
            <h2><?php echo get_field('mf_course_listing','option'); ?> </h2>

        <?php
            } else if (is_singular( 'institute' )) { ?>
            <h2><?php echo get_field('mf_institute_detail','option'); ?> </h2>

        <?php
            } else if (is_archive( 'institute' )) { ?>
            <h2><?php echo get_field('mf_institute_listing','option'); ?> </h2>

        <?php
            } else if (is_page('Ask Pro')) { ?>
            <h2><?php echo get_field('mf_askpro','option'); ?> </h2>

        <?php
           } else if (is_page('Pro Talk')) { ?>
            <h2><?php echo get_field('mf_protalk','option'); ?> </h2>

        <?php
          } else if (is_page('Selfie Scan')) { ?>
            <h2><?php echo get_field('mf_selfiscan','option'); ?> </h2>

        <?php
            } else if (is_singular( 'faculty' )) { ?>
            <h2><?php echo get_field('mf_faculty_detail','option'); ?> </h2>

        <?php
            } else if (is_archive( 'faculty' )) { ?>
            <h2><?php echo get_field('mf_faculty_listing','option'); ?> </h2>

            <?php } else { ?>

             <h2><?php echo get_field('mf_homepage','option'); ?> </h2>
            <?php } ?>

    <?php } ?>


        <?php echo do_shortcode('[gravityform id=1 title=false ajax=true ]'); ?>
        </div>
    </section>



<?php } ?>
    <!-- ~~~~~~~~~~ footer ~~~~~~~~~~ -->
    <footer>
        <div class="callToactions">
            <a class="chatAction menu-item callAction test2" href="#callAction-modal" data-toggle="tooltip" data-placement="top" title="Click to open call back form."><i class="fa icon-call2"></i></a>
            <a class="chatAction menu-item test3" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Click to know more info."><i class="icon-chat"></i></a>
            <a class="toggle_btn" href="javascript: void(0);"><i class="fa">+</i></a>
        </div>
        <section class="container">
            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 overHide">
                <div class="row">
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Home</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/browse-courses">Browse Courses</a></li>
                                <li><a href="<?php echo home_url();?>/institute">Academic Partners</a></li>
                                <li><a href="<?php echo home_url();?>/enterprise">Enterprise</a></li>
                                <li><a href="<?php echo home_url();?>/skilling">Skilling</a></li>
                                <li><a href="<?php echo home_url();?>/degree-courses/">Degree Courses</a></li>
                                <li><a href="<?php echo home_url();?>/blog" target="_blank">Blog</a></li>
                                <li><a href="<?php echo home_url();?>/scholarships" target="_blank">Scholarships</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Talentedge</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/about-us">About Us</a></li>
                                <li><a href="<?php echo home_url();?>/channel-partner">Channel Partner</a></li>
                                <li><a href="<?php echo home_url();?>/ask-pro">Ask Pro</a></li>
                                <li><a href="<?php echo home_url();?>/pro-talk">Pro Talk</a></li>
                                <li><a href="<?php echo home_url();?>/selfie-scan">Selfie Scan Test</a></li>
                                <li><a href="<?php echo home_url();?>/careers">Careers</a></li>
                                <!-- <li><a href="<?php //echo home_url();?>/media">Media</a></li> -->
                                <li><a href="<?php echo home_url();?>/articles">Articles</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Usage</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/terms-of-use">Terms of Use</a></li>
                                <li><a href="<?php echo home_url();?>/privacy-policy">Privacy Policy</a></li>
                                <li><a href="<?php echo home_url();?>/end-user-agreement">End User Agreement</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Learner</h5>
                            <ul class="li">
                            <?php if(is_user_logged_in()){ ?>
                                <li><a href="<?php echo home_url();?>/edit-profile">Login</a></li>
                                <li><a href="<?php echo home_url();?>/edit-profile">My Profile</a></li>
                                <li><a href="<?php echo home_url();?>/edit-profile/#myCourses">My Courses</a></li>
                                <li><a href="<?php echo home_url();?>/referral">Referral</a></li>
                            <?php } else {?>
                                 <li><a href="<?php echo home_url();?>/#loginpopup">Login</a></li>
                                <li><a href="<?php echo home_url();?>/#loginpopup">My Profile</a></li>
                                <li><a href="<?php echo home_url();?>/#loginpopup">My Courses</a></li>
                                <li><a href="<?php echo home_url();?>/referral">Referral</a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pull-right overHide">
                <div class="text-left likeuser">
                    <h4 class="ucase"><?php echo get_field('appstore_headline', 'option');?></h4>
                    <a href="<?php echo get_field('android_link','option')?>"><img src="<?php echo get_field('footer_google_play_icon','option');?>" class="inline" /></a>
                    <a href="<?php echo get_field('ios_link','option')?>"><img src="<?php echo get_field('footer_ios_icon','option');?>" class="inline" /></a>
                </div>
                <div class="inner">
                    <h5>Reach Us</h5>
                    <ul class="li">
                        <li><a href="<?php echo home_url() ?>/contact-us">Contact Us</a></li>
                        <ul class="social-links list-inline">
                            <!-- <li><a href="https://goo.gl/62i82A" target="_blank">
                                <i class="fa fa-linkedin fa-2x"></i>
                            </a></li> -->
                            <li><a href="<?php echo get_field('facebook', 'option') ?>" target="_blank">
                                    <i class="fa icon-facebook"></i>
                                </a></li>
                            <li><a href="<?php echo get_field('twitter', 'option') ?>" target="_blank">
                                    <i class="fa icon-twitter"></i></a></li>
                            <li><a href="<?php echo get_field('google_plus', 'option') ?>" target="_blank">
                                    <i class="fa icon-google"></i>
                                </a></li>

                            <li><a href="https://www.youtube.com/talentedgeedtech/" target="_blank">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a></li>

                            <li><a href="https://www.linkedin.com/company/2824583/" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a></li>
                        </ul>
                    </ul>
                </div>
            </div>
            </div>
        </section>
        <div class="footer_copyrights clearfix">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-8 col-ft">Copyright © 2018 <span class="text-uppercase">TALENTEDGE</span> All rights reserved.</div>
               <!--
                 <div class="col-md-6 col-sm-6 col-xs-4 text-right col-ft">Crafted by
                <a title="Best User Experience UX/UI India" href="https://inkoniq.com/" target="_blank">INKONIQ</a>
                </div>
               -->
            </div>
        </div>
    </footer>
    <!-- footer end -->

     <div id="callAction-modal" class="white-popup zoom-anim-dialog mfp-hide mfp-popup clearfix" data-mfp-id="forgotpass">
        <div class="col-md-6 col-sm-6 col-xs-6 left">
            <h3>Let us call you back</h3>
            <h5>We'll contact you ASAP</h5>
            <?php
            echo do_shortcode('[gravityform id=4 title=false tabindex=40 description=false ajax=true]');
            ?>
            <span class="orDivider">OR</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 right">
            <h3>Call us</h3>
            <div class="callToNumber"><i class="fa icon-19"></i><a class="tel:+918376000600">+91 8376000600</a></div>
            <h6>Call us to get more information</h6>
            <p>Our counsellors will call you back in next 24 hours to help you with courses best suited for your career</p>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">Close</button>
    </div>

<?php wp_footer(); ?>
<div id="notfound_results" class="none">

<?php
$posts = get_field('popular', 29);
if( $posts ): ?>

    <div class="notext">No Course with the Search Term, Please find our popular courses</div><ul class="">
    <?php foreach( $posts as $p ):
    $course_id = $p->ID;
     $institute_id = get_field('c_institute', $course_id);
    $institute_title = get_field('short_name', $institute_id );
    ?>
        <li style="display: list-item;">
        <a href="<?php echo get_permalink( $course_id ); ?>"><span><?php echo get_field('course_short_name', $course_id ); ?></span>
            <span class="type"><?php echo $institute_title;?></span>
            </a>
       </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
</div>
<!--

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_scripts.js"></script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_custom.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/global.js"></script>
-->
<script>
    $('.clearSearch').on('click', function(){
        $('#search-hidden-mode2').val('').blur();
    });

    $('.zopim').first().addClass('hideMore');

     if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        localStorage.setItem('setsession', 'popped');
    }

    if (localStorage.getItem("setsession") != 'popped') {
        setTimeout(function(){
            $zopim(function() {
                $zopim.livechat.window.show();
              var field = localStorage.setItem('setsession', 'popped');
            });
        }, 10000);

     }


    $('.test3').on('click', function(){
        $zopim(function() {
            $zopim.livechat.window.show();
        });
    });

    $('#search-hidden-mode').hideseek({
    hidden_mode: true,
    highlight: true,
    min_chars: 3,
    nodata: 'No results found'
  });
       $('#search-hidden-mode3').hideseek({
    hidden_mode: true,
    highlight: true,
    min_chars: 3,
    nodata: 'No results found'
  });

      $('#search-hidden-mode').on("_after", function() {
        if ($('.hidden_mode_list li.no-results')){
        $('.searchdiv .hidden_mode_list').css('height','220px');
        $('.searchdiv .no-results').html('');
        $('.searchdiv .no-results').append($('#notfound_results').html());
        $('.notfound_results').show();
        }
        else{
            $('.searchdiv .hidden_mode_list').css('height','auto');
        }
    });

      $('#search-hidden-mode3').on("_after", function() {
        if ($('.hidden_mode_list li.no-results')){
        $('.searchdiv .hidden_mode_list').css('height','220px');
        $('.searchdiv .no-results').html('');
        $('.searchdiv .no-results').append($('#notfound_results').html());
        $('.notfound_results').show();
        }
        else{
            $('.searchdiv .hidden_mode_list').css('height','auto');
        }
    });

      $('#search-hidden-mode2').hideseek({
            hidden_mode: true,
            highlight: true,
            min_chars: 3
          });
</script>
<script type="text/javascript" src="https://platform.linkedin.com/in.js">
    api_key: 819zz0wgmyfvo0
    authorize: false
    onLoad: onLinkedInLoad
</script>

<script type="text/javascript">

    function liAuth(){
        IN.User.authorize(function(){
        });
    }

    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }

    // Handle the successful return from the API call
    function onSuccess(data) {
        console.log(data);
       console.log(data.emailAddress);
        $( ".linkedin-autofill" ).attr('disabled','disabled');
        $('.userpro-field-first_name input').val(data.emailAddress);
        $('.userpro-field-display_name input').val(data.firstName + data.lastName);
        $('.userpro-field-user_email input').val(data.emailAddress);
        $('.userpro-field-usereditprofile_email input').val(data.emailAddress);
        $('.userpro-field-user_li_linkedin_email input').val(data.emailAddress);
        $('.userpro-field-first_name input').val(data.firstName);
        $('.userpro-field-last_name input').val(data.lastName);
        $('.userpro-field-profilepicture input').val(data.pictureUrls.values[0]);
        $('.userpro-field-billing_first_name input').val(data.firstName);
        $('.userpro-field-billing_last_name input').val(data.lastName);
        $('.userpro-field-billing_city input').val(data.location.name);
        $('.userpro-field-user_li_position input').val(data.positions.values[0].title);
        $('.userpro-field-user_li_industry input').val(data.industry);
        $('.userpro-field-user_socialnetwork input').val('linkedin');
        $('.userpro-field-user_li_linkedincheck input').val('yes');
    }

    // Handle an error response from the API call
    function onError(error) {
        document.write(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        IN.API.Raw("/people/~:(firstName,lastName,emailAddress,id,picture-urls::(original),location,industry,specialties,positions,summary,skills)").result(onSuccess).error(onError);
    }

</script>
<script>
    function onSuccessgoogle(googleUser) {

            var data = googleUser.getBasicProfile();
            $('.userpro-field-first_name input').val(data.ofa);
            $('.userpro-field-last_name input').val(data.wea);
            $('.userpro-field-display_name input').val(data.ofa + data.wea);
            $('.userpro-field-user_email input').val(data.U3);
            $('.userpro-field-usereditprofile_email input').val(data.U3);
            $('.userpro-field-billing_first_name input').val(data.ofa);
            $('.userpro-field-billing_last_name input').val(data.wea);
            $('.userpro-field-user_socialnetwork input').val('google');

    }
    function onFailure(error) {
        console.log(error);
    }
    function renderButton() {
        gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 240,
            'height': 46,
            'longtitle': false,
            'theme': 'dark',
            'onsuccess': onSuccessgoogle,
            'onfailure': onFailure
        });
        gapi.signin2.render('autofill-suggest', {
            'scope': 'profile email',
            'width': 240,
            'height': 46,
            'longtitle': false,
            'theme': 'dark',
            'onsuccess': onSuccessgoogle,
            'onfailure': onFailure
        });
    }
</script>

<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

<!--Schema Code-->

      <script type="application/ld+json">
                {
                    "@context" : "http://schema.org",
                    "@type" : "Organization",
                    "name" : "Talentedge",
                    "url" : "https://talentedge.in/",


            "sameAs" :
            [
            "https://www.facebook.com/Talentedge",
            "https://twitter.com/TalentedgeEdu",
            "https://www.youtube.com/talentedgeedtech",
            "https://in.linkedin.com/company/talentedge---by-arrina-education",
            "https://plus.google.com/100508264206038932559"
            ],
                                "logo": "https://talentedge.in/wp-content/themes/talentedge/images/te_logo.svg",
                                "legalName" : "Talentedge",
                                "address":[
                                { "@type": "PostalAddress", "addressCountry": "India", "addressLocality": "Gurugram", "addressRegion": "Haryana",                                   "postalCode": "122018", "streetAddress": "21, Institutional Area, Sector 32"}]

                }
            </script>
<script>
$('#gform_next_button_1_2').click(function(){
var phoneno=$('#input_1_1').val();
if(phoneno!=''){
dataLayer.push({
         event: "leadFormSubmit1"
  });
//alert('done');
}
})

</script>
<!--Chat lead into CRM Prateek-->
<script>
   $zopim(function() {
	   var visitor_name = '';
	   var visitor_email = '';
	   var visitor_phone = '';
	   var visitor_utmterm = '';
	   var visitor_utmsource = '';
	  $zopim.livechat.setOnChatStart(callback);
	   //alert("Visitor's action " + visitor_connect);
	function callback(){
       if($zopim.livechat.getEmail()){
		 visitor_name =  $zopim.livechat.getName();
		 visitor_email =    $zopim.livechat.getEmail();
		 visitor_phone = $zopim.livechat.getPhone();
		 visitor_utmterm = 'Generic_2017-18';
		 visitor_utmsource = 'Chat';
 // alert(visitor_name);
      jQuery.ajax({
         type : "post",
         //dataType : "text",
         url : "<?php echo admin_url('admin-ajax.php'); ?>",
         data : {"action": "crm_chatlead_entry", "first_name" : visitor_name, "email": visitor_email, "mobile": visitor_phone, "utm_term": visitor_utmterm, "utm_source": visitor_utmsource },
         success: function(response) {
			 console.log(response);
         }
      });
	  }
    }
  });

  jQuery('#thankapplicationform .gform_wrapper form').find('input, select, textarea').on('change', function(){
  var formdata = jQuery('#thankapplicationform .gform_wrapper').find('form').serialize();
  if(typeof(Storage) !== "undefined") {
      if(localStorage.gformDatda && localStorage.gformId){
        localStorage.gformDatda = formdata;
        localStorage.gformId = jQuery('#thankapplicationform .gform_wrapper').find('form').attr('id');
      }else{
        localStorage.setItem("gformId", jQuery('#thankapplicationform .gform_wrapper').find('form').attr('id'));
        localStorage.setItem("gformDatda", formdata);
      }
      console.log(localStorage.gformId);
      console.log(localStorage.gformDatda);
    } else {
        console.log("Sorry, your browser does not support web storage...");
    }
});
function fillGformData(){
     console.log(localStorage.gformId);
     console.log(localStorage.gformDatda);
     if(localStorage.gformId){
       var unserializeGformData = $.unserialize(localStorage.gformDatda);
       jQuery.each(unserializeGformData, function(index,value){
         //console.log(index,value);
         jQuery('#'+localStorage.gformId).find('input[name="'+index+'"],select[name="'+index+'"],textarea[name="'+index+'"]').val(value);
       });
     }
    jQuery('.gform-popup').hide();
}
function resetGformData(){
  localStorage.removeItem("gformId");
  localStorage.removeItem("gformDatda");
  jQuery('.gform-popup').hide();
}
 if(localStorage.gformId){
    jQuery(document).bind('gform_confirmation_loaded', function(event, formId){
        // code to be trigger when confirmation page is loaded
        localStorage.removeItem("gformId");
        localStorage.removeItem("gformDatda");
    });
 }
 (function($){
	$.unserialize = function(serializedString){
		var str = decodeURI(serializedString);
		var pairs = str.split('&');
		var obj = {}, p, idx, val;
		for (var i=0, n=pairs.length; i < n; i++) {
			p = pairs[i].split('=');
			idx = p[0];
			if (idx.indexOf("[]") == (idx.length - 2)) {
				// Eh um vetor
				var ind = idx.substring(0, idx.length-2)
				if (obj[ind] === undefined) {
					obj[ind] = [];
				}
				obj[ind].push(p[1]);
			}
			else {
				obj[idx] = p[1];
			}
		}
		return obj;
	};
})(jQuery);
</script>

<style>
  .gform-popup{
    position: fixed;
    z-index: 100;
    top: 20%;
    left: 30%;
    width: 40%;
    padding: 20px;
    border: 1px solid #000;
    background: #eee;
    }
</style>
<?php if(is_page_template('template-news.php')) { ?>

  <!--<script src="<?php echo bloginfo('stylesheet_directory'); ?>/news-asset/jquery-1.11.3.min.js"></script>-->
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/bootstrap.js"></script>
<script>
(function(){
  // setup your carousels as you normally would using JS
  // or via data attributes according to the documentation
  // https://getbootstrap.com/javascript/#carousel
  //$('#carousel123').carousel({ interval: 2000 });
  $('#carouselABC').carousel({ interval: 3600 });
  $('#carouselmediacov').carousel({ interval: 3600 });
}());

(function(){
  $('.carousel-showmanymoveone#carouselABC .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
  $('.carousel-showmanymoveone.newloop .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());</script>
<?php } ?>

</body>
</html>
