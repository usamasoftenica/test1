 <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Child Campgrounds List</li>
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
                                <h4 class="title">Child Campgrounds List</h4>
                                <a href="<?php echo base_url();?>admin/child-excel-file" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i> Print</a>
                            </div>
                            <input type="hidden" id="page_count" name="page" >
                            <div class="content">
                                <div class="payment-list">
                                    <div style="right:400px" class="top-margin extra-form">
                                        <label>Search by Parent Campground</label>
                                           <button class="reset1-c reset">x</button>
                                        <input type="text" name="search" class="form-control input-sm2" id="p_extra" placeholder="" value="">
                                        

                                    </div>
                                     <table id="child_table">
                                            <thead>                                        
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Region</th> -->
                                            <th>Parent Campground</th>
                                            <th>Child Campground</th>
                                                <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="child_campground_list">
                                      
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
           <script type="text/javascript">
   
  $( document ).ready(function() {
    $('#child_table_filter').append( "<button class='reset-mind-c reset'>x</button>" );
//     $(".reset").click(function() {
//     $(this).closest('form').find("input[type=text]").val("");
// });

});
    </script>
