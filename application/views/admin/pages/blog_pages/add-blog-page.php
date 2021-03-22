  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add New Blog</li>
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
                                <h4 class="title">Add New Blog</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/new-blog-page" enctype="multipart/form-data" method="post" id="add_new_blog">
                                        <ul>
                                            <li>
                                                <label>Blog Name</label>
                                                <input class="form-control" type="text" name="blog_title" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('blog_title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['blog_title'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('blog_title', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['blog_title'];}?></label>
                                            </li>
                                            <li>
                                                <label>featured image</label>
                                                <input class="form-control" type="file" accept="image/png, image/jpeg, image/jpg" name="blog_image">
                                            </li>

                                            <!-- <input type="hidden" name="description" id="description"> -->
                                            <li>
                                                <label>SEO:Slug</label>
                                                <input class="form-control" type="text" name="blog_slug" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('blog_slug', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['blog_slug'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('blog_slug', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['blog_slug'];}?></label>
                                            </li>
                                            <li>
                                                <label>SEO:Keywords for Meta tag</label>
                                                <input class="form-control" type="text" name="blog_keywords" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('blog_keywords', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['blog_keywords'];}?>" >
                                            </li>
											<li>
												<label>Page Title</label>
												<input class="form-control" type="text" name="page_title" value="<?php if ($this->session->flashdata('page_title')!="" && array_key_exists('page_title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['page_title'];}?>" >
											</li>
                                            <li class="full">
                                                <label>SEO:Description for Meta tag</label>
                                                <textarea class="form-control" name="blog_descrip_tag" placeholder=""><?php if ($this->session->flashdata('data')!="" && array_key_exists('blog_descrip_tag', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['blog_descrip_tag'];}?></textarea>
                                            </li>
											<li class="full">
												<label>Blog Description</label>
                                                <textarea name="description" id="description" class="ckeditor"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description'];}?></textarea>
												<!-- <div class="html-editor"></div> -->
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

        <script type="text/javascript">
         $('#add_new_blog').on('submit', function(){
              var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

         </script>
