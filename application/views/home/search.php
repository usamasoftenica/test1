 

        <div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>assets/images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: tan;"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Campsite Search</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home Page</a></li>
                            <li>Campsite Search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Subheader \\-->

        <!--// Main Content \\-->
        <div class="ccg-main-content">
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iconModalLabel">Description for Icons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="icons-modal">
            <table>
                <tr>
                    <th>
                        <span style="text-align: center;">Column 1</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 2</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 3</span>
                    </th>
                      <th>
                        <span style="text-align: center;">Column 4</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 5</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 6</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 7</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 8</span>
                    </th>
                    <th>
                        <span style="text-align: center;">Column 9</span>
                    </th>
                </tr>
                <tr>
                    <th>
                        <?php foreach ($views as $view ) {?>

                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $view->view_image ?>" alt=""> <?php echo $view->view_name ?></span>

                        <?php } ?>
                        <span><img src="<?php echo base_url(); ?>assets/images/icon-01.png" alt=""> Map Pindrop</span>
                    </th>
                    <th>
                        <?php foreach ($campings as $camping ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $camping->camping_image ?>" alt=""> <?php echo $camping->camping_name ?></span>

                        <?php } ?>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/guests.png" alt=""> Guests</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Pets.png" alt=""> Pets</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Car.png" alt=""> Vehicle</span>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt=""> Length</span>
                        <?php foreach ($grades as $grade ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $grade->grade_image ?>" alt=""> <?php echo $grade->grade_name ?></span>

                        <?php } ?>
                        <?php foreach ($bases as $base ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $base->base_image ?>" alt=""> <?php echo $base->base_name ?></span>

                        <?php } ?>

                    </th>
                    <th>
                        <?php foreach ($access as $acess ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $acess->acess_image ?>" alt=""> <?php echo $acess->acess_name ?></span>

                        <?php } ?>
                    </th>
                    <!-- here -->
                    <th>
                        <span><img style="width: 30px;" src="<?php echo base_url(); ?>assets/images/icons/plug.png" alt=""> Electricity</span>
                    </th>
                    <th>
                        <?php foreach ($waters as $water ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $water->water_image ?>" alt=""> <?php echo $water->water_name ?></span>

                        <?php } ?>

                        <?php foreach ($sewers as $sewer ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $sewer->sewer_image ?>" alt=""> <?php echo $sewer->sewer_name ?></span>

                        <?php } ?>
                    </th>
                    <th>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Wifi.png" alt=""> Wifi</span>
                        <span><img src="<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_07_03_34.png" alt=""> Cable TV</span>
                        <span><img src="<?php echo base_url(); ?>assets/images/icons/Phone.png" alt=""> Phone</span>
                    </th>
                    <th>
                        <?php foreach ($parameter_shades as $shade ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $shade->shade_image ?>" alt=""> <?php echo $shade->shade_name ?></span>

                        <?php } ?>
                    </th>
                    <th>

                        <?php foreach ($parameter_tables as $table ) {?>

                            <span><img src="<?php echo base_url(); ?>uploads/SideParameter/<?php echo $table->table_image ?>" alt=""> <?php echo $table->table_name ?></span>

                        <?php } ?>
                        <!-- <span><img src="images/icons/Tent-Pad.png" alt=""> Tent Pad</span> -->
                    </th>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

            <div style="display: none;" class="fixed-btn icons-custom">
                <a href="#iconModal" data-toggle="modal" class="fixed-button">Click for Icon description</a>
                <a href="javascript:void(0)" class="fa fa-long-arrow-right close-btn"></a>
                <!-- <a href="javascript:void(0)" class="fa fa-long-arrow-right open-btn"></a> -->
            </div>
            <!--// Main Section \\-->
            <div class="ccg-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="site-search">
                                <form action="" >
                                   
                                    <ul class="show-search-form">
                                        <li>
                                            <label for="">Which region do you want to explore?</label>
                                            <select class="form-control" name="regionSearch" id="regionSearch"  >
                                                <option value="" style="display: none;">Select</option>
                                               <?php foreach ($regions as $region) { ?>
                                                       <option value="<?php echo $region->id; ?>"><?php echo $region->name; ?></option>
                                                  <?php } ?>
                                            </select>
                                        </li>
                                      
                                        <li>
                                            <label for="">What type of camping are you doing?</label>
                                            <select class="form-control" class="motorhome" name="campingSearch" id="campingSearch">
                                                <option value="">Select</option>
                                                 <?php foreach ($campings as $camping) { ?>
                                                       <option value="<?php echo $camping->camping_id; ?>"><?php echo $camping->camping_name; ?></option>
                                                  <?php } ?>
                                            </select>
                                        </li>
                                         <li>
                                            <label for="">Do you need an accessible campsite?</label>
                                            <select class="form-control" name="shade" id="accessible">
                                                <option value="">Select</option>
                                    
                                                    
                                                       <option value="yes">Yes</option>
                                                       <option value="no">No</option>
                                                
                                            </select>
                                        </li>
                                        <li class="cmsit-len" style="display: none;">
                                            <label for="">What length of campsite (in feet) do you require?</label>

                                            <input placeholder="Enter number of feet" type="number" name="campsiteLength" id="campsiteLength" class="form-control">
                                        </li>
                                        <li>
                                            <label for="">Do you need electricity at the campsite?</label>
                                            <select class="form-control" class="electricity" name="searchElectricity" id="searchElectricity">
                                                <option value="" >Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                
                                            </select>
                                        </li>
                                        <li class="full ampere">
                                            <ul>
                                                <li>
                                                    <label for="">What Amperage?</label>
                                                    <select class="form-control" name="ampereageSearch" id="ampereageSearch">
                                                        <option>Select</option>
                                                         <?php foreach ($parameter_amps as $parameter_amp) { ?>
                                               <option value="<?php echo $parameter_amp->amp_id; ?>"><?php echo $parameter_amp->amp_name; ?></option>
                                          <?php } ?>
                                                    </select>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <label for="">Do you need water at the campsite?</label>
                                            <select class="form-control" name="WaterSupply" id="WaterSupply">
                                                <option value="">Select</option>
                                                <?php foreach ($parameter_waters as $parameter_water) { ?>
                                               <option value="<?php echo $parameter_water->water_id; ?>"><?php echo $parameter_water->water_name; ?></option>
                                          <?php } ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">Do you need sewer at the campsite?</label>
                                            <select class="form-control" name="sewerSupply" id="sewerSupply">
                                                <option value="">Select</option>
                                                   <?php foreach ($parameter_sewers as $parameter_sewer) { ?>
                                               <option value="<?php echo $parameter_sewer->sewer_id; ?>"><?php echo $parameter_sewer->sewer_name; ?></option>
                                          <?php } ?>
                                            </select>
                                        </li>
                                      
                                        <li>
                                            <label style="line-height: 24px" for="">Type in the maximum number of yards to a toilet.</label>
                                            <input type="number" name="restroom" id="restroom" class="form-control">
                                        </li>
                                    </ul>
                                    <span>
                                        <a href="javascript:void(0)" style="float:left" id="srch" class="search-pagination" >Submit</a>
                                    </span>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="search-result">
                                <div class="campground-map-detail" id="search-pro">
                                     <input type="hidden" name="id" id="e_id" value="<?php echo $this->session->userdata['userdata']['id']; ?>">
                                    <table class="detail" style="display: none;" id="detail_table">
                                        <tr class="sticky-top">
                                            
                                            <th><span>Site #</span><span>Picture</span> <span>Spacing</span> <span>Type of View<br><br>
                                            Click <i class="fa fa-heart" style="color: red; font-size: 15px;"></i> to make favorite</span></th>
                                            <th><span>What’s allowed</span><span>#Guests</span><span>Pets?</span><span>#Cars</span></th>
                                            <th><span>Length</span> <span>Grade</span> <span>Base</span></th>
                                            <th><span>Access</span></th>
                                            <th><span>Elec</span><span>Amps</span></th>
                                            <th><span>Water</span> <span>Sewer</span></th>
                                            <th><span>Wifi</span><span>Cable TV</span><span>Service Providers</span></th>
                                            <th><span>Shade</span><span>Partial Shade</span><span>Sunny</span></th>
                                            <th><span>Campsite Amenities</span></th>
                                            <th><span>Yards to</span><span>Toilet</span><span>Water</span><span>Trash</span></th>
                                            
                                        </tr>
                                        <!-- pickup id and do pagination using jquer on this page -->
                                         <tbody id="htmlShow">
                    
                    
                                              </tbody>
                                             
                                     
                                    </table>
                                     <ul id="campsites-paginate" class="pagination"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Section \\-->

        </div>
        <!--// Main Content  \\-->
<div style="display: none;" class="colorado-popup-box dis-custom">
    <a href="javascript:void(0)" class="popup-off fa fa-times"></a>
    <ul>
         <li><i class="fa fa-eercast"></i> <h4>If you like a campsite, click the Heart icon <i class="fa fa-heart" aria-hidden="true"></i> to make your favorite</h4></li>
        <li><i class="fa fa-eercast"></i> <h4>Hover cursor over icons for key information.</h4></li>
    </ul>
</div>
               <script type="text/javascript">
    $('.popup-off').click(function () {
        $('.colorado-popup-box').hide('slow');
    });




        var baseurl="<?php echo base_url() ?>";
    
       

     // window.onload = function_name_search();
        function function_name_search(region_fav="",parentCampground_fav="",childCampground_fav="") {
                
            var camping_stive = "" ;

            camping_stive = $('#favourite_peggy').val() ;
        

             var length=10;
            $('#campsites-paginate').pagination({
                total: 1, // 总数据条数
                current: 1, // 当前页码
                length: length, // 每页数据量
                size: 1, // 显示按钮个数
   
        ajax: function(options, refresh, $target){
   $.blockUI({ message: '<img src="/assets/images/block.gif" />', css: {border:     'none', backgroundColor:'transparent'} });
         var e_id=$('#e_id').val();
         var restroom=$('#restroom').val();
         var sewerSupply=$('#sewerSupply').val();
         var sewerSupplyHtml= $("#sewerSupply option:selected").text();
         var WaterSupply=$('#WaterSupply').val();
         var WaterSupplyHtml= $("#WaterSupply option:selected").text();
         var ampereageSearch=$('#ampereageSearch').val();
         var searchElectricity=$('#searchElectricity').val();
         var campsiteLength=$('#campsiteLength').val();
         var campingSearch=$('#campingSearch').val();
         var regionSearch=$('#regionSearch').val();
         var ampereageSearch=$('#ampereageSearch').val();
         var accessible=$('#accessible').val();
         // console.log(accessible,'accessible');
     
        var sorting='12';
        // alert(region_fav);
var html='';
        $.ajax({
            url: baseurl+'campsiteList',
            type: 'POST',
            data:{
                current: options.current,
                length: options.length,
                sorting: sorting,
                e_id: e_id,
                restroom: restroom,
                sewerSupply: sewerSupply,
                sewerSupplyHtml:sewerSupplyHtml,
                WaterSupply: WaterSupply,
                WaterSupplyHtml:WaterSupplyHtml,
                ampereageSearch: ampereageSearch, //need to check
                searchElectricity: searchElectricity,
                campsiteLength: campsiteLength,
                campingSearch: campingSearch,
                regionSearch: regionSearch,
                ampereageSearch: ampereageSearch,  //need to chec
                region_fav:region_fav,
                parentCampground_fav:parentCampground_fav,
                childCampground_fav:childCampground_fav,
                accessible:accessible,

            },
            dataType: 'json'
        }).done(function(res){
            $('#detail_table').show()
         	setTimeout(function(){
			  $('#recommended-custom').modal('hide') ;
			}, 500);

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

            for (var i = 0 ; i <sitedescription.length; i++) {
                var site_no='';
                var ccName = '' ;
                   if(sitedescription[i]['site_no'] != null &&  sitedescription[i]['site_no'] != ''){
                 site_no= ' '+sitedescription[i]['site_no'];
              }
              else{
                  site_no= '';
              }

              var child_campgorund = $.trim(sitedescription[i]['CcName']);

              if( child_campgorund  == "Click To Explore Site Description") {

                  ccName = " " ;
              }else{

                  ccName = sitedescription[i]['CcName'] ;
              }

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
                site_pics='';
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
                     site_img= '<span data-toggle="tooltip" data-placement="left" title="Spacing"></span>';
               }


          var des_view = sitedescription[i]['viewType'].split('@@');
          var view_image='';
          var viewimg_url=baseurl+'uploads/SideParameter/';
           var view_type='';
            var found_view='';
            // alert(views.length);
                     for (var v=0; v<views.length; v++) {
                      if(jQuery.inArray(views[v]['view_id'], des_view) != -1) {
                                 if(views[v]['view_image'] != null && views[v]['view_image'] != ''){
                                     view_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+views[v]['view_name']+'" src="'+viewimg_url+''+views[v]['view_image']+'"  alt="..."></span>';
                                 }
                         else{
                            view_type='<span></span>';
                         }
                        }
                     }

          var des_camp = sitedescription[i]['campType'].split('@@');
          var camp_image='';
          var campimg_url=baseurl+'uploads/SideParameter/';
           var camp_type='';
            var found_camp='';

                     for (var c = 0 ; c <campings.length; c++) {
                         if(jQuery.inArray(campings[c]['camping_id'], des_camp) != -1){
                         if(campings[c]['camping_image'] != null && campings[c]['camping_image'] != '' ){

                                     camp_type+='<span><img  data-toggle="tooltip" data-placement="left"  title="'+campings[c]['camping_name']+'" src="'+campimg_url+''+campings[c]['camping_image']+'" alt="..."></span>';
                         }
                         else{
                            camp_type='<span></span>';
                         }
                        }
                     }
          //3rd td start 
          // for length tariler
          var lengthTrailer='';
          if(sitedescription != null && sitedescription !=''){
            // sitedescription[i]['lengthTrailer'] +' ft'
                lengthTrailer='<img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['lengthTrailer']+' ft" src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt=""><small>'+sitedescription[i]['lengthTrailer']+' ft</small>';
          }
         // for grade
           var grade_img='';
              var gradleimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['grade_image'] != null &&  sitedescription[i]['grade_image'] != '')
              {
             grade_img= '<img data-toggle="tooltip" data-placement="left"  src="'+gradleimg_url+''+sitedescription[i]['grade_image']+'" alt="..."><small>'+sitedescription[i]['grade_name']+'</small>';
           } 
                         else{
                            grade_img='';
                         }
            
                 
             //for base 
              var base_img='';
              var baseimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['base_image'] != null &&  sitedescription[i]['base_image'] != '')
              {
             base_img= '<img data-toggle="tooltip"" data-placement="left"  src="'+baseimg_url+''+sitedescription[i]['base_image']+'" alt="..."><small>'+sitedescription[i]['base_name']+'</small> ';
           }
                         else{
                            base_img='';
                         }
                         //fourth td start acess
                        var aces_img='';
              var acesimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['acess_image'] != null &&  sitedescription[i]['acess_image'] != '')
              {
             aces_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['acess_name']+'" src="'+acesimg_url+''+sitedescription[i]['acess_image']+'" alt="...">';
           }
                         else{
                            aces_img='';
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
                        if(jQuery.inArray(amps[a]['amp_id'], des_amps) != -1){
                         if(amps[a]['amp_image'] != null && amps[a]['amp_image'] != '' ){

                                     amp_type+='<span><img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+amps[a]['amp_name']+'" src="'+ampimg_url+''+amps[a]['amp_image']+'" alt="..."><small></small></span>';
                         }
                         else{
                            amp_type='<span></span>';
                         }
                        
                     }
                 }
             }
                      var des_water = sitedescription[i]['water'].split('@@');
                      
                      var water_image='';
                      var waterimg_url=baseurl+'uploads/SideParameter/';
                       var water_type='<span></span>';
                        var found_water='';

                     for (var w = 0 ; w <waters.length; w++) {
                   
                         if( waters[w]['water_image'] != null && waters[w]['water_image'] != '' ){


                            if(jQuery.inArray(waters[w]['water_id'], des_water) != -1){

                                      water_type+='<span><img  data-toggle="tooltip" data-placement="left" title="'+waters[w]['water_name']+'" src="'+waterimg_url+''+waters[w]['water_image']+'" alt="..."><small>'+waters[w]['water_name']+'</small></span>';
                                }
                         }
                        
                      
                 }
                     //for sewer
                       
                      var des_sewer = sitedescription[i]['sewer'].split('@@');
          var sewer_image='';
          var sewerimg_url=baseurl+'uploads/SideParameter/';
           var sewer_type='';
            var found_sewer='';
            if(sitedescription[i]['electric']=='Yes' || sitedescription[i]['electric']=='yes'){
            var electric=' <span><img  data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['electric']+'" src="<?php echo base_url(); ?>assets/images/icons/plug.png" alt=""></span>'
        }

        else if(sitedescription[i]['electric']=='No' || sitedescription[i]['electric']=='No')
        {
             var electric=''
        }

        else{
            var electric=''
        }
                     for (var s = 0 ; s <sewers.length; s++) {
                          found_sewer = sewers[s]['sewer_id'].includes(des_sewer);
                         // alert(found_view);
                          if(jQuery.inArray(sewers[s]['sewer_id'], des_sewer) != -1){
                         if(sewers[s]['sewer_image'] != null && sewers[s]['sewer_image'] != '' ){

                                 sewer_type+='<span><img data-toggle="tooltip" data-placement="left"  title="'+sewers[s]['sewer_name']+'" src="'+sewerimg_url+''+sewers[s]['sewer_image']+'" alt="..."><small>'+sewers[s]['sewer_name']+'</small></span>';
                         }
                         else{
                            sewer_type='<span></span>';
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
                         else{
                            wifi_img='';
                         }
                      //for cable
                        var cable_img='';
              var cableimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['cable_image'] != null &&  sitedescription[i]['cable_image'] != '')
              {
             cable_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['cable_name']+'" src="'+cableimg_url+''+sitedescription[i]['cable_image']+'" alt="..."><small>'+sitedescription[i]['cable_name']+'</small> ';
           }
                         else{
                            cable_img='';
                         }
                         //for verizon
                          var verizon_img='';
              var verizonimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['verizon_image'] != null &&  sitedescription[i]['verizon_image'] != '')
              {
             verizon_img= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+''+sitedescription[i]['verizon_image']+'" alt="..."> <small>'+sitedescription[i]['verizon_name']+'</small>';
           }
                       
               else{
                            verizon_img='';
                         }
         
                         var barICon='';
                if(sitedescription[i]['coverage']=='1bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'1-Bar.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';
            }else if(sitedescription[i]['coverage']=='2bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'2-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';

            }else if(sitedescription[i]['coverage']=='3bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'3-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';

            }
            else if(sitedescription[i]['coverage']=='4bar'){
                barICon= '<img data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'4-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small> ';

            }else{
                 barICon = "";                   
            }
            //}


            //for 8th td
               var shade_img='';
              var shadeimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['shade_image'] != null &&  sitedescription[i]['shade_image'] != '')
              {
             shade_img= '<img  data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['shade_name']+'" src="'+shadeimg_url+''+sitedescription[i]['shade_image']+'" alt="..."> ';
           }
                         else{
                            shade_img='';
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
                         else{
                            table_type='';
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
                           var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="dislike"><i style="color:red" data-toggle="tooltip" data-placement="left" title="Unlike" class="fa fa-heart"></i></a>';
                            mango++;
                           
                        }
                     }
                     if(mango==0)
                     {
                        var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="like"><i data-toggle="tooltip" data-placement="left" title="Like" class="fa fa-heart-o"></i></a>'; 
                     }

                     var toilet = "<img data-placement='left' data-toggle='tooltip' title='"+sitedescription[i]['yardToilet']+" yards' src='<?php echo base_url(); ?>assets/images/icons/60.png' /><small>"+sitedescription[i]['yardToilet']+" yards</small>" ;
                     var water = "<img data-placement='left' data-toggle='tooltip' title='"+sitedescription[i]['yardWater']+" yards' src='<?php echo base_url(); ?>uploads/SideParameter/2020_03_24_06_56_42.png' /><small>"+sitedescription[i]['yardWater']+" yards</small>";
                     var trash = "<img data-placement='left' data-toggle='tooltip' title='"+sitedescription[i]['yardTrash']+" yards' src='<?php echo base_url(); ?>assets/images/icons/70.png' /><small>"+sitedescription[i]['yardTrash']+" yards</small>" ;


                     if(sitedescription[i]['yardToilet'] == 0)
                     {
                        var sitedescriptionT = "" ;
                     }else{
                         var sitedescriptionT = toilet ;
                     }

                     if(sitedescription[i]['yardTrash'] == 0)
                     {
                        var sitedescriptionY = "" ;
                     }else{
                        var sitedescriptionY = trash ;
                     }

                      if(sitedescription[i]['yardWater'] == 0)
                     {
                        var sitedescriptionW = "" ;
                     }else{
                        var sitedescriptionW = water ;
                     }
                     


                      
                     if(i>0)
                     {  
                           
                              if(sitedescription[i]['pcName'] != sitedescription[i-1]['pcName'] || sitedescription[i]['CcName'] != sitedescription[i-1]['CcName'])
                             {

                                var title = "<tr><td colspan='10' style='text-align:center' class=''><span style='font-size:30px'>"+sitedescription[i]['pcName']+"</span><span style='font-size:18px'>"+ccName+"</span></td><tr> " ;
                             }else{

                                var title = "" ;
                             }
                         

                     }
                     else{

                         
                             var title = "<tr><td style='text-align:center' colspan='10' class=''><span style='font-size:30px'>"+sitedescription[i]['pcName']+"</span><span style='font-size:18px'>"+ccName+"</span></td><tr> " ;
                         

                       
                    }

                    var pets = "" ;

                    if(sitedescription[i]['pets'] != "No")
                    {
                        pets = '<img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noGuest']+' src="<?php echo base_url(); ?>assets/images/icons/guests.png" alt=""><small>'+sitedescription[i]['noGuest']+'</small></span><span><img  data-toggle="tooltip" data-placement="left" title='+sitedescription[i]['pets']+' src="<?php echo base_url(); ?>assets/images/icons/Pets.png" alt=""><small>'+sitedescription[i]['pets']+'</small>' ;
                    }

                    if(sitedescription[i]['map_link'] == null || sitedescription[i]['map_link'] == "")
                    {
                        var pindrop = "" ;
                    }else{
                        var pindrop = '<a target="_blank" data-placement="left" data-toggle="tooltip" title="Map Pindrop" href="'+sitedescription[i]['map_link']+'" style="font-size:20px;" class="fa fa-map-marker"></a><br>'
                    }
                    

               html+= title+'<tr class="fav-like-wrap"><td>'+likeFav+' <span>Site #'+site_no+'</span><span>'+site_pics+'</span>'+site_img+' <span>'+view_type+'</span>'+pindrop+''+likef+'</td><td>'+camp_type+'<span>'+pets+'</span><span><img  data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noVehicle']+' src="<?php echo base_url(); ?>assets/images/icons/Car.png" alt=""><small>'+sitedescription[i]['noVehicle']+'</small></span></td> <td><span>'+lengthTrailer+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['grade_name']+'">'+grade_img+'</span><span data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['base_name']+'">'+base_img+'</span></td><td><span>'+aces_img+'</span></td><td><span>'+electric+'</span>'+amp_type+'</td> <td>'+water_type+''+sewer_type+'</td> <td><span>'+wifi_img+'</span><span>'+cable_img+'</span><span>'+verizon_img+'</span><span>'+barICon+'</span></td> <td><span>'+shade_img+'</span></td><td>'+table_type+'</td><td><span>'+sitedescriptionT+'</span><span>'+sitedescriptionW+'</span><span>'+sitedescriptionY+'</span></td></tr> ';
            };
             $.unblockUI();
            document.getElementById('htmlShow').innerHTML=html;
           
        }else{
            $.unblockUI();
            document.getElementById('htmlShow').innerHTML='<span>No Record Found</span>';
        }
      
        if(res['free_trial'] != 0){
            $('.favourite-user').hide()
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

  // favorite campsite
  $(document).on('click','.favourite-user', function () {
    var id=$(this).attr("data-id");
    var fav=$(this).attr("data-fav");
       $.ajax({
                     url:baseurl+'add-to-favorite',
                     type:"POST",
                      data: {'id' : id,'fav':fav },
                      success: function(data){
                        // alert(data);
                        if(data==1)
                        {
                        
                          $('.heart-'+id).html('<i style="color:red" data-toggle="tooltip" title="Unlike" class="fa fa-heart"></i>');  
                          $('.heart-'+id).attr("data-fav",'dislike');
                        }else if(data==2){
                              toastr.success("This campsite is already added in your favorite list");
                          
                        }else if(data==3)
                        {
                         
                             $('.heart-'+id).html('<i style="color:black"  data-toggle="tooltip" title="Like" class="fa fa-heart-o"></i>'); 
                              $('.heart-'+id).attr("data-fav",'like');
                        }else if(data==4)
                        {
                            toastr.success("This campsite is not available in your favorite list");
                        }else{
                            // location.reload();
                        }
                      }
                  });
   
  });

     
        $(function () {

           $('.close-btn').click(function () {
            $('.fixed-btn').toggleClass('active');
            $(this).toggleClass('active');
        });

});
        $(".full.ampere").hide();


        $('.electricity').on('change',function(){ 
        var value = $(this).val();
        if(value=='electricity'){
          $(".full.ampere").show();
        }else{
          $(".full.ampere").hide();
        }

    });
$('#regionSearch-fav').change(function(){ 

               var id = $('#regionSearch-fav').val();

    var base_urlLocal='<?php echo base_url();?>';
               // alert(id);
                $.ajax({
                    url: base_urlLocal+'user/UserController/parentCampGroundListSearch',
           type: 'POST',
                    async : true,
                    dataType : 'json',
                    data:{id:id},
                    success: function(data){
                        var html = '';
                        var i;
                         html += '<option value="">Select Parent Campground</option>';
                        // alert(data.length);
                        for(i=0; i<data.length; i++){
                           // alert('ok');
                            html += '<option value='+data[i].p_id+'>'+data[i].name+'</option>';
                        }
                        $('#parentCampground-fav').html(html);
 
                    }
                });
                return false;
            }); 
        $('#parentCampground-fav').change(function(){ 
               var id = $('#parentCampground-fav').val();

            var base_urlLocal='<?php echo base_url();?>';
                $.ajax({
                    url: base_urlLocal+'user/UserController/childCampGroundListSearch',
           type: 'POST',
                    async : true,
                    dataType : 'json',
                    data:{id:id},
                    success: function(data){
                        var html = '';
                        var i;
                         html += '<option value="">Select Child Campground</option>';
                        for(i=0; i<data.length; i++){
                           // alert('ok');
                            html += '<option value='+data[i].c_id+'>'+data[i].c_name+'</option>';
                        }
                        $('#childCampground-fav').html(html);
 
                    }
                });
                return false;
            }); 

        
          $('.search-pagination').click(function () {
        //alert('ok');
        function_name_search();
       // alert('test');
    

});



     $(document).on('click', '#recommended-btn', function() {

       $('#recommended-custom').modal('show');
    });

      $('#fav-form').submit(function () {

        $("#regionSearch").val($("#regionSearch option:first").val());
        $("#campingSearch").val($("#campingSearch option:first").val());
        $("#accessible").val($("#accessible option:first").val());
        $("#searchElectricity").val($("#searchElectricity option:first").val());
        $("#WaterSupply").val($("#WaterSupply option:first").val());
        $("#sewerSupply").val($("#sewerSupply option:first").val());
        $("#campsiteLength").val("");
        $("#restroom").val("");


        if($('#fav-form').valid()) {
            
        $('#favourite_peggy').val(1) ;

        var region_fav = $('#regionSearch-fav').val() ;
        var parentCampground_fav = $('#parentCampground-fav').val() ;
        var childCampground_fav = $('#childCampground-fav').val() ;

        function_name_search(region_fav,parentCampground_fav,childCampground_fav) ;

    }

      });
        $('#campingSearch').change(function () {
            var val = $('#campingSearch option:selected').text() ;

            if(val === "Select" || val === "Tent")
            {
                 $('.cmsit-len').hide() ;
                
            }else{
                $('.cmsit-len').show() ;
            }
        }) ;

     setTimeout(function(){

         $('.icons-custom').show('slow') ;
         $('.dis-custom').show('slow') ;
        }, 5000);


        </script>
