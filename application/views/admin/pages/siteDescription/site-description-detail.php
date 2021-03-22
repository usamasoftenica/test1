  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Site Description Detail</li>
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
                                <h4 class="title">Site Description Detail</h4>
                                <a href="<?php echo base_url().'admin/site-description-list'?>" class="btn btn-info btn-fill pull-right color-red back">Back</a> 
                                <a href="<?php echo base_url().'admin/site-description-edit/'. $sitedescription->siteId?>" class="btn btn-info btn-fill pull-right color-red back">Edit</a> 
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                  <div class="site-search">
                                        <!-- <form action="">
                                            <ul class="show-search-form a">
                                                <li>
                                                    <label for="">Which region do you want to explore?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">West North</option>
                                                        <option value="">North</option>
                                                        <option value="">North East</option>
                                                        <option value="">West</option>
                                                        <option value="">Central</option>
                                                        <option value="">East</option>
                                                        <option value="">South West</option>
                                                        <option value="">South</option>
                                                        <option value="">South East</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What level of camping do you desire?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">No hookups, electric</option>
                                                        <option value="">electric & water</option>
                                                        <option value="">electric, water and sewer</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What type of campground do you want?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">National Park</option>
                                                        <option value="">National Monument</option>
                                                        <option value="">State Park</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What type of camping are you doing?</label>
                                                    <select class="motorhome" name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="motorhome">Motorhome/RV</option>
                                                        <option value="">Trailer</option>
                                                        <option value="">Tent</option>
                                                    </select>
                                                </li>
                                                <li class="full extra-form rv">
                                                    <ul>
                                                        <li>
                                                            <label for="">What length campsite is required?</label>
                                                            <select name="" id="">
                                                                <option value="">Select</option>
                                                                <option value="">20</option>
                                                                <option value="">30</option>
                                                                <option value="">35</option>
                                                                <option value="">40</option>
                                                                <option value="">45</option>
                                                                <option value="">50+</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="">Do you need electricity?</label>
                                                            <select class="electricity" name="" id="">
                                                                <option value="">Select</option>
                                                                <option value="electricity">Yes</option>
                                                                <option value="">No</option>
                                                                <option value="">Doesn’t matter</option>
                                                            </select>
                                                        </li>
                                                        <li class="full extra-form electricity">
                                                            <ul>
                                                                <li>
                                                                    <label for="">What Amperage?</label>
                                                                    <select name="" id="">
                                                                        <option value="">Select</option>
                                                                        <option value="">20</option>
                                                                        <option value="">30</option>
                                                                        <option value="">50</option>
                                                                    </select>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <label for="">Do you need a water hook-up?</label>
                                                            <select name="" id="">
                                                                <option value="">Select</option>
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                                <option value="">Doesn’t matter</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="">Do you need sewer hook-up?</label>
                                                            <select name="" id="">
                                                                <option value="">Select</option>
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                                <option value="">Doesn’t matter</option>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <label for="">What kind of view do you want?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Lake</option>
                                                        <option value="">Mountain</option>
                                                        <option value="">River</option>
                                                        <option value="">Creek</option>
                                                        <option value="">Meadow</option>
                                                        <option value="">Woods</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What level of shade is required?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Full shade</option>
                                                        <option value="">Partial shade</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">Do you require a picnic table?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">Do you require a fire ring?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">Do you require a grill?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What are your maximum yards to a restroom?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">20</option>
                                                        <option value="">30</option>
                                                        <option value="">40</option>
                                                        <option value="">50</option>
                                                        <option value="">60</option>
                                                        <option value="">70</option>
                                                        <option value="">80</option>
                                                        <option value="">90</option>
                                                        <option value="">100</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">What are your maximum yards to a water source?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">20</option>
                                                        <option value="">30</option>
                                                        <option value="">40</option>
                                                        <option value="">50</option>
                                                        <option value="">60</option>
                                                        <option value="">70</option>
                                                        <option value="">80</option>
                                                        <option value="">90</option>
                                                        <option value="">100</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                            </ul>
                                          <span>
                                              <a href="javascript:void(0)" class="show-form a">Advanced Search</a>
                                             <div class="clearfix"></div> 
                                           <input type="submit" value="Submit"> 
                                          </span>
                                      </form> -->
                                    </div>
                                    <table class="detail site-description-detail">
                                      <tr>
                                        <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View</span></th>
                                        <th><span>Tent</span><span>#Guests</span><span>Pets</span><span>#Cars</span></th>
                                        <th><span>Length</span><span>Grade</span> <span>Base</span></th>
                                        <th><span>Access</span></th>
                                        <th><span>Elec</span><span>Amps</span></th>
                                        <th><span>Water</span> <span>Sewer</span></th>
                                        <th><span>Wifi</span><span>Cable TV</span><span>Service Provider</span></th>
                                        <th><span>Shade</span> </th>
                                        <th><span>Table</span> <span>Firing </span> <span>Grill</span></th>
                                        <th><span>Yards to</span><span>Toilet</span><span>Water</span><span>Trash</span></th>
                                      </tr>
                                      <tr>
                                          <td>
                                            <span data-toggle="tooltip" data-placement="left"  title="Site #">Site #:<?php if(!empty($sitedescription->site_no)) {  echo $sitedescription->site_no; } else{echo 'N/A'; }?></span>

                                            <span><?php if(!empty($site_pics)){ ?>
                                                 <?php $ii=0; foreach($site_pics as $pics){?>
                                                <a class="elem" data-toggle="tooltip" data-placement="left"  title="Click to enlarge" href="<?php echo base_url();?>uploads/SiteDescription/<?php echo $pics->sitePic;?>" data-lcl-thumb="<?php echo base_url();?>uploads/SiteDescription/<?php echo $pics->sitePic;?>"><?php if($ii==0){ ?><img style="width:156px;" src="<?php echo base_url();?>uploads/SiteDescription/<?php echo $pics->sitePic;?>" alt=""><?php } $ii++; ?></a><?php }}else{echo 'N/A'; }?></span>
                                            
                                             <span data-toggle="tooltip" data-placement="left"  title="Spacing"><?php if(!empty($sitedescription->sp_image)){ ?><img src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->sp_image; ?>" alt="..."><?php }else if(!empty($sitedescription->sp_name )&& $sitedescription->sp_name != "No"){ echo $sitedescription->sp_name; }else{echo 'N/A'; }?></span>
                                                     


                                                        
                                                   <?php
                                    $des_view = explode("@@", $sitedescription->viewType); 
                                        // print_r($des_view);return;
                                    foreach ($views as $view) {
                                        // $dat=in_array($view->view_id, $des_view, TRUE);
                                        // print_r($view);return;
                                    if (in_array($view->view_id, $des_view, TRUE)) { ?>
                                       <span><?php if(!empty($view->view_image)){ ?> <img  data-toggle="tooltip" data-placement="left"  title="<?php echo $view->view_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $view->view_image; ?>" alt="..."><?php }else if(!empty($view->view_name)&& $sitedescription->view_name != "No"){ echo $view->view_name; }else{echo 'N/A'; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>

                                               <!--  <?php if(!empty($sitedescription->favourite==1)){ ?>  <a  data-toggle="tooltip" title="Marked favourite by team colorado" href="#" class="heart-icon fa fa-heart"></a><?php }?> -->

                                              </td>


                                          <td>
                                    <!--         <span> <img src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->camping_image; ?>" alt="..."></span> -->
                                    <?php
                                    $des_camp = explode("@@", $sitedescription->campType); 
                                    foreach ($campings as $camping) {
                                    if (in_array($camping->camping_id, $des_camp, TRUE)) { ?>
                                       <span  ><?php if(!empty($camping->camping_image )){ ?> <img  data-toggle="tooltip" data-placement="left"  title="<?php echo $camping->camping_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $camping->camping_image; ?>" alt="..."><?php }else if(!empty($camping->camping_name)&& $sitedescription->camping_name != "No"){ echo $camping->camping_name; }else{echo 'N/A'; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>

                                           
                                            
                                                 <span><i class="icon-guests" data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->noGuest; ?>"></i></span>

                                                 <span><i class="icon-Pets" data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->pets; ?>"></i></span>

                                                 <span><i class="icon-Car" data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->noVehicle; ?>"></i></span>

                                             </td>
                                          <td>
                                             <span data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->lengthTrailer;; ?>" >
                                                 <!-- <?php if(!empty($sitedescription)){?>
                                                    <?php echo $sitedescription->lengthTrailer; ?>
                                                 <?php }?> -->
                                                <img src="<?php echo base_url();?>assets/images/icons/Length.png" alt="..."> 
                                            </span>

                                       <span data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->grade_name; ?>"><?php if(!empty($sitedescription->grade_image)){ ?><img src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->grade_image; ?>" alt="..."><?php }else if(!empty($sitedescription->grade_name)&& $sitedescription->grade_name != "No"){ echo $sitedescription->grade_name; }else{echo 'N/A'; }?></span>

                                        <span data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->base_name; ?>"><?php if(!empty($sitedescription->base_image)){ ?><img src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->base_image; ?>" alt="..."><?php }else if(!empty($sitedescription->base_name)&& $sitedescription->base_name != "No"){ echo $sitedescription->base_name; }else{echo 'N/A'; }?></span>

                                    </td>


                                          <td>

                                                  <span><?php if(!empty($sitedescription->acess_image)){ ?><img data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->acess_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->acess_image; ?>" alt="..."><?php }else if(!empty($sitedescription->acess_name) && $sitedescription->acess_name != "No"){ echo $sitedescription->acess_name; }else{echo 'N/A'; }?></span>

                                          </td>
                                          <td>

                                            <span><i class="icon-Elec" data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->electric; ?>"></i></span>
                                             <?php
                                    $des_amps = explode("@@", $sitedescription->amps); 
                                    foreach ($amps as $amp) {
                                    if (in_array($amp->amp_id, $des_amps, TRUE)) { ?>
                                       <span  ><?php if(!empty($amp->amp_image)){ ?> <img  data-toggle="tooltip" data-placement="left"  title="<?php echo $amp->amp_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $amp->amp_image; ?>" alt="..."><?php }else if(!empty($amp->amp_name)&& $sitedescription->amp_name != "No"){ echo $amp->amp_name; }else{echo 'N/A'; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>
                                        </td>
                                          <td> 
                                             <?php
                                    $des_water = explode("@@", $sitedescription->water); 
                                    foreach ($waters as $water) {
                                    if (in_array($water->water_id, $des_water, TRUE)) { ?>
                                       <span><?php if(!empty($water->water_image)){ ?> <img data-toggle="tooltip" data-placement="left"  title="<?php echo $water->water_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $water->water_image; ?>" alt="..."><?php }else if(!empty($water->water_name) && $water->water_name != "No"){ echo $water->water_name; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>
                                          <!--  <span><?php if(!empty($sitedescription->water_image)){ ?> <img data-toggle="tooltip" title="<?php echo $sitedescription->water_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->water_image; ?>" alt="..."><?php }else if(!empty($sitedescription->water_name)){ echo $sitedescription->water_name; }else{echo 'N/A'; }?></span>
 -->                                  <?php
                                    $des_sewer = explode("@@", $sitedescription->sewer); 

                                    foreach ($sewers as $sewer) {
                                    if (in_array($sewer->sewer_id, $des_sewer, TRUE)) { ?>

                                       <span ><?php if(!empty($sewer->sewer_image)){ ?> <img   data-toggle="tooltip" data-placement="left"  title="<?php echo $sewer->sewer_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sewer->sewer_image; ?>" alt="..."><?php }else if(!empty($sewer->sewer_name)&& $sewer->sewer_name != "No"){ echo $sewer->sewer_name; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>

                                          </td>

                                          <td>

                                              <span><?php if(!empty($sitedescription->wifi_image)){ ?><img data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->wifi_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->wifi_image; ?>" alt="..."><?php }else if(!empty($sitedescription->wifi_name) && $sitedescription->wifi_name != "No"){ echo $sitedescription->wifi_name; }?></span>

                                               <span><?php if(!empty($sitedescription->cable_image)){ ?><img data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->cable_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->cable_image; ?>" alt="..."><?php }else if(!empty($sitedescription->cable_name && $sitedescription->cable_name != "No")){ echo $sitedescription->cable_name; }?></span>

                                              <span  ><?php if(!empty($sitedescription->verizon_image)){ ?>  <img data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->verizon_name ?> <?php echo $sitedescription->coverage ?> " src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->verizon_image; ?>" alt="..."><?php }else if(!empty($sitedescription->verizon_name) && $sitedescription->verizon_name !="No"){ echo $sitedescription->verizon_name; }?></span>

                                              <?php if($sitedescription->coverage=='1bar'){ ?>
                                                  <span>
                                                        <img data-toggle="tooltip" data-placement="left" title="<?php $sitedescription->coverage ?>" src="<?php echo base_url();?>uploads/SideParameter/1-Bar.png" alt="...">
                                                  </span>
                                              <?php } ?>
                                              <?php if($sitedescription->coverage=='2bar'){ ?>
                                                  <span>
                                                        <img data-toggle="tooltip" data-placement="left" title="<?php $sitedescription->coverage ?>" src="<?php echo base_url();?>uploads/SideParameter/2-Bars.png" alt="...">
                                                  </span>
                                              <?php } ?>
                                              <?php if($sitedescription->coverage=='3bar'){ ?>
                                                  <span>
                                                        <img data-toggle="tooltip" data-placement="left" title="<?php $sitedescription->coverage ?>" src="<?php echo base_url();?>uploads/SideParameter/3-Bars.png" alt="...">
                                                  </span>
                                              <?php } ?>
                                              <?php if($sitedescription->coverage=='4bar'){ ?>
                                                  <span>
                                                        <img data-toggle="tooltip" data-placement="left" title="<?php $sitedescription->coverage ?>" src="<?php echo base_url();?>uploads/SideParameter/4-Bars.png" alt="...">
                                                  </span>
                                              <?php } ?>


                                        </td>
                                          <td>
                                           <span><?php if(!empty($sitedescription->shade_image)){ ?>  <img data-toggle="tooltip" data-placement="left"  title="<?php echo $sitedescription->shade_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $sitedescription->shade_image; ?>" alt="..."><?php }else if(!empty($sitedescription->shade_name) && $sitedescription->shade_name != "No"){ echo $sitedescription->shade_name; }else{echo 'N/A'; }?></span>

                                             
                                        </td>
                                          <td>
                                            

                                             <!-- <span><i class="icon-Fire" data-toggle="tooltip"  title="<?php echo $sitedescription->fireRing; ?>"></i></span>
 -->    
                                                        <?php
                                    $des_table = explode("@@", $sitedescription->s_table); 
                                    foreach ($tables as $table) {
                                    if (in_array($table->table_id, $des_table, TRUE)) { ?>
                                       <span ><?php if(!empty($table->table_image) && $sitedescription->base_name != "No"){ ?> <img   data-toggle="tooltip" data-placement="left"  title="<?php echo $table->table_name; ?>" src="<?php echo base_url();?>uploads/SideParameter/<?php echo $table->table_image; ?>" alt="..."><?php }else if(!empty($table->table_name)&& $sitedescription->table_name != "No"){ echo $table->table_name; }else{echo 'N/A'; }?></span>
                                    <?php 
                                    }

                                    }
                                    ?>
                                              <!-- <span><i class="icon-Grill" data-toggle="tooltip" title="<?php echo $sitedescription->sGrill; ?>"></i></span> -->


                                          </td>
                                          <td>

                                              <?php if ($sitedescription->yardToilet!=0) {?>
                                            <span><img src="<?php echo base_url(); ?>assets/images/icons/60.png" data-toggle="tooltip" title="<?php echo $sitedescription->yardToilet;?> yards"></span>
                                            <?php } if ($sitedescription->yardWater!=0) {?>
                                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_06_56_42.png" data-toggle="tooltip" title="<?php echo $sitedescription->yardWater?> yards"></span>
                                              <?php } if ($sitedescription->yardTrash!=0) {?>
                                            <span><img src="<?php echo base_url(); ?>assets/images/icons/70.png" data-toggle="tooltip" title="<?php echo $sitedescription->yardTrash;?> yards"></span>
                                            <?php } ?>
                                        </td>
                                      </tr>
                                     
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
		<!--// Main Content \\-->
