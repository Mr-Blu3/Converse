<?php

	if (!isset($_SESSION['username'])) header('location: ./');
	

	$title = $_SESSION["username"] . "'s wall";
	include '_top.php';
?>

	<div id="table_wrapper">
	
		<?php
			foreach ($user as $row){
				$username = $row["username"];
				$status = $row["status"];
				$time = $row["status_time"];
				$avatar = $row["avatar"];
				if($status != ""){?>
				
				<div class="friends_status_wrapper">
					<div class="friends_status_avatar"><img src="<?php echo $avatar; ?>" /></div>
					<div class="friends_status_name"><?=$username?></div>
					<div class="friends_status_feed"><?=nl2br($status)?></div>
					<div class="friends_status_time"><?=$time?></div>
				</div>
				
			<?php }}
		?>
	
	</div>
	
<?php include '_bottom.php'; ?>