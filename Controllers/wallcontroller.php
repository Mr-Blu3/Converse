<?php 
	
	class wallController{
		
		public function indexAction(){
			require_once './config.php';

			$sql = $dbh->prepare("
				SELECT *
				FROM user
				LEFT JOIN friend
				ON user.user_id = friend.friend_id
				WHERE subject = " . $_SESSION["user_id"] . "
				ORDER BY status_time DESC
				");

			$sql->execute();
			
			$user = $sql->fetchAll(PDO::FETCH_ASSOC);
			
			require_once "./views/wallTemplate.php";
		}
	}
	
?>