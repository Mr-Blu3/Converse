<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Fredrik, Pontus, Xia" />
		<title>ERROR</title>
		<link href="./views/css/error.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	
		<table class="table">
			<tr>
				<td height="100%" align="center" valign="middle">
					
					<div id="menu"><a href="./">Converse</a></div>
					
					<?php
						
						$error = "<h1>ERROR</h1>";
						$uhoh = "<h1>UHOH</h1>";
						
						if(isset($_GET["notfound"])){
							echo $error . "
								<div class='error'>
									That page doesn't exist. Yet.<br/>
								</div>
							";
						}
						if(isset($_GET["url"])){
							echo $error . "
								<div class='error'>
									Something borked.<br/>
								</div>
							";
						}
						if(isset($_GET["login_empty"])){
							echo $error . "
								<div class='error'>
									You need to fill out the form correctly.<br/>
								</div>
							";
						}
						if(isset($_GET["login_wrong"])){
							echo $error . "
								<div class='error'>
									Wrong username and/or password.<br/>
									Try again.<br/>
								</div>
							";
						}
						if(isset($_GET["reg_wrong"])){
							echo $error . "
								<div class='error'>
									You need to fill in all forms correctly.<br/>
								</div>
							";
						}

						if(isset($_GET["exist"])) {
							echo $error . "
								<div class='error'>
									Email or username exist.<br/>
								</div>
							";
						}

						if(isset($_GET["reg_nothing"])){
							echo $uhoh . "
								<div class='error'>
									I have no idea what went wrong...<br/>
								</div>
							";
						}
						/*
						if(isset($_GET[""])){
							
						}
						*/
					?>
				</td>
			</tr>
		</table>

	</body>
</html>