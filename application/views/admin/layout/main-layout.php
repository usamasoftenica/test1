<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Colorado Campgrounds | <?php if(!empty($title)){echo $title;} ?></title>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/admin/img/favicon.png">
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/select/select2.min.css" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/multiple-select.min.css">

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url();?>assets/admin/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url();?>assets/admin/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/admin/css/datepicker.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>assets/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/lc_lightbox.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets/admin/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/additional-methods.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/jquery-confirm.min.css">
    <script src="<?php echo base_url();?>assets/admin/js/jquery-confirm.min.js"></script>
    <?php
    if(  base_url().'admin/add-newsletter' != "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']){
    ?>
    <script src="<?php echo base_url();?>assets/admin/js/editor/ckeditor.js"></script>
    <?php
    }
    ?>
    <link href="<?php echo base_url();?>assets/admin/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/responsive.css" rel="stylesheet" />
</head>
<body>
  <input type="hidden" value="<?php echo base_url();?>" id="url" name="url">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url();?>assets/admin/img/sidebar-5.jpg">

   
      <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url();?>admin/dashboard" class="simple-text"><img src="<?php echo base_url();?>assets/admin/img/logo.png" alt=""></a>
            </div>

             <ul class="nav">
               <li><a href="<?php echo base_url();?>admin/dashboard"><i class="pe-7s-menu"></i><p>Dashboard</p></a></li>
               <li><a href="<?php echo base_url();?>admin/add-new-region"><i class="pe-7s-menu"></i><p>Region Maps</p></a></li>

               <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>Campgrounds</p></a>
                    <ul class="ccg-dropdown-menu">
                       <li><a href="<?php echo base_url();?>admin/add-parent-campground"><p>Add Parent Campground</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/parent-campground-list"><p>Parent Campground List</p></a></li>
                       <!-- save as draft list -->
                       <!--  <li><a href="<?php echo base_url();?>admin/draft-parent-campground-list"><p>Draft List of Parent Campground</p></a></li> -->
                       <!--  -->
                       <li><a href="<?php echo base_url();?>admin/add-child-campground"><p>Add Child Campground</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/child-campground-list"><p>Child Campgrounds List</p></a></li>
                       <!-- child campgorund -->
                      <!--  <li><a href="<?php echo base_url();?>admin/draft-child-campground-list"><p>Draft List of Child Campground</p></a></li> -->

                       <li><a href="<?php echo base_url();?>admin/add-site-description"><p>Add Site Description</p></a></li>

                       <li><a href="<?php echo base_url();?>admin/site-description-excel-import"><p>Import Site Description</p></a></li>

                       <li><a href="<?php echo base_url();?>admin/site-description-list"><p>Site Description Detail List</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/add-site-parameters"><p>Site Parameters</p></a></li>
                   </ul>
               </li>
                <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>information Pages</p></a>
                    <ul class="ccg-dropdown-menu">
                       <li><a href="<?php echo base_url();?>admin/add-informational-page"><p>Add Information Page</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/informational-pages"><p>Information Pages List</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/homepage-content"><p>Add Homepage Content</p></a></li>
                    
                       <li><a href="<?php echo base_url();?>admin/add-informational-head"><p>Add Header Data</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/view-all-comments"><p>pending comments/replies</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/approve-all-comments"><p>Approved comments/replies</p></a></li>

                   </ul>
                </li>
                <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>Subscribers</p></a>
                    <ul class="ccg-dropdown-menu">
                       <li><a href="<?php echo base_url(); ?>admin/create-subscriber"><p>Create Subscriber</p></a></li>

                       <li><a href="<?php echo base_url(); ?>admin/payment-list"><p>Subscriber Payments</p></a></li>
                       <li><a href="<?php echo base_url(); ?>admin/set-payment"><p>Set Payment</p></a></li>
                       <li><a href="<?php echo base_url(); ?>admin/set-expiry-email-days"><p>Set Expiry Email Days</p></a></li>

                       <li><a href="<?php echo base_url(); ?>admin/subscriber-list"><p>Subscribers List</p></a></li>
                       <li><a href="<?php echo base_url(); ?>admin/free-trial-list"><p>Trial Subscribers List</p></a></li>
                       <li><a href="<?php echo base_url(); ?>admin/newsletter-list"><p>Newsletter List</p></a></li>

                      <!--  <li><a href="<?php echo base_url(); ?>admin/outbound-email"><p>Outbound Email</p></a></li> -->
                   </ul>
                </li>
                 <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>SEO Information</p></a>
                     <ul class="ccg-dropdown-menu">
                         <li><a href="<?php echo base_url(); ?>admin/region-seo"><p>SEO info for Region</p></a></li>
                         <li><a href="<?php echo base_url(); ?>admin/home-seo"><p>SEO info for Homepage</p></a></li>
                     </ul>
                 </li>
               <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>Blog</p></a>
                    <ul class="ccg-dropdown-menu">
                       <li><a href="<?php echo base_url();?>admin/add-blog-page"><p>Add New Blog</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/list-blogs"><p>Blog List</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/blog-comments"><p>pending comments/replies</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/approved-comments-blog"><p>Approved comments/replies</p></a></li>
                   </ul>
               </li>

               <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>Newsletters</p></a>
                    <ul class="ccg-dropdown-menu">
                       <li><a href="<?php echo base_url();?>admin/add-newsletter"><p>Add New Newsletter</p></a></li>
                       <li><a href="<?php echo base_url();?>admin/newsletters-list"><p>Newsletters List</p></a></li>
                   </ul>
               
               </li>
				 <li class="ccg-dropdown"><a href="javascript:void(0)"><i class="pe-7s-way"></i><p>forums</p></a>
					 <ul class="ccg-dropdown-menu">
						 <li><a href="<?php echo base_url();?>admin/pending-forums"><p>pending Topics</p></a></li>
						 <li><a href="<?php echo base_url();?>admin/approve-forums"><p>approved Topics</p></a></li>
						 <li><a href="<?php echo base_url();?>admin/forum-comments"><p>pending Comments/Replies</p></a></li>
						 <li><a href="<?php echo base_url();?>admin/approved-comments-forum"><p>Approved Comments/Replies</p></a></li>
					 </ul>
				 </li>
               <li><a href="<?php echo base_url();?>admin/add-disclaimer"><i class="pe-7s-menu"></i><p>Add Disclaimer</p></a></li>
               <li><a href="<?php echo base_url();?>admin/term_of_service"><i class="pe-7s-menu"></i><p>Add terms of service</p></a></li>
               <li><a href="<?php echo base_url();?>admin/add_policy"><i class="pe-7s-menu"></i><p>Add privacy policy</p></a></li>
               <li><a href="<?php echo base_url();?>admin/add_about_us"><i class="pe-7s-menu"></i><p>Add About Us</p></a></li>
               <!-- <li><a href="javascript:void(0)"><i class="pe-7s-menu"></i><p>Annual Subscription</p></a></li> -->
               <li><a href="<?php echo base_url();?>admin/profile"><i class="pe-7s-menu"></i><p>Profile</p></a></li>
               <li><a href="<?php echo base_url();?>admin/take-peak"><i class="pe-7s-menu"></i><p>Take a peek page</p></a></li>
               <li><a href="<?php echo base_url();?>admin/library"><i class="pe-7s-menu"></i><p>Library</p></a></li>
           </ul>
      </div>
    </div>

    <div class="main-panel">

       <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>admin/dashboard">Admin</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right hd-btns">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-info btn-fill pull-right color-red" style="margin: 12px 3px 0;">
                                <p>Log out</p>
                            </a>
                        </li>
                          <li>
                            <a href="<?php echo base_url(); ?>assets/database/backup.php" class="btn btn-info btn-fill pull-right color-red" style="margin: 12px 3px 0;">
                                <p>Backup DB</p>
                            </a>
                        </li>
            <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


<?php $this->load->view($yield) ?>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <a href="#" target="_blank" style="float: left; width: 230px;"><img src="<?php echo base_url();?>assets/admin/img/logo.png" alt=""></a>
                </nav>
                <p class="copyright pull-right">
                    © <?php echo date("Y");?> All Right Reserved.
                </p>
            </div>
        </footer>

    </div>
</div>

</body>
<div class="loader-gif" id="gif" style="display: none;"><div class="ccg-table"><div class="ccg-table-cell"><img src="<?php echo base_url();?>assets/images/throbber_12.gif"></div></div></div>
<script type="text/javascript">
         $('#add_information_page').on('submit', function(){
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

          $(document).on('click','.cke_dialog_ui_button', function(){

                setInterval(function(){
                 if($('.cke_dialog_tabs a:first-child').hasClass('cke_dialog_tab_selected'))
                 {
                    $('#gif').hide() ;
                 }

             }, 1000);

                $('#gif').show() ;
          }) ;

         </script>

    <!--   Core JS Files   -->
   <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-ui.js" ></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/select/select2.full.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/multiple-select.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/datepicker.js"></script>

    <!--  Charts Plugin -->
   <script src="<?php echo base_url();?>assets/admin/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url();?>assets/admin/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<script src="<?php echo base_url();?>assets/admin/js/toster.js"></script>
    
    <script src="<?php echo base_url();?>assets/admin/js/demo.js"></script>
      <script src="<?php echo base_url();?>assets/admin/js/functions.js"></script>
      
          <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/custom.js"></script>
          <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/informationalCustom.js"></script>
          <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/lc_lightbox.lite.js"></script>

          <script src="<?php echo base_url();?>assets/admin/js/toastr.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/toastr.min.css">

<script type="text/javascript">


<?php if($this->session->flashdata('success')){ ?>

    toastr.success("<?php echo $this->session->flashdata('success'); ?>");

<?php }else if($this->session->flashdata('error')){  ?>

    toastr.error("<?php echo $this->session->flashdata('error'); ?>");

<?php }else if($this->session->flashdata('warning')){  ?>

    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");

<?php }else if($this->session->flashdata('info')){  ?>

    toastr.info("<?php echo $this->session->flashdata('info'); ?>");

<?php }else if($this->session->flashdata('error1')){ ?>
  toastr.error("<?php echo $this->session->flashdata('error1'); ?>");
<?php } ?>


</script>

     <script type="text/javascript">
    //     $(document).ready(function(){
    //         demo.initChartist();
    //     });
var path = window.location.pathname.split("/").pop();
 var target = $('a[href*="'+path+'"]');
 target.addClass('active');


 $('.active').parents('.ccg-dropdown').addClass('dropdown-active');


 // image popup lightbox
    lc_lightbox('.elem', {
        wrap_class: 'lcl_fade_oc',
        gallery : true, 
        thumb_attr: 'data-lcl-thumb', 
        
        skin: 'minimal',
        radius: 0,
        padding : 0,
        border_w: 0,
    }); 


    $(document).ready(function () {
        $(".select2_single").select2({
            placeholder: "Select Parent Campground",
            allowClear: true
        });
      });
       $(document).ready(function () {
        $(".select2_single_child").select2({
            placeholder: "Select Child Campground",
            allowClear: true
        });
      });


   </script>

     <?php
    if(  base_url().'admin/add-newsletter' != "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']){
    ?>

   <script>
  CKEDITOR.replace( 'description', {
    // extraPlugins: 'easyimage',
filebrowserBrowseUrl: '<?php echo base_url() ?>images/',
    filebrowserImageBrowseUrl: '<?php echo base_url() ?>images/',
filebrowserUploadUrl : '<?php echo base_url() ?>ckeditor-upload-image?id=1',
filebrowserImageUploadUrl :  '<?php echo base_url() ?>ckeditor-upload-image?id=1',
// ConfigUserFilesPath : "http://www.coloradocampgrounds.development-env.com/images/",
});

</script>

<?php
}
?>

</html>
