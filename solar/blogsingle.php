		<?php

include("db.php");

if(isset($_POST['comment_now']))
{
		$name=$_POST['name1'];
		$email=$_POST['email1'];
		$comment=$_POST['comment1'];
		$postnum=$_POST['postnum'];
$cmd="UPDATE blog SET comment1 = CONCAT('$comment','^',comment1),
name_user = CONCAT('$name','^',name_user),email_user = CONCAT('$email','^',email_user) where sl='$postnum'";
$result=mysql_query($cmd);


	}


if(isset($_GET['post']))
{
		$post=$_GET['post']+1;
		$arr1=array();
$cmd="select * from blog where sl='$post'";
$result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{


//$phone=$row['phone'];
array_push($arr1,$row);

}



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



<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<style type="text/css">
input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    max-width: 400px;
}

</style>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!-- ----------------ajax scripting for submitting the step 1 form ends here ---------------------------------------------------------- -->
    <script>


      $(document).ready(function(){
$("#commentid").click(function(){
alert();

var name1=$("#name1").val();
var comment1=$("#comment1").val();
var email1=$("#email1").val();
var postnum=$("#postnum").val();


// AJAX Code To Submit Form.
var dataString = 'name1='+name1+'&email1='+email1+'&comment1='+comment1+'&postnum='+postnum+
'&comment_now='+1;
alert(dataString);
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "blogsingle.php?",
data: dataString,
cache: false,
success: function(result){
$('#main_container').html(div);
}
});

return false;
});
});



		</script>
</head>
<body>
<div class="banner-bg two" id="home" style="background-image: url('http://www.solarpanelsxpert.com/image/banner.jpg')">	
	  <div class="container">
			 <div class="header">
			     <div class="logo">
						<a href="index.html"><h1>Go solar</h1><span>Change Your Energy<span></a>
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
						 <li><a href="blog.php">blog</a></li>   
						<li><a href="contact.html">CONTACT</a></li>
					  </ul>
					
				 </div>
				 <div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- blog section starts here ================================================================== -->

						<div class="container" id="main_container" style="">
  <h1 style=" text-transform: uppercase;
    margin-top: 44px;
    font-size: 23px;">Our blogs</h1>

  <div class="row" style="margin-top:123px">
  	<div class="col-sm-8" style="font-size:18px;margin-bottom:52px;color: #EA9A05;">
  		<?php 
  							echo $arr1[0]['subject'];


  			?>
  	</div>

</div>

  <div class="row">
    <div class="col-sm-4" style="border">

<img src="<?php 
  							echo $arr1[0]['pic'];
  							?>

  							" class="img-responsive" style="max-width:325px">

    </div>
    <div class="col-sm-8" style=";border:groove 2px orange;padding:34px;">

    		<?php 
  							echo $arr1[0]['content1'];




  							?>




    </div>
  </div>

  <?php 
$arr_comments1=array();
$arr_comments=array();
$cmd="select * from blog where sl='$post'";
$result=mysql_query($cmd);
while($row=mysql_fetch_array($result))
{


//$phone=$row['phone'];
array_push($arr_comments1,$row);

}

$arr_comments=explode('^',$arr_comments1[0]['comment1']);
$arr_name=explode('^',$arr_comments1[0]['name_user']);
$arr_email=explode('^',$arr_comments1[0]['email_user']);
  for($k=0;$k<sizeof($arr_comments);$k++)
  { ?>
  <div class="row">
    <div class="col-sm-4" style="border">



    </div>
    <div class="col-sm-8" style=";padding:8px;">

   
    			    <div class="col-sm-3" style="padding:8px;">
    			    	<img src="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-fill-circle-512.png" width='50'>
    			    	<br>
    			    	by-<span style='text-decoration:italic;color:grey;font-size:10px;'>
<?php 
  							echo $arr_name[$k];
  							if(!is_null($arr_email[$k]))
  								echo '('.$arr_email[$k].')';




  							?>
    			    </span>
    			    </div>
    			    <div class="col-sm-9" style="padding:8px;">
	<?php 
  							echo $arr_comments[$k];




  							?>
    			    </div>



    </div>


  </div>
  							<?php } ?>
  							<!--- here comes the comment wala row section  ===================================== -->

  				  <div class="row" style="margin-top:103px">
  				  	<h5 style="color:grey">User comments </h5>
  			<div class="col-sm-8">
  				<form action="" method="post">
  					<input type="text" id="postnum" name="postnum" value="<?php echo $post; ?>" style='display:none'> 
			<input type="text" id="name1" name="name1" style="width:70%;max-width:600px;height:30px" class="textbox" value=" Your Name" onfocus="this.value = '';" ><br><br>
			<input type="text" id="email1" name='email1' style="width:70%;max-width:600px;height:30px" class="textbox" value="Your E-Mail" onfocus="this.value = '';"><br><br>
										<div class="clearfix"> </div>
		 <div>
				<textarea name="comment1"  id='comment1' style="width:70%;max-width:600px;height:100px" value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Message ';}">Your Message</textarea>
	  </div>	
  <div class="submit"> 
	  	<input type="button" id="commentid" value="SEND " style="    background-color: orange;
    color: white;
    padding: 4px;border:none" />
					     </div>
						</form>
  				</div>

								</div>










  							<!-- comment wala row section ends here ===================================== -->



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