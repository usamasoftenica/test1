  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Update Disclaimer</li>
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
                                <h4 class="title">Update Disclaimer</h4>
                                <?php if($this->session->flashdata('success_desclimer')!=""){  ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong></strong>
                                        <?php echo $this->session->flashdata('success_desclimer'); ?>
                                    </div>
                                    <?php } ;?>
                                    <?php if($this->session->flashdata('error1')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                  </div>
                                            <?php } ;?>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/update_desclimer" enctype="multipart/form-data" method="post" id="add_new_blog">
                                        <ul>
                                            <li class="full">
                                                <!-- <label>Update Disclaimer</label> -->
                                                <div class="form-group">
													 <!-- <label for="comment">Disclaimer:</label> -->
													 <textarea name="main_description" class="form-control ckeditor" rows="5" id="main-description"><?php echo $description[0]->description ; ?></textarea>
												</div>
                                            </li>
                                            
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

        <!-- <script type="text/javascript">
         $('#add_new_blog').on('submit', function(){
              var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

         </script> -->
