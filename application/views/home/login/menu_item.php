 <!--// Subheader \\-->

        <!-- <?php $banerimg=$information_rows[0]->banner; ?> -->
          <?php $banerimg=$information_rows[0]->banner; ?>
          <div class="ccg-subheader white-color" style="background-image: url('<?php echo base_url();?>/uploads/informationalPages/<?php echo $banerimg;?>');">
            <span class="ccg-subheader-transparent" style="background-color: <?php echo $information_rows[0]->color;?>"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: <?php echo  $information_rows[0]->nameColor;?>"><?php echo $information_rows[0]->name;?></h1>
                        <ul class="ccg-breadcrumb">
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		  <div class="ccg-main-content">
            
               
             <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                                <ul class="nav nav-tabs">
                                    <?php foreach ($information as $key => $info) {
                                        $where = array('informationalpages_id' => $info->info_id);
                                      $submenu=$this->Campgrounds->find_rows_data('menuitem', $where);
                                      
                                      ?>
                                  <li class="nav-item">

                                    <a class="click-drop nav-link" href="<?php echo base_url();?>information-pages/<?php echo $info->slug;?>"><?php echo $info->name ?></a>
                                    <span class="arrow-drop fa fa-angle-down arrow-click"></span>
                                    <span class="arrow fa fa-angle-up arrow-click"></span>
                                    <ul class="nav nav-tabs drop">
                                      <?php  foreach ($submenu as $key => $value) {
                                      # code...

                                    
                                    ?>
                                        <li><a class="nav-link submenus" data-id="<?php echo $value->id; ?>" data-count="10" href="<?php echo base_url();?>information-pages/<?php echo $info->slug;?>/<?php echo $value->menu_slug;?>"><?php echo $value->name;?></a>
                                        
                                        </li>
                                        <?php } ?>
                                    </ul>
                                  </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                             <div class="campground-map">
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                          
                                            <div class="col-md-12">
                                              <h2><?php echo $menu_item[0]->name;?></h2>
                                              <div class="submenueshow custom-style">
                                                <?php echo $menu_item[0]->description;?>
                                              </div>
                                            </div>
                                          
                                         
                                            <div class="col-md-5">
                                                <img src="images/blog-modern-img1.jpg" alt="">
                                            </div>
                                        </div>
                                  </div>
                               
                             
                                 
                                </div>
                            </div>

                       
                    </div>
                </div>
            </div>
          </div>
        </div>
          
      