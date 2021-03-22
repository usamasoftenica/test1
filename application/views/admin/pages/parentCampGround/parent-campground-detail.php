<!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                                      <?php   if($parentcampground->draft==0 && $parentcampground->live==1 )
                      {
                        $val='Activated';
                      }else if($parentcampground->draft==0 && $parentcampground->live==0)
                      {
                        $val='Deactivated';
                      }
                      else{
                        $val='Draft';
                      }     ?>
                            <li>Parent Campground Detail</li><br>
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
                                <h4 class="title">Parent Campground Detail </h4>Status : <?php echo $val; ?>
                            </div>
                            <div class="content">
                                <div class="payment-list subscriber">
                                    <table class="detail cap-text">
                                        <tr>
                                            <th>Region</th>
                                            <td><?php echo $parentcampground->r_name; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Parent Campground Name</th>
                                            <td><?php echo $parentcampground->name; ?></td>
                                        </tr>
                                       <!--  <tr>
                                            <th>Overlay Color for Banner </th>
                                            <td> <span style="background-color: <?php echo $parentcampground->color; ?>"></span> </td>
                                        </tr> -->
                                      <!--    <tr>
                                            <th>Banner Alt</th>
                                            <td><?php echo $parentcampground->alt; ?></td>
                                        </tr> -->
                                        <!--  <tr>
                                            <th>Slug</th>
                                            <td><?php echo $parentcampground->slug; ?></td>
                                        </tr> -->
                                         <tr>
                                            <th>Page Title</th>
                                            <td><?php echo $parentcampground->titile; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Key words for Meta Tag</th>
                                            <td><?php echo $parentcampground->keyword; ?></td>
                                        </tr>

                                         <tr>
                                            <th>Meta Description</th>
                                            <td><?php echo $parentcampground->meta_description; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Campground Map Link</th>
                                            <td><?php echo $parentcampground->campSiteMap; ?></td>
                                        </tr>
                                         <tr>
                                            <th>Youtube link</th>
                                            <td><?php if(!empty($parentcampground->youtube_link)) echo $parentcampground->youtube_link; else echo 'N/A' ?></td>
                                        </tr>
                                        <tr class="p-description">
                                            <th>Description</th>
                                            <td><?php echo $parentcampground->description; ?></td>
                                        </tr>
                                    </table>
                                     <a href="<?php echo base_url().'admin/parent-campground-list'?>" class="btn btn-info btn-fill pull-right color-red back">Back</a> 
                                    <a href="<?php echo base_url().'admin/parent-campground-edit/'.$parentcampground->p_id;?>" class="btn btn-info btn-fill pull-right color-red back">Edit</a>

                                </div>
                          <!--   <div>
                                <h5>Banner Image</h5>
                                <?php if(!empty($parentcampground->bannerImage)){ ?>
                                <img src="<?php echo base_url().'uploads/ParentCampGround/'.$parentcampground->bannerImage;?>">
                                <?php }else{ ?>
                                <span>No banner image added yet.</span>
                                <?php } ?>
                            </div>  -->
                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            

        </div>
		<!--// Main Content \\-->
