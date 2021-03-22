//var base_urlInfor="http://www.backend.development-env.com/colorado-campgrounds/";

//var base_urlInfor="http://www.backend.development-env.com/coloradonew/";
var base_urlInfor="http://www.coloradocampgrounds.development-env.com/";

jQuery.validator.addMethod("customRule", function(value, element) {
    return this.optional(element) || /^[\w-]+$/i.test(value);
    // here add dash in character class-^^^^-----
}, "Letters, numbers, dashes and underscores only please"); 


  

$('#edit_information_page').validate({
rules:{
		name:{
			required:true,
			maxlength: 100,
		},
		slug:{
			required:true,
			maxlength: 100,
			customRule: true,

		},
		color:{
			required:true,
			maxlength: 100,
		},	
		descriptin_meta_tag:{
			required:true,
			maxlength: 160,
		},
		title:{
			required:true,
			maxlength: 100,
		},
		keyword:{
			required:true,
			maxlength: 100,
		},
		 ebanner: {
                
                extension: "jpg|png"
            },
	},
messages:{
		name:{
			required:"Name is required",
			  maxlength:"Name must be less than of 100 characters",
		},
		color:{
			required:"Color is required",
			  maxlength:"Color must be less than of 100 characters",
		},
		ebanner:{
			//required:"Banner is required",
 			extension: "Only image type jpg,png is allowed",
		},
		alt:{
			required:"Alt is required",
 			maxlength:"Alt must be less than of 100 characters",
		},
		slug:{
			required:"Slug is required",
			  maxlength:"Slug must be less than of 100 characters",
		},
		descriptin_meta_tag:{
			required:"Descriptin meta tag is required",
			  maxlength:"Descriptin meta tag must be less than of 160 characters",
		},
		title:{
			required:"Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},							
		keyword:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},

}

});






$('#add_information_page').validate({
rules:{
		name:{
			required:true,
			maxlength: 100,
		},
		slug:{
			required:true,
			maxlength: 100,
			customRule: true,

		},
		color:{
			required:true,
			maxlength: 100,
		},	
		descriptin_meta_tag:{
			required:true,
			maxlength: 160,
		},
		title:{
			required:true,
			maxlength: 100,
		},
		keyword:{
			required:true,
			maxlength: 100,
		},
		 banner: {
                
                extension: "jpg|png"
            },
	},
messages:{
		name:{
			required:"Name is required",
			  maxlength:"Name must be less than of 100 characters",
		},
		color:{
			required:"Color is required",
			  maxlength:"Color must be less than of 100 characters",
		},
		banner:{
			//required:"Banner is required",
 			extension: "Only image type jpg,png is allowed",
		},
		alt:{
			required:"Alt is required",
 			maxlength:"Alt must be less than of 100 characters",
		},
		slug:{
			required:"Slug is required",
			  maxlength:"Slug must be less than of 100 characters",
		},
		descriptin_meta_tag:{
			required:"Descriptin meta tag is required",
			  maxlength:"Descriptin meta tag must be less than of 160 characters",
		},
		title:{
			required:"Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},							
		keyword:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},

}

});



$('#informational_table_head').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_urlInfor+"/admin/InformationalController/informational_pagenation_head",
			 type: "post",
           "data": function ( d ) {
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},
         {"data": "title"},
        
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [2],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
              //console.log(row);
                   var html = '';
               // return '<a href="'+baseURL+'admin/dealer-details/'+row.id+'" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a><a href="'+baseURL+'admin/edit-dealer/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit Dealer"></a> <a href="javascript:void(0);" data-id="'+row.id+'" class="fa fa-trash delete_dealer" data-toggle="tooltip" title="Delete Dealer"></a>'
               html += '<a href="'+base_urlInfor+'admin/information-edit/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit"></a><a href="javascript:void(0);" data-id="'+row.id+'"  class="fa fa-trash delete_info_head" data-toggle="tooltip" title="Delete"></a>';
                
                    return html;
               }
           }
       ],
} );

$('#informational_table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_urlInfor+"/admin/InformationalController/informational_pagenation",
			 type: "post",
           "data": function ( d ) {
           		// alert('123');
           },error: function(){  // error handling

               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},
         {"data": "name"},
         {"data": "slug"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [3],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';

               // return '<a href="'+baseURL+'admin/dealer-details/'+row.id+'" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a><a href="'+baseURL+'admin/edit-dealer/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit Dealer"></a> <a href="javascript:void(0);" data-id="'+row.id+'" class="fa fa-trash delete_dealer" data-toggle="tooltip" title="Delete Dealer"></a>'
               html += '<a href="'+base_urlInfor+'admin/information-edit/'+row.id+'" class="ease-btn i_id" data-id="'+row.id+'" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_info " data-toggle="tooltip" title="Delete">Delete</a><a href="javascript:void(0);" data-id="'+row.slug+'"  class="ease-btn view_slug " data-toggle="tooltip" title="View">View</a><a href="'+base_urlInfor+'admin/comments-view/'+row.id+'" class="ease-btn" data-id="'+row.id+'" data-toggle="tooltip" title="Comments">Comments</a>';
                	if (row.live == 1) 
                    {
                      html += '  <a href="javascript:void(0);" class="ease-btn save_info " data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Activated</a>&nbsp&nbsp';
                    }
                    else
                    {
                       html += ' <a href="javascript:void(0);" class="ease-btn publish_info " data-toggle="tooltip" style="background-color: red;"  data-id="'+row.id+'" title="Deactivate">Deactivated</a>&nbsp&nbsp';
                    }
                    return html;
               }
           }
       ],
         "drawCallback": function (settings) {
       var response = settings.json;
        $( '#page_c' ).val(response['page']);
   }, 
} );

 $(document).on('click','.view_slug', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
      window.open(''+base_urlInfor+'informations/'+id+'', ''+id+'', 'View Slug Page',);
  return false;
});
$(function () {
    $( "#informational_tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            sendOrderToServer();
           }
    });

    function sendOrderToServer() {
      var order = [];
        $('#informational_tablecontents tr').each(function(index,element) {
         order.push({
          id: $(this).find(".i_id").attr('data-id'),
          position: index+1

        });

      });
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_urlInfor+"/admin/InformationalController/sort_informational",
        data: {
          order:order,
          'start': $('#page_c').val(),

        },
        success: function(response) {
            if (response == "200") {
          
            } else {
            
            }
        }
      });

    }
  });

$(function () {
    // $("#table").DataTable();

    $( "#informational_side_menu" ).sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        revert: 100,
        update: function() {
            sendOrderToServer();
        }
    });

    function sendOrderToServer() {
        var order = [];
        $('#informational_side_menu tr').each(function(index,element) {
        
            order.push({
                id: $(this).attr('data-id'),
                position: index+1

            });

        });


        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_urlInfor+"/admin/InformationalController/sort_informational_menu",
            data: {
                order:order,
            },
            success: function(response) {
                if (response == "200") {

                } else {
              
                }
            }
        });

    }
});

 $(document).on('click','.publish_info', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to Activate this page?';
    var url = base_urlInfor+'/admin/InformationalController/publish_info';
    delete_f(head_title, title, url, id);
});


  $(document).on('click','.save_info', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to Deactivate this page?';
    var url = base_urlInfor+'/admin/InformationalController/save_info';
    delete_f(head_title, title, url, id);
});

    $(document).on('click','.blockblog', function(){
  var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to Deactivate this page?';
    var url = base_urlInfor+'/admin/BlogController/blockblog';
    delete_f(head_title, title, url, id);
});


 $(document).on('click','.activeBlog', function(){
  var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to Activate this page?';
    var url = base_urlInfor+'/admin/BlogController/activeBlog';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.delete_info', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this page? <br> CAUTION: All page data will be deleted.';
    var url = base_urlInfor+'/admin/InformationalController/delete_info';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.delete_info_menu', function(){
  var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this menue item?';
    var url = base_urlInfor+'/admin/InformationalController/delete_info_menu';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.delete_image_home_banner', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this Banner Image?';
    var url = base_urlInfor+'/admin/InformationalController/delete_banner_image_home';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.delete_comment', function(){
    var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this comment?';
    var url = base_urlInfor+'/admin/InformationalController/delete_comment';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.approved_comment', function(){
  var _this=$(this);
    var id=_this.attr('data-id');
   // alert(id);
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to approve this comment?';
    var url = base_urlInfor+'/admin/InformationalController/approved_comment';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.approved_replys', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    //alert(id);
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to Approved this reply?';
    var url = base_urlInfor+'/admin/InformationalController/approved_reply';
	  delete_cus(head_title, title, url, id,_this);


});
  $(document).on('click','.delete_comment_reply', function(){

 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this reply?';
    var url = base_urlInfor+'/admin/InformationalController/delete_comment_reply';
	  delete_f(head_title, title, url, id,_this);
});


    $(document).on('click','.delete_comment_reply-view-all-commentes', function(){

  var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete this reply?';
    var url = base_urlInfor+'/admin/InformationalController/delete_comment_reply';
    delete_function(head_title, title, url, id,_this);
});
//view comment blogs reply


  $(document).on('click','.delete_info_head', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong>";
    var title = 'You want to delete Head Data?';
    var url = base_urlInfor+'/admin/InformationalController/delete_info_head';
    delete_f(head_title, title, url, id);
});
  $(document).on('click','.comment-edit-reply',function(){
  //$('.comment-replyss').click(function() {
    
  var id=$(this).attr('data-id');
  var message=$(this).attr('data-message');
  $('#reply-modal-edit-reply').modal('show'); 
  $('.inputhidden').val(id);
  $('#commentss-edit-reply').val(message);

    });

$('#coment_edit_replyss').validate({
  rules:{
    commenteditreply:{
      required:true,
      maxlength: 500,
    },

  },
  messages:{

    commenteditreply:{
      required:"Reply  is required",
    }
  }
});



  $('#coment_edit_replyss').submit(function(e) {
    if($(this).valid()){
    e.preventDefault();
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply").val();
    var strDate = getISODateTime(new Date());
        $.ajax({
           url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentReplyEdit',
           type: 'POST',
           data: {reply_id: reply_id, comment: comment},
           error: function() {
              alert('Something is wrong');
           },
           success: function(id) {
                html=comment;
              
               $('.thumb-list-repy-'+reply_id).html( html );
               $('.comment-edit-reply-'+reply_id).attr('data-message',html);
                $('#reply-modal-edit-reply').modal('hide'); 

           }
        });
   }
  });
  $(document).on('click','.comment-edit-approved-reply',function(){
  var id=$(this).attr('data-id');
  var message=$(this).attr('data-message');
   
  $('#editModalReply').modal('show'); 
  $('.inputhidden').val(id);
   $('#commentss-edit-reply').val(message);

  
    });


   $(document).on('click','.EditLibrary', function(){
    var file=$(this).attr('data-link');
    var name=$(this).attr('data-name');
    var id=$(this).attr('data-id');

    $('#e_library_name').val(name);
    $('#libraryId').val(id);

    var link='<a target="blank"  href="'+base_urlInfor+'uploads/library/'+file+'" >'+base_urlInfor+'uploads/library/'+file+'</a>';
    $('#old_link').html(link)
  $('#edit-library-modal').modal('toggle');
});


$('#coment_edit_approved_reply').validate({
	rules:{
		commenteditreply:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commenteditreply:{
			required:"Comment  is required",
		}
	}
});

$('#coment_edit_approved_reply').submit(function(e) {
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply").val();
  if($('#coment_edit_approved_reply').valid()) {
	  var strDate = getISODateTime(new Date());
	  $.ajax({
		  url: base_urlInfor + '/admin/InformationalController/ajaxRequestCOmmentReplyEdit',
		  type: 'POST',
		  data: {reply_id: reply_id, comment: comment},
		  error: function () {
			  alert('Something is wrong');
		  },
		  success: function (id) {
			  html = comment;
			  $('#reply-comment-id-' + reply_id).html(html);
			  $('.edit-test-reply-' + reply_id).html(html);
			  $('.comment-edit-reply-' + reply_id).attr('data-message', html);
			  $('#editModalReply').modal('hide');
			  //$(html).remove();

		  }
	  });
  }
   // }
  });

$('#coment_edit_approved_reply_blog').validate({
	rules:{
		commenteditreply:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commenteditreply:{
			required:"Comment  is required",
		}
	}
});

$('#coment_edit_approved_reply_blog').submit(function(e) {
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply").val();
  if($('#coment_edit_approved_reply_blog').valid()) {
	  var strDate = getISODateTime(new Date());
	  $.ajax({
		  url: base_urlInfor + '/admin/InformationalController/ajaxRequestCOmmentReplyEdit',
		  type: 'POST',
		  data: {reply_id: reply_id, comment: comment},
		  error: function () {
			  alert('Something is wrong');
		  },
		  success: function (id) {
			  html = comment;
			  $('#reply-comment-id-' + reply_id).html(html);
			  $('.edit-test-reply-' + reply_id).html(html);
			  $('.comment-edit-reply-' + reply_id).attr('data-message', html);
			  $('#editModalReply').modal('hide');
			  //$(html).remove();

		  }
	  });
  }
   // }
  });




$('#coment_edit_approved_reply_fourm').validate({
	rules:{
		commenteditreply:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commenteditreply:{
			required:"Comment  is required",
		}
	}
});



$('#coment_edit_approved_reply_fourm').submit(function(e) {
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply").val();
  if($('#coment_edit_approved_reply_fourm').valid()) {
	  var strDate = getISODateTime(new Date());
	  $.ajax({
		  url: base_urlInfor + '/admin/InformationalController/ajaxRequestCOmmentReplyEdit',
		  type: 'POST',
		  data: {reply_id: reply_id, comment: comment},
		  error: function () {
			  alert('Something is wrong');
		  },
		  success: function (id) {
			  html = comment;
			  $('#reply-comment-id-' + reply_id).html(html);
			  $('.edit-test-reply-' + reply_id).html(html);
			  $('.comment-edit-reply-' + reply_id).attr('data-message', html);
			  $('#editModalReply').modal('hide');
			  //$(html).remove();

		  }
	  });
  }
   // }
  });

$('#coment_edit_approved_reply_info').validate({
	rules:{
		commenteditreply:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commenteditreply:{
			required:"Comment  is required",
		}
	}
});



$('#coment_edit_approved_reply_info').submit(function(e) {
     var reply_id = $(".inputhidden").val();
        var comment = $("#commentss-edit-reply").val();
  if($('#coment_edit_approved_reply_info').valid()) {
	  var strDate = getISODateTime(new Date());
	  $.ajax({
		  url: base_urlInfor + '/admin/InformationalController/ajaxRequestCOmmentReplyEdit',
		  type: 'POST',
		  data: {reply_id: reply_id, comment: comment},
		  error: function () {
			  alert('Something is wrong');
		  },
		  success: function (id) {
			  html = comment;
			  $('#reply-comment-id-' + reply_id).html(html);
			  $('.edit-test-reply-' + reply_id).html(html);
			  $('.comment-edit-reply-' + reply_id).attr('data-message', html);
			  $('#editModalReply').modal('hide');
			  //$(html).remove();

		  }
	  });
  }
   // }
  });

  $(document).on('click','.comment-edit-approved',function(){
  //$('.comment-replyss').click(function() {
    
  var id=$(this).attr('data-id');
  var message=$(this).attr('data-message');
   //alert(id);
  $('#editModal').modal('show'); 
  $('.inputhidden').val(id);
  $('#commentss-edit').val(message);

  
    });



$('#coment_edit_approved').validate({
	rules:{
		commentedit:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commentedit:{
			required:"Comment is required",
		}
	}
});
$('#coment_edit_approved_blog').validate({
	rules:{
		commentedit:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commentedit:{
			required:"Comment is required",
		}
	}
});
$('#coment_edit_approved_info').validate({
	rules:{
		commentedit:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commentedit:{
			required:"Comment is required",
		}
	}
});


$('#coment_edit_approved_fourm').validate({
	rules:{
		commentedit:{
			required:true,
			maxlength: 1100,
		},

	},
	messages:{

		commentedit:{
			required:"Comment is required",
		}
	}
});

$('#coment_edit_blog').validate({
  rules:{
    commentedit:{
      required:true,
      maxlength: 1100,
    },

  },
  messages:{

    commentedit:{
      required:"Comment is required",
    }
  }
});


$('#coment_edit_approved').submit(function(e) {
    e.preventDefault();
    
     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();

	if($('#coment_edit_approved').valid()) {
		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentEdit',
			type: 'POST',
			data: {comment_id: comment_id, comment: comment},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				html=comment;

                var update_comment = document.getElementById('comment-id-'+comment_id)
                update_comment.innerText = comment;

                $('.thumb-list-'+comment_id).html( html );
                $('.comment-edit-'+comment_id).attr('data-message',html);
                $('#editModal').modal('hide');

			}
		});
	}

   // }
  });



$('#coment_edit_blog').submit(function(e) {
    e.preventDefault();

     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();

  if($('#coment_edit_blog').valid()) {
    var strDate = getISODateTime(new Date());
    $.ajax({
      url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentEdit',
      type: 'POST',
      data: {comment_id: comment_id, comment: comment},
      error: function() {
        alert('Something is wrong');
      },
      success: function(id) {
        html=comment;

                console.log('comment :'+comment)
                console.log('id :'+comment_id)                
                var update_comment = document.getElementById('comment-id-'+comment_id)
                update_comment.innerText = comment
                $('.thumb-list-'+comment_id).html( html );
                $('comment-edit-'+comment_id).attr('data-message',html);
                $('#editModal').modal('hide');

      }
    });
  }

   // }
  });



$('#coment_edit_approved_blog').submit(function(e) {
    e.preventDefault();
     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();
	if($('#coment_edit_approved_blog').valid()) {
		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentEdit',
			type: 'POST',
			data: {comment_id: comment_id, comment: comment},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				html=comment;
                $('#comment-id-'+comment_id).html( html );
				$('.edit-test-'+comment_id).html( html );
				$('.comment-edit-'+comment_id).attr('data-message',html);
				$('#editModal').modal('hide');

			}
		});
	}

   // }
  });

$('#coment_edit_approved_fourm').submit(function(e) {
    e.preventDefault();
     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();
	if($('#coment_edit_approved_fourm').valid()) {
		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentEdit',
			type: 'POST',
			data: {comment_id: comment_id, comment: comment},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				html=comment;



                $('#comment-id-'+comment_id).html( html );
				$('.comment-edit-'+comment_id).attr('data-message',html);
				$('#editModal').modal('hide');

			}
		});
	}

   // }
  });
$('#coment_edit_approved_info').submit(function(e) {
    e.preventDefault();
     var comment_id = $(".inputhidden").val();
        var comment = $("#commentss-edit").val();

	if($('#coment_edit_approved_info').valid()) {
		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_urlInfor+'/admin/InformationalController/ajaxRequestCOmmentEdit',
			type: 'POST',
			data: {comment_id: comment_id, comment: comment},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				html=comment;
                $('#comment-id-'+comment_id).html( html );
				$('.comment-edit-'+comment_id).attr('data-message',html);
				$('#editModal').modal('hide');

			}
		});
	}

   // }
  });

  $(document).on('click','.comment-edit',function(){
	var id=$(this).attr('data-id');
	var message=$(this).attr('data-message');
	 
	$('#reply-modal-edit').modal('show'); 
	$('.inputhidden').val(id);
	$('#commentss-edit').val(message);

	
    });

$('#coment_edit').validate({
  rules:{
    commentedit:{
      required:true,
      maxlength: 500,
    },

  },
  messages:{

    commentedit:{
      required:"Comment is required",
    }
  }
});



$(document).on('click','.comment-replyss',function(){    
  var id=$(this).attr('data-id');
  $('#reply-modal').modal('show'); 
  $('.inputhidden').val(id);
    });

  $('#coment_reply').submit(function(e) {

	  function dateForamteCus() {
		  var month = new Array();
		  month[0] = "Jan";
		  month[1] = "Feb";
		  month[2] = "Mar";
		  month[3] = "Apr";
		  month[4] = "May";
		  month[5] = "Jun";
		  month[6] = "Jul";
		  month[7] = "Aug";
		  month[8] = "Sep";
		  month[9] = "Oct";
		  month[10] = "Nov";
		  month[11] = "Dec";

		  var d = new Date() ;
		  return  month[d.getMonth()] +" "+d.getDate()+", "+d.getFullYear().toString().substr(-2);
		  // document.getElementById("demo").innerHTML = n;
	  }



	  if($(this).valid()){
    e.preventDefault();
    $('#reply-modal').modal('hide'); 
     var comment_id = $(".inputhidden").val();
     var detect_forum_reply=$('#detect_forum-reply-information').val();
        var comment_reply = $("#commentss").val();
		  var strDate =  dateForamteCus() ;
        $.ajax({
           url: base_urlInfor+'/admin/InformationalController/ajaxRequestReply',
           type: 'POST',
           data: {comment_id: comment_id, comment_reply: comment_reply,detect_forum_reply:detect_forum_reply},
           error: function() {
              alert('Something is wrong');
           },
           success: function(id) {
                 html='<div class="thumb-list"><figure><img alt="" src="'+base_urlInfor+'/assets/admin/img/logo.png"></figure><div class="text-holder"><h6>Camping Steve</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment_reply+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>';
            
               $('.new-child-'+comment_id).prepend( html );
               $("#coment_reply")[0].reset();

           }
        });
    }
  });
$(document).on('click','.comment-replyss-subpage',function(){
	var id=$(this).attr('data-id');
	$('#reply-modal').modal('show'); 
	$('.inputhidden').val(id);
    });
  $('#coment_reply_subpage').submit(function(e) {
  	if($(this).valid()){
  	e.preventDefault();
  	$('#reply-modal').modal('hide'); 
     var comment_id = $(".inputhidden").val();
     var menuid = $(".menudid").val();
        var comment_reply = $("#commentss").val();
		 var strDate = getISODateTime(new Date());
		$.ajax({
           url: base_urlInfor+'/admin/InformationalController/ajaxRequestReplySubPage',
           type: 'POST',
           data: {comment_id: comment_id, comment_reply: comment_reply,menuid:menuid},
           error: function() {
              alert('Something is wrong');
           },
           success: function(id) {
                 html='<div class="thumb-list"><figure><img alt="" src="'+base_urlInfor+'/assets/admin/img/logo.png"></figure><div class="text-holder"><h6>Camping Steve</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment_reply+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>';
               $('.reply-go-'+comment_id).append( html ); 
               $("#coment_reply")[0].reset();

           }
        });
    }
  });

$('#add_menu_item').validate({
rules:{
    
      name:{
          required:true,
        },
          menu_slug:{
             required:true,
             maxlength: 100,
            customRule: true,
        },
        menu_title:{
             required:true,
        },  
        menu_keywords:{
             required:true,
        },
         menu_description:{
             required:true,
        },
      },
      messages:{
              name:{
              required:"Name is required",
        } ,

         menu_slug:{
              required:"slug is required",
        },  
         menu_title:{
              required:"page title is required",
        }  ,
         menu_keywords:{
              required:"keywords is required",
        },
        menu_description:{
              required:"description is required",
        }   
                  
      }
});
$('#add_banner_image_home').validate({
rules:{
         banner_image:{
          required:true,
          extension:"jpeg|jpg|png",
        },
			},
			messages:{
					 banner_image:{
          required:"Banner Image is required",
        },
						
			}
});
$('#edit_menu_item').validate({
rules:{
		
				name:{
					required:true,
				},
          menu_slug:{
             required:true,
             maxlength: 100,
          customRule: true,
        },
        menu_title:{
             required:true,
        },  
        menu_keywords:{
             required:true,
        },
         menu_description:{
             required:true,
        },
			},

			messages:{
					
						name:{
							required:"Name is required",
				}	,		
        menu_slug:{
              required:"slug is required",
        },  
         menu_title:{
              required:"page title is required",
        }  ,
         menu_keywords:{
              required:"keywords is required",
        },
        menu_description:{
              required:"description is required",
        }       			
			}
});
$('#comment_post').validate({
rules:{
				comment:{
					required:true,
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
				},


			},
			messages:{
					
						comment:{
							required:"Reply is required",
				}						
			}
});

function getISODateTime(d){
    var s = function(a,b){return(1e15+a+"").slice(-b)};
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
 $('#comment_post').submit(function() {

    if($(this).valid()){

		function dateForamteCus() {

			var month = new Array();
			month[0] = "Jan";
			month[1] = "Feb";
			month[2] = "Mar";
			month[3] = "Apr";
			month[4] = "May";
			month[5] = "Jun";
			month[6] = "Jul";
			month[7] = "Aug";
			month[8] = "Sep";
			month[9] = "Oct";
			month[10] = "Nov";
			month[11] = "Dec";


			var d = new Date() ;
			return month[d.getMonth()] +" "+d.getDate()+", "+d.getFullYear().toString().substr(-2);
			// document.getElementById("demo").innerHTML = n;
		}

  var url = window.location.pathname;
  var informationalpages_id = url.substring(url.lastIndexOf('/') + 1);    
        var comment = $("#comment").val();
    var html='';

        $.ajax({
           url: base_urlInfor+'/admin/InformationalController/ajaxRequestCommentPost',
           type: 'POST',
           data: {informationalpages_id: informationalpages_id, comment: comment},
           error: function() {
              alert('Something is wrong');
           },
           success: function(id) {


			  var strDate  = dateForamteCus() ;
               html=' <div class="thumb-list"><figure><img alt="" src="'+base_urlInfor+'/assets/admin/img/logo.png"><a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'+id+'">Reply</a></figure><div class="text-holder"><h6>Camping Steve</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a> <a class="comment-reply-link comment-edit comment-edit-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment+'>Edit</a> <time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-'+id+'">'+comment+'</p></div></div> <ul class="children"><li class="reply-go-'+id+'"></li></ul>'
             
               $('.new-comment-load-first').prepend( html );

                $("#comment_post")[0].reset() ;
           }
        });
    }
    
  });
$('#comment_post_blog_admin').validate({
	rules:{

		comment:{
			required:true,
		}
	},
	messages:{
		comment:{
			required:"comment is required",
		}

	}
});



$('#comment_post_blog_admin').submit(function() {

	function dateForamteCus() {

		var month = new Array();
		month[0] = "Jan";
		month[1] = "Feb";
		month[2] = "Mar";
		month[3] = "Apr";
		month[4] = "May";
		month[5] = "Jun";
		month[6] = "Jul";
		month[7] = "Aug";
		month[8] = "Sep";
		month[9] = "Oct";
		month[10] = "Nov";
		month[11] = "Dec";


		var d = new Date() ;
		return month[d.getMonth()] +" "+d.getDate()+", "+d.getFullYear().toString().substr(-2);
		// document.getElementById("demo").innerHTML = n;
	}



	if($(this).valid()){
		var url = window.location.pathname;
		var forum_id = url.substring(url.lastIndexOf('/') + 1);
		var detect_forum = $("#detect_forum").val() ;
		var comment = $("#comment").val();
		var html='';

		$.ajax({
			url: base_urlInfor+'/admin/BlogController/ajaxRequestCommentPost',
			type: 'POST',
			data: {forum_id: forum_id, detect_forum:detect_forum ,  comment: comment},

			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {

				var strDate = dateForamteCus() ;
				html='<li class="reply-go-"+id><div class="thumb-list"><figure><img alt="" src="'+base_urlInfor+'/assets/admin/img/logo.png"><a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'+id+'">Reply</a></figure><div class="text-holder"><h6>Camping Steve</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a> <a class="comment-reply-link comment-edit comment-edit-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment+'>Edit</a> <time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-'+id+'">'+comment+'</p></div></div></li>'
				$('.comment-list').append( html ) ;
				$("#comment_post_blog_admin")[0].reset();
			}
		});
	}

});
// end admin comment for reply


 $('#comment_post_subpage').submit(function() {

  	if($(this).valid()){
  var url = window.location.pathname;
var informationalpages_id = $(".page_id").val();
        var comment = $("#comment").val();
         var menuid = $(".menusubpage").val();

		var strDate = getISODateTime(new Date());
		var html='';

        $.ajax({
           url: base_urlInfor+'/admin/InformationalController/ajaxRequestCommentPostSubPage',
           type: 'POST',
           data: {informationalpages_id: informationalpages_id, comment: comment, menuid:menuid},
           error: function() {
              alert('Something is wrong');
           },
           success: function(id) {
               html=' <div class="thumb-list"><figure><img alt="" src="'+base_urlInfor+'/assets/admin/img/logo.png"><a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'+id+'">Reply</a></figure><div class="text-holder"><h6>Camping Steve</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a> <a class="comment-reply-link comment-edit comment-edit-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment+'>Edit</a> <time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-'+id+'">'+comment+'</p></div></div> <ul class="children"><li class="reply-go-'+id+'"></li></ul>'
          
               $('.new-comment-load-first').prepend( html );
               	$("#comment_post")[0].reset();
           }
        });
    }
    
  });
$('#region_content').validate({
rules:{
		r0:{
			required:true,
			maxlength: 100,
		},
		r1:{
			required:true,
			maxlength: 100,
		},
		r2:{
			required:true,
			maxlength: 100,
		},
		r3:{
			required:true,
			maxlength: 100,
		},
		r4:{
			required:true,
			maxlength: 100,
		},
		r5:{
			required:true,
			maxlength: 100,
		},
		r6:{
			required:true,
			maxlength: 100,
		},
		r7:{
			required:true,
			maxlength: 100,
		},
		r8:{
			required:true,
			maxlength: 100,
		},
	
	},
messages:{
		r0:{
			required:"Region 1 is required",
			  maxlength:"region 1  be less than of 100 characters",
		},
			r1:{
	required:"Region 2 is required",
			  maxlength:"region 2  be less than of 100 characters",
		},

			r2:{
		required:"Region 3 is required",
			  maxlength:"region 3  be less than of 100 characters",
		},
			r3:{
		required:"Region 4 is required",
			  maxlength:"region 4  be less than of 100 characters",
		},
			r4:{
			required:"Region 5 is required",
			  maxlength:"region 5  be less than of 100 characters",
		},
			r5:{
			required:"Region 6 is required",
			  maxlength:"region 6  be less than of 100 characters",
		},
			r6:{
			required:"Region 7 is required",
			  maxlength:"region 7  be less than of 100 characters",
		},
			r7:{
		required:"Region 8 is required",
			  maxlength:"region 8  be less than of 100 characters",
		},
			r8:{
		required:"Region 9 is required",
			  maxlength:"region 9  be less than of 100 characters",
		},
		
}

});

$('#add_abount_us').validate({
rules:{
		
			color:{
					required:true,
				},
			banner:{
			
			extension:"gif|jpg|png",
		},
		content_img:{
			
			extension:"gif|jpg|png",
			},
	},
messages:{
					
			color:{
			required:"Color is required",
			},
			banner:{			
				extension: "Only image type gif,jpg,png is allowed",
			},
			content_img:{			
				extension: "Only image type gif,jpg,png is allowed",
			},

	}
});
 $('.add-side-menu').click(function() {
    
  var id=$(this).attr('data-id');
  $('#add-menu-modal').modal('show'); 
  $('.inputhidden').val(id);
  //alert(id);
  
    });
 $('.add-banner-images').click(function() {
  $('#myModal').modal('show'); 
  
    });
 $('.add-library').click(function() {
  $('#addlibrary').modal('show');

    });
 $('.add-main-images').click(function() {
	$('#main-image-adds').modal('show'); 
    });
 $('.edit-side-menu').click(function() {
    
  var id=$(this).attr('data-id');
  var name=$(this).attr('data-name');
  var menu_slug=$(this).attr('data-slug');
  var menu_title=$(this).attr('data-title');
  var menu_keywords=$(this).attr('data-keywords');
  var menu_description=$(this).attr('data-description');
  var description=$(this).attr('data-des');

  $('#edit-menu-modal').modal('show'); 
  $('#edit-name').val(name);
  $('#menu_slug').val(menu_slug);
  $('#menu_title').val(menu_title);
  $('#menu_keywords').val(menu_keywords);
  $('#menu_description').val(menu_description);

  //test

   $(".description-edit .cke_wysiwyg_frame").contents().find("body").html(description);
  $('.inputhidden').val(id);
  
    });

 $('.edit-banner_home_image').click(function() {
    
  var id=$(this).attr('data-id');
  var name=$(this).attr('data-name');
  var time=$(this).attr('data-time');
  var image=$(this).attr('data-image');
   //alert(time);

  $('#edit-banner-image').modal('show'); 
  $('#banner_text').val(name);

  $('#transition_time').val(time);
    $('.image').val(image);
  $('.inputhidden').val(id);
  
    });
 $('.main_home_image').click(function() {
	var id=$(this).attr('data-id');
	var image=$(this).attr('data-image');
  $('#main-home-image').modal('show'); 
   $('.image').val(image);
  $('.inputhidden').val(id);
	
    });

 $('.load-more-btn').click(function(){
  // alert('123');
  var count=$(this).attr('data-count');
  var id=$(this).attr('data-id');
        $.ajax({
           url: base_urlInfor+'/admin/InformationalController/information_nextLoad',
           type: 'POST',
           data: {id:id,count: count },
           error: function() {
              alert('Something is wrong');
           },
           success: function(data1) {
            var data= JSON.parse(data1);
            if((parseInt(count)+10)>=data[2]){
              $('#load-more-btn-1').html('');
            }

   $( ".comment-list" ).last().after( data[0] );
  var count1=Number(data[1])+Number(10);
  //alert(count1);
   $('.load-more-btn').attr('data-count',count1);

           }
        });
 })

var dataTablecommetnsInformation=$('#comnt-tbl-212').DataTable({



   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"Name",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_urlInfor+"admin/InformationalController/all_commentss",
       type: "post",
           "data": function ( d ) {

                d.checkComments="comment";
                d.commentname=$('#commentname').val();
                d.from=$('#from').val();
                d.to=$('#to').val();
                d.user=$('#user').val();
                d.pageName=$('#pageName').val();
                d.subPage=$('#subPage').val();
           },error: function(){  // error handling
               $(".example-error").html("");
                $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },

        "columns": [
         {"data": "no"},
         {"data": "Date"},
         {"data": "Name"},
         {"data": "newComment"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
              var cechkcomment="comment";
                   var html = '';
                   if(cechkcomment=='comment'){
                html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_comment"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
                 }else{
                  html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply-view-all-commentes"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_replys"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
                 }

                    return html;
               }
           }
       ],
      
} );
var dataTablecommetnsInformation1=$('#approve_comments').DataTable({



   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"Name",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
      "ajax": {

           url: base_urlInfor+"admin/InformationalController/all_commentss1",
       type: "post",
           "data": function ( d ) {

                d.checkComments="comment";
                d.commentname=$('#commentname').val();
                d.from=$('#from').val();
                d.to=$('#to').val();
                d.user=$('#user').val();
                d.pageName=$('#pageName').val();
                d.subPage=$('#subPage').val();
           },error: function(){  // error handling
               $(".example-error").html("");
                $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },

        "columns": [
         {"data": "no"},
         {"data": "Date"},
         {"data": "Name"},
         {"data": "newComment"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
             // console.log(row);
              var cechkcomment="comment";
              //alert(t);
                   var html = '';
                   if(cechkcomment=='comment'){
                html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a> ';
                 }else{
                  html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply-view-all-commentes"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a> ';
                 }

                    return html;
               }
           }
       ],

} );


//view all replies

var dataTableRepliesInformation=$('#reply-tbl-custom').DataTable({


    "processing": true,
    "serverSide": true,
    "ordering": false,

    "language": {
        "search": "Search By Name ",
        "searchPlaceholder":"Name",
    },

    "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
    "ajax": {

        url: base_urlInfor+"admin/InformationalController/all_commentss",
        type: "post",
        "data": function ( d ) {

            d.checkComments="reply";
            d.commentname=$('#commentname').val();
            d.from=$('#from').val();
            d.to=$('#to').val();
            d.user=$('#user').val();
            d.pageName=$('#pageName').val();
            d.subPage=$('#subPage').val();
        },error: function(){  // error handling
            $(".example-error").html("");
            $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#example_processing").css("display","none");
        }
    },

    "columns": [
        {"data": "no"},
        {"data": "Date"},
        {"data": "Name"},
        {"data": "newComment"},

    ],
    "columnDefs": [
        {
            "className": "dt-center",
            "targets": [4],
            "orderable": true,
            "render": function (data, type, row) {
                var but='fa fa-toggle-off';
                // console.log(row);
                var cechkcomment="reply";
                //alert(t);
                var html = '';
                if(cechkcomment=='comment'){
                    html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_comment"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
                }else{
                    html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply-view-all-commentes"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_replys"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
                }

                return html;
            }
        }
    ],

} );
var dataTableRepliesInformation1=$('#approve_comments2').DataTable({


   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"Name",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
      "ajax": {

           url: base_urlInfor+"admin/InformationalController/all_commentss1",
       type: "post",
           "data": function ( d ) {

                d.checkComments="reply";
                d.commentname=$('#commentname').val();
                d.from=$('#from').val();
                d.to=$('#to').val();
                d.user=$('#user').val();
                d.pageName=$('#pageName').val();
                d.subPage=$('#subPage').val();
                // alert($('#pageName').val());
                 //alert($('#from').val());
           },error: function(){  // error handling
               $(".example-error").html("");
                $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },

        "columns": [
         {"data": "no"},
         {"data": "Date"},
         {"data": "Name"},
         {"data": "newComment"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
             // console.log(row);
              var cechkcomment="reply";
              //alert(t);
                   var html = '';
                   if(cechkcomment=='comment'){
                html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
                 }else{
                  html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply-view-all-commentes"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
                 }

                    return html;
               }
           }
       ],

} );
//end view all replies


$('.commentsSubmitinfor').click(function  (argument) {
  // body...

  var value = $('#checkComments').val();

    if(value=='reply'){

      $("#reply-c").html('Replies');
      $("#view-replies").html('View Replies');

       $('#replies-table-costum').css('display','block');
      $('#comnt-tbl-cstm').css('display','none');

      dataTableRepliesInformation.draw();
      dataTableRepliesInformation1.draw();

    }
    else{
      $("#reply-c").html('Comments');
      $("#view-replies").html('View Comments');

       $('#replies-table-costum').css('display','none');
      $('#comnt-tbl-cstm').css('display','block');
      dataTablecommetnsInformation.draw();
      dataTablecommetnsInformation1.draw();
    }
});

 $('#pageName').change(function(){
                var id=$(this).val();
               // alert(id);
                $.ajax({
                    url: base_urlInfor+'/admin/InformationalController/ajaxRequestSubpage',
           type: 'POST',
                    async : true,
                    dataType : 'json',
                    data:{id:id},
                    success: function(data){
                         
                        var html = '';
                        var i;
                         html += '<option value="">Select Sub Pages</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                        }
                        $('#subPage').html(html);
 
                    }
                });
                return false;
            }); 

 //changes by adil
var dataTablecommetns1=$('#blog-all-comments-table').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/blogController/blog_all_comments",
		type: "post",
		"data": function ( d ) {

			d.checkComments=$('#checkComments').val();
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.user=$('#user').val();
			d.pageName=$('#pageName').val();
			d.subPage=$('#subPage').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");
		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				var cechkcomment=$('#checkComments').val();
				var html = '';
				if(cechkcomment=='comment'){
					html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_comment"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
				}else{
					html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_replys"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
				}


				return html;
			}
		}
	],

} );


$('.commentsSubmit').click(function  (argument) {

  var value = $('#checkComments').val();
    if(value=='reply'){
      $("#reply-c").html('Replies');
      $("#view-replies").html('View Replies');
     
    }
    else{
      $("#reply-c").html('Comments');
      $("#view-replies").html('View Comments');
    
    }
  dataTablecommetns.draw();

  
});

$('.commentsSubmit1').click(function  (argument) {

  var value = $('#checkComments').val();
    if(value=='reply'){
      $("#reply-c").html('Replies');
      $("#view-replies").html('View Replies');
     
    }
    else{
      $("#reply-c").html('Comments');
      $("#view-replies").html('View Comments');
    
    }
  dataTablecommetns1.draw();

  
});



var dataTablecommetns=$('#blog-all-comments-table1').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/blogController/blog_all_comments1",
		type: "post",
		"data": function ( d ) {

			d.checkComments=$('#checkComments').val();
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.user=$('#user').val();
			d.pageName=$('#pageName').val();
			d.subPage=$('#subPage').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");
		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				// console.log(row);
				var cechkcomment=$('#checkComments').val();
				//alert(t);
				var html = '';
				if(cechkcomment=='comment'){
					html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a> ';
				}else{
					html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a> ';
				}


				return html;
			}
		}
	],

} );




var dataTablecommetnsForum=$('#forum-all-comments-table').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/forumController/forum_all_comments",
		type: "post",
		"data": function ( d ) {

			d.checkComments="comment";
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.user=$('#user').val();
			d.pageName=$('#pageName').val();
			d.subPage=$('#subPage').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");

		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				// console.log(row);
				var cechkcomment="comment";
				//alert(t);
				var html = '';
				if(cechkcomment=='comment'){
					html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_comment"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
				}else{
					html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_replys"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
				}


				return html;
			}
		}
	],

} );

//forum all comments
var dataTablecommetnsForum=$('#forum-all-comments-table1').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/forumController/forum_all_comments1",
		type: "post",
		"data": function ( d ) {

			d.checkComments="comment";
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.user=$('#user').val();
			d.pageName=$('#pageName').val();
			d.subPage=$('#subPage').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");
		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				// console.log(row);
				var cechkcomment="comment";
				//alert(t);
				var html = '';
				if(cechkcomment=='comment'){
					html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
				}else{
					html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
				}


				return html;
			}
		}
	],

} );


//forum all replies
var dataTableReplyForum=$('#forum-all-reply-table').DataTable({

  "processing": true,
  "serverSide": true,
  "ordering": false,

  "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"Name",
  },

  "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
  "ajax": {

    url: base_urlInfor+"admin/forumController/forum_all_comments",
    type: "post",
    "data": function ( d ) {

      d.checkComments="reply";
      d.commentname=$('#commentname').val();
      d.from=$('#from').val();
      d.to=$('#to').val();
      d.user=$('#user').val();
      d.pageName=$('#pageName').val();
      d.subPage=$('#subPage').val();
    },error: function(){  // error handling
      $(".example-error").html("");
      $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
      $("#example_processing").css("display","none");
    }
  },

  "columns": [
    {"data": "no"},
    {"data": "Date"},
    {"data": "Name"},
    {"data": "newComment"},
    {"data": "parentComm"},
  ],
  "columnDefs": [
    {
      "className": "dt-center",
      "targets": [5],
      "orderable": true,
      "render": function (data, type, row) {
        var but='fa fa-toggle-off';
        // console.log(row);
        var cechkcomment="reply";
        //alert(t);
        var html = '';
        if(cechkcomment=='comment'){
          html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_comment"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
        }else{
          html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_replys"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';
        }


        return html;
      }
    }
  ],

} );
//end forum all replies
// forum all approved replies
var dataTableReplyForum=$('#forum-all-reply-table1').DataTable({

  "processing": true,
  "serverSide": true,
  "ordering": false,

  "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"Name",
  },

  "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
  "ajax": {

    url: base_urlInfor+"admin/forumController/forum_all_comments1",
    type: "post",
    "data": function ( d ) {

      d.checkComments="reply";
      d.commentname=$('#commentname').val();
      d.from=$('#from').val();
      d.to=$('#to').val();
      d.user=$('#user').val();
      d.pageName=$('#pageName').val();
      d.subPage=$('#subPage').val();
    },error: function(){  // error handling
      $(".example-error").html("");
      $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
      $("#example_processing").css("display","none");
    }
  },

  "columns": [
    {"data": "no"},
    {"data": "Date"},
    {"data": "Name"},
    {"data": "newComment"},
    {"data": "parentComm"},
  ],
  "columnDefs": [
    {
      "className": "dt-center",
      "targets": [5],
      "orderable": true,
      "render": function (data, type, row) {
        var but='fa fa-toggle-off';
        // console.log(row);
        var cechkcomment="reply";
        //alert(t);
        var html = '';
        if(cechkcomment=='comment'){
          html += ' <a class="ease-btn comment-edit-approved comment-edit-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'">Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
        }else{
          html += ' <a class="ease-btn comment-edit-approved-reply comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-message="'+row.Comment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_comment_reply"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
        }


        return html;
      }
    }
  ],

} );
//end forum all replies


$('.commentsSubmitFOrum').click(function  (argument) {
	// body...
  var value = $('#checkComments').val();
  // alert(value);
    if(value=='reply'){
      $("#reply-c").html('Replies');
      $("#view-replies").html('View Replies');

      $('#rep-forum').show();
      $('#com-forum').hide();

      dataTableReplyForum.draw();
    }
    else{
      $("#reply-c").html('Comments');
      $("#view-replies").html('View Comments');

      $('#rep-forum').hide();
      $('#com-forum').show();
      dataTablecommetnsForum.draw();
    }
	// alert('123');

	
});
// end forum all comments


//all pending forums

var dataTableForumPending=$('#all-forum-table').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/forumController/forum_all_pendings",
		type: "post",
		"data": function ( d ) {

			d.checkComments=$('#checkComments').val();
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.description=$('#description_search').val();
			d.question=$('#question').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");
		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				// console.log(row);
				var cechkcomment=$('#checkComments').val();
				//alert(t);
				var html = '';
					html += ' <a class="ease-btn forum-edit comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-question="'+row.Name+'" data-description="'+row.newComment+'"> Edit</a> <a href="javascript:void(0)" class="ease-btn delete_forum"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a><a href="#" class="ease-btn approved_forum"data-toggle="tooltip" title="Approve" data-id="'+row.id+'">Approve</a> ';

				return html;
			}
		}
	],

} );

$('.commentsSubmit').click(function  (argument) {
	// body...
	// alert('123');
	dataTableForumPending.draw();
});

// end all pending forums


//approve foerums
var dataTableForumApprove=$('#all-aprove-forum-table').DataTable({

	"processing": true,
	"serverSide": true,
	"ordering": false,

	"language": {
		"search": "Search By Name ",
		"searchPlaceholder":"Name",
	},

	"lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],
	"ajax": {

		url: base_urlInfor+"admin/forumController/forum_all_approve",
		type: "post",
		"data": function ( d ) {

			d.checkComments=$('#checkComments').val();
			d.commentname=$('#commentname').val();
			d.from=$('#from').val();
			d.to=$('#to').val();
			d.description=$('#description_search').val();
			d.question=$('#question').val();
		},error: function(){  // error handling
			$(".example-error").html("");
			$("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
			$("#example_processing").css("display","none");
		}
	},

	"columns": [
		{"data": "no"},
		{"data": "Date"},
		{"data": "Name"},
		{"data": "newComment"},
	],
	"columnDefs": [
		{
			"className": "dt-center",
			"targets": [4],
			"orderable": true,
			"render": function (data, type, row) {
				var but='fa fa-toggle-off';
				// console.log(row);
				var cechkcomment=$('#checkComments').val();
				//alert(t);
				var html = '';
				var str = "Activate" ;
				var color = "green" ;
				if(row.block == 1)
				{
					str = "Approve" ;
					color = "green" ;
				}else{
					str = "Disapprove" ;
					color = "red" ;
				}

				html += ' <a class="ease-btn forum-edit comment-edit-reply-'+row.id+'" href="javascript:void(0)" data-id="'+row.id+'" data-question="'+row.Name+'" data-description="'+row.newComment+'"> Edit</a><a class="ease-btn" href="'+base_urlInfor+'admin/forum-specific-comments/'+row.id+'" data-id="'+row.id+'" data-question="'+row.Name+'" data-description="'+row.newComment+'">Comment</a> <a href="javascript:void(0)" class="ease-btn delete_forum"  data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a> <a style="background-color: '+color+'; " href="forums-activate-deactivate/'+row.id+'" class="ease-btn block"  data-id="'+row.id+'" data-toggle="tooltip" title="'+str+'">'+str+'</a> ';

				return html;
			}
		}
	],

} );

$('.commentsSubmit').click(function  (argument) {
	// body...
	// alert('123');
	dataTableForumApprove.draw();
});
//end approve forums


//admin forum pendings
var id = 0 ;

$(document).on('click','.forum-edit',function(){
	//$('.comment-replyss').click(function() {

	 id=$(this).attr('data-id');
	 var question =$(this).attr('data-question');
	 var description =$(this).attr('data-description');

	$('#forum-update').modal('show');

	$('#question-sentence').val(question);
	$('#question-description').val(description);


});


$('#forum-updatd').validate({
    rules:{
      forum_question:{
        required:true,
        maxlength: 200,
      },
      question_description:{
        required:true,
          maxlength: 1100,
      },
    },

    messages:{
      forum_question:{
        required:"Question title is required",
      },

      question_description:{
        required:"Description is required",

      },


    }

  });


$('#forum-updatd').submit(function(e) {

	e.preventDefault();
	var question = $('#question-sentence').val();
	var description  = $('#question-description').val();


      if($('#forum-updatd').valid()) {

    	var strDate = getISODateTime(new Date());
    	$.ajax({
    		url: base_urlInfor+'/admin/forumController/editForum/',
    		type: 'POST',
    		data: {question: question, description: description,id:id},
    		error: function() {
    			alert('Something is wrong');
    		},
    		success: function() {

    			location.reload();
    			$('#forum-update').modal('hide');

    		}
    	});
	 }
});


$(document).on('click','.delete_forum', function(){
	var _this=$(this);
	var id=_this.attr('data-id');
	var head_title = "<strong>Are you sure?</strong>";
	var title = 'You want to delete this forum?';
	var url = base_urlInfor+'/admin/forumController/delete_forum';
	delete_f(head_title, title, url, id);
});

$(document).on('click','.approved_forum', function(){
	var _this=$(this);
	var id=_this.attr('data-id');
	//alert(id);
	var head_title = "<strong>Are you sure?</strong>";
	var title = 'You want to Approved this forum?';
	var url = base_urlInfor+'/admin/forumController/approveForum';
	delete_f(head_title, title, url, id);
});

