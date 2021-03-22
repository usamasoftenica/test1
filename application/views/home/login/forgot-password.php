
    <!--// Subheader \\-->
    <div class="ccg-subheader white-color" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Forgot your password</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="index.html">Home Page</a></li>
                            <li>Forget your password</li>
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

                                            <div class="alert alert-success alert-dismissible show">

                                                       <button type="button" class="close" data-dismiss="alert">×</button>
                                                      <?php echo $this->session->flashdata('success1'); ?>
                                                   </div>
                                                 

                                             <?php } ?>
                                <form action="<?php echo base_url(); ?>submit-Forgotpassword" method="post" id="forgot-form">
                                    <ul>
                                        <li>
                                            <input type="email" name="email" placeholder="Enter your Email Address">
                                        </li>
                                        <li>
                                            <input class="submit" type="submit" value="Forgot password">
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