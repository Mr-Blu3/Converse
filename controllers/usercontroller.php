<?php
	class userController{
	
		public function registerAction(){

			require_once './config.php';
			
			if(empty($_POST["email"]) || empty($_POST["username"]) && empty($_POST["
				password"]) || empty($_POST["re_password"])){

				header('location: '.root.'error?reg_wrong');
			
			} else if($_POST["password"] !== $_POST["re_password"]){
				
				header('location: '.root.'error?reg_wrong');
			
			} else {
			
				$this->AuthUserDB([$_POST["username"], $_POST["email"]], $dbh); 

				$DefaultMess = 'Default Status Message';
				$date = date("Y-m-d H:i:s");
				
				$stm = $dbh->prepare("INSERT INTO user(username, password, email, status, status_time, avatar) VALUES (:username, :password, :email, :status, :status_time, :avatar)");
				
				$result = $stm->execute(array(
					":username" => $_POST["username"],
					":password" => $_POST["password"],
					":email" => $_POST["email"],
					":status" => $DefaultMess,
					":status_time" => $date,
					":avatar" => $_POST["avatar"]
				));

				if($result){
				
					$stz = $db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
					$stz->execute(array(
						":username" => $_POST["username"],
						":password" => $_POST["password"]
					));
					
					if($stz->rowCount() == 1){
						$users = $stz->fetchAll(PDO::FETCH_ASSOC);
						foreach ($users as $row){
							$_SESSION["email"] = $row["email"];
							$_SESSION["username"] = $row["username"];
							$_SESSION["user_id"] = $row["user_id"];
							$_SESSION["avatar"] = $row["avatar"];
						}
						header('location: ../start');
						
					}
				}
			}
		}

		public function loginAction(){
			require_once './config.php';
			require_once './views/loginTemplate.php';
			if(isset($_POST["submit_login"])){
				if(empty($_POST["username"]) && empty($_POST["password"])){
					header('location: '.root.'error?login_empty');
				}
				else{
					$stm = $dbh->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
					$stm->bindParam(":username", $_POST["username"], PDO:: PARAM_STR);
					$stm->bindParam(":password", $_POST["password"], PDO:: PARAM_STR);
					$stm->execute();

					if($stm->rowCount() == 1){
						$users = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($users as $row){
							$_SESSION["email"] = $row["email"];
							$_SESSION["username"] = $row["username"];
							$_SESSION["user_id"] = $row["user_id"];
							$_SESSION["avatar"] = $row["avatar"];
						}
						header('location: ../start');
					}
					else{
						//echo "<div class='error'>Wrong password or username</div>";
						header('location: '.root.'error?login_wrong');
					}
				
				}
			}
		}
		
		public function logoutAction(){	
			
			session_unset();
			session_destroy();
			
			header('location: ../');
		}

		private function AuthUserDB($v_oData, $v_oDb) 
		{
			$oCheck = $v_oDb->prepare("SELECT username, email FROM user");
			$oCheck->execute();

			foreach ($oCheck as $s_v_oCheck => $s_v2oCheck) {	
				foreach ($v_oData as $s_v_oData) {

					if (strtolower($s_v_oData) === strtolower($s_v2oCheck['username'])) {
						
						header('location: '.root.'error?exist');
						
						die;
					}
					
					if (strtolower($s_v_oData) === strtolower($s_v2oCheck['email']))
					{
						header('location: '.root.'error?exist');
						
						die;
					} 

				}
					
			} 	
		}

	}

?>