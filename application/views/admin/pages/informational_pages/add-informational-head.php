 <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Add Informational Head</li>
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
                                <h4 class="title">Add Header Data</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <form action="<?php echo base_url(); ?>admin/new-informational-head" method="post" id="add_information_head" >
                                        <ul>
                                        <input type="hidden" name="id" value="<?php if($informationhead !=''){ echo $informationhead->id;} else{}?>">
                                       
                                            <li class="full">
                                                <label>Header Data</label>
                                                <textarea class="form-control" name="head_area" required="" placeholder=""><?php if($informationhead !=''){ echo $informationhead->head_area;}?></textarea>
                                                   
                                            </li>
                                          
                                            <li class="full"><input type="submit" value="Submit"></li>
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
<script type="text/javascript">
         $('#add_information_page').on('submit', function(){
             var data = $('.note-editable').html();
            $('#description').val(data);               
        });

         </script>
		<!--// Main Content \\-->
