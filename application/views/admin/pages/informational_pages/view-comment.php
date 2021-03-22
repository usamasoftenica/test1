<!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>View Comment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">View Comment</h4>
                            </div>
                            <div class="content">
                            
                                <div class="comments-area">
                                  <!--// coments \\-->
                                    
                                  <div class="ccg-section-heading"><h2>Comments</h2></div>
                                  <ul class="comment-list">
                                     <li class="new-comment-show"></li>
                                    <?php foreach ($comments as $key => $comment) {?>
                                     <li >
                                     <?php
                                                $select = "*,subscribe.id as IDS,replys.id as replyID,";
                                          $join= array('0'=>['subscribe','replys.user_id = subscribe.id','left']);
                                              $where = array('comment_id' => $comment->comID );
                                              $replys = $this->Campgrounds->find("replys",$where,'','',1,$join,'',$select,'');

                                            ?>
                                        <div class="thumb-list  newCommentsshow">
                                         
                                            <figure>
                                            <?php if($comment->image!=''){ ?>
                                            <img alt="" src="<?php echo base_url();?>/uploads/userImages/<?php echo $comment->image;?>">
                                          <?php }
                                           elseif($comment->image=='' &&  $comment->sender_id==0){?>
                                            <img alt="" src="<?php echo base_url();?>/assets/admin/img/logo.png">
                                           <?php }else{ ?>
                                            <img alt="" src="<?php echo base_url();?>/assets/images/test.jpg">
                                          <?php } ?>
                                             
                                              
                                           </figure>
                                           <div class="text-holder">
                                            
                                              <?php
                                              $old_date_timestamp = strtotime($comment->datenew);
                                              $new_date = date('M d, y h:i', $old_date_timestamp); 
                                            // print_r($comment->created_at);
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
                                              <p class="thumb-list-<?php echo $comment->comID; ?>"><?php echo $comment->comment;?></p>
                                            
                                           </div>
                                         
                                        </div>
                                        <ul class="children">
                                           <li class="reply-go-<?php echo $comment->comID; ?>">
                                           <?php foreach ($replys as $key => $reply) {?>
                                             <?php
                                              $old_date_timestamp = strtotime($reply->create_at);
                                              $new_date = date('M d, y h:i', $old_date_timestamp); 
                                             // print_r($new_date);
                                             
                                             ?>
                                              <div class="thumb-list">
                                                 <figure>
                                                  <?php if($reply->image!=''){ ?>
                                            <img alt="" src="<?php echo base_url();?>/uploads/userImages/<?php echo $comment->image;?>">
                                          <?php }
                                           elseif($reply->image=='' &&  $reply->user_id==0){?>
                                            <img alt="" src="<?php echo base_url();?>/assets/admin/img/logo.png">
                                           <?php }else{ ?>
                                            <img alt="" src="<?php echo base_url();?>/assets/images/test.jpg">
                                          <?php } ?>
                                                 </figure>
                                                 <div class="text-holder">
                                                    <h6><?php 
                                                if($reply->first_name!=''){
                                                  echo $reply->first_name.' '.$reply->last_name;
                                                }else{
                                                  echo "Camping Steve";
                                                }?></h6>
                                                   
                                                    
                                                    <time class="post-date" datetime=""><?php echo $new_date;?></time><br>
                                                    <p class="thumb-list-repy-<?php echo $reply->replyID; ?>"><?php echo $reply->comment_reply;?></p>
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
                              
                                 
                                  <!--// coments \\-->
                                  <!--// comment-respond \\-->
                               


                                  <!--// comment-respond \\-->
                               </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

 

        <script type="text/javascript">
        console.log($("textarea[name='commentedit']").val());

         $('#edit_information_page').on('submit', function(){
             var data = $('.note-editable').html();
            // alert(data);
            $('#description').val(data);               
        });
           $('#add_menu_item').on('submit', function(){
             var data = $('.add-sub-menu .note-editable').html();
            // alert(data);
            $('#descriptionmenup').val(data);               
        });
       
           $('#edit_menu_item').on('submit', function(){
             var data = $('.edit-sub-menu .note-editable').html();
            // alert(data);
            $('#descriptionedit').val(data);               
        });


         </script>

		<!--// Main Content \\-->
