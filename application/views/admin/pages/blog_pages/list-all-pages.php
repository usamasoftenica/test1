 <div class="ccg-subheader">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                            <li>Blogs List</li>
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
                                <h4 class="title">Blogs List</h4>
                            </div>
                            <div class="content">
                                <div class="payment-list">
                                    <table id="blog_table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Blog Title</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                    <!--                     <?php foreach($blogs as $blog) { ?>
                                            <tr id="blog-tr-<?php echo $blog->blog_id ?>">
                                                <td><?php echo $blog->blog_id ?></td>

                                                <?php $newDate = date("d/m/Y", strtotime($blog->created_at)); ?>
                                                <td><?php echo $newDate ?></td>
                                                <td><?php echo $blog->blog_title ?></td>
                                                <td><?php echo $blog->blog_slug ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>/admin/BlogController/blogEdit/<?php echo $blog->blog_id ?>" class="ease-btn" data-toggle="tooltip" title="Eidt">Edit</a>
                                                    <a id="blog-del-<?php echo $blog->blog_id ?>" data-id="<?php echo $blog->blog_id ?>" href="javascript:void(0)" class="ease-btn dell-blogqweq" data-toggle="tooltip" title="Delete">Delete</a>
													<a href="<?php echo base_url(); ?>admin/blog-detail/<?php echo $blog->blog_slug ?>" class="ease-btn" data-toggle="tooltip" title="View Detail">View</a>
													<a href="<?php echo base_url(); ?>admin/blog-detail/<?php echo $blog->blog_slug ?>" class="ease-btn" data-toggle="tooltip" title="View Detail">Comments</a>
                                                </td>
                                            </tr>
                                        <?php } ?> -->


                                    </table>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
