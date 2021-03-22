<!--// Subheader \\-->
<div class="ccg-subheader">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li>Comments</li>
					<li><a href="<?php echo base_url();?>admin/approve-forums">Back to Pages List</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--// Subheader \\-->

<!--// Main Content \\-->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<div class="form-group">

<!--							<select class="form-control" name="subPage" id="subPage">-->
<!--								<option value="">All Sub Pages</option>-->
<!--								--><?php //foreach ($blogs as $key => $blog) {
//									# code...
//									?>
<!--									<option value="--><?php //echo base_url() ?><!--admin/comments-view-blog/--><?php //echo $blog->blog_slug ; ?><!--">--><?php //echo $blog->blog_title; ?><!--</option>-->
<!--								--><?php //} ?>
<!---->
<!--							</select>-->

						</div>
						<!--						<h4 class="title">View --><?php //echo $informationalpages->name; ?><!-- Comments</h4>-->
					</div>
					<div class="content">
						<div class="comments-area">
							<!--// coments \\-->
							<ul class="comment-list">
								<li class="new-comment-show new-comment-load-first"></li>
								<?php foreach ($blog_comments as $key => $comment) { ?>

									<li>
										<?php
										$select = "*,subscribe.id as IDS,replys.id as replyID,";
										$join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
										$where = array('comment_id' => $comment->comID,'reply_approved'=>1 );
										$ordeBy= array(
											'0'=>['replys.id','desc'],
										);
										$replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,$ordeBy);

										?>
										<div class="thumb-list  newCommentsshow">

											<figure>

												<span style="background-image: url('<?php echo ($comment->image != null) ? base_url().'uploads/userImages/'.$comment->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span>

												<a href="javascript:void(0)" class="comment-reply-link comment-replyss" data-id="<?php echo $comment->comID;?>" data-menuid="<?php echo $comment->menuitem_id;?>">Reply</a>
											</figure>
											<div class="text-holder">

												<?php
												$old_date_timestamp = strtotime($comment->comment_date);
												$new_date = date('M d, y', $old_date_timestamp);
												?>
												<h6>
													<?php
													if($comment->first_name!=''){
														echo $comment->first_name.' '.$comment->last_name;
													}else{
														echo "Camping Steve";
													}
													?>
												</h6>
												<a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $comment->comID;?>" data-toggle="tooltip" title="Delete">Delete</a>
												<a class="comment-reply-link comment-edit comment-edit-<?php echo $comment->comID; ?>" href="javascript:void(0)" data-id="<?php echo $comment->comID;?>" data-message="<?php echo $comment->comment;?>">Edit</a>
												<time class="post-date" datetime=""><?php echo $new_date ;?></time><br>
												<p class="thumb-list-<?php echo $comment->comID; ?>"><?php echo $comment->comment;?></p>

											</div>
											<ul class="children new-child-<?php echo $comment->comID; ?>">
												<?php foreach ($replys as $key => $reply) {?>
													<?php
														$old_date_timestamp = strtotime($reply->create_at);
														$new_date = date('M d, y', $old_date_timestamp);
													?>
													<li class="reply-go-<?php echo $comment->comID; ?>">
														<div class="thumb-list">
															<figure>
																<span style="background-image: url('<?php echo ($reply->image != null) ? base_url().'uploads/userImages/'.$reply->image :  base_url().'uploads/userImages/2019_12_05_06_41_17.png' ?>')"></span>
															</figure>
															<div class="text-holder">
																<h6><?php echo $comment->first_name." ".$comment->last_name ; ?></h6>
																<a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="<?php echo $reply->replyID;?>" data-toggle="tooltip" title="Delete">Delete</a>
																<a class="comment-reply-link comment-edit-reply comment-edit-reply-<?php echo $reply->replyID; ?>" href="javascript:void(0)" data-id="<?php echo $reply->replyID;?>" data-message="<?php echo $reply->comment_reply;?>">Edit</a>
																<time class="post-date" datetime=""><?php echo $new_date;?></time><br>
																<p class="thumb-list-repy-<?php echo $reply->replyID; ?>"><?php echo $reply->comment_reply;?></p>
															</div>
														</div>
													</li>
												<?php } ?>
												<!-- #comment-## -->
											</ul>
										</div>

										<!-- .children -->
									</li>
								<?php } ?>
							</ul>


							<!--// coments \\-->
							<!--// comment-respond \\-->
							<div class="comment-respond">
								<div class="comentposted" style="color: green;"></div>
								<div class="ccg-section-heading"><h2>Post A Comment</h2></div>
								<form action="javascript:void(0)" method="post" id="comment_post_blog_admin">
									<input type="hidden" name="menuid" class="menuidpost" value="">
									<input id="detect_forum" name="detect_forum" type="hidden" value="2">

									<p class="ccg-full-form">
										<textarea name="comment" id="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
										<!-- <i class="fa fa-comment"></i> -->
									</p>
									<p class="form-submit">
										<input value="Post Now" type="submit">
									</p>
								</form>
							</div>


							<!--// comment-respond \\-->
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="reply-modal-edit" class="modal fade" role="dialog">
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
<div id="reply-modal-edit-reply" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit A Reply</h4>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="coment_edit_replyss">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">


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
<div id="reply-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Post A Reply</h4>
			</div>
			<div class="modal-body">
				<div class="comment-respond">

					<form method="post" id="coment_reply">
						<input type="hidden" name="inputhidden" class="inputhidden" value="">


						<p class="ccg-full-form">
							<textarea name="comment" id="commentss" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
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

<div id="add-menu-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Side Menu Item</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(); ?>admin/new-menu-item" method="post" id="add_menu_item">
					<ul>
						<li>
							<label>Name</label>
							<input class="form-control" name="name" type="text" placeholder="">
						</li>
						<input type="hidden" name="info_page_id" value="" class="inputhidden">

						<li class="full add-sub-menu"><label>Description</label><div class="html-editor"></div></li>
						<input type="hidden" name="descriptionmenu" id="descriptionmenup">
						<li class="full"><input type="submit" value="Submit"></li>
					</ul>
				</form>
				<div class="clearfix"></div>
			</div>
			<!--  <div class="modal-footer">
			   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 </div> -->
		</div>

	</div>
</div>


<div id="edit-menu-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Side Menu Item</h4>
			</div>
			<div class="modal-body">
				<div class="">

					<form action="<?php echo base_url(); ?>admin/update-menu-item" method="post" id="edit_menu_item">
						<ul>
							<li>

								<input type="hidden" name="id" value="" class="inputhidden">
								<label>Name</label>
								<input class="form-control" value="" id="edit-name" name="name" type="text" placeholder="">
							</li>

							<li class="full edit-sub-menu"><label>Description</label><div id="html-editor-edit" class="html-editor html-editor-edit"></div></li>
							<input type="hidden" name="descriptionedit" id="descriptionedit">
							<li class="full"><input type="submit" value="Update"></li>
						</ul>
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

<script type="text/javascript">
	console.log($("textarea[name='commentedit']").val());

	$('#edit_information_page').on('submit', function(){
		var data = $('.note-editable').html();
		// alert(data);
		$('#description').val(data);
	});
	$('#add_menu_item').on('submit', function(){
		var data = $('.add-sub-menu .note-editable').html();
		// alert(data);
		$('#descriptionmenup').val(data);
	});

	$('#edit_menu_item').on('submit', function(){
		var data = $('.edit-sub-menu .note-editable').html();
		// alert(data);
		$('#descriptionedit').val(data);
	});
	$('#subPage').change(function(){
		var link= $(this).val();
		if(link!=''){
			window.location.replace(link);
		}
	});

</script>

<!--// Main Content \\-->
