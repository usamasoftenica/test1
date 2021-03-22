
        <!--// Subheader \\-->
          <div class="ccg-subheader white-color" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #5b9bd5"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Payments</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home Page</a></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
		<div class="ccg-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="payment-list payment-page">
                            <table id="payement-table2">
                                 <thead>
                                <tr>
                                    <th>No</th>
                                     <th>Date</th>
                                    <th>Amount</th>
                                    <th>Paypal Txn ID</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                               </thead>
                                 <tbody>
                                    </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script type="text/javascript">
var newbase_url='<?php echo base_url(); ?>';
$('#payement-table2').DataTable({
   "processing": true,
   "serverSide": true,
   "ordering": false,
   "lengthMenu": [ [10, 25, 50, 100, 1000000], [10, 25, 50, 100, "All"] ],   
      "language": {
    "search": "Search By Price",
    "searchPlaceholder":"",
  },  
      "ajax": {

           url: newbase_url+"user/UserController/PaymentPagination",
             type: "post",
           "data": function ( d ) {
              
           },error: function(){  // error handling
               $(".example-error").html("");
               $("#example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
               $("#example_processing").css("display","none");
           }
       },
       "columns": [
       {"data": "no"},  
         {"data": "date"},      
         {"data": "currency"},
         {"data": "txn"},

       ],
} );
</script>