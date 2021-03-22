 <style type="text/css">
     /*for 404 page */
.cc-errorfull { background-color: #fcfcfc; padding-bottom: 0px;}
.cc-error {
    float: left;
    width: 100%;
    text-align: center;
}
.cc-error h3 {
    font-size: 40px;
    text-transform: uppercase;
    font-weight: bold;
    margin: 0px 0px 0px;
    line-height: 1;
    position: relative;
}
.cc-error h2 {
    font-size: 180px;
    line-height: 0.9;
    font-weight: bold;
    margin: 0px 0px 10px;
    color: rgba(28, 87, 165,1);
}
.cc-error h4 {
    text-transform: uppercase;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 6px;
}
.cc-error p {
    display: inline-block;
    width: 100%;
    color: #262626;
    font-weight: bold;
    font-size: 16px;
}
.cc-error p a { position: relative; color: rgba(28, 87, 165,1);}
.cc-error p a:before {
    content: '';
    position: absolute;
    left: 0px;
    bottom: 0px;
    width: 0px;
    height: 2px;
    background-color: rgba(28, 87, 165,1);
    -webkit-transition: all 0.4s ease-in-out;
       -moz-transition: all 0.4s ease-in-out;
        -ms-transition: all 0.4s ease-in-out;
         -o-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
}
.cc-error p a:hover:before { width: 100%;}
.cc-error img {
    float: left;
    width: 100%;
    margin: -120px 0px 0px;
    pointer-events: none;
}
.cc-error { padding: 80px 0px;}
/*for 404 pagge */
 </style>
    <div class="ccg-subheader" style="background-image: url('<?php echo base_url();?>assets/images/sub-header-img.jpg');">
            <span class="ccg-subheader-transparent" style="background-color: tan;"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Error</h1>
                        <ul class="ccg-breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home Page</a></li>
                            <li>Error</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <div class="container">     

 
               
            <div class="row">
              
                <div class="col-md-12">
                    <div class="row">
                        <div class="cc-error">
                           
                            <h2>404</h2>
                            <h4>Page Not Found</h4>
                            <p>Sorry, we can't find the page you are looking for.Please go to <a href="<?php  echo base_url(); ?>">HomePage</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
