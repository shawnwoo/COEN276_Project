<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CampusCafe</title>
		<style type="text/css" media="all">
			@import "css/style.css";
		</style>
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
										<a href="#" onmouseover="cafe.src='images/cafe2.png';" onmouseout="cafe.src='images/cafe1.png';" class="png"> <img src="images/cafe1.png" alt="cafe" name="cafe" width="117" height="67" border="0" id="cafe" class="png"> </a>
									</li>
									<li>
										<a href="#" onmouseover="forum.src='images/forum2.png';" onmouseout="forum.src='images/forum1.png';" class="png"> <img src="images/forum1.png" alt="forum" name="forum" width="85" height="67" border="0" id="forum" class="png"> </a>
									</li>

									<li>
										<a href="#" onmouseover="status.src='images/status2.png';" onmouseout="status.src='images/status1.png';" class="png"> <img src="images/status1.png" alt="MyStatus" name="status" width="117" height="67" border="0" id="status" class="png"> </a>
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
					<!-- START: Livefyre Embed -->
					<div id="livefyre-comments"></div>
					<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
					<script type="text/javascript">
						( function() {
								var articleId = fyre.conv.load.makeArticleId(null);
								fyre.conv.load({}, [{
									el : 'livefyre-comments',
									network : "livefyre.com",
									siteId : "315657",
									articleId : articleId,
									signed : false,
									collectionMeta : {
										articleId : articleId,
										url : fyre.conv.load.makeCollectionUrl(),
									}
								}], function() {
								});
							}());
					</script>
					<!-- END: Livefyre Embed -->
				</div>

				<div id="bot">
					COEN 276 2012 Fall.  Group P.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Contact Us</a>&nbsp;&nbsp;&nbsp;
				</div>

			</div>
		</div>

	</body>
</html>
