<!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                             <li><a href="<?php echo base_url(); ?>admin/informational-pages">Information Pages List</a></li>
                            <li>Edit Information Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Information Page</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <?php echo validation_errors(); ?>
                                    <form action="<?php echo base_url(); ?>admin/update-informational-page" method="post" id="edit_information_page" enctype="multipart/form-data">
                                        <ul>
                                          <input type="hidden" name="id" value="<?php echo $informationalpages->info_id;?>">
                                           <input type="hidden" name="banner_O" value="<?php echo $informationalpages->banner;?>">
                                            <li>
                                                <label>Name</label>
                                                <input value="<?php echo $informationalpages->name;?>" class="form-control" name="name" type="text" placeholder="Altitude levels">
                                            </li>
                                            <li>
                                                <label>Select Font Color for Name Banner</label>
                                                <input class="form-control" name="nameColor" value="<?php echo $informationalpages->nameColor;?>" type="color" placeholder="#ffffff">
                                            </li>
                                            <li>
                                                <label>SEO:Slug</label>
                                                <input class="form-control" value="<?php echo $informationalpages->slug;?>" name="slug" type="text" >
                                            </li>
                                            <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" name="color" value="<?php echo $informationalpages->color;?>" type="color" placeholder="#ffffff">
                                            </li>
                                            <li>
                                                <label>Select banner image (optional) <small>(max-width 1920 X 400)</small></label>
                                                <input class="form-control" name="ebanner" type="file" >
                                              
                                            </li>
                                           
                                             <li>
                                                <label>SEO:Banner Alt (optional)</label>
                                                <input type="text" value="<?php echo $informationalpages->alt; ?>" name="alt" class="form-control" name="alt">
                                            </li>
                                            <li>
                                                <label>Title</label>
                                                <input class="form-control" value="<?php echo $informationalpages->title;?>"  name="title" type="text" value="Altitude levels">
                                            </li>
                                            <li>
                                                <label>SEO:Keywords for Meta tag</label>
                                                <input class="form-control" name="keyword" value="<?php echo $informationalpages->keyword;?>" type="text" placeholder="Altitude levels">
                                            </li>
                                         <!--    <li>
                                                <label>Enter Map Link</label>
                                                <input class="form-control" name="map_link" value="<?php //echo $informationalpages->mapLink;?>" type="text" placeholder="">
                                            </li> -->
                                            <li class="full">
                                                <label>SEO:Description for Meta tag</label>
                                                <textarea class="form-control" name="descriptin_meta_tag" placeholder=""><?php echo $informationalpages->meta_description;?></textarea>
                                            </li>
                                            <li class="full"><label>Description</label><textarea name="description" id="description" class="ckeditor"><?php echo $informationalpages->description;?></textarea> </li>
                                            <li class="full"><input type="submit" value="Submit"></li>
                                        </ul>
                                    </form>
                                </div>

                                <div class="header">
                                    <h4 class="title">Side Menu</h4>
                                </div>
                                <br>
                                <div class="payment-list informational">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th class="custom-width3">Description</th>
                                            <th class="custom-width">Action</th>
                                        </tr>
                                        </thead>
                                       <tbody id="informational_side_menu">
                                       <?php $i = 1;
                                       foreach ($menuitems as $menuitem) {?>

                                           <tr class="info_menu" data-id="<?php echo $menuitem->id; ?>">
                                               <td><?php echo $i++; ?></td>
                                               <td><?php echo $menuitem->name; ?></td>
                                               <td><?php
                                                   $str='';
                                                   //   if($menuitem->description !=""){
                                                   //     if (strlen($menuitem->description) > 200){

                                                   //   $str = substr($menuitem->description, 0, 200) . '...';
                                                   // }}
                                                   $data = strip_tags($menuitem->description) ;
                                                   echo substr($data, 0, 190) .'....'; ?></td>
                                               <td>


                                                   <a class="ease-btn edit-side-menu"  data-toggle="tooltip" title="Edit" href="javascript:void(0)" data-name="<?php echo $menuitem->name; ?>" data-id="<?php echo $menuitem->id;?>" data-des="<?php echo htmlspecialchars($menuitem->description); ?>" data-slug="<?php echo htmlspecialchars($menuitem->menu_slug); ?>" data-title="<?php echo htmlspecialchars($menuitem->menu_page_title); ?>" data-keywords="<?php echo htmlspecialchars($menuitem->menu_keywords); ?>" data-description="<?php echo htmlspecialchars($menuitem->menu_seo_description); ?>">Edit</a><a href="javascript:void(0)" class="ease-btn delete_info_menu"  data-id="<?php echo $menuitem->id;?>" data-toggle="tooltip" title="Delete">Delete</a><a href="javascript:void(0);" data-id="<?php echo $informationalpages->slug;?>"  class="ease-btn view_slug " data-toggle="tooltip" title="View">View</a><a href="<?php echo base_url();?>admin/comments-view-subpage/<?php  echo $informationalpages->info_id;?>/<?php echo $menuitem->id; ?>" data-id="<?php echo $menuitem->id;?>"  class="ease-btn " data-toggle="tooltip" title="Comments">Comments</a>
                                               </td>
                                           </tr>
                                       <?php } ?>
                                       </tbody>


                                
                                    </table>
                                </div>
                             <!--   <a href="<?php //echo base_url()."admin/add-menu-item/".$informationalpages->info_id?>" class="btn btn-info btn-fill pull-right color-red">Add New Side Menu Item</a>  -->
                                 <a class="btn btn-info btn-fill pull-right color-red add-side-menu" href="javascript:void(0)" data-id="<?php echo $informationalpages->info_id;?>">Add New Side Menu Item</a>
                                
                                 
                                  <!--// coments \\-->
                                  <!--// comment-respond \\-->
                                


                                  <!--// comment-respond \\-->
                               
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

  <div id="reply-modal-edit" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit A Comment</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                        
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="commentedit" id="commentss-edit" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
                                        </p>
                                     </form>
                                  </div>
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>


  <div id="reply-modal-edit-reply" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit A Reply</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_edit_replyss">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
                                        
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="commenteditreply" id="commentss-edit-reply" placeholder="Type Your Comment Here" class="commenttextarea message"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Edit" type="submit"> 
                                        </p>
                                     </form>
                                  </div>
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>
  <div id="reply-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Post A Reply</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-respond">
                                   
                                     <form method="post" id="coment_reply">
                                      <input type="hidden" name="inputhidden" class="inputhidden" value="">
										 <input id="detect_forum-reply" name="detect_forum-reply" type="hidden" value="0">
                                        
                                        <p class="ccg-full-form">
                                           <textarea name="comment" id="commentss" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                           <i class="fa fa-comment"></i>
                                        </p>
                                        <p class="form-submit"><input value="Reply" type="submit"> 
                                        </p>
                                     </form>
                                  </div>
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>
      
    <div id="add-menu-modal" class="modal fade extra-modal-space" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Add New Side Menu Item</h4>
                                </div>
                                <div class="modal-body modal-form-wrap">
                                   
                                    <form action="<?php echo base_url(); ?>admin/new-menu-item" method="post" id="add_menu_item">
                                        <ul>
                                            <li>
                                                <label>Name</label>
                                                <input class="form-control" name="name" type="text" placeholder="">
                                            </li>
                                             <li>
                                                <label>slug</label>
                                                <input class="form-control" name="menu_slug" type="text" placeholder="">
                                            </li>
                                             <li>
                                                <label>Page Title</label>
                                                <input class="form-control" name="menu_title" type="text" placeholder="">
                                            </li>
                                             <li>
                                                <label>SEO:KEYWORDS FOR META TAG</label>
                                                <input class="form-control" name="menu_keywords" type="text" placeholder="">
                                            </li>
                                             <li class="full">
                                                <label>SEO:DESCRIPTION FOR META TAG</label>
                                                <textarea class="form-control" name="menu_description" placeholder=""></textarea>
                                            </li>
                                            <input type="hidden" name="info_page_id" value="" class="inputhidden">
                                            
                                            <li class="full add-sub-menu"><label>Description</label><textarea name="descriptionmenu" id="descriptionmenup" class="ckeditor"></textarea></li>
                                            <li class="full"><input class="btn btn-primary" type="submit" value="Submit"></li>
                                        </ul>
                                    </form>
                                 
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>


                            <div id="edit-menu-modal" class="extra-modal-space modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Side Menu Item</h4>
                                </div>
                                <div class="modal-body modal-form-wrap">
                                  <form action="<?php echo base_url(); ?>admin/update-menu-item" method="post" id="edit_menu_item">
                                      <ul>
                                          <li>
                                              
                                              <input type="hidden" name="id" value="" class="inputhidden">
                                              <label>Name</label>
                                              <input class="form-control" value="" id="edit-name" name="name" type="text" placeholder="">
                                          </li>
                                           <li>
                                              <label>slug</label>
                                              <input id="menu_slug" value="" class="form-control" name="menu_slug" type="text" placeholder="">
                                          </li>
                                           <li>
                                              <label>Page Title</label>
                                              <input id="menu_title" class="form-control" name="menu_title" type="text" placeholder="">
                                          </li>
                                           <li>
                                              <label>SEO:KEYWORDS FOR META TAG</label>
                                              <input id="menu_keywords" class="form-control" name="menu_keywords" type="text" placeholder="">
                                          </li>
                                           <li class="full">
                                              <label>SEO:DESCRIPTION FOR META TAG</label>
                                              <textarea id="menu_description" class="form-control" name="menu_description" placeholder=""></textarea>
                                          </li>
                                      
                                         <!--  <li class="full edit-sub-menu"><label>Description</label><div id="html-editor-edit editor2" class="html-editor-edit"></div></li> -->
                                          <li class="full edit-sub-menu description-edit"><label>Description</label> <textarea name="descriptionedit" id="descriptionedit" class="description-custom html-editor-edit ckeditor"></textarea><br></li>
                                          <li class="full"><input class="btn btn-primary" type="submit" value="Update"></li>
                                      </ul>
                                  </form>
                                  <div class="clearfix"></div>
                                  </div>
                                 <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>

                              </div>
                            </div>

        <script type="text/javascript">
        console.log($("textarea[name='commentedit']").val());

         $('#edit_information_page').on('submit', function(){
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            // alert(data);
            $('#description').val(data);               
        });
           $('#add_menu_item').on('submit', function(){
             // var data = $('.add-sub-menu .note-editable').html();
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            // alert(data);
            $('#descriptionmenup').val(data);               
        });
       
           $('#edit_menu_item').on('submit', function(){
             // var data = $('.edit-sub-menu .note-editable').html();
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            // alert(data);
            $('#descriptionedit').val(data);               
        });


    //      //description editor
    //        CKEDITOR.replace( 'descriptionmenu', {
    // // extraPlugins: 'easyimage',
    //     filebrowserBrowseUrl: 'http://localhost/coloradocampgrounds.development-env.com/images/',
    //         filebrowserImageBrowseUrl: 'http://localhost/coloradocampgrounds.development-env.com/images/',
    //     filebrowserUploadUrl : 'http://localhost/coloradocampgrounds.development-env.com/ckeditor-upload-image?id=1',
    //     filebrowserImageUploadUrl :  'http://localhost/coloradocampgrounds.development-env.com/ckeditor-upload-image?id=1',
    //     // ConfigUserFilesPath : "http://www.coloradocampgrounds.development-env.com/images/",
    //     });

    //       CKEDITOR.replace( 'descriptionedit', {
    //         // extraPlugins: 'easyimage',
    //     filebrowserBrowseUrl: 'http://localhost/coloradocampgrounds.development-env.com/images/',
    //         filebrowserImageBrowseUrl: 'http://localhost/coloradocampgrounds.development-env.com/images/',
    //     filebrowserUploadUrl : 'http://localhost/coloradocampgrounds.development-env.com/ckeditor-upload-image?id=1',
    //     filebrowserImageUploadUrl :  'http://localhost/coloradocampgrounds.development-env.com/ckeditor-upload-image?id=1',
    //     // ConfigUserFilesPath : "http://www.coloradocampgrounds.development-env.com/images/",
    //     });
    //      // end decription editor  




    //test

     //description editor
           CKEDITOR.replace( 'descriptionmenu', {
    // extraPlugins: 'easyimage',
        filebrowserBrowseUrl:'https://coloradocampgrounds.us.com/images/',
            filebrowserImageBrowseUrl:'https://coloradocampgrounds.us.com/images/',
        filebrowserUploadUrl :'https://coloradocampgrounds.us.com/ckeditor-upload-image?id=1',
        filebrowserImageUploadUrl :'https://coloradocampgrounds.us.com/ckeditor-upload-image?id=1',
        // ConfigUserFilesPath : "https://coloradocampgrounds.us.com/images/",
        });

          CKEDITOR.replace( 'descriptionedit', {
            // extraPlugins: 'easyimage',
        filebrowserBrowseUrl: 'https://coloradocampgrounds.us.com/images/',
            filebrowserImageBrowseUrl: 'https://coloradocampgrounds.us.com/images/',
        filebrowserUploadUrl : 'https://coloradocampgrounds.us.com/ckeditor-upload-image?id=1',
        filebrowserImageUploadUrl :  'https://coloradocampgrounds.us.com/ckeditor-upload-image?id=1',
        // ConfigUserFilesPath : "https://coloradocampgrounds.us.com/images/",
        });
         // end decription editor  

         </script>

		<!--// Main Content \\-->
