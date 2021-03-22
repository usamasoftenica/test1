
        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                             <li><a href="<?php echo base_url(); ?>admin/informational-pages">Parent Campground List</a></li>
                            <li>Edit Parent Campground</li>
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
                                <h4 class="title">Edit Parent Campground</h4>
                            </div>
                              <!-- <?php echo validation_errors(); ?> -->
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
                                                      <a href="<?php echo base_url() ?>admin/parent-campground-list" class="btn btn-primary view-list-btn">View list</a>
                                                  </div>
                                            <?php } ;?>

            <div class="content">
                <div class="payment-list">
            <form action="<?php echo base_url(); ?>admin/update-parent-campground" method="post" id="add_paresnt_comp" enctype="multipart/form-data">
                                        <ul>

                                   <input type="hidden" name="id" value="<?php echo $parentcampground->p_id; ?>">
                                      
                                            <li>
                                                <label>Select Region</label>
                                                <select name="region" id="region" class="form-control">
                                                    <option value="">Select Region</option>
                                                      <?php 
                                                      foreach ($regions as $region) {?>
                                                      <option value="<?php echo $region->id; ?>"
                                                         <?php if ($region->id == $parentcampground->regionId) {
                                                          echo "selected";  
                                                          } ?>
                                                        ><?php echo $region->name; ?></option>
                                                      <?php } ?>
                                                    </select>
                                            </li>
                                            <li>
                                                <label>Type in Name of Parent Campground</label>
                                                <input class="form-control" value="<?php echo $parentcampground->name; ?>" name="name" id="name" type="text" placeholder="Parent Campground">
                                            </li>
                                           <!-- <li>
                                                    <label>Slug</label>
                                                <input class="form-control" name="slug" value="<?php echo $parentcampground->slug; ?>" type="text" placeholder="Enter slug">
                                            </li> -->
                                             <li>
                                                <label>ADD CAMPGROUND MAP LINK <small>(optional)</small></label>
                                                <textarea name="com_map" class="form-control"> <?php echo $parentcampground->campSiteMap; ?></textarea> 
                                            </li>
                                             <li>
                                                <label>ADD YOUTUBE LINK <small>(optional)</small></label>
                                                <input class="form-control" name="youtube_link" value="<?php echo $parentcampground->youtube_link; ?>" type="text" placeholder="ENTER YOUTUBE LINK">
                                            </li>
                                            <li class="full"><label>Description <small> (<strong>Tip:</strong> You can add tables to format description in tabular form.)</small></label><textarea name="description" class="ckeditor" id="description"><?php echo $parentcampground->description; ?></textarea></li>
                                            
 
                                           <!--    <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">Banner Information</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <label>Select banner image</label>
                                                <input class="form-control" name="bannerE" id="banner" type="file">
                                            </li>
                                               <li>
                                                <label>ADD BANNER ALT TEXT</label>
                                                <input class="form-control"  value="<?php echo $parentcampground->alt; ?>" name="banner_alt" type="text" placeholder="ENTER ALT TEXT">
                                            </li>
                                             <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" value="<?php echo $parentcampground->color; ?>" name="color" id="color" type="color" placeholder="#ffffff">
                                            </li> -->
                                            
                                                <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">SEO Information</h4>
                                                </div>
                                            </li>
                                              <li>
                                                <label>PAGE TITLE</label>
                                                <input class="form-control"  value="<?php echo $parentcampground->titile; ?>" name="title" type="text" value="">
                                            </li>
                                            <li>
                                                <label>KEYWORDS FOR META TAG(COMMA SEPERATED)</label>
                                                <input class="form-control"  value="<?php echo $parentcampground->keyword; ?>" type="text" name="keyword" placeholder="">
                                            </li>
                                            <li class="full">
                                                <label>META DESCRIPTION</label>
                                                <textarea class="form-control" name="meta_description" placeholder=""><?php echo $parentcampground->meta_description; ?></textarea>
                                            </li>
                                           
                                            
                                            <li class="full">
                                             
                                              <input type="submit" name="publish" value="Activate">
                                             

                                                 <input formnovalidate="formnovalidate" type="submit" name="save" id="saveAsDraft" value="Save as Draft">
                                                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info btn-fill pull-right color-red back">Back</a> 
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
        <script type="text/javascript">
      $('#add_paresnt_comp').on('submit', function(){
             // var data = $('.cke_wysiwyg_frame').html();
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();

             // alert(data);
            $('#description').val(data);       
        });
 
        </script>

