<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />   

   <div class="ccg-subheader">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <ul class="breadcrumb">

                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>

                            <li>Trial List</li>

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

                                <h4 class="title">Trial List</h4>

                            </div>

                            <div class="content">

                           <!--      <form action="" class="search-sort">

                                    <input type="text" class="form-control" placeholder="Search by State">

                                    <input type="submit" value="">

                                    <i class="fa fa-search"></i>

                                </form> -->

                                <div class="payment-list new-class change-dateinput">

                                    <div class="style-date extra-style-date">

                                        <!-- <label>Search By Dates</label>

                                    <input type="text" id="daterange" class="daterange-1" name="datefilter"  value="" /> -->



                                    <ul>
                                         <li>

                                        <div class="form-group">

                                         <select  class="form-control" name="type" id="type" >
                                             <option value="">Type</option>
                                             <option value="1">Paypal</option>
                                             <option value="2">Check</option>

                                         </select>

                                        </div>

                                    </li>
                                        <li>

                                        <div class="form-group">

                                            <input type="text" readonly name="from" style="cursor: pointer;" id="from_trial" class="form-control dp3" placeholder="From">

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-group">

                                            <input type="text" readonly name="to" id="to_trial" style="cursor: pointer;" class="form-control dp4" placeholder="To">

                                        </div>

                                    </li>

                                    </ul>

                                    </div>

                                    <table id="free-trial-table">

                                         <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>From Date</th>

                                            <th>Name</th>

                                           <!--  <th>Email</th> -->
                                            <!-- <th>Type</th> -->

                                            <th>End Date</th>

                                            <th>Status</th>



                                            <th>Action</th>

                                        </tr>

                                         </thead>

                                    <!--     <tr>

                                            <td>1</td>

                                            <td>25/05/2019</td>

                                            <td>Jone Deo</td>

                                            <td>info@gmail.com</td>

                                            <td><a href="subscriber-details.html" class="fa fa-eye" data-toggle="tooltip" title="View Detail"></a>

                                                <a href="" class="fa fa-ban" data-toggle="tooltip" title="Block"></a>

                                                <a href="" class="fa fa-trash" data-toggle="tooltip" title="Delete"></a>

                                            </td>

                                        </tr> -->

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