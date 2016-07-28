<?php
	if (!isset($_SESSION['username'])){
		header('location: ./');
	}
	$title = "Footbook | Contact";
	include '_top.php';
?>

	<div id="table_wrapper">
		
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
	
<?php include '_bottom.php'; ?>