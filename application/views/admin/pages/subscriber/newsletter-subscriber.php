<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />    -->
   <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Newsletter Subscriber List</li>
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
                                <h4 class="title">Newsletter Subscriber List</h4>
                            </div>
                            <div class="content">
                           <!--      <form action="" class="search-sort">
                                    <input type="text" class="form-control" placeholder="Search by State">
                                    <input type="submit" value="">
                                    <i class="fa fa-search"></i>
                                </form> -->
                                <div class="payment-list new-class change-dateinput">
                                    <table id="newsletter-subscriber-table">
                                         <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                         </thead>
                                            <tbody>
                                        <?php $i=0; foreach ($subscribers as $key => $subscriber) { $i=$i+1;  ?>
                                       
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $subscriber->email ?></td>
                                            <td><a href="javascript:void(0);" data-id="<?php echo $subscriber->id ?>"  class="ease-btn delete_newsletter" data-toggle="tooltip" title="Delete">Delete</a></td>

                                        </tr>
                                    <?php }?>

                                       
                                      
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