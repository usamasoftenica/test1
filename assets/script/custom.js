"use strict";

// var base_url="https://coloradocampgrounds.us.com/";

var base_url ="http://www.coloradocampgrounds.development-env.com/";

$.validator.addMethod("pwcheck", function(value) {
   return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/.test(value) // consists of only these
     
});
$('#loginFormuser').validate({
	rules:{
		email:{
			required:true,
			maxlength: 100,
		},
		password:{
			required:true,
			maxlength: 100,
		},

	},
	messages:{
		
		email:{
			required:"This Field is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		password:{
			required:"This Field is required",
			maxlength:"Characters must be less than of 100 characters",
		},
	}
	});
$('#subscribe').validate({
	ignore: [],
rules:{
		first_name:{
			required:true,
			maxlength: 100,
		},
		last_name:{
			required:true,
			maxlength: 100,
		},
		city:{
			required:true,
			maxlength: 100,
		},
		country:{
			required:true,
			maxlength: 100,
		},
		apartment:{
			// required:true,
			maxlength: 100,
		},
		
		email:{
			required:true,
			maxlength: 100,
		},
			billing_address:{
			required:true,
			maxlength: 100,
		},
		state:{
			required:true,
			maxlength: 100,
		},
		zip_code:{
			required:true,
			number:true,
			maxlength: 100,
		},
		terms:{
			required:true,
			// maxlength: 100,
		},
		password:{
			required:true,
			minlength:5,
			maxlength: 100,
			pwcheck:true,
		},
		cpassword:{
			required:true,
			
			maxlength: 100,
			equalTo: "#password",
		},
			oldPassword:{
			required:true,
		},
		imageSubscriber:{
                  extension:"jpg|png|jpeg",
		},
    pay:{
         required:true,
    } 
	},
messages:{
		
		first_name:{
			required:"First Name is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		last_name:{
			required:"Last Name is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		city:{
			required:"City is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		country:{
			required:"Country is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		state:{
			required:"State is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		
		apartment:{
			// required:"This Field is required",
			 maxlength:"Characters must be less than of 100 characters",
		},

		email:{
			required:"Email is required",
			 maxlength:"Characters must be less than of 100 characters",
		},
		zip_code:{
			required:"Zip Code is required",
			number:"Only numbers are allowed",
			maxlength:"Characters must be less than of 100 characters",
		},		
		terms:{
			required:"Please accept Terms of Service & Privacy Policy",
			 // maxlength:"Characters must be less than of 100 characters",
		},	
      billing_address:{
      required:"Billing Address is required",
    },			
		password:{
			required:"Password is required",
			minlength:'Your password must be at least 5 characters long, 1 uppercase, 1 lowercase, 1 number & 1 special character (!@#$%^&*) should be included.',
			maxlength:"Characters must be less than of 100 characters",
			pwcheck:"Your password must be at least 5 characters long, 1 uppercase, 1 lowercase, 1 number & 1 special character (!@#$%^&*) should be included.",
		},
		cpassword:{
			required:"Confirm Password is required",
			 maxlength:"Characters must be less than of 100 characters",
			 equalTo: "Password mis-match",
		},
		oldPassword:{
			required:"This Field is required",
		},
	  imageSubscriber:{
	  	  extension:"Only Png and Jpeg images are allowed",
	  },
      pay:{
         required:"Select Payment Type",
    } 	
		
		
							
}

});

$('#comment_post').validate({

	rules:{
				comment:{
					required:true,
          maxlength: 1100,
				},


			},
			messages:{
					
						comment:{
							required:"Comment is required",
				}						
			}
});


$('#coment_reply').validate({
rules:{
				comment:{
					required:true,
          maxlength: 1100,
				},


			},
			messages:{
					
						comment:{
							required:"Reply is required",
				}						
			}
});
 $('#comment_post').submit(function() {

    if($(this).valid()){
    
        
        var comment = $("#comment").val();
        var menuid = $(".menuidpost").val();
        var forum = $("#forum_pages").val() ;
        var menu;
        if(menuid !=''){
          menu=menuid;
        }else{
          menu='NULL';
        }
        var name = $("#names").val();
        var image = $("#image").val();
        var img;
        if(image !=''){
          img=base_url+'uploads/userImages/'+image;
        }else{
          img=base_url+'assets/images/test.jpg';
        }
        var informationalpages_id = $("#pageid").val();
       // alert(pageid);
    //alert(informationalpages_id);
    var strDate = getISODateTime(new Date());
    //var strDate = 'dec 02, 2019' ;
    var html='';

        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestCommentPost',
           type: 'POST',
           data: {informationalpages_id: informationalpages_id, comment: comment, menu:menu,forum:forum},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {

                 html='<p style=color:green;>The comment has been posted and is pending Admin approval.</p>';
               $('#show-m').html( html );
                  $("#comment_post")[0].reset();
           }
        });
    }
    
  });
 $('#comment_post_admin').submit(function() {

  	if($(this).valid()){
        var comment = $("#comment").val();
         var menuid = $(".menuidpost").val();
        var menu;
        if(menuid !=''){
          menu=menuid;
        }else{
          menu='NULL';
        }
        var name = $("#names").val();
        var image = $("#image").val();
        var img;
        if(image !=''){
        	img=base_url+'uploads/userImages/'+image;
        }else{
        	img=base_url+'assets/admin/img/logo.png';
        }
        var informationalpages_id = $("#pageid").val();
       // alert(pageid);
		//alert(informationalpages_id);
		var strDate = getISODateTime(new Date());
		//var strDate = 'dec 02, 2019' ;
		var html='';

        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestCommentPostAdmin',
           type: 'POST',
           data: {informationalpages_id: informationalpages_id, comment: comment,menu:menu},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {
           // alert(comment);
             html='';
           
               html='<div class="thumb-list"><figure><img alt="" src="'+img+'"><a class="comment-reply-link comment-replyssadmin" href="javascript:void(0)" data-id="'+id+'">Reply</a></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit comment-edit-'+id+'" href="javascript:void(0)" data-id='+id+' data-message="'+comment+'">Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-'+id+'">'+comment+'</p></div></div><ul class="children"><li class="reply-go-'+id+'"></li></ul>';

               $('.new-comment-load-first-1').prepend( html );
                 	$("#comment_post_admin")[0].reset();
           }
        });
    }
    
  });
 $(document).on('click','.comment-replyss',function(){
 // $('.comment-replyss').click(function() {
    //alert('123');

  var id=$(this).attr('data-id');
  var menu_id=$(this).attr('data-menuid');

  $('#reply-modal').modal('show'); 
  $('.inputhidden').val(id);
  $('.menuid').val(menu_id);
  //alert(id);
  
    });
  $('#coment_reply').submit(function(e) {


    if($(this).valid()){
    e.preventDefault();
    // alert('amir ishaque');
    $('#reply-modal').modal('hide'); 
    // $('#myModal').modal('hide');
      // var name = $("#name").val();
     var comment_id = $(".inputhidden").val();
     var detect_forum_reply = $('#detect_forum-reply-information').val() ;

     var menuid = $(".menuid").val();
     //alert(menuid);
     var menud;
     if(menuid !=''){
      menud=menuid;
     }else{
      menud='NULL';
     }
     //alert(menud);
        var comment_reply = $(".coms").val();
        //alert(comment_reply);
        var name = $("#names").val();
        var image = $("#image").val();
        var img;
        if(image !=''){
          img=base_url+'uploads/userImages/'+image;
        }else{
          img=base_url+'assets/images/test.jpg';
        }
    //alert(comment_reply);
  var html='';
    var strDate = getISODateTime(new Date());
    //var strDate = 'dec 02, 2019' ;
        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestReply',
           type: 'POST',
           data: {comment_id: comment_id, comment_reply: comment_reply,menud:menud,detect_forum_reply:detect_forum_reply},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {
             var html1='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Your reply is posted and is pending Admin approval.</strong> </div>'
            $('.edit-comment-thumb-list-'+comment_id).after(html1) ;
             //$('.uprove-rep-custom-'+comment_id).text("Your reply is posted and is pending Admin approval.");

                  $("#coment_reply")[0].reset();

           }
        });
    }
  });
 $(document).on('click','.comment-replyssadmin',function(){
 // $('.comment-replyss').click(function() {
    //alert('123');

	var id=$(this).attr('data-id');
  var menuid = $(this).attr('data-menuid');
 // alert(menuid);
	$('#reply-modal-admin').modal('show'); 
	$('.inputhidden').val(id);
  $('.menuid').val(menuid);
	//alert(id);
	
    });
  $('#coment_reply_admin').submit(function(e) {
  	if($(this).valid()){
  	e.preventDefault();
  	// alert('amir ishaque');
  	$('#reply-modal-admin').modal('hide'); 
  	// $('#myModal').modal('hide');
  		// var name = $("#name").val();
     var comment_id = $(".inputhidden").val();
    // alert(comment_id);
    var menuid = $(".menuid").val();
     //alert(menuid);
     var menud;
     if(menuid !=''){
      menud=menuid;
     }else{
      menud='NULL';
     }
        var comment_reply = $("#commentss").val();
        var name = $("#names").val();
        var image = $("#image").val();
        var img;
        if(image !=''){
        	img=base_url+'uploads/userImages/'+image;
        }else{
        	img=base_url+'/assets/admin/img/logo.png';
        }
		//alert(comment_reply);
	var html='';
		var strDate = getISODateTime(new Date());
		//var strDate = 'dec 02, 2019' ;
        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestReplyAdmin',
           type: 'POST',
           data: {comment_id: comment_id, comment_reply: comment_reply,menud:menud},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {
              
               //  html='<div class="thumb-list"><figure><img alt="" src="http://localhost/colorado/assets/images/test.jpg"></figure> div class="text-holder"><h6>Admin</h6> <time class="post-date" datetime="">dec 02,19</time><br><p>'+comment_reply+'</p></div></div>';
                 html='<div class="thumb-list"><figure><img alt="" src="'+img+'"></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message="'+comment_reply+'">Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>'
              $('.reply-go-'+comment_id).prepend(html); 
                 	$("#coment_reply_admin")[0].reset();


           }
        });
    }
  });
    $(document).on('click','.delete_comment', function(){
  var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this comment?';
    var url = base_url+'/user/UserController/delete_comment';
    delete_f(head_title, title, url, id);
});
    $(document).on('click','.imsgeromove', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to remove this image?';
    var url = base_url+'/user/UserController/update_imge';
    delete_f(head_title, title, url, id);
});
   $('.submenus').click(function() {
    
  var id=$(this).attr('data-id');
  $('.menuidpost').val(id);
	var count=$(this).attr('data-count');
	//alert(count);

	  $.ajax({
           url: base_url+'/user/UserController/get_item',
           type: 'POST',
           data: {id: id },
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(data) {
           	 var obj = $.parseJSON(data);
           	
              var html='';
               $(".submenueshow").html('<h6>'+obj[3]['name']+'</h6><p>'+obj[3]['description']+'</p>');
               $('.subminues-comments').remove();
               $('.submenusshow').html(obj[0]);
           }
        });
	
    });

   function delete_f(head_title, title, url, id)
 {
 	 $.confirm({
    title: head_title,
    content: title,
    buttons: {
        confirm: function () {

                      $.ajax({
                     url:url,
                     type:"POST",
                      data: {'id' : id },
                      success: function(data){
                      	if (data == '0') {
                      		    toastr.error("Not delete");
                      	}
                      	else{
                      		location.reload();
                      	}
                      
                    
                   }
                 });


        },
        cancel: function () {
          //  $.alert('Canceled!');
        },
      
    }
});

 }
  $(document).on('click','.comment-edit-reply-admin',function(){
  //$('.comment-replyss').click(function() {
    
  var id=$(this).attr('data-id');
  var message=$(this).attr('data-message');
 // alert(id);
  $('#reply-modal-edit-reply-admin').modal('show'); 
  $('.inputhidden').val(id);
  $('#commentss-edit-reply').val(message);

  
    });


  $('#coment_edit_replyss_admin').submit(function(e) {

    e.preventDefault();
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply-admin").val();
    var strDate = getISODateTime(new Date());
        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestCOmmentReplyEditAdmin',
           type: 'POST',
           data: {reply_id: reply_id, comment: comment},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {
            var html='';
                html=comment;
              
               $('.thumb-list-repy-'+reply_id).html( html );
               $('.comment-edit-reply-admin-'+reply_id).attr('data-message',html);
               $('#reply-modal-edit-reply').modal('hide'); 

           }
        });
   // }
  });


  $(document).on('click','.comment-edit-admin',function(){
    
	var id=$(this).attr('data-id');
	var message=$(this).attr('data-message');
	$('#reply-modal-edit-admin').modal('show'); 
	$('.inputhidden').val(id);
	$('#commentss-edit-admin').val(message);

	
    });
  $('#coment_edit_admin').submit(function(e) {
  	e.preventDefault();

     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();
	
		var strDate = getISODateTime(new Date());
        $.ajax({
           url: base_url+'/user/UserController/ajaxRequestCOmmentEditAdmin',
           type: 'POST',
           data: {comment_id: comment_id, comment: comment},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(id) {
           	var html='';

                html=comment;
               $('.thumb-list-'+comment_id).html( html );
               $('.comment-edit-'+comment_id).attr('data-message',html);
                $('#reply-modal-edit').modal('hide');

           }
        });
   // }
  });

 $('.load-more-btn').click(function(){
  // alert('123');
  var count=$(this).attr('data-count');
  var id=$(this).attr('data-id');
        $.ajax({
           url: base_url+'/user/UserController/information_nextLoad',
           type: 'POST',
           data: {id:id,count: count },
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(data1) {
            // alert(data);
            // alert('123');
            var data= JSON.parse(data1);
           
            if((parseInt(count)+10)>=data[2]){
              $('#load-more-btn-1').html('');
            }
  $( "#load-more-btn-1" ).before( data[0] );
  var count1=Number(data[1])+Number(10);
  // alert(count1);
   $('.load-more-btn').attr('data-count',count1); 
           }
        });
 })
 $('.load-more-btn-home').click(function(){
  // alert('123');
  var count=$(this).attr('data-count');
  var id=$(this).attr('data-id');
        $.ajax({
           url: base_url+'/HomeController/information_nextLoad',
           type: 'POST',
           data: {id:id,count: count },
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(data1) {
            // alert(data);
           var data= JSON.parse(data1);
  $( ".center" ).prepend( data[0] );
  var count1=Number(data[1])+Number(10);
  //alert(count1);
   $('.load-more-btn-home').attr('data-count',count1);
           }
        });
 })
 function getISODateTime(d){
    // padding function
    var s = function(a,b){return(1e15+a+"").slice(-b)};

    // default date parameter
    if (typeof d === 'undefined'){
        d = new Date();
    };

    // return ISO datetime
    return d.getFullYear() + '-' +
        s(d.getMonth()+1,2) + '-' +
        s(d.getDate(),2) + ' ' +
        s(d.getHours(),2) + ':' +
        s(d.getMinutes(),2);
}
//site desc


 $(".site-parent").click(function () {
     // alert('ok');
       var id=$(this).attr('data-id');
        var idpr=$(this).attr('data-id-pr');
    // alert(idpr);
      $('#p_id').val(idpr);
      $('#c_id').val(id);
     $('.parent-cc').remove();
     $("#test-data").css("display", "block");
     $("#campsites-paginate-1").css({ display: "block" });
    function_name();
});
 $(".site-child").click(function () {

     var id=$(this).attr('data-id');
     var idpr=$(this).attr('data-id-pr');
     var site_id=$(this).attr('data-id-site') ;

     $(this).addClass('active') ;
    // alert(idpr);


      $('#p_id').val(idpr);

      if( id != "" ){

        $('#c_id').val( id );
      }

      
     $('#s_id').val(site_id);
     $('.child-cc').remove();
    
   $("#test-data").css("display", "block");   
     $("#campsites-paginate-1").css({ display: "block" });

      function_name();
      $('.child-icon').show('slow');
      $('.disc-c').show('slow');
});

 window.onload = checkCookie() ;

  function checkCookie()
  {
    
    if(document.cookie !="")
    {
      var parent = document.cookie; 

      var parent = parent.slice(9, 11);

      setTimeout(function(){
        $('#parent-'+parent).trigger( "click" ) ;
        document.cookie = "username= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
    }, 1000);
      
    }
    
   }

   $('.child-parent-adl').click(function () {
      document.cookie = "username="+$(this).attr('data-id')+"expires= SAT, 18 April 2021 20:00:00 UTC; path=/ " ;

   })   


 $('.new-details-parent').click(function () {
   var slug=$(this).attr('data-id');
  
    var details=$('.data-id-'+slug).val();
    var link=$('.data-link-'+slug).val();
    var camoSite=$('.data-campSite-'+slug).val();
    var title=$('.data-title-'+slug).val();

    
    if(link == "")
    {
        $('#y_link').hide() ;
    }else{
        $('#y_link').show() ;
        $('#youtube_custom').attr('src',link) ;
    }

    if(camoSite == "")
    {
        $('m-ggl').hide() ;
    }else{

      $('#map-custom').html("Click here to access a Google Map and directions to the campground from your location") ;
     
      $('#map-custom').attr('href',camoSite) ;
    }


   
    $('.campground-map').show() ;
    $('.chose-campground').hide() ;

    $('#p-title').text(title) ;
  
    

    $('.region-cc,.parent-cc').html(details);
 });



  $('.drop-ar').click(function () {
 $(".drop-ar").removeClass("active");
 $(this).addClass('active');
 });
   //window.onload = function_name()
        function function_name () {
          $('.region-cc').remove();
          var html='';
           var childID=$('#c_id').val();
         var parent_id=$('#p_id').val();
         var site_id=$('#s_id').val();
         var subc = $('#non-sbc').val() ;
        
         //alert($('#c_id').val());
        var sorting='12';
             var length=10;

$('#campsites-paginate-1').pagination({

    total: 1, //
    current: 1, //
    length: length, //
    size: 1, //

    ajax: function(options, refresh, $target){



        $.ajax({
            url: base_url+'site-descriptions',
            type: 'POST',
            data:{
                current: options.current,
                length: options.length,
                sorting: sorting,
                childID: childID,
                parent_id:parent_id,
                site_id:site_id,



            },
            dataType: 'json'
        }).done(function(res){
          var html='';
        if(res['sitedescription'].length!=0)
        {
            var sitedescription=res['sitedescription'];
            var sitedescription_pics=res['sitedescription_pics'];
            var campings=res['campings'];
            var views=res['views'];
            var waters=res['waters'];
            var sewers=res['sewers'];
            var amps=res['amps'];
            var tables=res['tables'];
            var favoriteCampsit=res['favorite'];
            for (var i = 0 ; i <sitedescription.length; i++) {
                var site_no='';
                   if(sitedescription[i]['site_no'] != null &&  sitedescription[i]['site_no'] != ''){
                 site_no= ' '+sitedescription[i]['site_no'];

              }
              else{
                  site_no= '';
              }
                var site_pics='';

               if(sitedescription_pics != null && sitedescription_pics!=''){

                var ii=0;
                   var img='';
                       for (var s = 0 ; s <sitedescription_pics[sitedescription[i]['siteId']].length; s++) {
                        // alert(sitedescription_pics[s]['sitePic']);
                              if(ii == 0){
                                img='<img style="width:156px;" src="'+base_url+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" alt="">';
                              }else{
                                img='';
                              }
                           site_pics+='<a class="elem" rel="section-'+sitedescription[i]['siteId']+'" href="'+base_url+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" data-lcl-thumb="'+base_url+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'">'+img+'</a>';
                           ii++;
               }}
               else{
                site_pics='N/A';
               }
              var site_img= '';
              var img_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['sp_image'] != null &&  sitedescription[i]['sp_image'] != '')
              {
              site_img= '<span data-toggle="tooltip" data-placement="left"  title="Spacing"><img src="'+img_url+''+sitedescription[i]['sp_image']+'" alt="..." ></span>'
           }
             else if(sitedescription[i]['sp_name'] != null &&  sitedescription[i]['sp_name'] != ''){
                     site_img= '<span data-toggle="tooltip" data-placement="left" title="Spacing">'+sitedescription[i]['sp_name']+'</span>';
           }
               else{
                     site_img= '<span data-toggle="tooltip" data-placement="left" title="Spacing"> N/A </span>';
               }

          var des_view = sitedescription[i]['viewType'].split('@@');
          var view_image='';
          var viewimg_url=base_url+'uploads/SideParameter/';
           var view_type='';
            var found_view='';
                     for (var v=0; v<views.length; v++) {
                      if(jQuery.inArray(views[v]['view_id'], des_view) != -1) {
                                 if(views[v]['view_image'] != null && views[v]['view_image'] != ''){
                                     view_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+views[v]['view_name']+'" src="'+viewimg_url+''+views[v]['view_image']+'"  alt="..."></span>';
                                 }
                         else if(views[v]['view_name'] !=null && views[v]['view_name']!='' ){
                                   view_type+='<span>'+views[v]['view_name']+'</span>';
                         }
                         else{
                            view_type='<span>N/A</span>';
                         }
                        }
                     }
          var des_camp = sitedescription[i]['campType'].split('@@');
          var camp_image='';
          var campimg_url=base_url+'uploads/SideParameter/';
           var camp_type='';
            var found_camp='';

                     for (var c = 0 ; c <campings.length; c++) {
                         if(jQuery.inArray(campings[c]['camping_id'], des_camp) != -1){
                         if(campings[c]['camping_image'] != null && campings[c]['camping_image'] != '' ){

                                     camp_type+='<span><img  data-toggle="tooltip" data-placement="left"  title="'+campings[c]['camping_name']+'" src="'+campimg_url+''+campings[c]['camping_image']+'" alt="..."></span>';
                         }
                         else if(campings[c]['camping_name'] !=null && campings[c]['camping_name']!='' ){
                                   camp_type+='<span>'+campings[c]['camping_name']+'</span>';
                         }
                         else{
                            camp_type='<span>N/A</span>';
                         }
                        }
                     }
          //3rd td start
          // for length tariler
          var lengthTrailer='';
          if(sitedescription != null && sitedescription !=''){
            // sitedescription[i]['lengthTrailer'] +' ft'
                lengthTrailer='<img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['lengthTrailer']+' ft" src="'+base_url+'assets/images/icons/Length.png" alt=""><small>'+sitedescription[i]['lengthTrailer']+' ft</small>';
          }
         // for grade
           var grade_img='';
              var gradleimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['grade_image'] != null &&  sitedescription[i]['grade_image'] != '')
              {
             grade_img= '<img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['grade_name']+'" src="'+gradleimg_url+''+sitedescription[i]['grade_image']+'" alt="..."><small>'+sitedescription[i]['grade_name']+'</small>';
           } else if(sitedescription[i]['grade_name'] !=null && sitedescription[i]['grade_name'] !='' ){
                                  grade_img=sitedescription[i]['grade_name'] +' <br>';
                         }else{
                            grade_img='N/A';
                         }


             //for base
              var base_img='';
              var baseimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['base_image'] != null &&  sitedescription[i]['base_image'] != '')
              {
             base_img= '<img data-toggle="tooltip"" data-placement="left"  title="'+sitedescription[i]['base_name']+'" src="'+baseimg_url+''+sitedescription[i]['base_image']+'" alt="..."><small>'+sitedescription[i]['base_name']+'</small> ';
           }
                 else if(sitedescription[i]['base_name'] !=null && sitedescription[i]['base_name'] !='' ){
                                  base_img=sitedescription[i]['base_name'];
                         }
                         else{
                            base_img='N/A';
                         }
                        var aces_img='';
              var acesimg_url= base_url+'uploads/SideParameter/' ;
              if(sitedescription[i]['acess_image'] != null &&  sitedescription[i]['acess_image'] != '')
              {
             aces_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['acess_name']+'" src="'+acesimg_url+''+sitedescription[i]['acess_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['acess_name'] !=null && sitedescription[i]['acess_name'] !='' ){
                                  aces_img=sitedescription[i]['acess_name'];
                         }
                         else{
                            aces_img='N/A';
                         }


          var des_amps = sitedescription[i]['amps'].split('@@');
          var amp_image='';
          var ampimg_url=base_url+'uploads/SideParameter/';
           var amp_type='';
            var found_amp='';
            if(sitedescription[i]['electric']=='Yes'){

                     for (var a = 0 ; a <amps.length; a++) {
                          // found_amp = amps[a]['amp_id'].includes(des_amps);
                         // alert(found_view);
                        if(jQuery.inArray(amps[a]['amp_id'], des_amps) != -1){
                         if(amps[a]['amp_image'] != null && amps[a]['amp_image'] != '' ){

                            amp_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+amps[a]['amp_name']+'" src="'+ampimg_url+''+amps[a]['amp_image']+'" alt="..."><small></small></span>';

                         }
                         else if(amps[a]['amp_name'] !=null && amps[a]['amp_name']!='' ){
                                   amp_type+='<span>'+amps[a]['amp_name'] +' AMPS </span>' ;
                         }
                         else{
                            amp_type='<span>N/A</span>';
                         }

                     }
                 }
             }

                      var des_water = sitedescription[i]['water'].split('@@');
          var water_image='';
          var waterimg_url=base_url+'uploads/SideParameter/';
           var water_type='';
            var found_water='';
                     for (var w = 0 ; w <waters.length; w++) {
                        if(jQuery.inArray(waters[w]['water_id'], des_water) != -1){
                         if( waters[w]['water_image'] != null && waters[w]['water_image'] != '' ){

                                     water_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+waters[w]['water_name']+'" src="'+waterimg_url+''+waters[w]['water_image']+'" alt="..."><small>'+waters[w]['water_name']+'</small></span>';
                         }
                         else if(waters[w]['water_name'] !=null && waters[w]['water_name']!='' ){

                           if(waters[w]['water_name'] == "No")
                                    {
                                         water_type+='';
                                    }else{
                                        water_type+='<span data-toggle="tooltip" data-placement="left"  title="Water" >'+waters[w]['water_name'] +'</span>';
                                    }

                         }
                         else{
                            water_type='<span>N/A</span>';
                         }

                     }
                 }
                      var des_sewer = sitedescription[i]['sewer'].split('@@');
          var sewer_image='';
          var sewerimg_url=base_url+'uploads/SideParameter/';
           var sewer_type='';
            var found_sewer='';
            if(sitedescription[i]['electric']=='Yes' || sitedescription[i]['electric']=='yes'){
            var electric='<span><img  data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['electric']+'" src="'+base_url+'assets/images/icons/plug.png" alt=""></span>'
        }else{
            var electric=''
        }
                     for (var s = 0 ; s <sewers.length; s++) {
                          found_sewer = sewers[s]['sewer_id'].includes(des_sewer);
                         // alert(found_view);
                          if(jQuery.inArray(sewers[s]['sewer_id'], des_sewer) != -1){
                         if(sewers[s]['sewer_image'] != null && sewers[s]['sewer_image'] != '' ){

                                     sewer_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+sewers[s]['sewer_name']+'" src="'+sewerimg_url+''+sewers[s]['sewer_image']+'" alt="..."><small>'+sewers[s]['sewer_name']+'</small></span>';
                         }
                         else if(sewers[s]['sewer_name'] !=null && sewers[s]['sewer_name']!='' ){

                           if(sewers[s]['sewer_name'] == "No")
                                    {
                                         sewer_type+='';
                                    }else{
                                       sewer_type+='<span data-toggle="tooltip" data-placement="left"  title="Sewer" >'+sewers[s]['sewer_name']+'</span>';
                                    }

                         }
                         else{
                            sewer_type='<span>N/A</span>';
                         }

                     }}
                        var wifi_img='';
              var wifiimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['wifi_image'] != null &&  sitedescription[i]['wifi_image'] != '')
              {
             wifi_img= '<img  data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['wifi_name']+'" src="'+wifiimg_url+''+sitedescription[i]['wifi_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['wifi_name'] !=null && sitedescription[i]['wifi_name'] !='' ){

               if(sitedescription[i]['wifi_name'] == "No")
                                    {
                                         wifi_img+='';
                                    }else{
                                       wifi_img=sitedescription[i]['wifi_name'];
                                    }

                         }
                         else{
                            wifi_img='N/A';
                         }
                      //for cable
                        var cable_img='';
              var cableimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['cable_image'] != null &&  sitedescription[i]['cable_image'] != '')
              {
             cable_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['cable_name']+'" src="'+cableimg_url+''+sitedescription[i]['cable_image']+'" alt="..."> <small>'+sitedescription[i]['cable_name']+'</small>';
           }
            else if(sitedescription[i]['cable_name'] !=null && sitedescription[i]['cable_name'] !='' ){

               if(sitedescription[i]['cable_name'] == "No")
                                    {
                                         cable_img+='';
                                    }else{
                                       cable_img=sitedescription[i]['cable_name'];
                                    }

                         }
                         else{
                            cable_img='N/A';
                         }
                         //for verizon
                          var verizon_img='';
              var verizonimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['verizon_image'] != null &&  sitedescription[i]['verizon_image'] != '')
              {
             verizon_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+''+sitedescription[i]['verizon_image']+'" alt="..."> <small>'+sitedescription[i]['verizon_name']+'</small> ';
           }
            else if(sitedescription[i]['verizon_name'] !=null && sitedescription[i]['verizon_name'] !='' ){

               if(sitedescription[i]['verizon_name'] == "No")
                                    {
                                         verizon_img+='';
                                    }else{
                                        verizon_img=sitedescription[i]['verizon_name'];
                                    }

                         }
                         else{
                            verizon_img='N/A';
                         }
                         var barICon='';
            if(sitedescription[i]['coverage']!=null && sitedescription[i]['coverage']!='')
            {
                if(sitedescription[i]['coverage']=='1bar'){
                    barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'1-Bar.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';
                }else if(sitedescription[i]['coverage']=='2bar'){
                    barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'2-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';

                }else if(sitedescription[i]['coverage']=='3bar'){
                    barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'3-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';

                }
                else if(sitedescription[i]['coverage']=='4bar'){
                    barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'4-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small> ';

                }else{
                 // barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+'No-Bars.png" alt="..."> ';
                    barICon = "";
                }
            }


            //for 8th td
               var shade_img='';
              var shadeimg_url= base_url+'uploads/SideParameter/';
              if(sitedescription[i]['shade_image'] != null &&  sitedescription[i]['shade_image'] != '')
              {
             shade_img= '<img  data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['shade_name']+'" src="'+shadeimg_url+''+sitedescription[i]['shade_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['shade_name'] !=null && sitedescription[i]['shade_name'] !='' ){
                                  shade_img=sitedescription[i]['shade_name'];
                         }
                         else{
                            shade_img='N/A';
                         }

               //for 9th td
                      var des_table = sitedescription[i]['s_table'].split('@@');
          var table_image='';
          var tableimg_url=base_url+'uploads/SideParameter/';
           var table_type='';
            var found_table='';
                     for (var t = 0 ; t <tables.length; t++) {
                          found_table = tables[t]['table_id'].includes(des_table);
                         // alert(found_view);
                          if(jQuery.inArray(tables[t]['table_id'], des_table) != -1){
                         if(tables[t]['table_image'] != null && tables[t]['table_image'] != '' ){

                                     table_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+tables[t]['table_name']+'" src="'+tableimg_url+''+tables[t]['table_image']+'" alt="..."></span>';
                         }
                         else if(tables[t]['table_name'] !=null && tables[t]['table_name']!='' ){

                           if(tables[t]['table_name'] == "None")
                                    {
                                         table_type+='';
                                    }else{
                                       table_type+='<span>'+tables[t]['table_name']+'</span>';
                                    }

                         }
                         else{
                            table_type='N/A';
                         }
                        }
                     }
                     if(sitedescription[i]['favourite']=='1')
                     {
                        var likeFav='<section class="fav-like">Recomended Campsite</section><br><br><br>';
                     }else{
                         var likeFav=' ';
                     }
                     var mango=0;
                     for(var fv8=0;fv8<favoriteCampsit.length;fv8++){
                        if(favoriteCampsit[fv8]['campsite_id']==sitedescription[i]['siteId']){
                           var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="dislike"><i style="color:red" data-toggle="tooltip" data-placement="left" title="Unlike" class="fa fa-heart"></i></a>';
                            mango++;

                        }
                     }
                     if(mango==0)
                     {
                        var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="like"><i data-toggle="tooltip" data-placement="left" title="Like" class="fa fa-heart-o"></i></a>';
                     }

                     var toilet = "<img data-toggle='tooltip' title='"+sitedescription[i]['yardToilet']+" yards' src='"+base_url+"assets/images/icons/60.png' /><small>"+sitedescription[i]['yardToilet']+" yards</small>" ;
                     var water = "<img data-toggle='tooltip' title='"+sitedescription[i]['yardWater']+" yards' src='"+base_url+"uploads/SideParameter/2020_03_24_06_56_42.png' /><small>"+sitedescription[i]['yardWater']+" yards</small>";
                     var trash = "<img data-toggle='tooltip' title='"+sitedescription[i]['yardTrash']+" yards' src='"+base_url+"assets/images/icons/70.png' /><small>"+sitedescription[i]['yardTrash']+" yards</small>" ;


                       if(sitedescription[i]['yardToilet'] == 0)
                     {
                        var toiletYArd = "" ;
                     }else{
                       var toiletYArd = toilet ;
                     }

                      if(sitedescription[i]['yardWater'] == 0)
                     {
                        var waterYard = "" ;
                     }else{
                       var waterYard = water ;
                     }


                     if(sitedescription[i]['yardTrash'] == 0)
                     {
                        var yardTrash = "" ;
                     }else{
                       var yardTrash = trash ;
                     }

                     if(sitedescription[i]['map_link'] == null || sitedescription[i]['map_link'] == "")
                     {

                        var pindrop = '' ;
                     }else{

                       var pindrop = '<a target="_blank" data-placement="left" data-toggle="tooltip" title="Map Pindrop" href="'+sitedescription[i]['map_link']+'" style="font-size:20px;" class="fa fa-map-marker"></a><br>' ;
                     }

               html+=' <tr class="fav-like-wrap"><td>'+likeFav+' <span>Site #'+site_no+'</span><span>'+site_pics+'</span>'+site_img+' <span>'+view_type+'</span>'+pindrop+''+likef+'</td><td>'+camp_type+'<span><img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noGuest']+' rel="gallery0" src="'+base_url+'assets/images/icons/guests.png" alt=""><small>'+sitedescription[i]['noGuest']+'</small></span><span><img  data-toggle="tooltip" data-placement="left" title='+sitedescription[i]['pets']+' src="'+base_url+'assets/images/icons/Pets.png" alt=""><small>'+sitedescription[i]['pets']+'</small></span><span><img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noVehicle']+' src="'+base_url+'assets/images/icons/Car.png" alt=""><small>'+sitedescription[i]['noVehicle']+'</small></span></td> <td><span>'+lengthTrailer+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['grade_name']+'">'+grade_img+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['base_name']+'">'+base_img+'</span></td><td><span>'+aces_img+'</span></td><td><span>'+electric+'</span>'+amp_type+'</td> <td>'+water_type+''+sewer_type+'</td> <td><span>'+wifi_img+'</span><span>'+cable_img+'</span><span>'+verizon_img+'</span><span>'+barICon+'</span></td> <td><span>'+shade_img+'</span></td><td>'+table_type+'</td><td><span>'+toiletYArd+'</span><span>'+waterYard+'</span><span>'+yardTrash+'</span></td></tr> ';
            };
           $("#htmlShow").html(html);
        }else{
             $("#htmlShow").html('<span>No Record Found</span>');
        }
        res.total=res['total'];
            refresh({
                total: res.total,
                length: length
            });

              
              if(res['free_trial'] != 0){
                $('.favourite-user').hide()
              }
   
        }).fail(function(error){

        });
    }
});

  }

  function num(selector){
  selector.value = selector.value.replace(/[^0-9]/g,'');
}


$('#subscribe-user').validate({

 rules:{

   email:{
    required:true,
   },
   

 },
 messages:{

   email:{
     required:"Email is required",
   }
 }

});


$( "#subscribeers-custom" ).click(function() {

        

        if($("#subscribe-user").valid()){

          var email = $('#sub-email').val() ;

               $.ajax({
           url: base_url+'/HomeController/subscriberOnly',
           type: 'POST',
           data: {email: email},
           error: function() {
              $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});;
           },
           success: function(status) {

               if(status == "true")
               {
                  $("#sub-suc-msg").text("Subscribed Successfully") ;
                  $('#sub-suc-msg').css('color','green');
                  $('#sub-email').val('') ;
               }else{

                 $("#sub-suc-msg").text("Email already exsit") ;
                $('#sub-suc-msg').css('color','red');
               }
              
            }
        });

        }

    
});



//testing
  $(document).on('click','.favourite-user', function () {
    var id=$(this).attr("data-id");
    var fav=$(this).attr("data-fav");
       $.ajax({
                     url:base_url+'add-to-favorite',
                     type:"POST",
                      data: {'id' : id,'fav':fav },
                      success: function(data){
                        // alert(data);
                        if(data==1)
                        {
                        
                          $('.heart-'+id).html('<i style="color:red" data-toggle="tooltip" title="Unlike" class="fa fa-heart"></i>');  
                          $('.heart-'+id).attr("data-fav",'dislike');
                        }else if(data==2){
                              toastr.success("This campsite is already added in your favorite list");
                          
                        }else if(data==3)
                        {
                         
                             $('.heart-'+id).html('<i style="color:black"  data-toggle="tooltip" title="Like" class="fa fa-heart-o"></i>'); 
                              $('.heart-'+id).attr("data-fav",'like');
                        }else if(data==4)
                        {
                            toastr.success("This campsite is not available in your favorite list");
                        }else{
                            // location.reload();
                        }
                      }
                  });
   
  });

$(".arrow-show-detail").on("click" , function(){
  $(this).prev().click()
})