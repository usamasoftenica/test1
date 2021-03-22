        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/child-campground-list">Child Campground List</a></li>
                            <li>Edit Child Campground</li>
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
                                <h4 class="title">Edit Child Campground</h4>
                            </div>
                             <!-- <?php echo validation_errors(); ?> -->
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
                                                      <a href="<?php echo base_url() ?>admin/child-campground-list" class="btn btn-primary view-list-btn">View list</a>
                                                  </div>
                                            <?php } ;?>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/update-child-campground" method="post" id="add_child_comp" enctype="multipart/form-data">
                                        <ul>
                                         <!--    <li>
                                                <label>Select Region</label>
                                                <select name="region" id="regionc">
                                                    <option value="">Select Region</option>
                                               <?php 
                                                      foreach ($regions as $region) {?>
                                                      <option value="<?php echo $region->id; ?>"
                                                         <?php if ($region->id == $childcampground->r_id) {
                                                          echo "selected";  
                                                          } ?>
                                                        ><?php echo $region->name; ?></option>
                                                      <?php } ?>
                                                    </select>
                                            </li> -->
                                            <input type="hidden" name="p_id" id="p_id" value="<?php echo $childcampground->parentId; ?>">
                                            <input type="hidden" name="id" value="<?php echo $childcampground->c_id; ?>">
                                           <!--  <input type="hidden" name="img" value="<?php echo $childcampground->c_banner; ?>"> -->
                                            <li>
                                                <label>Select Parent Campground</label>
                                                <select name="parent" id="parent" class="select2_single">
                                                    <option value="">Select Parent Campground</option>
                                                      <?php 
                                                      foreach ($regions as $region) {?>
                                                      <option value="<?php echo $region->p_id; ?>"
                                                         <?php if ($region->p_id == $childcampground->parentId) {
                                                          echo "selected";  
                                                          } ?>
                                                        ><?php echo $region->name; ?></option>
                                                      <?php } ?>
                                                                                                        
                                              </select>
                                            </li>
                                            <li>
                                                <label>TYPE IN NAME OF Child Campground</label>
                                                <input class="form-control" name="name" value="<?php echo $childcampground->c_name; ?>" id="name" type="text" placeholder="Type here">
                                            </li>
                                             <li>
                                                <label>Slug</label>
                                                <input type="text" value="<?php echo $childcampground->slug; ?>" class="form-control" name="slug">
                                            </li>
                                              <li>
                                                <label>Add Child Campground Map <small>(optional)</small></label>
                                                <input class="form-control" value="<?php echo $childcampground->c_map; ?>" name="com_map" id="com_map" type="text" placeholder="Enter Map Code">
                                            </li>
                                            <li>
                                                <label>Add Child Campground video Link <small>(optional)</small></label>
                                                <input class="form-control" name="com_vedio" id="com_vedio" value="<?php echo $childcampground->video_link ?>" type="text" placeholder="Add vedio link">
                                            </li>
                                            <li class="full"><label>Description <small> (<strong>Tip:</strong> You can add tables to format description in tabular form.)</small></label>
                                              <div id="editor"></div></li>
                                              <textarea name="description" style="display: none;" id="description"><?php echo $childcampground->c_details  ;?></textarea>
                                          <!--     <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">Banner Information <small> (If banner information is not added for a Child Campground, it will inherit from its Parent Campground)</small></h4>
                                                </div>
                                            </li> -->
                                        <!--     <li>
                                                <label>Select banner image</label>
                                                <input class="form-control" name="banner1" id="Banner" type="file">
                                            </li>
                                                <li>
                                                <label>Add banner alt</label>
                                                <input class="form-control" value="<?php echo $childcampground->alt; ?>" name="banner_alt" type="text" placeholder="Enter alt">
                                            </li>
                                              <li>
                                                <label>Select Overlay Color for Banner</label>
                                                <input class="form-control" value="<?php echo $childcampground->c_color; ?>" name="color" id="color" type="color" placeholder="#ffffff">
                                            </li> -->
                                                   <li class="full">
                                                <div class="header" style="padding: 0px;">
                                                    <h4 class="title">SEO Information</h4>
                                                </div>
                                            </li>
                                              <li>
                                                <label>Title</label>
                                                <input class="form-control" value="<?php echo $childcampground->titile; ?>" name="title" type="text" value="">
                                            </li>
                                            <li>
                                                <label>Keywords for Meta tag</label>
                                                <input class="form-control" value="<?php echo $childcampground->keyword; ?>" type="text" name="keyword" placeholder="">
                                            </li>
                                            <li class="full">
                                                <label>Meta Description</label><textarea class="form-control" name="meta_description" placeholder=""><?php echo $childcampground->meta_description; ?></textarea>
                                            </li>
                                            
                                            <li class="full">
                          <!--                       <input type="submit" name="publish" value="Publish"> -->
                                                <li class="full"><input type="submit" name="publish" value="Activate"> <input formnovalidate="formnovalidate" type="submit" name="Save" value="Save as Draft"><a href="<?php echo base_url();?>admin/child-campground-list" class="btn btn-info btn-fill pull-right color-red back">Back</a> </li>

                                              <!-- <?php if($childcampground->draft ==0){?> -->
                                             <!-- <input type="submit" name="Save" value="Save"> -->
<!-- <?php }?> -->
                                            </li>
                                        </ul>
                                    </form>

                                   
                     
               <!--     <div>
                                
                                    <h5>Banner Image</h5>
                                    <?php $image=''; $i=0; if(!empty($childcampground->c_banner)){ $image='ChildCampGround/'.$childcampground->c_banner; }else { $image= 'ParentCampGround/'; $i=1; }?>
                 <?php if($image!=''){ ?>
                 <?php if($i==0){ ?>
                 <img src="<?php echo base_url().'uploads/'.$image;?>">
                 <?php } ?>
                 <br>
                 
                 <?php if($i==1){echo '<small>Banner image inherited from Parent.</small>'; } ?>
                 <?php }else{ ?>
                 <span>No banner image added yet.</span>
                 <?php } ?>
                 </div> -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
          <script type="text/javascript">
      $('#add_child_comp').on('submit', function(){
             var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

   //    var id = $('#regionc').val();
   //      var p_id = $('#p_id').val();
      
   //   var base_url = '<?php echo base_url(); ?>';
   //    $.ajax({
   //         url: base_url+"admin/ChildCampGroundController/get_parent",
   //         type: 'POST',
   //         data: {id: id},
   //         dataType:'json',
   //         error: function() {
   //            alert('Something is wrong');
   //         },
   //         success: function(data1) {
   //              $('#parent').html('');var html = '';
   //              var i;
   //              var html;
   //              var sel ='';
   //              console.log(data1.length);
   //              for(i=0; i<data1.length; i++){
   //                if (data1[i]['p_id'] == p_id) {sel = 'selected'; console.log('select');}
   //                console.log(data1[i]['p_id'] +': '+p_id);
   //                  html += '<option value='+data1[i]['p_id']+' '+ sel +'>'+data1[i]['name']+'</option>';
   //                  sel = '';
   //              }
   //              $('#parent').html(html);
   // }
   //      });


//       $('#regionc').on('change', function(){
//   var id = $('#regionc').val();
//   sel = '';
//   if(id == '')
//   {
//     return;
//   }
//   else
//   {
//        $.ajax({
//            url: base_url+"/admin/ChildCampGroundController/get_parent",
//            type: 'POST',
//            data: {id: id},
//            dataType:'json',
//            error: function() {
//               alert('Something is wrong');
//            },
//            success: function(data1) {
//                 $('#parent').html('');var html = '';
//                 var i;
//                 var html;
//                 for(i=0; i<data1.length; i++){
//                    if (data1[i]['p_id'] == p_id) {sel = 'selected'; console.log('select');}
//                     html += '<option value='+data1[i]['p_id']+' '+ sel +'>'+data1[i]['name']+'</option>';
//                 }
//                 $('#parent').html(html);
//    }
//         });
//   }
// });

        </script>

