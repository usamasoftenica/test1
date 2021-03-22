<!--// Main Content \\-->
		<div class="ccg-main-content">

            <!--// Main Section \\-->
            <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ccg-sign-form">
                               <h2>Code Verification</h2>
                                  <?php if($this->session->flashdata('success1')!=""){  ?>
                                            <div class="alert alert-success">
                                                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                       <strong></strong> <?php echo $this->session->flashdata('success1'); ?>
                                                   </div>
                                             <?php } ;?>
                                              <?php if($this->session->flashdata('validation_error')!=""){  ?>
                                            <div class="alert alert-danger">
                                                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                       <strong></strong> <?php echo $this->session->flashdata('validation_error'); ?>
                                                   </div>
                                             <?php } ;?>
                                               <?php if($this->session->flashdata('error1')!=""){  ?>
                                            <div class="alert alert-danger">
                                                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                       <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                   </div>
                                             <?php } ;?>

                                             <strong>To verify your email address:</strong>
                                             <p>* Please click the verification link in the Email</p>
                                             <p style="margin: 0px 0px 30px;">* Or enter the code here which is sent in the email</p>
                                <form action="<?php echo base_url();?>Codesubmit" method="post" id="codeVerification">
                                    <ul>
                                        <li style="margin: 0px 0px 15px;">
                                            <label>Enter Verification Code</label>
                                            <input class="form-control" name="code" type="text" placeholder="Enter Verification code">
                                        </li>
                                      
                                        <li>
                                            <p style="text-align: left;"><a href="<?php echo base_url();?>create-new-verification-code">Didn't recieve the email? Resend Verification Email</a></p>
                                            <input type="submit" class="submit" value="Submit">
                                           <!--  <p>No account yet?  <a href="<?php echo base_url();?>home/register">Creat an account</a></p> -->
                                        </li>
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
		<!--// Main Content \\-->