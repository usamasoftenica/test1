  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Update About Us Content</li>
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
                                <h4 class="title">Update About Us Content</h4>
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
                                    <form action="<?php echo base_url(); ?>admin/update_about_us" enctype="multipart/form-data" method="post" id="add_new_blog">
                                       
                                           
                                                <label>Update About Us Content</label>
                                                
                                              <ul>
                                                   <li>
                                                     <div class="form-group">
                                                         <label for="comment">image:</label>
                                                         <input class="form-control" type="file" accept="image/png, image/jpeg, image/jpg" name="image">
                                                     </div>
                                                </li>

                                                <li class="full">
                                                    <div class="form-group">
                                                      <label for="comment">Content:</label>
                                                      <textarea name="about_us" class="form-control ckeditor" rows="5" id=""><?php echo $content[0]->content; ?></textarea>
                                                    </div>
                                                </li>

                                                
                                           
                                            
                                                <li><input class="btn btn-primary" type="submit" value="Submit"></li>

                                              </ul>  

                                              <ul class="banner-images">
                                                 <li>
                                                    <h2>About Us Image</h2>
                                                        <figure><img src="<?php echo base_url() ?>uploads/blog/<?php echo $content[0]->image ?>" alt=""></figure>
                                                 </li>
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

    <!--       <script type="text/javascript">
         $('#add_new_blog').on('submit', function(){
              var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

         </script>
 -->