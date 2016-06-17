<?php

include("db.php");


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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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


<script type="text/javascript" src="hilitor.js"></script>
<script type="text/javascript">

  var myHilitor = new Hilitor("content");
  myHilitor.apply("highlight words");

</script>
</head>
<body>
<div class="banner-bg two" id="home" style="background-image: url('http://www.solarpanelsxpert.com/image/banner.jpg')">	
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
						 <li class="dropdown1"><a href="#">services</a>
							<ul class="dropdown2">
									<li><a href="solar-roof-top.html">Solar Rooftops</a></li>
									<li><a href="residential.html">Residential</a></li>
									<li><a href="commercial.html">Commercial</a></li>
									
								
							  </ul>
						 </li> 
						 <li><a href="blog.html">blog</a></li>   
						<li><a href="contact.html">CONTACT</a></li>
					  </ul>
					
				 </div>
				 <div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- blog section starts here ================================================================== -->

						<div class="container" style="padding-bottom:123px">
  <h1>Our blogs</h1>



<!--  ====================== a single blog  will come here ======================================== -->

<?php header('Content-Type: text/html; charset=UTF-8');
$arr1=array();
$cmd="select * from blog";
$result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{


//$phone=$row['phone'];
array_push($arr1,$row);

}


			for($k=0;$k<sizeof($arr1);$k++)
			{


?>
  <div class="row" style="margin-top:123px;margin-bottom:100px">
  	<div class="col-sm-8" style="    color: #EA9A05;
    font-size:20px;">
  					<?php 
  							echo $arr1[$k]['subject'].' ('.$arr1[$k]['time'].')';
  					?>
  					<br>
  					<span style='color:grey;font-style:italic'> by-<?php 
  							echo $arr1[$k]['name'];
  									if(!is_null($arr1[$k]['email']))
  							echo '('.$arr1[$k]['email'].')';
  					?></span>
  	</div>

</div>

  <div class="row">
    <div class="col-sm-4" style="">

<img src="<?php 
  							echo $arr1[$k]['pic'];

?>
  							" class="img-responsive" style="max-width:300px">

    </div>
    <div class="col-sm-8" style="background-color: rgba(226, 226, 226, 0.49);
    padding: 41px;">
    <span style="color:orange;font-style:italic">12 comments</span><br>
	<?php 
  							echo substr($arr1[$k]['content1'], 0, 600); 
  					?>


<a href="blogsingle.php?post=<?php echo $k; ?>" style="color:maroon;margin-top:95px;">........Read More</a>


    </div>

  </div>

  							
  				<?php } ?>

</div>


















<!-- blog section ends here =================================================================== -->

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