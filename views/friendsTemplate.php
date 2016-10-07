<?php
	if (!isset($_SESSION['username'])){
		header('location: ./');
	}
	$title = $_SESSION["username"] . "'s friends</title>";
	include '_top.php';
?>

	<div id="table_wrapper">
	
		<div id="search">
			<form method="post" action="./friends/search">
				<input type="text" placeholder="search" name="search" maxlength="30"  /><button><img src="./views/img/search_icon.png" /></button>
			</form>
		</div>
			
		<div id="friend_wrapper">
		
			<?php
				if(isset($_GET["empty"])){
					echo "<div class='error'>You need to write something first.</div>";
				}
				if(isset($_GET["double"])){
					echo "<div class='error'>Trying to be friends with yourself? Really?</div>";
				}
				if(isset($_GET["already"])){
					echo "<div class='error'>You two are already friends.</div>";
				}
				foreach ($result as $friend){
			?>
			
			<div class="friend_list">
				<form method="post" action="./friends/chat">
					<input type="hidden" name="chat_id" value="<?=$friend['friend_id'];?>">
					<input type="hidden" name="chat_name" value="<?=$friend['username'];?>">
					<button><img src="<?=$friend['avatar'];?>"></button>
					<div class="friend_list_name"><?=$friend["username"]?></div>
					<input type="submit" name="chat" value="chat"/>
				</form>
			</div>
			
			<?php
				}
			?>
		
		</div>
	
	</div>
	
<?php include '_bottom.php'; ?>