<?php
	if (!isset($_SESSION['username'])){
		header('location: ../');
	}
	$title = "Add friend";
	include '_top.php';
?>
	
	<div id="table_wrapper">
	
		<div id="search">
			<form action="./search" method="post">
				<input type="text" placeholder="search" name="search" maxlength="30" /><button><img src="../views/img/search_icon.png" /></button>
			</form>
		</div>
		
		<div id="friend_wrapper">
		
			<?php
				
				// this part only shows up when a user searches for a friend;
				if(isset($_POST["search"])){
					
					if(!$result){
						echo "<div class='error'>No match.</div>";
					}
					else{
						?>
					
					<div class="friend_list">
						<form method='post' action="./add">
							<button><img src="<?=$friend_avatar?>" /></button>
							<div class="friend_list_name"><?=$friend_name?></div>
							<input type="hidden" name="add_id" value="<?=$friend_id?>" />
							<input type="submit" value="add">
						</form>
					</div>
						
					<?php }
				}
			?>
		
		</div>
	
	</div>
	
<?php include '_bottom.php'; ?>