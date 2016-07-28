<?php
	if (isset($_SESSION['username'])){
		header('location: ./start');
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Fredrik, Pontus, Xia" />
		<title>Let's Converse | Welcome</title>
		<script src="./../views/js/jquery-2_1_1.js" type="text/javascript"></script>
		<script src="./../views/js/script.js" type="text/javascript"></script>
		<link href="./../views/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="./../views/css/style.css" rel="stylesheet" type="text/css" />
		<link href="./../views/css/smaller.css" rel="stylesheet" media="screen and (max-width: 800px)" type="text/css" />
	</head>
	<body>
	
		<table cellpadding="0" cellspacing="0" width="100%" height="100%">
			<tr>
				<td id="frontpage_cover">
						
					<div id="frontpage_cover_topic">
						<a href="../">Let's Converse</a><br/>
					</div>
					<div id="frontpage_cover_text">
						For the conversationalist inside you.<br/>
					</div>
					
				</td>
			</tr>
			<tr>
				<td height="100%" valign="top" id="frontpage_table_content">
					
					<div id="frontpage_about">
						<div id="about_title">
							About us
						</div>
						<div id="about_topic">
							Back-End & Front-End Developers<br/>
						</div>
						
						<div class="about_text">
							<h3>Fredrik Sevesten</h3>
							Front-End developer with a trained eye for design.
						</div>
						<div class="about_text">
							<h3>Pontus Pettersson</h3>
							Proffesional Back-End developer, highly motivated and comes with a burning energy to complete any task without complications.
						</div>
						<div class="about_text">
							<h3>Xia Yan</h3>
							Proffesional, high-quality Back-End developer with that extra passion and cutting-edge skills.
						</div>
					</div>
				
				</td>
			</tr>
			<tr>
				<td>
					<div id="footer">
						The Upplanders © 2015<br/>
					</div>
				</td>
			</tr>
		</table>
		
	</body>
</html>