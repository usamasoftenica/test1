
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li>Library</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--// Subheader \\-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Library</h4>
                        <?php if($this->session->flashdata('success1')!=""){  ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong></strong>
                                <?php echo $this->session->flashdata('success1'); ?>
                            </div>
                        <?php } ;?>
                    </div>
                    <div class="content">
                        <div class="header">
                            <h4 class="title">Library Items List </h4>
                        </div>
                        <br>
                         <a style="margin: 15px;" class="btn btn-info btn-fill pull-left color-red add-library" href="javascript:void(0)">Add New item</a>
                        <div class="banner-images">
                            <div class="payment-list">
                                <table id="libraryTable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody >
                                        <?php foreach ($libraries as $key => $library) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $library->name; ?></td>
                                            <td><a href="<?php echo base_url().'uploads/library/'.$library->link; ?>" target="blank" ><?php echo base_url().'uploads/library/'.$library->link; ?></a></td>
                                            <td>
                                                <!-- <a href="javascript:void(0)" class="btn btn-info btn-fill color-red EditLibrary" data-id="<?php echo $library->l_id;?>" data-name="<?php echo $library->name;?>" data-link="<?php echo $library->link;?>" data-toggle="tooltip" title="Edit">Edit</a> -->
                                                <a href="javascript:void(0)" class="btn btn-info btn-fill color-red deleteLibrary" data-id="<?php echo $library->l_id;?>" data-toggle="tooltip" title="Delete">Delete</a></td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <!-- model -->
                        <div class="modal fade" id="addlibrary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add File</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="add_library_form1" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/insert">
                                            <ul>
                                                <li class="width-50">
                                                    <label>File Name</label>
                                                    <input type="text" name="library_name" class="form-control">
                                                </li>

                                                <li class="width-50">
                                                    <label>Choose File</label>
                                                    <input name="library_file" type="file" class="form-control">
                                                </li>
                                                <li class=""><input type="submit" value="Save" style="margin: 10px 0px 0px" class="btn btn-info btn-fill color-red"></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit-library-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Update Library</h4>
                                    </div>
                                    <div class="modal-body">
                                           <form method="post" id="add_library_form1" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/updateLibrary">
                                            <ul>
                                                <li class="width-50">
                                                    <label>Library Name</label>
                                                    <input type="text" id="e_library_name" name="library_name" class="form-control">
                                                </li>
                                                <input type="hidden" name="libraryId" id="libraryId">
                                                <li class="width-50">
                                                    <label>Library File</label>
                                                    <input name="library_file" type="file" class="form-control">
                                                </li>
                                                <li class="width-50">
                                                    <label>Old Link</label>
                                                    <span id="old_link"></span>
                                                </li>
                                                <li class=""><input type="submit" value="Save" style="margin: 10px 0px 0px" class="btn btn-info btn-fill color-red"></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Main Content \\-->


<!-- <script type="text/javascript">
       $(document).on('click','.EditLibrary', function(){
    // alert('123');
    $('#edit-banner-image').toggle();
});

</script> -->