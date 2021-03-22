

<!--// Subheader \\-->

        <div class="ccg-subheader white-color" style="background-image: url('images/sub-header-img.jpg');">

            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <h1>Free trial</h1>

                        <ul class="ccg-breadcrumb">

                            <li><a href="<?php echo base_url();?>">Home Page</a></li>

                            <li>Free trial</li>

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

                                <h2>
                                  <ul>
                                    <li style="list-style-position: outside;">If you prefer a subscription 
                                      <u><a href="<?php echo base_url();?>subscribe">Click here</a></u>
                                    </li>
                                    <li style="list-style-position: outside;">If you prefer a one month's free trial to Colorado Campgrounds, please provide the following.</li>
                                  </ul>
                                  </h2>

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

                                           

                                <form action="<?php echo base_url();?>subscribe/trial/store" enctype="multipart/form-data" method="post" id="subscribe">

                                    <ul>

                                        <li class="width-50">

                                           <!--  <input type="text" name="first_name" placeholder="First Name"> -->

                                             <input class="form-control" name="first_name" type="text" placeholder="First Name" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['first_name'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('first_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['first_name'];}?></label>

                                        </li>

                                        <li class="width-50">

                                           <!--  <input type="text" name="last_name" placeholder="Last Name"> -->

                                             <input class="form-control" name="last_name" type="text" placeholder="Last Name" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('last_name', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['last_name'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('last_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['last_name'];}?></label>

                                        </li>

                                        <li>

                                            <!-- <input type="email" name="email" placeholder="Email Address"> -->

                                             <input class="form-control" name="email" type="text" placeholder="Email Address" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('email', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['email'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('email', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['email'];}?></label>

                                        </li>

                                        <li>

                                            <!-- <input type="text" name="billing_address" placeholder="Billing Address/PO Box"> -->

                                             <input class="form-control" name="billing_address" type="text" placeholder="Billing Address/PO Box" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('billing_address', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['billing_address'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('billing_address', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['billing_address'];}?></label>

                                        </li>

                                        <li>

                                            <!-- <input type="text" name="apartment" placeholder="Apartment"> -->

                                             <input class="form-control" name="apartment" type="text" placeholder="Apartment" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('apartment', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['apartment'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('apartment', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['apartment'];}?></label>

                                        </li>

                                        <li class="width-50">

                                            <!-- <input type="text" name="city" placeholder="City"> -->

                                             <input class="form-control" name="city" type="text" placeholder="City" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('city', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['city'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('city', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['city'];}?></label>

                                        </li>

                                        <li class="width-50">

                                            <!-- <input type="text" name="state" placeholder="State"> -->

                                             <input class="form-control" name="state" type="text" placeholder="State" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('state', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['state'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('state', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['state'];}?></label>

                                        </li>

                                        <li class="width-50">

                                            <!-- <input type="text" name="zip_code" placeholder="Zip Code"> -->

                                             <input class="form-control" name="zip_code" type="text" placeholder="Zip Code" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('zip_code', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['zip_code'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('zip_code', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['zip_code'];}?></label>

                                        </li>

                                        <li class="width-50">

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="country" type="text" placeholder="Country" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('country', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['country'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('country', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['country'];}?></label>

                                        </li>

                                       

                                        <li>

                                          <a href="javascript:void(0)" id="p_show" class="fa fa-eye"></a>

                                          <a href="javascript:void(0)" id="p_show2" class="fa fa-eye-slash"></a>

                                            <!-- <input type="password" name="password" id="password" placeholder="Password"> -->

                                             <input class="p_show form-control" id="password" name="password" type="password" placeholder="Password" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('password', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['password'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('password', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['password'];}?></label>

                                        </li>

                                        <li>

                                          <a href="javascript:void(0)" id="cp_show" class="fa fa-eye"></a>

                                          <a href="javascript:void(0)" id="cp_show2" class="fa fa-eye-slash"></a>

                                            <!-- <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"> -->

                                             <input class="cp_show form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('cpassword', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['cpassword'];}?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('cpassword', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['cpassword'];}?></label>

                                        </li>

                                         <li class="width-100">

                                          <label for="country">Image <small>(Only png & jpg)</small></label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="imageSubscriber" type="file" placeholder=""  >



                                          

                                            <label  class="error" ><?php if ($this->session->flashdata('imageError1')!=""){echo $this->session->flashdata('imageError1');}?></label>

                                        </li>
                                        <input id="payb" value="1" type="radio" checked="" name="pay" style="display: none">
                                        <li><label id="pay-error" class="error" for="pay"><?php if ($this->session->flashdata('error')!="" && array_key_exists('pay', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['pay'];}?></label></li>

                                        <li>

                                            <p><input type="checkbox" name="terms"> I accept the <a href="terms-of-service.html">Terms of Service</a> & <a href="privacy-policy.html">Privacy Policy</a></p><br>

                                            <label id="terms-error" class="error" for="terms"></label>

                                            <input class="submit" type="submit" value="Subscribe">

                                        </li>

                                        <li><p>Already have an  account? <a href="<?php echo base_url();?>login">Login here</a></p></li>

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


        <!-- Modal -->

<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Free Trial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Complete the form below to initiate your one-month free trial to Colorado Campgrounds.  You will receive a message before the end of your trial period notifying you that you will be billed $9.99 for your annual subscription OR you may select to cancel your subscription.  Thanks for checking us out!</p>
      </div>

    </div>
  </div>
</div>



 <script type="text/javascript">
   
$( document ).ready(function() {
        $('#myModal').modal('show');
    });
</script>



    