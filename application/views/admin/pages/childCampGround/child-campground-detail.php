  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Child Campground Detail</li>
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
                                <?php  if($childcampground->draft==0 && $childcampground->c_live==1 )
                      {
                        $val='Activated';
                      }else if($childcampground->draft==0 && $childcampground->c_live==0)
                      {
                        $val='Deactivated';
                      }
                      else{
                        $val='Draft';
                      } ?>
                                <h4 class="title">Child Campground Detail</h4> Status: <?php echo $val;?>
                            </div>
                            <div class="content">
                                <div class="payment-list subscriber">
                                    <table class="detail cap-text">
                                        <tr>
                                            <th>Region</th>
                                            <td><?php if(!empty($childcampground->r_name)) echo $childcampground->r_name; else echo 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Parent Campground</th>
                                            <td><?php if(!empty($childcampground->p_name)) echo $childcampground->p_name; else echo 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Child Campground</th>
                                            <td><?php if(!empty($childcampground->c_name)) echo $childcampground->c_name; else echo 'N/A'; ?></td>
                                        </tr>
                                     <!--    <tr>
                                            <th>Overlay Color for Banner </th>
                                       
                                             <td><?php if($childcampground->c_color!='#000000' && $childcampground->c_color!=''){ echo "<span style='background-color:  $childcampground->c_color; '></span>"; }else if(!empty($childcampground->pColor)){ echo "<span style='background-color:  $childcampground->pColor; '></span> <small> (Inherited from Parent Campground )</small>"; }?></td>

                                        </tr> -->
                                      <!--   <tr>
                                            <th>Banner Alt</th>
                                            <td><?php if(!empty($childcampground->alt)){ echo $childcampground->alt; }else if(!empty($childcampground->pAlt)){ echo $childcampground->pAlt.' <small> (Inherited from Parent Campground )</small>'; }?></td>
                                        </tr> -->
                                         <tr>
                                            <th>Slug</th>
                                            <td><?php if(!empty($childcampground->slug)) echo $childcampground->slug; else echo 'N/A'; ?></td>
                                        </tr>

                                         <tr>
                                            <th>Title</th>
                                            <td><?php if(!empty($childcampground->titile)) echo $childcampground->titile; else echo 'N/A'; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Keywords for Meta Tag</th>
                                            <td><?php if(!empty($childcampground->meta_description)) echo $childcampground->keyword; else echo 'N/A'; ?></td>
                                        </tr>

                                         <tr>
                                            <th>Meta Description </th>
                                            <td><?php if(!empty($childcampground->meta_description)) echo $childcampground->meta_description; else echo 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Child Campground map</th>
                                            <td><?php if(!empty($childcampground->c_map)) echo $childcampground->c_map; else echo 'N/A'; ?>
                                            </td>
                                        </tr>
                                     <!--    <tr>
                                            <th>Favorite</th>
                                            <td><?php if($childcampground->c_fav == 1 )
                                            { echo 'Favorite';}else { echo 'Not Favorite'; } ?></td>
                                        </tr> -->
                                       <!--   <tr>
                                            <th>Reviewed</th>
                                            <td><?php if($childcampground->c_reviewed == 1 )
                                            { echo 'Reviewed';}else { echo 'Not Reviewed'; } ?></td>
                                        </tr>
                                         -->
                                        <tr>
                                            <th>Description</th>
                                            <td><?php if(!empty($childcampground->c_details)) echo $childcampground->c_details; else echo 'N/A'; ?></td>
                                        </tr>
                                        
                                       <!--  <tr>
                                            <th>Location</th>
                                            <td><?php echo $childcampground->location; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Compground amenities</th>
                                            <td><?php echo $childcampground->compgroundamenities; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Activity</th>
                                            <td><?php echo $childcampground->activity; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Reservation</th>
                                            <td><?php echo $childcampground->reservation; ?></td>
                                        </tr>
                                         <tr>
                                            <th>fee</th>
                                            <td><?php echo $childcampground->fee; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Check_In</th>
                                            <td><?php echo $childcampground->check_In; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Check_Out</th>
                                            <td><?php echo $childcampground->check_Out; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Terrain</th>
                                            <td><?php echo $childcampground->terrain; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Averaget emps</th>
                                            <td><?php echo $childcampground->averagetemps; ?></td>
                                        </tr>
                                          <tr>
                                            <th>Altitude</th>
                                            <td><?php echo $childcampground->altitude; ?></td>
                                        </tr>
                                          <tr>
                                            <th>Wildlife</th>
                                            <td><?php echo $childcampground->wildlife; ?></td>
                                        </tr>
                                          <tr>
                                            <th>Local amenities</th>
                                            <td><?php echo $childcampground->Localamenities; ?></td>
                                        </tr>
                                        <tr>
                                            <th>regulation</th>
                                            <td><?php echo $childcampground->regulation; ?></td>
                                        </tr>
                                        <tr>
                                            <th>parkamenies</th>
                                            <td><?php echo $childcampground->parkamenies; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Park activities</th>
                                            <td><?php echo $childcampground->parkactivities; ?></td>
                                        </tr>
 -->

                                            <!-- <th>Video</th> -->
                                            <!-- <td> -->
                                        <!--  <video width="320" height="240" controls>
                                                  <source src="<?php echo $childcampground->video_link; ?>" type="video/mp4">
                                                </video>                                              
                                            </td> -->
                                        </tr>
                                    </table>
                                    <a href="<?php echo base_url().'admin/child-campground-edit/'.$childcampground->c_id;?>" class="btn btn-info btn-fill pull-right color-red back">Edit</a>
                                     <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info btn-fill pull-right color-red back">Back</a> 
                                </div>
                           <!--      <div>
                                
                                    <h5>Banner Image</h5>
                                    <?php $image=''; $i=0; if(!empty($childcampground->c_banner)){ $image='ChildCampGround/'.$childcampground->c_banner; }else if(!empty($childcampground->pImage)){ $image= 'ParentCampGround/'.$childcampground->pImage; $i=1; }?>
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
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
             
            </div>
                

        </div>
		<!--// Main Content \\-->
