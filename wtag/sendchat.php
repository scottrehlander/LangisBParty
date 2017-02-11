<?php
session_start();
header("Expires: Sat, 05 Nov 2005 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: text/xml; charset=UTF-8");

/*
Copyright &copy; 2008-2011 http://www.phpcandy.com
Contact: contact@phpcandy.com

This file is part of wTag mini chat - shoutbox.

wTag is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

wTag is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with wTag.  If not, see <http://www.gnu.org/licenses/>.
*/

// Configuration file is required.
require_once("conf.php");

// Check if the fields are not empty
// Check if name, url or message are not longer than the maximum length allowed
// For security and spam protection reasons check if $_POST['token'] has the same value as $_SESSION['token']
if (((isset($_POST['name']))
    && (trim($_POST['name'] !== "" ))
    && (trim($_POST['name'] !== "name" ))
    && (strlen($_POST['name']) < 26))
    && ((isset($_POST['url']))
    && (strlen($_POST['url']) < 100))
    && ((isset($_POST['message']))
    && (trim($_POST['message']) !== "" )
    && (trim($_POST['message']) !== "message" )
    && (strlen($_POST['message']) < 400))
    && (isset($_SESSION['token'])
    && $_POST['token'] == $_SESSION['token'])) {

    $name = $_POST['name'];
    $url = trim($_POST['url']);

    if ((strstr($url, 'http://') && strlen($url) == 7) || $url == "") {
    
    unset($url);
   
    }
  
    $msg=$_POST['message'];
 

    // Get a sender IP (it will be in use in the next wTag version)
    $remote = $_SERVER["REMOTE_ADDR"];
    // Store it converted
    $converted_address=ip2long($remote);
   
    
    if (get_magic_quotes_gpc()) {
     
    $name = mysql_real_escape_string(stripslashes($name));
    $url = mysql_real_escape_string(stripslashes($url));
    $msg = mysql_real_escape_string(stripslashes($msg));
    
    }
    
    else {
     
    $name = mysql_real_escape_string($name);
    $url = mysql_real_escape_string($url);
    $msg = mysql_real_escape_string($msg);
      
    }

    // Insert a new message into database
    $sql->query("INSERT INTO wtagshoutbox SET name= '$name', url='$url', message= '$msg', ip='$converted_address', date=now()");

    // Get the id for the last inserted message
    $lastid = $sql->get_id();
   
    // Delete oldest messages
    if ($lastid > 300) {
	
    $sql->query("DELETE FROM wtagshoutbox WHERE messageid <($lastid-20)");
    
    }

    // Retrieve last 20 messages
    $sql->query("SELECT date, name, url, message FROM wtagshoutbox WHERE messageid <= $lastid ORDER BY messageid DESC LIMIT 20");

    }

    else

    {
    // Just retrieve last 20 messages
    $sql->query("SELECT date, name, url, message FROM wtagshoutbox ORDER BY messageid DESC LIMIT 20");
       
    }


include_once("response.php");
?>