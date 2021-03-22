
        <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Set Subscription Amount</li>
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
                                <h4 class="title">Subscription</h4>
                            </div>
                            <div class="content">
                                <?php if($this->session->flashdata('error1')!=""){  ?>
                                           <div class="alert alert-danger">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong></strong> <?php echo $this->session->flashdata('error1'); ?>
                                                  </div>
                                            <?php } ;?>
                                            <?php if($this->session->flashdata('success1')!=""){  ?>
                                           <div class="alert alert-success">
                                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                      <strong><?php echo $this->session->flashdata('success1'); ?></strong> 
                                                      <!-- <a href="<?php echo base_url() ?>admin/site-description-list" class="btn btn-primary view-list-btn">View list</a> -->
                                                  </div>
                                            <?php } ;?>
                                <form action="<?php echo base_url() ?>admin/update-payment" class="outbound-email" id="outbound-email" method="post">
                                     <ul>
                                          <li>
                                             <label for="">Set Subscription Amount</label>
                                             <input type="number" step="0.01" name="amount" value="<?php echo $amount->pAmount; ?>" class="form-control" placeholder="">
                                              <label class="error"><?php if ($this->session->flashdata('error2')!="" && array_key_exists('amount', $this->session->flashdata('error2'))){echo $this->session->flashdata('error2')['amount'];}?></label>
                                          </li>
                                      <!--     <li class="full">
                                             <label for="">Email Detail</label>
                                             <div class="html-editor"><?php echo $email->descritpion; ?> </div>
                                              <label class="error"><?php if ($this->session->flashdata('error')!="" && array_key_exists('details', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['details'];}?></label>
                                             <input type="hidden" name="details" id="details" value="">
                                          </li> -->
                                          <li><input type="submit"  class="btn btn-info btn-fill color-red" value="Submit" style="margin-top: 33px"></li>
                                     </ul>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script type="text/javascript">
        $('#outbound-email').submit(function () {
       var data= $('.note-editable').html();
       $('#details').val(data);
        });
        </script>