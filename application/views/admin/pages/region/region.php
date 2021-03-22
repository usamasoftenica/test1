<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li>Region Maps</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--// Subheader \\-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Region Maps</h4>
                         <?php if($this->session->flashdata('success1')!=""){  ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong></strong>
                            <?php echo $this->session->flashdata('success1'); ?>
                        </div>
                        <?php } ;?>
                    </div>
                    <div class="content">
                        <div class="payment-list">
                            <ul class="row">
                                <li class="col-md-6" style="margin-bottom: 20px;">
                                    <label>Select Region</label>
                                    <select name="region" id="regionid" class="form-control">
                                        <option value="">Select Region</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==1) ){echo 'selected';}?> value="1">Northwest</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==2) ){echo 'selected';}?> value="2">Southwest</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==3) ){echo 'selected';}?> value="3">Northeast</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==4) ){echo 'selected';}?> value="4">Southeast</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==5) ){echo 'selected';}?> value="5">Central</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==6) ){echo 'selected';}?> value="6">South</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==7) ){echo 'selected';}?> value="7">North</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==8) ){echo 'selected';}?> value="8">West</option>
                                        <option <?php if ($this->session->flashdata('show-v')!="" && !empty($this->session->flashdata('show-v') && $this->session->flashdata('show-v')==9) ){echo 'selected';}?>    value="9">East</option>                     
                                    </select>
                                </li>
                            </ul>
                            <form id="region1" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion1">
                                <ul>
                                    <li class="full">
                                        <div class="header" style="padding: 0px;">
                                            <h4 class="title">Region
                                                <?php echo $regions[0]->name;?> </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <label>Region_1</label>
                                        <input type="text" readonly class="form-control" name='r0' value="<?php echo $regions[0]->name;?>" placeholder="">

                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r0', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r0'];}?></label>
                                    </li>
                                    <li>
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name='slug0' value="<?php echo $regions[0]->slug;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug0', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug0'];}?></label>
                                    </li>

                                    <li class="select-banner-image">
                                        <label>Select banner image (Recommended resolution 1920/1000)</label>
                                        <input class="form-control" name="banner0" id="Banner0" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->bannerImage ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        
                                    </li>

                                    <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map0" id="map0" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                   <!--  <li>
                                        <label>Add banner alt</label>
                                        <input class="form-control" name="banner_alt0" value="<?php echo $regions[0]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt0', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt0'];}?></label>
                                    </li> -->
                                    <li>
                                        <label>Select Overlay Color for Banner</label>
                                        <input class="form-control" value="<?php echo $regions[0]->color;?>" name="color0" id="color0" type="color">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color0', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color0'];}?></label>
                                    </li>
                                    <li class="full"><input type="submit" value="Save"></li>
                                </ul>
                                <ul class="banner-images">
                                      <?php if($regions[0]->bannerImage != ""){ ?>
                                    <li class="banner-del-<?php echo $regions[0]->id ?>">
                                         <h4>Banner Image</h4>
                                        <figure><a data-id="<?php echo $regions[0]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[0]->bannerImage ?>" alt=""></figure>
                                     
                                    </li>
                                <?php } ?>
                                    <li>
                                         <h4>Map Image</h4>
                                        <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[0]->map_image; ?>" alt=""></figure>
                                        
                                        
                                    </li>
                                </ul>
                            </form>

                            <form id="region2" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion2">

                                <ul>
                                    <li class="full">
                                        <div class="header" style="padding: 0px;">
                                            <h4 class="title">Region
                                                <?php echo $regions[1]->name;?> </h4>
                                        </div>
                                    </li>

                                    <li>
                                        <label>Region</label>
                                        <input type="text" readonly class="form-control" name='r2' value="<?php echo $regions[1]->name;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r2', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r2'];}?></label>
                                    </li>
                                    <li>
                                        <label>Slug </label>
                                        <input type="text" class="form-control" name='slug2' value="<?php echo $regions[1]->slug;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug2', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug2'];}?></label>
                                    </li>

                                    <li class="select-banner-image">
                                        <label>Select banner image (Recommended resolution 1920/1000)</label>
                                        <input class="form-control" name="banner2" id="Banner2" type="file">
                                        <?php if(!empty($regions[1]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[1]->bannerImage ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                     <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map1" id="map1" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                  <!--   <li>
                                        <label>Add banner alt</label>
                                        <input class="form-control" name="banner_alt2" value="<?php echo $regions[1]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt2', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt2'];}?></label>
                                    </li> -->
                                    <li>
                                        <label>Select Overlay Color for Banner</label>
                                        <input class="form-control" value="<?php echo $regions[1]->color;?>" name="color2" id="color2" type="color">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color2', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color2'];}?></label>
                                    </li>
                                   <!--   <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map2" id="map2" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li> -->
                                    <!-- <?php if(!empty($regions[1]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[1]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                    <li class="full"><input type="submit" value="Save"></li>

                                     
                                </ul>

                                 <ul class="banner-images">
                                    <?php if($regions[1]->bannerImage != ""){ ?>
                                     <li class="banner-del-<?php echo $regions[1]->id ?>">
                                         <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[1]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[1]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                    <?php } ?>        
                                            <li>
                                                <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[1]->map_image; ?>" alt=""></figure>
                                                 
                                                
                                            </li>
                                </ul>
                            </form>


                            <form id="region3" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion3">
                                <ul>
                                    <li class="full">
                                        <div class="header" style="padding: 0px;">
                                            <h4 class="title">Region
                                                <?php echo $regions[2]->name;?> </h4>
                                        </div>
                                    </li>

                                    <li>
                                        <label>Region</label>
                                        <input type="text" readonly class="form-control" name='r3' value="<?php echo $regions[2]->name;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r3', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r3'];}?></label>
                                    </li>
                                    <li>
                                        <label>Slug </label>
                                        <input type="text" class="form-control" name='slug3' value="<?php echo $regions[2]->slug;?>" placeholder="">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug3', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug3'];}?></label>
                                    </li>

                                    <li class="select-banner-image">
                                        <label>Select banner image (Recommended resolution 1920/1000)</label>
                                        <input class="form-control" name="banner3" id="Banner3" type="file">
                                        <?php if(!empty($regions[2]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[2]->bannerImage ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                     <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map3" id="map3" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                <!--     <li>
                                        <label>Add banner alt</label>
                                        <input class="form-control" name="banner_alt3" value="<?php echo $regions[2]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt3', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt3'];}?></label>
                                    </li> -->
                                    <li>
                                        <label>Select Overlay Color for Banner</label>
                                        <input class="form-control" value="<?php echo $regions[2]->color;?>" name="color3" id="color3" type="color">
                                        <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color3', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color3'];}?></label>
                                    </li>
                                    <!-- <?php if(!empty($regions[2]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[2]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                    <li class="full"><input type="submit" value="Save"></li>

                                     
                                </ul>
                                <ul class="banner-images">
                                     <?php if($regions[2]->bannerImage != ""){ ?>
                                     <li class="banner-del-<?php echo $regions[2]->id ?>">
                                         <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[2]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[2]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                     <?php } ?>        
                                            <li>
                                                 <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[2]->map_image; ?>" alt=""></figure>
                                                
                                                
                                            </li>
                                </ul>
                            </form>

                            <form id="region4" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion4">
                              
                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[3]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>Region</label>
                                            <input type="text" readonly class="form-control" name='r4' value="<?php echo $regions[3]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r4', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r4'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug4' value="<?php echo $regions[3]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug4', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug4'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner4" id="Banner4" type="file">
                                            <?php if(!empty($regions[3]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[3]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>

                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map4" id="map4" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                   <!--      <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt4" value="<?php echo $regions[3]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt4', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt4'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[3]->color;?>" name="color4" id="color4" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color4', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color4'];}?></label>
                                        </li>
                                        <!-- <?php if(!empty($regions[3]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[3]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                        <li class="full"><input type="submit" value="Save"></li>

                                        
                                    </ul>
                                    <ul class="banner-images">
                                          <?php if($regions[3]->bannerImage != ""){ ?>
                                         <li class="banner-del-<?php echo $regions[3]->id ?>">
                                              <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[3]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[3]->bannerImage ?>" alt=""></figure>
                                              
                                               
                                            </li>
                                         <?php } ?>            
                                            <li>
                                                <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[3]->map_image; ?>" alt=""></figure>
                                                 
                                                
                                            </li>
                                        </ul>
                                </form>

                                <form id="region5" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion5">

                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[4]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>Region</label>
                                            <input type="text" readonly class="form-control" name='r5' value="<?php echo $regions[4]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r5', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r5'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug5' value="<?php echo $regions[4]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug5', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug5'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner5" id="Banner5" type="file">
                                            <?php if(!empty($regions[4]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[4]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map5" id="map5" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                     <!--    <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt5" value="<?php echo $regions[4]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt5', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt5'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[4]->color;?>" name="color5" id="color5" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color5', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color5'];}?></label>
                                        </li>
                                        <!-- <?php if(!empty($regions[4]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[4]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                        <li class="full"><input type="submit" value="Save"></li>

                                         
                                    </ul>

                                    <ul class="banner-images">
                                     <?php if($regions[4]->bannerImage != ""){ ?>
                                         <li class="banner-del-<?php echo $regions[4]->id ?>">
                                             <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[4]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[4]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                         <?php } ?>        
                                             
                                            <li>
                                                 <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[4]->map_image; ?>" alt=""></figure>
                                                
                                                
                                            </li>
                                </ul>
                                </form>

                                <form id="region6" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion6">

                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[5]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>Region</label>
                                            <input type="text" readonly class="form-control" name='r6' value="<?php echo $regions[5]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r6', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r6'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug6' value="<?php echo $regions[5]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug6', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug6'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner6" id="Banner6" type="file">
                                            <?php if(!empty($regions[5]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[5]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map6" id="map6" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                      <!--   <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt6" value="<?php echo $regions[5]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt6', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt6'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[5]->color;?>" name="color6" id="color6" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color6', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color6'];}?></label>
                                        </li>
                                        <!-- <?php if(!empty($regions[5]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[5]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                        <li class="full"><input type="submit" value="Save"></li>

                                        
                                    </ul>
                                    <ul class="banner-images">
                                      <?php if($regions[5]->bannerImage != ""){ ?>
                                         <li class="banner-del-<?php echo $regions[5]->id ?>">
                                            <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[5]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[5]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                         <?php } ?>            
                                            <li>
                                                 <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[5]->map_image; ?>" alt=""></figure>
                                                
                                                
                                            </li>
                                </ul>
                                </form>

                                <form id="region7" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion7">

                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[6]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>Region</label>
                                            <input type="text" readonly class="form-control" name='r7' value="<?php echo $regions[6]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r7', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r7'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug7' value="<?php echo $regions[6]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug7', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug7'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner7" id="Banner7" type="file">
                                            <?php if(!empty($regions[6]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[6]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map7" id="map7" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                   <!--      <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt7" value="<?php echo $regions[6]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt7', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt7'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[6]->color;?>" name="color7" id="color7" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color7', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color7'];}?></label>
                                        </li>
                                        <!-- <?php if(!empty($regions[6]->bannerImage)){?>
                                            <li> <img style="width: 78px;" src="<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[6]->bannerImage ?>"> </li>
                                            <?php } ?> -->
                                        <li class="full"><input type="submit" value="Save"></li>

                                         
                                    </ul>
                                    <ul class="banner-images">
                                     <?php if($regions[6]->bannerImage != ""){ ?>
                                         <li class="banner-del-<?php echo $regions[6]->id ?>">
                                            <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[6]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[6]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                         <?php } ?>        
                                             
                                            <li>
                                                 <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[6]->map_image; ?>" alt=""></figure>
                                                
                                                
                                            </li>s
                                </ul>
                                </form>

                                <form id="region8" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion8">
                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[7]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>REGION</label>
                                            <input type="text" readonly class="form-control" name='r8' value="<?php echo $regions[7]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r8', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r8'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug8' value="<?php echo $regions[7]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug8', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug8'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner8" id="Banner8" type="file">
                                            <?php if(!empty($regions[7]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[7]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map8" id="map8" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                      <!--   <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt8" value="<?php echo $regions[7]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt8', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt8'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[7]->color;?>" name="color8" id="color8" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color8', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color8'];}?></label>
                                        </li>

                                        <li class="full"><input type="submit" value="Save"></li>

                                         
                                    </ul>
                                    <ul class="banner-images">
                                      <?php if($regions[7]->bannerImage != ""){ ?>   
                                         <li class="banner-del-<?php echo $regions[7]->id ?>">
                                             <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[7]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[7]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                         <?php } ?>            
                                            <li>
                                                 <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[7]->map_image; ?>" alt=""></figure>
                                                
                                                
                                            </li>
                                </ul>
                                </form>

                                <form id="region9" class="form-v region-form" method="post" style="display:none" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/updateRegion9">

                                    <ul>
                                        <li class="full">
                                            <div class="header" style="padding: 0px;">
                                                <h4 class="title">Region
                                                    <?php echo $regions[8]->name;?> </h4>
                                            </div>
                                        </li>

                                        <li>
                                            <label>REGION</label>
                                            <input type="text" readonly class="form-control" name='r9' value="<?php echo $regions[8]->name;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('r9', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['r9'];}?></label>
                                        </li>
                                        <li>
                                            <label>Slug </label>
                                            <input type="text" class="form-control" name='slug9' value="<?php echo $regions[8]->slug;?>" placeholder="">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('slug9', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['slug9'];}?></label>
                                        </li>

                                        <li class="select-banner-image">
                                            <label>Select banner image (Recommended resolution 1920/1000)</label>
                                            <input class="form-control" name="banner9" id="Banner9" type="file">
                                            <?php if(!empty($regions[8]->bannerImage)){?>
                                            <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[8]->bannerImage ?>');"></span>
                                            <?php } ?>
                                            <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                        </li>
                                         <li class="select-map-image">

                                        <label>Select map image (Recommended resolution 180/135)</label>
                                        <input class="form-control" name="map9" id="map9" type="file">
                                        <?php if(!empty($regions[0]->bannerImage)){?>
                                        <span style="background-image: url('<?php echo base_url() ?>/uploads/Banner/<?php echo $regions[0]->map_image ?>');"></span>
                                        <?php } ?>
                                        <label class="error" style="font-size: 12px !important;"><?php if ($this->session->flashdata('imageerror')!=""){echo $this->session->flashdata('imageerror');}?></label>
                                    </li>
                                    <!--     <li>
                                            <label>Add banner alt</label>
                                            <input class="form-control" name="banner_alt9" value="<?php echo $regions[8]->bannerAlt;?>" type="text" placeholder="Enter alt">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('banner_alt9', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['banner_alt9'];}?></label>
                                        </li> -->
                                        <li>
                                            <label>Select Overlay Color for Banner</label>
                                            <input class="form-control" value="<?php echo $regions[8]->color;?>" name="color9" id="color9" type="color">
                                            <label class="error"><?php if ($this->session->flashdata('error1')!="" && array_key_exists('color9', $this->session->flashdata('error1'))){echo $this->session->flashdata('error1')['color9'];}?></label>
                                        </li>

                                        <li class="full"><input type="submit" value="Save"></li>

                                         
                                    </ul>
                                    <ul class="banner-images">
                                     <?php if($regions[8]->bannerImage != ""){ ?>
                                         <li class="banner-del-<?php echo $regions[8]->id ?>">
                                             <h4>Banner Image</h4>
                                                <figure><a data-id="<?php echo $regions[8]->id ?>" href="#" data-toggle="tooltip" class="fa fa-trash del-banner" title="" data-original-title="Delete"></a><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[8]->bannerImage ?>" alt=""></figure>
                                               
                                               
                                            </li>
                                         <?php } ?>            
                                            <li>
                                                <h4>Map Image</h4>
                                                <figure><img src="<?php echo base_url(); ?>uploads/Banner/<?php echo $regions[8]->map_image; ?>" alt=""></figure>
                                                 
                                                
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
    $(document).ready(function () {
        // body...
     var val=$('#regionid').val();
     if(val!='')
     {
          $('#region'+val).css('display','block');
     }
                  $('#add_home').on('submit', function(){
                         var data = $('.note-editable').html();
                        $('#description').val(data);               
                    });
          
            $('#regionid').on('change', function(){
                var val=$('#regionid').val();
                 $('.form-v').css('display','none');
                $('#region'+val).css('display','block');
                });



                //get images againt region
                    $('#regionid').on('change', function(){

                    var base_urlLocal='<?php echo base_url();?>';
                        var id = $('#regionid').val() ;

                          $.ajax({

                           url: base_urlLocal+"/admin/InformationalController/region_images",
                           type: 'POST',
                           data: {id: id},
                           dataType:'json',
                           error: function() {
                              alert('Something is wrong');
                           },
                           success: function(data1) {
                           
                            // $('.del-fig-'+id).remove() ;
                       }
                            });

                    });
                //end images againt region



                //delete banner image
                $('.del-banner').on('click', function(e){

                    e.preventDefault() ;

          var base_urlLocal='<?php echo base_url();?>';

          var id = $(this).attr('data-id') ;

           $.confirm({

                  title: "Are you sure ?",
                   content: "You want to delete this image",
                  buttons: {
                      confirm: function () {

                          $.ajax({

                           url: base_urlLocal+"/admin/InformationalController/del_banner_image",
                           type: 'POST',
                           data: {id: id},
                           dataType:'json',
                           error: function() {
                              alert('Something is wrong');
                           },
                           success: function(data1) {
                            $('.banner-del-'+id).remove() ;
                       }
                            });

                      },
                      cancel: function () {
                        //  $.alert('Canceled!');
                      },
                    
                  }
            });


          
        })
                //end delete banner image


            })
</script>