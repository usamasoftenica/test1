<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Colorado Campgrounds | Login</title>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/admin/img/favicon.png">
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url();?>assets/admin/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url();?>assets/admin/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <link href="<?php echo base_url();?>assets/admin/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/responsive.css" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>assets/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/custom.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets/admin/js/jquery.3.2.1.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/additional-methods.min.js" type="text/javascript"></script>

  </head>
  <body class="user">
	
    <div class="wrapper">

        <div class="main-panel" style=" width: 100%;">

            <!--// Main Content \\-->
    		<div class="content" style="height: 100%;">
                <div class="admin-table">
                    <div class="admin-table-cell">
                        <div class="admin-login">
    <?php if($this->session->flashdata('validation_error')!=""){  ?>

      <div class="alert alert-danger alert-dismissible fade show">
           <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('validation_error'); ?>
       </div>

<?php } ;?>
                            <h2>Login</h2>
                            <form action="<?php echo base_url();?>admin/submit" method="post" id="adminLogin">
     <?php if($this->session->flashdata('login_error')!=""){  ?>

<div class="alert alert-danger alert-dismissible show">

           <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('login_error'); ?>
       </div>
     

 <?php } ?>

  <?php if($this->session->flashdata('success')!=""){  ?>

<div class="alert alert-success alert-dismissible show">

           <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $this->session->flashdata('success'); ?>
       </div>
     

 <?php } ?>

                                <ul>
                                    <li><input type="email" name="email" placeholder="Enter Your Email"></li>
                                    <li><input type="password" name="password" placeholder="Enter Your Password"></li>
                                    <li><a href="<?php echo base_url();?>admin/forget-password">Forgot Password</a> <div class="clearfix"></div><input type="submit" value="Login"></li>
                                </ul>
                            </form>
                            <a href="#"><img src="<?php echo base_url();?>assets/admin/img/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
    		<!--// Main Content \\-->

	   </div>
	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->

	<!--   Core JS Files   -->
    
	<script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>assets/admin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap-notify.js"></script>

    
	<script src="<?php echo base_url();?>assets/admin/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/functions.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/custom.js"></script>

  </body>
</html>