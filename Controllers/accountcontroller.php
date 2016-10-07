<?php

require_once './views/accountTemplate.php';

class accountController{
	
	public function indexAction(){
		
	}
	
	public function saveAction(){	
		require './config.php';
		
		if(isset($_POST["submit_updatemail"])){
			$stm = $db->prepare("UPDATE user SET email = :email WHERE user_id = " . $_SESSION["user_id"] . "");
			
			if(!empty($_POST["email"])){
				$updatemail = $stm->execute(array(
					":email" => $_POST["email"]
				));
				header('location: ../account?mail_success');
			}
			else{
				header('location: ../account?mail_fail');
			}
		}
		
		if(isset($_POST["submit_updateuser"])){
			$stm = $db->prepare("UPDATE user SET username = :username WHERE user_id = " . $_SESSION["user_id"] . "");
			
			if(!empty($_POST["username"])){
				$updatemail = $stm->execute(array(
					":username" => $_POST["username"]
				));
				$_SESSION['username'] = $_POST['username'];
				header('location: ../account?name_success');
			}
			else{
				header('location: ../account?name_fail');
			}
		}
		
		if(isset($_POST["submit_updatepass"])){
			$stm = $db->prepare("UPDATE user SET password = :password WHERE user_id = " . $_SESSION["user_id"] . "");
			
			if(!empty($_POST["password"])){
				$password = $_POST["password"];
				$re_pass = $_POST["re_password"];
				if($password == $re_pass){
					$updatepass = $stm->execute(array(
						":password" => $password
					));
					header('location: ../account?pass_success');
				}
				else{
					header('location: ../account?pass_fail');
				}
				
			}
			else{
				header('location: ../account?pass_empty');
			}
			
		}
		
	}
	
}

?>