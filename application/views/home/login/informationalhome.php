
        <!--// Subheader \\-->
        <?php $banerimg=$information_rows[0]->banner; ?>
          <div class="ccg-subheader white-color" style="background-image: url('<?php echo base_url();?>/uploads/informationalPages/<?php echo $banerimg;?>');">
            <span class="ccg-subheader-transparent" style="background-color: <?php echo $information_rows[0]->color;?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: <?php echo  $information_rows[0]->nameColor;?>"><?php echo $information_rows[0]->name;?></h1>
                        <ul class="ccg-breadcrumb">
                            <!-- <li><a href="<?php //echo base_url();?>"><?php //echo $information_rows[0]->title;?></a></li> -->
                            <!-- <li>Profile</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		  <div class="ccg-main-content">
            
               
             <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                                <ul class="nav nav-tabs">
                                    <?php foreach ($information as $key => $info) {
                                        $where = array('informationalpages_id' => $info->info_id);
                                      $submenu=$this->Campgrounds->find_rows_data('menuitem', $where);
                                      //print_r($submenu);exit;
                                      ?>
                                  <li class="nav-item">
                                    <a class="click-drop nav-link" href="<?php echo base_url();?>informations/<?php echo $info->slug;?>"><?php echo $info->name ?></a>
                                    <span class="arrow-drop fa fa-angle-down"></span>
                                    <span class="arrow fa fa-angle-down"></span>
                                    <ul class="nav nav-tabs drop">

                                      <?php  foreach ($submenu as $key => $value) {
                                    ?>
                                        <li><a class="nav-link submenus" data-id="<?php echo $value->id; ?>" href="<?php echo base_url();?>informations/<?php echo $info->slug;?>/<?php echo $value->menu_slug;?>"><?php echo $value->name;?></a>
                                           <!--  <ul class="nav nav-tabs sub drop">
                                                <li><a class="nav-link" href="site-description.html">Site Descriptions</a></li>
                                            </ul> -->
                                        </li>
                                        <?php } ?>
                                    </ul>
                                  </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                             <div class="campground-map">
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                          
                                            <div class="col-md-12 submenueshow">
                                                <!-- <h6><?php //echo $information_rows[0]->name;?></h6> -->
                                               
                                                <p><?php echo $information_rows[0]->description;?></p>

                                            </div>
                                          
                                         
                                            <div class="col-md-5">
                                                <img src="images/blog-modern-img1.jpg" alt="">
                                            </div>
                                        </div>
                                  </div>
                               
                             
                                 
                                </div>
                            </div>
                            <div class="comments-area">
                                  <!--// coments \\-->
                                    
                                  <div class="ccg-section-heading"><h2>Comments</h2></div>
                                  <li class="new-comment-show"></li>
                                  <ul class="comment-list">
                                     <?php foreach ($comments as $key => $comment) {?>
                                     <li >
                                    <?php
                                          $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID ,
												  'detect_forum_reply' => 0,
												  'reply_approved'=>1,
												  );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');
                                             

                                            ?>
                                        <div class="thumb-list addhomepagecontent">
                                         
                                           <figure>
                                            <?php if($comment->image!=''){ ?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/uploads/userImages/<?php echo $comment->image;?>');"></span>
                                          <?php } elseif($comment->image=='' &&  $comment->sender_id==0){?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/admin/img/logo.png')"></span>
                                           <?php } else{?>
                                             <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/images/test.jpg')"></span>
                                           <?php }?>
                                            
                                              
                                           </figure>
                                           <div class="text-holder">
                                            
                                              <?php
                                              $old_date_timestamp = strtotime($comment->datenew);
                                              $new_date = date('M d, y', $old_date_timestamp);
                                             
                                             ?>
                                              <h6>
                                                <?php 
                                                if($comment->first_name!=''){
                                                  echo $comment->first_name.' '.$comment->last_name;
                                                }else{
                                                  echo "Camping Steve";
                                                }
                                                ?>
                                                

                                              </h6>
                                              
                                             
                                              <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                              <p><?php echo $comment->comment;?></p>
                                            
                                           </div>
                                         
                                        </div>
                                        <ul class="children">
                                           <li class="reply-go-<?php echo $comment->comID; ?>">
                                           <?php foreach ($replys as $key => $reply) {  ?>
                                             <?php
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y', $old_date_timestamp);
                                             
                                             ?>
                                              <div class="thumb-list">
                                                 <figure>
                                                  <?php if($reply->image!=''){ ?>
                                            <img alt="" src="<?php echo base_url();?>/uploads/userImages/<?php echo $reply->image;?>">
                                          <?php } elseif($reply->image=='' &&  $reply->user_id==0){?>
                                            <img alt="" src="<?php echo base_url();?>/assets/admin/img/logo.png">
                                           <?php }else{ ?>
                                             <img alt="" src="<?php echo base_url();?>/assets/images/test.jpg">
                                           <?php } ?>
                                         </figure>
                                                 <div class="text-holder">
                                                    <h6>  <?php 
                                                if($reply->first_name!=''){
                                                  echo $reply->first_name.' '.$reply->last_name;
                                                }else{
                                                  echo "Camping Steve";
                                                }
                                                ?></h6>
                                                   
                                                    <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                                    <p><?php echo $reply->comment_reply;?></p>
                                                 </div>
                                              </div>
                                            <?php } ?>
                                           </li>
                                           <!-- #comment-## -->
                                        </ul>
                                          
                                        <!-- .children -->
                                     </li>
                                     <?php } ?>
                                  </ul>
                                  <?php if(count($countTotal)>10){  ?>
                                  <div class="center">
                                    <a href="javascript:void(0)" data-count="10" data-id="<?php echo $information_rows[0]->info_id;?>" class="btn btn-info btn-fill color-red load-more-btn-home">Load More</a>
                                  </div>
                                <?php } ?>
                                  <!--// coments \\-->
                                  <!--// comment-respond \\-->
                                </div>
                          
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
         
            <!--// Main Section \\-->

        </div>

          <div id="reply-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Post A Reply</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_reply">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                <!--         $first=$this->session->userdata['userdata']['first_name'];
                                  $last=$this->session->userdata['userdata']['last_name'];
                                    $name=$first.' '.$last;
                                    $image=$this->session->userdata['userdata']['image']; -->
                                  
                                  <input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
                                  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>">
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="comment" id="commentss" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Reply" type="submit"> 
                                        </p>
                                     </form>
                                  </div>
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>
