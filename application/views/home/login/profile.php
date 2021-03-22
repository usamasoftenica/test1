  <div class="ccg-subheader white-color" style="background-image: url('<?php echo base_url();?>assets/images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Profile</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home Page</a></li>
                            <li>Profile</li>
                        </ul>
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
                        <div class="col-md-12">
                            <div class="ccg-sign-form">
                               
                                  <?php if($this->session->flashdata('error1')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                  </div>
                                            <?php } ;?>
                                            <?php if($this->session->flashdata('success1')!=""){  ?>
                                           <div class="alert alert-success">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong><?php echo $this->session->flashdata('success1'); ?></strong> 
                                                     
                                                  </div>
                                            <?php } ;?>
                                             <?php
                                            if($user->admin_status!=2){
                                $now = new DateTime(date("Y-m-d")); // or your date as well
                                $your_date = new DateTime($user->subscription_date);            
                                $TotalDays = $now->diff($your_date);
                                $TotalDays=$TotalDays->format('%r%a');
                                 // $TotalDays=ceil($datediff/86400);
                                 if($TotalDays>0 )
                                 {
                                    $str = '';
                                    if($user->free_trial == 0){
                                     $str = 'Subscription';   
                                    }else{
                                        $str = 'Free trial';
                                    }
                                    $stats='Your '.$str.' will expire after <strong>'.$TotalDays.' Days</strong>';
                                 }else{
                                    $stats='Subscription has been expired';
                                 }
                             }else{
                                $stats='';
                             }
                                 ?>
                                            <h5><?php echo $stats; ?></h5>
                             
                                <form action="<?php echo base_url();?>subscribe/update" enctype="multipart/form-data" method="post" id="subscribe">
                                    <ul>
                                        <li class="width-50">
                                           <!--  <input type="text" name="first_name" placeholder="First Name"> -->
                                           <label for="first_name">First Name</label>
                                             <input class="form-control" name="first_name" type="text" placeholder="First Name" value="<?php echo $user->first_name ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('first_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['first_name'];}?></label>
                                        </li>
                                        <li class="width-50">
                                           <label for="last_name">Last Name</label>
                                           <!--  <input type="text" name="last_name" placeholder="Last Name"> -->
                                             <input class="form-control" name="last_name" type="text" placeholder="Last Name" value="<?php echo $user->last_name ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('last_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['last_name'];}?></label>
                                        </li>
                                        <li>
                                          <label for="email">Email</label>
                                            <!-- <input type="email" name="email" placeholder="Email Address"> -->
                                             <input class="form-control" readonly style="cursor: no-drop;" name="email" type="text" placeholder="Email Address" value="<?php echo $user->email ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('email', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['email'];}?></label>
                                        </li>
                                        <li>
                                           <label for="billing_address">Billing Address</label>
                                            <!-- <input type="text" name="billing_address" placeholder="Billing Address/PO Box"> -->
                                             <input class="form-control" name="billing_address" type="text" placeholder="Billing Address/PO Box" value="<?php echo $user->billing_address ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('billing_address', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['billing_address'];}?></label>
                                        </li>
                                        <li>
                                          <label for="apartment">Apartment</label>
                                            <!-- <input type="text" name="apartment" placeholder="Apartment"> -->
                                             <input class="form-control" name="apartment" type="text" placeholder="Apartment" value="<?php echo $user->apartment ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('apartment', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['apartment'];}?></label>
                                        </li>
                                        <li class="width-50">
                                           <label for="city">City</label>
                                            <!-- <input type="text" name="city" placeholder="City"> -->
                                             <input class="form-control" name="city" type="text" placeholder="City" value="<?php echo $user->city ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('city', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['city'];}?></label>
                                        </li>
                                        <li class="width-50">
                                           <label for="state">State</label>
                                            <!-- <input type="text" name="state" placeholder="State"> -->
                                             <input class="form-control" name="state" type="text" placeholder="State" value="<?php echo $user->state ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('state', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['state'];}?></label>
                                        </li>
                                        <li class="width-50">
                                           <label for="zip_code">Zip Code</label>
                                            <!-- <input type="text" name="zip_code" placeholder="Zip Code"> -->
                                             <input class="form-control" name="zip_code" type="text" placeholder="Zip Code" value="<?php echo $user->zip_code ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('zip_code', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['zip_code'];}?></label>
                                        </li>
                                        <li class="width-50">
                                          <label for="country">Country</label>
                                            <!-- <input type="text" name="country" placeholder="Country"> -->
                                             <input class="form-control" name="country" type="text" placeholder="Country" value="<?php echo $user->country ?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('country', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['country'];}?></label>
                                        </li>
                                         <li class="width-100">
                                         <label for="country">Image <small>(Only png & jpg)</small></label>
                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="imageSubscriber" type="file" placeholder=""  >
                                             <?php if(!empty($user->image)) {
                                                   $ids= $this->session->userdata['userdata']['id'];
                                                ?>

                                                 <div class="image-profile imsgeromove" data-id="<?php echo $ids;?>" data-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-times"></i>
                                                     <img src="<?php echo base_url();?>uploads/userImages/<?php echo $user->image; ?>" alt="">
                                                 </div>
                                        <?php }else{ ?>

                                          <img src="<?php echo base_url();?>/assets/images/user.png" alt="">
                                      <?php } ?>
                                            <label  class="error" ><?php if ($this->session->flashdata('imageError1')!=""){echo $this->session->flashdata('imageError1');}?></label>
                                        </li>
                                       
                                    <!--     <li>
                                        
                                             <input class="form-control" id="password" name="password" type="password" placeholder="Password" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('password', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['password'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('password', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['password'];}?></label>
                                        </li> -->
                                      <!--   <li>
                                           
                                             <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('cpassword', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['cpassword'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('cpassword', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['cpassword'];}?></label>
                                        </li> -->
                                        <li>
                                           <!--  <p><input type="checkbox" name="terms"> I accept the <a href="terms-of-service.html">Terms of Service</a> & <a href="privacy-policy.html">Privacy Policy</a></p><br>
                                            <label id="terms-error" class="error" for="terms"></label> -->
                                            <input class="submit" type="submit" value="Update">

                                        </li>
                                        <!-- <li><p>Already have an  account? <a href="<?php echo base_url();?>login">Login here</a></p></li> -->
                                    </ul>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>

<script type="text/javascript">

</script>
