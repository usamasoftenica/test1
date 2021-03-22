<div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>assets/images/sub-header-img.jpg');">
        <span class="ccg-subheader-transparent" style="background-color: #fff;"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Regions</h1>
                    <ul class="ccg-breadcrumb">
                        <li><a href="<?php echo base_url();?>">Home Page</a></li>
                        <li>Maps</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--// Subheader \\-->

    <!--// Main Content \\-->
    <div class="ccg-main-content">

        <!--// Main Section \\-->
        <div class="ccg-main-section explorefull">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-wrap">
                            <div style="margin: 0px 0px 20px;" class="ccg-fancy-title">
                                <h2>Select a region to explore the Campgrounds and Campsites.</h2>
                               
                            </div>
                            <div class="ccg-tour ccg-tour-modern">
                                <ul>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[0]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[0]->slug;?> " style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[0]->map_image?>');"><i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[0]->slug;?>"><?php echo $homeRegion[0]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[6]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[6]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[6]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[6]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/2.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[6]->slug;?>"><?php echo $homeRegion[6]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[2]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[2]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[2]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[2]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/3.png');">
                                            <i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[2]->slug;?>"><?php echo $homeRegion[2]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[7]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[7]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[7]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[7]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/4.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[7]->slug;?>"><?php echo $homeRegion[7]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[4]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[4]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[4]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[4]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/5.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[4]->slug;?>"><?php echo $homeRegion[4]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[8]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[8]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[8]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[8]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/6.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[8]->slug;?>"><?php echo $homeRegion[8]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                           <?php if(!empty($homeRegion[1]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[1]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[1]->map_image?>')">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[1]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/7.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[1]->slug;?>"><?php echo $homeRegion[1]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <?php if(!empty($homeRegion[5]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[5]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[5]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[5]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/8.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[5]->slug;?>"><?php echo $homeRegion[5]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                           <?php if(!empty($homeRegion[3]->map_image)){ ?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[3]->slug;?>" style="background-image: url('<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[3]->map_image?>');">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        <?php }else{?>
                                            <a href="<?php echo base_url();?>region/<?php echo $homeRegion[3]->slug;?>" style="background-image: url('<?php echo base_url();?>assets/images/9.png');"><i class="fa fa-link"></i>
                                            </a>
                                            <?php } ?>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="<?php echo base_url();?>region/<?php echo $homeRegion[3]->slug;?>"><?php echo $homeRegion[3]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
    <!--// Main Content \\-->


 