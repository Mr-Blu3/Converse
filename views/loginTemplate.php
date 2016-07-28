<?php
	if(isset($_SESSION['username'])){
		header('location: ./start');
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Fredrik, Pontus, Xia" />
		<title>Let's Converse | Welcome</title>
		<script src="./views/js/jquery-2_1_1.js" type="text/javascript"></script>
		<script src="./views/js/script.js" type="text/javascript"></script>
		<link href="./views/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="./views/css/style.css" rel="stylesheet" type="text/css" />
		<link href="./views/css/smaller.css" rel="stylesheet" media="screen and (max-width: 800px)" type="text/css" />
	</head>
	<body>
	
		<table cellpadding="0" cellspacing="0" width="100%" height="100%">
			<tr>
				<td id="frontpage_cover">
						
					<div id="frontpage_cover_topic">
						<a href="./">Let's Converse</a><br/>
					</div>
					<div id="frontpage_cover_text">
						For the conversationalist inside you.<br/>
					</div>
					
				</td>
			</tr>
			<tr>
				<td height="100%" valign="top" id="frontpage_table_content">
					
					<div id="frontpage_form_wrapper">
						<div id="frontpage_form_content">
							<div id="frontpage_topic">
								<table cellpadding="0" cellspacing="0" width="100%" height="100%">
									<tr>
										<td width="50%">
											<div id="frontpage_topic_on" onclick="show('frontpage_form_login')">
												Login
											</div>
										</td>
										<td>
											<div id="frontpage_topic_off" onclick="show('frontpage_form_register')">
												Register
											</div>
										</td>
									</tr>
								</table>
							</div>
							<div id="frontpage_form_login">
								<div class="frontpage_form">
									<form method="post" action="./user/login">
										<input type="text" name="username" placeholder="username" />
										<input type="password" name="password" placeholder="password" />
										<input type="submit" name="submit_login" value="login" />
									</form>
								</div>
							</div>
							<div id="frontpage_form_register" style="display:none;">
							
								<div class="frontpage_form">
									<div id="frontpage_info">
										Please provide all of the following to successfully register.<br/>
									</div>
									<form method="post" action="./user/register">
										<input type="email" name="email" placeholder="email" />
										<input type="text" name="username" placeholder="username" />
										<div id="frontpage_form_radio">
											<label><input type="radio" value="http://www.converse-dev.tk/views/img/default_male.png" name="avatar" id="male">Male</label>
											<label><input type="radio" value="http://www.converse-dev.tk/views/img/default_female.png" name="avatar" id="female">Female</label>
											<label><input type="radio" value="http://www.converse-dev.tk/views/img/default_none.jpg" name="avatar" id="none" checked>n/a</label>
											<!--
											<label><input type="radio" value="0" name="avatar" id="male">Male</label><br/>
											<label><input type="radio" value="1" name="avatar" id="female">Female</label><br/>
											<label><input type="radio" value="2" name="avatar" id="none" checked>n/a</label><br/>
											-->
										</div>
										<input type="password" name="password" placeholder="password" />
										<input type="password" name="re_password" placeholder="re-type password" />
										<input type="submit" name="submit_register" value="register" />
									</form>
								</div>
							
							</div>
						</div>
					</div>
					
				</td>
			</tr>
			<tr>
				<td>
					<div id="footer">
						<a href="./contact/front">The Upplanders</a> © 2015<br/>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>