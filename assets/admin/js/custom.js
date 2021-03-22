"use strict";

//const base_url="http://www.backend.development-env.com/coloradonew/";
// var base_url="https://coloradocampgrounds.us.com/";
var base_url = "http://www.coloradocampgrounds.development-env.com/";
$.validator.addMethod("pwcheck", function(value) {
   return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/.test(value) // consists of only these
     
});
jQuery.validator.addMethod("customRule", function(value, element) {
    return this.optional(element) || /^[\w-]+$/i.test(value);
}, "Letters, numbers, dashes and underscores only please"); 

$('#adminLogin').validate({

rules:{
		
				email:{
					required: true,
					email: true,
				},
				password:{
					required:true,
				}
			},
			messages:{
						email:{
							required: "Email is required",
							email: "Enter valid email address",
						},
						password:{
							required:"Password is required",
				}						
			}
});
$('#add_library_form').validate({

rules:{
		
				library_name:{
					required: true,
				},
				library_file:{
					required:true,
					extension:"gif|jpg|png|pdf",
				}
			},
			messages:{
						library_name:{
							required: "Name is required",
						},
						library_file:{
							required:"File is required",
							extension:"Only png,jpg and pdf files are allowed",
				}						
			}
});

$(document).ready( function () {
    $('#libraryTable').DataTable();
} );


$("#forget_password").validate({
  rules:{
    email: {
          required: true,
          email: true
        },},
        
      messages:{
  email: {
    required: "Please provide an email",
    email: "Please provide a valid email",
  },
  

  }

});

$("#change_password").validate({
  rules:{
    
        password: {
          required: true,
          minlength: 5,
          maxlength: 50,
        },
        confirm_password:{
          required: true,
          minlength: 5,
          maxlength: 50,
          equalTo: "#password"
        }
      },
      messages:{
            
            password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            maxlength:"Your password must be less than of 50 characters",
          },confirm_password: {
            required: "Please provide a confirm password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above",
            maxlength:"Your Confirm password must be less than of 50 characters",
          }
        }
});


$('#update_profile').validate({
rules:{
		
				email:{
					required: true,
					email: true,
				},
				password:{
					required:true,
				},
				confirm_password:{
					required: true,
					minlength: 5,
					maxlength: 50,
					equalTo: "#password"
				}
			},
			messages:{
						email:{
							required: "Email is required",
							email: "Enter valid email address",
						},
						password:{
							required:"Password is required",
				},
				confirm_password: {
						required: "Please provide a confirm password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please provide the same password as above",
						maxlength:"Your confirm password must be less than of 50 characters",
					}						
			}
});



$('#add_paresnt_comp').validate({
rules:{
		region:{
			required:true,
			maxlength: 100,
		},
		name:{
			required:true,
			maxlength: 100,
		},
		color:{
			required:true,
			maxlength: 100,
		},
		slug:{
			required:true,
			customRule: true,
			maxlength: 100,
		},
		banner:{
			required:true,
			extension:"gif|jpg|png",
		},	
		banner_alt:{
			required:true,
			maxlength: 100,
		},
		title:{
			required:true,
			maxlength: 100,
		},
		keyword:{
			required:true,
			maxlength: 100,
		},
		meta_description:{
			required:true,
		},
	},
messages:{
		region:{
			required:"Region is required",
			  maxlength:"Region must be less than of 100 characters",
		},
		name:{
			required:"Name is required",
			  maxlength:"Your Name must be less than of 100 characters",
		},
		color:{
			required:"Color is required",
		},
		slug:{
			required:"slug is required",
			customRule: "No special characters and spaces are allowed",
 			extension: "slug must be less than of 100 characters",
		},
		banner:{
			required:"Banner is required",
 			extension: "Only image type gif,jpg,png is allowed",
		},		
		banner_alt:{
			required:"Alt is required",
			  maxlength:"Alt must be less than of 100 characters",
		},
		title:{
			required:"Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},							
		keyword:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},
		meta_description:{
			required:"Description is required",
		},	
}

});


var table=$('#parent_table').DataTable(  {
   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"",
  },


   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"admin/ParentCampGroundController/parent_pagenation",
			 type: "post",
           "data": function ( d ) {
           	d.extra_search = $('#extra').val();
           	if($('#extra').val()!='')
           	{
           		$('.reset1').addClass('active');
           	}else{
           		$('.reset1').removeClass('active');
           	}
           	var value = $('.dataTables_filter input').val();
           
           	if(value!='')
           	{
           		
           		$('.reset-mind').addClass('active');
           	}else{
           		
           		$('.reset-mind').removeClass('active');
           	}

           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},
    	 {"data": "rname"},
         {"data": "name"},
          {"data": "draft"},
         
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
                   var delBtn = "" ;

              
                   if(row.id != '39')
                   {
                   		delBtn = '<a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_parent" data-toggle="tooltip" title="Delete">Delete</a>' ;
                   }else{
                   	
                   	delBtn = "" ;
                   }
       
               // return '<a href="'+baseURL+'admin/dealer-details/'+row.id+'" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a><a href="'+baseURL+'admin/edit-dealer/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit Dealer"></a> <a href="javascript:void(0);" data-id="'+row.id+'" class="fa fa-trash delete_dealer" data-toggle="tooltip" title="Delete Dealer"></a>'
               html += '<a href="'+base_url+'admin/parent-campground-detail/'+row.id+'" data-toggle="tooltip" class="ease-btn" title="View Detail">View Detail</a><a class="ease-btn" href="'+base_url+'admin/parent-campground-edit/'+row.id+'" data-toggle="tooltip" title="Edit">Edit</a>'+delBtn;
                	if (row.draft == 'Activated') 
                    {
                      html += '  <a href="javascript:void(0);" class="ease-btn save_parent" data-toggle="tooltip" style="background-color: green; letter-spacing: 0.8px;" data-id="'+row.id+'" title="Activate"> Activated </a>';
                    }
                    else if(row.draft == 'Deactivated') 
                    {
                       html += ' <a href="javascript:void(0);" class="ease-btn publish_parent" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivate">Deactivated</a>';
                    }else{
                    	html+='<span style="opacity:0;" class="ease-btn">Deactivated </span>';
                    }
                    return html;

               }
           }
       ],
} );

$('#extra').keyup(function  (argument) {
	// body...
table.draw();
});
  $(document).on('click','.reset-mind',function  () {
        $('input[type="search"]').val('').keyup()
        table.draw();
        // alert('123');
     });
$(document).on('click','.reset1',function  () {
$('.input-sm1').val('');
table.draw();
// alert('1234');
});

  $(document).on('click','.publish_parent', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong> <br> <br>You want to activate parent campground?";
    var title = '';
    var url = base_url+'/admin/ParentCampGroundController/publish_parent';
    delete_f(head_title, title, url, id);
});


  $(document).on('click','.deleteLibrary', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong> <br> <br>You want to delete the File?";
    var title = '';
    var url = base_url+'/admin/LibraryController/delete';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.save_parent', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong> <br> <br> You want to deactivate parent campground?";
    var title = '';
    var url = base_url+'/admin/ParentCampGroundController/save_parent';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.delete_parent', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var head_title = "<strong>Are you sure?</strong> <br> <br>You want to delete parent campground?";
    var title = '';
    var url = base_url+'/admin/ParentCampGroundController/delete_parent';
    delete_f(head_title, title, url, id);
});

   $(document).on('click','.undraft', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = '<strong>Are you sure?</strong> <br> <br> You want to Publish your parent campground?';
    var url = base_url+'/admin/ParentCampGroundController/undraft';
    delete_f(head_title, title, url, id);
});


//draft data table
$('#draft_parent_table').DataTable(  {
   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Name ",
    "searchPlaceholder":"xx",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"admin/ParentCampGroundController/draft_parent_pagenation",
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
         {"data": "name"},
         {"data": "rname"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [3],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/parent-campground-detail/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/parent-campground-edit/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_parent" data-toggle="tooltip" title="Delete">Delete</a>';
                      html += '  <a href="javascript:void(0);" class="undraft ease-btn" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Undraft">publish</a>';
                    return html;
               }
           }
       ],
} );

$('#add_child_comp').validate({
	ignore: [],
rules:{
		parent:{
			required:true,
			maxlength: 100,
		},
		name:{
			required:true,
			maxlength: 100,
		},
		color:{
			required:true,
		},
		banner:{
			extension:"gif|jpg|png",
		},
		com_map:{
			
			maxlength: 400,
		},
		video_link:{
			required:true,
			maxlength: 100,
		},
			banner_alt:{
			maxlength: 100,
		},
		title:{
			required:true,
			maxlength: 100,
		},
		keyword:{
			required:true,
			maxlength: 100,
		},
		meta_description:{
			required:true,
		},
		slug:{
			required:true,
			customRule: true,
			maxlength: 100,
		},
		
	},
messages:{
		
		Parent:{
			required:"Parent campground is required",
			 maxlength:"Description must be less than of 100 characters",
		},
		name:{
			required:"Name is required",
			 maxlength:"Description must be less than of 100 characters",
		},
		color:{
			required:"Color is required",
		},
		banner:{
			// required:"Banner is required",
 			extension: "Only image type gif,jpg,png is allowed",
		},
		com_map:{
			 maxlength:"Campsite map must be less than of 400 characters",
		},
		video_link:{
			required:"Video link is required",
			 maxlength:"Video link must be less than of 100 characters",
		},

		banner_alt:{
			  maxlength:"Alt must be less than of 100 characters",
		},
		title:{
			required:"Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},							
		keyword:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},
		meta_description:{
			required:"Description is required",
		},
		slug:{
			required:"Slug is required",
			customRule: "No special characters and spaces are allowed",
			  maxlength:"Slug must be less than of 100 characters",
		},
							
}

});


$('#region').on('change', function(){
	var id = $('#region').val();
	if(id == '')
	{
		$('#parent').html('');
		return;
	}
	else
	{
		   $.ajax({
           url: base_url+"/admin/ChildCampGroundController/get_parent",
           type: 'POST',
           data: {id: id},
           dataType:'json',
           error: function() {
              alert('Something is wrong');
           },
           success: function(data1) {
                $('#parent').html('');var html = '';
                var i;
                var html;
                for(i=0; i<data1.length; i++){
                    html += '<option value='+data1[i]['p_id']+'>'+data1[i]['name']+'</option>';
                }
                $('#parent').html(html);
   }
        });
	}
});


var table1=$('#child_table').DataTable({

   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Child Campground ",
    "searchPlaceholder":"",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"/admin/ChildCampGroundController/child_pagenation",
			 type: "post",
           "data": function ( d ) {
           	d.extra_search = $('#p_extra').val();
           	if($('#p_extra').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}
           	var value = $('.dataTables_filter input').val();
           
           	if(value!='')
           	{
           		
           		$('.reset-mind-c').addClass('active');
           	}else{
           		
           		$('.reset-mind-c').removeClass('active');
           	}
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},
         {"data": "pname"},

         {"data": "name"},
         {"data": "draft"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
              var html = '';
              	if( row.id != 81 ) {

					html += '<a href="'+base_url+'admin/child-campground-detail/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/child-campground-edit/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" class="ease-btn delete_child" data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
					if (row.draft == 'Activated')
					{
						html += '  <a href="javascript:void(0);" class="ease-btn save_child arrange_child" data-toggle="tooltip" style="background-color: green; letter-spacing: 1.5px;" data-id="'+row.id+'" title="Activated"> Activate</a>';
					}
					else if(row.draft == 'Deactivated')
					{
						html += ' <a href="javascript:void(0);" class="ease-btn publish_child" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivated">Deactivate</a>';
					}else{
						html+='<span style="opacity:0;" class="ease-btn">Deactivated</span>';
					}
				}

                    return html;
               }
           }
       ],
	"drawCallback": function (settings) {
		var response = settings.json;
		$( '#page_count' ).val(response['page']);
	},
} );

$('#p_extra').keyup(function  (argument) {
table1.draw();
});

$(function () {
	$( "#child_campground_list" ).sortable({
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
		$('#child_campground_list tr').each(function(index,element) {
			order.push({
				id: $(this).find(".arrange_child").attr('data-id'),
				position: index+1

			});

		});

		$.ajax({
			type: "POST",
			dataType: "json",
			url: base_urlInfor+"/admin/ChildCampGroundController/sort_child",
			data: {
				order:order,
				'start': $('#page_count').val(),

			},
			success: function(response) {
				if (response == "200") {
				} else {
				}
			}
		});

	}
});


 $(document).on('click','.reset-mind-c',function  () {
        $('input[type="search"]').val('').keyup();
        table1.draw();
     });
$(document).on('click','.reset1-c',function  () {
$('.input-sm2').val('');
table1.draw();
// alert('1234');
});
$('#draft_child_table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,

   "language": {
    "search": "Search By Child Campground "
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"/admin/ChildCampGroundController/draft_child_pagenation",
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
    	  {"data": "rname"},
         {"data": "pname"},
         {"data": "name"},
        
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
              var html = '';
               html += '<a href="'+base_url+'/admin/child-campground-detail/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'/admin/child-campground-edit/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" class="ease-btn delete_child" data-id="'+row.id+'" data-toggle="tooltip" title="Delete">Delete</a>';
                      html += '  <a href="javascript:void(0);" class="ease-btn draft_publish_child" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Undraft">Publish</a>';
                    return html;
               }
           }
       ],
} );


  $(document).on('click','.draft_publish_child', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to Publish childground?';
    var url = base_url+'/admin/ChildCampGroundController/undraft';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.publish_child', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to activate childground?';
    var url = base_url+'/admin/ChildCampGroundController/publish_child';
    delete_f(head_title, title, url, id);
});


  $(document).on('click','.save_child', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to deactivate child campground?';
    var url = base_url+'/admin/ChildCampGroundController/save_child';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.delete_child', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete child campground?';
    var url = base_url+'/admin/ChildCampGroundController/delete_child';
    delete_f(head_title, title, url, id);
});

//SIDE PAARMETER	


$('#add_spacing').validate({
		rules:{
		
				name:{
					required:true,
						maxlength: 100,
				},
				icon:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon:{
				
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


$('#edit_form').validate({
		rules:{
		
				name:{
					required:true,
						maxlength: 100,
				},
				icon:{
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

 $(document).on('click','.delete_spacing', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete spacing?';
    var url = base_url+'/admin/SiteParametersController/delete_spacing';
    delete_parameter(head_title, title, url, id);
});

  $(document).on('click','.edit_space', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
     $('#edit_form').attr('action', base_url+'/admin/update-spacing');
 
});


 //view
 $('#add_view').validate({
		rules:{
		
				name2:{
					required:true,
						maxlength: 100,
				},
				icon2:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name2:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon2:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


 $(document).on('click','.edit_view', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-view');
});

  $(document).on('click','.delete_view', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete view?';
    var url = base_url+'/admin/SiteParametersController/delete_view';
    delete_parameter(head_title, title, url, id);
});

 //table
 $('#add_table').validate({
		rules:{
		
				name13:{
					required:true,
						maxlength: 100,
				},
				icon13:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name13:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon13:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


 $(document).on('click','.edit_table', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-table');
});

  $(document).on('click','.delete_table', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete Table?';
    var url = base_url+'/admin/SiteParametersController/delete_table';
    delete_parameter(head_title, title, url, id);
});
//add_comping


 $('#add_comping').validate({
		rules:{
		
				name3:{
					required:true,
						maxlength: 100,
				},
				icon3:{
			
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name3:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon3:{
			
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


  $(document).on('click','.edit_camping', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-compimg');
});

  $(document).on('click','.delete_camping', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete camping?';
    var url = base_url+'/admin/SiteParametersController/delete_camping';
    delete_parameter(head_title, title, url, id);
});


//trailer
 $('#add_trailer').validate({
		rules:{
		
				name4:{
					required:true,
						maxlength: 100,
				},
				icon4:{
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name4:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon4:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


   $(document).on('click','.edit_trailer', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-trailer');
});

  $(document).on('click','.delete_trailer', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete trailer?';
    var url = base_url+'/admin/SiteParametersController/delete_trailer';
    delete_f(head_title, title, url, id);
});

  //Grade

   $('#add_grade').validate({
		rules:{
		
				name5:{
					required:true,
						maxlength: 100,
				},
				icon5:{
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name5:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon5:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

 $(document).on('click','.edit_grade', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-grade');
});

  $(document).on('click','.delete_grade', function(){

 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete trailer?';
    var url = base_url+'/admin/SiteParametersController/delete_grade';
    delete_f(head_title, title, url, id);
});

  //base

    $('#add_base').validate({
		rules:{
		
				name6:{
					required:true,
						maxlength: 100,
				},
				icon6:{
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name6:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon6:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

    $(document).on('click','.edit_base', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-base');
});

  $(document).on('click','.delete_base', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete base?';
    var url = base_url+'/admin/SiteParametersController/delete_base';
    delete_f(head_title, title, url, id);
});

  //access
    $('#add_access').validate({
		rules:{
		
				name7:{
					required:true,
						maxlength: 100,
				},
				icon7:{
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name7:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon7:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

    $(document).on('click','.edit_access', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-access');
});

  $(document).on('click','.delete_access', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete access?';
    var url = base_url+'/admin/SiteParametersController/delete_access';
    delete_parameter(head_title, title, url, id);
});

  //access

     $('#add_amps').validate({
		rules:{
		
				name8:{
					required:true,
						maxlength: 100,
				},
				icon8:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name8:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon8:{
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

      $(document).on('click','.edit_amps', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-amps');
});

  $(document).on('click','.delete_amps', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete amp?';
    var url = base_url+'/admin/SiteParametersController/delete_amps';
    delete_parameter(head_title, title, url, id);
});

  //water
     $('#add_water').validate({
		rules:{
		
				name9:{
					required:true,
						maxlength: 100,
				},
				icon9:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name9:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon9:{
			
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});


   $(document).on('click','.edit_water', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-water');
});

  $(document).on('click','.delete_water', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete water?';
    var url = base_url+'/admin/SiteParametersController/delete_water';
    delete_parameter(head_title, title, url, id);
});

  //sewer

    $('#add_sewer').validate({
		rules:{
		
				name10:{
					required:true,
						maxlength: 100,
				},
				icon10:{
			
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name10:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon10:{
			
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

      $(document).on('click','.edit_sewer', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-sewer');
});

  $(document).on('click','.delete_sewer', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete water?';
    var url = base_url+'/admin/SiteParametersController/delete_sewer';
    delete_parameter(head_title, title, url, id);
});

//verizon

  $('#add_verizon').validate({
		rules:{
		
				name11:{
					required:true,
						maxlength: 100,
				},
				icon11:{
			
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name11:{
				
					maxlength:"Description must be less than of 100 characters",
				},
				icon11:{
				required:"image is required",
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});
//wifi
 $('#add_wifi').validate({
		rules:{
		
				name12:{
					required:true,
						maxlength: 100,
				},
				icon12:{
			
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name12:{
				
					maxlength:"Description must be less than of 100 characters",
				},
				icon12:{
				required:"image is required",
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});
//for cable
 $('#add_cable').validate({
		rules:{
		
				name13:{
					required:true,
						maxlength: 100,
				},
				icon13:{
			
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name13:{
				
					maxlength:"Description must be less than of 100 characters",
				},
				icon13:{
				required:"image is required",
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

    $(document).on('click','.edit_verizon', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'admin/update-verizon');
});

  $(document).on('click','.delete_verizon', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete water?';
    var url = base_url+'/admin/SiteParametersController/delete_verizon';
    delete_parameter(head_title, title, url, id);
});
//wifi
 $(document).on('click','.edit_wifi', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'admin/update-wifi');
});
 $(document).on('click','.delete_wifi', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete WIFI?';
    var url = base_url+'/admin/SiteParametersController/delete_wifi';
    delete_parameter(head_title, title, url, id);
});
 //cable
  $(document).on('click','.edit_cable', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'admin/update-cable');
});
 $(document).on('click','.delete_cable', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete Cable TV?';
    var url = base_url+'/admin/SiteParametersController/delete_cable';
    delete_parameter(head_title, title, url, id);
});
  //shade

    $('#add_shade').validate({
		rules:{
		
				name12:{
					required:true,
						maxlength: 100,
				},
				icon12:{
				
					extension:"gif|jpg|png",
				},
			},
			messages:{
				name12:{
					required:"Name is required",
					maxlength:"Description must be less than of 100 characters",
				},
				icon12:{
			
				extension: "Only image type gif,jpg,png is allowed",
				},						
			}
		});

      $(document).on('click','.edit_shade', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var name=_this.attr('data-name');
    $('#id').val(id);
    $('#ename').val(name);
   $('#edit_form').attr('action', base_url+'/admin/update-shade');
});

  $(document).on('click','.delete_shade', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete shade?';
    var url = base_url+'/admin/SiteParametersController/delete_shade';
    delete_parameter(head_title, title, url, id);
});


 $(document).on('change','#electric', function(){
 		$('#amps').siblings('.select').children('.ms-drop.bottom').children('ul').children('li').removeClass('selected') ;
 		$('#amps').siblings('.select').children('.ms-drop.bottom').children('ul').children('li').children('label').children('input').prop("checked", false); ;
 		$('#amps').siblings('.select').children('.ms-choice').children('span').text('') ;
 })
 if($('#electric option:selected').val() == "Yes")
 {
 	var req = false ;
 }


$('#add_site_description').validate({
	ignore: [],
rules:{
	
	 coverage: {
                required: {
                    depends: function (element) {
                    	if( ($('#verizon option:selected').text() != "No" && $('#verizon option:selected').text() !='') || ($('#verizon-edit option:selected').text() != "No" && $('#verizon-edit option:selected').text() !='') )
                    	{
                    		return true ;
                    	}else{
                    		return false ;
                    	}
                        
                    }
                }
            },

	color:{
		required:true,
	},
	banner:{
		required:true,
		extension:"jpeg|gif|jpg|png",
	},

	length:{
      	 digits: true
	},
	region:{
		required:true,
	},
	parentcom:{
		required:true,
	},
	siteno:{
		required:true,	
		number:true,	
	},
	spacing:{
		required:true,
	},
	img:{
		extension:"jpeg|jpg|png",
	},
	guests:{
		required:true,
		number: true,
		min:0,
	},

	vehicles:{
		required:true,
		number: true,
		min:0,
	},
	pets:{
		required:true,
	},
	trailer:{
		required:true,
		digits: true
	},
	grade:{
		required:true,
	},
	base:{
		required:true,
	},
	electric:{
		required:true,
	},
	
	
	access:{
		required:true,
	},
	wifi:{
			required:true,
	},
	tv:{
			required:true,
	},
	verizon:{
			required:true,
	},
	shade:{
			required:true,
	},
	toilet:{
			required:true,
			number: true,
			min:0,
	},
	ywater:{
			required:true,
			number: true,
			min:0,
	},
	ytrash:{
			required:true,
			number: true,
			min:0,
	},
},
messages:{
	password:{
		required:"Color field is required",
	},
	banner:{
		required:"Banner Field is required",
		extension: "Only image type gif,jpg,png is allowed",
	},
	region:{
		required:"Region field is required",
	},
	parentcom:{
		required:"Parent Campground field is required",
	},
	siteno:{
		required:"Site no field is required",
		
	},
	spacing:{
		required:"Spacing no field is required",
	},
	img:{
		extension: "Only image type jpg and png are allowed",
	},
	
	guests:{
		required:"NO OF GUESTS field is required",
		  number: "Please provide only number",
	},

	trailer:{
		  number: "Please provide only number",
	},
	vehicles:{
		required:"NO OF Vehicle field is required",
		  number: "Please provide only number",
	},
	pets:{
		required:"Pets field is required",
	},
	trailer:{
		required:"Length field is required",
	},
	grade:{
		required:"Grade field is required",
	},
	base:{
		required:"Base field is required",
	},
	access:{
		required:"Access field is required",
	},
	electric:{
		required:"Electric field is required",
	},	
	wifi:{
		required:"Wifi field is required",
	},
	tv:{
		required:"Tv field is required",
	},
	verizon:{
		required:"Service Provider field is required",
	},
	shade:{
		required:"Shade type field  is required",
	},

	coverage:{
		required:"this field must be completed",
	},
	toilet:{
		required:"Yards to Toilet field is required",
	},
	ywater:{
		required:"Yards to Water field  is required",
	},
	ytrash:{
		required:"Yards to Trash field is required",
	},									
}
});


$('#add_site_description').on('submit', function(){ 

	var validator = $( "#add_site_description" ).validate();
        if(validator.form())
        {    
        	var result = side_validation()      	
        	return result;
        }
        else
        {
			var result = side_validation()    	
        	return result;

        }
});

function side_validation()
{
	var view, comping, acess, water, sewer, table, amps;
			    $("#comping").select({
			        tags:[],
			        allowClear: true
			    });
			    //view
			    $("#view").select({
			        tags:[],
			        allowClear: true
			    });
           //water
            $("#water").select({
			        tags:[],
			        allowClear: true
			    });

            //for sewer

            $("#sewer").select({
			        tags:[],
			        allowClear: true
			    });
            //table
              $("#table").select({
			        tags:[],
			        allowClear: true
			    });
              //amps

              if($('#electric option:selected').val() == "Yes")
              {
              	 if($('#amps').val() == '')
				    {
				    	$('#ampserror').text('THE TYPE OF AMPS FIELD IS REQUIRED');
				    	amps = 0;
				    }
              }

              
			    else{
			    	$('#ampserror').text('');
			    	amps = 1;
			    }
			    //camp
			    if($('#comping').val() == '')
			    {
			    	$('#compingerror').text('THE TYPE OF CAMPING FIELD IS REQUIRED');
			    	comping = 0;
			    }
			    else{
			    	$('#compingerror').text('');
			    	comping = 1;
			    }
              //view
			    if($('#view').val() == '')
			    {
			    	$('#viewerror').text('THE TYPE OF View FIELD IS REQUIRED');
			    	view = 0;
			    }
			    else{
			    	$('#compingerror').text('');
			    	view = 1;
			    }
             //water
                if($('#water').val() == '')
			    {
			    	$('#watererror').text('THE Water Supply FIELD IS REQUIRED');
			    	water = 0;
			    }
			    else{
			    	$('#watererror').text('');
			    	water = 1;
			    }
			     //sewer
                if($('#sewer').val() == '')
			    {
			    	$('#sewererror').text('THE Sewer FIELD IS REQUIRED');
			    	sewer = 0;
			    }
			    else{
			    	$('#sewererror').text('');
			    	sewer = 1;
			    }
			    //table
			      if($('#table').val() == '')
			    {
			    	$('#tableerror').text('THE TYPE OF Table FIELD IS REQUIRED');
			    	table = 0;
			    }
			    else{
			    	$('#tableerror').text('');
			    	table = 1;
			    }
			    //amps
			      //camp
			    if (amps == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }
			    //camp
			    if (comping == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }
			    //table
			     if (table == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }
              //for view
               if (view == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }

			    //for water
               if (water == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }
			    //for sewer
			     if (sewer == 0 )
			     {
			     	return false;
			    }
			    else
			    {
			    	return true;
			    }


}

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
   subscriberType:{
      required:true,
    },
    amount:{
      number:true,
      required:function(element) {
            return $("#subscriberType").val() == 'Manual Payment';
            },
    },
     e_date:{
        required:function(element) {
            return $("#subscriberType").val() == 'Manual Payment';
            },
    },
    imageSubscriber:{
                  extension:"jpg|png|jpeg",
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
     subscriberType:{
      required:"Select Subscriber Type",
    },
    amount:{
     required:"Amount is required",
    },
     e_date:{
       required:"Set Expiry Date",
    },
    imageSubscriber:{
        extension:"Only Png and Jpeg images are allowed",
    } 
    
    
              
}

});

var subscriber_table=$('#subscriber-table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Name",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: base_url+"admin/Subscriber/subscriberPagination",
			 type: "post",
           "data": function ( d ) {
           	d.from=$("#from").val();
            d.to=$("#to").val();
            d.type=$("#type").val();


           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
       {"data": "no"},  
    	 {"data": "date"},      
         {"data": "name"},
         {"data": "type"},

         {"data": "expire"},
         {"data": "free_trial"},
         {"data": "status"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [7],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/subscriber-details/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/edit-subscriber/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_subsciber" data-toggle="tooltip" title="Delete">Delete</a>';
                	
               		if( (row.expire != "No Payment done yet" && row.admin_status == 2) || (row.expire != "No Payment done yet" && (row.admin_status == 1 || row.admin_status == 0) )  )
               		{
               				if(row.status=='Draft'){
                		html+='<span class="ease-btn" style="opacity: 0;"> Activate</span>';
	                	}

	                	 if (row.admin_status == '0') 
	                    {
	                      html += '  <a href="javascript:void(0);" class="ease-btn unblockedSubscriber" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Unblock</a>';
	                    }
	                    else 
	                    {
	                       html += ' <a href="javascript:void(0);" class="ease-btn blockedSubscriber" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivate">Block</a>';
	                    }
               		}

                	

                    if(row.expire == "No Payment done yet" && row.admin_status != 2 )
                    {
                    	html += ' <a href="javascript:void(0);" class="ease-btn freeAccount" data-toggle="tooltip" style="background-color: blue;" data-id="'+row.id+'" title="Free_Account">Free Account</a>';
                    }

                    return html;
               }
           }
       ],
} );







// free trial

var trial_table=$('#free-trial-table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Name",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: base_url+"admin/Subscriber/FreeTrialPagination",
       type: "post",
           "data": function ( d ) {
            d.from=$("#from_trial").val();
            d.to=$("#to_trial").val();
            d.type=$("#type").val();

           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
       {"data": "no"},  
       {"data": "start_date"},      
         {"data": "name"},
         // {"data": "type"},

         {"data": "end_date"},
         {"data": "status"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [5],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/subscriber-details/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/edit-subscriber/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_subsciber" data-toggle="tooltip" title="Delete">Delete</a>';
                  
                  if( (row.expire != "No Payment done yet" && row.admin_status == 2) || (row.expire != "No Payment done yet" && (row.admin_status == 1 || row.admin_status == 0) )  )
                  {
                      if(row.status=='Draft'){
                    html+='<span class="ease-btn" style="opacity: 0;"> Activate</span>';
                    }

                     if (row.admin_status == '0') 
                      {
                        html += '  <a href="javascript:void(0);" class="ease-btn unblockedSubscriber" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Unblock</a>';
                      }
                      else 
                      {
                         html += ' <a href="javascript:void(0);" class="ease-btn blockedSubscriber" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivate">Block</a>';
                      }
                  }

                  

                    if(row.expire == "No Payment done yet" && row.admin_status != 2 )
                    {
                      // html += ' <a href="javascript:void(0);" class="ease-btn freeAccount" data-toggle="tooltip" style="background-color: blue;" data-id="'+row.id+'" title="Free_Account">Free Account</a>';
                    }

                    return html;
               }
           }
       ],
} );




// user payment details
// $('#from').on('change',function(){
//   alert('123');
// subscriber_table.draw();
// });
// $('#to').on('change',function(){
//   alert('abc');
// subscriber_table.draw();
// });
$('#type').change(function(){
  // alert();
subscriber_table.draw();
});
$('#from').datepicker().on('changeDate', function (ev) {
  subscriber_table.draw();
      // var firstDate = $('#return').val();
      // alert(firstDate);
});
$('#to').datepicker().on('changeDate', function (ev) {
    subscriber_table.draw();
      // var firstDate = $('#return').val();
      // alert(firstDate);
});

$('#from_trial').datepicker().on('changeDate', function (ev) {
	trial_table.draw();
	// var firstDate = $('#return').val();
	// alert(firstDate);
});
$('#to_trial').datepicker().on('changeDate', function (ev) {
	trial_table.draw();
	// var firstDate = $('#return').val();
	// alert(firstDate);
});
 // $('.daterange-1').on('apply.daterangepicker', function(ev, picker) {
 //  alert('apply');
 //      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
 //     subscriber_table.draw();
 //  });

 //  $('.daterange-1').on('cancel.daterangepicker', function(ev, picker) {
 //  alert('cancel');
 //      $(this).val('');
 //      subscriber_table.draw();
 //  });

var subscriber_table1=$('#payement-table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Name",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: base_url+"admin/Subscriber/PaymentPagination",
			 type: "post",
           "data": function ( d ) {
           	// alert($("#daterange").val());
           	d.dateRange=$("#daterange").val();
           	  
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
       {"data": "no"},  
    	 {"data": "date"},      
         {"data": "name"},
         {"data": "email"},
         {"data": "currency"},
         {"data": "txn"},

       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [6],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/subscriber-details/'+row.user_id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View User Detail</a>';
                    return html;
               }
           }
       ],
} );

// });
  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
     subscriber_table1.draw();
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      subscriber_table1.draw();
  });

var tablesite=$('#description_list').DataTable({

   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Campsite",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: base_url+"admin/SiteDescriptionController/site_pagenation",
			 type: "post",
           "data": function ( d ) {
           	   	d.extra_search = $('#site-s').val();
           	   	d.child = $('#site-s-child').val();
           	   	d.campsite = $('#site-s-campsite').val();

           	if($('#site-s-campsite').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}


           	if($('#site-s').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}

           	if($('#site-s-child').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}
           	var value = $('.dataTables_filter input').val();
           
           	if(value!='')
           	{
           		
           		$('.reset-mind-c').addClass('active');
           	}else{
           		
           		$('.reset-mind-c').removeClass('active');
           	}
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},      
         {"data": "pname"},
         {"data": "cname"},
         {"data": "name"},
         {"data": "status"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [5],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/site-description-details/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/site-description-edit/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_site" data-toggle="tooltip" title="Delete">Delete</a>';
                	if(row.status=='Draft'){
                		html+='<span class="ease-btn" style="opacity: 0;"> Activate</span>';
                	}else if (row.live == '1') 
                    {
                      html += '  <a href="javascript:void(0);" class="ease-btn save_site" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Activate</a>';
                    }
                    else 
                    {
                       html += ' <a href="javascript:void(0);" class="ease-btn publish_site" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivate">Deactivate</a>';
                    }
                    return html;
               }
           }
       ],
} );


var tablesite1=$('#import_description_list').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Campsite",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: base_url+"admin/SiteDescriptionController/import_site_discription",
			 type: "post",
           "data": function ( d ) {
           	   	d.extra_search = $('#site-s').val();
           	   	d.child = $('#site-s-child').val();
           	   	d.campsite = $('#site-s-campsite').val();

           	if($('#site-s-campsite').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}


           	if($('#site-s').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}

           	if($('#site-s-child').val()!='')
           	{
           		$('.reset1-c').addClass('active');
           	}else{
           		$('.reset1-c').removeClass('active');
           	}
           	var value = $('.dataTables_filter input').val();
           
           	if(value!='')
           	{
           		
           		$('.reset-mind-c').addClass('active');
           	}else{
           		
           		$('.reset-mind-c').removeClass('active');
           	}
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
    	 {"data": "no"},      
         {"data": "pname"},
         {"data": "cname"},
         {"data": "name"},
         {"data": "status"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [5],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               html += '<a href="'+base_url+'admin/site-description-details/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View Detail</a><a href="'+base_url+'admin/site-description-edit/'+row.id+'" class="ease-btn" data-toggle="tooltip" title="Edit">Edit</a><a href="javascript:void(0);" data-id="'+row.id+'"  class="ease-btn delete_site" data-toggle="tooltip" title="Delete">Delete</a>';
                	if(row.status=='Draft'){
                		html+='<span class="ease-btn" style="opacity: 0;"> Activate</span>';
                	}else if (row.live == '1') 
                    {
                      html += '  <a href="javascript:void(0);" class="ease-btn save_site" data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Activate</a>';
                    }
                    else 
                    {
                       html += ' <a href="javascript:void(0);" class="ease-btn publish_site" data-toggle="tooltip" style="background-color: red;" data-id="'+row.id+'" title="Deactivate">Deactivate</a>';
                    }
                    return html;
               }
           }
       ],
} );


//cel phone
 $( "#verizon" ).change(function() {

        
				   if($('#verizon option:selected').text() != "No")
		              {
		              	 $('#ph-lab').show() ;
		              	 $('#coverage').show() ;
		              }else{
		              	 $('#ph-lab').hide() ;
		              	 $('#coverage').hide() ;
		              }
				});

//end cel phone



$('#site-s').keyup(function  (argument) {
	$('.reset1-site').addClass('active');
tablesite1.draw();
});
$('#site-s-campsite').keyup(function  (argument) {
	$('.reset1-site-3').addClass('active');
tablesite1.draw();
});
$('#site-s-child').keyup(function  (argument) {
	$('.reset2-site-2').addClass('active');
tablesite1.draw();
});

$('#site-s').keyup(function  (argument) {
	$('.reset1-site').addClass('active');
tablesite.draw();
});
$('#site-s-campsite').keyup(function  (argument) {
	$('.reset1-site-3').addClass('active');
tablesite.draw();
});
$('#site-s-child').keyup(function  (argument) {
	$('.reset2-site-2').addClass('active');
tablesite.draw();
});

 $(document).on('click','.reset1-site',function  () {
 	// alert('123');
        $('#site-s').val('').keyup();
        $('.reset1-site').removeClass('active');
        tablesite.draw();
        // alert('123');
     });
$(document).on('click','.reset2-site-2',function  () {
$('#site-s-child').val('');
$('.reset2-site-2').removeClass('active');
tablesite.draw();
// alert('1234');
});
$(document).on('click','.reset1-site-3',function  () {
$('#site-s-campsite').val('');
$('.reset1-site-3').removeClass('active');
tablesite.draw();
// alert('1234');
});


  $(document).on('click','.publish_site', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to activate site?';
    var url = base_url+'/admin/SiteDescriptionController/publish_site';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.save_site', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to deactivate site?';
    var url = base_url+'/admin/SiteDescriptionController/save_site';
    delete_f(head_title, title, url, id);
});

  $(document).on('click','.delete_site', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete Campsite?';
    var url = base_url+'/admin/SiteDescriptionController/delete_site';
    delete_f(head_title, title, url, id);
});

    $(document).on('click','.delete_newsletter', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> You want to delete Subscriber?';
    var url = base_url+'/admin/SiteDescriptionController/delete_newsletter';
    delete_f(head_title, title, url, id);
});

    $(document).on('click','.delete_subsciber', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> you want to delete this subscriber';
    var url = base_url+'/admin/Subscriber/delete_subscriber';
    delete_f(head_title, title, url, id);
});

        $(document).on('click','.blockedSubscriber', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> you want to block this subscriber';
    var url = base_url+'/admin/Subscriber/blockedSubscriber';
    delete_f(head_title, title, url, id);
});


//free account
       $(document).on('click','.freeAccount', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br> you want to activate free account to this subscriber';
    var url = base_url+'/admin/Subscriber/freeAccount';
    delete_f(head_title, title, url, id);
});
//end free account

                $(document).on('click','.unblockedSubscriber', function(){
 	var _this=$(this);
    var id=_this.attr('data-id');
    var title = '';
    var head_title = 'Are you sure? <br>  you want to unblock this subscriber?';
    var url = base_url+'/admin/Subscriber/unblockedSubscriber';
    delete_f(head_title, title, url, id);
});

  $(function () {
    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            sendOrderToServer();
           }
    });

    function sendOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#tablecontents tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".sort_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortspacing',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });
  $(function () {
    $( "#view_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            viewOrderToServer();
           }
    });

    function viewOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#view_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".view_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortspacingview',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  //for camping  table
  $(function () {
     // $("#table").DataTable();

    $( "#camping_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            campOrderToServer();
           }
    });

    function campOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#camping_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".camp_sort").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortcamping',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

//for length  table
  $(function () {
     // $("#table").DataTable();

    $( "#length_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            lengthOrderToServer();
           }
    });

    function lengthOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#length_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".length_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortlength',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  //for grade  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#grade_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            gradeOrderToServer();
           }
    });

    function gradeOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#grade_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".grade_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortgrade',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

    //for  base  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#base_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            baseOrderToServer();
           }
    });

    function baseOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#base_sorting tr').each(function(index,element) {
        	// alert($(this).find(".base_id").attr('data-id'));
         order.push({
          id: $(this).find(".base_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortbase',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

   //for  access  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#sorting_access" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            accessOrderToServer();
           }
    });

    function accessOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#sorting_access tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".access_id").attr('data-id'),
          position: index+1

        });

      });
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sorting_access',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  //for  amps  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#amps_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            ampsOrderToServer();
           }
    });

    function ampsOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#amps_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".amps_id").attr('data-id'),
          position: index+1

        });

      });

      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortamps',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

    //for  water  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#water_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            waterOrderToServer();
           }
    });

    function waterOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#water_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".water_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortwater',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
 
            }
        }
      });

    }
  });
  $(function () {

    $( "#sewer_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            sewerOrderToServer();
           }
    });

    function sewerOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#sewer_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".sewer_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortsewer',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  $(function () {

    $( "#verizon_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            verizonOrderToServer();
           }
    });

    function verizonOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#verizon_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".verizon_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortverizon',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  $(function () {
    $( "#shade_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            shadeOrderToServer();
           }
    });

    function shadeOrderToServer() {
      var order = [];
    
        $('#shade_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".shade_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortshade',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  $(function () {

    $( "#wifi_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            wifiOrderToServer();
           }
    });

    function wifiOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#wifi_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".wifi_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortwifi',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

  $(function () {


    $( "#cable_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            cableOrderToServer();
           }
    });

    function cableOrderToServer() {
      var order = [];
    
        $('#cable_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".cable_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sortcable',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });

   //for  table firing  table sorting
  $(function () {
     // $("#table").DataTable();

    $( "#tablefire_sorting" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      revert: 100,
      update: function() {
            tablesOrderToServer();
           }
    });

    function tablesOrderToServer() {
    	// alert('23213');
      var order = [];
    
        $('#tablefire_sorting tr').each(function(index,element) {
        	
         order.push({
          id: $(this).find(".table_id").attr('data-id'),
          position: index+1

        });

      });
           
      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: base_url + 'sorttable',
        data: {
          order:order,
          '_token': $('meta[name=csrf-token]').attr('content'),
          'start': $( '#page' ).val(),

        },
        success: function(response) {
            if (response.status == "success") {
            } else {
            }
        }
      });

    }
  });




  //for cell phone coverage
  //on change option functionality
  $(document).ready(function(){
  	$("#coverage").children('option').hide();
    $('#verizon').on('change', function(){
      
       var val=$(this).val();
       // alert('2134');
      if(val !=='')
      {
         $("#coverage").children('option').show();
     }
     else{
       
         
        $("#coverage").children('option').hide();
      
      }
      // alert($(this).val());
});
    });

  $('#add_new_blog').validate({
rules:{
		blog_title:{
			required:true,
			maxlength: 100,
		},
		blog_slug:{
			required:true,
			maxlength: 100,
			customRule: true,

		},
		
	
		blog_descrip_tag:{
			required:true,
			maxlength: 160,
		},
	
		blog_keywords:{
			required:true,
			maxlength: 100,
		},

		page_title:{
			required:true,
			maxlength: 100,
		},

		 blog_image: {
                
                extension: "jpg|jpeg|png"
            },
	},
messages:{
		blog_title:{
			required:"Blog Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},
		blog_slug:{
			required:"Slug is required",
			  maxlength:"Slug must be less than of 100 characters",
		},
		blog_image:{
			//required:"Banner is required",
 			extension: "Only image type jpg,png is allowed",
		},
	
		blog_descrip_tag:{
			required:"Description meta tag is required",
			  maxlength:"description meta tag must be less than of 160 characters",
		},
			page_title:{
			required:"Page Title is required",
		},
							
		blog_keywords:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},

}

});



//edit form of blog  
 $('#update_new_blog').validate({
rules:{
		blog_title:{
			required:true,
			maxlength: 100,
		},
		blog_slug:{
			required:true,
			maxlength: 100,
			customRule: true,

		},
		
	
		blog_descrip_tag:{
			required:true,
			maxlength: 160,
		},
	
		blog_keywords:{
			required:true,
			maxlength: 100,
		},

		page_title:{
			required:true,
			maxlength: 100,
		},

		 blog_image: {
                
                extension: "jpg|jpeg|png"
            },
	},
messages:{
		blog_title:{
			required:"Blog Title is required",
			  maxlength:"Title must be less than of 100 characters",
		},
		blog_slug:{
			required:"Slug is required",
			  maxlength:"Slug must be less than of 100 characters",
		},
		blog_image:{
			//required:"Banner is required",
 			extension: "Only image type jpg,png is allowed",
		},
	
		blog_descrip_tag:{
			required:"Description meta tag is required",
			  maxlength:"description meta tag must be less than of 160 characters",
		},
							
		blog_keywords:{
			required:"keyword is required",
			  maxlength:"keyword must be less than of 100 characters",
		},

}

});
//end edit form of blog  

  $('#blog_table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "language": {
    "search": "Search By Title ",
    "searchPlaceholder":"",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"/admin/BlogController/blog_pagenation",
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
    	 {"data": "date"},
         {"data": "name"},
         {"data": "slug"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [4],
               "orderable": true,
               "render": function (data, type, row) {
              var but='fa fa-toggle-off';
                   var html = '';
               // return '<a href="'+baseURL+'admin/dealer-details/'+row.id+'" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a><a href="'+baseURL+'admin/edit-dealer/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit Dealer"></a> <a href="javascript:void(0);" data-id="'+row.id+'" class="fa fa-trash delete_dealer" data-toggle="tooltip" title="Delete Dealer"></a>'
               html += '<a href="'+base_url+'admin/blog-edit/'+row.id+'" class="ease-btn i_id" data-id="'+row.id+'" data-toggle="tooltip" title="Edit">Edit</a><a id="blog-del-'+row.id+'" data-id="'+row.id+'" href="javascript:void(0)" class="ease-btn dell-blogqweq" data-toggle="tooltip" title="Delete">Delete</a><a href="'+base_url+'admin/blog-detail/'+row.slug+'" class="ease-btn" data-toggle="tooltip" title="View Detail">View</a><a href="'+base_url+'admin/comments-view-blog/'+row.slug+'" class="ease-btn" data-id="'+row.id+'" data-toggle="tooltip" title="Comments">Comments</a>';
                	if (row.live == 1) 
                    {
                      html += '  <a href="javascript:void(0);" class="ease-btn blockblog " data-toggle="tooltip" style="background-color: green;" data-id="'+row.id+'" title="Activate">Activated</a>&nbsp&nbsp';
                    }
                    else
                    {
                       html += ' <a href="javascript:void(0);" class="ease-btn activeBlog " data-toggle="tooltip" style="background-color: red;"  data-id="'+row.id+'" title="Deactivate">Deactivated</a>&nbsp&nbsp';
                    }
                    return html;
               }
           }
       ],
         "drawCallback": function (settings) {
       // Here the response
       // alert('123');
       var response = settings.json;
     // alert(response['page']);
        $( '#page_c' ).val(response['page']);
   }, 
} );


$(document).on("click", ".dell-blogqweq", function() {
	var _this=$(this);
	var id=_this.attr('data-id');
	var head_title = "<strong>Are you sure?</strong>";
	var title = 'You want to delete this blog?';
	var url = base_url+'admin/blog_delete/';
	delete_f(head_title, title, url, id);
});

function delete_parameter(head_title, title, url, id,_this="")
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
                      	// alert(data);
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
        },
      
    }
});
 	}
 function delete_f(head_title, title, url, id,_this="")
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
        },
      
    }
});

 }


 function delete_function(head_title, title, url, id,_this="")
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
                      		_this.closest('tr').remove() ;
                      		 // location.reload();
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

 //special case
function delete_cus(head_title, title, url, id,_this="")
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

							// location.reload();
							if(_this!='')
							_this.closest('tr').remove() ;
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
//end special case


$('#add-region-seo').validate({
	rules:{
		region:{
			required: true,
		},
		title:{
			required: true,
		},
		keyword:{
			required:true,
		},
		meta_description:{
			required:true,
		}
	},
	messages:{
		region:{
			required: "Select Region",
		},
		title:{
			required: "Page title is required",
		},
		keyword:{
			required:"Keyword for Meta Tags are  required",
		},
		meta_description:{
			required:"Meta Description is required",
		}
	}
});
$('#seo_regionid').change(function(){
	var url = base_url+'admin/detailSeo';
	var regionName=$(this).val();
	$.ajax({
		url:url,
		type:"POST",
		data: {'regionName' : regionName },
		success: function(data){
			if (data == '1') {
				toastr.error("Error! Please Try Again");
			}
			else{
				var obj=JSON.parse(data);
				$('#Seo_pageTitle').val(obj.title);
				$('#Seo_keywords').val(obj.tags);
				$('#Seo_description').text(obj.description);
			}
		}
	});
});



$('#add-region-seo').validate({
  rules:{
    region:{
      required: true,
    },
    title:{
      required: true,
    },
    keyword:{
      required:true,
    },
    meta_description:{
      required:true,
    }
  },
  messages:{
    region:{
      required: "Select Region",
    },
    title:{
      required: "Page title is required",
    },
    keyword:{
      required:"Keyword for Meta Tags are  required",
    },
    meta_description:{
      required:"Meta Description is required",
    }
  }
});






$('#add_newsletter').validate({

  rules:{

    newsletter_title:{
      required:true,
    },
    newsletter_image:{
      required:true,
      extension:"gif|jpg|png",
    },

    newsletter_pdf_file:{
      required:true,
      extension:"pdf",
    },

    description1:{
      required:true,
      maxlength: 245,

    },
  },
  


  messages:{
    newsletter_title:{
      required:"Newsletter title",
    },
    newsletter_image:{
      required:"Newsletter image is required",
      extension:"Only png,jpg and png files are allowed",
    },
    newsletter_pdf_file:{
       required:"Newsletter pdf file is required",
       extension:"Only pdf files are allowed",
    },
    description1:{
      required:"Newsletter description required",
      maxlength:"Newslatter description must be less than of 245 characters",
    },

  },

})




  $('#newsletter_table').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "language": {
    "search": "Search By Title ",
    "searchPlaceholder":"",
  },

   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],     
      "ajax": {

           url: base_url+"/admin/NewsletterController/newsletter_pagenation",
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
       {"data": "date"},
        {"data": "title"},
         {"data": "image"},
         {"data": "pdf_file"},
       ],
       "columnDefs": [
           {
               "className": "dt-center",
               "targets": [5],
               "orderable": true,
               "render": function (data, type, row) {
                // console.log(row)
              var but='fa fa-toggle-off';
                   var html = '';
               // return '<a href="'+baseURL+'admin/dealer-details/'+row.id+'" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a><a href="'+baseURL+'admin/edit-dealer/'+row.id+'" class="fa fa-pencil" data-toggle="tooltip" title="Edit Dealer"></a> <a href="javascript:void(0);" data-id="'+row.id+'" class="fa fa-trash delete_dealer" data-toggle="tooltip" title="Delete Dealer"></a>'
               html += '<a href="'+base_url+'admin/newsletter-edit/'+row.id+'" class="ease-btn i_id" data-id="'+row.id+'" data-toggle="tooltip" title="Edit">Edit</a><a id="blog-del-'+row.id+'" data-id="'+row.id+'" href="javascript:void(0)" class="ease-btn dell-newseletter" data-toggle="tooltip" title="Delete">Delete</a>';
                 
                    return html;
               }
           }
       ],
         "drawCallback": function (settings) {
       // Here the response
       // alert('123');
       var response = settings.json;
     // alert(response['page']);
        $( '#page_c' ).val(response['page']);
   }, 
} );




$(document).on("click", ".dell-newseletter", function() {
  console.log('click');
  var _this=$(this);
  var id=_this.attr('data-id');
  var head_title = "<strong>Are you sure?</strong>";
  var title = 'You want to delete this newsletter?';
  var url = base_url+'admin/newsletter_delete';
  delete_f(head_title, title, url, id);
});



  $('#update_newslatter').validate({

  rules:{

    title:{
      required:true,
    },
    image:{
      extension:"gif|jpg|png",
    },

    file:{
      extension:"pdf",
    },

    description1:{
      required:true,
      maxlength: 245,

    },
  },
  


  messages:{
    newsletter_title:{
      required:"Newsletter title",
    },
    newsletter_image:{
      required:"Newsletter image is required",
      extension:"Only png,jpg and png files are allowed",
    },
    newsletter_pdf_file:{
       required:"Newsletter pdf file is required",
       extension:"Only pdf files are allowed",
    },
    description1:{
      required:"Newsletter description required",
      maxlength:"Newsletter description must be less than of 245 characters",
    },

  },

})