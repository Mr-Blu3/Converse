<?php 
	
	class profileController{

		public function indexAction(){
			require_once './config.php';
			$stm = $db->prepare("SELECT * FROM user WHERE user_id = " . $_SESSION["user_id"] . "");
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row){
				$status = $row["status"];
				$status_time = $row["status_time"];
			}
			require_once './views/profileTemplate.php';
		}
		
		public function updateAction(){
			require_once './config.php';
			if(!empty($_POST["statustext"])){
				$update = $db->prepare("UPDATE user SET status = :status, status_time = NOW() WHERE user_id = " . $_SESSION["user_id"] . "");
				$update->execute(array(
					":status"=> htmlentities($_POST["statustext"])
				));
				header("location: ../profile");
			}
			else{
				header('location: ../profile?fail');
			}
		}
		
		public function deleteAction(){
			require_once './config.php';
			if(isset($_POST["submit_delete"])){
				$reset = $db->prepare("UPDATE user SET status = NULL, status_time = NULL WHERE user_id = " . $_SESSION["user_id"] . "");
				$reset->execute();
				header ("location: ../profile?deleted");
			}
		}
	}

?>