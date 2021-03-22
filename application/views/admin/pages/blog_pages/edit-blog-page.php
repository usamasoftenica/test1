<!--// Subheader \\-->
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/list-blogs">Blog List</a></li>
                    <li>Edit Blog details</li>
                    

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
                        <h4 class="title">Edit Blog details</h4>
                    </div>
                    <div class="content">
                        <div class="payment-list">
                            <form action="<?php echo base_url(); ?>admin/blog_update" enctype="multipart/form-data" method="post" id="update_new_blog">
                                <input type="hidden" name="blog_id" value="<?php echo $blog[0]->blog_id ?>">
                                <ul>
                                    <li>
                                        <label>Blog Title</label>
                                        <input class="form-control" type="text" name="blog_title" value="<?php echo $blog[0]->blog_title ?>" >

                                        <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('blog_title', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['blog_title'];}?></label>
                                    </li>
									<li>
										<label>featured image</label>
										<input type="file" name="blog_image">
									</li>
                                    
                                   <!--  <input type="hidden" name="description" id="description"> -->
                                    <li>
                                        <label>SEO:Slug</label>
                                        <input class="form-control" type="text" name="blog_slug" value="<?php echo $blog[0]->blog_slug ?>" >

                                        <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('blog_slug', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['blog_slug'];}?></label>
                                    </li>
                                    <li>
                                        <label>SEO:Keywords for Meta tag</label>
                                        <input class="form-control" type="text" name="blog_keywords" value="<?php echo $blog[0]->blog_slug ?>" >
                                    </li>
                                    <li>
                                    <label>Page Title</label>
                                    <input class="form-control" type="text" name="page_title" value="<?php echo $blog[0]->page_title ?>" >
                                    </li>
                                    <li class="full">
                                        <label>SEO:Description for Meta tag</label>
                                        <textarea class="form-control" name="blog_descrip_tag" placeholder=""><?php echo $blog[0]->blog_descrip_tag?></textarea>
                                    </li>
                                    <li class="full">
                                        <label>Blog Description</label>
										<input type="hidden" name="blogDescription" id="blogDescription" value="">
                                        <textarea name="blogDescription" id="description" class="ckeditor"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description'];}else{ echo $blog[0]->blog_description;} ?></textarea>
                                      <div></div>
                                       <!--  <div class="html-editor"></div> -->
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="full"><input  type="button"  id="updateFormBlog" value="Submit"></li>
                                </ul>
                            </form>
                                
                    
                      <div class="content">
                       <!--  <div class="site-image"> -->
                         
                  
                            <div class="banner-images">
                                        <ul>
                                           <?php if(!empty($blog[0]->blog_image)) { ?>

                                              <li class="del-fig-<?php echo $blog[0]->blog_id ?>">
                                                 <h4 class="title">Feature Image</h4>
                                                  <figure><img src="<?php echo base_url() ?>uploads/blog/<?php echo $blog[0]->blog_image; ?>" alt=""></figure>
                                              </li>
                                            <?php  } else { echo "N/A"; }?>
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
