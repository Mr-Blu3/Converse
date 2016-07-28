<?php
	if (!isset($_SESSION['username'])){
		header('location: ./');
	}
	$title = $_SESSION["username"] . "'s account info";
	include '_top.php';
?>

	<div id="table_wrapper">
		
		<div class="table_form_info">
			Change your information.<br/>
		</div>
				
		<div class="table_form_wrapper">
			<form method="post" action="./account/save">
				<input type="email" name="email" placeholder="email" />
				<input type="submit" name="submit_updatemail" value="save" />
			</form>
			<?php
				if(isset($_GET["mail_fail"])){
					echo "<div class='error'>Du glömde fylla i din mail.</div>";
				}
				if(isset($_GET["mail_success"])){
					echo "<div class='error'>Ändringen sparades.</div>";
				}
			?>
		</div>
		<div class="table_form_wrapper">
			<form method="post" action="./account/save">
				<input type="text" name="username" placeholder="username" />
				<input type="submit" name="submit_updateuser" value="save" />
			</form>
			<?php
				if(isset($_GET["name_fail"])){
					echo "<div class='error'>Du glömde fylla i ett användarnamn.</div>";
				}
				if(isset($_GET["name_success"])){
					echo "<div class='error'>Ändringen sparades.</div>";
				}
			?>
		</div>
		<div class="table_form_wrapper">
			<form method="post" action="./account/save">
				<input type="password" name="password" placeholder="password" />
				<input type="password" name="re_password" placeholder="re-type password" />
				<input type="submit" name="submit_updatepass" value="save" />
			</form>
			<?php
				if(isset($_GET["pass_empty"])){
					echo "<div class='error'>Lösenordet får inte vara tomt.</div>";
				}
				if(isset($_GET["pass_fail"])){
					echo "<div class='error'>Du måste skriva samma lösenord två gånger.</div>";
				}
				if(isset($_GET["pass_success"])){
					echo "<div class='error'>Ändringen sparades.</div>";
				}
			?>
		</div>
		
	</div>
	
<?php include '_bottom.php'; ?>