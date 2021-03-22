  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Update Terms Of Service</li>
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
                                <h4 class="title">Update Terms Of Service</h4>
                                <?php if($this->session->flashdata('success_about_us')!=""){  ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong></strong>
                                        <?php echo $this->session->flashdata('success_about_us'); ?>
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
                                    <form action="<?php echo base_url(); ?>admin/update_term_of_service" enctype="multipart/form-data" method="post" id="add_new_blog">
                                       
                                           
                                                <!-- <label>Update Terms Of Service</label> -->
                                                
                                              <ul>
                                            
                                                <li class="full">
                                                    <div class="form-group">
                                                      <!-- <label for="comment">Terms Of Service:</label> -->
                                                      <textarea name="term_of_service" id="description" class="ckeditor"><?php echo  $content[0]->term_content; ?></textarea>
                                                    </div>
                                                </li>

                                                
                                                <li><input class="btn btn-primary" type="submit" value="Submit"></li>

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
           $('#add_new_blog').on('submit', function(){
              var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

         </script>
