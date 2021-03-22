  <!--// Subheader \\-->
        <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>admin/dashboard">Home</a></li>
                            <li>Edit Menu Item</li>
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
                                <h4 class="title">Edit Menu Item</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                      <?php echo validation_errors(); ?>
                                    <form action="<?php echo base_url(); ?>admin/update-menu-item" method="post" id="add_menu_item">
                                        <ul>
                                            <li>
                                                <input type="hidden" value="<?php echo $menuitem->id;?>" name="id">
                                                <label>Name</label>
                                                <input class="form-control" value="<?php echo $menuitem->name;?>" name="name" type="text" placeholder="">
                                            </li>
                                        
                                            <li class="full"><label>Description</label><div id="editor"><?php echo $menuitem->description;?></div></li>
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
               var data = $(".cke_wysiwyg_frame").contents().find("body").html();
            $('#description').val(data);               
        });

         </script>
		<!--// Main Content \\-->
