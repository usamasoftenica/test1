<!--// Main Wrapper \\-->
<input type="hidden" name="site_on"  value="<?php echo $site_auto ?>">
    <div class="ccg-main-wrapper">

    <!--// Subheader \\-->
      <?php if( !empty($region) ) { ?>
     <?php if(!empty($region[0]->bannerImage) ){ ?>

       <?php $url= base_url(uri_string());?>
  <div class="ccg-subheader" style="background-image: url('<?php echo base_url(); ?>uploads/Banner/<?php echo $region[0]->bannerImage; ?>');">
  <?php }else{ ?>
  <div class="ccg-subheader">
  <?php } ?>
            <span class="ccg-subheader-transparent" style="background-color: <?php if($url == "http://www.coloradocampgrounds.development-env.com/example-campground-campsite"){ echo "green" ; }else{echo $region[0]->color;}   ?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                      <?php if($url == "http://www.coloradocampgrounds.development-env.com/example-campground-campsite"){ ?>
                         <h1>Example Campground</h1>
                      <?php }else {?>
                           <h1><?php echo $region[0]->rname; ?></h1>
                      <?php } ?>
                       <!--  <ul class="ccg-breadcrumb">
                            <li><a href="index.html">Home Page</a></li>
                            <li>Campgrounds</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
      <?php  }?>
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
                        <?php foreach ($views as $view ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $view->view_image ?>" alt=""> <?php echo $view->view_name ?></span>

                        <?php } ?>
                        <span><img src="<?php echo base_url(); ?>assets/images/icon-01.png" alt=""> Map Pindrop</span>
                    </th>
                    <th>
                        <?php foreach ($campings as $camping ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $camping->camping_image ?>" alt=""> <?php echo $camping->camping_name ?></span>

                        <?php } ?>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/guests.png" alt=""> Guests</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Pets.png" alt=""> Pets</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Car.png" alt=""> Vehicle</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt=""> Length</span>
                        <?php foreach ($grades as $grade ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $grade->grade_image ?>" alt=""> <?php echo $grade->grade_name ?></span>

                        <?php } ?>
                        <?php foreach ($bases as $base ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $base->base_image ?>" alt=""> <?php echo $base->base_name ?></span>

                        <?php } ?>

                    </th>
                    <th>
                        <?php foreach ($access as $acess ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $acess->acess_image ?>" alt=""> <?php echo $acess->acess_name ?></span>

                        <?php } ?>
                    </th>
                    <!-- here -->
                    <th>
                        <span><img style="width: 30px;" src="<?php echo base_url(); ?>assets/images/icons/plug.png" alt=""> Electricity</span>
                    </th>
                    <th>
                        <?php foreach ($waters as $water ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $water->water_image ?>" alt=""> <?php echo $water->water_name ?></span>

                        <?php } ?>

                        <?php foreach ($sewers as $sewer ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $sewer->sewer_image ?>" alt=""> <?php echo $sewer->sewer_name ?></span>

                        <?php } ?>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Wifi.png" alt=""> Wifi</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_07_03_34.png" alt=""> Cable TV</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Phone.png" alt=""> Phone</span>
                    </th>
                    <th>
                        <?php foreach ($parameter_shades as $shade ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $shade->shade_image ?>" alt=""> <?php echo $shade->shade_name ?></span>

                        <?php } ?>
                    </th>
                    <th>

                        <?php foreach ($parameter_tables as $table ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $table->table_image ?>" alt=""> <?php echo $table->table_name ?></span>

                        <?php } ?>
                        <!-- <span><img src="images/icons/Tent-Pad.png" alt=""> Tent Pad</span> -->
                    </th>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

            <div style="display: none;" class="fixed-btn child-icon">
                <a href="#iconModal" data-toggle="modal" class="fixed-button">Click for Icon description</a>
                <a href="javascript:void(0)" class="fa fa-long-arrow-right close-btn"></a>
                <!-- <a href="javascript:void(0)" class="fa fa-long-arrow-right open-btn"></a> -->
            </div>
            <!--// Main Section \\-->
            <div class="ccg-main-section informational-pagesfull">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll child-side">
                               <ul class="nav nav-tabs">
                                  <?php $cid=array(); foreach ($region as $key => $value) {
                                    # code...


                                          $select = "*, childcampground.slug as cslug";
                                          $join= array('0'=>['childcampground','childcampground.parentId = parentcampground.p_id','inner']);
                                          $where = array('parentcampground.p_id' => $value->p_id );
                                          $ordeByCom= array(
                                              '0'=>['childcampground.sort','ASC'],
                                          );
                                          $child = $this->Campgrounds->find("parentcampground",$where,'','',1,$join,'',$select,$ordeByCom);

                                   ?>

                                  <li class="nav-item">
                                    <?php $url= base_url(uri_string());
                                     ?>

                    <?php if($url == "http://www.coloradocampgrounds.development-env.com/example-campground-campsite"){ ?>
                    <a id="parent-<?php echo  $value->p_id ?>" data-id="<?php echo  $value->p_id ?>" class="nav-link new-details-parent child-parent-adl" href="<?php echo base_url();?>example-campground-campsite"><?php echo $value->name; ?></a>
                    <?php }else{ ?>
                    <a id="parent-<?php echo  $value->p_id ?>" data-id="<?php echo  $value->p_id ?>" class="nav-link new-details-parent child-parent-adl" href="<?php echo base_url();?>region/<?php echo $region[0]->rname; ?>"><?php echo $value->name; ?></a>
                    <?php } ?>
                        <?php


                                  if($value->youtube_link !=""){

                                        $video_id = explode("?v=", $value->youtube_link); // For videos like http://www.youtube.com/watch?v=...

                                      if (empty($video_id[0]))

                                          $video_id = explode("/v/", $value->youtube_link); // For videos like http://www.youtube.com/watch/v/..
                                          $domain = parse_url($value->youtube_link);


                                       $url = "https://www.youtube.com/embed/".$domain['path'] ;
                                         // $url = $domain['host']."/embed".$video_id ;

                                    }else{
                                        $url = "" ;
                                    }

                                     ?>


                    <input type="hidden" class="data-link-<?php echo $value->slug; ?>" name="y_link" value="<?php echo $url ; ?>">
                    <input type="hidden" class="data-title-<?php echo $value->slug; ?>" name="titile" value="<?php echo $value->titile ; ?>">

                    <input type="hidden" class="data-campSite-<?php echo $value->slug; ?>" name="campSiteMap" value="<?php echo htmlspecialchars($value->campSiteMap); ?>">


                                          <span class="arrow-drop fa fa-angle-down arrow-click"></span>
                                                  <span class="arrow fa fa-angle-up arrow-click"></span>
                                    <ul class="nav nav-tabs drop">

                                      <?php if(!empty($child)){  foreach ($child as $key => $ch) {



                                              $select = "*, childcampground.slug as cslug";
                                              $join= array('0'=>['childcampground','childcampground.c_id = sitedescription.childId','inner']);
                                              $where = array('sitedescription.childId' => $ch->c_id );
                                              $ordeByCom= array(
                                                  '0'=>['sitedescription.siteId','desc'],
                                              );
                                              $site = $this->Campgrounds->find("sitedescription",$where,'','',1,$join,'',$select,$ordeByCom);




                                      $cid[]=$ch->c_id;
                                     ?>

                                        <li>
                                          <a data-id="<?php echo $ch->c_id ?>" class="nav-link name_child" href="<?php echo base_url();?>child-campground/<?php echo $ch->slug ; ?>"><?php echo $ch->c_name;?></a>

                                            <ul class="nav nav-tabs sub drop">

                                               <li><a class="nav-link site-child" data-id-site="" data-id="<?php echo $ch->c_id; ?>" data-id-pr="<?php echo $value->p_id; ?>" href="javascript:void(0)">Site Descriptions</a></li>

                                            </ul>
                                        </li>
                                      <?php }  }else{?>

                                          <li>

                                              <a data-id="81" class="nav-link name_child" href="<?php echo base_url();?>child-campground/sitedescription-<?php echo $value->p_id ?>">Click To Explore Site Description</a>

                                              <ul class="nav nav-tabs sub drop">

                                                  <li><a class="nav-link site-child" data-id-site="" data-id="81" data-id-pr="<?php echo $value->p_id; ?>" href="javascript:void(0)">Site Descriptions</a></li>

                                              </ul>
                                          </li>

                                        <?php }?>
                                    </ul>
                                  </li>
                                <?php } $callid=implode(',', $cid); ?>
                                 <input type="hidden" name="p_id" value="" id="p_id">
                                <input type="hidden" name="c_id" id="c_id" value="" >
                                <input type="hidden" name="s_id" id="s_id" value="" >

                                <input type="hidden" name="call_id" id="call_id" value="<?php echo $callid;?>" >
                                </ul>
                            </div>
                        </div>
                       <div class="col-md-9">

                        <div class="clearfix"></div>
                            <div class="campground-map scroll">
                              <?php if(!empty($region)){ ?>

                                <div class="campground-site-detail">
                                  <ul>
                                    <li>
                                      <!-- <strong>Page Title:</strong> -->
                                      <p id="p-title"></p>
                                    </li>

                                <?php  if($childs[0]->c_v_link !="") { ?>
                                    <li id="y_link">

                                       <?php
                                if($childs[0]->c_v_link !=""){

                                        $video_id = explode("?v=", $childs[0]->c_v_link); // For videos like http://www.youtube.com/watch?v=...
                                      if (empty($video_id[1]))
                                          $video_id = explode("/v/", $childs[0]->c_v_link); // For videos like http://www.youtube.com/watch/v/..
                                          $domain = parse_url($childs[0]->c_v_link);


                                          $video_id = explode("&", $video_id[0]); // Deleting any other params
                                          $video_id = $video_id[0];



                                       $url = "https://www.youtube.com/embed/".$domain['path'] ;
                                         // $url = $domain['host']."/embed".$video_id ;

                                    }else{
                                        $url = "" ;
                                    }

                                     ?>



                                      <strong>Youtube Video:</strong>
                                      <iframe id="youtube_custom" class="youtube-video" src="<?php echo $url ; ?>" frameborder="0" allowfullscreen></iframe>

                                    </li>
                                     <?php } ?>

                            <?php  if($childs[0]->c_map !="") { ?>
                                    <li id="m-ggl">
                                      <strong style="font-size: 18px; color: #27ae60">Map:</strong>
                                      <a style="font-size: 18px; color: #27ae60" href="<?php echo $childs[0]->c_map ;  ?>" id="map-custom-c" target="_blank">
                                        Click here to view Campground Map
                                      </a>


                                    </li>
                                  <?php } ?>

                                  </ul>
                                </div>
                              <?php }else{ ?>
                                  <p>No campground found.</p>
                              <?php } ?>
                                <div class="campground-map-detail">
                                    <div class="child-cc">
                                    <p ><?php echo $childs[0]->c_details; ?></p>
                                    </div>
                                    <div id="test-data" style="display: none;">
                                     <table class="detail" id="site-data">
                                        <tr>
                                            <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View<br><br>
                                            Click <i class="fa fa-heart" style="color: red; font-size: 15px;"></i> to make favorite</span></th>
                                            <th><span>What’s allowed</span><span>#Guests</span><span>Pets?</span><span>#Cars</span></th>
                                            <th><span>Length</span> <span>Grade</span> <span>Base</span></th>
                                            <th><span>Access</span></th>
                                            <th><span>Elec</span><span>Amps</span></th>
                                            <th><span>Water</span> <span>Sewer</span></th>
                                            <th><span>Wifi</span><span>Cable TV</span><span>Service Providers</span></th>
                                            <th><span>Shade</span><span>Partial Shade</span><span>Sunny</span></th>
                                            <th><span>Campsite Amenities</span></th>
                                            <th><span>Yards to</span><span>Toilet</span><span>Water</span><span>Trash</span></th>
                                            <!-- start form here -->
                                        </tr>
                                        <!-- pickup id and do pagination using jquery on this page -->
                                         <tbody id="htmlShow">


                                              </tbody>


                                    </table>
                                  </div>
                                        <ul id="campsites-paginate-1" class="pagination" style="display: none;"></ul>

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

  <div class="clearfix"></div>
    </div>

<div style="display: none;" class="colorado-popup-box disc-c">
    <a href="javascript:void(0)" class="popup-off fa fa-times"></a>
    <ul>
     <li><i class="fa fa-eercast"></i> <h4>If you like a campsite, click the Heart icon <i class="fa fa-heart" aria-hidden="true"></i> to make your favorite</h4></li>
        <li><i class="fa fa-eercast"></i> <h4>Hover cursor over icons for key information.</h4></li>
    </ul>
</div>
  <script type="text/javascript">

    $( document ).ready(function() {
          
    $('.popup-off').click(function () {
        $('.colorado-popup-box').hide('slow');
    });
        if( $( 'input[ name="site_on" ]' ).val() == "true" ) {

            var url = $(location).attr('href');
            var segments = url.split( '/' );

            var url = segments[4];

            var parts = url.split('-');

            var id = parts.pop();

           $('#parent-'+id).siblings('.drop').children('li').children('ul').children('li').children('a').trigger( "click" ) ;
           $('#parent-'+id).siblings('.drop').children('li').children('ul').children('li').children('a').trigger( "click" ).addClass('active') ;


            // $( ".site-child" ).trigger( "click" );
            //
            // $( ".site-child" ).addClass('active') ;
        }
    });

    $('.close-btn').click(function () {
            $('.fixed-btn').toggleClass('active');
            $(this).toggleClass('active');
        });

  </script>