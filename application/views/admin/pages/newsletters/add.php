  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Add Newsletter</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Newsletter </h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">

                                    <form  enctype="multipart/form-data" method="post" id="add_newsletter" action="<?php echo base_url(); ?>admin/store-newsletter">
                                        <ul>
                                            <li>
                                                <label>Newsletter title</label>
                                                <input class="form-control" type="text" name="newsletter_title" value="<?php if ($this->session->flashdata('data')!="" && array_key_exists('newsletter_title', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['newsletter_title'];}?>" >

                                            <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('newsletter_title', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['newsletter_title'];}?></label>
                                            </li>
                                            <li>
                                                <label>Newsletter image</label>
                                                <input class="form-control" type="file"
                                                name="newsletter_image" >
                                                <label  class="error" ><?php if ( $this->session->flashdata('image_error')){echo $this->session->flashdata('image_error');}?></label>

                                            </li>
                                            <li>
                                                <label>Newsletter pdf file</label>
                                                <input class="form-control" type="file"
                                                name="newsletter_pdf_file">
                                                <label  class="error" ><?php if ( $this->session->flashdata('pdf_error')){echo $this->session->flashdata('pdf_error');}?></label>
                                               
                                            </li>

                                            <!-- <input type="hidden" name="description" id="description"> -->
                                  

	

											<li class="full">
												<label>Newsletter Description</label>
                                                <textarea name="description1" class="form-control" rows="3"><?php if ($this->session->flashdata('data')!="" && array_key_exists('description1', $this->session->flashdata('data'))){echo $this->session->flashdata('data')['description1'];}?></textarea>
                                                <label  class="error" ><?php if ($this->session->flashdata('error')!="" && array_key_exists('description1', $this->session->flashdata('error'))){echo $this->session->flashdata('error')['description1'];}?></label>
                                            </li>
												<!-- <div class="html-editor"></div> -->
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


         </script>
