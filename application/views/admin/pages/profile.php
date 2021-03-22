   <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ;?>admin/dashboard">Home</a></li>
                            <li>Profile</li>
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
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/update_profile" method="post" id="update_profile">
                                        <input type="hidden" name="id" value="<?php echo $admin->adminId; ?>">
                                        <ul>
                                            <li>
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?php echo $admin->email; ?>" placeholder="Type here" class="form-control">
                                            </li>
                                             <li>
                                                <label>Password</label>
                                                <input type="password" name="password" id="password" placeholder="Type here" class="form-control">
                                            </li>
                                             <li>
                                                <label>Confirm password</label>
                                                <input type="password" name="confirm_password" placeholder="Type here" class="form-control">
                                            </li>
                                            <li><input type="submit" value="Submit"></li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
		<!--// Main Content \\-->

