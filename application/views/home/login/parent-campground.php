 <div class="ccg-main-wrapper">
  
        <!--// Header \\-->

    <!--// Subheader \\-->
    <?php if(!empty($region[0]->bannerImage)){ ?>
    <div class="ccg-subheader" style="background-image: url('<?php echo base_url(); ?>uploads/Banner/<?php echo $region[0]->bannerImage; ?>');">
    <?php }else{ ?>
  <div class="ccg-subheader">
  <?php } ?>
            <span class="ccg-subheader-transparent" style="background-color: <?php echo $region[0]->color; ?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $region[0]->rname; ?></h1>
                       <!--  <ul class="ccg-breadcrumb">
                            <li><a href="index.html">Home Page</a></li>
                            <li>Campgrounds</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    <!--// Subheader \\-->

    <!--// Main Content \\-->
    <div class="ccg-main-content">
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iconModalLabel">Description for Icons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="icons-modal">
            <table>
                <tr>
                    <th>
                        <span style="text-align: center;">Column 1</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 2</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 3</span>
                    </th>
                      <th>
                        <span style="text-align: center;">Column 4</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 5</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 6</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 7</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 8</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 9</span>
                    </th>
                </tr>
                <tr>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Mountains.png" alt=""> Mountains</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Lake.png" alt=""> Lake</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_26_05_50_07.png" alt=""> River/Creek</span>
                        <!-- <span><img src="<?php echo base_url(); ?>assets/images/icons/prairie.png" alt=""> Prairie</span> -->
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Hills.png" alt=""> Hills</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_26_05_48_58.png" alt=""> Meadow</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Wood.png" alt=""> Woods</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Tent.png" alt=""> Tent</span>
                        <!-- <span><img src="<?php echo base_url(); ?>assets/images/icons/Trailer.png" alt=""> Trailer</span> -->
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/2019_11_06_04_46_40.png" alt=""> Trailer</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/RV.png" alt=""> RV</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/guests.png" alt=""> Guests</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Pets.png" alt=""> Pets</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Car.png" alt=""> Vehicle</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt=""> Length</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Level.png" alt=""> Level</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Base.png" alt=""> Base</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_04_02_12_13_28.jpg" alt=""> Grass</span>
                    </th>
                    <th>
                        <span><img style="width: 30px;" src="<?php echo base_url(); ?>uploads/SideParameter/2019_07_22_12_34_23.png" alt="">Back-in</span>
                        <span><img style="width: 30px;" src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_27_04_45_06.png" alt="">Pull-through</span>
                         <span><img style="width: 30px;" src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_27_03_03_50.png" alt="">Pull-in</span>
                         <span><img style="width: 30px;" src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_04_42_29.png" alt="">Hike-to</span>
                    </th>
                    <!-- here -->
                    <th>
                        <span><img style="width: 30px;" src="<?php echo base_url(); ?>assets/images/icons/plug.png" alt=""> Electricity</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/Water.png" alt=""> Water</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Sewer.png" alt=""> Sewer</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Wifi.png" alt=""> Wifi</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_07_03_34.png" alt=""> Cable TV</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Phone.png" alt=""> Phone</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Sun.png" alt=""> Sun</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Shade.png" alt=""> Shade</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Partial-Shade.png" alt=""> Partial Shade</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Table.png" alt=""> Table</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/FireRing.png" alt=""> Fire-ring</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/FireRing-Grill.png" alt=""> FireRing Grill</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Grill.png" alt=""> Grill</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Shelter.png" alt=""> Shelter</span>
                         <span><img src="<?php echo base_url(); ?>assets/images/icons/Tent-Pad.png" alt=""> Tent Pad</span>
                        <!-- <span><img src="images/icons/Tent-Pad.png" alt=""> Tent Pad</span> -->
                    </th>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

            <div class="fixed-btn">
                <a href="#iconModal" data-toggle="modal" class="fixed-button">Click for Icon descriptions</a>
                <a href="javascript:void(0)" class="fa fa-long-arrow-right close-btn"></a>
                <!-- <a href="javascript:void(0)" class="fa fa-long-arrow-right open-btn"></a> -->
            </div>

  
            <!--// Main Section \\-->
            <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                                <ul class="nav nav-tabs">
                                  <?php $cid=array();foreach ($region as $key => $value) {
                                    # code...
                                   
                                      $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.parentId = parentcampground.p_id','inner']);
                                      $where = array('parentcampground.p_id' => $value->p_id );
                                      $ordeByCom= array(
                                                '0'=>['childcampground.c_id','desc'],
                                                );
                                      $child = $this->Campgrounds->find("parentcampground",$where,'','',1,$join,'',$select,$ordeByCom);

                                   
                                     
                                   ?>
                                  <li class="nav-item">
                                    <!-- <a class="click-drop nav-link active" href="<?php echo base_url();?>parent-campground/<?php echo $value->slug; ?>"><?php echo $value->name; ?></a>
                                     -->
                                      <a class="click-drop drop-ar new-details-parent nav-link"  data-id="<?php echo $value->slug; ?>" href="<?php echo base_url();?>parent-campground/<?php echo $value->slug; ?>"><?php echo $value->name; ?></a>
                                      
                                          <span class="arrow-drop fa fa-angle-down arrow-click"></span>
                                                  <span class="arrow fa fa-angle-up arrow-click"></span>
                                        <input type="hidden" class="data-id-<?php echo $value->slug; ?>" name="name" value="<?php echo htmlspecialchars($value->description); ?>">
                                    <ul class="nav nav-tabs drop">
                                      <?php   foreach ($child as $key => $ch) {
                                        $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.c_id = sitedescription.childId','inner']);
                                      $where = array('sitedescription.childId' => $ch->c_id );
                                      $ordeByCom= array(
                                                '0'=>['sitedescription.siteId','desc'],
                                                );
                                      $site = $this->Campgrounds->find("sitedescription",$where,'','',1,$join,'',$select,$ordeByCom);
                                    
                                       $cid[]=$ch->c_id;
                                       # code... ?>
                                        <input type="hidden" name="p_id" value="<?php echo $value->p_id; ?>" id="p_id">
                                       <!--  <input type="hidden" name="c_id" id="c_id" value="<?php //echo $ch->c_id;?>" > -->
                                        <li><a class="nav-link" href="<?php echo base_url();?>child-campground/<?php echo $ch->cslug; ?>"><?php echo $ch->c_name;?></a>
                                            <ul class="nav nav-tabs sub drop">
                                              <?php foreach ($site as $key => $sit) {
                                                # code...
                                               ?>
                                                <li><a class="nav-link site-parent"  data-id="<?php echo $ch->c_id; ?>" data-id-pr="<?php echo $value->p_id; ?>" href="javascript:void(0)"><?php echo $sit->site_no; ?></a></li>
                                              <?php } ?>
                                            </ul>
                                        </li>
                                      <?php } $callid=implode(',', $cid);  ?>
                                      <input type="hidden" name="p_id" value="" id="p_id">
                                       <input type="hidden" name="c_id" id="c_id" value="" >
                                      <input type="hidden" name="call_id" id="call_id" value="<?php echo $callid;?>" >
                                    </ul>
                                  </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                          <a href="<?php echo base_url();?>#map-site" style="margin: 0px 0px 5px" class="btn btn-primary pull-right">Back to Colorado Map</a>
                          <div class="clearfix"></div>
                            <div class="campground-map scroll">
                              <?php if(!empty($region)){ ?>

                                <div class="campground-site-detail">
                                  <ul>
                                    <li>
                                      <!-- <strong>Page Title:</strong> -->
                                      <p id="p-title"></p>
                                    </li>

                                
                                    <li id="y_link">

                                      <strong>Youtube Video:</strong>
                                      <iframe id="youtube_custom" class="youtube-video" src="https://www.youtube.com/" frameborder="0" allowfullscreen></iframe>
                                    </li>

                            
                                    <li id="m-ggl">
                                      <strong>Map:</strong>
                                      <a href="" target="_blank" id="map-custom">
                                        
                                      </a>
                                     
                                    
                                    </li>
                                
                                  </ul>
                                </div>
                              <?php }else{ ?>
                                  <p>No campground found.</p>
                              <?php } ?>
                                <div class="campground-map-detail">
                                   <!--  <img src="images/blog-thumb-img.jpg" alt=""> -->
                                    <div class="parent-cc">
                                    <p><?php echo $parents[0]->description; ?></p>
                                    
                                  </div>

                          

                                   <div id="test-data" style="display: none;">

                                     <table class="detail" id="site-data">
                                        <tr>
                                            <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View</span></th>
                                            <th><span>Tent</span><span>Trailer</span><span>RV</span><span>#Guests</span><span>Pets</span><span>#Cars</span></th>
                                            <th><span>Length</span> <span>Grade</span> <span>Base</span></th>
                                            <th><span>Access</span></th>
                                            <th><span>Elec</span><span>Amps</span></th>
                                            <th><span>Water</span> <span>Sewer</span></th>
                                            <th><span>Wifi</span><span>Cable TV</span><span>Service Provider</span></th>
                                            <th><span>Shade</span><span>Partial Shade</span><span>Sunny</span></th>
                                            <th><span>Table</span> <span>Firing </span> <span>Grill</span></th>
                                            <th><span>Yrds to</span><span>Toilet</span><span>Water</span><span>Trash</span></th>
                                        </tr>
                                        <!-- pickup id and do pagination using jquer on this page -->
                                         <tbody id="htmlShow">
                    
                    
                                              </tbody>
                                             
                                     
                                    </table>
                                  </div>
                                        <ul id="campsites-paginate-1" class="pagination" style="display: none;"></ul>
                                  
                                   <!--  <strong>Lorem Ipsum is simply dummy:</strong>
                                    <ul class="list-two">
                                        <li>Black Canyon</li>
                                        <li>Pocky Mountain National Park</li>
                                        <li>Great Sand Dunes National Park</li>
                                        <li>Mesa Verde National Park</li>
                                    </ul> -->
                                </div>
                            </div>
                           <!--  <div class="comments-area">
                             
                              <div class="ccg-section-heading"><h2>Comments</h2></div>
                              <ul class="comment-list">
                                 <li>
                                    <div class="thumb-list">
                                       <figure><img alt="" src="images/comment-img1.jpg">
                                          <a class="comment-reply-link" href="#">Reply</a>
                                       </figure>
                                       <div class="text-holder">
                                          <h6>George Smith</h6>
                                          <a class="comment-reply-link" href="#">Delete</a>
                                          <time class="post-date" datetime="">Jun 11, 2019</time>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>
                                       </div>
                                    </div>
                                    <ul class="children">
                                       <li>
                                          <div class="thumb-list">
                                             <figure><img alt="" src="images/comment-img2.jpg"></figure>
                                             <div class="text-holder">
                                                <h6>Harold K. Horton </h6>
                                                <a class="comment-reply-link" href="#">Delete</a>
                                                <time class="post-date" datetime="">Jun 11, 2019</time>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci variu natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristiq di sodales aliquam.</p>
                                             </div>
                                          </div>
                                       </li>
                                     
                                    </ul>
                                    <div class="thumb-list">
                                       <figure><img alt="" src="images/comment-img3.jpg">
                                          <a class="comment-reply-link" href="#">Reply</a>
                                       </figure>
                                       <div class="text-holder">
                                          <h6>Emma Stone</h6>
                                          <a class="comment-reply-link" href="#">Delete</a>
                                          <time class="post-date" datetime="">Jun 11, 2019</time>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>
                                       </div>
                                    </div>
                                   
                                 </li>
                              </ul>
                              
                              <div class="comment-respond">
                                 <div class="ccg-section-heading"><h2>Post A Comment</h2></div>
                                 <form>
                                    <p>
                                       <input type="text" placeholder="Your Name">
                                       <i class="fa fa-user"></i>
                                    </p>
                                    <p>
                                       <input type="email" placeholder="Enter Your Email">
                                       <i class="fa fa-envelope"></i>
                                    </p>
                                    <p class="ccg-full-form">
                                       <textarea name="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                       <i class="fa fa-comment"></i>
                                    </p>
                                    <p class="form-submit"><input value="Post Now" type="submit"> <input name="comment_post_ID" value="99" id="comment_post_ID" type="hidden">
                                    </p>
                                 </form>
                              </div>
                            
                           </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

    </div>
    <!--// Main Content \\-->

        <!--// Footer \\-->
      
        <!--// Footer \\-->

  <div class="clearfix"></div>
    </div>

    <div class="colorado-popup-box">
    <a href="javascript:void(0)" class="popup-off fa fa-times"></a>
    <ul>
        <li><i class="fa fa-eercast"></i> <h4>Hover cursor over icons for key information.</h4></li>
    </ul>
</div>
               <script type="text/javascript">
    $('.popup-off').click(function () {
        $('.colorado-popup-box').hide('slow');
    });

    $('.close-btn').click(function () {
            $('.fixed-btn').toggleClass('active');
            $(this).toggleClass('active');
        });
  </script>