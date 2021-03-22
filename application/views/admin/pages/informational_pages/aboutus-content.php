 <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Add About Us Content</li>
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
                                <h4 class="title">Add About Us Content</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/update-aboutus-content" method="post" id="add_abount_us" enctype="multipart/form-data">
                                        <ul>
                                            <input type="hidden" value="<?php echo $aboutus->id;?>" name="id">
                                            <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control"  name="color" type="color" placeholder="#ffffff">
                                            </li>

                                            <li>
                                                <label>Select banner image</label>
                                                <input class="form-control" name="banner" type="file">
                                                 <input type="hidden" name="old_banner" value="<?php echo $aboutus->banner; ?>">
                                            </li>
                                            <li>
                                                <label>Select Content Image</label>
                                                <input type="file" name="content_img" class="form-control">
                                                  <input type="hidden" name="old_connent_img" value="<?php echo $aboutus->content_img; ?>">
                                            </li>
                                            <li class="full">
                                                <label>Add Content</label>
                                                <div class="html-editor"><?php echo $aboutus->content;?></div>
                                            </li>
                                                <input type="hidden" id="description" name="description">
                                            <li class="full"><input type="submit" value="Submit"></li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

          <script type="text/javascript">

              $('#add_abount_us').on('submit', function(){
                     var data = $('.note-editable').html();
                    $('#description').val(data);               
                });
      
            </script>
		<!--// Main Content \\-->
