<!--// Subheader \\-->
<div class="ccg-subheader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                    <li>Region's SEO Information</li>
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
                        <h4 class="title">Region's SEO Information</h4>
                    </div>
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
                            <a href="<?php echo base_url() ?>admin/parent-campground-list" class="btn btn-primary view-list-btn">View list</a>
                        </div>
                    <?php } ;?>
                    <div class="content">
                        <div class="payment-list">
                            <form action="<?php echo base_url(); ?>admin/updateSeo" method="post" id="add-region-seo" enctype="multipart/form-data">
                                <ul>
                                    <li class="full">
                                        <div class="header" style="padding: 0px;">
                                            <h4 class="title">SEO Information</h4>
                                        </div>
                                    </li>
                                    <li >
                                        <label>Select Region</label>
                                        <select name="region" id="seo_regionid" class="form-control">
                                            <option value="">Select Region</option>
                                            <option value="Northwest">Northwest</option>
                                            <option value="Southwest">Southwest</option>
                                            <option value="Northeast">Northeast</option>
                                            <option value="Southeast">Southeast</option>
                                            <option value="Central">Central</option>
                                            <option value="South">South</option>
                                            <option value="North">North</option>
                                            <option value="West">West</option>
                                            <option value="East">East</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label>PAGE TITLE</label>
                                        <input class="form-control" value="" id="Seo_pageTitle" name="title" type="text" value="">
                                    </li>
                                    <li>
                                        <label>KEYWORDS FOR META TAG(COMMA SEPERATED)</label>
                                        <input class="form-control" value="" id="Seo_keywords" type="text" name="keyword" placeholder="">
                                    </li>
                                    <li class="full">
                                        <label>META DESCRIPTION</label>
                                        <textarea class="form-control"  id="Seo_description" name="meta_description" placeholder=""></textarea>
                                    </li>
                                    <li class="full"><input type="submit" name="publish" value="Submit"> </li>
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