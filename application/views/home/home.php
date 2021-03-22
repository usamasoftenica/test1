    <!--// Main Banner \\-->
        <div class="ccg-banner">
            <div class="ccg-banner-slide">
                <?php if(!empty($homeImages)){ foreach ($homeImages as $key => $value) {
                 ?>
                <div class="ccg-banner-layer" style="background-image: url('<?php echo base_url();?>uploads/homebanner/<?php echo $value->image_name; ?>');">
                    <div class="ccg-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1><?php echo $value->banner_heading; ?></h1>
                                    <div class="clearfix"></div>
                                    <a href="#down" class="bottom-scroll"> Scroll Down <i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } }else{?>
                         <div class="ccg-banner-layer" style="background-image: url('<?php echo base_url();?>assets/images/banner-1.jpg');">
                    <div class="ccg-banner-caption"> <div class="container"><a href="#down" class="bottom-scroll"> Scroll Down <i class="fa fa-angle-down"></i></a> </div> </div>
                </div>
                <div class="ccg-banner-layer" style="background-image: url('<?php echo base_url();?>assets/images/maroon-bells.jpg');">
                    <div class="ccg-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Welcome to Colorado Campgrounds</h1>
                                    <div class="clearfix"></div>
                                    <a href="#down" class="bottom-scroll"> Scroll Down <i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

    <div class="ccg-main-section counter-wrapfull">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo base_url();?>assets/images/footer-logo.png" alt="">
                </div>
                <div class="col-md-9">
                    <div class="counter-wrap">
                        <ul>
                            <li class="zoomOut" data-t-show="2">
                                <h3>Number of Campgrounds Reviewed</h3>
                                <div class='numscroller' data-min='1' data-max='<?php echo $parent ?>' data-delay='5' data-increment='10'><?php echo $parent ?></div>
                            </li>
                            <li class=" zoomOut" data-t-show="5">
                                <h3>Number of Campsites <br> Reviewed</h3>
                                <div class='numscroller' data-min='1' data-max='<?php echo $campsite ?>' data-delay='5' data-increment='10'><?php echo $campsite ?></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!--// Main Content \\-->
        <div class="ccg-main-content" style="padding-bottom: 0px;" id="down">
               <?php if($this->session->flashdata('success1')!=""){  ?>
                                           <div class="alert alert-success">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong><?php echo $this->session->flashdata('success1'); ?></strong> 
                                                      
                                                  </div>
                                            <?php } ;?>

            <!--// Main Section \\-->
             <div class="ccg-main-section welcome-note-full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 fadeLeft" data-t-show="3">
                            <div class="welcome-note-wrap">
                                <div class="welcome-note">
                                    <?php echo $homeContent[0]->description;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fadeRight" data-t-show="3">
                            <?php if(!empty($home_image)){?>
                                <figure class="welcome-img" style="background-image: url('<?php echo base_url();?>uploads/homebanner/<?php echo $home_image[0]->image;?>');"></figure>
                                

                            <?php }else{ ?>
                                <figure class="welcome-img" style="background-image: url('<?php echo base_url();?>assets/images/welcome.jpg');"></figure>
                        <?php } ?>
                        </div>
                    </div>





                </div>
            </div>
            <div class="ccg-main-section ccg-tour-full" id="map-site">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="margin: 0px 0px 20px;" class="ccg-fancy-title">
                                <h2>Find Your Campsite in Colorado</h2>
                                <p>The map below divides Colorado into nine geographic areas.  Click on the area you want to explore.</p>
                            </div>
                            <div class="ccg-tour ccg-tour-modern">
                                <ul>
                                    <li class="fadeIn" data-t-show="1">

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
                                    <li class="fadeIn" data-t-show="2">
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
                                    <li class="fadeIn" data-t-show="3">
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
                                    <li class="fadeIn" data-t-show="4">
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
                                    <li class="fadeIn" data-t-show="5">
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
                                    <li class="fadeIn" data-t-show="6">
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
                                    <li class="fadeIn" data-t-show="7">
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
                                    <li class="fadeIn" data-t-show="8">
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
                                    <li class="fadeIn" data-t-show="9">
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
                        <div class="col-md-6 fadeLeft" data-t-show="3">
                            <div class="ccg-post-wrap">
                                <div class="ccg-fancy-title" style="margin: 0px 0px 40px;">
                                    <h2>Important Information Pages:</h2>
                                </div>
                                <section>
                                    <ul class="list-one">
                                         <?php foreach ($information as $key => $info) {?>
                                            <?php if(!isset($this->session->userdata['userdata']['id'])){ ?>
                                        <!-- <li><a href="<?php //echo base_url();?>/information/<?php //echo $info->slug;?>"><?php //echo $info->name ?></a></li> -->
                                        <li><a href="<?php echo base_url();?>login"><?php echo $info->name ?></a></li>
                                    <?php } else{?>
                                            <li><a href="<?php echo base_url();?>information-pages/<?php echo $info->slug;?>"><?php echo $info->name ?></a></li>
                                    <?php }} ?>
                                        <?php if (empty($information)) {?>
                                            <span style="display: block;text-align: center;">No information page Found</span>                                        <?}else {?>
                                        <?php  }?>
                                    </ul>
                                </section>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            <!--// Main Section \\-->
            <?php if(empty($this->session->userdata['userdata']['id'])){ ?>
            <div class="ccg-main-section call-to-actionfull fadeIn" data-t-show="2">
                <span class="post-transpernt"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="call-to-action">
                                <p>Take a peek of what's inside!</p>
                                <a href="<?php echo base_url(); ?><?php echo $campground[0]->slug ?>" class="simple-btn">Check Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
            <!--// Main Section \\-->

            <!--// Main Section \\-->
            <div class="ccg-main-section ccg-blog-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="ccg-fancy-title">
                                <h2>Latest From Our Blog</h2>
                            </div>
                            <div class="ccg-blog ccg-blog-modern newsforhome">
                                <ul class="row">
                                    <?php if (empty($blogs)){  ?>
                                    <li class="col-md-12" style="text-align: center">
                                        <b>No Blog Found</b>
                                    </li>
                                    <?php }foreach ($blogs as $blog) { ?>
                                        <li class="col-md-6">
                                            <div class="blog-grid-wrapper">
                                                <?php if($blog->blog_image != ""){ ?>
                                            <figure><a href="<?php echo base_url(); ?>home/blog-detail/<?php echo $blog->blog_slug ?>" style="background-image: url('<?php echo base_url();?>uploads/blog/<?php echo $blog->blog_image ?>')"><i class="fa fa-link"></i></a></figure>
                                        <?php }else{ ?>
                                            <figure><a href="<?php echo base_url(); ?>home/blog-detail/<?php echo $blog->blog_slug ?>" style="background-image: url('<?php echo base_url();?>uploads/userImages/2019_12_04_01_14_25.jpg')"><i class="fa fa-link"></i></a></figure>
                                        <?php } ?>
                                            <div class="ccg-blog-modern-text">
                                                <time datetime="2008-02-14 20:00">
                                                    <?php $yrdata= strtotime($blog->created_at);
                                                    echo date('M-d', $yrdata);
                                                    ?>
                                                </time>
                                                <h5><a href="<?php echo base_url(); ?>home/blog-detail/<?php echo $blog->blog_slug ?>">
                                                        <?php if(strlen($blog->blog_title) < 50 )
                                                        {echo $blog->blog_title ;}
                                                        else
                                                        {
                                                            echo substr($blog->blog_title,0,50)."...";
                                                        }?>
                                                        </php></a></h5>
                                            </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="center"><a href="<?php echo base_url(); ?>blog-brows" class="simple-btn">View More Blogs</a></div>
                        </div>
                        <div class="col-md-6">
                            <div class="ccg-fancy-title">
                                <h2>Newsletters</h2>
                            </div>
                            <div class="ccg-newsletter-wrap newsforhome">
                                <ul class="row">
                                    <!-- Newsletter -->
                                    <?php foreach($newsletters as $newsletter){?>
                                    <li class="col-md-6">
                                        <div class="newsletter-text-wrap">
                                            <?php if(!isset($this->session->userdata['userdata']['id'])){?>
                                            <a href="javascript:void(0)">
                                             <?php }
                                             else{?>
                                                <a href="<?php echo base_url().'uploads/newsletter/'.$newsletter->pdf_file; ?>">
                                            <?php }?>
                                                
                                                <figure style="background-image: url('<?php echo base_url().'uploads/newsletter/'.$newsletter->image; ?>');"></figure>
                                                <span class="pdf-img" style="background-image: url('<?php echo base_url(); ?>/assets/images/pdf.png');"></span>
                                                <h2><?php
                                                    if(strlen($newsletter->title) < 50){
                                                        echo $newsletter->title;
                                                    }
                                                    else
                                                        {
                                                            echo substr($newsletter->title,0,50)."...";
                                                    }


                                                    ?></h2>
                                                <?php if(strlen($newsletter->description) < 50){?>
                                                <p><?php echo $newsletter->description?></p>
                                            <?php }else{?>
                                                <p><?php echo substr($newsletter->description,0,50)."..."?></p>
                                            <?php }?>
                                            </a>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="center">
                      
                                <a href="<?php echo base_url(); ?>newsletters" class="simple-btn">View More Newsletter</a>
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->
