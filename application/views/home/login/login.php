<!--// Subheader \\-->
		<div class="ccg-subheader white-color" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Login</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="/">Home Page</a></li>
                            <li>Login</li>
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
                            <div class="ccg-sign-form ">
                                <h2>Log in</h2>
                                  <?php if($this->session->flashdata('error1')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                  </div>
                                            <?php } ;?>

<?php if($this->session->flashdata('error4')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error4'); ?>
                                                      
                                                  </div>
                                            <?php } ;?>
  <?php if($this->session->flashdata('success1')!=""){  ?>

<div class="alert alert-success alert-dismissible show">

           <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('success1'); ?>
       </div>
     

 <?php } ?>

                               <form action="<?php echo base_url();?>submit" method="post" id="loginFormuser">
                                    <ul>
                                        <li>
                                           <input class="form-control" name="email" type="text" placeholder="Email Address" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['email'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('email', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['email'];}?></label>
                                        </li>
                                        <li>
                                          <a href="javascript:void(0)" id="p_show" class="fa fa-eye"></a>
                                          <a href="javascript:void(0)" id="p_show2" class="fa fa-eye-slash"></a>
                                            <input class="form-control p_show" type="password" name="password" placeholder="Password">
                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('password', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['password'];}?></label>
                                            <a href="<?php echo base_url() ?>forgot-password">Forgot your password?</a>
                                        </li>
                                        <li>
                                            <input class="submit" type="submit" value="Login">
                                        </li>
                                        <li><p>Not registered? <a href="<?php echo base_url();?>subscribe">Create an Account</a></p></li>
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

<script>

	$( "#loginFormuser" ).submit(function( event ) {
		window.location.history.go(-2) ;
	});





</script>
