<?php
	session_start();	
	$token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
	
	 if($_POST['pwbtn'])
	 {
		if($_POST['pw'] == "getdrunk123")
		{
			$_SESSION['login'] = 1;
			header( 'Location: http://chrislangiswillnotsurvive.com/index.php' ) ;
		}
	 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Langis May Not Survive This</title>

<!-- CSS Sheet  --> 
<link href="style.css" rel="stylesheet" type="text/css" />

<!-- Lava Lamp Navigation  -->
<link rel="stylesheet" href="lavalamp.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#1, #2, #3").lavaLamp({
                fx: "backout",
                speed: 800,
                click: function(event, menuItem) {
                    return true;
                }
            });
        });
    </script>
    
<!-- Sliding Gallery Navigation  -->
	<script type="text/javascript" src="js/easySlider1.5.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true,
				continuous: true 
			});
		});	
	</script>
        
	<!-- 2. Start Meta and links -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css">
	/* For Mozilla only: create rounded corners */
	#box {
	  -moz-border-radius: 10px 10px 10px 10px;
	}
	</style>
    
</head>

<body>



<div id="container">
<div id="wrapper">
  <!-- Begin Top Bar  -->
<div id="topbar">

  <!-- Begin LavaLamp Navigation  -->
  <div id="nav"><ul class="lavaLampWithImage" id="1">
        <li class="current"><a href="index.php">Home</a></li>
		<li><a href="whoscoming.php">RSVP</a></li>
        <li><a href="classic.php">Classic Langis</a></li>
        
        <!--<li><a href="events.html">Events</a></li>--->
        <!--<li><a href="contacts.html">Contact Matt</a></li>-->
      </ul>
  </div>
  <!-- End LavaLamp Navigation  -->
  
</div>
<!-- End Top Bar  -->

<!-- Begin Header  -->
<div id="header"><div id="slider">
			<ul>				
				<li><a href="#"><img src="images/header1.png" alt="" border="0" /></a></li>
				<li><a href="#"><img src="images/header2.png" alt="" border="0" /></a></li>
				<li><a href="#"><img src="images/header3.png" alt="" border="0" /></a></li>
				<li><a href="#"><img src="images/header4.png" alt="" border="0" /></a></li>
				<li><a href="#"><img src="images/header5.png" alt="" border="0" /></a></li>
			  <!--<li><a href="#"><img src="images/header3.jpg" alt="" border="0" /></a></li>	-->
			</ul>
  </div></div>
<!-- End Header  -->


<!-- Begin Content  -->
<div id="content">
  <div id="welcome">
    
	<h2>What's the Password</h2>
	<br/>
	 <form enctype="multipart/form-data" action="login.php" method="POST">
		<input name="pw" type="password" />
		
		 <input type="submit" value="Let me in" name="pwbtn" />
	 </form> 
	 
	 <br />
	 	 
	 <?php
		 if($_POST['pwbtn'])
		 {
			if($_POST['pw'] != "getdrunk123")
			{
				echo('<font color="red">Incorrect password, contact Matt Langis for the correct one.</font>');
			}
		 }
	 ?>
  </div>
  
  <div id="latestnews">
  </div>
</div>
<!-- End Content  -->
</div>
</div>

<!-- Begin Footer1  -->
<div id="footer1">
  <div id="footer1content">
    <!--<div id="corporateinfo"><div style="width:60px; float:left;"><img src="images/icon5.png" width="48" height="50" alt="" /></div>
    <div style="width:220px; float:left;"><h5>Corporate Info</h5>
    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nula facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril.</div></div>
    <div id="recentnews">
      <div style="width:60px; float:left;"><img src="images/icon5_.png" width="49" height="50" alt="" /></div>
    <div style="width:220px; float:left;">
      <h5>Recent News</h5>
    • <a href="#">Autem vel eum iriure dolor in henderit</a><br />
    • <a href="#">Vel illum dolore eu feugiat nula</a><br />
    •  <a href="#">Facilisis at vero eros et accumsan et</a><br />
    •  <a href="#">Lusto odio dignissim qui blandit</a><br />
    •     <a href="#">Praesent luptatum zzril in vulputate</a><br />
    • <a href="#">Velit esse molestie consequat.</a></div></div>
    <div id="connect">
      <h5>Connect With Us</h5>
      <br /><img src="images/icon6.png" alt="" width="39" height="49" class="leftimage" /><img src="images/icon7.png" alt="" width="46" height="49" class="leftimage" /><img src="images/icon8.png" alt="" width="52" height="49" class="leftimage" /><img src="images/icon9.png" alt="" width="34" height="49" class="leftimage" /> </div>-->
  </div>
</div>
<!-- End Footer1  -->

<!-- Begin Footer2  -->
<div id="footer2">
  <div id="footer2content">
    <div style="width:300px; float:left;">© Copyright <a href="http://websitesforcures.org">Websites for Cures</a>. All Rights Reserved </div><div style="width:400px; float:right; text-align: right;">•  <a href="index.php">Home</a> •  <a href="whoscoming.php">RSVP</a> •  <a href="index.php">Class Langis</a> • </div></div>
</div>
<!-- End Footer2  -->
</body>
</html>
