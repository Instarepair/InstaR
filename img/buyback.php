<?php 
include('functions.php');
require('pdf/fpdf.php');
?>
<html>
<head>
<title>Insta Repair</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="n" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->  
<!-- js -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
                <script>
                  $(document).ready(function () {
                    //Initialize tooltips
                    $('.nav-tabs > li a[title]').tooltip();
                    
                    //Wizard
                    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                      var $target = $(e.target);
                    
                      if ($target.parent().hasClass('disabled')) {
                        return false;
                      }
                    });

                    $(".next-step").click(function (e) {

                      var $active = $('.wizard .nav-tabs li.active');
                      $active.next().removeClass('disabled');
                      nextTab($active);

                    });
                    $(".prev-step").click(function (e) {

                      var $active = $('.wizard .nav-tabs li.active');
                      prevTab($active);

                    });
                  });

                  function nextTab(elem) {
                    $(elem).next().find('a[data-toggle="tab"]').click();
                  }
                  function prevTab(elem) {
                    $(elem).prev().find('a[data-toggle="tab"]').click();
                  }
                </script>

<style type="text/css">


.phonehover:hover{


  border-bottom: none;
}
a.a_foot_li{
    color:white;
    font-size:12px;
    font-family: helvetica;
}

.social_icons:hover{


  -webkit-transform: rotate(360deg) scale(1.0);
  -moz-transform:    rotate(360deg) scale(1.0);
  -o-transform:      rotate(360deg) scale(1.0);
  -ms-transform:     rotate(360deg) scale(1.0);
}



.panel-heading{

  background: #DCA644;
}

   .foot_list{
                                text-align: initial;

            }

a:visited{

  text-decoration: none;
}
label {
    margin: 2px;
    font-size: 13px;
    color: #fff;
}

.hvr-shutter-in-vertical:before {






background: black;





  }


.top_tab_buttons{

  border:2px black groove;
  background: white;
  color: black;

}
.top_tab_buttons:hover{

      background: black;
    color: white;
    padding: 6px;
}



.top_tab_buttons:visited{

      background: red;
    color: white;
    padding: 6px;
}
.text_fld1{

      padding-left: 17px;
    background: transparent;
    /* background: orange; */
    width: 200px;
    height: 31px;    text-align: center;
    border: 1px groove black;
    font-size: 12px;
    color: #5F5959;
        margin-top: 24px;
    margin-bottom: 5px; 
}





        .round_circle:hover{
 
            

background: #D8D5D5;

        }
      



                    img.image_devices{
    margin-top: 38px;
    width: 75px;
    margin-left: 48px;



                    }





                    .service_desc{
                      font-family: helvetica;
    font-size: 13px;
    margin-top: 16px;
    color: #000000;
    font-weight: bold;
                    }


                    .service_ul{
                              font-family: helvetica;
    font-size: 13px;
    color: #717070;
    margin-top: 21px;

                    }


                    .repair_title{

                      font-weight: bold;
                      margin-bottom: 12px;
                    }





                    @media screen and (min-width:300px){

                                         .repairbuttonul{


                          margin-top: 30vw;
                      }

                                                .top_tab_buttons{ 
                                              font-size: 12px;
                                                padding: 5px;
                                            }
                      #servicecontainer{



                              padding-left: 18vw;
                      }

.servicename {
    color: black;
    margin-left: 35px;
    line-height: 41px;
    margin-top: 17px;
    font-weight: bold;
}
                      img.image_devices {
    margin-top: 19px;
    width: 52px;
    margin-left: 33px;
    color: black;
}


.round_circle{

      border: 1px dotted black;
    margin-right: 13px;
    width: 120px;
    height: 120px;
    padding-top: 2px;
    margin-bottom: 17px;
    background: none;
    vertical-align: middle;
    font-size: 12px;
    border-radius: 62px;
}


.banner {
    background: url(img/frontbanner5.png),url(img/gif5.gif);
    background-position: 9% 65px;
    background-size: 88%;
    background-repeat: no-repeat;
}
.buttons ul li a {



                          background: black;
    border-radius: 3px;
    padding: 6px;
    margin-left: 38vw;
    font-size: 13px;



}


                    










                    }





                      @media screen and (min-width:800px){

                                .top_tab_buttons{
                                              font-size: 16px;
                                                padding: 15px;
                                            }
                      #servicecontainer{



                            padding-left:0vw;
                      }


.buttons ul li a {


       padding: 17px;

}


                    










                    }


                    @media screen and (min-width:1000px){





                      .repairbuttonul{


                          margin-top: 40vw;
                      }

.servicename {
    color: black;
    margin-left: 45px;
    font-size: 18px;
    line-height: 41px;
    margin-top: 17px;
    font-weight: bold;
}

img.image_devices {
    margin-top: 31px;
    width: 66px;
    margin-left: 46px;
    color: black;
}
                          .round_circle {
      border: 1px dotted black;
    margin-right: 13px;
    width: 160px;
    height: 160px;
    padding-top: 2px;
    margin-bottom: 17px;
    background: none;
    vertical-align: middle;
    font-size: 12px;
    border-radius: 90px;
}




.buttons ul li a {

        font-size: 19px;
       padding: 27px;

}
}


                        @media screen and (min-width:1200px){

                                .banner{

                                  min-height: 923px;
                                }
}





                    @media screen and (min-width:1400px){




.banner{


        background-size: 76%;
    background-repeat: no-repeat;
}
                                         .repairbuttonul{


                          margin-top: 30vw;
                      }
                    }

</style>

<script type="text/javascript">



function add_problem_description()
{
  var devicetype=document.getElementById('devicetype').value;
  // getting the problem description
var problem1;
if(devicetype=='mobile')
{

  problem1=document.getElementById('mobile_tab_problems').value;
}
else if(devicetype=='desktop')
{

  problem1=document.getElementById('pc_problems').value;
}else if(devicetype=='laptop')
{

  problem1=document.getElementById('laptop_problems').value;
}else if(devicetype=='tablet')

  problem1=document.getElementById('mobile_tab_problems').value;

document.getElementById('problemid').value=problem1;


//
}





function get_problem_dropdown(a)
{

    document.getElementById('mobile_tab_problems').style.display='none';
        document.getElementById('pc_problems').style.display='none';
            document.getElementById('laptop_problems').style.display='none';


    document.getElementById(a).style.display='block';



}
</script>
<style type="text/css">

::-webkit-scrollbar {
    width:10px;
}
::-webkit-scrollbar-track {
    background-color: #eaeaea;
    border-left: 1px solid #ccc;
}
::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
::-webkit-scrollbar-thumb:hover {
    background-color:grey;
}

</style>

</head>
<body onload="">



  <!-- ======= loader gif starts here =================================================== -->

    




  <!-- ============ loader gif starts here ============================================= -->


  <div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="index.html">
<img src="images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
          <li><a href="#" class='phonehover' style="font-family: helvetica;"  >
          <img src="img/phone1.gif" style='max-width:32px' >  81 00 75 75 75 
          </a></li>
        <li><a href="#" style="font-family: helvetica;" data-toggle="modal" id="top_menu_self" data-target="#trackorder1">Track Order</a></li>
        
            <li><a href="#" style="font-family: helvetica;" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;
    font-size: 15px;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" data-target="#requestacallback" id=''>Request call back</a></li>

        <li style='display:none'><a href="#" id='requestdelivery' style="font-family: helvetica;" data-toggle="modal" style="display:none;
" data-target="#calldelivery">Request delivery</a></li>

        </ul>
            <!-- script-for-menu -->
             <script>
               $( "span.menu" ).click(function() {
               $( "ul.nav1" ).slideToggle( 300, function() {
               // Animation complete.
                });
               });
            </script>
            <!-- /script-for-menu -->
      </div>
    
          <script src="js/classie.js"></script>
          <script src="js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) ); 
            </script>
        <!-- //search-scripts -->
        
      
      <div class="clearfix"> </div>
  </div>



<!-- the hiddenb text -->




<!-- ======= the hidden tect ends here ============== -->
  <div class="container" >
<center>
<h2>Buy Back <strong style='    color: #E6AD20;
    font-size: 30px;'>INSTAREPAIR</strong></h2>

<div class='row' >

<?php 

for($r=0;$r<4;$r++){ ?>
  <div class="col-md-4 col-sm-6 col-xs-12" >

<img src='img/pc2.png' width=''>

   </div>

<?php } ?>
  </div>

</center>

</div>




<!-- ==== entire form will come here =====================================-->

<div class='container' style='background:red;'>




</div>




<!-- ======= entire formn ends here ===================================== -->

