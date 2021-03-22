    <!--// Main Banner \\-->

        <div class="ccg-banner">
            <!-- <span class="banner-layer-transparent"></span> -->
            <div class="ccg-banner-slide">
               <!--  <div class="ccg-banner-layer" style="background-image: url('<?php //echo base_url();?>assets/images/banner-1.jpg');">
                    <div class="ccg-banner-caption"> <div class="container"><a href="#down" class="bottom-scroll"> Scroll Down <i class="fa fa-angle-down"></i></a> </div> </div>
                </div> -->
                <?php if(!empty($homeImages)){ foreach ($homeImages as $key => $value) {
                    # code...
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
         
        <!--// Main Banner \\-->

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
                            <div class="ccg-table">
                                <div class="ccg-table-cell">
                                    <div class="welcome-note-wrap">
                                        
                                        <?php echo $homeContent[0]->description;?>
                                    
                                       <!--  <div class="welcome-note">
                                            <h2>Welcome to Colorado Campgrounds!</h2>
                                            <span>- What you need to know</span>
                                            <p>Peggy & Steve Hendryx reside in the Colorado Mountains, drawn to the State by its outdoon activities, blue skies, and sheer beauty.</p>
                                            <p>After purchasing a teardrop camper in 2016, we began toexplore the corners of Colorado, marveling at its diverse geography, plant/wildlife, and vistas. We quickly discovered that finding the optimum campground and campsite was a challenge. the books and inline websites didn't capture the true essence of a campground or site, leading us to the creation of our companion web- and YouTube site.</p>
                                        </div> -->
                                       <!--  <div class="ccg-post-wrap">
                                            <div class="ccg-fancy-title">
                                                <h2>What's different about our site?</h2>
                                            </div>
                                            <ul class="list-three">
                                                <li><a href="#">We have visited every campground we review</a></li>
                                                <li><a href="#">We provide pictures and site details of camp sites in the campgrounds so you can make an informed reservation</a></li>
                                                <li><a href="#">Through a link to our YouTube channel, we provide video of the main campground roads as well as the campground facilities.</a></li>
                                                <li><a href="#">We provide a list of important local amenities, e.g. grocery store, pharmacy, propane retailers, fire & police departments etc.</a></li>
                                                <li><a href="#">We provide our top site picks for each campground</a></li>
                                            </ul>
                                            <span>With over 1,000 campgrounds in colorado,.....</span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fadeRight" data-t-show="3">
                            <img src="<?php echo base_url();?>assets/images/welcome.jpg" alt="" class="welcome-img">
                            <!-- <ul class="services">
                                <li><a href="#"><i class="icon-summer ab"></i><i class="icon-summer"></i> Campsite Information</a></li>
                                <li><a href="#"><i class="icon-fire ab"></i><i class="icon-fire"></i> Tips and tricks</a></li>
                                <li><a href="#"><i class="icon-draw ab"></i><i class="icon-draw"></i> Discussion Forum</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            <!--// Main Section \\-->
            <div class="ccg-main-section ccg-tour-full">
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
                                        <figure><a href="#">
                                            <?php if(!empty($homeRegion[0]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[0]->bannerImage?>" alt="<?php echo $homeRegion[0]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/1.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[0]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="2">
                                        <figure><a href="#">
                                             <?php if(!empty($homeRegion[6]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[6]->bannerImage?>" alt="<?php echo $homeRegion[6]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/2.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[6]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="3">
                                        <figure><a href="#">
                                            <?php if(!empty($homeRegion[2]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[2]->bannerImage?>" alt="<?php echo $homeRegion[2]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/3.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[2]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="4">
                                        <figure><a href="#">
                                            <?php if(!empty($homeRegion[7]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[7]->bannerImage?>" alt="<?php echo $homeRegion[7]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/4.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[7]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="5">
                                        <figure><a href="#">
                                            <?php if(!empty($homeRegion[4]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[4]->bannerImage?>" alt="<?php echo $homeRegion[4]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/5.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[4]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="6">
                                        <figure><a href="#">
                                           <?php if(!empty($homeRegion[8]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[8]->bannerImage?>" alt="<?php echo $homeRegion[8]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/6.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[8]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="7">
                                        <figure><a href="#">
                                           <?php if(!empty($homeRegion[1]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[1]->bannerImage?>" alt="<?php echo $homeRegion[1]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/7.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[1]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="8">
                                        <figure><a href="#">
                                            <?php if(!empty($homeRegion[5]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[5]->bannerImage?>" alt="<?php echo $homeRegion[5]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/8.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[5]->name; ?></a></h5>
                                            </div>
                                        </figure>
                                    </li>
                                    <li class="fadeIn" data-t-show="9">
                                        <figure><a href="#">
                                           <?php if(!empty($homeRegion[3]->bannerImage)){ ?>
                                                <img src="<?php echo base_url();?>uploads/Banner/<?php echo $homeRegion[3]->bannerImage?>" alt="<?php echo $homeRegion[3]->bannerAlt?>"><i class="fa fa-link"></i>
                                        <?php }else{?>
                                            <img src="<?php echo base_url();?>assets/images/9.png" alt=""><i class="fa fa-link"></i>
                                            <?php } ?>
                                        </a>
                                            <div class="ccg-tour-modern-text">
                                                <h5><a href="#"><?php echo $homeRegion[3]->name; ?></a></h5>
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
                                        <li><a href="<?php echo base_url();?>/login"><?php echo $info->name ?></a></li>
                                    <?php } else{?>
                                            <li><a href="<?php echo base_url();?>/<?php echo $info->slug;?>"><?php echo $info->name ?></a></li>
                                    <?php }} ?>
                                       
                                    </ul>
                                </section>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            <!--// Main Section \\-->
            <div class="ccg-main-section call-to-actionfull fadeIn" data-t-show="2">
                <span class="post-transpernt"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="call-to-action">
                                <p>Take a peek of what's inside!</p>
                                <a href="#" class="simple-btn">Check Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

            <!--// Main Section \\-->
            <div class="ccg-main-section ccg-blog-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="ccg-fancy-title">
                                <h2>Latest From Our Blog</h2>
                            </div>
                            <div class="ccg-blog ccg-blog-modern">
                                <ul class="row">
                                    <li class="col-md-4 fadeLeft" data-t-show="3">
                                        <figure><a href="blog-detail.html"><img src="<?php echo base_url();?>assets/images/blog-modern-img1.jpg" alt=""><i class="fa fa-link"></i></a></figure>
                                        <div class="ccg-blog-modern-text">
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                            <h5><a href="blog-detail.html">Thailand Special Places</a></h5>
                                            <ul class="ccg-blog-option">
                                                <li><a href="blog-detail.html"><i class="fa fa-comment-o"></i> 29 Comments</a></li>
                                                <li><a href="blog-detail.html"><i class="fa fa-user"></i> John Layfield</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-md-4 fadeLeft" data-t-show="4">
                                        <figure><a href="blog-detail.html"><img src="<?php echo base_url();?>assets/images/blog-modern-img2.jpg" alt=""><i class="fa fa-link"></i></a></figure>
                                        <div class="ccg-blog-modern-text">
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                            <h5><a href="blog-detail.html">The Santa Barbara Wildfire</a></h5>
                                            <ul class="ccg-blog-option">
                                                <li><a href="blog-detail.html"><i class="fa fa-comment-o"></i> 29 Comments</a></li>
                                                <li><a href="blog-detail.html"><i class="fa fa-user"></i> John Layfield</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-md-4 fadeLeft" data-t-show="5">
                                        <figure><a href="blog-detail.html"><img src="<?php echo base_url();?>assets/images/blog-modern-img3.jpg" alt=""><i class="fa fa-link"></i></a></figure>
                                        <div class="ccg-blog-modern-text">
                                            <time datetime="2008-02-14 20:00">21 AUG</time>
                                            <h5><a href="blog-detail.html">A Quote Post for Vestibulu</a></h5>
                                            <ul class="ccg-blog-option">
                                                <li><a href="blog-detail.html"><i class="fa fa-comment-o"></i> 29 Comments</a></li>
                                                <li><a href="blog-detail.html"><i class="fa fa-user"></i> John Layfield</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="center"><a href="blogs.html" class="simple-btn">View More Blogs</a></div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>
        <!--// Main Content \\-->