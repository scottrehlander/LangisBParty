<?php
	session_start();
			
	if($_SESSION['login'] != 1)
		header( 'Location: http://chrislangiswillnotsurvive.com/login.php' ) ;
		
	$token = md5(uniqid(rand(), true));
	$_SESSION['token'] = $token;
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
    <h2>Need to Know</h2>
	
	<h3>June 1st - June 3rd</h3>
	<p>$75 per person includes beer, food, and rent for the place from Friday night until Sunday morning.</p>
	<p>Matt and Chris will be leaving from Mass. at 3pm on Friday so you can come anytime after then.</p>
	<p>If you want to drink anything other than the keg or bring other food feel free.  Also, bring a sleeping bag
	or air mattress because there's probably going to be about 18 of us.  Bring some extra cash for games such as Poker, Washer Boards, Pool, Darts, etc..</p>
	<p>Let Matt Langis know if you have any questions/ideas/stuff to do/or if you know anything that will cause
	Chris any physical harm.  Please RSVP on this site ASAP.</p>
	
	<br />
	
	<h3>Address</h3>
	<p>18 Eureka Ave, York, ME</p>
	
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+eureka+ave,+york,+me&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.320439,75.9375&amp;ie=UTF8&amp;hq=&amp;hnear=18+Eureka+Ave,+York,+Maine+03909&amp;ll=43.142675,-70.628634&amp;spn=0.008862,0.018539&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+eureka+ave,+york,+me&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=39.320439,75.9375&amp;ie=UTF8&amp;hq=&amp;hnear=18+Eureka+Ave,+York,+Maine+03909&amp;ll=43.142675,-70.628634&amp;spn=0.008862,0.018539&amp;t=m&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
	
	<!--<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	
	<h2>Post image</h2>
	 <form enctype="multipart/form-data" action="index.php" method="POST">
		Your Name: 
		<input name="submittor" type="text" /><br />
		Image Title: 
		<input name="imageTitle" type="text" /><br />
		 Please Choose a File: 
		 <input name="uploaded" type="file" /><br />
		 <input type="submit" value="Upload" name="upload" />
	 </form> -->
	 
	 <?php 
		 $target = "upload/"; 
		 $target = $target . basename( $_FILES['uploaded']['name']) ; 
		 $ok=1; 
		 
		 //This is our size condition 
		 if ($uploaded_size > 350000) 
		 { 
			 echo "Your file is too large.<br>"; 
			 $ok=0; 
		 } 
		 
		 //This is our limit file type condition 
		 if ($uploaded_type =="text/php") 
		 { 
			 echo "No PHP files<br>"; 
			 $ok=0; 
		 } 
		 
		 //Here we check that $ok was not set to 0 by an error 
		 if ($ok==0) 
		 { 
			echo "Sorry your file was not uploaded"; 
		 } 
		 
		 //If everything is ok we try to upload it 
		 else 
		 { 
			 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
			 { 
				echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
			 
				$DBhost = "db415607913.db.1and1.com";
				$DBuser = "dbo415607913";
				$DBpass = "langis123";
				$DBName = "db415607913";
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
				
				// RSVP Table
				mysql_select_db($DBName) or die("Unable to select database $DBName");
				
				$sqlquery = "INSERT INTO images (imageSubmittor, imageLocation, imageTitle) VALUES ('" . $_POST['submittor'] . "', '" . $target . "', '" . $_POST['imageTitle'] . "')";
				$results = mysql_query($sqlquery);
			 
			 } 
			 else 
			 { 
				echo "Sorry, there was a problem uploading your file."; 
			 } 
		 } 
	 ?>  
  </div>
  
  <div id="latestnews">
    
		<h4>What do you think about Langis?</h4>
	
			<iframe src="minichat.php" width="297px" height="245px"></iframe> 
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
