<?php

define('INCLUDE_CHECK',1);
require "scripts/functions.php";
require "scripts/connect.php";



	
//fetch the timeline
$q = mysql_query("SELECT * FROM forum ORDER BY ID DESC");

$timeline='';
while($row=mysql_fetch_assoc($q))
{
	$timeline.=formatTweet($row['tweet'],$row['dt']);
}


// fetch the latest tweet
$lastTweet = '';
list($lastTweet) = mysql_fetch_array(mysql_query("SELECT tweet FROM forum ORDER BY id DESC LIMIT 1"));

if(!$lastTweet) $lastTweet = "You don't have any tweets yet!";



?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CampusCafe</title>
		<style type="text/css" media="all">
			@import "css/style.css";
		</style>


		<link rel="stylesheet" type="text/css" href="css/forum.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/forum.js"></script>

	</head>
	<body>
		<div id="container">
			<div id="nav">

				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td width="116"><a href="#"><img src="images/logo.png" width="116" height="70" border="0" alt="Campus Cofe Home" id="logo" class="png"></a></td>
							<td>
							<div id="menu">
								<ul class="tabs">
									<li>
										<a href="smartCafe.php" onmouseover="cafe.src='images/cafe2.png';" onmouseout="cafe.src='images/cafe1.png';" class="png"> <img src="images/cafe1.png" alt="cafe" name="cafe" width="117" height="67" border="0" id="cafe" class="png"/  > </a>
									</li>
									<li>
										<a href="forum.php" onmouseover="forum.src='images/forum2.png';" onmouseout="forum.src='images/forum1.png';" class="png"> <img src="images/forum1.png" alt="forum" name="forum" width="85" height="67" border="0" id="forum" class="png"/ > </a>
									</li>

									<li>
										<a href="myStatus.php" onmouseover="status.src='images/status2.png';" onmouseout="status.src='images/status1.png';" class="png"> <img src="images/status1.png" alt="MyStatus" name="status" width="117" height="67" border="0" id="status" class="png"/ > </a>
									</li>
								</ul>
							</div></td>

						</tr>
					</tbody>
				</table>
			</div>
			<div id="content">
				<div id="top"></div>

				<div id="middle-container">
					<div id="middle">
					<div id="twitter-container">
					<form id="tweetForm" action="scripts/submit.php" method="post">
						<span class="counter">200</span>
						<label for="inputField">Please input your reviews.</label>

						<textarea name="inputField" id="inputField" tabindex="1"rows="2" cols="40"></textarea>
						<input class="submitButton inact" name="submit" type="submit" value="submit" />

						<span class="latest"><strong>Latest: </strong><span id="lastTweet"><?=$lastTweet?></span></span>

						<div class="clear"></div>
					</form>

					<h3 class="timeline">Reviews</h3>

					<ul class="statuses"><?php echo $timeline ?></ul>


					</div>
					</div>


				</div>

				<div id="bot">
					COEN 276 2012 Fall.  Group P.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Contact Us</a>&nbsp;&nbsp;&nbsp;
				</div>

			</div>
		</div>

	</body>
</html>
