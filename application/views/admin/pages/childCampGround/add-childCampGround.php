

        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add Child Campground</li>
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
                                <h4 class="title">Add Child Campground</h4>
                            </div>
                              <?php if($this->session->flashdata('error1')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                  </div>
                                            <?php } ;?>
                                            <?php if($this->session->flashdata('success1')!=""){  ?>
                                           <div class="alert alert-success">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong><?php echo $this->session->flashdata('success1'); ?></strong> 
                                                      <a href="<?php echo base_url() ?>admin/child-campground-list" class="btn btn-primary view-list-btn">View list</a>
                                                  </div>
                                            <?php } ;?>
                             <!-- <?php echo validation_errors(); ?> -->
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/new-child-campground" method="post" id="add_child_comp" enctype="multipart/form-data">
                                        <ul>
                                           <!--  <li>
                                                <label>Select Region</label>
                                                <select name="region" id="region">
                                                    <option value="">Select Region</option>
                                                    <?php foreach ($regions as $region) { ?>
                                                       <option value="<?php echo $region->id; ?>"><?php echo $region->name; ?></option>
                                                  <?php } ?>                                                  
                                              </select>
                                            </li> -->
                                            <li>
                                                <label>Select Parent Campground</label>
                                                <select name="parent" id="parent" class=" form-control">
                                                    <option value="">Select Parent Campground</option>
                                                    <?php foreach ($regions as $region) { ?>
                                                       <option value="<?php echo $region->p_id; ?>"><?php echo $region->name; ?></option>
                                                  <?php } ?>  
                                                                                                        
                                              </select>
                                              <label id="parent-error" class="error" for="parent"><?php if ($this->session->flashdata('error2')!="" && !empty($this->session->flashdata('error2')) ){echo $this->session->flashdata('error2');}?></label>
                                              
                          
                                            </li>
                                            <li>
                                                <label>TYPE IN NAME OF Child Campground</label>
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Type here">
                                            </li>
                                             <li>
                                                <label>Slug</label>
                                                <input type="text" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('slug', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['slug'];}?>" class="form-control" name="slug">
                                            </li>
                                              <li>
                                                <label>Add Child Campground Map <small>(optional)</small></label>
                                                <textarea class="form-control" name="com_map" id="com_map" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('com_map', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['com_map'];}?>" placeholder="Add Map link"></textarea>
                                            </li>
                                               <li>
                                                <label>Add Child Campground video Link <small>(optional)</small></label>
                                                <input class="form-control" name="com_vedio" id="com_vedio" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('com_vedio', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['com_vedio'];}?>" type="text" placeholder="Add Map link">
                                            </li>
                                             <li class="full"><label>Description <small> (<strong>Tip:</strong> You can add tables to format description in tabular form.)</small></label><div id="editor"></div></li>
                                              <textarea name="description" style="display: none;" id="description"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description'];}?></textarea>
                                         <!--    <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">Banner Information <small> (If banner information is not added for a Child Campground, it will inherit from its Parent Campground)</small></h4>
                                                </div>
                                            </li> -->
                                           <!--  <li>
                                                <label>Select banner image</label>
                                                <input class="form-control" name="banner" id="Banner" type="file">
                                            </li>
                                           <li>
                                                <label>Add banner alt</label>
                                                <input class="form-control" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('banner_alt', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['banner_alt'];}?>" name="banner_alt" type="text" placeholder="Enter alt">
                                            </li> 
                                            <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control"  name="color" id="color" type="color" placeholder="#ffffff">
                                            </li> -->
                                                <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">SEO Information</h4>
                                                </div>
                                            </li>
                                              <li>
                                                <label>Title</label>
                                                <input class="form-control" name="title" type="text" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['title'];}?>">
                                            </li>
                                            <li>
                                                <label>Keywords for Meta tag(COMMA SEPERATED)</label>
                                                <input class="form-control" type="text" name="keyword" 
                                               value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('keyword', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['keyword'];}?>"
                                                placeholder="">
                                            </li>
                                            <li class="full">
                                                <label>Meta Description</label><textarea class="form-control" name="meta_description" placeholder=""><?php if ($this->session->flashdata('data')!="" && array_key_exists('meta_description', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['meta_description'];}?></textarea>
                                            </li>
                                          
                                       <!--      <li class="width-50 radio-check">
                                                <span>Options</span>
                                                <label><input type="checkbox" name="favorite" value="Favorite"> Favorite</label>
                                                <label><input type="radio" name="reviewed" value="1"> Reviewed</label>
                                                <label><input type="radio" checked name="reviewed" value="0"> Not Reviewed</label>
                                            </li> -->
                                          <!--   <li class="width-50">
                                                <label for="">Add video link for child campground</label>
                                                <input type="text" name="video_link" class="form-control" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('video_link', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['video_link'];}?>"  placeholder="">
                                            </li> -->

                                            
                                            

                                           
                                            <li class="full"><input type="submit" name="publish" value="Activate"> <input formnovalidate="formnovalidate" type="submit" name="save" value="Save as Draft"></li>
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
      $('#add_child_comp').on('submit', function(){
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

        </script>
