	<div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="card">

                            <div class="header">

                                <?php

                                 $now = time(); // or your date as well

                                $your_date = strtotime($subscriber->subscription_date);            

                                $datediff = $your_date - $now;

                                 $TotalDays=ceil($datediff/86400);

                                 if($subscriber->admin_status==2){
                                  $stats='(Free Account)';
                                 }else if($TotalDays>0)

                                 {
                                    if($subscriber->free_trial !=0){
                                      $stats='(Trail will end after <strong>'.$TotalDays.' Days</strong>)';
                                    }else
                                    $stats='(Subscription will end after <strong>'.$TotalDays.' Days</strong>)';

                                 }else{
                                    if($subscriber->free_trial !=0){
                                      $stats='(Trail has been expired)';
                                    }else
                                    $stats='(Subscription has been expired)';

                                 }

                                 $topic = '';

                                 if($subscriber->free_trial !=0){
                                    $topic = 'Trial';
                                 }else{
                                  $topic = 'Subscriber';
                                 }

                                 // if($TotalDays>0 && $subscriber->free_trial !=0)

                                 // {

                                 //    $stats='(Trail will end after <strong>'.$TotalDays.' Days</strong>)';

                                 // }else{

                                 //    $stats='(Trail has been expired)';

                                 // }

                                 ?>

                                <h4 class="title">Subscriber Details <small class="note"><?php echo $stats; ?></small></h4>

                                <a href="<?php echo base_url() ?>admin/edit-subscriber/<?php echo $subscriber->id ?>" class="btn btn-info btn-fill pull-right color-red print"> Edit</a>
                                <?php if($subscriber->free_trial ==0){?>
                                 <a style="margin-right: 10px;" href="<?php echo base_url()?>admin/subscriber-list" class="btn btn-info btn-fill pull-right color-red print"> Back</a>
                             <?php }else{?>
                                <a style="margin-right: 10px;" href="<?php echo base_url()?>admin/free-trial-list" class="btn btn-info btn-fill pull-right color-red print"> Back</a>
                             <?}?>   

                            </div>

                            <div class="content">

                                <div class="payment-list subscriber">

                                    <table>

                                        <tr>

                                            <th>Full Name</th>

                                            <td><?php echo $subscriber->first_name.' '. $subscriber->last_name ?></td>

                                        </tr>

                                        <tr>

                                            <th>Email Address</th>

                                            <td><?php echo $subscriber->email ?></td>

                                        </tr>

                                        <tr>

                                            <th>Billing Address/PO Box</th>

                                           <td><?php echo $subscriber->billing_address ?></td>

                                        </tr>

                                        <tr>

                                            <th>Apartment</th>

                                            <td><?php echo $subscriber->apartment ?></td>

                                        </tr>

                                        <tr>

                                            <th>City</th>

                                            <td><?php echo $subscriber->city ?></td>

                                        </tr>

                                        <tr>

                                            <th>State</th>

                                            <td><?php echo $subscriber->state ?></td>

                                        </tr>

                                        <tr>

                                            <th>Country</th>

                                            <td><?php echo $subscriber->country ?></td>

                                        </tr>

                                        <tr>

                                            <th>Zip Code</th>

                                            <td><?php echo $subscriber->zip_code ?></td>

                                        </tr>

                                        <tr>

                                          <th>Image</th>

                                          <td>   <?php if(!empty($subscriber->image)){ ?>

                                       <img src="<?php echo base_url(); ?>uploads/userImages/<?php echo $subscriber->image; ?>" style="width:230px; alt="" >

                                    <?php }else{ ?>

                                          <img src="<?php echo base_url(); ?>assets/images/user.png" alt="" >

                                        <?php } ?></td>

                                        </tr>
                                        <tr>

                                            <th>Free trial avail</th>
                                            <?php if(isset($free_trial)) {?>
                                                <td>Yes</td>
                                            <?php }else {?>
                                                <td>No</td>
                                            <?php }?>

                                        </tr>

                                        <?php if($subscriber->free_trial == 0 && isset($free_trial) ){?>
                                        <tr>

                                            <th>Free trial start date</th>

                                            <td><?php echo $free_trial->start_date ?></td>

                                        </tr>
                                        <tr>

                                            <th>Free trial end Date</th>

                                            <td><?php echo $free_trial->end_date ?></td>

                                        </tr>
                                        <?}?>




                                    <!--     <tr>

                                            <th>Status</th>

                                            <?php if($subscriber->admin_status==1){?>

                                            <td>Unblocked</td>

                                            <?php }else{?>

                                              <td>Blocked</td>

                                              <?php }?>

                                        </tr> -->

                                        

                                    </table>

                                   

                                </div>

                            <!--     <div class="comments-area">

                                 

                                  <div class="ccg-section-heading"><h2>Comments</h2></div>

                                    <ul class="comment-list">

                                       <li>

                                          <div class="thumb-list">

                                             <figure><img alt="" src="img/comment-img1.jpg"></figure>

                                             <div class="text-holder">

                                                <h6>George Smith</h6>

                                                <a class="comment-reply-link" href="#">Delete</a>

                                                <time class="post-date" datetime="">Jun 11, 2019</time>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>

                                             </div>

                                          </div>

                                          <div class="thumb-list">

                                             <figure><img alt="" src="img/comment-img1.jpg"></figure>

                                             <div class="text-holder">

                                                <h6>George Smith</h6>

                                                <a class="comment-reply-link" href="#">Delete</a>

                                                <time class="post-date" datetime="">Jun 11, 2019</time>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>

                                             </div>

                                          </div>

                                          

                                       </li>

                                    </ul>

                                  

                                 </div> -->

                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>



        </div>

        <script type="text/javascript">
            var bool = "<?php echo isset($free_trial);?>"
            console.log('free_trial')
        </script>