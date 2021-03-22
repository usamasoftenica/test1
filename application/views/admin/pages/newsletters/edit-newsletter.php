<!--// Subheader \\-->
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/newsletters-list">Newsletter List</a></li>
                    <li>Edit Newletter details</li>
                    

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
                        <h4 class="title">Edit Newletter details</h4>
                    </div>
                    <div class="content">
                        <div class="payment-list">
                            <form action="<?php echo base_url(); ?>admin/newsletter_update" enctype="multipart/form-data" method="post" id="update_newslatter">
                                <input type="hidden" name="image" value="<?php echo $newsletter[0]->image ?>">
                                <input type="hidden" name="file" value="<?php echo $newsletter[0]->pdf_file?>">
                                <input type="hidden" name="id" value="<?php echo $newsletter[0]->id ?>">
                                <ul>
                                    <li>
                                        <label>Newsletter Title</label>
                                        <input class="form-control" type="text" name="title" value="<?php echo $newsletter[0]->title ?>" >

                                        <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('title', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['title'];}?></label>
                                    </li>
									<li>
										<label>newsletter image</label>
										<input type="file" name="image" class="form-control" >
									</li>
                                    <li>
                                        <label>pdf file</label>
                                        <input type="file" name="file" class="form-control">
                                    </li>
                                    
                                    
                                   <!--  <input type="hidden" name="description" id="description"> -->
                
       
                                    <li class="full">
                                        <label>Description</label>
										<input type="hidden" name="blogDescription" id="blogDescription" value="">
                                        <textarea name="description1" rows="3" class="form-control"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description'];}else{ echo $newsletter[0]->description;} ?></textarea>
                                      <div>
                                          
                                      </div>
                                       <!--  <div class="html-editor"></div> -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="full"><input  type="submit"  id="updateFormBlog" value="Submit"></li>
                                </ul>
                            </form>
                                
                    
                      <div class="content">
                       <!--  <div class="site-image"> -->
                         
                  
                            <div class="banner-images">
                                        <ul>
                                           <?php if(!empty($newsletter[0]->image)) { ?>

                                              <li class="del-fig-<?php echo $newsletter[0]->image ?>">
                                                 <h4 class="title">Feature Image</h4>
                                                  <figure><img src="<?php echo base_url() ?>uploads/newsletter/<?php echo $newsletter[0]->image; ?>" alt=""></figure>
                                              </li>
                                            <?php  } else { echo "N/A"; }?>
                                            <?php if(!empty($newsletter[0]->pdf_file)) { ?>
                                              <li>
                                                <label>pdf file</label>
                                                <a href="<?php echo base_url().'uploads/newsletter/'.$newsletter[0]->pdf_file;?>">
                                                <i class='fa fa-file-pdf-o' style='font-size:165px;color:red'></i>
                                                </a>
                                            </li>
                                        <?php } else { echo "N/A"; }?>
                                        </ul>
                            </div>
                        
                        <!-- </div> -->
                        <div class="clearfix"></div>
                      </div>
                   
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
    // $('#add_new_blog').on('submit', function(){
    //     var data = $('.note-editable').html();
    //     $('#description').val(data);
    // });

	$('#updateFormBlog').click(function () {
// 	var html=$('.cke_description').html();
// $('#blogDescription').val(html);
		$('#update_new_blog').submit()
	});
</script>
