<!--// Main Wrapper \\-->
    <div class="ccg-main-wrapper">

       

		<!--// Subheader \\-->
    <div class="ccg-subheader" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: #ebd7e1"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Central Campgrounds</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="index.html">Home Page</a></li>
                            <li>Campgrounds</li>
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
                        <div class="col-md-3">
                            <div class="ccg-sidebar scroll">
                               <ul class="nav nav-tabs">
                                  <?php foreach ($region as $key => $value) {
                                    # code...
                                    
                                      $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.parentId = parentcampground.p_id','inner']);
                                      $where = array('parentcampground.p_id' => $value->p_id );
                                      $ordeByCom= array(
                                                '0'=>['childcampground.c_id','desc'],
                                                );
                                      $child = $this->Campgrounds->find("parentcampground",$where,'','',1,$join,'',$select,$ordeByCom);
                                   
                                     
                                   ?>
                                   <input type="hidden" name="p_id" value="<?php echo $value->p_id; ?>" id="p_id">
                                  <li class="nav-item">
                                    <a class="click-drop nav-link active" href="<?php echo base_url();?>parent-campground/<?php echo $value->slug; ?>"><?php echo $value->name; ?></a>
                                    <ul class="nav nav-tabs drop">
                                      <?php   foreach ($child as $key => $ch) {
                                        $select = "*, childcampground.slug as cslug";
                                      $join= array('0'=>['childcampground','childcampground.c_id = sitedescription.childId','inner']);
                                      $where = array('sitedescription.childId' => $ch->c_id );
                                      $ordeByCom= array(
                                                '0'=>['sitedescription.siteId','desc'],
                                                );
                                      $site = $this->Campgrounds->find("sitedescription",$where,'','',1,$join,'',$select,$ordeByCom);
                                     // print_r($site);exit;
                                       # code... ?>
                                       <input type="hidden" name="c_id" id="c_id" value="<?php echo $ch->c_id;?>" >
                                        <li><a class="nav-link" href="<?php echo base_url();?>child-campground/<?php echo $ch->cslug; ?>"><?php echo $ch->c_name;?></a>
                                            <ul class="nav nav-tabs sub drop">
                                              <?php foreach ($site as $key => $sit) {
                                                # code...
                                               ?>
                                                <li><a class="nav-link search-pro" href="javascript:void(0)" ><?php echo $sit->site_no; ?></a></li>
                                              <?php } ?>
                                            </ul>
                                        </li>
                                      <?php } ?>
                                    </ul>
                                  </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                       <div class="col-md-9">
                            <div class="campground-map scroll">
                                <div class="campground-map-detail">
                                  <table class="detail">
                                      <tr>
                                        <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View</span></th>
                                        <th><span>Tent</span><span>Trailer</span> <span>RV</i></span><span>#Guests</span><span>Pets</span><span>#Cars</span></th>
                                        <th><span>Length</span><span>Tent Pad</span> <span>Level</span> <span>Base</span></th>
                                        <th><span>Access</span></th>
                                        <th><span>Elec</span><span>Amps</span></th>
                                        <th><span>Water</span> <span>Sewer</span></th>
                                        <th><span>Wifi</span><span>Cable TV</span></th>
                                        <th><span>Shade</span><span>Partial Shade</span><span>Sun</span></th>
                                        <th><span>Table</span> <span>Firing </span> <span>Grill</span></th>
                                        <th><span>Yrds to</span><span>Toilet</span><span>Water</span><span>Trash</span></th>
                                      </tr>
                                      <tbody id="htmlShow">
                    
                    
                                              </tbody>
                                      
                                  </table>
                                  <ul id="campsites-paginate-1" class="pagination"></ul>
                              </div>
                            </div>
                          <!--   <div class="comments-area">
                              
                              <div class="ccg-section-heading"><h2>Comments</h2></div>
                              <ul class="comment-list">
                                 <li>
                                    <div class="thumb-list">
                                       <figure><img alt="" src="images/comment-img1.jpg">
                                          <a class="comment-reply-link" href="#">Reply</a>
                                       </figure>
                                       <div class="text-holder">
                                          <h6>George Smith</h6>
                                          <a class="comment-reply-link" href="#">Delete</a>
                                          <time class="post-date" datetime="">Jun 11, 2019</time>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>
                                       </div>
                                    </div>
                                    <ul class="children">
                                       <li>
                                          <div class="thumb-list">
                                             <figure><img alt="" src="images/comment-img2.jpg"></figure>
                                             <div class="text-holder">
                                                <h6>Harold K. Horton </h6>
                                                <a class="comment-reply-link" href="#">Delete</a>
                                                <time class="post-date" datetime="">Jun 11, 2019</time>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci variu natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristiq di sodales aliquam.</p>
                                             </div>
                                          </div>
                                       </li>
                                       
                                    </ul>
                                    <div class="thumb-list">
                                       <figure><img alt="" src="images/comment-img3.jpg">
                                          <a class="comment-reply-link" href="#">Reply</a>
                                       </figure>
                                       <div class="text-holder">
                                          <h6>Emma Stone</h6>
                                          <a class="comment-reply-link" href="#">Delete</a>
                                          <time class="post-date" datetime="">Jun 11, 2019</time>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et finibus ex. Orci varius natoque pe natibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tristique diam ut elit sodales aliquam.</p>
                                       </div>
                                    </div>
                                  
                                 </li>
                              </ul>
                            
                              <div class="comment-respond">
                                 <div class="ccg-section-heading"><h2>Post A Comment</h2></div>
                                 <form>
                                    <p>
                                       <input type="text" placeholder="Your Name">
                                       <i class="fa fa-user"></i>
                                    </p>
                                    <p>
                                       <input type="email" placeholder="Enter Your Email">
                                       <i class="fa fa-envelope"></i>
                                    </p>
                                    <p class="ccg-full-form">
                                       <textarea name="comment" placeholder="Type Your Comment Here" class="commenttextarea"></textarea>
                                       <i class="fa fa-comment"></i>
                                    </p>
                                    <p class="form-submit"><input value="Post Now" type="submit"> <input name="comment_post_ID" value="99" id="comment_post_ID" type="hidden">
                                    </p>
                                 </form>
                              </div>
                             
                           </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

		</div>
		<!--// Main Content \\-->

     
        <!--// Footer \\-->

	<div class="clearfix"></div>
    </div>

    <script type="text/javascript">
        var baseurl="<?php echo base_url(); ?>";
//             $('#search-pro').submit(function () {

//     function_name();
    

// });
     $(".search-pro").click(function () {
      
function_name();
});
   window.onload = function_name()
        function function_name () {
          // alert('ota');
           var childID=$('#c_id').val();
         var parent_id=$('#p_id').val();
        // alert($('#c_id').val());
        var sorting='12';
             var length=10;
$('#campsites-paginate').pagination({

    total: 1, // 总数据条数
    current: 1, // 当前页码
    length: length, // 每页数据量
    size: 1, // 显示按钮个数
   
    ajax: function(options, refresh, $target){
        


        $.ajax({
            url: baseurl+'site-descriptions',
            type: 'POST',
            data:{
                current: options.current,
                length: options.length,
                sorting: sorting,
                childID: childID,
                parent_id:parent_id,
              

            },
            dataType: 'json'
        }).done(function(res){
          var html='';
          html +='<table class="detail"><tr><th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View</span></th><th><span>Tent</span><span>Trailer</span> <span>RV</i></span><span>#Guests</span><span>Pets</span><span>#Cars</span></th><th><span>Length</span><span>Tent Pad</span> <span>Level</span> <span>Base</span></th><th><span>Access</span></th><th><span>Elec</span><span>Amps</span></th><th><span>Water</span> <span>Sewer</span></th><th><span>Wifi</span><span>Cable TV</span></th><th><span>Shade</span><span>Partial Shade</span><span>Sun</span></th><th><span>Table</span> <span>Firing </span> <span>Grill</span></th><th><span>Yrds to</span><span>Toilet</span><span>Water</span><span>Trash</span></th></tr><tbody id="htmlShow"></tbody></table><ul id="campsites-paginate-1" class="pagination"></ul>';
            console.log(res);
          //alert('amir ishaque');
        if(res['sitedescription'].length!=0)
        {
            var sitedescription=res['sitedescription'];
            var sitedescription_pics=res['sitedescription_pics'];
            var campings=res['campings'];
            var views=res['views'];
            var waters=res['waters'];
            var sewers=res['sewers'];
            var amps=res['amps'];
            var tables=res['tables'];
            var favoriteCampsit=res['favorite'];
            // console.log(sitedescription);
            // console.log(sitedescription_pics);
            //    console.log(campings);
            //        console.log(views);
            //            console.log(waters);
            //                console.log(sewers);
            //                    console.log(amps);
            //                        console.log(tables);
       
            for (var i = 0 ; i <sitedescription.length; i++) {
                //for site no
                   // alert(sitedescription[i]['site_no']);
                var site_no='';
                   if(sitedescription[i]['site_no'] != null &&  sitedescription[i]['site_no'] != ''){
                 site_no= ' '+sitedescription[i]['site_no'];
              }
              else{
                  site_no= '';
              }
                //site_pics are not done yet
                // var ii=0;
                var site_pics='';
             
               if(sitedescription_pics != null && sitedescription_pics!=''){
                var ii=0;
                   var img='';
                       for (var s = 0 ; s <sitedescription_pics[sitedescription[i]['siteId']].length; s++) {
                        // alert(sitedescription_pics[s]['sitePic']);
                              if(ii == 0){
                                img='<img style="width:156px;" src="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" alt="">';
                              }else{
                                img='';
                              }
                           site_pics+='<a class="elem" rel="section-'+sitedescription[i]['siteId']+'" href="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" data-lcl-thumb="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'">'+img+'</a>';
                           ii++;
               }}
               else{
                site_pics='N/A';
               }

              // for spacing sitedescription_pics
             var site_img= '';
              var img_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['sp_image'] != null &&  sitedescription[i]['sp_image'] != '')
              {
              site_img= '<span data-toggle="tooltip" data-placement="left"  title="Spacing"><img src="'+img_url+''+sitedescription[i]['sp_image']+'" alt="..." ></span>'
           }
             else if(sitedescription[i]['sp_name'] != null &&  sitedescription[i]['sp_name'] != ''){
                     site_img= '<span data-toggle="tooltip" data-placement="left" title="Spacing">'+sitedescription[i]['sp_name']+'</span>';
           }
               else{
                     site_img= '<span data-toggle="tooltip" data-placement="left" title="Spacing"> N/A </span>';
               }

          //for view type
          // alert(sitedescription[i]['viewType']);
          // var des_view = sitedescription[i]['viewType'].split('@@');
// testing


          //
          // alert(sitedescription[i]['viewType']);
          var des_view = sitedescription[i]['viewType'].split('@@');
          // var dat=array(des_view);
          // alert(des_view);
          var view_image='';
          var viewimg_url=baseurl+'uploads/SideParameter/';
           var view_type='';
            var found_view='';
            // alert(views.length);
                     for (var v=0; v<views.length; v++) {
                        // alert(v);
                        // alert(des_view);
                      if(jQuery.inArray(views[v]['view_id'], des_view) != -1) {
                                 if(views[v]['view_image'] != null && views[v]['view_image'] != ''){
                                     view_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+views[v]['view_name']+'" src="'+viewimg_url+''+views[v]['view_image']+'"  alt="..."></span>';
                                 }
                         else if(views[v]['view_name'] !=null && views[v]['view_name']!='' ){
                                   view_type+='<span>'+views[v]['view_name']+'</span>';
                         }
                         else{
                            view_type='<span>N/A</span>';
                         }
                        }
                     }

                     //for camps tent 2nd td start

          var des_camp = sitedescription[i]['campType'].split('@@');
          var camp_image='';
          var campimg_url=baseurl+'uploads/SideParameter/';
           var camp_type='';
            var found_camp='';

                     for (var c = 0 ; c <campings.length; c++) {
                        // alert(campings[c]['camping_name']);
                        // alert(des_camp);
                         //  found_camp = campings[c]['camping_id'].includes(des_camp);
                         // alert(campings[c]['camping_id']);
                         if(jQuery.inArray(campings[c]['camping_id'], des_camp) != -1){
                         if(campings[c]['camping_image'] != null && campings[c]['camping_image'] != '' ){

                                     camp_type+='<span><img  data-toggle="tooltip" data-placement="left"  title="'+campings[c]['camping_name']+'" src="'+campimg_url+''+campings[c]['camping_image']+'" alt="..."></span>';
                         }
                         else if(campings[c]['camping_name'] !=null && campings[c]['camping_name']!='' ){
                                   camp_type+='<span>'+campings[c]['camping_name']+'</span>';
                         }
                         else{
                            camp_type='<span>N/A</span>';
                         }
                        }
                     }
          //3rd td start 
          // for length tariler
          var lengthTrailer='';
          if(sitedescription != null && sitedescription !=''){
            // sitedescription[i]['lengthTrailer'] +' ft'
                lengthTrailer='<img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['lengthTrailer']+' ft" src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt="">';
          }
         // for grade
           var grade_img='';
              var gradleimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['grade_image'] != null &&  sitedescription[i]['grade_image'] != '')
              {
             grade_img= '<img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['grade_name']+'" src="'+gradleimg_url+''+sitedescription[i]['grade_image']+'" alt="...">';
           } else if(sitedescription[i]['grade_name'] !=null && sitedescription[i]['grade_name'] !='' ){
                                  grade_img=sitedescription[i]['grade_name'] +' <br>';
                         }else{
                            grade_img='N/A';
                         }
            
                 
             //for base 
              var base_img='';
              var baseimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['base_image'] != null &&  sitedescription[i]['base_image'] != '')
              {
             base_img= '<img data-toggle="tooltip"" data-placement="left"  title="'+sitedescription[i]['base_name']+'" src="'+baseimg_url+''+sitedescription[i]['base_image']+'" alt="..."> ';
           }
                 else if(sitedescription[i]['base_name'] !=null && sitedescription[i]['base_name'] !='' ){
                                  base_img=sitedescription[i]['base_name'];
                         }
                         else{
                            base_img='N/A';
                         }
                         //fourth td start acess
                        var aces_img='';
              var acesimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['acess_image'] != null &&  sitedescription[i]['acess_image'] != '')
              {
             aces_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['acess_name']+'" src="'+acesimg_url+''+sitedescription[i]['acess_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['acess_name'] !=null && sitedescription[i]['acess_name'] !='' ){
                                  aces_img=sitedescription[i]['acess_name'];
                         }
                         else{
                            aces_img='N/A';
                         }

                         //5th td start
                         // for amps

          var des_amps = sitedescription[i]['amps'].split('@@');
          var amp_image='';
          var ampimg_url=baseurl+'uploads/SideParameter/';
           var amp_type='';
            var found_amp='';
            if(sitedescription[i]['electric']=='Yes'){
                     for (var a = 0 ; a <amps.length; a++) {
                          // found_amp = amps[a]['amp_id'].includes(des_amps);
                         // alert(found_view);
                        if(jQuery.inArray(amps[a]['amp_id'], des_amps) != -1){
                         if(amps[a]['amp_image'] != null && amps[a]['amp_image'] != '' ){

                                     amp_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+amps[a]['amp_name']+'" src="'+ampimg_url+''+amps[a]['amp_image']+'" alt="..."></span>';
                         }
                         else if(amps[a]['amp_name'] !=null && amps[a]['amp_name']!='' ){
                                   amp_type+='<span>'+amps[a]['amp_name'] +' AMPS </span>' ;
                         }
                         else{
                            amp_type='<span>N/A</span>';
                         }
                        
                     }
                 }
             }

                     // 6th td start
                     // for water
                      var des_water = sitedescription[i]['water'].split('@@');
          var water_image='';
          var waterimg_url=baseurl+'uploads/SideParameter/';
           var water_type='';
            var found_water='';
                     for (var w = 0 ; w <waters.length; w++) {
                          // found_water = waters[w]['water_id'].includes(des_water);
                         // alert(found_view);
                        if(jQuery.inArray(waters[w]['water_id'], des_water) != -1){
                         if( waters[w]['water_image'] != null && waters[w]['water_image'] != '' ){

                                     water_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+waters[w]['water_name']+'" src="'+waterimg_url+''+waters[w]['water_image']+'" alt="..."></span>';
                         }
                         else if(waters[w]['water_name'] !=null && waters[w]['water_name']!='' ){
                                   water_type+='<span data-toggle="tooltip" data-placement="left"  title="Water" >'+waters[w]['water_name'] +'</span>';
                         }
                         else{
                            water_type='<span>N/A</span>';
                         }
                        
                     }
                 }
                     //for sewer
                       
                      var des_sewer = sitedescription[i]['sewer'].split('@@');
          var sewer_image='';
          var sewerimg_url=baseurl+'uploads/SideParameter/';
           var sewer_type='';
            var found_sewer='';
            // <i class="icon-Elec" data-toggle="tooltip" title="'+sitedescription[i]['electric']+'"></i>
            if(sitedescription[i]['electric']=='Yes' || sitedescription[i]['electric']=='yes'){
            var electric=' <span><img  data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['electric']+'" src="<?php echo base_url(); ?>assets/images/icons/Elec.png" alt=""></span>'
        }else{
            var electric=''
        }
                     for (var s = 0 ; s <sewers.length; s++) {
                          found_sewer = sewers[s]['sewer_id'].includes(des_sewer);
                         // alert(found_view);
                          if(jQuery.inArray(sewers[s]['sewer_id'], des_sewer) != -1){
                         if(sewers[s]['sewer_image'] != null && sewers[s]['sewer_image'] != '' ){

                                     sewer_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+sewers[s]['sewer_name']+'" src="'+sewerimg_url+''+sewers[s]['sewer_image']+'" alt="..."></span>';
                         }
                         else if(sewers[s]['sewer_name'] !=null && sewers[s]['sewer_name']!='' ){
                                   sewer_type+='<span data-toggle="tooltip" data-placement="left"  title="Sewer" >'+sewers[s]['sewer_name']+'</span>';
                         }
                         else{
                            sewer_type='<span>N/A</span>';
                         }
                        
                     }}
                     // 7th td start
                     // for wifi
                        var wifi_img='';
              var wifiimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['wifi_image'] != null &&  sitedescription[i]['wifi_image'] != '')
              {
             wifi_img= '<img  data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['wifi_name']+'" src="'+wifiimg_url+''+sitedescription[i]['wifi_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['wifi_name'] !=null && sitedescription[i]['wifi_name'] !='' ){
                                  wifi_img=sitedescription[i]['wifi_name'];
                         }
                         else{
                            wifi_img='N/A';
                         }
                      //for cable
                        var cable_img='';
              var cableimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['cable_image'] != null &&  sitedescription[i]['cable_image'] != '')
              {
             cable_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['cable_name']+'" src="'+cableimg_url+''+sitedescription[i]['cable_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['cable_name'] !=null && sitedescription[i]['cable_name'] !='' ){
                                  cable_img=sitedescription[i]['cable_name'];
                         }
                         else{
                            cable_img='N/A';
                         }
                         //for verizon
                          var verizon_img='';
              var verizonimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['verizon_image'] != null &&  sitedescription[i]['verizon_image'] != '')
              {
             verizon_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+''+sitedescription[i]['verizon_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['verizon_name'] !=null && sitedescription[i]['verizon_name'] !='' ){
                                  verizon_img=sitedescription[i]['verizon_name'];
                         }
                         else{
                            verizon_img='N/A';
                         }
                         var barICon='';
            if(sitedescription[i]['coverage']!=null && sitedescription[i]['coverage']!='')
            {
                if(sitedescription[i]['coverage']=='1bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'1-Bar.png" alt="..."> ';    
            }else if(sitedescription[i]['coverage']=='2bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'2-Bars.png" alt="..."> ';    

            }else if(sitedescription[i]['coverage']=='3bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'3-Bars.png" alt="..."> ';    

            }
            else if(sitedescription[i]['coverage']=='4bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'4-Bars.png" alt="..."> ';    

            }else{
                 barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+'No-Bars.png" alt="..."> ';                    
            }
            }


            //for 8th td
               var shade_img='';
              var shadeimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['shade_image'] != null &&  sitedescription[i]['shade_image'] != '')
              {
             shade_img= '<img  data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['shade_name']+'" src="'+shadeimg_url+''+sitedescription[i]['shade_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['shade_name'] !=null && sitedescription[i]['shade_name'] !='' ){
                                  shade_img=sitedescription[i]['shade_name'];
                         }
                         else{
                            shade_img='N/A';
                         }

               //for 9th td
                      var des_table = sitedescription[i]['s_table'].split('@@');
          var table_image='';
          var tableimg_url=baseurl+'uploads/SideParameter/';
           var table_type='';
            var found_table='';
                     for (var t = 0 ; t <tables.length; t++) {
                          found_table = tables[t]['table_id'].includes(des_table);
                         // alert(found_view);
                          if(jQuery.inArray(tables[t]['table_id'], des_table) != -1){
                         if(tables[t]['table_image'] != null && tables[t]['table_image'] != '' ){

                                     table_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+tables[t]['table_name']+'" src="'+tableimg_url+''+tables[t]['table_image']+'" alt="..."></span>';
                         }
                         else if(tables[t]['table_name'] !=null && tables[t]['table_name']!='' ){
                                   table_type+='<span>'+tables[t]['table_name']+'</span>';
                         }
                         else{
                            table_type='N/A';
                         }
                        }
                     }     
                     if(sitedescription[i]['favourite']=='1')
                     {
                        var likeFav='<section class="fav-like">Recomended Campsite</section><br><br><br>';
                     }else{
                         var likeFav=' ';
                     }
                     var mango=0;
                     for(var fv8=0;fv8<favoriteCampsit.length;fv8++){
                        if(favoriteCampsit[fv8]['campsite_id']==sitedescription[i]['siteId']){
                           var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="dislike"><i style="color:red" data-toggle="tooltip" title="Unlike" class="fa fa-heart"></i></a>';
                            mango++;
                           
                        }
                     }
                     if(mango==0)
                     {
                        var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="like"><i data-toggle="tooltip" title="Like" class="fa fa-heart-o"></i></a>'; 
                     }
// <i class="icon-guests" data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noGuest']+'></i>
// <i class="icon-Pets" data-toggle="tooltip" data-placement="left" title='+sitedescription[i]['pets']+'></i>
// <i class="icon-Car" data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noVehicle']+'></i>
               html+=' <tr class="fav-like-wrap"><td>'+likeFav+' <span>Site #'+site_no+'</span><span>'+site_pics+'</span>'+site_img+' <span>'+view_type+'</span>'+likef+'</td><td>'+camp_type+'<span><img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noGuest']+' src="<?php echo base_url(); ?>assets/images/icons/guests.png" alt=""></span><span><img  data-toggle="tooltip" data-placement="left" title='+sitedescription[i]['pets']+' src="<?php echo base_url(); ?>assets/images/icons/Pets.png" alt=""></span><span><img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noVehicle']+' src="<?php echo base_url(); ?>assets/images/icons/Car.png" alt=""></span></td> <td><span>'+lengthTrailer+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['grade_name']+'">'+grade_img+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['base_name']+'">'+base_img+'</span></td><td><span>'+aces_img+'</span></td><td><span>'+electric+'</span>'+amp_type+'</td> <td>'+water_type+''+sewer_type+'</td> <td><span>'+wifi_img+'</span><span>'+cable_img+'</span><span>'+verizon_img+'</span><span>'+barICon+'</span></td> <td><span>'+shade_img+'</span></td><td>'+table_type+'</td><td><span>'+sitedescription[i]['yardToilet']+' yards</span><span>'+sitedescription[i]['yardWater']+' yards</span><span>'+sitedescription[i]['yardTrash']+' yards</span></td></tr> ';
            };
            document.getElementById('htmlShow').innerHTML=html;
        }else{
            document.getElementById('htmlShow').innerHTML='<span>No Record Found</span>';
        }
        res.total=res['total'];
            refresh({
                total: res.total,
                length: length 
            });
        }).fail(function(error){

        });
    }
});

  }

    </script>