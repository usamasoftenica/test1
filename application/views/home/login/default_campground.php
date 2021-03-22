<div class="ccg-subheader">
  
            <span class="ccg-subheader-transparent" style="background-color: green"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="margin-top: 10px;"><?php echo $campground[0]->name; ?></h1>
                       <!--  <ul class="ccg-breadcrumb">
                            <li><a href="index.html">Home Page</a></li>
                            <li>Campgrounds</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
   <div class="ccg-main-content">

      <div class="ccg-main-section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
           <div  class="campground-map scroll">
                            

                                <div class="campground-site-detail">
                                  <ul>
                                    <!-- <li> -->
                                      <!-- <strong>Page Title:</strong> -->
                                      <!-- <p id="p-title"><?php echo $campground[0]->name; ?></p>
                                    </li> -->
                            
                                    <!-- <li id="m-ggl">
                                      <strong>Map:</strong>
                                      <a target="_blank" href="<?php echo $campground[0]->campSiteMap ?>" id="map-custom">
                                        Click here to view location on Map.
                                      </a>
                                     
                                    
                                    </li> -->
                                
                                  </ul>
                                </div>
                          
                                <div class="campground-map-detail">
                                   <div class="region-cc">
                                      <?php echo $campground[0]->description ?>
                                    </div>
                                   <div id="test-data" style="display: none;">
                                     <table class="detail" id="site-data">
                                        <tr>
                                            <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View<br><br>
                                            Click  (heart symbol) to make favorite</span></th>
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
                                       <!-- <div  id="campsites-paginate-1" class="" style="display: none;"></div> -->
                                </div>
<!--                                <div class="campground-site-detail">-->
<!--                                  <ul>-->
<!---->
<!--                                     --><?php //if($campground[0]->youtube_link != ""){ ?>
<!--                                    <li id="y_link">-->
<!--                                      --><?php
//                                          $video_id = explode("?v=", $campground[0]->youtube_link); // For videos like http://www.youtube.com/watch?v=...
//                                      if (empty($video_id[1]))
//                                          $video_id = explode("/v/", $campground[0]->youtube_link); // For videos like http://www.youtube.com/watch/v/..
//                                          $domain = parse_url($campground[0]->youtube_link);
//
//
//                                          $video_id = explode("&", $video_id[0]); // Deleting any other params
//                                          $video_id = $video_id[0];
//
//                                        $video_id = explode('/',$video_id);
//                                        $video_id = end($video_id);
//
//                                       $url = "https://www.youtube.com/embed/".$video_id ;
//                                       ?>
<!---->
<!---->
<!--                                      <strong>Youtube Video:</strong>-->
<!--                                      <iframe id="youtube_custom" class="youtube-video" src="--><?php //echo $url; ?><!--" frameborder="0" allowfullscreen></iframe>-->
<!--                                    </li>-->
<!---->
<!--                                  --><?php //} ?>
<!---->
<!--                                  </ul>-->
<!--                                  -->
<!--                                </div>-->

                            </div>
                            <div style="text-align: center;">
                               <a class="btn btn-danger" href="<?php echo base_url();?>example-campground-campsite">See example Campground and Campsites!</a>
                            </div>
                              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
               