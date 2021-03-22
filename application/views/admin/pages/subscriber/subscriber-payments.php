<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Payments</li>
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
                                <h4 class="title">Payments</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list change-dateinput">
                                    <div class="style-date">
                                        <label>Search By Dates</label>
                                    <input type="text" id="daterange" name="datefilter"  value="" />
                                    </div>
                                    <table id="payement-table">
                                         <thead>
                                        <tr>
                                            <th>No</th>
                                             <th>Date</th>
                                            <th>Subscriber Name</th>
                                            <th>Subscriber Email</th>
                                            <th>Amount</th>
                                            <th>Paypal Txn ID</th>
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
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

});
</script>