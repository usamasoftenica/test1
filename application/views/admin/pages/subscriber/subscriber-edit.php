  <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                      <div class="card">

                        <div class="content">

                      

                            <div class="ccg-sign-form payment-list" style="overflow: unset;">

                               

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

                                                     

                                                  </div>

                                            <?php } ;?>

                                            <a style="margin: 0px;" href="<?php echo base_url() ?>admin/subscriber-details/<?php echo $user->id ?>" class="btn btn-info btn-fill pull-right color-red print">Subscriber Details</a>

                                             <a style="margin: 0px; margin-right: 10px;" href="javascript:window.history.go(-1);" class="btn btn-info btn-fill pull-right color-red print">Back</a>

                                           

                                            <div class="clearfix"></div>

                                <form action="<?php echo base_url();?>admin/updateSubscribe/<?php echo $user->id ?>" enctype="multipart/form-data" method="post" id="subscribe">

                                    <ul>

                                        <li>

                                           <!--  <input type="text" name="first_name" placeholder="First Name"> -->

                                           <label for="first_name">First Name</label>

                                             <input class="form-control" name="first_name" type="text" placeholder="First Name" value="<?php echo $user->first_name ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('first_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['first_name'];}?></label>

                                        </li>

                                        <li>

                                           <label for="last_name">Last Name</label>

                                           <!--  <input type="text" name="last_name" placeholder="Last Name"> -->

                                             <input class="form-control" name="last_name" type="text" placeholder="Last Name" value="<?php echo $user->last_name ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('last_name', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['last_name'];}?></label>

                                        </li>

                                        <li>

                                          <label for="email">Email</label>

                                            <!-- <input type="email" name="email" placeholder="Email Address"> -->

                                             <input class="form-control" readonly style="cursor: no-drop;" name="email" type="text" placeholder="Email Address" value="<?php echo $user->email ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('email', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['email'];}?></label>

                                        </li>

                                        <li>

                                           <label for="billing_address">Billing Address</label>

                                            <!-- <input type="text" name="billing_address" placeholder="Billing Address/PO Box"> -->

                                             <input class="form-control" name="billing_address" type="text" placeholder="Billing Address/PO Box" value="<?php echo $user->billing_address ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('billing_address', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['billing_address'];}?></label>

                                        </li>

                                        <li>

                                          <label for="apartment">Apartment</label>

                                            <!-- <input type="text" name="apartment" placeholder="Apartment"> -->

                                             <input class="form-control" name="apartment" type="text" placeholder="Apartment" value="<?php echo $user->apartment ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('apartment', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['apartment'];}?></label>

                                        </li>

                                        <li>

                                           <label for="city">City</label>

                                            <!-- <input type="text" name="city" placeholder="City"> -->

                                             <input class="form-control" name="city" type="text" placeholder="City" value="<?php echo $user->city ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('city', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['city'];}?></label>

                                        </li>

                                        <li>

                                           <label for="state">State</label>

                                            <!-- <input type="text" name="state" placeholder="State"> -->

                                             <input class="form-control" name="state" type="text" placeholder="State" value="<?php echo $user->state ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('state', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['state'];}?></label>

                                        </li>

                                        <li>

                                           <label for="zip_code">Zip Code</label>

                                            <!-- <input type="text" name="zip_code" placeholder="Zip Code"> -->

                                             <input class="form-control" name="zip_code" type="text" placeholder="Zip Code" value="<?php echo $user->zip_code ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('zip_code', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['zip_code'];}?></label>

                                        </li>

                                        <li>

                                          <label for="country">Country</label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="country" type="text" placeholder="Country" value="<?php echo $user->country ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('country', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['country'];}?></label>

                                        </li>

                                         <li>

                                         <label for="country">Image <small>(Only png & jpg)</small></label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="imageSubscriber" type="file" placeholder=""  >

                                            <label  class="error" ><?php if ($this->session->flashdata('imageError1')!=""){echo $this->session->flashdata('imageError1');}?></label>

                                        </li>
                                        <?php if($user->createdBy==1 || $user->payment_by==2 ){ ?>
                                          <li>

                                          <label for="subscriberType">Subscriber Type</label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                          <!--  -->
                                          <select  class="form-control" name="subscriberType" id="subscriberType" >
                                            <option value="">Select Subscriber Type</option>

                                           <?php if( $user->payment_by!=2 ){ ?> <option <?php if($user->admin_status==2){ echo 'selected'; } ?> value="Free For Ever">Free For Ever</option> <?php } ?>
                                            <option <?php if($user->admin_status==1){ echo 'selected'; } ?> value="Manual Payment">Manual Payment</option>

                                          </select>


                                            <label  class="error" ><?php if ($this->session->flashdata('error2')!="" && array_key_exists('subscriberType', $this->session->flashdata('error2'))){echo $this->session->flashdata('error2')['subscriberType'];}?></label>

                                        </li>

                                          <li style="display: none;" id="subscribe-payment-add">

                                       <label for="amount">Amount($)</label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->

                                             <input class="form-control" name="amount" type="text" placeholder="Amount" value="<?php if(isset($payments->payment_gross)) { echo $payments->payment_gross; } ?>" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error2')!="" && array_key_exists('amount', $this->session->flashdata('error2'))){echo $this->session->flashdata('error2')['amount'];}?></label>

                                        </li>

                                            <li style="display: none;" id="subscribe-date-add">

                                          <label for="e_date">Expiry Date</label>

                                            <!-- <input type="text" name="country" placeholder="Country"> -->
                                            <?php $date=date_create($user->subscription_date);
                                             
                                                  ?>
                                             <input class="form-control" name="e_date" type="date" min="" id="txtDate" value="<?php print(date_format($date,"Y-m-d")); ?>" placeholder="e_date" >



                                            <label  class="error" ><?php if ($this->session->flashdata('error2')!="" && array_key_exists('e_date', $this->session->flashdata('error2'))){echo $this->session->flashdata('error2')['e_date'];}?></label>

                                        </li>

                                       <?php } ?>


                                        <li  style="width:100%">

                                 

                                            <input class="submit" type="submit" value="Update">

                                        </li>

                                        <!-- <li><p>Already have an  account? <a href="<?php echo base_url();?>login">Login here</a></p></li> -->

                                    </ul>

                                </form>

                                <div class="clearfix"></div>

                            </div>

                            </div>

                            <div class="clearfix"></div>

                      </div>

                      

                    </div>



                </div>

            </div>



        </div>
         <script type="text/javascript">
          $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', maxDate);
});
        $(document).ready(function(){
            var v=$('#subscriberType').val();
           if(v=='Free For Ever')
          {
            $('#subscribe-payment-add').css('display','none');
            $('#subscribe-date-add').css('display','none');

          }else{
            $('#subscribe-payment-add').css('display','');
            $('#subscribe-date-add').css('display','');
          }
        });

          $('#subscriberType').change(function(){
          var subType = $(this).val();
          if(subType=='Free For Ever')
          {
            $('#subscribe-payment-add').css('display','none');
            $('#subscribe-date-add').css('display','none');

          }else{
            $('#subscribe-payment-add').css('display','');
            $('#subscribe-date-add').css('display','');
          }

          });
        </script>