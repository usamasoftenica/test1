
		<div class="ccg-subheader" style="background-image: url('images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: tan;"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Favorite Campsites</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home Page</a></li>
                            <li>Favorite Campsites</li>
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
                      <!--   <div class="col-md-12">
                            <div class="site-search">
                                <form action="">
                                    <a href="#" data-toggle="tooltip" title="Click here to see Peggy & Steve’s top-rated campsites across all campgrounds?">Click here to see Peggy & Steve’s ...</a>
                                    <ul class="show-search-form">
                                        <li>
                                            <label for="">Which region do you want to explore?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">West North</option>
                                                <option value="">North</option>
                                                <option value="">North East</option>
                                                <option value="">West</option>
                                                <option value="">Central</option>
                                                <option value="">East</option>
                                                <option value="">South West</option>
                                                <option value="">South</option>
                                                <option value="">South East</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What level of camping do you desire?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">No hookups</option>
                                                <option value="">electric</option>
                                                <option value="">electric & water</option>
                                                <option value="">electric, water and sewer</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What type of campground do you want?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">National Park</option>
                                                <option value="">National Monument</option>
                                                <option value="">State Park</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What type of camping are you doing?</label>
                                            <select class="motorhome" name="" id="">
                                                <option value="">Select</option>
                                                <option value="motorhome">Motorhome/RV</option>
                                                <option value="">Trailer</option>
                                                <option value="">Tent</option>
                                            </select>
                                        </li>
                                        <li class="full extra-form rv">
                                            <ul>
                                                <li>
                                                    <label for="">What length campsite is required?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">20</option>
                                                        <option value="">30</option>
                                                        <option value="">35</option>
                                                        <option value="">40</option>
                                                        <option value="">45</option>
                                                        <option value="">50+</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">Do you need electricity?</label>
                                                    <select class="electricity" name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="electricity">Yes</option>
                                                        <option value="">No</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li class="full extra-form electricity">
                                                    <ul>
                                                        <li>
                                                            <label for="">What Amperage?</label>
                                                            <select name="" id="">
                                                                <option value="">Select</option>
                                                                <option value="">20</option>
                                                                <option value="">30</option>
                                                                <option value="">50</option>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <label for="">Do you need a water hook-up?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <label for="">Do you need sewer hook-up?</label>
                                                    <select name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="">Yes</option>
                                                        <option value="">No</option>
                                                        <option value="">Doesn’t matter</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <label for="">What kind of view do you want?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Lake</option>
                                                <option value="">Mountain</option>
                                                <option value="">River</option>
                                                <option value="">Creek</option>
                                                <option value="">Meadow</option>
                                                <option value="">Woods</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What level of shade is required?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Full shade</option>
                                                <option value="">Partial shade</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">Do you require a picnic table?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">Do you require a fire ring?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">Do you require a grill?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What are your maximum yards to a restroom?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">20</option>
                                                <option value="">30</option>
                                                <option value="">40</option>
                                                <option value="">50</option>
                                                <option value="">60</option>
                                                <option value="">70</option>
                                                <option value="">80</option>
                                                <option value="">90</option>
                                                <option value="">100</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="">What are your maximum yards to a water source?</label>
                                            <select name="" id="">
                                                <option value="">Select</option>
                                                <option value="">20</option>
                                                <option value="">30</option>
                                                <option value="">40</option>
                                                <option value="">50</option>
                                                <option value="">60</option>
                                                <option value="">70</option>
                                                <option value="">80</option>
                                                <option value="">90</option>
                                                <option value="">100</option>
                                                <option value="">Doesn’t matter</option>
                                            </select>
                                        </li>
                                    </ul>
                                    <span>
                                        <a href="javascript:void(0)" class="show-form">Advanced Search</a>
                                       
                                        <input type="submit" value="Submit">
                                    </span>
                                </form>
                            </div>
                        </div>
                        -->
                        <div class="col-md-12">
                            <div class="search-result">
                            <!--     <ul class="titles">
                                    <li>
                                        <a href="parent-campground.html">Arkansas Headwaters Recreation Area (AHRA) Info</a>
                                    </li>
                                    <li>
                                        <a href="child-campground.html">Five Point info</a>
                                    </li>
                                </ul> -->
                                <div class="campground-map-detail" id="search-pro">
                                     <input type="hidden" name="id" id="e_id" value="<?php echo $this->session->userdata['userdata']['id']; ?>">
                                    <table class="detail" >
                                        <tr>
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
                                            <!-- es page ko active krna k lea bs esa uncoment krna ha or dummy value ko remove krna ha -->
<!--                                        <tbody >-->
                    
                      
<!--                                        <tr>-->
<!--                                            <td><span>1</span><span><a class="elem" href="images/map2.png" data-lcl-thumb="images/map2.png"><img src="images/img.png" alt=""></a></span> <span style="margin: 5px 0px 15px; display: inline-block;">Tight</span> <span><i class="icon-River" data-toggle="tooltip" title="River"></i></span> <a data-toggle="tooltip" style="color: red;" title="Favorite" href="#" class="heart-icon fa fa-heart"></a></td>-->
<!--                                            <td><span><i class="icon-Tent" data-toggle="tooltip" title="Tent"></i></span><span><i class="icon-trailer" data-toggle="tooltip" title="Trailer"></i></span> <span><i class="icon-RV" data-toggle="tooltip" title="RV"></i></span><span><i class="icon-guests" data-toggle="tooltip" title="6 Pers"></i></span><span><i class="icon-Pets" data-toggle="tooltip" title="Domestic only"></i></span><span><i class="icon-Car" data-toggle="tooltip" title="2 Cars"></i></span></td>-->
<!--                                            <td><span>39 ft</span><span>18 / 14</span> <span>Slight</span> <span>Gravel</span></td>-->
<!--                                            <td><span>Back In</span></td>-->
<!--                                            <td><span><i class="icon-Elec" data-toggle="tooltip" title="Elec"></i></span></td>-->
<!--                                            <td><span><i class="icon-Water" data-toggle="tooltip" title="Water"></i></span></td>-->
<!--                                            <td><span><i class="icon-Wifi" data-toggle="tooltip" title="Wifi"></i></span></td>-->
<!--                                            <td><span><i class="icon-Sun" data-toggle="tooltip" title="Sun"></i></span></td>-->
<!--                                            <td><span><i class="icon-Table" data-toggle="tooltip" title="Table"></i></span> <span><i class="icon-Fire" data-toggle="tooltip" title="Firing"></i></span> <span><i class="icon-Grill" data-toggle="tooltip" title="Grill"></i></span></td>-->
<!--                                            <td><span>Xx Yrds</span><span>Xx Yrds</span><span>Xx Yrds</span></td>-->
<!--                                        </tr>-->
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
        </div>s
               <script type="text/javascript">
                   $('.popup-off').click(function () {
                       $('.colorado-popup-box').hide('slow');
                   });
        var baseurl="<?php echo base_url() ?>";
       $('#search-pro').submit(function () {

    function_name();
    

});
     window.onload = function_name();
        function function_name () {
            // alert('423');
             var length=10;
$('#campsites-paginate').pagination({
    total: 1, // 总数据条数
    current: 1, // 当前页码
    length: length, // 每页数据量
    size: 1, // 显示按钮个数
   
    ajax: function(options, refresh, $target){
         var e_id=$('#e_id').val();
        var sorting='12';

var html='';
        $.ajax({
            url: baseurl+'favCampsiteList',
            type: 'POST',
            data:{
                current: options.current,
                length: options.length,
                sorting: sorting,
                e_id: e_id,
            },
            dataType: 'json'
        }).done(function(res){
            console.log(res);
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
                var ccName = '' ;
                   if(sitedescription[i]['site_no'] != null &&  sitedescription[i]['site_no'] != ''){
                 site_no= ' '+sitedescription[i]['site_no'];
              }
              else{
                  site_no= '';
              }

                var child_campgorund = $.trim(sitedescription[i]['c_name']);

              if( child_campgorund == "Click To Explore Site Description" ) {

                  ccName = " No Child Campground " ;
              }else {

                  ccName = sitedescription[i]['c_name'] ;
              }

                //site_pics are not done yet
                // var ii=0;
                var site_pics='';
             
               if(sitedescription_pics != null && sitedescription_pics!=''){
                var ii=0;
                   var img='';

                       for (var s = 0 ; s <sitedescription_pics[sitedescription[i]['siteId']].length; s++) {
                        // alert(sitedescription_pics[s]['sitePic']);
                              // if(ii == 0){
                              //   img='<img style="width:156px;" src="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" alt="">';
                              // }else{
                              //   img+='';
                              // }
                           site_pics+='<span><a class="elem" rel="section-'+sitedescription[i]['siteId']+'" data-toggle="tooltip" data-placement="left"  title="Click to enlarge" href="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" data-lcl-thumb="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'">';
                           if(ii == 0){
                                site_pics+='<img style="width:156px;" src="'+baseurl+'uploads/SiteDescription/'+sitedescription_pics[sitedescription[i]['siteId']][s]['sitePic']+'" alt="">';
                              }
                           site_pics+='</a></span>';
                           ii++;
               }}
               else{
                site_pics='<span></span>';
               }

              // for spacing sitedescription_pics
             var site_img= '';
              var img_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['sp_image'] != null &&  sitedescription[i]['sp_image'] != '')
              {
              site_img= '<span data-toggle="tooltip" data-placement="left"  title="Spacing"><img style="width:50px;" src="'+img_url+''+sitedescription[i]['sp_image']+'" alt="..." ></span>'
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
                                     view_type+='<img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+views[v]['view_name']+'" src="'+viewimg_url+''+views[v]['view_image']+'"  alt="..."><br>';
                                 }
                         else if(views[v]['view_name'] !=null && views[v]['view_name']!='' ){
                                   view_type+=views[v]['view_name']+'<br>';
                         }
                         else{
                            view_type='';
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

                                     camp_type+='<span><img  data-toggle="tooltip" style="width:50px;" data-placement="left"  title="'+campings[c]['camping_name']+'" src="'+campimg_url+''+campings[c]['camping_image']+'" alt="..."></span>';
                         }
                         else if(campings[c]['camping_name'] !=null && campings[c]['camping_name']!='' ){
                                   camp_type+=campings[c]['camping_name']+'<br>';
                         }
                         else{
                            camp_type='';
                         }
                        }
                     }
          //3rd td start 
          // for length tariler
          var lengthTrailer='';

          // if(sitedescription != null && sitedescription !=''){
          //       lengthTrailer=sitedescription[i]['lengthTrailer'] +' ft';
          // }

          if(sitedescription != null && sitedescription !=''){
            // sitedescription[i]['lengthTrailer'] +' ft'
                lengthTrailer='<span><img data-toggle="tooltip" data-placement="left"  title="'+sitedescription[i]['lengthTrailer'] +'ft" src="<?php echo base_url(); ?>assets/images/icons/Length.png" alt=""><small>'+sitedescription[i]['lengthTrailer']+' ft</small></span>';
          }

         // for grade
           var grade_img='';
              var gradleimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['grade_image'] != null &&  sitedescription[i]['grade_image'] != '')
              {
             grade_img= '<span><img  data-toggle="tooltip" style="width:50px;" data-placement="left"  title="'+sitedescription[i]['grade_name']+'" src="'+gradleimg_url+''+sitedescription[i]['grade_image']+'" alt="..."><small>'+sitedescription[i]['grade_name']+'</small></span>';
           } else if(sitedescription[i]['grade_name'] !=null && sitedescription[i]['grade_name'] !='' ){
                                  grade_img='<span>'+sitedescription[i]['grade_name'] +'</span>';
                         }else{
                            grade_img='';
                         }
            
                 
             //for base 
              var base_img='';
              var baseimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['base_image'] != null &&  sitedescription[i]['base_image'] != '')
              {
             base_img= '<span><img data-toggle="tooltip" style="width:50px;"" data-placement="left"  title="'+sitedescription[i]['base_name']+'" src="'+baseimg_url+''+sitedescription[i]['base_image']+'" alt="..."><small>'+sitedescription[i]['base_name']+'</small></span> ';
           }
                 else if(sitedescription[i]['base_name'] !=null && sitedescription[i]['base_name'] !='' ){
                                  base_img=sitedescription[i]['base_name'];
                         }
                         else{
                            base_img='';
                         }
                         //fourth td start acess
                        var aces_img='';
              var acesimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['acess_image'] != null &&  sitedescription[i]['acess_image'] != '')
              {
             aces_img= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['acess_name']+'" src="'+acesimg_url+''+sitedescription[i]['acess_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['acess_name'] !=null && sitedescription[i]['acess_name'] !='' ){
                                  aces_img=sitedescription[i]['acess_name'];
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
                          // found_amp = amps[a]['amp_id'].includes(des_amps);
                         // alert(found_view);
                        if(jQuery.inArray(amps[a]['amp_id'], des_amps) != -1){
                         if(amps[a]['amp_image'] != null && amps[a]['amp_image'] != '' ){

                                     amp_type+='<img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+amps[a]['amp_name']+'" src="'+ampimg_url+''+amps[a]['amp_image']+'" alt="..."><small></small><br>';
                         }
                         else if(amps[a]['amp_name'] !=null && amps[a]['amp_name']!='' ){
                                   amp_type+=amps[a]['amp_name'] +' AMPS <br>' ;
                         }
                         else{
                            amp_type='';
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

                                     water_type+='<span><img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+waters[w]['water_name']+'" src="'+waterimg_url+''+waters[w]['water_image']+'" alt="..."><small>'+waters[w]['water_name']+'</small></span>';
                         }
                         else if(waters[w]['water_name'] !=null && waters[w]['water_name']!='' ){

                                    if(waters[w]['water_name'] == "No")
                                    {
                                         water_type+='';
                                    }else{
                                        water_type+='<span data-toggle="tooltip" data-placement="left"  title="Water" >'+waters[w]['water_name'] +'</span>';
                                    }
                                   
                         }
                         else{
                            water_type='';
                         }
                        
                     }
                 }
                     //for sewer
                       
                      var des_sewer = sitedescription[i]['sewer'].split('@@');
          var sewer_image='';
          var sewerimg_url=baseurl+'uploads/SideParameter/';
           var sewer_type='';
            var found_sewer='';
                     for (var s = 0 ; s <sewers.length; s++) {
                          found_sewer = sewers[s]['sewer_id'].includes(des_sewer);
                         // alert(found_view);
                          if(jQuery.inArray(sewers[s]['sewer_id'], des_sewer) != -1){
                         if(sewers[s]['sewer_image'] != null && sewers[s]['sewer_image'] != '' ){

                                     sewer_type+='<span><img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+sewers[s]['sewer_name']+'" src="'+sewerimg_url+''+sewers[s]['sewer_image']+'" alt="..."><small>'+sewers[s]['sewer_name']+'</small></span>';
                         }
                         else if(sewers[s]['sewer_name'] !=null && sewers[s]['sewer_name']!='' ){

                                 if(sewers[s]['sewer_name'] == "No")
                                    {
                                         water_type+='';
                                    }else{
                                        sewer_type+='<span data-toggle="tooltip" data-placement="left"  title="Sewer" >'+sewers[s]['sewer_name']+'</span>';
                                    }

                                  
                         }
                         else{
                            sewer_type='';
                         }
                        
                     }}
                     // 7th td start
                     // for wifi
                        var wifi_img='';
              var wifiimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['wifi_image'] != null &&  sitedescription[i]['wifi_image'] != '')
              {
             wifi_img= '<img  style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['wifi_name']+'" src="'+wifiimg_url+''+sitedescription[i]['wifi_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['wifi_name'] !=null && sitedescription[i]['wifi_name'] !='' ){

                if(sitedescription[i]['wifi_name'] == "No")
                {
                    wifi_img="";   
                }else{
                    wifi_img=sitedescription[i]['wifi_name'];
                }
                                  
                         }


                         else{
                            wifi_img='';
                         }
                      //for cable
                        var cable_img='';
              var cableimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['cable_image'] != null &&  sitedescription[i]['cable_image'] != '')
              {
             cable_img= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['cable_name']+'" src="'+cableimg_url+''+sitedescription[i]['cable_image']+'" alt="..."><small>'+sitedescription[i]['cable_name']+'</small> ';
           }
            else if(sitedescription[i]['cable_name'] !=null && sitedescription[i]['cable_name'] !='' ){

                 if(sitedescription[i]['cable_name'] == "No")
                {
                    cable_img="";   
                }else{
                    cable_img=sitedescription[i]['cable_name'];
                }
                                 
                         }
                         else{
                            cable_img='';
                         }
                         //for verizon
                          var verizon_img='';
              var verizonimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['verizon_image'] != null &&  sitedescription[i]['verizon_image'] != '')
              {
             verizon_img= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+''+sitedescription[i]['verizon_image']+'" alt="..."> <small>'+sitedescription[i]['verizon_name']+'</small>';
           }
            else if(sitedescription[i]['verizon_name'] !=null && sitedescription[i]['verizon_name'] !='' ){

                 if(sitedescription[i]['verizon_name'] == "No")
                {
                    wifi_img="";   
                }else{
                   verizon_img=sitedescription[i]['verizon_name'];
                }
                                  
                         }
                         else{
                            verizon_img='';
                         }
                         var barICon='';
            if(sitedescription[i]['coverage']!=null && sitedescription[i]['coverage']!='')
            {
                if(sitedescription[i]['coverage']=='1bar'){
                barICon= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+" "+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'1-Bar.png" alt="..."><small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small> ';
            }else if(sitedescription[i]['coverage']=='2bar'){
                barICon= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+" "+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'2-Bars.png" alt="..."><small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small> ';

            }else if(sitedescription[i]['coverage']=='3bar'){
                barICon= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+" "+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'3-Bars.png" alt="..."> <small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small>';

            }
            else if(sitedescription[i]['coverage']=='4bar'){
                barICon= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+''+sitedescription[i]['coverage']+'" src="'+verizonimg_url+'4-Bars.png" alt="..."><small>'+sitedescription[i]['verizon_name']+' '+sitedescription[i]['coverage']+'</small> ';

            }else{
                 barICon= '<img style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['verizon_name']+'" src="'+verizonimg_url+'No-Bars.png" alt="..."> ';                    
            }
            }


            //for 8th td
               var shade_img='';
              var shadeimg_url= baseurl+'uploads/SideParameter/';
              if(sitedescription[i]['shade_image'] != null &&  sitedescription[i]['shade_image'] != '')
              {
             shade_img= '<img  style="width:50px;" data-toggle="tooltip" data-placement="left" title="'+sitedescription[i]['shade_name']+'" src="'+shadeimg_url+''+sitedescription[i]['shade_image']+'" alt="..."> ';
           }
            else if(sitedescription[i]['shade_name'] !=null && sitedescription[i]['shade_name'] !='' ){
                                  shade_img=sitedescription[i]['shade_name'];
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

                                     table_type+='<span><img style="width:50px;" data-toggle="tooltip" data-placement="left"  title="'+tables[t]['table_name']+'" src="'+tableimg_url+''+tables[t]['table_image']+'" alt="..."></span>';
                         }
                         else if(tables[t]['table_name'] !=null && tables[t]['table_name']!='' ){

                             if(tables[t]['table_name'] == "None")
                                    {
                                         table_type+='';
                                    }else{
                                       table_type+=tables[t]['table_name']+'<br>';
                                    }
                                 
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
                     // var mango=0;
                     // for(var fv8=0;fv8<favoriteCampsit.length;fv8++){
                     //    if(favoriteCampsit[fv8]['campsite_id']==sitedescription[i]['siteId']){
                     //        mango++;
                            var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="dislike"><i style="color:red" data-toggle="tooltip" title="Unlike" class="fa fa-heart"></i></a>';
                     //    }
                     // }
                     // if(mango==0)
                     // {
                     //    var likef='<a href="javascript:void(0)" class="favourite-user heart-'+sitedescription[i]['siteId']+'" data-id="'+sitedescription[i]['siteId']+'" data-fav="like">Like</a>';
                     // }


                     //test

                           if(i>0)
                     {  
                           
                              if(sitedescription[i]['p_name'] != sitedescription[i-1]['p_name'] || sitedescription[i]['c_name'] != sitedescription[i-1]['c_name'])
                             // if(sitedescription[i]['CcName'] != sitedescription[i-1]['CcName'])
                             {
                        
                                  // console.log("parent="+i+sitedescription[i]['pcName']+"child=="+i+sitedescription[i]['CcName']+" =="+sitedescription[i-1]['CcName'] ) ;

                                var title = "<tr><td colspan='10' style='text-align:center' class='remove-border'><span style='font-size:30px'>"+sitedescription[i]['p_name']+"</span><span style='font-size:18px'>"+ccName+"</span></td><tr> " ;
                             }else{

                                 // console.log("parent="+i+sitedescription[i]['pcName']+"child=="+i+sitedescription[i]['CcName']+" !="+sitedescription[i-1]['CcName'] ) ;

                                // alert(sitedescription[i]['CcName']+" ==="+sitedescription[i-1]['CcName'] ) ;
                                var title = "" ;
                             }
                         

                     }
                     else{

                         
                             var title = "<tr><td style='text-align:center' colspan='10' class='remove-border'><span style='font-size:30px'>"+sitedescription[i]['p_name']+"</span><span style='font-size:18px'>"+ccName+"</span></td><tr> " ;
                         

                       
                    }
                    

                     // end test

                     //adil
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
                     //end adil

                      var pets = "" ;

                       if(sitedescription[i]['pets'] != "No")
                       {
                            pets = '<img class="" src="<?php echo base_url(); ?>assets/images/icons/Pets.png" data-toggle="tooltip" data-placement="left" title='+sitedescription[i]['pets']+'><small>'+sitedescription[i]['pets']+'</small>' ;
                       }

                       var elc = "" ;
                       if(sitedescription[i]['electric'] != "No")
                       {
                          elc = '<img src="<?php echo base_url(); ?>assets/images/icons/plug.png" class="" data-toggle="tooltip" title="'+sitedescription[i]['electric']+'">' ;
                       }


                       if(sitedescription[i]['map_link'] == null)
                    {
                        var pindrop = "" ;
                    }else{
                        var pindrop = '<a data-placement="left" data-toggle="tooltip" title="Map Pindrop" href="'+sitedescription[i]['map_link']+'" style="font-size:20px;" class="fa fa-map-marker"></a>'
                    }

               html+= title+' <tr class="fav-remove-'+sitedescription[i]['siteId']+' fav-like-wrap"><td>'+likeFav+' <span>Site #'+site_no+'</span>'+site_pics+' '+site_img+' <span>'+view_type+'</span>'+pindrop+'<br>'+likef+'</td><td>'+camp_type+'<span><img src="<?php echo base_url(); ?>assets/images/icons/guests.png" data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noGuest']+'><small>'+sitedescription[i]['noGuest']+'</small></span><span>'+pets+'</span><span><img src="<?php echo base_url(); ?>assets/images/icons/Car.png" class="" data-placement="left" data-toggle="tooltip" title='+sitedescription[i]['noVehicle']+'><small>'+sitedescription[i]['noVehicle']+'</small></span></td> <td>'+lengthTrailer+''+grade_img+''+base_img+'</span></td><td><span>'+aces_img+'</span></td><td><span>'+elc+'</span><span>'+amp_type+'</span></td> <td><span>'+water_type+'</span> <span>'+sewer_type+'</span></td> <td><span>'+wifi_img+'</span><span>'+cable_img+'</span><span>'+verizon_img+'</span><span>'+barICon+'</span></td> <td><span>'+shade_img+'</span></td><td>'+table_type+'</td><td><span>'+sitedescriptionT+'</span><span>'+sitedescriptionW+'</span><span>'+sitedescriptionY+'</span></td></tr> ';
            };
             // alert('123');
            document.getElementById('htmlShow').innerHTML=html;
        }else{

            document.getElementById('htmlShow').innerHTML='<span>No Record Found</span>';
        }
        res.total=res['total'];
            refresh({
                total: res.total,// 可选
                length: length // 可选
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
                          $('.heart-'+id).html('Dislike');  
                          $('.fav-remove-'+id).css("display",'none');
                        }else if(data==2){
                              toastr.success("This campsite is already added in your favorite list");
                          
                        }else if(data==3)
                        {
                             $('.heart-'+id).html('Like'); 
                             $('.fav-remove-'+id).css("display",'none');
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

            // $('[data-toggle="tooltip"]').tooltip()
        });
        setTimeout(function(){

            $('.icons-custom').show('slow') ;
            $('.dis-custom').show('slow') ;
        }, 5000);

               </script>
