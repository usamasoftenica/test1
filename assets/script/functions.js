jQuery(document).ready(function($) {

	'use strict';
    //***************************
    // Sticky Header Function
    //***************************
	  jQuery(window).scroll(function() {
	      if (jQuery(this).scrollTop() > 170){  
	          jQuery('body').addClass("careplus-sticky");
	      }
	      else{
	          jQuery('body').removeClass("careplus-sticky");
	      }
	  });


//***************************
    // Click to Top Button
    //***************************
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 600){  
            jQuery('.top-btn').css('opacity','1');
        }
        else{
            jQuery('.top-btn').css('opacity','0');
        }
    });
    jQuery('.top-btn').on("click", function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


    //***************************
    // BannerOne Functions
    //***************************
      jQuery('.ccg-banner-slide').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          infinite: true,
          dots: false,
          arrows: false,
          // prevArrow: "<span class='slick-arrow-left'><i class='fa fa-angle-left'></i></span>",
          // nextArrow: "<span class='slick-arrow-right'><i class='fa fa-angle-right'></i></span>",
          fade: true,
          speed: 3000,
          responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 400,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });


// var path = window.location.pathname.split("/").pop();
//   var target = $('a[href*="'+path+'"]');
//   target.addClass('active');
// target.parents(".drop > li").addClass("active");


var url = window.location.href;
var target = $('a[href="'+url+'"]');
target.addClass('active');
target.parents(".drop > li").addClass("active");

$('.active').parent('.drop').parent('li').addClass('active-d');
$('li.active-d').children('.arrow-drop').addClass('active');

$('.child-side > ul > li').addClass('abc');



Tu.tScroll({
      't-element': '.fadeLeft,.fadeRight,.fadeIn'
    });


// $(".js-video-button").modalVideo({
//       youtube:{
//         controls:0,
//         nocookie: true
//       }
//     });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});



});


$('.arrow-drop').click(function () {
  $('.arrow-click,.click-drop').removeClass('active');
  $(this).addClass('active');
  // $(this).removeClass('active-ve');
});

$('.arrow').click(function () {
  $('.arrow-drop,.click-drop').removeClass('active');
  // $('.arrow-drop').addClass('active-ve');
});


// jQuery(document).ready(function($) {
//   // $('.arrow-drop').parent('li.active-d').addClass('active-arrow');
// if ($('.arrow-drop').parent('.active-d')) {
//   $('.arrow-drop').addClass('active');
// }else{
//   $('.arrow-drop').removeClass('active');
// }
// });


// $('.drop-ar').click(function () {
//   $('.drop-ar').removeClass('active');
//   $(this).addClass('active');
// });


// $(document).on('click','.arrow-drop.active', function () {
//    $(this).removeClass('active');
//   });

// Add smooth scrolling to all links
      $("a.bottom-scroll").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 1000, function(){
          });
          return false;
        } // End if
      });


       $(document).ready(function(e) {

   // live handler
   lc_lightbox('.elem', {
     wrap_class: 'lcl_fade_oc',
     gallery : true,
     thumb_attr: 'data-lcl-thumb',

     skin: 'minimal',
     radius: 0,
     padding : 0,
     border_w: 0,
   });

 });






          $(document).ready(function(){
            $("#p_show").click(function(){
              $(".p_show").attr("type", "text");
              $("#p_show2").addClass("active");
              $(this).addClass("active");
            });

            $("#cp_show").click(function(){
              $(".cp_show").attr("type", "text");
              $("#cp_show2").addClass("active");
              $(this).addClass("active");
            });

            $("#op_show").click(function(){
              $(".op_show").attr("type", "text");
              $("#op_show2").addClass("active");
              $(this).addClass("active");
            });




            $("#p_show2").click(function(){
              $(".p_show").attr("type", "password");
              $("#p_show").removeClass("active");
              $(this).removeClass("active");
            });

            $("#cp_show2").click(function(){
              $(".cp_show").attr("type", "password");
              $("#cp_show").removeClass("active");
              $(this).removeClass("active");
            });

            $("#op_show2").click(function(){
              $(".op_show").attr("type", "password");
              $("#op_show").removeClass("active");
              $(this).removeClass("active");
            });
          });
