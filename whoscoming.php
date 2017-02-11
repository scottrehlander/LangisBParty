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

<?php
		
			if($_POST['submit'])
			{
				$DBhost = "db415607913.db.1and1.com";
				$DBuser = "dbo415607913";
				$DBpass = "langis123";
				$DBName = "db415607913";
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
				
				// RSVP Table
				mysql_select_db($DBName) or die("Unable to select database $DBName");
				
				$sql = "INSERT INTO rsvps (rsvpName, rsvpStatus, password) VALUES ('" . 
					$_POST['submittor'] . "', " . 
					$_POST['grp1'] . ", '" . 
					$_POST['password'] . "')";
				
				$results = mysql_query($sql);				
				
				echo("Your name should now be in the list to the left.<br /><br />");
			}
			$changeError = "";
			if($_POST['change'])
			{
				$DBhost = "db415607913.db.1and1.com";
				$DBuser = "dbo415607913";
				$DBpass = "langis123";
				$DBName = "db415607913";
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
				
				// RSVP Table
				mysql_select_db($DBName) or die("Unable to select database $DBName");
				
				$foundUser = false;
				$sql = "SELECT * FROM rsvps WHERE rsvpName = '" . $_POST['submittor'] . "' AND password = '" . $_POST['password'] . "'";
				
				$results = mysql_query($sql) or die(mysql_error());				
				while($row = mysql_fetch_array( $results )) {
					$foundUser = true;
				}
				
				if($foundUser == false)
				{
					$changeError = "The entered username and password combo were not found.  Please try again or contact Matt Langis if you are having troubles.";
				}
				else
				{
					$sql = "UPDATE rsvps SET rsvpStatus = " . $_POST['grp1'] . " WHERE rsvpName = '" . $_POST['submittor'] . "'";
					
					$results = mysql_query($sql) or die(mysql_error());				
					
					//echo("Your updated RSVP should now be in the list");
				}
			}
		?>

<div id="container">
<div id="wrapper">
  <!-- Begin Top Bar  -->
<div id="topbar">

  <!-- Begin LavaLamp Navigation  -->
  <div id="nav"><ul class="lavaLampWithImage" id="1">
        <li><a href="index.php">Home</a></li>
		<li class="current"><a href="whoscoming.php">RSVP</a></li>
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
    <h2>Who's Coming?</h2>
	
	<?php require("rsvp.php"); ?>

	
	
		 <br/><br/>
		
	
	
	
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	
	<!--<h2>Post image</h2>
	 <form enctype="multipart/form-data" action="whoscoming.php" method="POST">
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
				//echo "Sorry, there was a problem uploading your file."; 
			 } 
		 } 
	 ?>  
  </div>
  
  <div id="latestnews">
	
		<?php
			if($_POST['submit'])
				echo("<h1>Time to Kill It</h1>");
			else
				echo("<h1>RSVP Now</h1>");
		?>
		
		<h4>Please RSVP ASAP by entering your name and a password.</h4>
		
		<br />
	
		
	
		 <form enctype="multipart/form-data" action="whoscoming.php" method="POST" <?php if($_POST['submit']) { echo('style="display:none"'); } ?>>
		 
			 <table>
				<tr>
				<td>
					Your Name: 
				</td>
				<td>
					<input name="submittor" type="text" /><br />
				</td>
				</tr>
				<tr>
				<td>
					Create a Password:
				</td>
				<td>
					<input name="password" type="password" /><br />
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="radio" name="grp1" value="1" checked />I'm Coming
					<input type="radio" name="grp1" value="0" />I'm NOT Coming </br/>
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<center><input type="submit" value="Submit" name="submit" /></center>
				</td>
				</tr>
			</table>
		 </form> 
		  
				
		<br /><br />

			
		<h1>Change RSVP</h1>
		<h4>If you already RSVP'd, you can change it here by entering your name and the password you used when RSVP'ing.</h4>
		
		<?php
		 	
			if($changeError != "")
			{
				echo('<font color="red">' . $changeError . '</font>');
			}
		
		?>
		
		<br />
		
		 <form enctype="multipart/form-data" action="whoscoming.php" method="POST" >
		 
			 <table>
				<tr>
				<td>
					Your Name: 
				</td>
				<td>
					<input name="submittor" type="text" /><br />
				</td>
				</tr>
				<tr>
				<td>
					Password:
				</td>
				<td>
					<input name="password" type="password" /><br />
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="radio" name="grp1" value="1" checked />I'm Coming
					<input type="radio" name="grp1" value="0" />I'm NOT Coming </br/>
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<center><input type="submit" value="Submit" name="change" /></center>
				</td>
				</tr>
			</table>
		 </form> 
	
  
    
    <!--<p><img src="images/pic01.gif" alt="" width="67" height="67" vspace="5" class="leftimage" /><span class="smalltitle">Autem vel eum iriure dolor in</span> hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu.<span class="smalltitle"> <a href="#">More</a></span><img src="images/arrow.png" width="11" height="10" alt="" /></p>
    <p><img src="images/pic02.gif" alt="" width="67" height="67" vspace="5" class="leftimage" /><span class="smalltitle">Autem vel eum iriure dolor in</span> hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu.<span class="smalltitle"> <a href="#">More</a></span><img src="images/arrow.png" width="11" height="10" alt="" /></p>
    <p><img src="images/pic01.gif" alt="" width="67" height="67" vspace="5" class="leftimage" /><span class="smalltitle">Autem vel eum iriure dolor in</span> hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu.<span class="smalltitle"> <a href="#">More</a></span><img src="images/arrow.png" width="11" height="10" alt="" /></p>-->
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
