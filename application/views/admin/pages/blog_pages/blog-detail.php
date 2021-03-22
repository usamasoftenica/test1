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
						<input id="detect_forum-reply-blog" name="detect_forum-reply" type="hidden" value="1">


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


<!--edit comment model for admin-->

<div id="comment-modal-edit-blog" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit A Comment</h4>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="coment_edit">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">

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


<div id="reply-modal-edit-blog" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit A Reply</h4>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="reply_edit" action="<?php echo base_url() ?>admin/updateReplyBlog">
						<input type="hidden" name="inputhidden" class="replyHidden" value="">

						<p class="ccg-full-form">
							<textarea name="replytedit" id="reply-edit" placeholder="Type Your Reply Here" class="commenttextarea message"></textarea>
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
<!--end edit comment model for admin-->

<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="http://www.coloradocampgrounds.development-env.com/admin/dashboard">Home</a></li>
                     <li><a href="http://www.coloradocampgrounds.development-env.com/admin/list-blogs">Blog List</a></li>

                    <li>Blog details</li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Blog Details</h4>
                    </div>

                    <div class="content">
                        <div class="payment-list column">
                        </div>
                       
                        <?php if(!empty($blog_detail[0]->blog_image)){ ?>
                        <figure class="ccg-blog-thumb"><img style="width: 50%" src="<?php echo base_url(); ?>uploads/blog/<?php echo $blog_detail[0]->blog_image ?>" alt="no image"></figure>
                    <?php } ?>
                        <div class="ccg-blog-heading">
                            <h2><?php echo $blog_detail[0]->blog_title ?></h2>
                        </div>
                        <div class="ccg-rich-editor">
                           <?php echo $blog_detail[0]->blog_description ; ?>
                        </div>
                        <div class="payment-list subscriber">
                            <table>
                                <tr>
                                    <th>Slug</th>
                                    <td><?php echo $blog_detail[0]->blog_slug ?></td>
                                </tr>
                                <tr>
                                    <th>Keywords for Meta tag</th>
                                    <td><?php echo $blog_detail[0]->blog_keywords ?></td>
                                </tr>
                                <tr>
                                    <th>Description for Meta tag</th>
                                    <td><?php echo $blog_detail[0]->blog_descrip_tag ?></td>
                                </tr>
                            </table>
                        </div>
						<div class="ccg-section-heading"><h2>Comments</h2></div>

						<?php foreach ($blog_comments as $blog_comment) {  ?>
							<ul id="comment-delete-blog-<?php echo $blog_comment->commnent_id?>" data-id="<?php echo $blog_comment->commnent_id ; ?>" class="comment-list">
								<li>
									<div class="thumb-list">
										<?php $this->session->userdata['admindata']['adminId'] ?>
										<figure>
											<span style="background-image: url('<?php echo ($blog_comment->image != null) ? base_url().'uploads/userImages/'.$blog_comment->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>');">

										   </span>

												<a id="blog-reply" class="comment-reply-link" href="#">Reply</a>
										</figure>
										<div class="text-holder comment-edit-blog-<?php echo $blog_comment->commnent_id ?>">
											<h6><?php echo $blog_comment->first_name?> <?php echo $blog_comment->last_name?></h6>

													<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $blog_comment->commnent_id;?>" data-toggle="tooltip" title="Delete">Delete</a>
													<a class="comment-reply-link comment-edit comment-edit-<?php echo $blog_comment->commnent_id; ?>" href="javascript:void(0)" data-id="<?php echo $blog_comment->commnent_id;?>" data-message="<?php echo $blog_comment->comment;?>">Edit</a>

											<time class="post-date" datetime=""><?php
												$old_date_timestamp = strtotime($blog_comment->created_at);
												$new_date = date('M d, y h:i', strtotime($blog_comment->createD));
												echo $new_date ;
												?></time><br>
											<p><?php echo $blog_comment->comment; ?></p>
										</div>
									</div>

									<ul class="children">

										<?php $this->db->select('*, replys.id as reply_id')
											->from('replys')
											->join('subscribe s','replys.user_id = s.id')
											->where('comment_id' ,  $blog_comment->commnent_id)
											->where('reply_approved' , 1) 
											->order_by('reply_id','asc');
										$query = $this->db->get();
										$replies = $query->result() ;

										?>
										<?php foreach ($replies as $reply) { ?>
											<div id="aprove"></div>
											<li id="reply-remove-<?php echo $reply->reply_id;?>">
												<div class="thumb-list">
													<figure>
														<span style="background-image: url('<?php echo ($reply->image != null) ? base_url().'uploads/userImages/'.$reply->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span>
													</figure>
													<div class="text-holder upprove-<?php echo $reply->reply_id ?>">
														<h6><?php echo $reply->first_name ?> <?php echo $reply->last_name?></h6>
																<a href="javascript:void(0)" class="comment-reply-link delete_comment_reply" data-id="<?php echo $reply->reply_id ?>" data-toggle="tooltip" title="" data-original-title="Delete">Delete</a>
																<a class="comment-reply-link comment-edit-reply-blog comment-edit-reply comment-edit-reply-<?php echo $reply->reply_id ?>" href="javascript:void(0)" data-id="<?php echo $reply->reply_id ?>" data-message="<?php echo $reply->comment_reply ?>">Edit</a>
														<time class="post-date" datetime=""><?php
															$old_date_timestamp = strtotime($reply->create_at );
															$new_date = date('M d, y h:i', $old_date_timestamp);
															echo $new_date ;
															?></time><br>
														<p><?php echo $reply->comment_reply ?></p>
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
var base_url='https://coloradocampgrounds.us.com/'
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



		//reply for admin
		$('#coment_reply_blog').validate({
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


				$('#reply_edit').validate({
			rules:{
				replytedit:{
					required:true,
				},


			},
			messages:{

				replytedit:{
					required:"Reply is required",
				}
			}
		});

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
		$('#coment_reply_blog').submit(function(e) {
			if($(this).valid()){
				e.preventDefault();
				// alert('amir ishaque');
				$('#reply-modal-blog').modal('hide');
				// $('#myModal').modal('hide');
				// var name = $("#name").val();
				var comment_id = $(".inputhidden").val();
				var detect_forum_reply = $('#detect_forum-reply-blog').val() ;

				// alert(detect_forum_reply) ;

				var menuid = $(".menuid").val();
			
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
				// var strDate = getISODateTime(new Date());

				// alert(strDate);
				//var strDate = 'dec 02, 2019' ;
				$.ajax({
					url: base_url+'/user/UserController/ajaxRequestReplyAdmin',
					type: 'POST',
					data: {comment_id: comment_id, comment_reply: comment_reply,menud:menud,detect_forum_reply:detect_forum_reply},
					error: function() {
						alert('Something is wrong');
					},
					success: function(id) {
							var strDate = dateForamteCus();
					html='<div id="aprove"></div><li id="reply-remove-'+id+'"><div class="thumb-list"><figure><span style="background-image: url('+base_url+'uploads/userImages/logos.png)"></span></figure><div class="text-holder upprove-'+id+'"><h6>CAMPING STEVE</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply" data-id="'+id+'" data-toggle="tooltip" title="" data-original-title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply-blog comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id="'+id+'" data-message="'+comment_id+'">Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p>'+comment_reply+'</p></div></div></li>'	;
					
					$('#comment-delete-blog-'+comment_id).find('ul').prepend(html);
						//  html='<div class="thumb-list"><figure><img alt="" src="'+base_url+'assets/images/test.jpg"></figure> div class="text-holder"><h6>Admin</h6> <time class="post-date" datetime="">dec 02,19</time><br><p>'+comment_reply+'</p></div></div>';
						//  html='<div class="thumb-list"><figure><img alt="" src="'+img+'"></figure><div class="text-holder"><h6>'+name+'</h6><a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="'+id+'" data-toggle="tooltip" title="Delete">Delete</a><a class="comment-reply-link comment-edit-reply comment-edit-reply-'+id+'" href="javascript:void(0)" data-id='+id+' data-message='+comment_reply+'>Edit</a><time class="post-date" datetime="">'+strDate+'</time><br><p class="thumb-list-repy-'+id+'">'+comment_reply+'</p></div></div>'
						// $('.reply-go-'+comment_id).append(html);

						// html='<p style=color:green;>Your reply is posted and is pending admin approval.</p>';
						// $('.reply-go-'+comment_id).html(html);
						// $("#coment_reply")[0].reset();


						// setTimeout(function(){  $('.reply-go-'+comment_id).html( '' ); }, 3000);


					}
				});
			}
		});
		// end reply for admin



		// edit comment of blog for admin
			$(document).on('click','.comment-edit',function(){
				//$('.comment-replyss').click(function() {

				var id=$(this).attr('data-id') ;
				var message=$(this).attr('data-message');

				// alert(message);
				$('#comment-modal-edit-blog').modal('show');
				$('.inputhidden').val(id);
				$('#commentss-edit').val(message);


			});

				$(document).on('click','.comment-edit-reply-blog',function(){
				//$('.comment-replyss').click(function() {

				var id=$(this).attr('data-id') ;
				var message=$(this).attr('data-message');

				// alert(message);
				$('#reply-modal-edit-blog').modal('show');
				$('.replyHidden').val(id);
				$('#reply-edit').val(message);


			});




		$('#coment_edit').submit(function(e) {
			//alert("ok");return;
			e.preventDefault();
			if($(this).valid()){
			
			// alert('amir ishaque');
			// $('#reply-modal-edit').modal('hide');
			// $('#myModal').modal('hide');
			// var name = $("#name").val();
			var comment_id = $(".inputhidden").val();
			// alert(comment_id);
			// console.log(comment_id);
			var comment = $("#commentss-edit").val();
			// alert(comment);

			var strDate = getISODateTime(new Date());
			$.ajax({
				url: base_url+'/user/UserController/ajaxRequestCOmmentEditAdmin',
				type: 'POST',
				data: {comment_id: comment_id, comment: comment},
				error: function() {
					alert('Something is wrong');
				},
				success: function(id) {
					var html='';
					window.location.reload();
					// $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
					// $('.thumb-list').last().remove();
					html=comment;
					//alert(html);
					// $('.thumb-list-'+comment_id).html( html );
					// $('.comment-edit-'+comment_id).attr('data-message',html);
					//  $('#reply-modal-edit').modal('hide');
					//alert('123');


					// html='<p style="color:green; background:white;">Your edit post is posted and is pending admin approval.</p>';
					// $('#comment-delete-blog-'+comment_id).html(html);
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


		// end edit comment of blog for admin





</script>
