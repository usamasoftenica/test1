<!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Site Parameters</li>
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
                        <div class="header">
                            <h4 class="title">Site Parameters</h4>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">

                                        <a <?php if ($this->session->flashdata('section')!=1){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">First Column</a>
                                      </h4>
                                      <!-- for sorting -->
                                       <input type="hidden" id="page" name="page">
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==1){?> in <?php }?> " role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                        <label for="">Spacing</label>
                        <div class="scrolling-box">
                            <table >
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                <tbody id="tablecontents">
                                <?php foreach ($spacings as $spacing) {  ?>
                                    <tr>
                                 <td><?php echo $spacing->sp_name; ?> <?php if(!empty($spacing->sp_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $spacing->sp_image; ?>"><?php }?></td>
                                 <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_space sort_id"  title="" data-original-title="Edit" data-id="<?php echo $spacing->sp_id; ?>" data-name="<?php echo $spacing->sp_name; ?>" > Edit</a>
                                        <a href="javascript:void(0);" class="ease-btn delete_spacing" data-id="<?php echo $spacing->sp_id; ?>" > Delete</a>
                                    </td>
                                </tr>
                                                            <?php } ?>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- <?php echo validation_errors(); ?> -->

                                                    <form action="<?php echo base_url(); ?>admin/new-spacing" method="post" id="add_spacing" enctype="multipart/form-data">
                                                      <h5>Add new Spacing option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon"  >
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('icon', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['icon'];}?></label>
                                                         <label class="error"><?php if ($this->session->flashdata('imageError1')!="" ){echo $this->session->flashdata('imageError1');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                                <li>
                                                    <label for="">Type of View</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="view_sorting">
                                                          <?php foreach ($views as $view) { ?>
                                                                <tr>
                                                             <td><?php echo $view->view_name; ?><?php if(!empty($view->view_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $view->view_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_view view_id"  title="Edit" data-id="<?php echo $view->view_id; ?>" data-name="<?php echo $view->view_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_view" data-id="<?php echo $view->view_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                           </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_type_view" method="post" id="add_view" enctype="multipart/form-data">
                                                       <h5>Add new Type of view option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name2">
                                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name2', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name2'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon2"  >
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('icon2', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['icon2'];}?></label>
                                                         <label class="error"><?php if ($this->session->flashdata('imageError2')!="" ){echo $this->session->flashdata('imageError2');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=2){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Second Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==2){?> in <?php }?>" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">What’s Allowed</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="camping_sorting">
                                                           <?php foreach ($campings as $camping) { ?>
                                                                <tr>
                                                             <td><?php echo $camping->camping_name; ?><?php if(!empty($camping->camping_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $camping->camping_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_camping camp_sort"  title="Edit" data-id="<?php echo $camping->camping_id; ?>" data-name="<?php echo $camping->camping_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_camping" data-id="<?php echo $camping->camping_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_comping" method="post" id="add_comping" enctype="multipart/form-data">
                                                      <h5>Add new Camping option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name3">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name3', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name3'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon3"  >
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('icon3', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['icon3'];}?></label>
                                                         <label class="error"><?php if ($this->session->flashdata('imageError3')!="" ){echo $this->session->flashdata('imageError3');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=3){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Third Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==3){?> in <?php }?>" role="tabpanel" aria-labelledby="headingThree">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                               <!--  <li>
                                                    <label for="">LENGTH</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="length_sorting">
                                                                <?php foreach ($parameter_trailers as $parameter_trailer) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_trailer->trailer_name; ?><?php if(!empty($parameter_trailer->trailer_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_trailer->trailer_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_trailer length_id"  title="Edit" data-id="<?php echo $parameter_trailer->trailer_id; ?>" data-name="<?php echo $parameter_trailer->trailer_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_trailer" data-id="<?php echo $parameter_trailer->trailer_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                         </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_trailer" method="post" id="add_trailer" enctype="multipart/form-data">
                                                      <h5>Add new Length option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name4">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name4', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name4'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon4" >
                                                          <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('icon4', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['icon4'];}?></label>
                                                         <label class="error"><?php if ($this->session->flashdata('imageError4')!="" ){echo $this->session->flashdata('imageError4');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li> -->
                                                <li>
                                                    <label for="">GRADE</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="grade_sorting">
                                                               <?php foreach ($parameter_grades as $parameter_grade) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_grade->grade_name; ?><?php if(!empty($parameter_grade->grade_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_grade->grade_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_grade grade_id"  title="Edit" data-id="<?php echo $parameter_grade->grade_id; ?>" data-name="<?php echo $parameter_grade->grade_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0)" class="ease-btn delete_grade" data-id="<?php echo $parameter_grade->grade_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                           </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_grade" method="post" id="add_grade" enctype="multipart/form-data">
                                                       <h5>Add new Grade option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name5">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name5', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name5'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon5"  >
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('icon5', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['icon5'];}?></label>
                                                         <label class="error"><?php if ($this->session->flashdata('imageError5')!="" ){echo $this->session->flashdata('imageError5');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                                <li>
                                                    <label for="">Base</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="base_sorting">
                                                              
                                                             <?php foreach ($parameter_bases as $parameter_base) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_base->base_name; ?><?php if(!empty($parameter_base->base_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_base->base_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_base base_id"  title="Edit" data-id="<?php echo $parameter_base->base_id; ?>" data-name="<?php echo $parameter_base->base_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_base" data-id="<?php echo $parameter_base->base_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_base" method="post" id="add_base" enctype="multipart/form-data">
                                                       <h5>Add new Base option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name6">
                                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name6', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name6'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon6"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError6')!="" ){echo $this->session->flashdata('imageError6');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=4){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Fourth Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==4){?> in <?php }?>" role="tabpanel" aria-labelledby="headingFour">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">Access</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <body id="sorting_access">
                                                             <?php foreach ($parameter_acess as $parameter_ace) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_ace->acess_name; ?><?php if(!empty($parameter_ace->acess_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_ace->acess_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_access access_id"  title="Edit" data-id="<?php echo $parameter_ace->acess_id; ?>" data-name="<?php echo $parameter_ace->acess_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_access" data-id="<?php echo $parameter_ace->acess_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                           </body>
                                                        </table>
                                                    </div>
                                                   <form action="<?php echo base_url(); ?>admin/new_access" method="post" id="add_access" enctype="multipart/form-data">
                                                     <h5>Add new Acess option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name7">
                                                        <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name7', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name7'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon7"  >
                                                        <label class="error"><?php if ($this->session->flashdata('imageError7')!="" ){echo $this->session->flashdata('imageError7');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=5){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Fifth Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==5){?> in <?php }?>" role="tabpanel" aria-labelledby="headingFive">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">AMPS</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="amps_sorting">
                                                              <?php foreach ($parameter_amps as $parameter_amp) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_amp->amp_name; ?><?php if(!empty($parameter_amp->amp_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_amp->amp_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_amps amps_id"  title="Edit" data-id="<?php echo $parameter_amp->amp_id; ?>" data-name="<?php echo $parameter_amp->amp_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_amps" data-id="<?php echo $parameter_amp->amp_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                           </tbody>
                                                        </table>
                                                    </div>
                                                      <form action="<?php echo base_url(); ?>admin/new_amps" method="post" id="add_amps" enctype="multipart/form-data">
                                                         <h5>Add new AMPS option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name8">
                                                          <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name8', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name8'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon8"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError8')!="" ){echo $this->session->flashdata('imageError8');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=6){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Sixth Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==6){?> in <?php }?>" role="tabpanel" aria-labelledby="headingSix">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">WATER SUPPLY</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="water_sorting">
                                                             <?php foreach ($parameter_waters as $parameter_water) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_water->water_name; ?><?php if(!empty($parameter_water->water_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_water->water_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_water water_id"  title="Edit" data-id="<?php echo $parameter_water->water_id; ?>" data-name="<?php echo $parameter_water->water_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_water" data-id="<?php echo $parameter_water->water_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_water" method="post" id="add_water" enctype="multipart/form-data">
                                                       <h5>Add new Water supply option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name9">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name9', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name9'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon9"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError9')!="" ){echo $this->session->flashdata('imageError9');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                                <li>
                                                    <label for="">SEWER</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="sewer_sorting">
                                                          <?php foreach ($parameter_sewers as $parameter_sewer) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_sewer->sewer_name; ?><?php if(!empty($parameter_sewer->sewer_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_sewer->sewer_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_sewer sewer_id"  title="Edit" data-id="<?php echo $parameter_sewer->sewer_id; ?>" data-name="<?php echo $parameter_sewer->sewer_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_sewer" data-id="<?php echo $parameter_sewer->sewer_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_sewer" method="post" id="add_sewer" enctype="multipart/form-data">
                                                      <h5>Add new Sewer option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name10">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name10', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name10'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon10"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError10')!="" ){echo $this->session->flashdata('imageError10');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSeven">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=7){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Seventh Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==7){?> in <?php }?>" role="tabpanel" aria-labelledby="headingSeven">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                              <li>
                                                    <label for="">WIFI</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="wifi_sorting">
                                                              <?php foreach ($parameter_wifi as $parameter_wifi) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_wifi->wifi_name; ?><?php if(!empty($parameter_wifi->wifi_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_wifi->wifi_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_wifi wifi_id"  title="Edit" data-id="<?php echo $parameter_wifi->wifi_id; ?>" data-name="<?php echo $parameter_wifi->wifi_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_wifi" data-id="<?php echo $parameter_wifi->wifi_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_wifi" method="post" id="add_wifi" enctype="multipart/form-data">
                                                      <h5>Add new WIFI option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name12">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name12', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name12'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon12"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError12')!="" ){echo $this->session->flashdata('imageError12');}?></label>

                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                                <li>
                                                    <label for="">Cable TV</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="cable_sorting">
                                                              <?php foreach ($parameter_cable as $parameter_cable) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_cable->cable_name; ?><?php if(!empty($parameter_cable->cable_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_cable->cable_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_cable cable_id"  title="Edit" data-id="<?php echo $parameter_cable->cable_id; ?>" data-name="<?php echo $parameter_cable->cable_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_cable" data-id="<?php echo $parameter_cable->cable_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_cable" method="post" id="add_cable" enctype="multipart/form-data">
                                                      <h5>Add new Cable TV option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name13">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name13', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name13'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon13"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError13')!="" ){echo $this->session->flashdata('imageError13');}?></label>

                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                                <li>
                                                    <label for="">Service Providers</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="verizon_sorting">
                                                              <?php foreach ($parameter_verizons as $parameter_verizon) { ?>
                                                                <tr>
                                                             <td><?php echo $parameter_verizon->verizon_name; ?><?php if(!empty($parameter_verizon->verizon_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_verizon->verizon_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_verizon verizon_id"  title="Edit" data-id="<?php echo $parameter_verizon->verizon_id; ?>" data-name="<?php echo $parameter_verizon->verizon_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_verizon" data-id="<?php echo $parameter_verizon->verizon_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>admin/new_verizon" method="post" id="add_verizon" enctype="multipart/form-data">
                                                      <h5>Add new Service provider option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name11">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name11', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name11'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon11"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError11')!="" ){echo $this->session->flashdata('imageError11');}?></label>

                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingEight">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=8){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Eighth Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapseEight" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==8){?> in <?php }?>" role="tabpanel" aria-labelledby="headingEight">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">Shade Types</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="shade_sorting">
                                                                <?php foreach ($parameter_shades as $parameter_shade) {  ?>
                                                                <tr>
                                                             <td><?php echo $parameter_shade->shade_name; ?> <?php if(!empty($parameter_shade->shade_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_shade->shade_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_shade shade_id"  title="Edit" data-id="<?php echo $parameter_shade->shade_id; ?>" data-name="<?php echo $parameter_shade->shade_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_shade" data-id="<?php echo $parameter_shade->shade_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_shade" method="post" id="add_shade1" enctype="multipart/form-data">
                                                       <h5>Add new Shade type option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name12">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name12', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name12'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon12"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError12')!="" ){echo $this->session->flashdata('imageError12');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingnine">
                                      <h4 class="panel-title">
                                        <a <?php if ($this->session->flashdata('section')!=9){?> class="collapsed" <?php }?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapsenine">Nine Column</a>
                                      </h4>
                                    </div>
                                    <div id="collapsenine" class="panel-collapse collapse <?php if ($this->session->flashdata('section')==9){?> in <?php }?>" role="tabpanel" aria-labelledby="headingnine">
                                      <div class="panel-body">
                                          <div class="payment-list spacing scrolling">
                                            <ul>
                                                <li>
                                                    <label for="">Tabel/Firing Grill/Grill</label>
                                                    <div class="scrolling-box">
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tbody id="tablefire_sorting">
                                                                <?php foreach ($parameter_table as $parameter_table) {  ?>
                                                                <tr>
                                                             <td><?php echo $parameter_table->table_name; ?> <?php if(!empty($parameter_table->table_image)){ ?> <img style="width:30px;" src="<?php echo base_url() ?>uploads/SideParameter/<?php echo $parameter_table->table_image; ?>"><?php } ?></td>
                                                             <td><a href="" data-toggle="modal" data-target="#exampleModal" class="ease-btn edit_table table_id"  title="Edit" data-id="<?php echo $parameter_table->table_id; ?>" data-name="<?php echo $parameter_table->table_name; ?>"  data-original-title="View Detail"> Edit</a>
                                                                    <a href="javascript:void(0);" class="ease-btn delete_table" data-id="<?php echo $parameter_table->table_id; ?>"> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                     <form action="<?php echo base_url(); ?>admin/new_table" method="post" id="add_table" enctype="multipart/form-data">
                                                       <h5>Add new Table Firing Grill option</h5>
                                                        <input type="text" class="form-control" placeholder="Enter the name" name="name13">
                                                         <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('name13', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['name13'];}?></label>
                                                        <label for="">Upload Icon</label>
                                                        <input type="file" name="icon13"  >
                                                         <label class="error"><?php if ($this->session->flashdata('imageError13')!="" ){echo $this->session->flashdata('imageError13');}?></label>
                                                        <br>
                                                        <input type="submit" value="Submit">
                                                    </form>
                                                </li>
                                            </ul>
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

        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                     <form  method="post" id="edit_form" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="ename" placeholder="Enter the name" name="name">
                        <label for="">Upload Icon</label>
                        <input type="file" name="icon"  >
                        <br>
                        <input class="btn btn-primery" type="submit" value="Submit">
                    </form>

      </div>
      <div class="modal-footer">
      <!--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
		<!--// Main Content \\-->
