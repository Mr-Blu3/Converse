<?php
	$root = "http://89.45.226.90/Converse/";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Let's Converse | <?=$title?></title>
		<script src="<?=$root?>views/js/jquery-2_1_1.js" type="text/javascript"></script>
		<script src="<?=$root?>views/js/script.js" type="text/javascript"></script>
		<link href="<?=$root?>views/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="<?=$root?>views/css/login.css" rel="stylesheet" type="text/css" />
		<link href="<?=$root?>views/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?=$root?>views/css/smaller.css" rel="stylesheet" media="screen and (max-width: 800px)" type="text/css" />
	</head>
	<body>
	
		<table class="table">
			<tr>
				<td>
					
					<div id="cover">
						
						<div id="cover_wrap">
					
						<table class="table">
							<tr>
								<td width="50%">
									<div id="logo_wrapper">
										<div id="logo"><a href="<?=$root;?>start">Let's Converse</a></div>
										<div id="logo_random"></div>
									</div>
								</td>
								<td width="50%" align="right">
									<div id="user_wrapper">
										<div id="user_name">
											<?php echo $_SESSION["username"]; ?><br/>
										</div><div id="user_image">
											<img src="<?=$_SESSION["avatar"];?>" />
										</div>
									</div>
								</td>
							</tr>
						</table>
						
						</div>
					
					</div>
					
					<div id="menu"></div>
					
				</td>
			</tr>
			<tr>
				<td id="table_content" valign="top">
