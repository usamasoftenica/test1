<!--blog reply mdoel-->
<div id="reply-modal-blog" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Post A Reply</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="coment_reply_blog">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">
						<input type="hidden" name="menuid" class="menuid" value="">

						<?php
						$this->db->select('email')
							->from('subscribe')
							->where('id',$this->session->userdata['userdata']['id']) ;

						$query = $this->db->get() ;
						$email = $query->result() ;


						//$this->session->userdata['userdata']['id'] ;
						?>

						<input id="email_blog" name="email_blog" type="hidden" value="<?php echo $email[0]->email; ?>">

						<input id="detect_forum-reply-blog" name="detect_forum-reply" type="hidden" value="1">
						<?php $first=$this->session->userdata['userdata']['first_name'];
						$last=$this->session->userdata['userdata']['last_name'];
						$name=$first.' '.$last;
						$image=$this->session->userdata['userdata']['image'];
						?>
						<input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
						<input type="hidden" name="image" id="image" value="<?php echo $image; ?>">

						<p class="ccg-full-form">
							<textarea name="comment" id="commentss" placeholder="Type Your Comment Here" class="commenttextarea coms"></textarea>
							<i class="fa fa-comment"></i>
						</p>
						<p class="form-submit"><input value="Reply" type="submit">
						</p>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--  <div class="modal-footer">
			   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 </div> -->
		</div>

	</div>
</div>
<!--end blog-reply model-->

<!--edit blog reply model-->
<div id="reply-modal-edit-reply" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title">Edit A Reply</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="coment_edit_replyss">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">

							<?php
						$this->db->select('email')
							->from('subscribe')
							->where('id',$this->session->userdata['userdata']['id']) ;

						$query = $this->db->get();
						$email = $query->result() ;


						//$this->session->userdata['userdata']['id'] ;
						?>

						<input id="email_blog" name="email_blog" type="hidden" value="<?php echo $email[0]->email; ?>">

						<p class="ccg-full-form">
							<textarea name="commenteditreply" id="commentss-edit-reply" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
							<i class="fa fa-comment"></i>
						</p>
						<p class="form-submit"><input value="Edit" type="submit">
						</p>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--  <div class="modal-footer">
			   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 </div> -->
		</div>

	</div>
</div>
<!--end edit blog reply model-->

<!--edit comment model-->
<div id="comment-modal-edit-blog" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit A Comment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="comment-respond">
					<form method="post" id="coment_edit">

							<?php
									 $this->db->select('email')
									->from('subscribe')
									->where('id',$this->session->userdata['userdata']['id']) ;

									 $query = $this->db->get();
									 $email = $query->result() ;


									//$this->session->userdata['userdata']['id'] ;
								?>

						<input type="hidden" name="inputhidden" class="inputhidden" value="">
						<input id="email_blog" name="email_blog" type="hidden" value="<?php echo $email[0]->email; ?>">


						<p class="ccg-full-form">
							<textarea name="commentedit" id="commentss-edit" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
							<i class="fa fa-comment"></i>
						</p>
						<p class="form-submit"><input value="Edit" type="submit">
						</p>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--  <div class="modal-footer">
			   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 </div> -->
		</div>

	</div>
</div>
<!--end edit comment model-->


		<!--// Main Content \\-->
		<div class="ccg-main-content" style="margin-top: 40px;">

			<!--// Main Section \\-->
			<div class="ccg-main-section">
				<div class="container">
					<div class="row">	
    					<div class="col-md-9">
                            <figure class="ccg-blog-thumb"><img src="<?php echo base_url()?>/uploads/blog/<?php echo $blog_detail[0]->blog_image ?>" alt=""></figure>
                            <div class="ccg-blog-heading">
                                <time datetime="">
									<?php $yrdata= strtotime($blog_detail[0]->created_at) ;
									echo date('M-d', $yrdata);
									?>
								</time>
									<h2><?php echo $blog_detail[0]->blog_title ?></h2>
                                <ul class="ccg-blog-detail-option">
<!--                                    <li><i class="fa fa-user"></i> Posted By: John Layfield </li>-->
<!--                                    <li><i class="fa fa-comments"></i> Comments: 29 </li>-->
                                </ul>
                            </div>
                            <div class="custom-style">
                              <?php echo $blog_detail[0]->blog_description; ?>
                            </div>
                            <div class="comments-area">
                              <!--// coments \\-->
                              <div class="ccg-section-heading"><h2>Comments</h2></div>


						<?php if (empty($blog_comments)){ ?>
                            <li>
                                <span style="float: left;width: 100%; text-align: center;">No Comment Available</span>
                            </li>
							<?php  if(! isset($this->session->userdata['userdata']['id'])){ ?>
								<p>Be the first to contribute.<a class="here" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><b id="show_modal">Please Login Here</b></a> </p>
								<?php } ?>
						<?php }else{ ?>

						<?php foreach ($blog_comments as $blog_comment) { ?>
                              <ul id="comment-delete-blog-<?php echo $blog_comment->commnent_id?>" data-id="<?php echo $blog_comment->commnent_id ; ?>" class="comment-list">
                                 <li>
                                    <div class="thumb-list">
                                       <figure>
										   <span style="background-image: url('<?php echo ($blog_comment->image != null) ? base_url().'uploads/userImages/'.$blog_comment->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>');">

										   </span>

										   <?php if(isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] ==0){ ?>
												   <a id="blog-reply" class="comment-reply-link" href="#">Reply</a>
										   <?php } ?>
                                       </figure>
                                       <div class="text-holder comment-edit-blog-<?php echo $blog_comment->commnent_id ?>">
                                          <h6><?php echo $blog_comment->first_name." ".$blog_comment->last_name ?></h6>

										   <?php if(isset($this->session->userdata['userdata']['id'])){ ?>
										   		<?php if ($this->session->userdata['userdata']['id'] == $blog_comment->id) {?>
												   <a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $blog_comment->commnent_id;?>" data-toggle="tooltip" title="">Delete</a>
												   <a class="comment-reply-link comment-edit comment-edit-<?php echo $blog_comment->commnent_id; ?>" href="javascript:void(0)" data-id="<?php echo $blog_comment->commnent_id;?>" data-message="<?php echo $blog_comment->comment;?>">Edit</a>
											    <?php } ?>
										  <?php } ?>
										   <time class="post-date" datetime=""><?php
										   $old_date_timestamp = strtotime($blog_comment->comment_date);
											   $new_date = date('M d, y', $old_date_timestamp);
											   echo $new_date ;
											   ?></time><br>
                                          <p id="approval-message-blog-<?php echo $blog_comment->commnent_id ?>"><?php echo $blog_comment->comment; ?></p>
                                       </div>
                                    </div>

                                    <ul class="children replys-parent">
										<div style="color: green" class="approve-message-blog-<?php echo $blog_comment->commnent_id ?>"></div>
										<?php $this->db->select('*, replys.id as reply_id')
											->from('replys')
											->join('subscribe s','replys.user_id = s.id')
											->where('comment_id' ,  $blog_comment->commnent_id)
											->where('reply_approved' , 1);
											$query = $this->db->get();
										    $replies = $query->result() ;
										?>
										<?php foreach ($replies as $reply) { ?>

                                       <li id="reply-remove-<?php echo $reply->reply_id;?>">
                                          <div class="thumb-list">
                                             <figure>
												 <span style="background-image: url('<?php echo ($reply->image != null) ? base_url().'uploads/userImages/'.$reply->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span>
											 </figure>
                                             <div class="text-holder upprove-<?php echo $reply->reply_id ?>">
                                                <h6><?php echo $reply->first_name." ".$reply->last_name ?></h6>
												 <?php if (isset($this->session->userdata['userdata']['id'])){ ?>
													 <?php if ($this->session->userdata['userdata']['id'] == $reply->user_id) {?>
														 <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply" data-id="<?php echo $reply->reply_id ?>" data-toggle="tooltip" title="" data-original-title="">Delete</a>
														 <a class="comment-reply-link comment-edit-reply-blog comment-edit-reply comment-edit-reply-<?php echo $reply->reply_id ?>" href="javascript:void(0)" data-id="<?php echo $reply->reply_id ?>" data-message="<?php echo $reply->comment_reply ?>">Edit</a>
													 <?php } ?>
												<?php } ?>

												 <time class="post-date" datetime=""><?php
													 $old_date_timestamp = strtotime($reply->create_at );
													 $new_date = date('M d, y', $old_date_timestamp);
													 echo $new_date ;
													 ?></time><br>
													<p id="approve-reply-blog-<?php echo $reply->reply_id; ?>"><?php echo $reply->comment_reply ?></p>
                                             </div>
                                          </div>

                                       </li>
										<?php } ?>
                                       <!-- #comment-## -->
                                    </ul>
                                    <!-- .children -->
                                 </li>
                                 <!-- #comment-## -->

                                 <!-- #comment-## -->
                              </ul>

								<?php } ?>
								<?php } ?>

								<?php if(! isset($this->session->userdata['userdata']['id'])){ ?>
								<?php if (! empty($blog_comments)){ ?>
								Please <a class="here" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">login</a> to leave a comment
								<?php }} ?>

								<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title">Login</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">

								      	<div class="alert alert-danger" id="errorMsg" style="display: none">
                                            <a href="#" id="cross" class="close" data-dismiss="">&times;</a>
                                            <strong id="err_msg">  </strong>
                                        </div>

                                        <div class="ccg-sign-form w-100">
                                            <?php if($this->session->flashdata('error1')!=""){  ?>
                                                <div class="alert alert-danger">
                                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                    <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                </div>
                                            <?php } ;?>

                                            <?php if($this->session->flashdata('error4')!=""){  ?>
                                                <div class="alert alert-danger">
                                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                    <strong></strong> <?php echo $this->session->flashdata('error4'); ?>

                                                </div>
                                            <?php } ;?>
                                            <?php if($this->session->flashdata('success1')!=""){  ?>

                                                <div class="alert alert-success alert-dismissible show">

                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <?php echo $this->session->flashdata('success1'); ?>
                                                </div>


                                            <?php } ?>

			                               <form action="<?php echo base_url();?>check-login" method="post" id="loginFormuser">
			                                    <ul>
			                                        <li>
			                                           <input class="form-control" name="email" type="text" placeholder="Email Address" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['email'];}?>" >

			                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('email', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['email'];}?></label>
			                                        </li>
			                                        <li>
			                                          <a href="javascript:void(0)" id="p_show" class="fa fa-eye"></a>
			                                          <a href="javascript:void(0)" id="p_show2" class="fa fa-eye-slash"></a>
			                                            <input class="form-control p_show" type="password" name="password" placeholder="Password">
			                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('password', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['password'];}?></label>
			                                            <a href="<?php echo base_url() ?>forgot-password">Forgot your password?</a>
			                                        </li>
			                                        <li>
			                                            <input class="submit" type="submit" value="Login">
			                                        </li>
			                                        <li><p>Not registered? <a href="<?php echo base_url();?>subscribe">Create an Account</a></p></li>
			                                    </ul>
			                                </form>
			                            </div>    

								      </div>
								    </div>
								  </div>
								</div>

                    <!--// coments \\-->
                              <!--// comment-respond \\-->
<!--								<div id="show-m"></div>-->
								<?php if(isset($this->session->userdata['userdata']['id']) 
								&& $this->session->userdata['userdata']['days'] > 0 && $this->session->userdata['userdata']['free_trial'] == 0 || 
								isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['status'] == 2){ ?>

								<?php
									 $this->db->select('email')
									->from('subscribe')
									->where('id',$this->session->userdata['userdata']['id']) ;

									 $query = $this->db->get();
									 $email = $query->result() ;


									//$this->session->userdata['userdata']['id'] ;
								?>

                              <div class="comment-respond">

                                 <div class="ccg-section-heading"><h2>Post A Comment</h2></div>
								  <div><span style="color: green;" id="show-m"></span></div>
                                 <form method="post" action="javascript:void(0)" id="blog-comment-post">
									 <input id="blog_id" name="blog_id" type="hidden" value="<?php echo $blog_detail[0]->blog_slug ?>">
									 <input type="hidden" name="auth-email" value="">
									 <input id="forum" name="forum" type="hidden" value="1">
									 <input id="email_blog" name="email_blog" type="hidden" value="<?php echo $email[0]->email; ?>">

                                    <p class="ccg-full-form">
                                       <textarea id="blog-comment" name="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                       <i class="fa fa-comment"></i>
                                    </p>
                                    <p class="form-submit"><input value="Post Now" type="submit"> <input name="comment_post_ID" value="99" id="comment_post_ID" type="hidden">
                                    </p>
                                 </form>
                              </div>
								<?php } ?>
                              <!--// comment-respond \\-->
                           </div>
                        </div>
						<div class="col-md-3">
							<div class="ccg-side-blog">
								<h2>Other Posts</h2>
								<ul>
									<?php foreach ($lastFiveBlog as $blogFive){ ?>
										<li>

											<?php if($blogFive->blog_image != ""){ ?>

											<figure style="background-image: url('<?php echo base_url(); ?>/uploads/blog/<?php echo $blogFive->blog_image ?>')"></figure>
										<?php }else{ ?>
											<figure style="background-image: url('<?php echo base_url(); ?>/uploads/userImages/2019_12_04_01_14_25.jpg')"></figure>
										<?php } ?>
											<section>
												<h2><a href="<?php echo base_url(); ?>home/blog-detail/<?php echo $blogFive->blog_slug; ?>"><?php echo $blogFive->blog_title; ?></a></h2>
												<span>Date: <time datetime="">
														<?php  $old_date_timestamp = strtotime($blogFive->created_at );
														$new_date = date('M d, y', $old_date_timestamp);
														echo $new_date ; ?>
													</time></span>
											</section>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Main Section \\-->

		</div>
		<!--// Main Content \\-->

<script>
	var base_urlInfor="https://coloradocampgrounds.us.com/";

	//comment for blog
		$('#comment_post').validate({

			rules:{

				// name:{
				// 	required:true,
				// },
				// email:{
				// 	required:true,
				// },
				comment:{
					required:true,
					maxlength: 500,
				},


			},
			messages:{

				name:{
					required:"Name is required",
				}
			}
		});
	//end comment for blog.



	$(document).on('click','#blog-reply',function(e){
		//$('.comment-replyss').click(function() {
		e.preventDefault();
		var id = $(this).closest('ul').attr('data-id');
		$(".inputhidden").val(id);
		// var id=$(this).attr('data-id');
		//var menu_id=$(this).attr('data-menuid');
		$('#reply-modal-blog').modal('show');

//	$('.inputhidden').val(id);
		//$('.menuid').val(menu_id);
	});

	//reply edit for blog
	$(document).on('click','.comment-edit-reply-blog',function(){
		//$('.comment-replyss').click(function() {
		var id=$(this).attr('data-id');
		var message=$(this).attr('data-message');
		// alert(id);
		$('#reply-modal-edit-reply').modal('show');
		$('.inputhidden').val(id);
		$('#commentss-edit-reply').val(message);


	});



	$('#coment_edit_replyss').validate({
		rules:{

			// name:{
			// 	required:true,
			// },
			// email:{
			// 	required:true,
			// },
			commenteditreply:{
				required:true,
				maxlength: 1100,
			},

		},
		messages:{

			commenteditreply:{
				required:"Reply is required",
			}
		}
	}) ;


	$('#coment_edit_replyss').submit(function(e) {
		//alert("ok");return;
		if($(this).valid()){
		e.preventDefault();
		// alert('amir ishaque');
		// $('#reply-modal-edit').modal('hide');
		// $('#myModal').modal('hide');
		// var name = $("#name").val();
		var reply_id = $(".inputhidden").val();
		// console.log(comment_id);
		var comment = $("#commentss-edit-reply").val();

		var email_blog = $('#email_blog').val() ;
		//alert(comment);

		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_url+'/user/UserController/ajaxRequestCOmmentReplyEdit',
			type: 'POST',
			data: {reply_id: reply_id, comment: comment,email_blog:email_blog},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				var html='';
				// $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
				// $('.thumb-list').last().remove();
				html=comment;
				// $('.thumb-list-repy-'+reply_id).html( html );
				// $('.comment-edit-reply-'+reply_id).attr('data-message',html);


				if(email_blog == "admin@colorado.com")
				{
					window.location.reload();
				}else{
						var text='Your edit reply is posted and is pending Admin approval.';
				$('#approve-reply-blog-'+reply_id).text(text) ;
				$('#approve-reply-blog-'+reply_id).addClass('approve-para-blog-color') ;
				$('.comment-edit-reply-'+reply_id).remove() ;
				
				}

				$('#reply-modal-edit-reply').modal('hide');
			
				//$(html).remove();
			}
		});
		}
	});
	// end reply edit for blog


	//reply delete for blog
		$(document).on('click','.delete_comment_reply', function(){
			var _this=$(this);
			var id=_this.attr('data-id');
			var head_title = "<strong>Are you sure?</strong>";
			var title = 'You want to delete this reply?';
			var url = base_urlInfor+'/admin/InformationalController/delete_comment_reply';
			delete_f(head_title, title, url, id);
		}) ;
	//end reply delete for blog


	// edit comment blog
	$(document).on('click','.comment-edit',function(){
		//$('.comment-replyss').click(function() {

		var id=$(this).attr('data-id') ;
		var message=$(this).attr('data-message');

		// alert(message);
		$('#comment-modal-edit-blog').modal('show');
		$('.inputhidden').val(id);
		$('#commentss-edit').val(message);


	});


	$('#coment_edit').validate({
		rules:{

			// name:{
			// 	required:true,
			// },
			// email:{
			// 	required:true,
			// },
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


	$('#coment_edit').submit(function(e) {
		//alert("ok");return;
		if($(this).valid()){
		e.preventDefault() ;
		// alert('amir ishaque');
		// $('#reply-modal-edit').modal('hide');
		// $('#myModal').modal('hide');
		// var name = $("#name").val();
		var comment_id = $(".inputhidden").val();
		// alert(comment_id);
		// console.log(comment_id);
		var comment = $("#commentss-edit").val();

		var email_blog = $('#email_blog').val() ;
		// alert(comment);

		var strDate = getISODateTime(new Date());
		$.ajax({
			url: base_url+'/user/UserController/ajaxRequestCOmmentEdit',
			type: 'POST',
			data: {comment_id: comment_id, comment: comment,email_blog:email_blog},
			error: function() {
				alert('Something is wrong');
			},
			success: function(id) {
				var html='';
				// $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
				// $('.thumb-list').last().remove();
				html=comment;
				//alert(html);
				// $('.thumb-list-'+comment_id).html( html ) ;
				// $('.comment-edit-'+comment_id).attr('data-message',html);
				//  $('#reply-modal-edit').modal('hide');
				//alert('123');


				if(email_blog == "admin@colorado.com")
				{
					window.location.reload();
				}else{
						var text='Your edit post is posted and is pending admin approval.';
					$('#approval-message-blog-'+comment_id).text(text) ;
					$('#approval-message-blog-'+comment_id).addClass('approve-para-blog-color') ;
					$('.comment-edit-'+comment_id).hide() ;

				}

				
				// $("#coment_reply")[0].reset();


				// setTimeout(function(){
				// 	$('#comment-delete-blog-'+comment_id).remove();
				// 	// $('.children-'+comment_id).html('');
				// }, 3000);

				$('#comment-modal-edit-blog').modal('hide');

			}
		});
		}
	});
	//end edit comment blog


	// comment for blog
	$('#blog-comment-post').validate({

		rules:{

			// name:{
			// 	required:true,
			// },
			// email:{
			// 	required:true,
			// },
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


	$('#blog-comment-post').submit(function() {

		if($(this).valid()){

			// alert('amir ishaque');
			//$('#reply-modal').modal('hide');
			// $('#myModal').modal('hide');
			// var url = window.location.pathname;
//var informationalpages_id = url.substring(url.lastIndexOf('/') + 1);

			// var name = $("#name").val();
			// var email = $("#email").val();

			var comment = $("#blog-comment").val();
			var forum_id = $('#blog_id').val() ;
			var forum = $('#forum').val() ;

			var email_blog = $('#email_blog').val() ;
			// var email = $('#blog-comment-email').val() ;
			// var name = $('#blog-comment-name').val() ;

			var menuid = $(".menuidpost").val();
			// var menu;
			// if(menuid !=''){
			// 	menu=menuid;
			// }else{
			// 	menu='NULL';
			// }
			// var name = $("#names").val();
			// var image = $("#image").val();
			// var img;
			// if(image !=''){
			// 	img=base_url+'uploads/userImages/'+image;
			// }else{
			// 	img=base_url+'assets/images/test.jpg';
			// }
			// var informationalpages_id = $("#pageid").val();
			// alert(pageid);
			//alert(informationalpages_id);
			// var strDate = getISODateTime(new Date());
			// //var strDate = 'dec 02, 2019' ;
			var html='';

			$.ajax({
				url: base_url+'/user/UserController/ajaxRequestBlogCommentPost',
				type: 'POST',
				data: {forum_id: forum_id, comment: comment,forum:forum,menuid:menuid,email_blog:email_blog},
				error: function() {
					alert('Something is wrong');
				},
				success: function(id) {

					// $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
					//html='<div class="thumb-list"><figure><img alt="" src="'+img+'"><a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="'+id+'">Reply</a></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit comment-edit-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-'+id+'">'+comment+'</p></div></div><ul class="children"><li class="reply-go-'+id+'"></li></ul>';

					//$('.new-comment-show').append( html );

					if(email_blog == "admin@colorado.com")
					{
						window.location.reload() ;
					}else{
						html='<p style=color:green;>The comment has been posted and is pending Admin approval.</p>';
						$('div #show-m').html(html) ;
						$("#blog-comment-post")[0].reset();
						// setTimeout(function(){  $('div #show-m').html( "" ); }, 3000);
						// $('.comentposted').append(id);
						// alert("Record added successfully");
					}


				}
			});
		}
	});

	// end comment for blog


	//reply for blog

	$('#coment_reply_blog').validate({
		rules:{

			// name:{
			// 	required:true,
			// },
			// email:{
			// 	required:true,
			// },
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

	$('#coment_reply_blog').submit(function(e) {

		if($(this).valid()){
			e.preventDefault();
			// alert('amir ishaque');
			$('#reply-modal-blog').modal('hide');
			// $('#myModal').modal('hide');
			// var name = $("#name").val();
			var comment_id = $(".inputhidden").val();
			var detect_forum_reply = $('#detect_forum-reply-blog').val() ;

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
			var email_blog = $('#email_blog').val() ;

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
				data: {comment_id: comment_id, comment_reply: comment_reply,menud:menud,detect_forum_reply:detect_forum_reply,email_blog:email_blog},
				error: function() {
					alert('Something is wrong');
				},
				success: function(id) {

					if(email_blog == "admin@colorado.com")
					{
						window.location.reload() ;
					}else{
						$('.approve-message-blog-'+comment_id).text("Your reply is posted and is pending Admin approval.");

						// setTimeout(function(){  $('.approve-message-blog-'+comment_id).text( "" ); }, 3000);
						$("#coment_reply_blog")[0].reset();
					}

					//  html='<div class="thumb-list"><figure><img alt="" src="http://localhost/colorado/assets/images/test.jpg"></figure> div class="text-holder"><h6>Admin</h6> <time class="post-date" datetime="">dec 02,19</time><br><p>'+comment_reply+'</p></div></div>';
					//  html='<div class="thumb-list"><figure><img alt="" src="'+img+'"></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment_reply+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>'
					// $('.reply-go-'+comment_id).append(html);

				//	html='<p style=color:green;>Your reply is posted and is pending admin approval.</p>';


				}
			});
		}
	});
	//end reply for blog

var p = '';

$(document).ready(function(){
	$(".ccg-sign-form").css('padding' , '0')
})

$(document).on('submit', '#loginFormuser', function (event) {
    $('#errorMsg').hide()
    // alert('ok')
    
    event.preventDefault(); //prevent default action 
    

    var form=$('#loginFormuser');



    var form_data = new FormData(form[0]); //Creates new FormData object
    // var formData=new FormData(form);
    var post_url = $(form).attr("action"); //get form action url
    var request_method = $(form).attr("method"); //get form GET/POST method

    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(data){ //
        // console.log(data)
        p=''
        p = JSON.parse(data)
        var isLogin = JSON.parse(data);
        // console.log("p.login :"+p.logIn)
        if(p.logIn){
        	// console.log('inside if')
        	location.reload()
        	$('#errorMsg').hide()
        }else{
        	// console.log('inside else')
        	$('#errorMsg').show()

            $('#err_msg').html(p.html)
        }


    });
});

	$("#cross").on('click' , function(){
		$('#errorMsg').hide()
	})

    $('#errorMsg').hide()
    $('#show_modal').on('click' , function (){
        $('#errorMsg').hide()
        $('#loginFormuser').trigger("reset");
    })

</script>

  </body>
</html>
