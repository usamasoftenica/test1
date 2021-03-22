<!-- Modal -->

<div class="modal fade" id="forumModal-forum" tabindex="-1" role="dialog" aria-labelledby="forumModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="forumModalLabel">Topic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="question-forum-form" action="javascript:void(0)" class="forum-form">
					<ul>
						<li>

							
							 <label>Topic:</label>
							<input id="forum_question" name="forum_question" type="text" placeholder="Type here.." class="form-control">
							
						</li>
						<li>

							<div class="form-group">
								<label>Question/Description:</label>
							    <textarea rows="5" id="question_description" name="question_description" placeholder="Type here.." class="form-control" style="    height: 200px !important;"></textarea>
							</div>
							
						</li>
						<li><input id="question_submit" type="button" class="submit" value="Submit"></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<div style="opacity: 1" class="modal fade" id="forumModal-forum-edit" tabindex="-1" role="dialog" aria-labelledby="forumModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="forumModalLabel">Edit Topic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="question-forum-form-1" method="post" action="<?php echo base_url() ?>update-forum" class="forum-form">
					<ul>
						<li>

							<label>Topic:</label>
							<input id="forum_question-1" name="forum_question" type="text" placeholder="Type here.." class="form-control">
						</li>
						<li>

							<div class="form-group">
							  <label>Question/Description:</label>
								<textarea rows="5" id="question_description-1" name="question_description" placeholder="Type here.." class="form-control" style="height: 200px !important;"></textarea>
							</div>
							
						</li>
						<input type="hidden" name="modalId" id="modalId" value="">
						<li><input  type="submit" class="submit" value="Submit"></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

	<!--// Subheader \\-->
	<div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>/assets/images/sub-header-img.jpg');">
		<span class="ccg-subheader-transparent" style="background-color: tan;"></span>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Forum</h1>
					<ul class="ccg-breadcrumb">
						<li><a href="<?php echo base_url();?> ">Home Page</a></li>
						<li>Forum</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--// Subheader \\-->

	<!--// Main Content \\-->
	<div class="ccg-main-content">

		<!--// Main Section \\-->
		<div class="ccg-main-section">
			
			<div class="container">
			
				<div class="row">
					<div class="col-md-12">
						<?php if($this->session->flashdata('success1-edit')!=""){  ?>

                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('success1-edit'); ?></strong> 
                </div>
                <?php } ;?>

                <div class="form-approve-custom">
                   
                </div>

				<div class="ccg-search">
					<form>
						<ul>
							<li>
								<input class="form-control" type="text" name="topic_search" id="topic-search" placeholder="Type here">
							</li>
							<li>
								<input onclick="pageloading(0)" id="topic-search-btn" value="Search" class="submit" type="button" name="btn">
							</li>
						</ul>
					</form>
				</div>
					</div>
					<div class="col-md-12">
						<?php if(isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] == 0){ ?>
						<a href="#forumModal-forum" data-toggle="modal" class="simple-btn pull-right" style="margin: 0px 0px 20px;">Start New Discussion Topic</a>
						<?php } ?>
						<div class="forum-list">
							<div style="color: green" class="upproval-message"></div>
							<ul id="forums-list-show" class="row">

							</ul>
						</div>

						<!-- pagination -->
						<ul id="example-2" class="pagination"></ul>
				            <div class="show"></div>
					<!-- end pagination -->
					</div>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

	</div>


	<!--// Main Content \\-->

	<!-- //for test user login or not -->

	
	<?php if(isset($this->session->userdata['userdata']['id'])){ ?>
		<input type="hidden" name="" id="user-login" value="1">
		<input id="user_id_js" type="hidden" name="" value="<?php echo $this->session->userdata['userdata']['id']; ?>">
	<?php }else{ ?>
		<input type="hidden" name="" id="user-login" value="0">
		<input id="user_id_js" type="hidden" name="" value="">	
	<?php } ?>
	<!-- end for test user login or not -->

<script>

	$('#question-forum-form').validate({
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
				required:"Topic is required",
			},

			question_description:{
				required:"Question/Description is required",
			},


		}

	});

		$('#question-forum-form-1').validate({
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
				required:"Topic is required",
			},

			question_description:{
				required:"Question/Description is required",
			},


		}

	});

$(document).on("click",".open-edit-forum",function() {
   
	var id=$(this).attr('data-id');

	var details=$('.forum-details-'+id).val();
	var questions=$('.forum-question-'+id).val();


	$('#modalId').val(id);
	$('#forum_question-1').val(questions);
	$('#question_description-1').val(details);
	



$('#forumModal-forum-edit').modal('show');
});

	$('#question_submit').click(function(e) {

		// e.preventDefault() ;
		//alert("ok");return;

		if($('#question-forum-form').valid()) {
		e.preventDefault();
		// alert('amir ishaque');
		// $('#reply-modal-edit').modal('hide');
		// $('#myModal').modal('hide');
		// var name = $("#name").val();
		var forum_question = $("#forum_question").val();
		// alert(comment_id);
		// console.log(comment_id);
		var question_description = $("#question_description").val();
		// alert(comment);

	//	var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_url+'HomeController/addForum',
			type: 'POST',
			data: {forum_question: forum_question, question_description: question_description},
			error: function() {
				alert('Something is wrong');
				console.log('error')
			},
			success: function(id) {

				$('#forumModal-forum').modal('hide');

				$('.form-approve-custom').addClass('alert alert-primary') ;

				$('.form-approve-custom').text('Success! Your posts are waiting admin approval.') ;

				// setTimeout(function(){  $('.upproval-message').text( '' ); }, 3000);
			}

			});
		 }
	});



	//pagination javascript
	base_url = 'http://www.coloradocampgrounds.development-env.com/';
		window.onload = pageloading(0);
        function pageloading(page) {
        	var length = 10;
        	var forms_input = $('#topic-search').val() ;


        	function formatDate(date) {

				var d = new Date(date),
					month = '' + (d.getMonth() + 1),
					day = '' + d.getDate(),
					year = d.getFullYear();

				if (month.length < 2) month = '0' + month;
				if (day.length < 2) day = '0' + day;

				return [year, month, day].join('-');
		}

            $('#example-2').pagination({
                total: 1, // 总数据条数
                current: 1, // 当前页码
                length: length, // 每页数据量
                size: 1, // 显示按钮个数
              
                /**
                 * [click description]
                 * @param  {[object]} options = {
                 *      current: options.current,
                 *      length: options.length,
                 *      total: options.total
                 *  }
                 * @param  {[object]} $target [description]
                 * @return {[type]}         [description]
                 */
                ajax: function (options, refresh, $target) {
                    // console.log(options);
                    // alert('Idhrrrrr hnnnn');
                    $.ajax({
                        // headers: {
                        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        // },
                        url: base_url+'HomeController/forumSearchAndPagination',
                        type: "post",
                        data: {'page_num': options.current,'forms_input':forms_input},
                    }).done(function (response) {
                    	var json = JSON.parse(response) ;
                    
                 		var userLogin = $('#user-login').val() ;
                 		var userID = $('#user_id_js').val() ;
                    	
                    	var months=['Jan','Feb','Mar','April','May','June','July','Aug','Sep','Oct','Nov','Dec'];


                    	var html = "" ;
                    	var str = ""
                        for (let i = 0; i < json[0]['forums'].length; i++) {
                        	
                    
                        	if(userLogin == 1 && userID == json[0]['forums'][i]['user_id']) {
                 			var edit = '<a style="margin-left:10px" href="javascript:void(0)" data-id="'+json[0]['forums'][i]['forum_compensation_id']+'"class="simple-btn open-edit-forum">Edit</a>' ;
	                 		}else{
	                 			var edit = '' ;
	                 		}

                        	var d = new Date(json[0]['forums'][i]['created_at']),
							month = '' + (d.getMonth()),
							day = '' + d.getDate();
							var new_data=day +' , '+months[month];

                        	if(json[0]['forums'][i]['image'] == '' || json[0]['forums'][i]['image'] == null)
                        	{
                        		var image = "2019_12_05_06_41_17.png" ;
                        	}else{
                        		var image = json[0]['forums'][i]['image'] ;
                        	}
                        	// alert(image);
                        	var imageUrl = base_url+"uploads/userImages/"+image ; 

                        	var description = json[0]['forums'][i]['description'];

                        	if (description.length > 150) {
                        		description = description.substring(0, 150)+'...'
                        	}

                        	var question = json[0]['forums'][i]['question']
							
							if (question.length > 100) {
                        		question = description.substring(0, 100)+'...'
                        	}                        	

                        	html += '<li class="col-md-6"><div class="forum-text"><figure style="background-image: url('+imageUrl+');"></figure><section><h2>'+json[0]['forums'][i]['first_name']+' '+json[0]['forums'][i]['last_name']+'</h2><a href="'+base_url+'home/forum-detail/'+json[0]['forums'][i]['forum_compensation_id']+'"><i class="fa fa-comment"></i> '+json[0]['forums'][i]['comment_count']+' Comments</a><a href="javascript:void(0)"><i class="fa fa-calendar"></i> '+new_data+'</a></section><div class="forum-q" style="margin: 0px 0px 0px;"><h3><a href="'+base_url+'home/forum-detail/'+json[0]['forums'][i]['forum_compensation_id']+'">'+question+'</a></h3><p>'+description+'</p><a href="'+base_url+'home/forum-detail/'+json[0]['forums'][i]['forum_compensation_id']+'" class="simple-btn">View</a>'+edit+'</div></div></li><input type="hidden" name="forum-details" class="forum-details-'+json[0]['forums'][i]['forum_compensation_id']+'" value="'+json[0]['forums'][i]['description']+'" ><input type="hidden" name="forum-question" class="forum-question-'+json[0]['forums'][i]['forum_compensation_id']+'" value="'+json[0]['forums'][i]['question']+'" >';
                        	
                        }

                         $('#forums-list-show').html("") ;
                        total = json[0]['totalRows'];
                        if (total == 0)
                        {
                            html = '<li class="col-md-12" style="text-align:center"><b>No Topics Found.</b> </div>'
                        }
                        $('#forums-list-show').append(html) ;

                         refresh({
							total: total,// 可选
							length: length // 可选
						});
                    });
                     
                     
                    
                }
            });
        }


	//end pagiantion javascript


</script>

