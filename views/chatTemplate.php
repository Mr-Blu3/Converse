<?php
	if (!isset($_SESSION['username'])){
		header('location: ../');
	}
	$title = $_SESSION["username"] . "'s chat page";
	include '_top.php';
?>

	<div id="table_wrapper">
		
		<div id="friend_message_chat"><?=$friendname?></div>
		
		<div id="friend_message_form">
			<form method="post" action="./sendmessage">
				<input type="hidden" name="chat_id" value="<?=$receiver?>">
				<input type="hidden" name="chat_name" value="<?=$friendname?>">
				<textarea name="chattext" rows="2" cols="50" maxlength="1000" autofocus></textarea><input type="submit" value="send">
			</form>
		</div>
		<?php
			if(isset($_GET["empty"])){
				echo "<div class='error'>You need to write something first.</div>";
			}
			
			foreach($messages as $message){
				echo "<div class='friend_message_wrapper'>";
					echo "<div class='friend_message_name'>" . $message["username"] . "</div>";
					echo "<div class='friend_message_text'>" . nl2br($message["content"]) . "</div>";
					echo "<div class='friend_message_time'>" . $message["time"] . "</div>";
				echo "</div>";
			}
		?>
	
	</div>
	
<?php include '_bottom.php'; ?>