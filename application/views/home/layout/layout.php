<!DOCTYPE html>
<html lang="en">
  <head>

   <?php 

        $this->db->select('head_area')->from('informationalhead') ;
      
        $query = $this->db->get();        
        $head_area = $query->result();

        if(!empty($this->session->userdata['userdata']['id'])){
          
          $this->db->select('subscription_id')->from('subscribe') ;
        $where = array('id' => $this->session->userdata['userdata']['id'] );



        $this->db->where($where);
        $query1 = $this->db->get();        
        $subs_id = $query1->result();

        }

        

   ?>
 <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-87114523-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-KVK2M1F53S');
        </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if(!empty($metadescription)){echo $metadescription; } ?>">
    <meta name="head_area" content="<?php if(!empty($head_area[0]->head_area)){echo $head_area[0]->head_area; } ?>">
  <meta name="keywords" content="<?php if(!empty($metakeywords)){echo $metakeywords; } ?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Colorado Campgrounds | <?php if(!empty($title)){echo $title; } ?></title>

    <!-- Css Files -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/png" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/lc_lightbox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/slick-slider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/t-scroll.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/pagination.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/jquery-confirm.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/script/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="<?php echo base_url();?>assets/admin/js/jquery.validate.js" type="text/javascript"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/script/additional-methods.min.js"></script>
           <script type="text/javascript" src="<?php echo base_url() ?>assets/script/pagination.js"></script>
               <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/datatables.min.js"></script>
               <script src="<?php echo base_url();?>assets/admin/js/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/script/blockui.min.js"></script>
     <style type="text/css">
  .error {
    color: red !important;
  }
  
</style>

  </head>
  <body>
	
  <?php 

        $this->db->select('description')->from('description') ;
      
        $query = $this->db->get();        
        $description = $query->result();
   ?>

    <?php

        $this->db->select('content')->from('about_us') ;
      
        $query = $this->db->get();        
        $content = $query->result();
   ?>




    <!--// Main Wrapper \\-->
    <div class="ccg-main-wrapper">    
        <!--// Header \\-->
        <header id="ccg-header" class="ccg-header-one home">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""></a>
                    </div>
                    <div class="col-md-10">
                        <div class="header-nav">
                            <!-- <div class="user-login">
                                <a href="#" class="fa fa-user"> <small>Jone Doe</small></a>
                                <ul>
                                    <li><a href="#">Dashborad</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div> -->
                        
                            <?php if(!isset($this->session->userdata['userdata']['id'])){ ?>

                            <div class="user-login-btn">
                                <a href="<?php echo base_url();?>login">Login</a> / <a href="<?php echo base_url();?>subscribe">Subscribe</a>
                            </div>
                            <?php } ?>
                            <!-- <ul class="header-social">
                              <li><a href="https://facebook.com/CoIoradoCampgrounds" target="_blank" class="fa fa-facebook"></a></li>
                              <li><a href="https://twitter.com/CoIoradoCamp" target="_blank" class="fa fa-twitter"></a></li>
                              <li><a href="https://pinterest.com/ColoradoCampgrounds" target="_blank" class="fa fa-pinterest"></a></li>
                              <li><a href="https://pinterest.com/ColoradoCampgrounds/boards" target="_blank" class="fa fa-pinterest"></a></li>
                              <li><a href="https://instagram.com/ColoradoCampgrounds" target="_blank" class="fa fa-instagram"></a></li>
                            </ul> -->
                            <a href="https://www.youtube.com/channel/UCcxazsQBro6UuDwH0relnGQ" target="_blank" class="header-btn"><i class="fa fa-youtube"></i> Youtube</a>
                            <nav class="navbar navbar-expand-lg">
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-bars"></span>
                              </button>

                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                  <li class="nav-item active">

									  <?php

									  $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

									  ?>

                                    <a class="<?php if ($currentURL==base_url()){ echo "active" ; } ?> nav-link" href="<?php echo base_url();?>">Home </a>
                                  </li>
                                   <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>explore">Explore</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>about-us">About</a>
                                  </li>

                                  
                									<li class="nav-item">
                										<a class="nav-link" href="<?php echo base_url(); ?>blog-brows">Blog</a>
                									</li>
                                

                                 <?php if(!empty($this->session->userdata['userdata']['id'])){?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ; ?>add-forum-page">Forum</a>
                                  </li>

                                <?php } ?>


                              
                                  <li class="nav-item">

              									  <?php

              									    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

              									  ?>

              									  <a class="<?php if ($currentURL==base_url()."information-pages/"){ echo "active" ; } ?> nav-link" href="<?php echo base_url();?>information-pages/">Information Pages</a>

                                  </li>

                              

                                  <?php if(!isset($this->session->userdata['userdata']['id'])){ ?>
                                  <li class="nav-item dnone"><a href="<?php echo base_url();?>login">Login</a></li>
                                  <li class="nav-item dnone"><a href="<?php echo base_url();?>subscribe">Subscribe</a></li>
                                  <?php } ?>
                                 <?php if(!empty($this->session->userdata['userdata']['id'])){?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>search">Campsite Search</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>top-rated-campsites">Our Favorites</a>
                                  </li>                               

                                 <!-- image and drop down -->
                                   <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <?php if(!empty($this->session->userdata['userdata']['image'])){
                                      $images=$this->session->userdata['userdata']['image'];
                                     ?>
                                       <img src="<?php echo base_url(); ?>uploads/userImages/<?php echo $this->session->userdata['userdata']['image']; ?>" alt="" style="width: 40px; height: 40px;">
                                       <small>Hello <?php echo $this->session->userdata['userdata']['first_name'] ?></small>
                                    <?php }else{ ?>
                                          <img src="<?php echo base_url(); ?>assets/images/user.png" alt="" style="width: 40px; height: 40px;">
                                         <small>Hello <?php echo $this->session->userdata['userdata']['first_name'] ?></small>
                                        <?php } ?>
                                </a>
                               
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php 
                                    echo base_url().'newsletters';?>">Newsletters</a>
                                    <?php if($this->session->userdata['userdata']['first_name']!='Camping' && $this->session->userdata['userdata']['last_name']!='Steve') {?>
                                  <a class="dropdown-item" href="<?php echo base_url();?>profile">Settings</a>
                                <?php } ?>
                                <?php if($this->session->userdata['userdata']['free_trial'] == 0) {?>
                                  <a class="dropdown-item" href="<?php echo base_url();?>favorite-campsites">Favorite Campsites</a>
                                <?php }?> 
                                  <?php if($this->session->userdata['userdata']['first_name']!='Camping' && $this->session->userdata['userdata']['last_name']!='Steve') {?>
                                <a class="dropdown-item" href="<?php echo base_url();?>my-payments">Payment list</a> 
                              <?php } ?>
                              <!--  <a class="dropdown-item" href="<?php echo base_url();?>information-pages/">Information Pages</a>  -->
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="<?php echo base_url() ?>update-password">Change Password</a>

                            

                                  <a id="del-account" class="dropdown-item" href="#">Delete Account</a>

                                  <?php if ($subs_id[0]->subscription_id != "" && $this->session->userdata['userdata']['status'] !=2) { ?>
                                    <a id="cancel-subs" class="dropdown-item" href="javascript:void()">Cancel Subscription</a>
                                  <?php } else if($this->session->userdata['userdata']['status'] !=2){?>
                                    <a class="dropdown-item" href="<?php echo base_url().'paypal-subscription/'. 
                                    $this->session->userdata['userdata']['id'];?>">Subscription for one year</a>
                                  <?php }?>
                                  <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
                                </div> 
                              </li> 
                                <?php }?>

                                 <!-- image and drop down -->
                                </ul>
                              </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--// Header \\-->

	<?php $this->load->view($yield) ?>

        <!--// Footer \\-->
        <footer id="ccg-footer" class="ccg-footer-one">
            
            <div class="ccg-footer-newsletter">
                <span class="newsletter-transpernt"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ccg-newsletter-text">
                                <h2>Subscribe to Our Newsletter</h2>
                                <p>Sign up to receive our latest campground review updates.</p>
                            </div>
                            <form method="post" id="subscribe-user">
                                <input name="email" id="sub-email" type="email" placeholder="Please enter email address">
                                <p id="sub-suc-msg"></p>
                                <input style="cursor: pointer" id="subscribeers-custom" type="button" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Footer Widget \\-->
            <div class="ccg-footer-widget">
                <span class="post-transpernt"></span>
                <div class="container">
                    <div class="row">
                        <!--// Widget widget text \\-->
                        <aside class="col-md-3 widget widget_text" style="text-align: center;">
                            <a href="<?php echo base_url(); ?> " class="footer-logo"><img src="<?php echo base_url();?>assets/images/footer-logo.png" alt=""></a>
                            <ul class="ccg-footer-social">
                                <li><a href="https://www.youtube.com/channel/UCcxazsQBro6UuDwH0relnGQ" class="fa fa-youtube" target="_blank"> <span>YouTube</span></a></li>
                            </ul>
                        </aside>
                        <!--// Widget widget text \\-->

                        <!--// Widget twitter feeds \\-->
                        <aside class="col-md-5 widget widget_text padding-none">
                            <div class="ccg-footer-title"><h2>About Us</h2></div>
                              <?php 
                              $data = strip_tags($content[0]->content) ;
                                         $data =  substr($data, 0, 160) .'...'; 

                              $data_1 = strip_tags($description[0]->description) ;
                                         $data_1 =  substr($data_1, 0, 160) .'...';
                                          ?>
                                          
                                       
                               <p><?php echo $data; ?><a style="color: white" href="<?php echo base_url(); ?>about-us">see more</a></p>
                                <!-- <div class="ccg-footer-title"><h2>Disclaimer</h2></div>
                            <p><?php //echo $data_1; ?><a style="color: white" href="<?php //echo base_url(); ?>disclaimer">see more</a></p> -->
            
                        </aside>
                        <!--// Widget twitter feeds \\-->

                        <!--// Widget twitter feeds \\-->
                        <aside class="col-md-4 widget widget_contact_info">
                          <div class="social-nt">
                            <div class="ccg-footer-title"><h2>Contact Info</h2></div>
                            <ul class="info-d">
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <p><a href="mailto:admin@coloradocampgrounds.us.com">admin@coloradocampgrounds.us.com</a></p>
                                </li>
                            </ul>
                          </div>
                            <div class="social-nt">
                              <div class="ccg-footer-title" style="margin: 30px 0px 0px;"><h2>Social Media</h2></div>
                            <ul class="header-social">
                              <li><a href="https://facebook.com/ColoradoCampgroundsLLC" target="_blank" class="fa fa-facebook"></a></li>
                              <!-- <li><a href="https://twitter.com/CoIoradoCamp" target="_blank" class="fa fa-twitter"></a></li> -->
                              <li><a href="https://instagram.com/ColoradoCampgroundsLLC" target="_blank" class="fa fa-instagram"></a></li>
<!--                              <li><a href="https://pinterest.com/ColoradoCampgrounds/boards" target="_blank" class="fa fa-pinterest"></a></li>-->
                              <li><a href="https://pinterest.com/ColoradoCampgroundsLLC" target="_blank" class="fa fa-pinterest"></a></li>
                            </ul>
                            </div>
                        </aside>
                        <!--// Widget twitter feeds \\-->

                        <div class="col-md-12">
                            <div class="ccg-copyright">
                              <p>Developed by <a href="https://www.softenica.com/" target="_blank">Softenica Technologies</a></p>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>term-of-service">Terms of Service</a></li>
                                    <li><a href="<?php echo base_url(); ?>disclaimer">Disclaimer</a></li>
                                    <li><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--// Footer Widget \\-->

        </footer>
        <a href="#" class="top-btn fa fa-angle-up"></a>
        <?php 
          if(isset($subs_id)){
             ?>
             <input type="hidden" name="" id="subId" value="<?php echo $subs_id[0]->subscription_id ?>">

             <?php 
          }else{


                       ?>
             <input type="hidden" name="" id="subId" value="0">

             <?php 

          }
        ?>
        <!--// Footer \\-->
<input type="hidden" id="jquery_id" value="<?php if(isset($this->session->userdata['userdata']['id'])){ echo $this->session->userdata['userdata']['id']; } ; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/toastr.min.css">
         <script src="<?php echo base_url();?>assets/admin/js/toastr.min.js"></script>

<script type="text/javascript">

  var base_url = "<?php echo base_url(); ?>" ;
  
  var id = $('#jquery_id').val();

<?php if($this->session->flashdata('success')){ ?>

    toastr.success("<?php echo $this->session->flashdata('success'); ?>");

<?php }else if($this->session->flashdata('error')){  ?>

    toastr.error("<?php echo $this->session->flashdata('error'); ?>");

<?php }else if($this->session->flashdata('warning')){  ?>

    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");

<?php }else if($this->session->flashdata('info')){  ?>

    toastr.info("<?php echo $this->session->flashdata('info'); ?>");

<?php }else if($this->session->flashdata('info')){  ?>

    toastr.info("<?php echo $this->session->flashdata('info'); ?>");

<?php } ?>


$('#del-account').click(function(){
      $.confirm({
        title: "Delete Account",
        content: "Are you realy want to delete your account! once you delete you will never be able to recover this.",
        buttons: {
            confirm: function () {

                          $.ajax({

                           url: base_url+'delete-account',
                           type: 'POST',
                            data:{
                               id:id,
                            },
                          success: function(data){

                            if (data == 1) {

                                window.location = base_url+"login";
                            }
                             
                            }
                        
                     });


            },
            cancel: function () {
              //  $.alert('Canceled!');
            },
          
        }
    });
}) ;



//cancel subscripton
  
 $('#cancel-subs').click(function(){
      var subId = $("#subId").val()
      $.confirm({
        title: "Cancel Subscription",
        content: "Are you realy want to cancel your subscripton.",
        buttons: {
            confirm: function () {

              window.location = base_url+"cancel-subscription/"+subId;

            },
            cancel: function () {
              //  $.alert('Canceled!');
            },
          
        }
    });
}) ;

//end cancel subscripton

</script>
	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->


	<!-- jQuery (necessary for JavaScript plugins) -->
	
     <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-ui.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script/slick.slider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script/t-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script/lc_lightbox.lite.js"></script>


    <script type="text/javascript" src="<?php echo base_url();?>assets/script/functions.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/script/custom.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/script/numscroller.js"></script>

  </body>
</html>
