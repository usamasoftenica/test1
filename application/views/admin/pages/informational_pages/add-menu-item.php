  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Add Menu Item</li>
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
                                <h4 class="title">Add Menu Item</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                      <?php echo validation_errors(); ?>
                                    <form action="<?php echo base_url(); ?>admin/new-menu-item" method="post" id="add_menu_item">
                                        <ul>
                                            <li>
                                                <label>Name</label>
                                                <input class="form-control" name="name" type="text" placeholder="">
                                            </li>
                                            <input type="hidden" name="info_page_id" value="<?php echo $info_page_id; ?>">
                                            <li class="full"><label>Description</label><div class="html-editor"></div></li>
                                                <input type="hidden" name="description" id="description">
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
         $('#add_menu_item').on('submit', function(){
             var data = $('.note-editable').html();
            $('#description').val(data);               
        });

         </script>
		<!--// Main Content \\-->
