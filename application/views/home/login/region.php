 <div class="ccg-main-wrapper">

    
        <!--// Header \\-->

    <!--// Subheader \\-->
    <?php if(!empty($regionss[0]->bannerImage)){ ?>

  <div class="ccg-subheader" style="background-image: url('<?php echo base_url(); ?>uploads/Banner/<?php echo $regionss[0]->bannerImage; ?>');">
 <?php }else{ ?>
  <div class="ccg-subheader">
  <?php } ?>

            <span class="ccg-subheader-transparent" style="background-color: <?php echo $regionss[0]->color; ?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $regionss[0]->name; ?></h1>
                     
                    </div>
                </div>
            </div>
        </div>
     
    <!--// Subheader \\-->

    <!--// Main Content \\-->
    <div class="ccg-main-content">

            <!--// Main Section \\-->
            <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                                <ul class="nav nav-tabs">

                                  <?php if(!empty($region)){ ?>
                                  <?php $tt=0; foreach ($region as $key => $value) {
                                    # code...
                                   
                                      $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.parentId = parentcampground.p_id','inner']);
                                      $where = array('parentcampground.p_id' => $value->p_id ,'childcampground.c_live'=>1);
                                      $ordeByCom= array(
                                          '0'=>['childcampground.sort','ASC'],
                                                );
                                      $child = $this->Campgrounds->find("parentcampground",$where,'','',1,$join,'',$select,$ordeByCom);

                                      
                                      if( empty($child) ) {
                                        // print_r($value);
                                          $select = "*, childcampground.slug as cslug";
                                        $join= array('0'=>['childcampground','childcampground.parentId IS NULL','inner']);
                                       $where = array('parentcampground.p_id' => $value->p_id ,'childcampground.c_live'=>1);

                                      $child = $this->Campgrounds->find("parentcampground",$where,'','',1,$join,'',$select,$ordeByCom);
                                    
                                    }
                                   ?>

                                  <li class="nav-item">

              
                    <a id="parent-<?php echo  $value->p_id ?>" class="click-drop region-drop-ar drop-ar new-details-parent nav-link"  data-id="<?php echo $value->slug; ?>" href="javascript:void(0)"><?php echo $value->name; ?></a>

                        
                                          <span class="arrow-drop arrow-show-detail fa fa-angle-down arrow-click"></span>
                                                  <span class="arrow fa fa-angle-up arrow-click"></span>
                    <input type="hidden" class="data-id-<?php echo $value->slug; ?>" name="name" value="<?php echo htmlspecialchars($value->description); ?>">

                     <?php 
                                if($value->youtube_link !=""){
                                        
                                        $video_id = explode("?v=", $value->youtube_link); // For videos like http://www.youtube.com/watch?v=...
                                       
                                      if (empty($video_id[0]))
                                        
                                          $video_id = explode("/v/", $value->youtube_link); // For videos like http://www.youtube.com/watch/v/..
                                          $domain = parse_url($value->youtube_link);
                                                                

                                       $url = "https://www.youtube.com/embed/".$domain['path'] ; 
                                         // $url = $domain['host']."/embed".$video_id ;  
                                       // print_r($url);
                                    }else{
                                      // die('else');
                                        $url = "" ;
                                    }

                                     ?>

                    <input type="hidden" class="data-link-<?php echo $value->slug; ?>" name="y_link" value="<?php echo $url ; ?>">
                    <input type="hidden" class="data-title-<?php echo $value->slug; ?>" name="titile" value="<?php echo $value->titile ; ?>">

                    <input type="hidden" class="data-campSite-<?php echo $value->slug; ?>" name="campSiteMap" value="<?php echo htmlspecialchars($value->campSiteMap); ?>">
                                    <ul class="nav nav-tabs drop">
                                      <?php   foreach ($child as $key => $ch) {

                                        $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.c_id = sitedescription.childId','inner']);
                                      $where = array('sitedescription.childId' => $ch->c_id );
                                      $ordeByCom= array(
                                                '0'=>['sitedescription.siteId','desc'],
                                                );
                                      $site = $this->Campgrounds->find("sitedescription",$where,'','',1,$join,'',$select,$ordeByCom);
                                     
                                       # code... ?>
                                       <input type="hidden" name="p_id" value="<?php echo $value->p_id; ?>" id="p_id">
                                          <?php if( $ch->c_id == 81 ){
                                                $cSlug = $ch->cslug."-".$value->p_id ;
                                           }else {

                                              $cSlug = $ch->cslug;
                                          }
                                           ?>
                                        <li><a class="nav-link" href="<?php echo base_url();?>child-campground/<?php echo $cSlug; ?>"><?php echo $ch->c_name;?></a>
                                            <ul class="nav nav-tabs sub drop">
                                              <?php foreach ($site as $key => $sit) {
                                                # code...
                                               ?>
                                                <li><a class="nav-link site-child" data-id="<?php echo $ch->c_id; ?>" data-id-pr="<?php echo $value->p_id; ?>" href="javascript:void(0)"><?php echo $sit->site_no; ?></a></li>
                                              <?php } ?>
                                              <input type="hidden" name="p_id" value="" id="p_id">
                                               <input type="hidden" name="c_id" id="c_id" value="" >
                                            </ul>
                                        </li>
                                      <?php } ?>
                                    </ul>
                                  </li>
                                <?php $tt=$tt+1; } }?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                          <a href="<?php echo base_url();?>explore" style="margin: 0px 0px 5px" class="btn btn-primary pull-right">Back to Colorado Map</a>
                          <div class="clearfix"></div>
                      <?php if(!empty($region)){ ?>

                           <p style="text-align: center;" class="chose-campground">Please choose a campground to see results.</p>

                         <?php }else{ ?>
                             <p style="text-align: center;width: 73%" class="chose-campground">No campground found.</p>
                         <?php } ?>

                            <div style="display: none;" class="ck-editor-table editor-table-wrapper  campground-map scroll">
                              <?php if(!empty($region)){ ?>

                                <div class="campground-site-detail">
                                  <ul>
                                    <li>
                                      <!-- <strong>Page Title:</strong> -->
                                      <h3 style="color: #27ae60" id="p-title"></h3>
                                    </li>

                                
                                    <li id="y_link">

                                      <strong style="font-size: 18px;color: #27ae60">Click the <i style="color: #da251c" class="fa fa-play"></i> to see a YouTube video of the campground.</strong>
                                      <iframe id="youtube_custom" class="youtube-video" src="https://www.youtube.com/" frameborder="0" allowfullscreen></iframe>
                                    </li>
                                    <li id="m-ggl">
                                      <strong style="font-size: 18px;color: #27ae60">Map:</strong>
                                      <a style="font-size: 18px;color: #27ae60" href="" target="_blank" id="map-custom"></a>
                                    </li>
                                
                                  </ul>
                                </div>
                              <?php }else{ ?>
                                  <p>No campground found.</p>
                              <?php } ?>
                                <div class="campground-map-detail">
                                   <div class="region-cc custom-style custom-style-region">
                                    
                                    </div>
                                   <div id="test-data" style="display: none;">
                                     <table class="detail" id="site-data">
                                        <tr>
                                            <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View<br><br>
                                            Click <i class="fa fa-heart" style="color: red; font-size: 15px;"></i> to make favorite</span></th>
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
                                         <tbody id="htmlShow"></tbody>
                                    </table>
                                  </div>
                                        <ul id="campsites-paginate-1" class="pagination" style="display: none;"></ul>
                                    
                                </div>
                            </div>
                          
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
<script type="text/javascript">
</script>