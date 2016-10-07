<?php
	if (!isset($_SESSION['username'])){
		header('location: ./');
	}
	$title = $_SESSION["username"] . "'s profile";
	include '_top.php';
?>

	<div id="table_wrapper">
		
		<div id="profile_status_new">
			<form method="post" action="./profile/update">
				<div id="profile_status_text">How are you feeling today?</div>
				<textarea maxlength="300" name="statustext" autofocus></textarea>
				<div id="profile_status_input"><input type="submit" name="submit_update" value="post" /></div>
			</form>
		</div>
		
		<?php
			if(isset($_GET["fail"])){
				echo "<div class='error'>Du lämnade fältet tomt.</div>";
			}
		?>
		
		<div id="profile_status_old">
			<?php echo nl2br($status); ?>
		</div>
		<div id="profile_status_wrapper">
			<div id="profile_status_time">
				<?php echo $status_time; ?>
			</div>
			<!--
			<div id="profile_status_delete">
				<form>
					<input type="submit" name="submit_delete" value="delete" />
				</form>
			</div>
			-->
		</div>
	
	</div>
	
<?php include '_bottom.php'; ?>