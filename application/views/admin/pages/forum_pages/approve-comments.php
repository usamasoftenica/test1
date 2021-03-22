<!--// Subheader \\-->
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li id="view-replies">View Comments</li>
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
            <form method="post" id="coment_edit_approved_fourm">
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
                <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Edit Reply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" method="post" id="coment_edit_approved_reply_fourm">
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
                                            <!-- <select name="" id="" class="form-control"> -->
                                            <select class="form-control" name="commentss" id="checkComments">
                                                <!-- <option value="">Select Option</option> -->
                                                <option value="comment">Comments</option>
                                                <option value="reply">Replies</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <input type="text" name="commentname" id="commentname" class="form-control" placeholder="Words/Phrases">
                                        </div>
                                    </li>
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
                                            <input type="text" name="user" id="user" class="form-control" placeholder="User">
                                        </div>
                                    </li>
                                    <li><input type="button" class="btn-primary btn commentsSubmitFOrum" value="Search"></li>
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
                        <h4 class="title">View Comments / Replies</h4>
                    </div>
                    <div class="content">
                        <div id="com-forum" class="payment-list informational">

                            <table id="forum-all-comments-table1">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th id="reply-c" class="custom-width2">Comment</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody >

                                </tbody>

                            </table>


                        </div>

                        <div style="display: none;" id="rep-forum" class="payment-list informational">

                            <table style="width: 100%;" id="forum-all-reply-table1">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>

                                    <th id="reply-c" class="custom-width2">Reply</th>
                                    <th id="reply-c" class="custom-width2">Comment</th>

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

