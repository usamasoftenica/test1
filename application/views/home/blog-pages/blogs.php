<!--// Main Wrapper \\-->
<div class="ccg-main-wrapper">
	<!--// Header \\-->

	<!--// Subheader \\-->
	<div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>/assets/images/sub-header-img.jpg');">
		<span class="ccg-subheader-transparent" style="background-color: tan;"></span>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Blog</h1>
					<ul class="ccg-breadcrumb">
						<li><a href="<?php echo base_url();?>">Home Page</a></li>
						<li>Blog</li>
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
					<div class="col-md-12">
						<div class="ccg-blog ccg-blog-modern">

							<ul class="row htmlShow">

							</ul>
						</div>
						<ul id="example-2" class="pagination"></ul>
					</div>
				</div>
			</div>
		</div>
		<!--// Main Section \\-->
	</div>
	<!--// Main Content \\-->


	<div class="clearfix"></div>
</div>
<!--// Main Wrapper \\-->


<script>
	var baseurl='<?php echo base_url()?>';
	window.onload = function_name();
	function formatDate(date) {
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}

	function function_name () {
		var length = 9;
		$('#example-2').pagination({
			total: 1, // 总数据条数
			current: 1, // 当前页码
			length: length, // 每页数据量
			size: 1, // 显示按钮个数
			ajax: function (options, refresh, $target) {

				var html = '';
				$.ajax({
					url: baseurl+ 'searchListBlog',
					type: 'POST',
					data: {
						current: options.current,
						length: options.length,

					},
					dataType: 'json'
				}).done(function (response) {
					var res=response[0];
					console.log(res) ;
					var months=['Jan','Feb','Mar','April','May','June','July','Aug','Sep','Oct','Nov','Dec'];


						for (var i=0;  i<res.length; i++ )
					{

						if(res[i]['blog_image'] != "")
						{
							var img = 'uploads/blog/'+res[i]['blog_image'] ;
						}else{
							var img = 'uploads/userImages/2019_12_04_01_14_25.jpg' ;
						}

						var d = new Date(res[i]['created_at']),
							month = '' + (d.getMonth()),
							day = '' + d.getDate();
						var new_data=months[month]+'- '+day;
						html += '<li class="col-md-4 fadeLeft" data-t-show="'+res[i]['blog_id']+'"><div class="blog-grid-wrapper"><figure><a href="'+baseurl+'home/blog-detail/'+res[i]['blog_slug']+'" style="background-image: url('+baseurl+''+img+')"><i class="fa fa-link"></i></a></figure><div class="ccg-blog-modern-text"><time datetime="2008-02-14 20:00">'+new_data+'</time><h5><a href="'+baseurl+'home/blog-detail/'+res[i]['blog_slug']+'">'+res[i]['blog_title']+'</a></h5></div></div>';
					}
                    res.total = response['1'];
                    if (res.total==0)
                    {
                      html =  '<li class="col-md-12" style="text-align: center">No Blog Found</li>';
                    }
                    $('.htmlShow').html(html);
					// res.length=1;
					// do something
					refresh({
						total: res.total,// 可选
						length: length // 可选
					});
				}).fail(function (error) {
				});
			}
		});

	}
</script>

