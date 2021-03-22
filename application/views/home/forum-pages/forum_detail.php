<!--forum reply model-->
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

					<form method="post" id="coment_reply_forum">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">
						<input type="hidden" name="menuid" class="menuid" value="">
						<input id="detect_forum-reply-blog" name="detect_forum-reply" type="hidden" value="2">
						<?php $first=$this->session->userdata['userdata']['first_name'];
						$last=$this->session->userdata['userdata']['last_name'];
						$name=$first.' '.$last;
						$image=$this->session->userdata['userdata']['image'];
						?>
						<input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
						<input type="hidden" name="image" id="image" value="<?php echo $image; ?>">


							<?php if(isset($this->session->userdata['userdata']['id'])){ ?>

								<?php
								$this->db->select('email')
									->from('subscribe')
									->where('id',$this->session->userdata['userdata']['id']) ;

								$query = $this->db->get();
								$email = $query->result() ;
}

						//$this->session->userdata['userdata']['id'] ;
						?>
						<input id="email_blog" name="email_blog" type="hidden" value="<?php echo $email[0]->email; ?>">
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
<!--end forum reply mdoel-->


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
						<input type="hidden" name="inputhidden" class="inputhidden" value="">

								<?php if(isset($this->session->userdata['userdata']['id'])){ ?>

										<?php
										$this->db->select('email')
											->from('subscribe')
											->where('id',$this->session->userdata['userdata']['id']) ;

										$query = $this->db->get();
										$email = $query->result() ;

}
							//$this->session->userdata['userdata']['id'] ;
							?>
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


<!--edit forum reply model-->
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

							<?php if(isset($this->session->userdata['userdata']['id'])){ ?>

									<?php
									$this->db->select('email')
										->from('subscribe')
										->where('id',$this->session->userdata['userdata']['id']) ;

									$query = $this->db->get();
									$email = $query->result() ;

}
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
<!--end edit forum reply model-->

	<!--// Subheader \\-->
	<div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>assets/images/sub-header-img.jpg');">
		<span class="ccg-subheader-transparent" style="background-color: tan;"></span>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Topic Discussion Thread</h1>
					<ul class="ccg-breadcrumb">
						<li><a href="<?php echo base_url();?> ">Home Page</a></li>
						<li>Topic Detail</li>
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
						<div class="forum-text questions">
							<figure style="background-image: url('<?php echo ($forum_detail[0]->image != null) ? base_url().'uploads/userImages/'.$forum_detail[0]->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>');"></figure>
							<section>
								<h2><?php echo $forum_detail[0]->first_name." ". $forum_detail[0]->last_name ?></h2>
								<time class="post-date" datetime=""><?php
									$old_date_timestamp = strtotime($forum_detail[0]->dateCreatedAt );
									$new_date = date('M d, y', $old_date_timestamp);
									echo $new_date ;
									?></time><br>
									<div class="forum-q">
										<h3><?php echo $forum_detail[0]->question ?></h3>
										<p><?php echo $forum_detail[0]->description ?></p>
									</div>
							</section>
						</div>
					</div>
					<div class="col-md-12">
						<div class="comments-area">
							<!--// coments \\-->
							<div class="ccg-section-heading"><h2>Discussion Thread</h2></div>

							<?php if (empty($forum_comments)){ ?>
								<li>
									<span style="float: left;width: 100%; text-align: center;">No Comment Available</span>
								</li>
								<?php  if(! isset($this->session->userdata['userdata']['id'])){ ?>
									<p>Be the first to contribute. Please Login <a class="here" href="<?php echo base_url(); ?>login">Here</a> </p>
								<?php } ?>
							<?php }else{ ?>

							<?php foreach ($forum_comments as $comment){ ?>
							<ul data-id="<?php echo $comment->comment_id ?>" class="comment-list comment-edit-blog-<?php echo $comment->comment_id ?>">
								<li>
									<div class="thumb-list">
										<figure><span style="background-image: url('<?php echo ($comment->image != null) ? base_url().'uploads/userImages/'.$comment->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span>
											<?php if (isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] ==0){ ?>
													<a id="blog-reply" class="comment-reply-link" href="#">Reply</a>
											<?php } ?>
										</figure>
										<div class="text-holder">
											<h6><?php echo $comment->first_name." ".$comment->last_name ?></h6>
<!--											<a class="comment-reply-link" href="#"><i class="fa fa-check"></i> 20 Likes</a>-->
											<?php if (isset($this->session->userdata['userdata']['id'])){ ?>
												<?php if($this->session->userdata['userdata']['id'] == $comment->id){ ?>
													<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $comment->comment_id;?>" >Delete</a>
													<a class="comment-reply-link comment-edit comment-edit-<?php echo $comment->comment_id; ?>" href="javascript:void(0)" data-id="<?php echo $comment->comment_id;?>" data-message="<?php echo $comment->comment ;?>">Edit</a>
												<?php } ?>
											<?php } ?>

											<time class="post-date" datetime=""><?php
												$old_date_timestamp = strtotime($comment->commentCreatedat );
												$new_date = date('M d, y', $old_date_timestamp);
												echo $new_date ;
												?> </time><br>
											<p id="approval-message-forum-<?php echo $comment->comment_id; ?>"><?php echo $comment->comment ?></p>
										</div>
									</div>
									<ul class="children">
										<div style="color: green" class="approve-message-forum-<?php echo $comment->comment_id ;?>"></div>
										<?php $this->db->select('*, replys.id as reply_id')
											->from('replys')
											->join('subscribe s','replys.user_id = s.id')
											->where('comment_id' ,  $comment->comment_id)
											->where('reply_approved' , 1);
										$query = $this->db->get();
										$replies = $query->result() ;
										?>

										<?php foreach ($replies as $reply) { ?>
										<li id="reply-remove-<?php echo $reply->reply_id;?>">
											<div class="thumb-list">
												<figure><span style="background-image: url('<?php echo ($reply->image != null) ? base_url().'uploads/userImages/'.$reply->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span></figure>
												<div class="text-holder upprove-<?php echo $reply->reply_id ?>">
													<h6><?php echo $reply->first_name." ".$reply->last_name ?> </h6>
													<?php if (isset($this->session->userdata['userdata']['id'])){ ?>
														<?php if($this->session->userdata['userdata']['id'] == $reply->user_id){ ?>
															<a href="javascript:void(0)" class="comment-reply-link delete_comment_reply" data-id="<?php echo $reply->reply_id ?>" data-original-title="">Delete</a>
															<a class="comment-reply-link comment-edit-reply-blog comment-edit-reply comment-edit-reply-<?php echo $reply->reply_id ?>" href="javascript:void(0)" data-id="<?php echo $reply->reply_id ?>" data-message="<?php echo $reply->comment_reply ?>">Edit</a>
														<?php } ?>
													<?php } ?>
													<time class="post-date" datetime=""><?php
														$old_date_timestamp = strtotime($reply->create_at);
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

<!--									<div class="thumb-list">-->
<!--										<figure><img alt="" src="images/comment-img3.jpg">-->
<!--											<a class="comment-reply-link" href="#">Reply</a>-->
<!--										</figure>-->
<!--										<div class="text-holder">-->
<!--											<h6>Emma Stone</h6>-->
<!--											<a class="comment-reply-link" href="#"><i class="fa fa-check"></i> 20 Likes</a>-->
<!--											<time class="post-date" datetime="">Jun 11, 2019</time>-->
<!--											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>-->
<!--										</div>-->
<!--									</div>-->
									<!-- .children -->
								</li>
							</ul>
							<?php } ?>
							<?php } ?>

							<?php if(! isset($this->session->userdata['userdata']['id'])){ ?>
								<?php if (! empty($forum_comments)){ ?>
									Please <a class="here" href="<?php echo base_url(); ?>login">login</a> to leave a comment
								<?php }} ?>
							<!--// coments \\-->
							<!--// comment-respond \\-->

							<?php if(isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] == 0){ ?>
							<div class="comment-respond">
								<div class="ccg-section-heading"><h2>Post A Comment</h2></div>
								<div><span style="color: green;" id="show-m"></span></div>
								<form method="post" action="javascript:void(0)" id="forum-comment-post">
									<input id="forum_id" name="blog_id" type="hidden" value="<?php echo $forum_detail[0]->forum_id ?>">
									<input id="forum" name="forum" type="hidden" value="2">
									<p class="ccg-full-form">
										<textarea id="forum-comment" name="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
										<i class="fa fa-comment"></i>
									</p>
									<p class="form-submit"><input value="Post Now" type="submit"> <input name="comment_post_ID" value="99" id="comment_post_ID" type="hidden">
									</p>
								</form>
							</div>
							<!--// comment-respond \\-->
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->

	</div>
	<!--// Main Content \\-->



		<script>

			var base_urlInfor="http://www.coloradocampgrounds.development-env.com/";
			//comment for blog
			$('#forum-comment-post').validate({

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

			//end comment for blog

			$('#forum-comment-post').submit(function() {

				if($(this).valid()){

					// alert('amir ishaque');
					//$('#reply-modal').modal('hide');
					// $('#myModal').modal('hide');
					// var url = window.location.pathname;
//var informationalpages_id = url.substring(url.lastIndexOf('/') + 1);

					// var name = $("#name").val();
					// var email = $("#email").val();

					var comment = $("#forum-comment").val();
					var forum_id = $('#forum_id').val() ;
					var forum = $('#forum').val() ;

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
						data: {forum_id: forum_id, comment: comment,forum:forum,menuid:menuid},
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
								$('div #show-m').html(html);
								$("#forum-comment-post")[0].reset();
							}

							// //$("#blog-comment")[0].reset();
							// setTimeout(function(){  $('div #show-m').html( "" ); }, 3000);
							// $('.comentposted').append(id);
							// alert("Record added successfully");
						}
					});
				}
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


			// edit comment forum
			$(document).on('click','.comment-edit',function(){
				//$('.comment-replyss').click(function() {

				var id=$(this).attr('data-id');
				var message=$(this).attr('data-message');
				// alert(message);
				$('#comment-modal-edit-blog').modal('show');
				$('.inputhidden').val(id);
				$('#commentss-edit').val(message);


			});


			$('#coment_edit').submit(function(e) {
				//alert("ok");return;
				if($(this).valid()){
				e.preventDefault();
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
						// $('.thumb-list-'+comment_id).html( html );
						// $('.comment-edit-'+comment_id).attr('data-message',html);
						//  $('#reply-modal-edit').modal('hide');
						//alert('123');

						if(email_blog == "admin@colorado.com")
							{
								window.location.reload() ;
							}else{
									text='Your edit post is posted and is pending admin approval.';
									$('#approval-message-forum-'+comment_id).text(text) ;
									$('#approval-message-forum-'+comment_id).addClass('approve-para-blog-color') ;
									$('.comment-edit-'+comment_id).remove() ;
							}


					

						// html='<p style="color:green; background:white;">Your edit post is posted and is pending admin approval.</p>';
						// $('.comment-edit-blog-'+comment_id).html(html);
						// // $("#coment_reply")[0].reset();
						//
						//
						// setTimeout(function(){
						// 	$('.comment-edit-blog-'+comment_id).remove();
						// 	// $('.children-'+comment_id).html('');
						// }, 3000);
						$('#comment-modal-edit-blog').modal('hide');

					}
				});
				}
			});
			//end edit comment forum

			//reply for forum

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


			//reply for blog

			$('#coment_reply_forum').validate({
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

			$('#coment_reply_forum').submit(function(e) {
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
							alert('Something is wrong') ;
						},
						success: function(id) {

							//  html='<div class="thumb-list"><figure><img alt="" src="http://localhost/colorado/assets/images/test.jpg"></figure> div class="text-holder"><h6>Admin</h6> <time class="post-date" datetime="">dec 02,19</time><br><p>'+comment_reply+'</p></div></div>';
							//  html='<div class="thumb-list"><figure><img alt="" src="'+img+'"></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment_reply+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>'
							// $('.reply-go-'+comment_id).append(html);

							if(email_blog == "admin@colorado.com")
							{
								window.location.reload() ;
							}else{
								$('.approve-message-forum-'+comment_id).text("Your reply is posted and is pending Admin approval.");
								// setTimeout(function(){  $('.approve-message-forum-'+comment_id).text( "" ); }, 3000);
								$("#coment_reply_forum")[0].reset();

							}


							//html='<p style=color:green;>Your reply is posted and is pending admin approval.</p>';
							

						}
					});
				}
			});
			//end reply for blog


			//reply delete for forum
			$(document).on('click','.delete_comment_reply', function(){

				var _this=$(this);
				var id=_this.attr('data-id');
				var head_title = "<strong>Are you sure?</strong>";
				var title = 'You want to delete this reply?';
				var url = base_urlInfor+'/admin/InformationalController/delete_comment_reply';
				delete_f(head_title, title, url, id);
			}) ;
			//end reply delete for forum


			//reply edit for forum
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
			});


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
								window.location.reload() ;
							}else{
								var text='Your edit reply is posted and is pending Admin approval.';
								$('#approve-reply-blog-'+reply_id).text(text);
								$('#approve-reply-blog-'+reply_id).addClass('approve-para-blog-color') ;
								$('.comment-edit-reply-'+reply_id).remove() ;
							}


						

						$('#reply-modal-edit-reply').modal('hide');
						//$(html).remove();
					}
				});
				}
			});
			// end reply edit for forum


		</script>
