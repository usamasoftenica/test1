<!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add Site Description</li>
                        </ul>
                    </div>
                         <!-- <?php echo validation_errors(); ?> -->
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="<?php echo base_url(); ?>admin/new-site-description" method="post" id="add_site_description" enctype="multipart/form-data">
<!--                        <div class="col-md-12">-->
<!--                            <div class="content">-->
<!--                                <div class="payment-list column">-->
<!--                                    <ul>-->
<!--                                        <li class="full" ><input style="float: right"  class="Draft" formnovalidate="formnovalidate" type="button" name="save" value="Save as Draft"> <input style="float: right;margin-right: 5px;" type="submit" name="publish" value="Activate"></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Add Site Description</h4>
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
                                                      <a href="<?php echo base_url() ?>admin/site-description-list" class="btn btn-primary view-list-btn">View list</a>
                                                  </div>
                                            <?php } ;?>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                   
                                            <li>
                                                <label>Select Parent Campground</label>
                                                <select name="parentcom" class="select2_single" id="parentcom" onchange='saveValue(this);'>
                                                    <option value="">Select Parent Campground</option>
                                                      <?php foreach ($parentCampground as $parentCampgrounds) { ?>
                                                       <option value="<?php echo $parentCampgrounds->p_id; ?>"><?php echo $parentCampgrounds->name; ?></option>
                                                  <?php } ?>
                                                </select>
                                                <label id="parentcom-error" class="error" for="parentcom"></label>
                                            </li>

                                            <li>
                                                <label value="">Select Child Campground</label>
                                                <select class="form-control" name="childcom"  id="childcom" onchange='saveValue(this)';>
                                                    <option value="0">Select Child Campground</option>
                                                </select>
                                            </li>

                                            <li>
                                                <label value="">Add Campground Map (optional)</label>
                                                <div class="form-group">
                                                  <input type="text" name="google_map" class="form-control" rows="3" ><?php if ($this->session->flashdata('data')!="" && array_key_exists('google_map', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['google_map'];}?>
                                                </div>
                                            </li>
                                            <!-- <li>
                                                <label for="">Site Number</label>
                                                <input type="text"  name="name"  value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('name', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['name'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name'];}?></label>
                                            </li> -->
                                             <!-- <li>
                                                <label for="">Slug</label>
                                                <input type="text"  name="slug"  value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('slug', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['slug'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('slug', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['slug'];}?></label>
                                            </li> -->
                                            
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">First Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Site No</label>
                                                <input type="text" name="siteno" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('siteno', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['siteno'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error_no')!=""){echo $this->session->flashdata('error_no');}?></label>
                                            </li>
                                            <li>
                                                <label for="">Spacing</label>
                                                <select class="form-control" name="spacing" id="spacing">
                                                    <option style="display: none;" value=""></option>
                                                     <?php foreach ($spacings as $spacing) { ?>
                                                       <option  <?php if ($this->session->flashdata('data')!="" && array_key_exists('spacing', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['spacing'] == $spacing->sp_id){echo "selected";}  } ?> value="<?php echo $spacing->sp_id; ?>"><?php echo $spacing->sp_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('spacing', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['spacing'];}?></label>
                                            </li>
                                            <li>
                                                <label for="">Type of View</label>
                                                 <select name="view[]" id="view" class="select" multiple="multiple">
                                                    
                                                     <?php foreach ($views as $view) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('view', $this->session->flashdata('data'))){
                                                            if(in_array($view->view_id, $this->session->flashdata('data')['view']) ){ ?> selected <?php }
                                                           } ?> value="<?php echo $view->view_id; ?>"><?php echo $view->view_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('view[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['view[]'];}?></label>
                                                 <span class="error" id="viewerror"></span>
                                            </li>
                                             <li style="padding-top: 30px;">
                                                <label for=""><input type="checkbox"  name="favourite" value="1"> Favorite </label>                                                
                                            </li>
                                            <li>
                                                <label for="">Select image</label>
                                                <input name="img[]"  type="file" multiple>
                                                <!-- <label class="error"><?php if ($this->session->flashdata('imageError')!=""){echo $this->session->flashdata('imageError');}?></label> -->
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Second Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li class="remove-all-section">
                                                <label for="">What’s Allowed</label>
                                                <select name="camping[]" id="comping" class="select" multiple="multiple">
                                                     
                                                     <?php foreach ($campings as $camping) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('camping', $this->session->flashdata('data'))){
                                                            if(in_array($camping->camping_id, $this->session->flashdata('data')['camping']) ){ ?> selected <?php }
                                                           } ?> value="<?php echo $camping->camping_id; ?>"><?php echo $camping->camping_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('camping[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['camping[]'];}?></label>
                                                 <span class="error" id="compingerror"></span>
                                            </li>
                                            <li>
                                                <label for="">No of Guests</label>
                                                <input type="text" name="guests" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('guests', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['guests'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('guests', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['guests'];}?></label>
                                            </li>
                                            <li>
                                                <label for="">No of Vehicles</label>
                                                <input type="text" name="vehicles" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('vehicles', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['vehicles'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('vehicles', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['vehicles'];}?></label>
                                            </li>
                                            <li>
                                                <label>Pets</label>
                                                <p><input
                                                       <?php if ($this->session->flashdata('data')!="" && array_key_exists('pets', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['pets'] == "No"){echo "checked"; }  } ?> type="radio" name="pets" value="No"> No</p>
                                                <p><input <?php if ($this->session->flashdata('data')!="" && array_key_exists('pets', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['pets'] == "Domestic only"){echo "checked"; }  } ?> type="radio" name="pets" value="Domestic only"> Domestic only</p>
                                                <div class="clearfix"></div>
                                                 <label id="pets-error" class="error" for="pets"><?php if ($this->session->flashdata('error')!="" && array_key_exists('pets', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['pets'];}?></label>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Third Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Length</label>
                                               <!--  <select name="trailer" id="trailer">
                                                     <option value=""></option>
                                                     <?php foreach ($parameter_trailers as $parameter_trailer) { ?>
                                                       <option value="<?php echo $parameter_trailer->trailer_id; ?>"><?php echo $parameter_trailer->trailer_name; ?></option>
                                                  <?php } ?>
                                              </select> -->
                                               <input id="length" placeholder="Enter feet number" type="text" name="trailer" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('trailer', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['trailer'];}?>" class="form-control" placeholder="" >
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('trailer', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['trailer'];}?></label>
                                            </li>
                                            <li>
                                                <label for="">Grade</label>
                                                <select class="form-control" name="grade" id="grade">
                                                    <option style="display: none;" value=""></option>
                                                     <?php foreach ($parameter_grades as $parameter_grade) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('grade', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['grade'] == $parameter_grade->grade_id){echo "selected"; }  } ?> value="<?php echo $parameter_grade->grade_id; ?>"><?php echo $parameter_grade->grade_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('grade', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['grade'];}?></label>
                                            </li>
                                            <li>
                                                <label for="">Base</label>
                                                <select class="form-control" name="base" id="base">
                                                        <option style="display: none;" value=""></option>
                                                     <?php foreach ($parameter_bases as $parameter_base) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('base', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['base'] == $parameter_base->base_id){echo "selected";}  } ?> value="<?php echo $parameter_base->base_id; ?>"><?php echo $parameter_base->base_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('base', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['base'];}?></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Fourth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Access</label>
                                                <select class="form-control" name="access" id="acess">
                                                      <option style="display: none;" value=""></option>
                                                     <?php foreach ($parameter_acess as $parameter_ace) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('access', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['access'] == $parameter_ace->acess_id){echo "selected";}  } ?> value="<?php echo $parameter_ace->acess_id; ?>"><?php echo $parameter_ace->acess_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('access[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['access[]'];}?></label>
                                                 <span class="error" id="accesserror"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Fifth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Electric</label>
                                                <select class="form-control" name="electric" id="electric">
                                                    <option style="display: none;" value=""></option>
                                                    <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('electric', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['electric'] == "Yes"){echo "selected"; }  } ?>  value="Yes">Yes</option>
                                                    <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('electric', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['electric'] == "No"){echo "selected"; }  } ?>  value="No">No</option>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('electric', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['electric'];}?></label>
                                            </li>
                                            <li class="electric-cus-adl">
                                                <label for="">Amps</label>
                                                <select name="amps[]" id="amps" class="select" multiple="multiple">
                                                       <!-- <option value=""></option> -->
                                                     <?php foreach ($parameter_amps as $parameter_amp) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('amps', $this->session->flashdata('data'))){
                                                            if(in_array($parameter_amp->amp_id, $this->session->flashdata('data')['amps']) ){ ?> selected <?php } } ?> value="<?php echo $parameter_amp->amp_id; ?>"><?php echo $parameter_amp->amp_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('amps[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['amps[]'];}?></label>
                                                <span class="error" id="ampserror"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Sixth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label>Water Supply</label>
                                                <select name="water[]" id="water" class="select" multiple="multiple">
                                                       <!-- <option value=""></option> -->
                                                     <?php foreach ($parameter_waters as $parameter_water) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('water', $this->session->flashdata('data'))){
                                                            if(in_array($parameter_water->water_id, $this->session->flashdata('data')['water']) ){ ?> selected <?php } } ?> value="<?php echo $parameter_water->water_id; ?>"><?php echo $parameter_water->water_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('water[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['water[]'];}?></label>
                                               <span class="error" id="watererror"></span>
                                            </li>
                                            <li>
                                                <label>Sewer</label>
                                               <select name="sewer[]" id="sewer" class="select" multiple="multiple">
                                                       <!-- <option value=""></option> -->
                                                     <?php foreach ($parameter_sewers as $parameter_sewer) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('sewer', $this->session->flashdata('data'))){
                                                            if(in_array($parameter_sewer->sewer_id, $this->session->flashdata('data')['sewer']) ){ ?> selected <?php } } ?> value="<?php echo $parameter_sewer->sewer_id; ?>"><?php echo $parameter_sewer->sewer_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('sewer[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['sewer[]'];}?></label>
                                               <span class="error" id="sewererror"></span>
                                             
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Seventh Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label>Wifi</label>
                                                <select class="form-control" name="wifi" id="wifi">
                                                    <option style="display: none;" value=""></option>
                                                   <?php foreach ($parameter_wifis as $parameter_wifi) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('wifi', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['wifi'] ==$parameter_wifi->wifi_id){echo "selected"; }  } ?>  value="<?php echo $parameter_wifi->wifi_id; ?>"><?php echo $parameter_wifi->wifi_name; ?></option>
                                                  <?php } ?>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('wifi', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['wifi'];}?></label>
                                            </li>
                                            <li>
                                                <label>Cable TV</label>
                                                <select class="form-control" name="tv" id="tv">
                                                  <option style="display: none;" value=""></option>
                                                   <?php foreach ($parameter_cables as $parameter_cable) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('tv', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['tv'] == $parameter_cable->cable_id){echo "selected";}  } ?> value="<?php echo $parameter_cable->cable_id; ?>"><?php echo $parameter_cable->cable_name; ?></option>
                                                         <?php } ?>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('tv', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['tv'];}?></label>
                                            </li>
                                            <li>
                                                <label>Service Provider</label>
                                                <select class="form-control" name="verizon" id="verizon">
                                                      <option style="display: none;" value=""></option>
                                                     <?php foreach ($parameter_verizons as $parameter_verizon) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('verizon', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['verizon'] == $parameter_verizon->verizon_id){echo "selected";}  } ?> value="<?php echo $parameter_verizon->verizon_id; ?>"><?php echo $parameter_verizon->verizon_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('verizon', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['verizon'];}?></label>
                                            </li>
                                             <li>
                                                <label style="display: none;" id="ph-lab">Cell Phone Coverage</label>
                                                <select style="display: none;" class="form-control" name="coverage" id="coverage">
                                                      <option value=""></option>
                                                    <option value="1bar">1 bar</option>
                                                     <option value="2bar">2 bar</option>
                                                      <option value="3bar">3 bar</option>
                                                       <option value="4bar">4 bar</option>
                                              </select>
                                             <!--  <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('verizon', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['verizon'];}?></label> -->
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Eighth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Shade Types</label>
                                                <select class="form-control" name="shade" id="shade">
                                                     <option style="display: none;" value=""></option>
                                                     <?php foreach ($parameter_shades as $parameter_shade) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('shade', $this->session->flashdata('data'))){ if($this->session->flashdata('data')['shade'] == $parameter_shade->shade_id){echo "selected";}  } ?> value="<?php echo $parameter_shade->shade_id; ?>"><?php echo $parameter_shade->shade_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('shade', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['shade'];}?></label>
                                            </li>
                                           <!--  <li>
                                                <label for="">Site Shelter</label>
                                                <select name="shelter" id="shelter">
                                                    <option value=""></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('shelter', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['shelter'];}?></label>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Ninth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Campsite Amenities</label>
                                                 <select name="table[]" id="table" class="select" multiple="multiple">
                                                       <!-- <option value=""></option> -->
                                                     <?php foreach ($parameter_tables as $parameter_table) { ?>
                                                       <option <?php if ($this->session->flashdata('data')!="" && array_key_exists('table', $this->session->flashdata('data'))){
                                                            if(in_array($parameter_table->table_id, $this->session->flashdata('data')['table']) ){ ?> selected <?php } } ?> value="<?php echo $parameter_table->table_id; ?>"><?php echo $parameter_table->table_name; ?></option>
                                                  <?php } ?>
                                              </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('table[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['table[]'];}?></label>
                                                 <span class="error" id="tableerror"></span>
                                            </li>
                                           <!--  <li>
                                                <label for="">Fire-ring</label>
                                                <select name="firering">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('firering', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['firering'];}?></label>
                                            </li> -->
                                          <!--   <li>
                                                <label for="">Fire-Ring/Grill</label>
                                                <select name="fireringgrill">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('fireringgrill', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['fireringgrill'];}?></label>
                                            </li> -->
                                            <!-- <li>
                                                <label for="">Separate Grill</label>
                                                <select name="sgrill">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('sgrill', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['sgrill'];}?></label>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Tenth Column</h4>
                                </div>
                                <div class="content">
                                    <div class="payment-list column">
                                        <ul>
                                            <li>
                                                <label for="">Yards to Toilet</label>
                                                <input type="text" name="toilet" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('toilet', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['toilet'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('toilet', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['toilet'];}?></label> 
                                            </li>
                                            <li>
                                                <label for="">Yards to Water</label>
                                                <input type="text" name="ywater" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('ywater', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['ywater'];}?>" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('ywater', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['ywater'];}?></label>
                                            </li>
                                            <li>
                                                <label for="">Yards to Trash</label>
                                                <input type="text" name="ytrash" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('ytrash', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['ytrash'];}?>"  class="form-control" placeholder="">
                                                 <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('ytrash', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['ytrash'];}?></label>
                                            </li>
                                            <input type="hidden" id="changes" name="changes" value="0">
                                            <li class="full"><input type="submit" name="publish" value="Activate"> <input  class="Draft" formnovalidate="formnovalidate" type="button" name="save" value="Save as Draft"></li>

                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <!--// Main Content \\-->

        <script type="text/javascript">
          //on load auto select jquery function
$(document).ready(function(){
fun();
// fun_electric();
// alert('1221');
//onload cache function
// set the value to this input
       /* Here you can add more inputs to set value. if it's saved */
       //Save the value function - save it to localStorage as (ID, VALUE)
  


});

//on change option functionality
    $('#electric').on('change', function(){
      var val=$(this).val();
      if(val=='Yes')
      {
        // alert('ues');
        // $("#amps").unwrap('<span/>')
         $("#amps").children('option').show();
      $('.electric-cus-adl').show() ;

      }else if(val=='No'){
        // alert('no');
         
        $("#amps").children('option').hide();
        $('.electric-cus-adl').hide() ;
        $("#amps").val('option');
      }
      // alert($(this).val());
});
//on change option functionality
    $('#parentcom').on('change', function(){
   fun();
});
    function fun()
    {
       var id = $('#parentcom').val();
    var base_urlLocal='<?php echo base_url();?>';
    if(id == '')
    {

        $('#parentcom').val('');
     
    }
    else
    {

           $.ajax({
           url: base_urlLocal+"/admin/ChildCampGroundController/get_child",
           type: 'POST',
           data: {id: id},
           dataType:'json',
           error: function() {
              alert('Something is wrong,Refresh your Page');
           },
           success: function(data1) {
           
                $('#childcom').val('');
                var html = '';
                
                
                html+='<option value="81">No Child Campground</option>';
                for(var i=0; i<data1.length; i++){
                    html += '<option value='+data1[i]['c_id']+'>'+data1[i]['c_name']+'</option>';
                }
                $('#childcom').html(html);
                //onload auto selected cache function
                document.getElementById("childcom").value = getSavedValue("childcom");
     }
          });
      }
    }





$('.Draft').click(function  (argument) {
  // body...
$('#changes').val('1');
  $("#add_site_description")[0].submit();
});


document.getElementById("parentcom").value = getSavedValue("parentcom");



// set the value to this input
       /* Here you can add more inputs to set value. if it's saved */
       //Save the value function - save it to localStorage as (ID, VALUE)
       function saveValue(e){
        // alert('234');
           var id = e.id;  // get the sender's id to save it .
           var val = e.value; // get the value.
           localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
       }
       //get the saved value function - return the value of "v" from localStorage.
       function getSavedValue  (v){
           // alert(localStorage.getItem(v));
           if (!localStorage.getItem(v)) {
               return "";// You can change this to your defualt value.
           }
               return localStorage.getItem(v);
                 }



        </script>
