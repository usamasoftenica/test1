<!--// Subheader \\-->
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/site-description-list">Site Description List</a></li>
                    <li>Edit Site Description</li>
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
            <input type="hidden" id="changes" name="changes" value="0">

                <li style="width: 22% !important;float: right;margin: 33px 5px 22px 20px;" class="full">
                    <input id="active_import" style="display: inline-block;
    padding: 5px 30px;
    border-radius: 5px;
    border: none;
    background-color: red;
    color: #fff;" type="submit" name="publish" value="Activate">
                    <input style="display: inline-block;
    padding: 5px 30px;
    border-radius: 5px;
    border: none;
    background-color: red;
    color: #fff;"  class="Draft" formnovalidate="formnovalidate" type="button" name="save" value="Save as Draft">
                    <input style="display: inline-block;
    padding: 5px 30px;
    border-radius: 5px;
    border: none;
    background-color: red;
    color: #fff;"  class="Draft" formnovalidate="formnovalidate" type="button" name="next" value="Next">
                </li>


            <form action="<?php echo base_url(); ?>admin/update-site-description" method="post" id="add_site_description" enctype="multipart/form-data">

                <div class="col-md-12">
                    <input type="hidden" name="siteId" container-fluid="id" value="<?php echo $sitedescription->siteId;?>">
                    <!-- <input type="hidden" name="ebanner" value="<?php echo $sitedescription->s_banner;?>"> -->
                    <input type="hidden" name="eimg" value="<?php echo $sitedescription->sitePic;?>">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Site Description</h4>
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
                                    <!--    <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" value="<?php echo $sitedescription->s_color; ?>" name="color" type="color" placeholder="#ffffff">
                                            </li> -->
                                    <!--    <li>
                                           <label>Select banner image</label>
                                           <input class="form-control" name="bannere" type="file">
                                       </li> -->
                                    <!--  <li>
                                                <label>Select Region</label>
                                                <select name="region" id="regions">
                                                     <option value="">Select Region</option>
                                                    <?php foreach ($regions as $region) { ?>
                                                       <option value="<?php echo $region->id; ?>"<?php if ($region->id == $sitedescription->r_id) {
                                        echo "selected";
                                    } ?>
                                                        ><?php echo $region->name; ?></option>
                                                      <?php } ?>

                                                </select>
                                            </li> -->
                                    <li>
                                        <label>Select Parent Campground</label>
                                        <select name="parentcom" class="select2_single" id="parentcom">
                                            <option value="">Select Parent Campground</option>
                                            <?php foreach ($parentCampground as $parentCampgrounds) { ?>
                                                <option <?php if ($sitedescription->p_id == $parentCampgrounds->p_id) { echo "selected"; }?> value="<?php echo $parentCampgrounds->p_id; ?>"><?php echo $parentCampgrounds->name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('parentcom', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['parentcom'];}?></label>
                                        <label id="parentcom-error" class="error" for="parentcom"></label>
                                    </li>
                                    <li>
                                        <label value="">Select Child Campground</label>
                                        <select name="childcom" id="childcom">
                                            <option value="">Select Child Campground</option>
                                            <?php foreach ($childs as $child) { ?>
                                                <option value="<?php echo $child->c_id; ?>"<?php if ($child->c_id == $sitedescription->childId) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $child->c_name; ?></option>
                                            <?php } ?>

                                        </select>
                                    </li>
                                    <li>
                                        <label value="">Edit Google Map (optional)</label>
                                        <div class="form-group">
                                            <textarea name="google_map" class="form-control" rows="3" ><?php echo $sitedescription->map_link ; ?></textarea>
                                        </div>

                                        <!--  <input type="text" name="google_map" value="<?php echo $sitedescription->map_link ; ?>" class="form-control" > -->
                                    </li>
                                    <!--   <li>
                                                <label for="">Sites Name</label>
                                                <input type="text" value="<?php echo $sitedescription->name; ?>" name="name" class="form-control" placeholder="">
                                                <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name'];}?></label>
                                            </li> -->
                                    <!-- <li>
                                                <label for="">Slug</label>
                                                <input type="text"  name="slug"  value="<?php echo $sitedescription->slug; ?>" class="form-control" placeholder="">
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
                                        <input type="text"  value="<?php echo $sitedescription->site_no; ?>" name="siteno" class="form-control" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error_no')!=""){echo $this->session->flashdata('error_no');}?></label>
                                    </li>
                                    <li>
                                        <label for="">Spacing</label>
                                        <select name="spacing" id="spacing">
                                            <option value=""></option>
                                            <?php foreach ($spacings as $spacing) { ?>
                                                <option value="<?php echo $spacing->sp_id; ?>"
                                                    <?php if ($spacing->sp_id == $sitedescription->spacing) {
                                                        echo "selected";
                                                    } ?>
                                                ><?php echo $spacing->sp_name; ?></option>
                                            <?php } ?>

                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('spacing', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['spacing'];}?></label>
                                    </li>

                                    <li>
                                        <label for="">Type of View</label>
                                        <select name="view[]" id="view" class="select" multiple="multiple">

                                            <?php
                                            $des_view = explode("@@", $sitedescription->viewType);
                                            foreach ($views as $view) { ?>
                                                <option value="<?php echo $view->view_id; ?>"<?php if (in_array($view->view_id, $des_view, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $view->view_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('view[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['view[]'];}?></label>
                                        <span class="error" id="viewerror"></span>

                                    </li>
                                    <li style="padding-top: 30px;">
                                        <label for=""><input type="checkbox" <?php if($sitedescription->favourite==1){?> checked <?php } ?> name="favourite" value="1"> Favorite  </label>
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

                                            <?php
                                            $des_camp = explode("@@", $sitedescription->campType);
                                            foreach ($campings as $camping) { ?>
                                                <option value="<?php echo $camping->camping_id; ?>"<?php if (in_array($camping->camping_id, $des_camp, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $camping->camping_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('camping[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['camping[]'];}?></label>
                                        <span class="error" id="compingerror"></span>
                                    </li>
                                    <li>
                                        <label for="">No of Guests</label>
                                        <input type="text" name="guests" class="form-control" value="<?php echo $sitedescription->noGuest;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('guests', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['guests'];}?></label>
                                    </li>
                                    <li>
                                        <label for="">No of Vehicles</label>
                                        <input type="text" name="vehicles" class="form-control" value="<?php echo $sitedescription->noVehicle;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('vehicles', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['vehicles'];}?></label>
                                    </li>
                                    <li>
                                        <label>Pets</label>

                                        <?php $pets = strtolower($sitedescription->pets); ?>
                                        <p><input type="radio" <?php if($pets == 'no'){ echo 'checked';} ?> name="pets" value="No"> No</p>
                                        <p><input type="radio" <?php if($pets == "domestic only"){ echo 'checked';} ?> name="pets" value="Domestic only"> Domestic only</p>
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
                                                         <option value="<?php echo $parameter_trailer->trailer_id; ?>"
                                                         <?php if ($parameter_trailer->trailer_id == $sitedescription->lengthTrailer) {
                                            echo "selected";
                                        } ?>
                                                        ><?php echo $parameter_trailer->trailer_name; ?></option>
                                                      <?php } ?>
                                              </select> -->
                                        <input placeholder="Enter feet number" type="text" name="trailer" class="form-control" value="<?php echo $sitedescription->lengthTrailer;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('trailer', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['trailer'];}?></label>
                                    </li>
                                    <li>
                                        <label for="">Grade</label>
                                        <select name="grade" id="grade">
                                            <option value=""></option>
                                            <?php foreach ($parameter_grades as $parameter_grade) { ?>
                                                <option value="<?php echo $parameter_grade->grade_id; ?>" <?php if ($parameter_grade->grade_id == $sitedescription->grade) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_grade->grade_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('grade', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['grade'];}?></label>
                                    </li>
                                    <li>
                                        <label for="">Base</label>
                                        <select name="base" id="base">
                                            <option value=""></option>
                                            <?php foreach ($parameter_bases as $parameter_base) { ?>
                                                <option value="<?php echo $parameter_base->base_id; ?>"<?php if ($parameter_base->base_id == $sitedescription->base) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_base->base_name; ?></option>
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
                                        <select name="access" id="acess">
                                            <option value=""></option>
                                            <?php foreach ($parameter_acess as $parameter_ace) { ?>
                                                <option value="<?php echo $parameter_ace->acess_id; ?>"<?php if ($parameter_ace->acess_id == $sitedescription->acess) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_ace->acess_name; ?></option>
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
                                        <select name="electric" id="electric">
                                            <option value=""></option>
                                            <?php $electric = strtolower($sitedescription->electric); ?>
                                            <option value="Yes" <?php if($electric == 'yes'){ echo 'selected';} ?> >Yes</option>
                                            <option value="No" <?php if($electric == 'no'){ echo 'selected';} ?> >No</option>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('electric', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['electric'];}?></label>
                                    </li>
                                    <li class="electric-cus-adl">
                                        <label for="">Amps</label>
                                        <select name="amps[]" id="amps" class="select" multiple="multiple">

                                            <?php
                                            $des_amps = explode("@@", $sitedescription->amps);
                                            foreach ($parameter_amps as $amps) { ?>
                                                <option value="<?php echo $amps->amp_id; ?>"<?php if (in_array($amps->amp_id, $des_amps, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $amps->amp_name; ?></option>
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

                                            <?php
                                            $des_water = explode("@@", $sitedescription->water);
                                            foreach ($waters as $water) { ?>
                                                <option value="<?php echo $water->water_id; ?>"<?php if (in_array($water->water_id, $des_water, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $water->water_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('water[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['water[]'];}?></label>
                                        <span class="error" id="watererror"></span>
                                    </li>
                                    <li>
                                        <label>Sewer</label>
                                        <select name="sewer[]" id="sewer" class="select" multiple="multiple">

                                            <?php
                                            $des_sewer = explode("@@", $sitedescription->sewer);
                                            foreach ($parameter_sewers as $sewer) { ?>
                                                <option value="<?php echo $sewer->sewer_id; ?>"<?php if (in_array($sewer->sewer_id, $des_sewer, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $sewer->sewer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('sewer[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['sewer[]'];}?></label>
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
                                        <select name="wifi" id="wifi">
                                            <option value=""></option>

                                            <?php foreach ($parameter_wifis as $parameter_wifi) { ?>
                                                <option value="<?php echo $parameter_wifi->wifi_id; ?>"<?php if ($parameter_wifi->wifi_id == $sitedescription->wifi) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_wifi->wifi_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('wifi', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['wifi'];}?></label>
                                    </li>
                                    <li>
                                        <label>Cable TV</label>
                                        <select name="tv" id="tv">
                                            <option value=""></option>
                                            <?php foreach ($parameter_cables as $parameter_cable) { ?>
                                                <option value="<?php echo $parameter_cable->cable_id; ?>"<?php if ($parameter_cable->cable_id == $sitedescription->cableTv) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_cable->cable_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('tv', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['tv'];}?></label>
                                    </li>
                                    <li>
                                        <label>Service Provider</label>
                                        <select name="verizon" id="verizon-edit">
                                            <option value="" style="display: none;"></option>
                                            <?php foreach ($parameter_verizons as $parameter_verizon) { ?>
                                                <option value="<?php echo $parameter_verizon->verizon_id; ?>"<?php if ($parameter_verizon->verizon_id == $sitedescription->verizon) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_verizon->verizon_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('verizon', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['verizon'];}?></label>
                                    </li>
                                    <li id="coverage-edit">
                                        <label>Cell Phone Coverage</label>
                                        <select id="cel-ph" name="coverage">
                                            <option value=""></option>
                                            <option <?php if($sitedescription->coverage == '1bar'){ echo 'selected';} ?> value="1bar">1 bar</option>
                                            <option <?php if($sitedescription->coverage == '2bar'){ echo 'selected';} ?> value="2bar">2 bar</option>
                                            <option <?php if($sitedescription->coverage == '3bar'){ echo 'selected';} ?> value="3bar">3 bar</option>
                                            <option <?php if($sitedescription->coverage == '4bar'){ echo 'selected';} ?> value="4bar">4 bar</option>
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
                                        <select name="shade" id="shade">
                                            <option value=""></option>
                                            <?php foreach ($parameter_shades as $parameter_shade) { ?>
                                                <option value="<?php echo $parameter_shade->shade_id; ?>"<?php if ($parameter_shade->shade_id == $sitedescription->shadeType) {
                                                    echo "selected";
                                                } ?>
                                                ><?php echo $parameter_shade->shade_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('shade', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['shade'];}?></label>
                                    </li>
                                    <!--  <li>
                                                <label for="">Site Shelter</label>
                                                <select name="shelter" id="shelter">
                                                    <option value=""></option>
                                                    <option <?php if($sitedescription->s_shelter == 'Yes'){ echo 'selected';} ?> value="Yes">Yes</option>
                                                    <option <?php if($sitedescription->s_shelter == 'No'){ echo 'selected';} ?>  value="No">No</option>
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

                                            <?php
                                            $des_table = explode("@@", $sitedescription->s_table);
                                            foreach ($parameter_tables as $table) { ?>
                                                <option value="<?php echo $table->table_id; ?>"<?php if (in_array($table->table_id, $des_table, TRUE)) {
                                                    echo "selected";

                                                } ?>
                                                ><?php echo $table->table_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('table[]', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['table[]'];}?></label>
                                        <span class="error" id="tableerror"></span>
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
                            <h4 class="title">Tenth Column</h4>
                        </div>
                        <div class="content">
                            <div class="payment-list column">
                                <ul>
                                    <li>
                                        <label for="">Yards to Toilet</label>
                                        <input type="text" name="toilet" class="form-control" value="<?php echo $sitedescription->yardToilet;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('toilet', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['toilet'];}?></label>
                                    </li>
                                    <li>
                                        <label for="">Yards to Water</label>
                                        <input type="text" name="ywater" class="form-control" value="<?php echo $sitedescription->yardWater;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('ywater', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['ywater'];}?></label>
                                    </li>
                                    <li>
                                        <label for="">Yards to Trash</label>
                                        <input type="text" name="ytrash" class="form-control" value="<?php echo $sitedescription->yardTrash;?>" placeholder="">
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
            <div class="card">
                <div class="header">
                    <h4 class="title">Site Image</h4>
                </div>
                <div class="content">
                    <!--  <div class="site-image"> -->


                    <div class="banner-images">
                        <ul>
                            <?php if(!empty($sitedescription_pics && $sitedescription_pics[0]->sitePic != "") ) { foreach($sitedescription_pics as $pics) {?>


                                <li class="del-fig-<?php echo $pics->sitepic_id ?>">
                                    <figure><a data-id="<?php echo $pics->sitepic_id ?>" href="javascript:void(0)" data-toggle="tooltip" class="fa fa-trash del-site-pic" title="" data-original-title="Delete"></a><img src="<?php echo base_url() ?>uploads/SiteDescription/<?php echo $pics->sitePic; ?>" alt=""></figure>
                                </li>
                            <?php } } else { echo "N/A"; }?>
                        </ul>
                    </div>

                    <!--  <img style="border: 1px solid #eee; width: 50px;" src="<?php echo base_url() ?>uploads/SiteDescription/<?php echo $pics->sitePic; ?>"> -->

                    <!-- </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--// Main Content \\-->
<!-- on run -->

<script type="text/javascript">
    //for electric
    //on change option functionality
    //     $('#electric').on('change', function(){

    //       var val=$(this).val();
    //       if(val=='Yes')
    //       {
    //         // alert('ues');
    //         // $("#amps").unwrap('<span/>')
    //          $("#amps").children('option').show();
    //       }else{
    //         // alert('no');

    //         $("#amps").children('option').hide();
    //         $("#amps").val('option');
    //       }
    //       // alert($(this).val());
    // });


    //check on document on ready if no selected remove amp value...
    $( document ).ready(function() {

        var val=$('#electric').val();
        if(val=='Yes')
        {
            // alert("yes") ;
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


    $('#electric').on('change', function(){

        var val=$(this).val();
        if(val=='Yes')
        {
            // alert("yes") ;
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



    $('#parentcom').on('change', function(){
        var id = $('#parentcom').val();

        var base_urlLocal='<?php echo base_url();?>';
        // var base_urlLocal='http://www.coloradocampgrounds.development-env.com/';
        if(id == '')
        {
            $('#parentcom').html('');
            return;
        }
        else
        {

            $.ajax({
                url: base_urlLocal+"/admin/ChildCampGroundController/get_child",
                type: 'POST',
                data: {id: id},
                dataType:'json',
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data1) {

                    $('#childcom').html('');var html = '';
                    var i;
                    var html;
                    html+='<option value="">Select Child Campground</option>';
                    for(i=0; i<data1.length; i++){
                        html += '<option value='+data1[i]['c_id']+'>'+data1[i]['c_name']+'</option>';
                    }
                    $('#childcom').html(html);
                }
            });
        }
    });

    $('.Draft').click(function  (argument) {
        // body...
        $('#changes').val('1');
        $("#add_site_description")[0].submit();
    });
</script>


<script type="text/javascript">
    //                 $('#regions').on('change', function(){
    //     var id = $('#regions').val();
    //     if(id == '')
    //     {
    //         $('#parentcom').html('');
    //         return;
    //     }
    //     else
    //     {
    //            $.ajax({
    //            url: base_url+"/admin/ChildCampGroundController/get_parent",
    //            type: 'POST',
    //            data: {id: id},
    //            dataType:'json',
    //            error: function() {
    //               alert('Something is wrong');
    //            },
    //            success: function(data1) {
    //                 $('#parentcom').html('');var html = '';
    //                 var i;
    //                 var html;
    //                  html += '<option value="">Select Parent Campground</option>';
    //                 for(i=0; i<data1.length; i++){
    //                     html += '<option value='+data1[i]['p_id']+'>'+data1[i]['name']+'</option>';
    //                 }
    //                 $('#parentcom').html(html);
    //    }
    //         });
    //     }
    //      $('#childcom').html('');
    // });

    //     $('#parentcom').on('change', function(){
    //     var id = $('#parentcom').val();
    //     if(id == '')
    //     {
    //         $('#parentcom').html('');
    //         return;
    //     }
    //     else
    //     {

    //            $.ajax({
    //            url: base_url+"/admin/ChildCampGroundController/get_child",
    //            type: 'POST',
    //            data: {id: id},
    //            dataType:'json',
    //            error: function() {
    //               alert('Something is wrong');
    //            },
    //            success: function(data1) {
    //                 $('#childcom').html('');var html = '';
    //                 var i;
    //                 var html;
    //                 for(i=0; i<data1.length; i++){
    //                     html += '<option value='+data1[i]['c_id']+'>'+data1[i]['c_name']+'</option>';
    //                 }
    //                 $('#childcom').html(html);
    //    }
    //         });
    //     }
    // });


    $('.del-site-pic').on('click', function(){

        var base_urlLocal='<?php echo base_url();?>';

        var id = $(this).attr('data-id') ;


        $.confirm({

            title: "Are you sure ?",
            content: "You want to delete this image",
            buttons: {
                confirm: function () {

                    $.ajax({

                        url: base_urlLocal+"/admin/SiteDescriptionController/delSiteImg",
                        type: 'POST',
                        data: {id: id},
                        dataType:'json',
                        error: function() {
                            alert('Something is wrong');
                        },
                        success: function(data1) {
                            $('.del-fig-'+id).remove() ;
                        }
                    });

                },
                cancel: function () {
                    //  $.alert('Canceled!');
                },

            }
        });



    })

    window.onload = checkServicePro() ;

    function checkServicePro()
    {

        if( $('#verizon-edit option:selected').text() != "No" )
        {
            $('#coverage-edit').show() ;
        }else{

            $('#coverage-edit').hide() ;

            $("#cel-ph").val($("#cel-ph option:first").val());
        }
    }

    $('#verizon-edit').change( function(){
        checkServicePro() ;
    }) ;

    var url = "<?php echo base_url() ; ?>" ;
    $('#active_import').click(function(){
        $('#add_site_description').attr('action',url+'admin/activate-site-description');
        $('#add_site_description').submit() ;
    });


</script>








