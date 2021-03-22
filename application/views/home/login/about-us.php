<!--// Subheader \\-->
<div class="ccg-subheader" style="background-image: url('images/sub-header-img.jpg');">
	<span class="ccg-subheader-transparent" style="background-color: tan;"></span>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>About Us</h1>
				<ul class="ccg-breadcrumb">
					<li><a href="<?php echo base_url();?>">Home Page</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--// Subheader \\-->

<!--// Main Content \\-->


	<div class="ccg-main-content">

            <!--// Main Section \\-->
            <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5" data-t-show="3"><img src="<?php echo base_url() ?>uploads/blog/<?php echo $content[0]->image ?>" alt="" class="welcome-img-about"></div>
                        <div class="col-md-7" data-t-show="3">
                            <div class="ccg-table">
                                <div class="ccg-table-cell">
                                    <div class="welcome-note">
                                        <!-- <h2>Welcome to Colorado Campgrounds!</h2> -->
                                        <!-- <span>HELLO THERE!</span> -->
                                        <p><?php echo $content[0]->content; ?></p>
                                        <!-- <ul class="services">
                                            <li><a href="#"><i class="icon-summer ab"></i><i class="icon-summer"></i> Campsite Information</a></li>
                                            <li><a href="#"><i class="icon-fire ab"></i><i class="icon-fire"></i> Tips and tricks</a></li>
                                            <li><a href="#"><i class="icon-draw ab"></i><i class="icon-draw"></i> Discussion Forum</a></li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

		</div>
<!--// Main Content \\-->
