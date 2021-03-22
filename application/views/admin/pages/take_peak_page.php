

        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add Take A Peak</li>
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
                                <h4 class="title">Add Take A Peak</h4>
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
                                                      <!-- <a href="<?php echo base_url() ?>admin/parent-campground-list" class="btn btn-primary view-list-btn">View list</a> -->
                                                  </div>
                                            <?php } ;?>

            <div class="content">
                <div class="payment-list">
            <form action="<?php echo base_url(); ?>admin/take-peak-save" method="post" id="add_paresnt_comp" enctype="multipart/form-data">
                                        <ul>
                                            
                                            <li>
                                                <label>Page Name</label>
                                                <input class="form-control"  value="<?php echo $peak[0]['name'] ?>" name="name" id="name" type="text" placeholder="Parent Campground">
                                            </li>
                                             <li>
                                                <label>Slug</label>
                                                <input class="form-control" name="slug" value="<?php echo $peak[0]['slug'] ?>">
                                            </li>
                                             <!-- <li>
                                              <div class="form-group">
                                            <label for="comment">ADD CAMPGROUND MAP LINK <small>(optional)</small></label>
                                            <textarea placeholder="Enter Campground Map Link" name="com_map" class="form-control" rows="5"><?php echo $peak[0]['campSiteMap'] ?></textarea>
                                          </div>

                                            </li> -->
                                            <li>
                                                <label>ADD YOUTUBE LINK <small>(optional)</small></label>
                                                <input class="form-control" name="youtube_link" value="<?php echo $peak[0]['youtube_link'] ?>" type="text" placeholder="ENTER YOUTUBE LINK">
                                            </li>
                                             <li class="full"><label>Description <small> (<strong>Tip:</strong> You can add tables to format description in tabular form.)</small></label><textarea name="description" class="ckeditor" id="description"><?php echo $peak[0]['description'] ?></textarea></li>

                                          <!--   <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">Banner Information</h4>
                                                </div>
                                            </li> -->
                                          <!--   <li>
                                                <label>Select banner image</label>
                                                <input class="form-control" name="banner" id="banner" type="file">
                                            </li> -->
                                           <!--  <li>
                                                <label>ADD BANNER ALT TEXT</label>
                                                <input class="form-control" name="banner_alt"  value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('banner_alt', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['banner_alt'];}?>" type="text" placeholder="ENTER ALT TEXT">
                                            </li>
                                            <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" name="color"  id="color" type="color" placeholder="#ffffff">
                                            </li> -->
                                              <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">SEO Information</h4>
                                                </div>
                                            </li>
                                              <li>
                                                <label>PAGE TITLE</label>
                                                <input class="form-control" value="<?php echo $peak[0]['titile'] ?>" name="title" type="text" value="">
                                            </li>
                                            <li>
                                                <label>KEYWORDS FOR META TAG(COMMA SEPERATED)</label>
                                                <input class="form-control" value="<?php echo $peak[0]['keyword'] ?>" type="text" name="keyword" placeholder="">
                                            </li>
                                            <li class="full">
                                                <label>META DESCRIPTION</label>
                                                <textarea class="form-control" name="meta_description" value="" placeholder=""><?php echo $peak[0]['meta_description'] ?></textarea>
                                            </li>
                                           
                                            <!-- child campground sa pick kr ka laya hu data yaha ma -->
                                            <!--  -->
                                            <!--  -->
                                            <!-- -->
                                            <!--  -->
                                            <!--  -->
                                       <!--      <li class="width-50">
                                                <label>Location</label>
                                                  <input type="text" name="location" class="form-control" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('location', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['location'];}?>" placeholder="">
                                            </li>

                                            <li>
                                                <label>Compground Amenities</label><textarea name="compgroundamenities" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('compgroundamenities', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['compgroundamenities'];}?></textarea>
                                                 
                                            </li>

                                            <li>
                                                <label>Activity</label> <textarea name="activity" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('activity', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['activity'];}?></textarea>
                                          
                                            </li>

                                             <li>
                                                <label>Reservation</label><textarea name="reservation" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('reservation', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['reservation'];}?></textarea>
                                            
                                            </li>

                                             <li>
                                                <label>Fee</label><textarea name="fee" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('fee', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['fee'];}?></textarea>
                                                
                                            </li>

                                             <li>
                                                <label>Check-In</label>
                                                  <input type="text" name="check_In" class="form-control" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('check_In', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['check_In'];}?>"  placeholder="">
                                            </li>

                                             <li>
                                                <label>Check-Out</label>
                                                  <input type="text" name="check_Out" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('check_Out', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['check_Out'];}?>" class="form-control"  placeholder="">
                                            </li>


                                              <li>
                                                <label>Terrain</label><textarea name="terrain" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('terrain', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['terrain'];}?></textarea>
                                              
                                            </li>

                                            <li>
                                                <label>Average Temps</label><textarea name="averagetemps" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('averagetemps', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['averagetemps'];}?></textarea>
                                               
                                            </li>

                                              <li>
                                                <label>Altitude</label><textarea name="altitude" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('altitude', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['altitude'];}?></textarea>
                                               
                                            </li>

                                            <li>
                                                <label>Wildlife</label><textarea name="wildlife" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('wildlife', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['wildlife'];}?></textarea>
                                                
                                            </li>

                                            <li>
                                                <label>Local Amenities</label><textarea name="Localamenities" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('Localamenities', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['Localamenities'];}?></textarea>
                                                 
                                            </li>

                                            <li>
                                                <label>Regulation</label><textarea name="regulation" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('regulation', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['regulation'];}?></textarea>
                                               
                                            </li>

                                             <li>
                                                <label>Park Amenties</label><textarea name="parkamenies" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('parkamenies', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['parkamenies'];}?></textarea>
                                                
                                            </li>

                                             <li>
                                                <label>Park Activities</label><textarea name="parkactivities" class="form-control"  placeholder="" style="height: 40px;"><?php if ($this->session->flashdata('data')!="" && array_key_exists('parkactivities', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['parkactivities'];}?></textarea>
                                              
                                            </li>  -->

                                            <!-- child campground sa pick kia hwa ha data -->
                                            <!--  -->
                                            <!--  -->
                                            <!-- -->
                                            <!--  -->
                                            <!--  -->
                                           
                                        
                                            <li class="full"><input type="submit" name="publish" value="Update"> 
                                              <!-- <input  formnovalidate="formnovalidate" type="submit" name="save" id="saveAsDraft" value="Save as Draft"></li> -->
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

<!-- <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
      uiColor: '#CCEAEE',
    });
  </script> -->