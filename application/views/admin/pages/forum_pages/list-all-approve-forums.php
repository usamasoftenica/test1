
<div class="modal fade" id="forum-update" tabindex="-1" role="dialog" aria-labelledby="forumModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="forumModalLabel">Update Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="forum-updatd" action="javascript:void(0)" class="forum-form">
					<ul>
						<li>
							<label>Add Question</label>
							<input id="question-sentence" name="forum_question" type="text" placeholder="Update Question Here" class="form-control">
						</li>
						<li>
							<label>Add Description</label>
							<textarea id="question-description" name="question_description" placeholder="Update description here" class="form-control"></textarea>
						</li>
						<li><input type="submit" class="submit btn btn-primary" value="Update"></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end test-->

<!--// Subheader \\-->
<div class="ccg-subheader">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
					<li>Approved Topics</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--// Subheader \\-->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="float: left;">Edit Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" id="coment_edit_approved">
				<div class="modal-body">

					<div class="form-group">
						<!-- <label></label> -->
						<input type="hidden" name="inputhidden" class="inputhidden" value="">
						<textarea placeholder="" name="commentedit" id="commentss-edit" style="height: 200px;" class="form-control"></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>

				</div>
			</form>
		</div>
	</div>

</div>
<div class="modal fade" id="editModalReply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="float: left;">Edit Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" id="coment_edit_approved_reply">
				<div class="modal-body">

					<div class="form-group">
						<!-- <label></label> -->
						<input type="hidden" name="inputhidden" class="inputhidden" value="">
						<textarea placeholder="" name="commenteditreply" id="commentss-edit-reply" style="height: 200px;" class="form-control"></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>

				</div>
			</form>
		</div>
	</div>

</div>

<!--// Main Content \\-->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Search</h4>
					</div>
					<div class="content">
						<div class="search-form">
							<form method="post" action="<?php echo base_url();?>/admin/view-all-comments">
								<ul>
									<li>
										<div class="form-group">
											<input type="text" readonly name="from" style="cursor: pointer;" id="from" class="form-control dp3" placeholder="From">
										</div>
									</li>
									<li>
										<div class="form-group">
											<input type="text" readonly name="to" id="to" style="cursor: pointer;" class="form-control dp4" placeholder="To">
										</div>
									</li>
									<li>
										<div class="form-group">
											<input type="text" name="question" id="question" class="form-control" placeholder="Question">
										</div>
									</li>
									<li>
										<div class="form-group">
											<input type="text" name="description_search" id="description_search" class="form-control" placeholder="Description">
										</div>
									</li>


									<li><input type="button" class="btn-primary btn commentsSubmit" value="Search"></li>
								</ul>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">View Approved Topics</h4>
					</div>
					<div class="content">
						<div class="payment-list informational">

							<table id="all-aprove-forum-table">
								<thead>
								<tr>
									<th>ID</th>
									<th>Date</th>
									<th class="custom-width">Question</th>
									<th class="custom-width">Description</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody >

								</tbody>

							</table>


						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

