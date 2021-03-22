  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Site Description Detail Lists</li>
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
                            <div class="content">
                                <div class="mega-search-extra">
                                    <ul>
                                        <li>
                                            <div class="reset-search">
                                                <label>Search by Parent Campground</label>
                                                <button class="reset1-site reset">x</button>
                                                <input type="text" name="search" class="form-control input-sm2" id="site-s" placeholder="" value="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reset-search">
                                                <label>Search by Child Campground</label>
                                                <button class="reset2-site-2 reset">x</button>
                                                <input type="text" name="search-child" class="form-control input-sm2" id="site-s-child" placeholder="" value="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reset-search">
                                                <label>Search by Campsite No.</label>
                                                <button class="reset1-site-3 reset">x</button>
                                                <input type="text" name="search-campsite" class="form-control input-sm2" id="site-s-campsite" placeholder="" value="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Site Description Detail Lists</h4>
                                <a href="<?php echo base_url() ?>admin/site-description-excel" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i> Print</a>

                               <!--  <a href="javascript::void(0)" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i> Print</a> -->
                            </div>
                            <div class="content">
                                <div class="payment-list search-remove">
                                    <table id="description_list">
                                            <thead>  
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Region</th> -->
                                            <th>Parent Campground Name</th>
                                            <th>Child Campground Name</th>
                                            <th>Campground Sites No</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                            </thead>
                                   
                                            <tbody>
                                      
                                            </tbody>
                                    </table>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
		<!--// Main Content \\-->
