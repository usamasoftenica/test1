jQuery(document).ready(function($) {

  'use strict';

//***************************
    // Url base class add
    //***************************

  var path = window.location.href;      
  var target = $('a[href="'+path+'"]');
  target.addClass('active');
target.parents("li.ccg-dropdown").addClass("dropdown-active");




    $(".ccg-dropdown").click(function(){
        $(".ccg-dropdown").not($(this)).removeClass('dropdown-active');
        $(this).toggleClass("dropdown-active");
    });


$("#click").click(function() {
  $(".header-search").addClass("active");
  $(".click").addClass("active");
});

      //***************************
    // Click to Top Button
    //***************************
    jQuery('.top-btn').on("click", function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 3000);
        return false;
    });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
      

});



$('.arrow-drop').click(function () {
  $('.fa-angle-down,.click-drop').removeClass('active');
  $(this).addClass('active');
});

$('.arrow').click(function () {
  $('.arrow-drop,.click-drop').removeClass('active');
});


$(function () {
        $('.select').multipleSelect({
        });
      });


//***************************
    // input calander Function
    //***************************
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('.dp3').datepicker({
      // onRender: function(date) {
      //   return date.valueOf() < now.valueOf() ? 'disabled' : '';
      // }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('.dp4')[0].focus();
    }).data('datepicker');
    var checkout = $('.dp4').datepicker({
      // onRender: function(date) {
      //   return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      // }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');


