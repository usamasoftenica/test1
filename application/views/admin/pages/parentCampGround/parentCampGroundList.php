
        <!--// Header \\-->

        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Parent Campground List</li>
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
                                <h4 class="title">Parent Campground List</h4>
                                <a href="<?php echo base_url();?>admin/parent-excel-file" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i> Print</a>
                            </div>
                            <div class="content">
                                <div class="payment-list cross-ab">
                                    <div class="extra-form">
                                        <label>Search by Region</label>
                                        <button class="reset1 reset">x</button>
                                        <input type="text" name="search" class="form-control input-sm1" id="extra" placeholder="" value="">
                                    </div>
                                     <table id="parent_table">
                                            <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Region</th>
                                            <th>Name</th>
                                             <th>Status</th>
                                           
                                            <!-- <th>Status</th> -->
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
    <script type="text/javascript">
   
  $( document ).ready(function() {
    $('#parent_table_filter').append( "<button class='reset-mind reset'>x</button>" );
//     $(".reset").click(function() {
//     $(this).closest('form').find("input[type=text]").val("");
// });

});
    </script>
