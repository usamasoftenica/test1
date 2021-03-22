 <!--// Subheader \\-->

        <?php if (!empty($information_rows[0])){ $banerimg=$information_rows[0]->banner; }else{$banerimg ='';}?>
          <div class="ccg-subheader white-color" style="background-image: url('<?php echo base_url();?>/uploads/informationalPages/<?php echo $banerimg;?>');">
            <span class="ccg-subheader-transparent" style="background-color: <?php if (!empty($information_rows[0])){echo $information_rows[0]->color;}else {echo 'tan';}?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="title-c" style="color: <?php if (!empty($information_rows[0])){ echo  $information_rows[0]->nameColor;}else {echo 'black';}?> "><?php if (!empty($information_rows[0]->name)){echo $information_rows[0]->name;}else {echo 'No Information page Found';} ?></h1>
                        <ul class="ccg-breadcrumb">
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		  <div class="ccg-main-content">
            
               
             <div class="ccg-main-section informational-pagesfull">
                <div class="container">
                    <div class="row">
                        <?php if(empty($information)) { ?>
                        <div class="col-md-12" style="text-align: center">
                            No information Page Found
                        </div>
                        <?php  }?>
                        <?php if(!empty($information)) { ?>
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                                <ul class="nav nav-tabs">
                                    <?php foreach ($information as $key => $info) {
                                        $where = array('informationalpages_id' => $info->info_id);
                                        $ordeBy= array(
                                            '0'=>['menuitem.sort','asc'],
                                        );
                                      $submenu=$this->Campgrounds->find_rows_data('menuitem', $where,$ordeBy);
                                      
                                      ?>
                                  <li class="nav-item">

                                    <a class="click-drop nav-link" href="<?php echo base_url();?>information-pages/<?php echo $info->slug;?>"><?php echo $info->name ?></a>
                                    <span class="arrow-drop fa fa-angle-down arrow-click"></span>
                                    <span class="arrow fa fa-angle-up arrow-click"></span>
                                    <ul class="nav nav-tabs drop">
                                      <?php  foreach ($submenu as $key => $value) {
                                      # code...

                                    
                                    ?>
                                        <li><a class="nav-link submenus" data-id="<?php echo $value->id; ?>" data-count="10" href="<?php echo base_url();?>information-pages/<?php echo $info->slug;?>/<?php echo $value->menu_slug;?>"><?php echo $value->name;?></a>
                                        
                                        </li>
                                        <?php } ?>
                                    </ul>
                                  </li>
                                <?php }?>
                                </ul>
                            </div>
                        </div>
                        <?php  }?>
                        <?php if (!empty($information_rows)){ ?>
                        <div class="col-md-9">
                             <div class="campground-map">
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                          
                                            <div class="col-md-12">
                                              <div class="submenueshow custom-style">
                                                <?php echo $information_rows[0]->description;?>
                                              </div>
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
                                  <div class="submenusshow"></div>
                                  <div class="subminues-comments">
                                  <ul class="comment-list ">
                                    <li class="new-comment-show new-comment-load-first"></li>

									  <?php if(empty($comments)){ ?>
										 <li>
                  <span style="float: left;width: 100%; text-align: center;">No Comment Available</span>
                </li>
									  <?php }else{ ?>

                                     <?php

										  if($this->session->userdata['userdata']['email']!='admin@colorado.com') {
                                      foreach ($comments as $key => $comment) { ?>
                                     <li>
                                    <?php
                                          $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                         	 $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID,'reply_approved'=>1,'menus_id'=>'NULL',  'detect_forum_reply' => 0 );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');

                                            ?>
                                        <div class="thumb-list edit-comment-thumb-list-<?php echo $comment->comID; ?>">

                                           <figure>
                                            <?php if($comment->image!=''){ ?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/uploads/userImages/<?php echo $comment->image;?>');"></span>
                                          <?php } elseif($comment->image=='' &&  $comment->sender_id==0){?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/admin/img/logo.png')"></span>
                                           <?php } else{?>
                                             <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/images/test.jpg')"></span>
                                           <?php }?>
                                          <?php if(isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] ==0){ ?>
                                              <a class="comment-reply-link comment-replyss" href="javascript:void(0)" data-id="<?php echo $comment->comID;?>">Reply</a>
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
                                              <?php if($this->session->userdata['userdata']['id']==$comment->sender_id){ ?>
                                               <a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $comment->comID;?>">Delete</a>
                                                <a class="comment-reply-link comment-edit comment-edit-<?php echo $comment->comID; ?>" href="javascript:void(0)" data-id="<?php echo $comment->comID;?>" data-message="<?php echo $comment->comment;?>">Edit</a> 
                                            <?php  } ?>
                                             
                                              <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                             <p id="approval-message-info-<?php echo $comment->comID; ?>" class="thumb-list-<?php echo $comment->comID; ?>"><?php echo $comment->comment;?></p>
                                            
                                           </div>
											<div style="color: green" class="upproval-message-info-<?php echo $comment->comID ; ?>"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <ul class="children children-<?php echo $comment->comID; ?> ">

											<?php foreach ($replys as $key => $reply) {  ?>
                                         
                                           <li class="reply-go-<?php echo $comment->comID; ?>">

                                             <?php
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y', $old_date_timestamp);
                                             
                                             ?>
                                              <div class="thumb-list chil-<?php echo $reply->replyID;?>">
                                                 <figure>
                                                  <?php if($reply->image!=''){ ?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/uploads/userImages/<?php echo $reply->image;?>');"></span>
                                          <?php } elseif($reply->image=='' &&  $reply->user_id==0){?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/admin/img/logo.png');"></span>
                                           <?php }else{ ?>
                                              <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/images/test.jpg');"></span>
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
                                                 <?php if($this->session->userdata['userdata']['id']==$reply->user_id){ ?>
                                                   <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="<?php echo $reply->replyID;?>">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply comment-edit-reply-<?php echo $reply->replyID; ?>" href="javascript:void(0)" data-id="<?php echo $reply->replyID;?>" data-message="<?php echo $reply->comment_reply;?>">Edit</a>
                                                  <?php } ?>
                                                    <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                                    <p id="approve-reply-info-<?php echo $reply->replyID; ?>" class="thumb-list-repy-<?php echo $reply->replyID; ?>"><?php echo $reply->comment_reply;?></p>
                                                 </div>
                                                 <!-- <p>approval message</p> -->
                                              </div>

                                           </li>
											<?php } ?>
                                           <!-- #comment-## -->
                                        </ul>
                                          
                                        <!-- .children -->
                                     </li>
                                     <?php }}else{ ?>
                                      <li class="new-comment-show new-comment-load-first-1"></li>
                                      <?php
                                     
                                      foreach ($comments as $key => $comment) { ?>
                                     <li >
                                    <?php
                                          $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID,'reply_approved'=>1 );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');
                                             

                                            ?>
                                        <div class="thumb-list">
                                         
                                           <figure>
                                            <?php if($comment->image!=''){ ?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/uploads/userImages/<?php echo $comment->image;?>');"></span>
                                          <?php } elseif($comment->image=='' &&  $comment->sender_id==0){?>
                                            <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/admin/img/logo.png')"></span>
                                           <?php } else{?>
                                             <span class="comment-img" style="background-image: url('<?php echo base_url();?>/assets/images/test.jpg')"></span>
                                           <?php }?>
                                              <a class="comment-reply-link comment-replyssadmin" href="javascript:void(0)" data-id="<?php echo $comment->comID;?>">Reply</a>
                                              
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
                                              <?php if($this->session->userdata['userdata']['id']==$comment->sender_id){ ?>
                                               <a href="javascript:void(0)" class="comment-reply-link delete_comment"  data-id="<?php echo $comment->comID;?>">Delete</a>
                                                <a class="comment-reply-link comment-edit-admin comment-edit-<?php echo $comment->comID; ?>" href="javascript:void(0)" data-id="<?php echo $comment->comID;?>" data-message="<?php echo $comment->comment;?>">Edit</a> 
                                            <?php  } ?>
                                             
                                              <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                             <p class="thumb-list-<?php echo $comment->comID; ?>"><?php echo $comment->comment;?></p>
                                            
                                           </div>
                                           <p>approval message</p>
                                         
                                        </div>
                                        <ul class="children">
											               <div style="color: green" class="upproval-message-info-<?php echo $comment->comID; ?>">
                                     </div>

                                           <li class="reply-go-<?php echo $comment->comID; ?>">
                                           <?php foreach ($replys as $key => $reply) {  ?>
                                             <?php
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y', $old_date_timestamp);

                                             ?>
                                              <div  class="thumb-list ">
                                                 <figure>
                                                  <?php if($reply->image!=''){ ?>
                                            <span style="background-image: url('<?php echo base_url();?>/uploads/userImages/<?php echo $reply->image;?>');"></span>
                                          <?php } elseif($reply->image=='' &&  $reply->user_id==0){?>
                                            <span style="background-image: url('<?php echo base_url();?>/assets/admin/img/logo.png');"></span>
                                           <?php }else{ ?>
                                             <span style="background-image: url('<?php echo base_url();?>/assets/images/test.jpg');"></span>
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
                                                 <?php if($this->session->userdata['userdata']['id']==$reply->user_id){ ?>
                                                   <a href="javascript:void(0)" class="comment-reply-link delete_comment_reply"  data-id="<?php echo $reply->replyID;?>">Delete</a>
                                                    <a class="comment-reply-link comment-edit-reply-admin comment-edit-reply-admin<?php echo $reply->replyID; ?>" href="javascript:void(0)" data-id="<?php echo $reply->replyID;?>" data-message="<?php echo $reply->comment_reply;?>">Edit</a>
                                                  <?php } ?>
                                                    <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                                    <p class="thumb-list-repy-<?php echo $reply->replyID; ?>"><?php echo $reply->comment_reply;?></p>
                                                 </div>
                                                 <p>approve message</p>
                                              </div>
                                            <?php } ?>
                                           </li>
                                           <!-- #comment-## -->
                                        </ul>
                                          
                                        <!-- .children -->
                                     </li>
                                     <?php } } }?>

                                  </ul>
                                  

                                 <?php if(count($countTotal)>10){  ?>
                                   <div class="center" id="load-more-btn-1">
                                    <a href="javascript:void(0)" data-count="10" data-id="<?php echo $information_rows[0]->info_id;?>" class="btn btn-info btn-fill color-red load-more-btn">Load More</a>
                                  </div>
                                <?php } ?>
                              </div>
                                
                                  <!--// coments \\-->
                                  <!--// comment-respond \\-->
                                  <?php  if($this->session->userdata['userdata']['first_name']!='Camping' && $this->session->userdata['userdata']['last_name']!='Steve' && $this->session->userdata['userdata']['free_trial'] == 0) {?>
                                <div class="comment-respond">
                                    <div class="comentposted" style="color: green;"></div>
                                 <div class="ccg-section-heading"><h2>Post A Comment</h2></div>
                                <div><span style="color: green;" id="show-m"></span></div>
                                 <form action="javascript:void(0)" method="post" id="comment_post">
                                  <input type="hidden" name="pageid" id="pageid" value="<?php echo $information_rows[0]->info_id ?>">
                                  <?php $first=$this->session->userdata['userdata']['first_name'];
                                  $last=$this->session->userdata['userdata']['last_name'];
                                    $name=$first.' '.$last;
                                       $image=$this->session->userdata['userdata']['image'];
                                   ?>
                                   <input type="hidden" name="menuid" class="menuidpost" value="">
                                  <input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
                                  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>">
                                
                                    <p class="ccg-full-form">
                                       <textarea name="comment" id="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                       <i class="fa fa-comment"></i>
                                    </p>
                                     <?php if(isset($this->session->userdata['userdata']['id']) && $this->session->userdata['userdata']['free_trial'] ==0){?>
                                    <p class="form-submit">
                                      <input value="Post Now" type="submit">
                                    </p>
                                     <?php }?>
                                 </form>
                              </div>
                            <?php }else if( $this->session->userdata['userdata']['free_trial'] == 0){ ?>
                                    <div class="comment-respond">
                                    <div class="comentposted" style="color: green;"></div>
                                 <div class="ccg-section-heading"><h2>Post A Comment</h2></div>
                                 <form action="javascript:void(0)" method="post" id="comment_post_admin">
                                  <input type="hidden" name="pageid" id="pageid" value="<?php echo $information_rows[0]->info_id ?>">
                                  <?php $first=$this->session->userdata['userdata']['first_name'];
                                  $last=$this->session->userdata['userdata']['last_name'];
                                    $name=$first.' '.$last;
                                       $image=$this->session->userdata['userdata']['image'];
                                   ?>
                                     <input type="hidden" name="menuid" class="menuidpost" value="">
                                  <input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
                                  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>">
                               
                                    <p class="ccg-full-form">
                                       <textarea name="comment" id="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                       <i class="fa fa-comment"></i>
                                    </p>
                                    <p class="form-submit">
                                      <input value="Post Now" type="submit">
                                    </p>
                                 </form>
                              </div>
                            <?php } ?>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                        <?php  }?>
                </div>
            </div>
          </div>
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
                                      <input type="hidden" name="menuid" class="menuid" value="">
                                         <?php $first=$this->session->userdata['userdata']['first_name'];
                                  $last=$this->session->userdata['userdata']['last_name'];
                                    $name=$first.' '.$last;
                                    $image=$this->session->userdata['userdata']['image'];
                                   ?>
                                  <input type="hidden" name="names" id="names" value="<?php echo $name; ?>">
                                  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>">
                                  <input type="hidden" name="detect_forum-reply-information" id="detect_forum-reply-information" value="0">

                                        
                                        <p class="ccg-full-form">
                                           <textarea name="comment" id="commentss" placeholder="Type Your Comment Here" class="commenttextarea coms"></textarea>
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
                              <div id="reply-modal-edit-reply" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  
                                  <h4 class="modal-title">Edit A Reply</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit_replyss">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                     <input id="detect_forum-reply" name="detect_forum-reply_edit" type="hidden" value="0">
                                        <p class="ccg-full-form">
                                           <textarea name="commenteditreply" id="commentss-edit-reply" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
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
                             <div id="reply-modal-edit-reply-admin" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  
                                  <h4 class="modal-title">Edit A Reply</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit_replyss_admin">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                        
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="commenteditreply" id="commentss-edit-reply-admin" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
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
                             <div id="reply-modal-edit-admin" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  
                                  <h4 class="modal-title">Edit A Comment</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit_admin">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                        
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="commentedit" id="commentss-edit-admin" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
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
                           <div id="reply-modal-edit" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  
                                  <h4 class="modal-title">Edit A Comment</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit" >
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                        
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="commentedit" id="commentss-edit"  placeholder="Type Your Comment Here" class="commenttextarea message coms-edit"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
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
			  <script>

          $('#coment_edit').validate({

 rules:{

   commentedit:{
    required:true,
    maxlength: 1100,
   },
   

 },
 messages:{

   commentedit:{
     required:"Comment is required",
   }
 }

});

                    $('#coment_edit_replyss').validate({

 rules:{

   commenteditreply:{
    required:true,
    maxlength: 1100,
   },
   

 },
 messages:{

   commenteditreply:{
     required:"Reply is required",
   }
 }

});

				  $(document).on('click','.comment-edit-reply',function(){
					  //$('.comment-replyss').click(function() {
					  var id=$(this).attr('data-id');
					  var message=$(this).attr('data-message');
					  // alert(id);
					  $('#reply-modal-edit-reply').modal('show');
					  $('.inputhidden').val(id);
					  $('#commentss-edit-reply').val(message);


				  });

				  $('#coment_edit_replyss').submit(function(e) {
					  //alert("ok");return;
					  if($(this).valid()){
					  e.preventDefault();
					  // alert('amir ishaque');
					  // $('#reply-modal-edit').modal('hide');
					  // $('#myModal').modal('hide');
					  // var name = $("#name").val();
					  var reply_id = $(".inputhidden").val();
					  // console.log(comment_id);
					  var comment = $("#commentss-edit-reply").val();
					  //alert(comment);

					  var strDate = getISODateTime(new Date());
					  $.ajax({
						  url: base_url+'/user/UserController/ajaxRequestCOmmentReplyEdit',
						  type: 'POST',
						  data: {reply_id: reply_id, comment: comment},
						  error: function() {
							  alert('Something is wrong');
						  },
						  success: function(id) {
							  var html='';
							  // $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
							  // $('.thumb-list').last().remove();
							  html=comment;

							  // $('.thumb-list-repy-'+reply_id).html( html );
							  // $('.comment-edit-reply-'+reply_id).attr('data-message',html);

							  var text='Your edit reply is posted and is pending Admin approval.';
							  $('.thumb-list-repy-'+reply_id).text(text);
							  $('.thumb-list-repy-'+reply_id).addClass('approve-para-blog-color') ;
							  $('.comment-edit-reply-'+reply_id).remove() ;

							  // $("#coment_reply")[0].reset();

							  // setTimeout(function(){  $('.chil-'+reply_id).html( '' ); }, 3000);
							  $('#reply-modal-edit-reply').modal('hide');
							  //$(html).remove();


						  }
					  });
					  }
				  });

				  $(document).on('click','.delete_comment_reply', function(){
					  var _this=$(this);
					  var id=_this.attr('data-id');
					  var head_title = "<strong>Are you sure?</strong>";
					  var title = 'You want to delete this reply?';
					  var url = base_url+'/user/UserController/delete_comment_reply';
					  delete_f(head_title, title, url, id);
				  });


				  $(document).on('click','.comment-edit',function(){
					  //$('.comment-replyss').click(function() {
					  var id=$(this).attr('data-id');
					  var message=$(this).attr('data-message');

					  // alert(message);
					  $('#reply-modal-edit').modal('show');
					  $('.inputhidden').val(id);
					  $('#commentss-edit').val(message);


				  });

				  $('#coment_edit').submit(function(e) {
					  //alert("ok");return;
					  if($(this).valid()){
					  e.preventDefault();
					  // alert('amir ishaque');
					  // $('#reply-modal-edit').modal('hide');
					  // $('#myModal').modal('hide');
					  // var name = $("#name").val();
					  var comment_id = $(".inputhidden").val();
					  // alert(comment_id);
					  // console.log(comment_id);
					  var comment = $("#commentss-edit").val();
					  // alert(comment);

					  var strDate = getISODateTime(new Date());
					  $.ajax({
						  url: base_url+'/user/UserController/ajaxRequestCOmmentEdit',
						  type: 'POST',
						  data: {comment_id: comment_id, comment: comment},
						  error: function() {
							  alert('Something is wrong');
						  },
						  success: function(id) {
							  var html='';
							  // $("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
							  // $('.thumb-list').last().remove();
							  html=comment;
							  //alert(html);
							  // $('.thumb-list-'+comment_id).html( html );
							  // $('.comment-edit-'+comment_id).attr('data-message',html);
							  //  $('#reply-modal-edit').modal('hide');
							  //alert('123');


							  text='Your edit comment is posted and is pending admin approval.';
							  $('.thumb-list-'+comment_id).text(text) ;
							  $('.thumb-list-'+comment_id).addClass('approve-para-blog-color') ;
							  $('.comment-edit-'+comment_id).hide() ;

							  // $("#coment_reply")[0].reset();


							  // setTimeout(function(){
								//   $('.edit-comment-thumb-list-'+comment_id).html('');
								//   $('.children-'+comment_id).html('');
							  // }, 3000);
							  $('#reply-modal-edit').modal('hide');

						  }
					  });
					  }
				  });


          // $('.arrow-click').click(function(){
                
          //     // var src = $( this ).prevAll('a.click-drop').attr('href');
          //     // window.location.href = src ;

          //      var text = $( this ).prevAll('a.click-drop').text('text');
          //      $('#ccg-subheader').text(text) ;
          // }) ;

			  </script>
