var $ = jQuery;

// dedect user agent
var deviceAgent = navigator.userAgent.toLowerCase();
var agentID = deviceAgent.match(/(iPad|iPhone|iPod)/i);

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        init before load 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

        /*$('header#header .navbar-nav .search input').focus(function() {
            $(window).bind('scroll');
        }).blur(function(event) {
            $(window).unbind('scroll');
        });

        $(document).ajaxComplete(function( event, xhr, settings ) {
            var blockFind = $('#aws-search-result-1').css('display');
            if( blockFind == 'block' ){
                $(window).bind('scroll');
            } else{
                $(window).unbind('scroll');
            }
        });*/


        $(document).click(function(event) { 
            if(!$(event.target).closest('.searchdiv ul').length) {
                if($('.searchdiv ul').is(":visible")) {
                    $('.searchdiv ul').css({
                        'display': 'none'
                    })
                }
            }        
        })

        $('.searchdiv input').bind("change keyup input",function() {
            $('.searchdiv ul').show();
        });
        // $('#gform_1 .ginput_container_phone').append("<i class='fa icon-call'></i>");


$(document).ready(function() {

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Search page enter key
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        $('#search-hidden-mode').keyup(function() {
            var searchValue = $(this).val();
            console.log(searchValue);
            // var locationBase = ''

            if(event.which == 13) {
                var myUrl = '';
                console.log('Hit enter');
                // locationBase = window.location.hostname;
                // window.location.assign(locationBase+'/browse-courses/');
                myUrl = '/browse-courses/?search='+searchValue;
                location.href = myUrl;
                // window.location.replace(myUrl);
                console.log(myUrl)
           }
        });
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        WOW Animate Init
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.wow').length > 0) {
            wow = new WOW(
                {
                    boxClass:     'wow',      // default
                    animateClass: 'animated', // default
                    offset:       0,          // default
                    mobile:       true,       // default
                    live:         true        // default
                }
            )
            wow.init();   
        }
        $(".registerdiv").each(function(index, el) {
            $(this).find('div.userpro-field').filter(":odd").addClass('even')
        });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Sticky footer icons
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.callToactions').length > 0) {
            var stickyFooterIcons = $('.callToactions');
            stickyFooterIcons.each(function(i) {
                var summary = $(stickyFooterIcons[i]);
                var next = stickyFooterIcons[i + 1];

                summary.scrollToFixed({
                    bottom: 20,
                    limit: function() {
                        var limit = 0;
                        if (next) {
                            limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                        } else {
                            limit = $('footer').offset().top - $(this).outerHeight(true) + 23;
                        }
                        return limit;
                    },
                    preUnfixed: function() {
                        stickyFooterIcons.addClass('unfixed');
                    },
                    fixed: function() {
                        stickyFooterIcons.removeClass('unfixed');    
                    },
                    zIndex: 999
                });
            });
        } 


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Event.stopPropagation for Popular carousel 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function propagatePointEvent (argument) {
            $(".knowMore-btn a" ).click(function( event ) {
                event.stopPropagation();
            });
            if($(window).width() == 1024){
                $(".colcarou .cardSmall .bottom_course h3 a" ).click(function( event ) {
                    event.stopPropagation();
                    console.log('trigger');
                });
            }
        }
        propagatePointEvent();
        $(window).resize(function(event) {
            propagatePointEvent();
        });
    

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Yamm nested script for megamenu 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        $(document).on('click', '.yamm-content .nav-left .nav li a', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
        });
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
            //e.stopPropagation();
            /*e.preventDefault();
            e.stopImmediatePropagation();*/
        });

        var subTab = $('.yamm-content .nav-right').width();
        $('.tab-content>.tab-pane').width(subTab);

        var checkSubmenu = $('.yamm-content .nav-left .nav');
        function megamenuActive() {
            $(checkSubmenu).children('li').not('.subCourses').children('a').on('click', function(event) {
                $('.subMenu-wrapper').hide().find('.tab-section').css('display', 'none');
                $('.subCourses ul li a').removeClass('tab-active');
            }).on('mouseenter', function(el){
                $('.subMenu-wrapper').hide();
                $('.subCourses ul li a').removeClass('tab-active');

                var thisHref = $(this).attr('href');
                $('.yamm-content .tab-content>.tab-pane').not(' '+ thisHref +' ').removeClass('active topZindex');
                $(' '+ thisHref +' ').addClass('active');
                $(' '+ thisHref +' ').addClass('topZindex');
            }).on('mouseleave', function(el){
                var thisHref = $(this).attr('href');
                $('.yamm-content .tab-content>.tab-pane').not('.tab-content>.tab-pane.active').removeClass('active topZindex')
                
            });
        }
        $('.subCourses').on('mouseenter', function(el){
            var thisRevHref = $(this).prev().attr('href');
            $('.yamm-content .tab-content>.tab-pane').not(' '+ thisRevHref +' ').removeClass('active topZindex')
            $(' '+ thisRevHref +' ').addClass('active topZindex');
        });
        megamenuActive();

        $('header#header .navbar-nav > li.dropdown .dropdown-menu').on('mouseenter', function(){
            $(this).parent().addClass('open');
        }).on('mouseleave', function(){
            $(this).parent().removeClass('open');
        });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Toggle profile page 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function toggleUserEdit () {
            // $('#displayedit').addClass('active');
            $(document).on('click','#displayedit',function(){
                $('#displayProfile').fadeOut();
                $('#editProfile').fadeIn();
                $('.profile_action').hide();
                $('#pasword_change').hide();
                $('.backToProfile').show();
                $('.changePassDiv').show();
            });
            $(document).on('click','.changePassDiv #clickcheck',function(){
                $('#pasword_change').fadeIn();
                $('.editableUserTable form.acf-form').fadeOut();
                $('#displayProfile').hide();
                $('.profile_action').hide();
                $('.changePassDiv').hide();
                $('.backToProfile').hide();
            });
            $(document).on('click','.backToProfile',function(){
                $('#editProfile').fadeOut();
                $('#displayProfile').fadeIn();
                $('#pasword_change').hide();
                $('.profile_action').show();
                $('.changePassDiv').hide();
                $('.backToProfile').hide();
            });
            $(document).on('click','.editableUserTable .backToEdit',function(){
                $('#pasword_change').fadeOut();
                $('.editableUserTable form.acf-form').fadeIn();
                $('.profile_action').hide();
                $('.backToProfile').show();
                $('.changePassDiv').show();
            });
        }
        toggleUserEdit();

        $('.coursePurchased').each(function(index, el) {
            $(this).find('.order_History').on('click', function(event) {
                $(this).parents('.coursePurchased').find('.orderDetail_dataSHow').slideToggle();
                $(this).toggleClass('active');
                // $(this).siblings('.emi_Pay').removeClass('active');
            });
            $(this).find('.emi_Pay').on('click', function(event) {
                $(this).siblings('.infoToggle').find('.installment_dataSHow').slideToggle();
                $(this).toggleClass('active');
                // $(this).siblings('.order_History').removeClass('active');
            });
        });

        var profileImg = $('.acf-image-uploader .view.show-if-value img').attr('src');
        $('.leftUserRail').attr("style", "background-image: url("+ profileImg +")");

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Set width for megamenu left nav 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    var widgetW = $('.course-widget').width();
    $('.nav-left').width(widgetW);

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Footer list toggle on mobile
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        
        $('footer .toggle h5').on('click', function(e) {
            e.preventDefault();
            var parent = $(this).parents('.toggle');
            parent.toggleClass('selected');
            parent.siblings().removeClass('selected');

            parent.siblings().find('.li').slideUp();
            parent.find('.li').slideToggle('fast');
        });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    home white logo animation
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function animateLogoOnLoad(){
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(1)').addClass('animated slideInUp block');
            }, 700);
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(2)').addClass('animated slideInUp block');
            }, 900);
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(3)').addClass('animated slideInUp block');
            }, 1100);
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(4)').addClass('animated slideInUp block');
            }, 1300);
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(5)').addClass('animated slideInUp block');
            }, 1500);
            setTimeout(function() {
                $('.global-slider-widget_demo .owl-item:nth-child(6)').addClass('animated slideInUp block');
            }, 1700);
        }
        function animateHeaderOnLoad(){
            setTimeout(function() {
                $('header#header').addClass('animated slideInDown block');
            }, 350);
        }

        if ($('.global-slider-widget_demo').length > 0) {
            // animateLogoOnLoad();
            ( $(window).innerWidth() > 1024 ) ? animateHeaderOnLoad() : 'nothing';
        }
        if ($('.subscibe-section').length > 0) {
            $('.subscibe-section').waypoint(function(direction) {
                if (direction == "down") {
                    $('.subscibe-section .ginput_container_phone').addClass('animated shake');
                }
            }, {
                offset: 'bottom-in-view'
            })
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Owl carousel init 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        var globalwidget_demo = $('.global-slider-widget_demo').length;
        if (globalwidget_demo > 0) {
            $('.global-slider-widget_demo').owlCarousel({
                // autoWidth:true,
                nav: false,
                mouseDrag: false,
                touchDrag: false,
                stagePadding: 0,
                items: 5,
                loop: true,
                margin: 10,
                autoplay:true,
                autoplayTimeout: 2000,
                autoplayHoverPause:true,
                navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"],
                responsive: {
                    0: {
                        items: 2
                    },
                    567: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    1024: {
                        items: 6
                    }
                },
                onInitialized: function(){
                    // animateLogoOnLoad();
                },
                onTranslated: function(){
                    $('.banner-wrp .global-client-slider .owl-item').removeClass('visible');
                    $('.banner-wrp .global-client-slider .owl-item.active').addClass('visible');
                }
            });
        }

        $('.global-client-slider').each(function(index, el) {
            var srcFind = $(this).find('.owl-item img').attr("src");
            console.log(srcFind);
            if(srcFind = ''){
               $(this).hide(); 
            }
        });

        var srcFinder = $('.global-client-slider').find('.owl-item').first().find('img').attr('src');
        if (srcFinder == '' || undefined) {
            $('.global-partners-section').hide();
        }

        console.log($('.learner-list .owl-item').length);
        if ( $('.learner-list .owl-item').length < 1 ) {
            $('.te-learners').hide();
        }

       /* var globalClient = $('.global-client-slider').length;
        if (globalClient > 0) {
            $('.global-client-slider').owlCarousel({
                margin: 10,
                loop: false,
                // autoWidth:true,
                items: 5,
                nav: true,
                lazyLoad: true,
                navText: ["<span class='icon-left-_arrow'>", "<span class='icon-left-arrow'>"],
                responsive: {
                    0: {
                        items: 2,
                        autoplay: true
                    },
                    567: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    1024: {
                        items: 5
                    }
                }
            });
        }*/

        var globalaward = $('.global-award-slider-widget').length;
        if (globalaward > 0) {
            $('.global-award-slider').owlCarousel({
                margin: 10,
                loop: false,
                // autoWidth:true,
                items: 5,
                nav: true,
                navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"],
                responsive: {
                    0: {
                        items: 2
                    },
                    567: {
                        items: 3
                    },
                    768: {
                        items: 3
                    },
                    1024: {
                        items: 5,
                        autoplay: true
                    }
                }
            });
        }

        var learnerList = $('.learner-list').length;
        if (learnerList > 0) {
            $('.learner-list').owlCarousel({
                margin: 5,
                loop: false,
                items: 1,
                nav: false,
                dots: true,
                mouseDrag: false,
                autoHeight:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    569: {
                        items: 2,
                    },
                    1024: {
                        items: 1
                    }
                }
            });
        }

        if ($('.mb-carousel').length > 0) {
            $('.mb-carousel').owlCarousel({
                loop: false,
                items: 4,
                nav: false,
                dots: true,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    569: {
                        items: 2,
                        dots: true
                    },
                    1024: {
                        items: 4,
                        dots: false,
                        autoplay: true
                    }
                }
            });
        }
        if ($('.alumnis-list').length > 0) {
            $('.alumnis-list').owlCarousel({
                loop: false,
                items: 4,
                nav: false,
                dots: false,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    567: {
                        items: 2,
                        dots: true
                    },
                    1023: {
                        items: 4,
                        dots: false,
                        autoplay: true
                    }
                }
            });
        }

        if ($('.slide_Universites_partner').length > 0) {
            $('.slide_Universites_partner').owlCarousel({
                loop: false,
                items: 3,
                nav: false,
                dots: false,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    568: {
                        items: 2,
                        dots: true
                    },
                    1024: {
                        items: 3,
                        dots: false,
                        autoplay: true
                    }
                }
            });
        }
        if ($('.myCertificateSlider').length > 0) {
            $('.myCertificateSlider').owlCarousel({
                loop: false,
                lazyLoad: true,
                items: 1,
                nav: true,
                dots: false,
                mouseDrag: false,
                navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"]
            });
        } 

        if ($('.mobileVideos-slider').length > 0) {
            var els = $('.mobileVideos-slider');
            $('.mobileVideos-slider').owlCarousel({
                loop: false,
                items: 2,
                nav: true,
                dots: false,
                mouseDrag: true,
                navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"],
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    735: {
                        items: 2
                    },
                    1024: {
                        items: 2
                    }
                }
            });
        } 
        if ( $('.gallerSlider').length > 0) {
            $('.gallerSlider').owlCarousel({
                margin: 10,
                loop: true,
                // autoWidth:true,
                items: 6,
                stagePadding: 0,
                nav: true,
                lazyLoad: true,
                autoplay: true,
                dots: false,
                navText: ["<span class='icon-left-_arrow'>", "<span class='icon-left-arrow'>"],
                responsive: {
                    0: {
                        items: 2,
                        nav: true,
                        autoplay: false
                    },
                    567: {
                        items: 3,
                        nav: true,
                    },
                    768: {
                        items: 4,
                        nav: true,
                    },
                    1024: {
                        items: 6
                    }
                }
            });
        } 


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Tab fn in why talentedge section in homepage
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        $('.talent-wrapper .tab-section').hide();
        $('#talent a').on('mouseenter', function(e) {
            $('#talent a.tab-active').removeClass('tab-active');
            $('.tab-section:visible').hide();
            $(this.hash).show();
            $(this).addClass('tab-active');
            e.preventDefault();
        });
        setTimeout(function() {
            // $('#talent a:first').trigger('click');
            $('#talent a:first').addClass('tab-active');
            $('.talent-wrapper .tab-section:first').show();
        }, 230);

        /*tab on hover*/
        $('.subMenu-wrapper .tab-section').hide();
        $('#subMenu a').on('mouseenter', function(e) {
            $('#subMenu a.tab-active').removeClass('tab-active');
            $('.tab-section:visible').hide();
            $(this.hash).show();
            $(this).addClass('tab-active');
            $('.subMenu-wrapper').show().css('z-index', '1');
            e.preventDefault();
        });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Numeric value animation fns 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function changeNumbers(dec) {
            $('.te-count-ani .animate-value').each(function(index) {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).attr('data-ani-value')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.round(now * 10) / 10);
                    }
                });
            });
        }

        if ($('.te-count-ani').length > 0) {
            $('.te-count-ani .animate-value').each(function(index) {
                var dataVal = $(this).attr('data-ani-value');
                $(this).text(dataVal);
            });
        }

        function universityNumbers(dec) {
            $('.te-university-ani .animate-value').each(function(index) {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).attr('data-ani-value')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.round(now));
                    }
                });
            });
        }

        if ($('.te-university-ani').length > 0) {
            $('.te-university-ani .animate-value').each(function(index) {
                var dataVal = $(this).attr('data-ani-value');
                $(this).text(dataVal);
            });
        }

        function instituteNumbers() {
            $('.shortNotice_institute .range_value span').each(function(index) {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).attr('data-ani-value')
                }, {
                    duration: 4500,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.round(now));
                    }
                });
            });
        }
        if ($('.shortNotice_institute .range_value').length > 0) {
            $('.shortNotice_institute .range_value span').each(function(index) {
                var dataVal = $(this).attr('data-ani-value');
                $(this).text(dataVal);
            });
        }

        function whyTalentNumbers() {
            $('.why_talent_detail .range_value span').each(function(index) {
                var valueGet = $(this).attr('data-ani-value').replace(/[^0-9 ]/g, "");
                $(this).prop('Counter', 0).animate({
                    Counter: valueGet
                    // Counter: $(this).attr('data-ani-value')
                }, {
                    duration: 4500,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.round(now));
                    }
                });
            });
        }
        if ($('.why_talent_detail .range_value').length > 0) {
            $('.why_talent_detail .range_value span').each(function(index) {
                var dataVal = $(this).attr('data-ani-value');
                $(this).text(dataVal);
            });
        }

        /* font-size managing */
        $('.animate-value').each(function(index, el) {
            var meText = $(this).text().length;
            console.log(meText);
            if( meText > 6 ){
                $(this).parent().addClass('smallF');
            } else{
                $(this).parent().addClass('bigF');
            }
        });
        $('.range_value span').each(function(index, el) {
            var meText = $(this).text().length;
            console.log(meText);
            if( meText > 6 ){
                $(this).parent().addClass('smallF');
            } else{
                $(this).parent().addClass('bigF');
            }
        });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Waterwheel slider 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function pixflow_shortcodeScrollAnimation(items) {
            'use strict';
            var processSteps = $('.process-steps'),
                musicSC = $('.music-sc'),
                showcases = $('.showcase');

            if (!processSteps.length && !musicSC.length && !showcases.length) return;

            showcases.each(function() {
                var carousel,
                    $element = $(this),
                    $carouselImages = $element.find('a');

                $carouselImages.css({
                    overflow: 'hidden!important',
                    width: 0,
                    height: 0
                });
                if (typeof $element.waterwheelCarousel == 'function') {
                    $carouselImages.removeAttr('style');
                    $carouselImages.off('click');
                    var carousel = $element.waterwheelCarousel({
                        forcedImageWidth: 660,
                        forcedImageHeight: 371,
                        horizonOffsetMultiplier: 0,
                        speed: 600,
                        flankingItems: items,
                        separation: 180,
                        animationEasing: 'swing',
                        opacityMultiplier: 1,
                        linkHandling: 1,
                        movingToCenter: function($moveing) {
                            pixflow_showcase_moved($moveing, $carouselImages);
                            $('.playVid').not('.playVid.carousel-center').on('click', function(event) {
                                event.preventDefault();
                            });
                        },
                        movedToCenter:function(){
                            $('.carousel .carousel-center').magnificPopup({
                                // disableOn: 700,
                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: false,
                                src: "",
                                fixedContentPos: false,
                                callbacks: {
                                    /*beforeOpen: function() {
                                        if(!agentID){
                                            $("body").addClass('lockme');
                                        }
                                    },
                                    close: function(){
                                        if(!agentID){
                                            $("body").removeClass('lockme');
                                        }
                                    }*/
                                }
                            });
                            $('.playVid').not('.playVid.carousel-center').on('click', function(event) {
                                event.preventDefault();
                            });
                            console.log('moved to center');
                        },
                        clickedCenter: function() {
                            $('.carousel .carousel-center').magnificPopup({
                                // disableOn: 700,
                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: false,
                                src: "",
                                fixedContentPos: false,
                                callbacks: {
                                    /*beforeOpen: function() {
                                        if(!agentID){
                                            $("body").addClass('lockme');
                                        }
                                    },
                                    close: function(){
                                        if(!agentID){
                                            $("body").removeClass('lockme');
                                        }
                                    }*/
                                }
                            });
                            console.log('clicked center');
                        }
                    });

                    var featureLeft = 0,
                        featureTop = 0;

                    pixflow_showcase_moved($carouselImages.first(), $carouselImages);

                    setTimeout(function() {
                        $carouselImages.each(function() {
                            $(this).attr('data-left', $(this).css('left'));
                            $(this).attr('data-top', $(this).css('top'));
                        });
                        featureLeft = $carouselImages.first().css('left').replace('px', '') * 1 + 119;
                        featureTop = $carouselImages.first().css('top').replace('px', '') * 1 + 50;
                        var showcaseTop = $element.offset().top,
                            showcaseBottom = $element.offset().top + $element.outerHeight(true);
                        if (($(window).scrollTop() + $(window).height() - 100 >= showcaseTop) && ($(window).scrollTop() + 300 <= showcaseBottom) || window.self !== window.top) {
                            $element.addClass('open-showcase');
                            $carouselImages.each(function() {
                                $(this).animate({
                                    'left': $(this).data('left'),
                                    'top': $(this).data('top')
                                }, 1).finish();
                            })
                        } else {
                            $element.removeClass('open-showcase');
                            $carouselImages.not('.carousel-center').animate({
                                left: featureLeft,
                                top: featureTop
                            }, 1).finish();
                            $carouselImages.filter('.carousel-center').animate({
                                left: $carouselImages.filter('.carousel-center').data('left'),
                                top: $carouselImages.filter('.carousel-center').data('top')
                            }, 1).finish();
                        }
                    }, 1);

                    if (window.self === window.top) {
                        $(window).scroll(function() {
                            if ($element.length) {
                                var showcaseTop = $element.offset().top,
                                    showcaseBottom = $element.offset().top + $element.outerHeight(true);

                                if (($(this).scrollTop() + $(this).height() - 100 >= showcaseTop) && ($(this).scrollTop() + 300 <= showcaseBottom)) {

                                    if (!$element.hasClass('open-showcase')) {
                                        $element.addClass('open-showcase');
                                        $carouselImages.each(function() {
                                            $(this).animate({
                                                'left': $(this).data('left'),
                                                'top': $(this).data('top')
                                            }, 600);
                                        })
                                    }
                                } else {
                                    if ($element.hasClass('open-showcase')) {
                                        $element.removeClass('open-showcase');
                                        $carouselImages.not('.carousel-center').animate({
                                            left: featureLeft,
                                            top: featureTop
                                        }, 600);
                                    }
                                }
                            }
                        });
                    }
                }
            })
        }

        if ( $('.mobileVideos-section').length > 0 ) {
            $('.mobileVideos-section .callVideo').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                src: "",
                fixedContentPos: false,
                callbacks: {
                    /*beforeOpen: function() {
                        if(!agentID){
                            $("body").addClass('lockme');
                        }
                    },
                    close: function(){
                        if(!agentID){
                            $("body").removeClass('lockme');
                        }
                    }*/
                }
            });
        }
        // reg ex to escape youtube url
        // var youtube_parser = function (url) {
        //    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        //    var match = url.match(regExp);
        //    return (match&&match[7].length==11)? match[7] : false;
        // }
        if ( $('.videoTestimonial').length > 0 ) {
            $('.videoTestimonial .playVideo').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                src: "",
                fixedContentPos: false,
                callbacks: {
                    /*beforeOpen: function() {
                        if(!agentID){
                            $("body").addClass('lockme');
                        }
                    },
                    close: function(){
                        if(!agentID){
                            $("body").removeClass('lockme');
                        }
                    }*/
                }
            });
        }

        function pixflow_showcase_moved($moveing, $carouselImages) {
            "use strict";

            var current = $moveing,
                all = $carouselImages.length;

            // $carouselImages.find('.showcase-overlay-first').remove();
            // $carouselImages.find('.showcase-overlay-second').remove();

            for (var i = 0; i < all; i++) {
                if (current.index() == all - 1)
                    current = $carouselImages.first();
                else
                    current = current.next();
                if (i == 0 || (i == 3 && all == 5) || (i == 1 && all == 3)) {
                    current.append('<div class="showcase-overlay-first"></div>')
                }
                if ((i == 1 && all == 5) || (i == 2 && all == 5)) {
                    current.append('<div class="showcase-overlay-second"></div>')
                }
            }
        }

        $(function() {
            var vh = window.innerWidth;
            var totelItems = $('.carousel a').length;
            if( totelItems < '5' ){
                totelItems = 1
            }else{
                totelItems = 2
            }
            if (vh > 1023) {
                if (typeof pixflow_shortcodeScrollAnimation == 'function') {
                    pixflow_shortcodeScrollAnimation(totelItems);
                }
            }

            if (vh < 1022) {
                if (typeof pixflow_shortcodeScrollAnimation == 'function') {
                    pixflow_shortcodeScrollAnimation(1);
                }
            }
        });

    var vw = window.innerWidth;

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        update bg fn for mobile and desktop in homepage browse course 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function bgUpdate(el) {
            var vw = window.innerWidth;
            if (vw < '1023') {
                $('.te-browse-courses .grid-annoying li').each(function(index, el) {
                    var getSrc = $(this).find('img').attr('src');
                    $(this).css({
                        "background-image": "url(" + getSrc + ")"
                    });
                    console.log(getSrc);
                });
            } else {
                $('te-browse-courses .grid-annoying li').css('backgroundImage', 'none');
            }
        }
        bgUpdate();

        $(window).resize(function(event) {
            var vw = window.innerWidth;
            bgUpdate();
        });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Call back form popup on footer 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.callAction').length > 0) {
            $('.callAction').magnificPopup({
                type: 'inline',
                fixedContentPos: true,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 350,
                mainClass: 'mfp-with-fade white-bg',
                callbacks: {
                    /*beforeOpen: function() {
                        if(!agentID){
                            $("body").addClass('lockme');
                        }
                    },
                    close: function(){
                        if(!agentID){
                            $("body").removeClass('lockme');
                        }
                    }*/
                }
            });
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Popular course desktop slider 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function desktopSlier(width, panelWidth, items) {
            $('.colcarou').colcarou({
                frame_width: width,
                frame_height: 'auto',
                slide_width: panelWidth,
                items: items
            });
        }

        if ($('.colcarou').length > 0) {
            if (vw < 1025) {
                desktopSlier(940, 190, 4);
                console.log(vw);
            } else {
                desktopSlier(1140, 190, 4);
            }
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Detail page right rail & Nav sticky
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function stickyNav() {
            var el = $('.cover_nav'),
                waypoint = new Waypoint({
                    element: el,
                    handler: function(direction) {
                        if (direction === 'down') {
                            el.addClass('stickMe');
                        } else {
                            el.removeClass('stickMe');
                        }
                    }
                })
        }

        function stickyCall() {
            var el = $('.callToactions'),
                waypoint = new Waypoint({
                    element: $('.targetWaypoint'),
                    handler: function(direction) {
                        if (direction === 'down') {
                            el.addClass('stickMe animated slideInUp');
                        } else {
                            el.removeClass('stickMe animated slideInUp');
                        }
                    }
                })
        }
        if(vw > 1024){
            if( $('.targetWaypoint').length > 0 ){
                stickyCall();
            }
        }

        function navAppend() {
            var el = $('#header'),
                waypoint = new Waypoint({
                    element: $('.videoContainer'),
                    handler: function(direction) {
                        if (direction === 'down') {
                            el.addClass('stickMe');
                        } else {
                            el.removeClass('stickMe');
                        }
                    },
                    offset: -50
                })
        }
        if( $('.videoContainer').length > 0 ){
            navAppend();
        }

        function navShadow() {
            var el = $('#header'),
                waypoint = new Waypoint({
                    element: $('.global-partners-section'),
                    handler: function(direction) {
                        if (direction === 'down') {
                            el.addClass('shadow');
                        } else {
                            el.removeClass('shadow');
                        }
                    },
                    offset: '0%'
                })
        }
        if( $('.global-partners-section').length > 0 ){
            navShadow();
        }
        

        if ($('.cover_nav').length > 0) {
            stickyNav();
        }

        function stickyRaightRail () {
            var summaries = $('.twoColumn-layout .right-te');
            summaries.each(function(i) {
                var summary = $(summaries[i]);
                var next = summaries[i + 1];

                summary.scrollToFixed({
                    marginTop: $('#header').outerHeight(true) + 5,
                    limit: function() {
                        var limit = 0;
                        if (next) {
                            limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                        } else {
                            limit = $('.te-Popular-courses').offset().top - $(this).outerHeight(true) - 10;
                        }
                        return limit;
                    },
                    zIndex: 999
                });
            });
        }
        if ($('.twoColumn-layout .right-te').length > 0) {
            stickyRaightRail();
        }


        /* arrow controller */
        $('#view_Syllabus .panel-body > ul > li').each(function(index, el) {
            if ( $(this).children('strong') ) {
                $(this).addClass('noArrow');
            }
        });


        $('.syntax-list .panel .panel-heading').on('click', function(event) {
            event.preventDefault();
            setTimeout(function(){
                $(window).resize();
            }, 200);
        });



        function triggerResize() {
            waypoint = new Waypoint({
                element: $('.te-Popular-courses'),
                handler: function(direction) {
                    if (direction === 'down') {
                        $(window).resize();
                        console.log('resize fired');
                    }
                },
                offset: '80%'
            })
            waypoint = new Waypoint({
                element: $('.subscibe-section'),
                handler: function(direction) {
                    if (direction === 'down') {
                        $(window).resize();
                        console.log('resize fired');
                    }
                },
                offset: '100%'
            })
        }
        if( $('.twoColumn-layout').length > 0 ){
            // triggerResize();
        }

        var previousBatch = $('.previousbatch ul li');

        if( previousBatch.length > 0 ){
            $('.previousbatchdiv, .navigatBack').show();
        }else{
            $('.previousbatchdiv, .navigatBack').hide();
        }

        /*remove unnecessary div's in detail page*/
        if ( $('.flex-row').length ) {
            $('.flex-row').each(function(index, el) {
                var textLength = $(this).text().trim().length;
                if ( textLength < 1 ) {
                    $(this).hide();
                }
            });
        }
        if ( $('.margin-top-45').length ) {
            $('.margin-top-45').each(function(index, el) {
                var textLength = $(this).text().trim().length;
                if ( textLength < 1 ) {
                    $(this).hide();
                }
            });
        }
        /*Disable click event is no panel text detail page*/
        if ( $('.syntax-list').length ) {
            $('.syntax-list .panel').each(function(index, el) {
                var textLength = $(this).find('.collapse').text().trim().length;
                console.log(textLength);
                if ( textLength < 1 ) {
                    $(this).find('.panel-heading').addClass('eventHand');
                }
            });
        }
        /*remove unnecessary div's in Mega menu*/
        $('.courses').each(function(index, el) {
            var sibling = $(this).find('.list-courses li').length;
            if ( sibling == 0 ) {
                $(this).hide();
            }
        });
        /* no hover effect if no title in detail page */
        $('.grid-annoying li').each(function(index, el) {
            titleRemove = $(this).find('.change-angle h3').text().length;
            if ( titleRemove == 0 ) {
                $(this).addClass('noHover');
            }
        });

        var singleFaculty = $('.instructors-widget');
        if (singleFaculty.length > 0) {
            $('.instructors-widget').each(function(index, el) {
                var facultyLength = $(this).find('.ind-col').length;
                if(facultyLength == 1){
                    $(this).addClass('single')
                }
            });
        } 

        var singleInstitute = $('.wrapAllCourse .card-university').length;
        if(singleInstitute <= 2){
            $('.wrapAllCourse').addClass('single');
        }

        if( vw < 1024 ){
            $('.left-te .enrollCourse > a').attr('href','#moreFocus');
        }
        

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Detail page Video & Img popup scripts 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.playVideo').length > 0) {
            $('.playVideo').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                src: "",
                fixedContentPos: false,
                callbacks: {
                    /*beforeOpen: function() {
                        if(!agentID){
                            $("body").addClass('lockme');
                        }
                    },
                    close: function(){
                        if(!agentID){
                            $("body").removeClass('lockme');
                        }
                    }*/
                }
            });
        }
        if ($('.image-popups').length > 0) {
            $('.image-popups').magnificPopup({
                type: 'image',
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function() {
                        // just a hack that adds mfp-anim class to markup 
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = this.st.el.attr('data-effect');
                        /*if(!agentID){
                            $("body").addClass('lockme');
                        }*/
                    },
                    close: function(){
                        /*if(!agentID){
                            $("body").removeClass('lockme');
                        }*/
                    }
                },
                closeOnContentClick: true,
                midClick: true 
            });
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Scrollspy active classes for navigation 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        if ($('.secondaryNav').length > 0) {
            $('body').scrollspy({target: ".secondaryNav", offset: 72});

            /*Add smooth scrolling on all links inside the navbar*/
            $("#list_scroll a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    console.log(hash);

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 71
                    }, 800, function() {
                        // window.location.hash = '';
                    });
                }
            });

        
            /* remove element if no section is avail in the secondary menu */
            $('.secondaryNav ul li').each(function(index, el) {
                var thisHref = $(el).find('a').attr('href');
                console.log(thisHref);
                if($(' '+ thisHref +' ').length < 1){
                    el.remove();
                    console.log($(''+ thisHref +'').length);
                }
                if( $(el).find('a').attr('href') == '' ){
                    el.remove();
                }
            });
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Filter popup on mobile and desktop 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function filterPop() {
            var vw = $(window).width();
            if ($('.filter-list').length > 0) {
                if (vw < 1023){
                    $('.filter-list').attr({
                        tabindex:'-1',
                        role: 'dialog',
                        ariaLabelledby:'myModalLabel'
                    }).addClass('modal fade').hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').removeClass('in modal-backdrop fade');
                    console.log('Less 1023'); 
                }
                if(vw > 1023){
                    $('.filter-list').removeAttr('tabindex, role, aria-labelledby').removeClass('in modal fade');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').removeClass('in modal-backdrop fade');
                    console.log('Greater 1024');  
                }
            }
        }
        filterPop();

        $(window).resize(function(event) {
            filterPop();
        });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     Popular course animation 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        /*function doAnimate(){
            $('.grid-annoying').waypoint(function(direction) {
                if (direction == "down") {
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(1)').addClass('animated slideInUp block');
                    }, 500);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(3)').addClass('animated slideInUp block');
                    }, 900);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(5)').addClass('animated slideInUp block');
                    }, 1300);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(7)').addClass('animated slideInUp block');
                    }, 1700);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(2)').addClass('animated slideInUp block');
                    }, 2100);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(4)').addClass('animated slideInUp block');
                    }, 2500);
                    setTimeout(function() {
                        $('.grid-annoying li:nth-child(6)').addClass('animated slideInUp block');
                    }, 2900);
                }
            }, {
                offset: '100%'
            })
        }
        if ($('.te-browse-courses').length > 0) {
            if ( vw >= 1024 ) {
                doAnimate();
            }
        }*/


        /* ================ parallax init ========== */
        if($('.parallax').length > 0){
            $('.parallax').parallax();
        }


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Footer fload icons behaviour
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        $(".subscibeAction").click(function() {
            $('html, body').animate({
                scrollTop: $("#subscibe-section").offset().top + 110
            }, 2000);
        });

        // call to icons animations
        var active1 = false;
        var active2 = false;
        var active3 = false;
        var active4 = false;

        $(document).on('click', '.callToactions .toggle_btn', function(event) {
            if (!active1) $(this).parent().find('.test1').css({'transform': 'translate(4rem,-2rem)'});
            else $(this).parent().find('.test1').css({'transform': 'none'}); 
            if (!active2) $(this).parent().find('.test2').css({'transform': 'translate(2em,-4rem)'});
            else $(this).parent().find('.test2').css({'transform': 'none'});
            if (!active3) $(this).parent().find('.test3').css({'transform': 'translate(-3rem,-4rem)'});
            else $(this).parent().find('.test3').css({'transform': 'none'});
            active1 = !active1;
            active2 = !active2;
            active3 = !active3;
        });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Background scroll 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function fixedBody () {
            var fixBody = $('.cd-dropdown.dropdown-is-active').css('visibility');
            if(fixBody === 'visible'){
                $("body").addClass('lockme');
            }else {
                $("body").removeClass('lockme');
            } 
        }
        $(document).on('click', '.cd-dropdown-trigger', function(event) {
            fixedBody();
        });
        $(document).on('click', '.cd-dropdown .cd-close', function(event) {
            $("body").removeClass('lockme');
        });


        $(window).resize(function(event) {
            var focusInField = $('input').is(':focus');
            if (focusInField == true) {
                var noteSelect = document.activeElement.parentNode;
                var scrolltopDiv = $(noteSelect).position().top;
                if ( $('.remodal-is-locked').length > 0 ) {
                    $('.remodal-wrapper').scrollTop(scrolltopDiv+55);    
                }
                if ( vw > 1024 ) {
                    $(window).scrollTop(scrolltopDiv-20);
                }
                console.log(scrolltopDiv);
            }
        });

    /* =================================== 
        user profile script_
    =====================================*/
        $(document).on('click', '.flipkart-refer .btn-normal', function(event) {
            event.preventDefault();
            $(".tabs-left li a[href$='#referEarn']").trigger('click');
            $("html, body").animate({ scrollTop: 0 }, 0);
        });
        $(document).on('click', '.dashboardInfo .btn-normal', function(event) {
            event.preventDefault();
            $(".tabs-left li a[href$='#suggestcourse']").trigger('click');
            $("html, body").animate({ scrollTop: 0 }, 0);
        });

        if ($('.userProfile_wrapper').length > 0) {
            locationHash = window.location.hash;
            setTimeout(function(){
                if (locationHash === '#suggestcourse') {
                    $('ul.nav.nav-tabs a[href="#suggestcourse"]').tab('show');
                    console.log('triggered Suggest Course');
                }
            }, 7000)

            if(window.location.href.indexOf("code") > -1) {
               $('ul.nav.nav-tabs a[href="#referEarn"]').tab('show');
               console.log('fire referEarn tab');
            }
        }

        $('.editableUserTable div.acf-field[data-name="date_of_birth"] .acf-input').append('<i class="fa icon-calendar"></i>');
        $(document).on('click', '.editableUserTable div.acf-field[data-name="date_of_birth"] .acf-input .fa', function(event) {
            $(this).parent().find('.hasDatepicker').trigger('focus');
        });
        
        var flipkartCatd = $('.flipkart-refer');
        flipkartCatd.removeClass('vertical');
        if (flipkartCatd) {
            vw < 1025 ? flipkartCatd.removeClass('vertical') : flipkartCatd.addClass('vertical')
        }

        $('.acf-field-57bc1ef69cf11 input, .acf-field-57bc1f48d23e5 input').attr({
            'placeholder': 'Start Date'
        });
        $('.acf-field-57bc1f109cf12 input, .acf-field-57bc1f48d23e6 input').attr({
            'placeholder': 'End Date'
        });

        
        
        /*sticky flipkart card*/
        if ( $('.flipkart-refer').length > 0 ) {
            if ( vw > 1024 ) {
                var fixElee = $('.flipkart-refer');
                fixElee.each(function(i) {
                    var summary = $(fixElee[i]);
                    var next = fixElee[i + 1];

                    summary.scrollToFixed({
                        marginTop: $('#header').outerHeight(true) + 15,
                        limit: function() {
                            var limit = 0;
                            if (next) {
                                limit = $(next).offset().top - $(this).outerHeight(true) -10;
                            } else {
                                limit = $('.subscibe-section').offset().top - $(this).outerHeight(true) -90;
                            }
                            return limit;
                        },
                        zIndex: 999
                    });
                });
            }
        }

    /* ==============================================
        script for responsive tabs - About us page
    ================================================= */
        if ( $('.responsive-tabs').length > 0 ) {
            $('.responsive-tabs').responsiveTabs({
                accordionOn: ['xs', 'sm'] // xs, sm, md, lg
            });
            $('.offerSection .tab-content .accordion-link').on('click', function(event) {
                event.preventDefault();
            });
        }



    /* ============================================== 
    equal outer height fix - askpro page
    ==============================================*/
        function overflowLevel(argument) {
            $('.overScroll').each(function(index, el) {
                var hi = 0;
                for (h = 0; h < 4; h++) {
                    hi += $(this).find('.checkbox').eq(h).outerHeight();
                    $(this).height(hi);
                }
            });
        }
        if( $('.overScroll').length > 0){
            overflowLevel();
            $(window).resize(function(event) {
                overflowLevel();
            });
        }

});
