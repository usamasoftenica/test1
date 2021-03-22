
             <?php if($this->session->flashdata('success')!=""){  ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo $this->session->flashdata('success'); ?>
                             </div>
                      <?php } ;?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-boxes">
                            <ul>
                                <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-way"></i>
                                        <span>Parent Campground</span>
                                        <h2><?php echo $parentcampground;?></h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-way"></i>
                                        <span>Child Campground</span>
                                        <h2><?php echo $childcampground;?></h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-user"></i>
                                        <span>Subscribers</span>
                                        <h2><?php echo $subscribe; ?></h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-note2"></i>
                                        <span>Pending Discussion Topics</span>
                                        <h2><?php echo $forums; ?></h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-albums"></i>
                                        <span>Discussion Topics Pending Comments</span>
                                        <h2><?php echo $comments; ?></h2>
                                    </div>
                                </li>
                                 <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-albums"></i>
                                        <span>Blog Pending Comments</span>
                                        <h2><?php echo $blog_comments; ?></h2>
                                    </div>
                                </li>
                                 <li>
                                    <div class="dashboard-boxes-text">
                                        <i class="pe-7s-albums"></i>
                                        <span>Informational Pages Pending Comments</span>
                                        <h2><?php echo $infor_comments; ?></h2>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


