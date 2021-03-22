  <div class="ccg-subheader white-color" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Update Password</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home Page</a></li>
                            <li>Update Password</li>
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
                                <form action="<?php echo base_url();?>setpassword" method="post" id="subscribe">
                                    <ul>
                                      
                                          <li>
                                            <a href="javascript:void(0)" id="op_show" class="fa fa-eye"></a>
                                          <a href="javascript:void(0)" id="op_show2" class="fa fa-eye-slash"></a>
                                         <input class="form-control op_show" id="oldPassword" name="oldPassword" type="password" placeholder="Old Password" value="" >
                                         <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('oldPassword', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['oldPassword'];}?></label>
                                        </li>
                                       
                                       
                                       <li>
                                        <a href="javascript:void(0)" id="p_show" class="fa fa-eye"></a>
                                          <a href="javascript:void(0)" id="p_show2" class="fa fa-eye-slash"></a>
                                         <input class="form-control p_show" id="password" name="password" type="password" placeholder="Password" value="" >
                                         <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('password', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['password'];}?></label>
                                        </li>
                                      <li>
                                        <a href="javascript:void(0)" id="cp_show" class="fa fa-eye"></a>
                                          <a href="javascript:void(0)" id="cp_show2" class="fa fa-eye-slash"></a>
                                           
                                             <input class="form-control cp_show" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" value="" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('cpassword', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['cpassword'];}?></label>
                                        </li> 
                                        <li>
                                           <!--  <p><input type="checkbox" name="terms"> I accept the <a href="terms-of-service.html">Terms of Service</a> & <a href="privacy-policy.html">Privacy Policy</a></p><br>
                                            <label id="terms-error" class="error" for="terms"></label> -->
                                            <input class="submit" type="submit" value="Update Password">
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
