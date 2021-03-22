 <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add Information Page</li>
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
                                <h4 class="title">Add Information Page</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/new-informational-page" method="post" id="add_information_page" enctype="multipart/form-data">
                                        <ul>
                                            <li>
                                                <label>Name</label>
                                                <input class="form-control" name="name" type="text" placeholder="" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('name', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['name'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name'];}?></label>
                                            </li>
                                               <li>
                                                <label>Select text font color</label>
                                                <input class="form-control" name="nameColor" type="color" placeholder="#ffffff">
                                            </li>
                                               <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" name="color" type="color" placeholder="#ffffff">
                                            </li>
                                            <li>
                                                <label>Select banner image (optional) <small>(max-width 1920 X 400)</small></label>
                                                <input class="form-control" name="banner" type="file">
                                            </li>
                                            <li>
                                                <label>SEO:Banner Alt (optional)</label>
                                                <input type="text" class="form-control" name="alt" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('alt', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['alt'];}?>">
                                            </li>
                                            <li>
                                                <label>SEO:Slug</label>
                                             
                                                 <input class="form-control" name="slug" type="text" placeholder="" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('slug', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['slug'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('slug', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['slug'];}?></label>
                                            </li>
                                            <li>
                                                <label>Title</label>
                                                <input class="form-control" name="title" type="text" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['title'];}?>">
                                            </li>
                                            <li>
                                                <label>SEO:Keywords for Meta tag</label>
                                                <input class="form-control" name="keyword" type="text" placeholder="" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('keyword', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['keyword'];}?>" >
                                            </li>
                                           <!--  <li>
                                                <label>Enter Map Link (optional)</label>
                                               
                                                <input class="form-control" name="map_link" type="text" placeholder="" value="<?php //if ($this->session->//flashdata('data')!="" && array_key_exists('map_link', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['map_link'];}?>" >
                                            </li> -->
                                            <li class="full">
                                                <label>SEO:Description for Meta tag</label>
                                                
                                                <textarea class="form-control" name="descriptin_meta_tag" type="text" placeholder=""><?php if ($this->session->flashdata('data')!="" && array_key_exists('descriptin_meta_tag', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['descriptin_meta_tag'];}?></textarea>
                                            </li>
                                            <li class="full"><label>Description (optional)</label><textarea class="ckeditor" name="description" id="description"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description'];}?></textarea></li>
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
        
		<!--// Main Content \\-->
