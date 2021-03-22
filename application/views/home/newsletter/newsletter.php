<!--// Main Wrapper \\-->
<div class="ccg-main-wrapper">
    <!--// Header \\-->

    <!--// Subheader \\-->
    <div class="ccg-subheader" style="background-image: url('<?php echo base_url(); ?>/assets/images/sub-header-img.jpg');">
        <span class="ccg-subheader-transparent" style="background-color: tan;"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>NewsletterS</h1>
                    <ul class="ccg-breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home Page</a></li>
                        <li>Newsletters</li>
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
                        <div class="ccg-newsletter-wrap">
                            <ul class="row htmlShow">
                                
                            </ul>
                            <ul id="example-2" class="pagination"></ul>
                        </div>
                        
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


<script type="text/javascript">


    var baseurl='<?php echo base_url()?>';
    window.onload = newsletter();
    
    function newsletter () {
        console.log('inside function')
        var length = 12;
        $('#example-2').pagination({
            total: 1, // 总数据条数
            current: 1, // 当前页码
            length: length, // 每页数据量
            size: 1, // 显示按钮个数
            ajax: function (options, refresh, $target) {

                var html = '';
                $.ajax({
                    url: baseurl+ 'newsletter-pagination',
                    type: 'POST',
                    data: {
                        current: options.current,
                        length: options.length,

                    },
                    dataType: 'json'
                }).done(function (response) {
                    var res=response[0];
                    console.log(res) ;
                   
                    var baseUrl = window.location.origin;

                        for (var i=0;  i<res.length; i++ )
                    {

                      


                        html += '<li class="col-md-4"><div class="newsletter-text-wrap"><a target="blank" href="'+baseUrl+'/uploads/newsletter/'+res[i]['pdf_file']+'"><figure style="background-image: url(\''+window.location.origin+'/uploads/newsletter/'+res[i]['image']+'\');"></figure><span class="pdf-img" style="background-image: url(\''+window.location.origin+'/assets/images/pdf.png\');"></span><h2>'+res[i]['title']+'</h2><p>'+res[i]['description']+'</p></a></div></li>'
                    }
                    res.total = response['1'];
                    if (res.total==0)
                    {
                      html =  '<li class="col-md-12" style="text-align: center">No Newsletter Found</li>';
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