
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li>Add Homepage Content</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--// Subheader \\-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Home Page Content</h4>
                        <?php if($this->session->flashdata('success1')!=""){  ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong></strong>
                            <?php echo $this->session->flashdata('success1'); ?>
                        </div>
                        <?php } ;?>
                    </div>
                    <div class="content">
                          <div class="header">
                            <h4 class="title">Banner Images <small>(Recommended Resolution: 1920 X 1080)</small></h4>
                        </div>
                        <br>
                        <div class="banner-images">
                            <div class="payment-list">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Banner Image</th>
                                            <th>View Images</th>
                                            <th>Banner Heading</th>
                                            <!-- <th>Banner Transition Time</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($home_images as $key => $value) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; $i++;?>
                                            </td>
                                            <td><a class="elem" href="<?php echo base_url();?>uploads/homebanner/<?php echo $value->image_name;?>" data-lcl-thumb="<?php echo base_url();?><?php echo base_url();?>uploads/homebanner/<?php echo $value->image_name;?>"><img src="<?php echo base_url();?>uploads/homebanner/<?php echo $value->image_name;?>" alt=""></a></td>
                                            <td>
                                                <?php echo $value->banner_heading; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-fill color-red edit-banner_home_image" data-toggle="tooltip" title="Edit" href="javascript:void(0)" data-id="<?php echo $value->id_image;?>" data-name="<?php echo $value->banner_heading;?>" data-time="<?php echo $value->banner_time;?>"
                                                    data-image="<?php echo $value->image_name;?>">Edit</a>

                                                <a href="javascript:void(0)" class="btn btn-info btn-fill color-red delete_image_home_banner" data-id="<?php echo $value->id_image;?>" data-toggle="tooltip" title="Delete">Delete</a>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-info btn-fill pull-left color-red add-banner-images" href="javascript:void(0)">Add New Banner Image</a>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <!-- Image HOme page code -->
                        <div class="header">
                            <h4 class="title">Welcome to Colorado Campgrounds Image</h4>
                        </div>
                        <br>
                        <div class="banner-images">
                            <?php if(!empty($home_main_img)){ ?>
                            <div class="payment-list">

                                <table>
                                    <thead>
                                        <tr>
                                            
                                            <th>View Images</th>
                                           
                                            <!-- <th>Banner Transition Time</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            
                                            <td><a class="elem" href="<?php echo base_url();?>uploads/homebanner/<?php echo $home_main_img[0]->image;?>" data-lcl-thumb="<?php echo base_url();?><?php echo base_url();?>uploads/homebanner/<?php echo $home_main_img[0]->image?>"><img src="<?php echo base_url();?>uploads/homebanner/<?php echo $home_main_img[0]->image;?>" alt=""></a></td>
                                            
                                            <td>
                                                <a class="btn btn-info btn-fill color-red main_home_image" data-toggle="tooltip" title="Update" href="javascript:void(0)" data-id="<?php echo $home_main_img[0]->id?>" 
                                                    data-image="<?php echo $home_main_img[0]->image?>">Update</a>

                                                
                                            </td>

                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        <?php }else { ?>
                             <a class="btn btn-info btn-fill pull-left color-red add-main-images" href="javascript:void(0)">Add New Home Page Image</a>
                         <?php } ?>
                           
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <!-- end image home page code -->
                         <div class="payment-list overflow-none">
                            <form action="<?php echo base_url(); ?>admin/update-homepage-content" method="post" id="add_home" enctype="multipart/form-data">

                                <ul>
                                    <input type="hidden" name="id" value="<?php echo $home->home_id; ?>">
                                    <!--  <li>
                                                <label>Add Call to action text</label>
                                                <input type="text" name="action_text" value="<?php //echo $home->action_text; ?>" class="form-control" value="Take a peek of what's inside!">
                                            </li> -->
                                    <li class="full">
                                        <div class="header" style="padding: 0px;">
                                            <h4 class="title">Add Content for Welcome to Colorado Campgrounds section</h4>
                                        </div>
                                    </li>
                                    <li class="full">
                                        <div class="html-editor extra-height">
                                           
                                        </div>
                                        <!-- <input type="hidden" id="description" name="description"> -->
                                         <textarea name="description" id="description" class="ckeditor"><?php echo $home->description ;?></textarea> 
                                    </li>
                                    <li class="full"><input type="submit" value="Save"></li>
                                </ul>
                            </form>
                        </div>
                        
                                                        <!-- model -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Banner Image</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_banner_image_home" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/new-banner-image-home">
                    <ul>
                        <li class="width-50">
                            <label>Banner Image</label>
                            <input name="banner_image" type="file" class="form-control">
                        </li>
                        <li class="width-50">
                            <label>Add Banner Text</label>
                            <input type="text" name="banner_text" class="form-control">
                        </li>
                        <!--  <li class="width-50">
                    <label>Banner Transition Time</label>
                    <input type="text" name="transition_time"  class="form-control">
                </li> -->
                        <li class=""><input type="submit" value="Save" style="margin: 10px 0px 0px" class="btn btn-info btn-fill color-red"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="main-image-adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Home Page Image</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_banner_image_home" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/new-home-image">
                    <ul>
                        <li class="width-50">
                            <label>Home Page Image</label>
                            <input name="banner_image" type="file" class="form-control">
                        </li>
                      <!--   <li class="width-50">
                            <label>Add Banner Text</label>
                            <input type="text" name="banner_text" class="form-control">
                        </li> -->
                        <!--  <li class="width-50">
                    <label>Banner Transition Time</label>
                    <input type="text" name="transition_time"  class="form-control">
                </li> -->
                        <li class="top-space"><input type="submit" value="Save" style="margin: 10px 0px 0px" class="btn btn-info btn-fill color-red"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-banner-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Image</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_banner_image_home" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/update-banner-image">
                    <ul>
                        <input type="hidden" name="id" value="" class="inputhidden">
                        <input type="hidden" name="image" value="" class="image">
                        <li class="width-50">
                            <label>Banner Image</label>
                            <input name="banner_image" type="file" id="banner_image" class="form-control">
                        </li>
                        <li class="width-50">
                            <label>Add Banner Text</label>
                            <input type="text" name="banner_text" value="" id="banner_text" class="form-control">
                        </li>
                        <!--  <li class="width-50">
                    <label>Banner Transition Time</label>
                    <input type="text" name="transition_time" value="" id="transition_time"  class="form-control">
                </li> -->
                        <li class=""><input type="submit" style="margin: 10px 0px 0px" value="Update" class="btn btn-info btn-fill color-red"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="main-home-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Image</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="add_banner_image_home" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/main-image-add">
                    <ul>
                        <input type="hidden" name="id" value="" class="inputhidden">
                        <input type="hidden" name="image" value="" class="image">
                        <li class="width-50">
                            <label>Home Page Image</label>
                            <input name="banner_image" type="file" id="banner_image" class="form-control">
                        </li>
                       <!--  <li class="width-50">
                            <label>Add Banner Text</label>
                            <input type="text" name="banner_text" value="" id="banner_text" class="form-control">
                        </li> -->
                        <!--  <li class="width-50">
                    <label>Banner Transition Time</label>
                    <input type="text" name="transition_time" value="" id="transition_time"  class="form-control">
                </li> -->
                        <li class="top-space"><input type="submit" style="margin: 10px 0px 0px" value="Update" class="btn btn-info btn-fill color-red"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

                    </div>
<div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Main Content \\-->







<!--// Main Content \\
