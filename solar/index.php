<?php 
include("solarcalculator.php");
			
			if(isset($_POST['submit_enquiry']))
			{
						$state=$_POST['state'];
						$permonthcost=$_POST['permonthcost'];
						$rooftoparea=$_POST['rooftoparea'];
						$monthlybill=$_POST['monthlybill'];
						$name=$_POST['name1'];
						$email=$_POST['email1'];
						$phone=$_POST['phone1'];





			}
?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Solar ! launching soon</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Hair Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Poiret+One|Lily+Script+One|Raleway:400,300,500,600,200,700' rel='stylesheet' type='text/css'>
<!--webfont-->
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/modernizr.custom.js"></script>

<style type="text/css">
.form-control {
width: 190px;

	}
.contact_form
{
    overflow-y: scroll;
    height: 400px;
      background-color: white;
    padding-top: 22px;
    padding-left: 25px;
    padding-right: 50px;
    margin-top: 68px;
    min-width: 320px;
    /* margin-top: 89px; */
    margin-left: 47%;
    width: 73%;
    max-width: 407px;
    z-index: 2222;
    position: fixed;
   height:464px;
   
}


  @media screen and (min-width:320px){

  			.contact_form {

  					margin-left: 10%;



  			}






  	}
  	@media screen and (min-width:700px){

  			.contact_form {

  					margin-left: 40%;



  			}






  	}
</style>

 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>



                    $(document).ready(function(){
$("#sendsolarcost").click(function(){


var permonthcost=$("#permonthcost").val();
var monthlybill=$("#monthlybill").val();
var rooftoparea=$("#rooftoparea").val();
msguser1=$("#msguser").val();
var dataString = '&permonthcost='+permonthcost+'&monthlybill='+monthlybill+'&rooftoparea='+rooftoparea+'&sendsolarcost='+1;
$.ajax({
type: "POST",
url: "solarcalculator.php",
data: dataString,
cache: false,
success: function(result){
  $('#solar_msg_sent').html(result);

  $('#solar_msg_sent').show();
    $('#calculator_form').hide();
 $('#enquiry_id').show();
  $('#reset_id').show();
document.getElementById('stateid').value=document.getElementById('state').value;
document.getElementById('permonthcostid').value=document.getElementById('permonthcost').value;
document.getElementById('monthlybillid').value=document.getElementById('monthlybill').value;
document.getElementById('rooftopareaid').value=document.getElementById('rooftoparea').value;




}
});

return false;
});
});



                    // submit enquiry form

                 $(document).ready(function(){
$("#enquiryid").click(function(){


var permonthcost=$("#permonthcostid").val();
var monthlybill=$("#monthlybillid").val();
var rooftoparea=$("#rooftopareaid").val();
var name=$("#name1").val();
var email=$("#email1").val();
var phone=$("#phone1").val();

var dataString = '&permonthcost='+permonthcost+'&monthlybill='+
monthlybill+'&rooftoparea='+rooftoparea+'&name='+name+
'&email='+email+
'&phone='+phone+'&submit_enquiry='+1;
$.ajax({
type: "POST",
url: "index.php",
data: dataString,
cache: false,
success: function(result){
$('#calculator_form').hide();
$('#enquiry_form').hide();
$('#contact_msg_sent').show();
 $('#reset_id').show();
}
});

return false;
});
});


    </script>
</head>
<body id='bodyid'>




<!-- ===========================popup for contact ================================== -->
<div  class="contact_form" id="contact_popup" style='display: none;box-shadow: 10px 10px 5px #222426;'>




  <p id='solar_msg_sent' style='color:#919191;display:none'></p>
  <p id='contact_msg_sent' style='color:#919191;display:none;font-size:9px;color:orange'>
your enquiry has been submitted ! we will reply you soon !
  </p>
<a href="javascript:void(0)" onclick="document.getElementById('contact_popup').style.display='none';"  style='color:rgb(254, 180, 58);font-size:22px;float:right'>
<img src="images/close.png" width='28'></a>

<form role="form" method="post" id="calculator_form" action="#">
<H3>SOLAR CALCULATOR :</H3>
    <div class="form-group">
    <label for="email">select state :</label><br>
   <select name="state" id='state' style='width: 190px;
    height: 34px;'>
   	<option>Bihar</option>
   	  	<option>Jharkhand</option>
   	  	  	<option>Uttar Pradesh</option>
   	  	  	  	<option>Delhi</option>
   </select>
  </div>
    <div class="form-group">
    <label for="email">cost of electricity per month :</label>
    <input type="text" name="permonthcost"  class="form-control" required  id="permonthcost">
  </div>
    <div class="form-group">
    <label for="email">Rooftop area :</label>
    <input type="text" class="form-control" name="rooftoparea" required  id="rooftoparea">
  </div>
  <div class="form-group">
    <label for="msg">Enter Your monthly bill :</label>
   <input type="text" name='monthlybill' class="form-control" required  id="monthlybill">
  </div>

  <input type="button" id='sendsolarcost' style='     background-color: rgb(254, 180, 58);;
    color: white;
    border: none;
    text-transform: uppercase;
    padding: 11px;
    border-radius: 4px;' value='calculate '>
</form>

				<!--=========== enquiry form fill =-================= -->


<form role="form" method="post" id="enquiry_form" style="display:none" action="#">
<H3>Send us your enquiry :</H3>
    <div class="form-group">
    	<input type="text" style="display:none" name='state' id='stateid'>
    		<input type="text" style="display:none" name='permonthcost' id='permonthcostid'>
    			<input type="text" style="display:none" name='monthlybill' id='monthlybillid'>
    				<input type="text" style="display:none" name='rooftoparea' id='rooftopareaid'>

    <label for="email">enter name :</label><br>
 <input type="text" name="name1" id='name1' class="form-control" required >
  </div>
  <div class="form-group">
    <label for="email">enter contact number :</label><br>
 <input type="text" name="phone1" id='phone1' class="form-control" required  >
  </div>
  <div class="form-group">
    <label for="email">enter your mail id :</label><br>
 <input type="text" name="email1" id='email1' class="form-control" required  >
  </div>
  
<input type="button" name='submit_enquiry' id='enquiryid' style='     background-color: rgb(254, 180, 58);;
    color: white;
    border: none;
    text-transform: uppercase;
    padding: 11px;
    border-radius: 4px;' value='send enquiry '>

</form>



				<!-- =========== enquiry form ends here ============== -->



<a href="#" id='reset_id' style='display:none;background: #812F2F;
    color: white;margin-top:33px;position:absolute;
    padding: 10px;'
onclick="document.getElementById('solar_user_values').style.display='none';
document.getElementById('solar_user_values').style.display='none';
document.getElementById('calculator_form').style.display='block';
document.getElementById('enquiry_id').style.display='none';
document.getElementById('reset_id').style.display='none';
document.getElementById('contact_msg_sent').style.display='none';
"
>calculate again</a>
<a href="#" id='enquiry_id' style='display:none;background: #208C47;
    color: white;margin-top:33px;position:absolute;
    padding: 10px;    margin-left: 121px;'
onclick="document.getElementById('solar_user_values').style.display='none';
document.getElementById('enquiry_form').style.display='block';
document.getElementById('enquiry_id').style.display='none';
document.getElementById('reset_id').style.display='none';"
>send enquiry</a>
</div>











<!-- ===================== popup ends here ======================================================== -->

<div class="banner-bg" id="home" style="background:url('images/banner.jpg');    background-repeat: no-repeat;">
	  <div class="container">
			 <div class="header">
			     <div class="logo">
						<a href="index.php"><h1>Go solar</h1><span>Change Your Energy<span></a>
				</div>
						 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
						<li><a class="active" href="index.php">Home</a></li>
						<li><a href="about.html">ABOUT</a></li>
						<li><a href="javascript:void(0)" onclick="document.getElementById('contact_popup').style.display='block';">CALCULATE SOLAR OUTPUT</a></li>
						 <li class="dropdown1"><a href="#">services</a>
							 <ul class="dropdown2">
									<li><a href="solar-roof-top.html">Solar Rooftops</a></li>
									<li><a href="residential.html">Residential</a></li>
									<li><a href="commercial.html">Commercial</a></li>
									
								
							  </ul>
						 </li> 
						 <li><a href="blog.php">blog</a></li>   
						<li><a href="contact.html">CONTACT</a></li>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
				</div>
					<div  id="top" class="callbacks_container" style='padding-top:23px'>
					<ul class="rslides" id="slider4" style="background-color: rgba(254,178,58,0.45);margin-top:123px;
    padding-top:0px;max-height:300px;
    padding: 20px;max-width:455px">
					<li>
								<div class="banner-info">
									<h4 style='color:white'>
UP Government Makes Solar Panels Mandatory</h4>
									<lable> </lable>
									<p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h4 style='color:white'>Proposals to Encourage Rooftop Solar Units in Karnataka </h4>
								   <lable> </lable>
									<p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
									<h4 style='color:white'>NHPC to Set up 50 MW Solar Power Project in Tamil Nadu </h4>
									<lable> </lable>
									<p>Lorem Ipsum Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsumipsum dolor sit amet, consectetuer dolor sit.</p>
								</div>								
							</li>
						</ul>
					</div>
					<!--banner-slide-->
					<script src="js/responsiveslides.min.js"></script>
				   <script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 4
					  $("#slider4").responsiveSlides({
						auto: true,
						pager: true,
						nav: true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
					  });
				
					});
				  </script>
			 <!--//banner-slide-->
		</div>
	</div>










<!--start-banner-bottom-->
  <div class="banner-bottom-section">
	<div class="container">
		<h3 class="tittle" style='font-family:roboto'>Why go solar ?</h3>
	
<div class="">
	

<div class="news-section">
			<div class="container">
		
				<lable class="two"> </lable>
				
				<div class="news-left">			
					<div class="col-md-8 col-news-right">
						<div class="col-bottom">
							<h4>On Grid</h4>
						
<ul>
				<li>Solar energy helps you save a huge amount of money on your electricity Bills.</li>	
				<li>Gives you a high ROI(Return on Investment) and payback period of just 4-5 years.</li>		
				<li>Its gives you free green energy for more than 25 years.
</li>		
				<li>It helps you save the environment by reducing your carbon footprint.</li>	
				<li>Saves the environment from harmful effects caused by the coal fired thermal power plants by reducing </li>	



</ul>

					
						</div>

						<div class="seperator"></div><div class="seperator"></div><div class="seperator"></div>
							<div class="col-bottom" style="margin-top:5%;">
							<h4>Off grid </h4>
							<p>Solar takes advantage of a free and powerful energy source – the sun.In a single hour, the sun transmits more energy to the earth's surface than the world uses in a year.
Solar converts this energy into electricity, making it a simple, clean and cost-effective way to power our lives. It’s dependable, too – because unlike fossil fuels, the sun’s energy is unlimited.
Just imagine what that could do  </p>
							<a href="why-go-solar.html" class="solar-links"><div class="btn btn-default">Know more </div></a>
						</div>
							
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 col-news">
						<div class="col-news-top">
							<a href="#" class="date-in">
								<img class="img-responsive mix-in" src="images/on-grid.jpg" style="max-width:244px;border-radius:50%;"alt="">
							
							</a>
							<div class="seperator"> </div>				<div class="seperator"> </div>
						</div>	

						<div class="clearfix"></div>				
							<div class="col-news-top">
							<a href="#" class="date-in">
								<img class="img-responsive mix-in" src="images/off-grid.jpg" style="max-width:244px;border-radius:50%;margin-top:5%;"alt="">
							
							</a>
							<div class="clearfix"> </div>
						</div>	
						</div>
							
						</div>					
					</div>
					<div class="clearfix"> </div>
				</div>


</div>










<div class="container">

<div class="row">
<div class="col-md-4">
	


</div>

<div class="col-md-8">
<div class="row">



	<p class="paragraph">
</p>


</div>

<div class="seperator"></div>


<div class="row">
	



	<p class="paragraph">
</p>

</div>

<div class="seperator"></div>

<div class="row">
	


	<p class="paragraph">
</p>


</div>

<div class="seperator"></div>

<div class="row">
	


	<p class="paragraph">
</p>


</div>

<div class="seperator"></div><div class="seperator"></div>
<div class="row">
	


	<p class="paragraph">
</p>


</div>



</div>

</div>


</div>



     </div>
    </div>



<!---new content -->
<script type="text/javascript">
	
 $(document).ready(function(){ 

$('#att1').click(function(){

   $('#att1-content').fadeIn("normal");
    $('#att2-content').hide();
 $('#att3-content').fadeout("normal");
$('#att4-content').fadeout("normal");
 $('#att5-content').fadeout("normal");

});


$('#att2').click(function(){

   $('#att2-content').fadeIn("normal");
 $('#att1-content').fadeout("normal");
 $('#att3-content').fadeout("normal");
$('#att4-content').fadeout("normal");
 $('#att5-content').fadeout("normal");



});
$('#att3').click(function(){

   $('#att3-content').fadeIn("normal");
 $('#att1-content').fadeout("normal");
 $('#att2-content').fadeout("normal");
$('#att4-content').fadeout("normal");
 $('#att5-content').fadeout("normal");
});

$('#att4').click(function(){

   $('#att4-content').fadeIn("normal");
    $('#att1-content').fadeout("normal");
 $('#att2-content').fadeout("normal");
$('#att3-content').fadeout("normal");
 $('#att5-content').fadeout("normal");

});


$('#att5').click(function(){

   $('#att5-content').fadeIn("normal");
    $('#att1-content').fadeout("normal");
 $('#att2-content').fadeout("normal");
$('#att3-content').fadeout("normal");
 $('#att4-content').fadeout("normal");

});



 });


</script>





	

				<div class="banner-bottom-section">
	<div class="container">
		<h3 class="tittle" style='font-family:roboto'>How we work ?</h3>
		<div class="banner-bottom-info" style="margin-left: 10%;">
			



<div class="row">

			
<a href="project-planning-and-consulting.html">
			<div class="col-md-4 b-grids" style="-webkit-border-radius:0%;    border: none;">
				
						 <div class="album-box">
					 <img src="images/pic1.png" style="width:50%">
				   <h4 style="font-family: helvetica;
    color: #9FA5B6;
    font-size: 18px;
    font-weight: bold;" id="att1">Project Planning and consulting</h4>
				    <div id="att1-content" style="display: none;overflow: hidden;"> <p>
</p> </div>
				 </div>


				</div>
</a>
			






<a href="engineering-and-design.html">

			<div class="col-md-4 b-grids" style="-webkit-border-radius:0%;    border: none;">
				
<div class="album-box">
					 	 <img src="images/pic2.png" style="width:50%">
				   <h4 style="    font-family: helvetica;
    color: #9FA5B6;
    font-size: 18px;
    font-weight: bold;" id="att2">Engineering and Design</h4>
				    <div id="att2-content" style="display: none;"> <p>
</p></div>
				 </div>


				</div>
			

</a>





<a href="project-implementation.html">
			<div class="col-md-4 b-grids" style="-webkit-border-radius:0%;    border: none;">
				
<div class="album-box">
					 	 <img src="images/pic3.png" style="width:50%">
				   <h4 style="    font-family: helvetica;
    color: #9FA5B6;
    font-size: 18px;
    font-weight: bold;" id="att3">Project Implementation</h4>
				   <div id="att3-content" style="display: none;">  <p>
</p> </div>
				 </div>


				</div>

</a>				



</div>


<div class="row" style="">



<div class="col-md-2"></div>

<a href="quality-assurance.html">
				<div class="col-md-3 b-grids" style="-webkit-border-radius:0%;    border: none;">
				
<div class="album-box">
					 	 <img src="images/pic4.png" style="width:50%">
				   <h4 style="    font-family: helvetica;
    color: #9FA5B6;
    font-size: 18px;
    font-weight: bold;" id="att4">Quality Assurance</h4>
				    <div id="att4-content" style="display: none"> <p>
</p> </div>
				 </div>


				</div>
</a>



			


<a href="operations-and-maintenance.html">
				<div class="col-md-3 b-grids" style="-webkit-border-radius:0%;    border: none;">
				
				<div class="album-box">
					 	 <img src="images/pic1.png" style="width:50%">
				   <h4 style="    font-family: helvetica;
    color: #9FA5B6;
    font-size: 18px;
    font-weight: bold;" id="att5">Operations and Maintenance</h4>
				   <div id="att5-content" style="display: none;overflow: hidden;">  <p> 
</p></div>
				 </div>



				</div>	

</a>


</div>







				</div>
				</div>
				</div>


















<!--start-welcome-->
	<div class="about">
	   <div class="container">
		<h3 class="tittle">We are </h3>
		<lable class="two"> </lable>
	
		<p> SAUR RENEWABLE POWER PRIVATE LIMITED is a national solar power system design & installation company that specializes in solar powered energy solutions including photovoltaic solar (PV) panels , energy efficient home improvements and commercial lightings.   Our professional network of experienced solar installers, engineers allows us to combine affordable solar power solutions with the highest standards of customer service excellence. like Walmart, Kohl’s and Staples, to name drop a little.</p>
	   
	   </div>
    </div>
	
	
			</div>
		</div>
	<!--//news-->
	<!--contact-->


	<!--/start-footer-section-->
			<div class="footer-section">
				<div class="container">
					<div class="footer-grids wow bounceIn animated" data-wow-delay="0.4s">
						<div class="col-md-3 footer-grid">
						<h4>Our address :</h4>
						<div class="border2"></div>
						  <p>H 187, Nar Vihar -2 , Noida -34,U.P</p>
						  <p class="sub">Info@rhombusstudio.com</p>
						</div>
						<div class="col-md-3 footer-grid tags">
								<h4>the tags</h4>
								<div class="border2"></div>
							<ul class="tag">
								<li><a href="#">Rooftop</a></li>
								<li><a href="#">solar usage</a></li>
								<li><a href="#">solar grids</a></li>
								<li><a href="#">electricity savings</a></li>
								<li><a href="#">solar installlation</a></li>
								<li><a href="#">Renewal terms</a></li>
								
							</ul>
						</div>
						<div class="col-md-3 footer-grid tweet">
								<h4>latest blogs</h4>
								<div class="border2"></div>
						
								<div class="clearfix"></div>
						</div>
						<div class="col-md-3 footer-grid flickr">
								<h4>social presence</h4>
								<div class="border2"></div>
								
						</div>
						<div class="clearfix"></div>
					</div>
			</div>
		</div>
	<!--//end-footer-section-->
			<!--/start-copyright-section-->
				<div class="copyright">
					<p>&copy; 2015  All Rights  Reserved | Design by <a href="http://Rhombusstudio.com">Rhombusstudio.com</a></p>
				</div>
			<!--//end-copyright-section-->
					<!--start-smoth-scrolling-->
			<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".scroll").click(function(event){		
										event.preventDefault();
										$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
									});
								});
								</script>
							<!--start-smoth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>