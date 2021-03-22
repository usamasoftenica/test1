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
                                    <form enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/site-description-excel-imported" method="post">
                                     <ul> 
                                       <li>
                                                <div class="reset-search">
                                                    <label>Import Campsites</label>
                                                    <button class="reset1-site reset">x</button>
                                                    <input type="file" accept=".xlsx,text/csv" name="campsites_file" class="form-control input-sm2">
                                                    
                                                    <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('campsites_file', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['campsites_file'];}?></label>



                                                    <p class="error1">
                                                        <?php if ($this->session->flashdata('missingRows')!="")
                                                        {
                                                            $data = $this->session->flashdata('missingRows') ;
                                                           
                                                            foreach ( $data as $row ) {

                                                                echo "<span style='color:red'>Row Number: &nbsp;<b>".$row."</b>&nbsp;(Invalid Data)";
                                                                echo "<br/></span>" ;
                                                            }

                                                        }?>
                                                    </p>
                                                </div>
                                        </li>
                                        <li id="submit-file" style="display: none;">
                                            <input style="margin-top: 32px;" type="submit" value="import" class="btn btn-primary">
                                        </li>

                                    </ul>
                                </form>
                                    <a href="<?php echo base_url() ?>/assets/admin/sitedescription.xlsx" download="Site Description(Sample)" class="btn btn-primary btn-fill" style="float: right">Sample File</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Site Description Detail Lists</h4>
                                <!-- <a href="<?php echo base_url() ?>admin/site-description-excel" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i>Print</a> -->

                               <!--  <a href="javascript::void(0)" class="btn btn-info btn-fill pull-right color-red print"><i class="fa fa-print"></i> Print</a> -->
                            </div>
                            <div class="content">
                                <div class="payment-list search-remove">
                                    <table id="import_description_list">
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

<script type="text/javascript">
    
    $( "input[name='campsites_file']" ).change(function() {
        $('#submit-file').show() ;
    });

</script>