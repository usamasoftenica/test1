<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'HomeController';
$route['404_override'] = 'user/UserController/errorpage';
$route['translate_uri_dashes'] = FALSE;

$route['404'] = 'user/UserController/errorpage';

$route['explore'] = 'HomeController/explore';

$route['example-campground-campsite'] = 'HomeController/exampleCampground';
$route['delete-account'] = 'HomeController/delAccount';

$route['cancel-subscription/(:any)'] = 'user/UserController/cancelSubscription/$1';

//NewsLetter
$route['newsletters'] = 'HomeController/newsletters'; 

//auth
$route['admin/take-peak']='admin/AdminController/take_peak';
$route['admin/take-peak-save']='admin/AdminController/take_peak_save';

$route['admin/login']='admin/AdminController';
$route['admin/submit']='admin/AdminController/submitLogin';

//forget password
$route['admin/forget-password']='admin/AdminController/forget_password';
$route['admin/check-email']='admin/AdminController/check_email';
$route['admin/varify_code/(:any)'] = "admin/AdminController/verify_code/$1";
$route['admin/check-email']='admin/AdminController/check_email';
$route['admin/update-password']='admin/AdminController/update_password';

$route['admin/logout']='admin/AdminController/logout';

$route['admin/dashboard']='admin/AdminController/dashboard';
$route['admin/profile']='admin/AdminController/profile';
$route['admin/update_profile']='admin/AdminController/update_profile';

//parent compground
$route['admin/add-parent-campground']='admin/ParentCampGroundController/add_parentCampGround';
$route['admin/new-parent-campground']='admin/ParentCampGroundController/new_parentCampGround';
$route['admin/parent-campground-list']='admin/ParentCampGroundController/parent_campground_list';
// $route['admin/draft-parent-campground-list']='admin/ParentCampGroundController/draft_parent_campground_list';
$route['admin/parent-campground-detail/(:any)'] = 'admin/ParentCampGroundController/parent_details/$1';
$route['admin/parent-campground-edit/(:any)'] = 'admin/ParentCampGroundController/parent_edit/$1';
$route['admin/update-parent-campground']='admin/ParentCampGroundController/update_parentCampGround';
$route['admin/parent-excel-file']='admin/ParentCampGroundController/excelfile';


//child compground
$route['admin/add-child-campground']='admin/ChildCampGroundController/add_childCampGround';
$route['admin/new-child-campground']='admin/ChildCampGroundController/new_childCampGround';
$route['admin/child-campground-list']='admin/ChildCampGroundController/child_campground_list';
// draft
// $route['admin/draft-child-campground-list']='admin/ChildCampGroundController/draft_child_campground_list';


$route['admin/child-campground-detail/(:any)'] = 'admin/ChildCampGroundController/child_details/$1';
$route['admin/child-campground-edit/(:any)'] = 'admin/ChildCampGroundController/child_edit/$1';
$route['admin/update-child-campground']='admin/ChildCampGroundController/update_childCampGround';
$route['admin/child-excel-file']='admin/ChildCampGroundController/excelfile';



// site description
$route['admin/add-site-description']='admin/SiteDescriptionController/add_site_description';

$route['admin/new-site-description']='admin/SiteDescriptionController/new_siteDescription';
$route['admin/site-description-list']='admin/SiteDescriptionController/site_description_list';
$route['admin/site-description-details/(:any)'] = 'admin/SiteDescriptionController/site_description_details/$1';
$route['admin/site-description-edit/(:any)'] = 'admin/SiteDescriptionController/site_description_edit/$1';
$route['admin/update-site-description'] = 'admin/SiteDescriptionController/update_site_description';

//import active
$route['admin/activate-site-description'] = 'admin/SiteDescriptionController/publishImpoortSite';
//end import active
$route['admin/site-description-excel'] = 'admin/SiteDescriptionController/excelfile';

$route['admin/site-description-excel-import'] = 'admin/SiteDescriptionController/importVew';

$route['admin/site-description-excel-imported'] = 'admin/SiteDescriptionController/importedExcelCamp';


$route['admin/delete-site-image'] = 'admin/SiteDescriptionController/delSiteImg';

//////////////site parameter
$route['admin/add-site-parameters']='admin/SiteParametersController/add_site_parameters';

//spacing
$route['admin/new-spacing']='admin/SiteParametersController/new_spacing';
$route['admin/update-spacing']='admin/SiteParametersController/update_spacing';

//Type of View
$route['admin/new_type_view']='admin/SiteParametersController/new_type_view';
$route['admin/update-view']='admin/SiteParametersController/update_view';
$route['sortspacingview']='admin/SiteParametersController/sortspacingview';
//comping
$route['admin/new_comping']='admin/SiteParametersController/new_comping';
$route['admin/update-compimg']='admin/SiteParametersController/update_comping';
$route['sortcamping']='admin/SiteParametersController/sortcamping';
//trailer
$route['admin/new_trailer']='admin/SiteParametersController/new_trailer';
$route['admin/update-trailer']='admin/SiteParametersController/update_trailer';
//for length
$route['sortlength']='admin/SiteParametersController/sortlength';
//grade
$route['admin/new_grade']='admin/SiteParametersController/new_grade';
$route['admin/update-grade']='admin/SiteParametersController/update_grade';
$route['sortgrade']='admin/SiteParametersController/sortgrade';
//base
$route['admin/new_base']='admin/SiteParametersController/new_base';
$route['admin/update-base']='admin/SiteParametersController/update_base';
$route['sortbase']='admin/SiteParametersController/sortbase';
//access
$route['admin/new_access']='admin/SiteParametersController/new_access';
$route['admin/update-access']='admin/SiteParametersController/update_access';
$route['sorting_access']='admin/SiteParametersController/access_sorting';
//amps
$route['admin/new_amps']='admin/SiteParametersController/new_amps';
$route['admin/update-amps']='admin/SiteParametersController/update_amps';
$route['sortamps']='admin/SiteParametersController/sortamps';
//water
$route['admin/new_water']='admin/SiteParametersController/new_water';
$route['admin/update-water']='admin/SiteParametersController/update_water';
$route['sortwater']='admin/SiteParametersController/sortwater';
//sewer
$route['admin/new_sewer']='admin/SiteParametersController/new_sewer';
$route['admin/update-sewer']='admin/SiteParametersController/update_sewer';
$route['sortsewer']='admin/SiteParametersController/sortsewer';
//verizon
$route['admin/new_verizon']='admin/SiteParametersController/new_verizon';
$route['admin/update-verizon']='admin/SiteParametersController/update_verizon';
$route['sortverizon']='admin/SiteParametersController/sortverizon';
//wifi
$route['admin/new_wifi']='admin/SiteParametersController/new_wifi';
$route['admin/update-wifi']='admin/SiteParametersController/update_wifi';
$route['sortwifi']='admin/SiteParametersController/sortwifi';
//Cable
$route['admin/new_cable']='admin/SiteParametersController/new_cable';
$route['admin/update-cable']='admin/SiteParametersController/update_cable';
$route['sortcable']='admin/SiteParametersController/sortcable';
//shade
$route['admin/new_shade']='admin/SiteParametersController/new_shade';
$route['admin/update-shade']='admin/SiteParametersController/update_shade';
$route['sortshade']='admin/SiteParametersController/sortshade';
//table
$route['admin/new_table']='admin/SiteParametersController/new_table';
$route['admin/update-table']='admin/SiteParametersController/update_table';

$route['admin/subscriber-list']='admin/Subscriber/listing';
$route['admin/free-trial-list']='admin/Subscriber/freeTrialListing';
$route['admin/newsletter-list']='admin/Subscriber/newsletter';


$route['admin/subscriber-details/(:any)']='admin/Subscriber/subscriberDetails/$1';
$route['admin/edit-subscriber/(:any)']='admin/Subscriber/editSubscriber/$1';
$route['admin/updateSubscribe/(:any)']='admin/Subscriber/updateProfile/$1';

$route['admin/payment-list']='admin/Subscriber/Paymentlist';

$route['admin/outbound-email']='admin/Subscriber/outBoundEmail';
$route['admin/add-outboundemail']='admin/Subscriber/AddOutBoundEmail';
$route['admin/set-payment']='admin/Subscriber/setpayment';
$route['admin/set-expiry-email-days']='admin/Subscriber/setdays';
$route['admin/create-subscriber']='admin/Subscriber/CreateSubscriber';
$route['admin/store-subscriber']='admin/Subscriber/signup';

$route['admin/update-payment']='admin/Subscriber/update_Payment';
$route['admin/update-days']='admin/Subscriber/update_days';

$route['sorttable']='admin/SiteParametersController/sorttable';
//for sorting spacing table
$route['sortspacing']='admin/SiteParametersController/sorting';
//informational pages..
$route['admin/add-informational-page']='admin/InformationalController/add_informational_page';
$route['admin/view-all-comments']='admin/InformationalController/comment_all';
$route['admin/approve-all-comments']='admin/InformationalController/approve_comment_all';

$route['admin/new-informational-page']='admin/InformationalController/new_informational_page';
$route['admin/view-comment/(:any)']='admin/InformationalController/view_comments/$1';
$route['admin/add-informational-head']='admin/InformationalController/add_informational_head';
$route['admin/new-informational-head']='admin/InformationalController/new_informational_head';
$route['admin/informational-heads']='admin/InformationalController/informational_heads';

$route['admin/informational-pages']='admin/InformationalController/informational_pages';

$route['admin/informational-sort']='admin/InformationalController/sort_informational';

$route['admin/information-edit/(:any)'] = 'admin/InformationalController/information_edit/$1';
$route['admin/comments-view/(:any)'] = 'admin/InformationalController/comments_views/$1';
$route['admin/comments-view-subpage/(:any)/(:any)'] = 'admin/InformationalController/comments_views_subpage/$1/$1';

$route['admin/update-informational-page'] = 'admin/InformationalController/update_information';
$route['admin/update-region'] = 'admin/InformationalController/update_region_content';

$route['admin/add-new-region'] = 'admin/InformationalController/region_edit';

//menu
$route['admin/add-menu-item/(:any)']='admin/InformationalController/add_menu_item/$1';
$route['admin/new-menu-item']='admin/InformationalController/new_menu_item';
$route['admin/new-banner-image-home']='admin/InformationalController/banner_image_home';
$route['admin/new-home-image']='admin/InformationalController/new_home_image';
$route['admin/menu-item-edit/(:any)'] = 'admin/InformationalController/menu_item_edit/$1';
$route['admin/update-menu-item'] = 'admin/InformationalController/update_menu_item';
$route['admin/update-banner-image'] = 'admin/InformationalController/update_banner_image_home';
$route['admin/main-image-add'] = 'admin/InformationalController/main_image_add';

//library
$route['admin/library']='admin/LibraryController/index';
$route['admin/insert']='admin/LibraryController/insert';
$route['admin/updateLibrary']='admin/LibraryController/update';



// //home page content
$route['admin/homepage-content']='admin/InformationalController/homepage_content';
$route['admin/update-homepage-content']='admin/InformationalController/update_homepage_content';
$route['admin/updateRegion1']='admin/InformationalController/region1';
$route['admin/updateRegion2']='admin/InformationalController/region2';
$route['admin/updateRegion3']='admin/InformationalController/region3';
$route['admin/updateRegion4']='admin/InformationalController/region4';
$route['admin/updateRegion5']='admin/InformationalController/region5';
$route['admin/updateRegion6']='admin/InformationalController/region6';
$route['admin/updateRegion7']='admin/InformationalController/region7';
$route['admin/updateRegion8']='admin/InformationalController/region8';
$route['admin/updateRegion9']='admin/InformationalController/region9';

$route['admin/add-disclaimer']='admin/AdminController/add_disclimer';
$route['admin/update_desclimer']='admin/AdminController/update_desclimer';

$route['admin/add_about_us']='admin/AdminController/add_about_us';
$route['admin/update_about_us']='admin/AdminController/update_about_us';


$route['admin/add_policy']='admin/AdminController/add_policy';
$route['admin/update_policy']='admin/AdminController/update_policy';

$route['disclaimer']='HomeController/disclaimer';
$route['privacy-policy']='HomeController/policy';


//term of service
$route['admin/term_of_service']='admin/AdminController/add_term_of_service';
$route['admin/update_term_of_service']='admin/AdminController/term_of_service';
//end term of service

// //about us content
$route['admin/aboutus_content']='admin/InformationalController/aboutus_content';
$route['admin/update-aboutus-content']='admin/InformationalController/update_aboutus_content';

$route['home/important/information/(:any)']='HomeController/importantInformation/$1';

// //SEO 
$route['admin/aboutus_content']='admin/InformationalController/aboutus_content';
// user login side routes
$route['subscribe']='user/UserController';
$route['free-trial']='user/UserController/freeTrial';


$route['subscribe/store']='user/UserController/signup';
$route['subscribe/trial/store']='user/UserController/free_trial_signup';
$route['subscribe/update']='user/UserController/updateProfile';
$route['code-verification']='user/UserController/Codeverification';
$route['Codesubmit']='user/UserController/confirmcode';
$route['create-new-verification-code']='user/UserController/createNewverificationCode';
$route['verify-email/(:any)/(:any)']='user/UserController/verifyYourEmail/$1/$2';
$route['login']='user/UserController/login';
$route['submit']='user/UserController/submitLogin';
$route['check-login']='user/UserController/checkLogin';
$route['profile']='user/UserController/editProfile';
$route['update-password']='user/UserController/updatepassword' ;

$route['paypal-subscription/(:any)']='user/UserController/purchaseitem/$1';
$route['free-trial-subscription/(:any)/(:any)']='user/UserController/purchaseitem/$1/$2';
$route['setpassword']='user/UserController/setpassword';
$route['add-to-favorite']='user/UserController/favorite';
$route['favorite-campsites']='user/UserController/showFavCampsite';
$route['favCampsiteList']='user/UserController/paginationForFavCampsite';

$route['my-payments']='user/UserController/myPayments';
$route['parent-campground/(:any)']='user/UserController/parent_campground/$1';
$route['child-campground/(:any)']='user/UserController/child_campground/$1';
$route['parents-campground/(:any)']='user/UserController/parentregion/$1';
$route['site-description/(:any)']='user/UserController/site_description/$1';
$route['site-descriptions']='user/UserController/site_descriptions';
$route['region/(:any)']='user/UserController/region/$1';
$route['information-pages']='user/UserController/myInformation';

$route['information-pages/(:any)'] = 'user/UserController/myInformation/$1';
$route['information-pages/(:any)/(:any)'] = 'user/UserController/myInformation/$1/$2';

$route['information-pages/(:any)/(:any)'] = 'user/UserController/myInformation/$1/$2';

$route['informations']='HomeController/myInformation';
$route['informations/(:any)'] = 'HomeController/myInformation/$1';

$route['informations/(:any)/(:any)'] = 'HomeController/myInformation/$1/$2';

$route['informations/(:any)/(:any)'] = 'HomeController/myInformation/$1/$2';

$route['logout']='user/UserController/logout';




// user searc page routes
$route['search']='user/UserController/search';
$route['forgot-password']='user/UserController/forgotpassword';
$route['submit-Forgotpassword']='user/UserController/submitForgotPassword';
$route['update-password/(:any)']='user/UserController/updateForgotPassword/$1';
$route['top-rated-campsites'] = 'user/UserController/topratedCampsites';


$route['forgotsetpassword']='user/UserController/forgotsetpassword';
$route['campsiteList']='user/UserController/campssite_pagination';
//$route['campsiteListSearch']='user/UserController/campssite_pagination_search';

$route['admin/add-blog-page']='admin/BlogController/add_blog_page';
$route['admin/new-blog-page']='admin/BlogController/new_blog_page';
$route['admin/list-blogs']='admin/BlogController/list_blogs';
$route['admin/blog-detail/(:any)']='admin/BlogController/blog_detail/$1';
$route['admin/blog_delete']='admin/BlogController/blogDelete';
$route['admin/blog-edit/(:any)']='admin/BlogController/blogEdit/$1';
$route['admin/blog_update']='admin/BlogController/updateBlog';
$route['admin/blog-comments']='admin/BlogController/blogComments';
$route['admin/approved-comments-blog']='admin/BlogController/approveblogComments';
$route['admin/updateReplyBlog']='admin/BlogController/updateReply';


$route['admin/all-blogs-comments']='admin/BlogController/blogComments';

$route['admin/comments-view-blog/(:any)'] = 'admin/blogController/comments_views_blog/$1';


//changes by adil
$route['home/blog-detail/(:any)']='HomeController/blogDetail/$1';
$route['blog-brows']='HomeController/blogsBrows';

$route['about-us']='HomeController/aboutUs';

$route['term-of-service']='HomeController/termOfService';


$route['admin/forum-comments']='admin/ForumController/forumComments';
$route['admin/approved-comments-forum']='admin/ForumController/approvedforumComments';
$route['admin/pending-forums']='admin/ForumController/forumsPending';
$route['admin/approve-forums']='admin/ForumController/forumsApprove';

$route['admin/forum-specific-comments/(:any)']='admin/ForumController/forumSpecificComment/$1';

$route['admin/forums-activate-deactivate/(:any)']='admin/forumController/activeDeactive/$1';

$route['add-forum-page']='HomeController/forum';
$route['home/forum-detail/(:any)']='HomeController/forumDetail/$1';

$route['searchListBlog']='HomeController/searchListBlog';


$route['update-forum']='HomeController/updateForum';
// for ckeditor
$route['ckeditor-upload-image']='HomeController/ckeditor';
//changes by adil


$route['newsletter-pagination']='HomeController/newsletterPagination';

$route['somethingElse'] = "someOtherUrl";
$route['(:any)']='HomeController/default_campground/$1';


$route['admin/region-seo'] = 'admin/InformationalController/region_Seo';
$route['admin/updateSeo'] = 'admin/InformationalController/updateSeoRegion';
$route['admin/home-seo'] = 'admin/InformationalController/homeSEO';
$route['admin/homeSeo'] = 'admin/InformationalController/updateHomeSeo';


$route['admin/test'] = 'admin/Subscriber/test';
$route['admin/add-newsletter'] = 'admin/NewsletterController/addNewsletter';
$route['admin/store-newsletter'] = 'admin/NewsletterController/store_news_letter';
$route['admin/newsletters-list'] = 'admin/NewsletterController/newsletterList';
$route['admin/newsletter-edit/(:any)']='admin/NewsletterController/NewsletterEdit/$1';
$route['admin/newsletter_update']='admin/NewsletterController/updateNewslatter';
$route['admin/newsletter_delete']='admin/NewsletterController/newsletterDelete';
$route['newsletter-pagination']='HomeController/newsletterPagination';



