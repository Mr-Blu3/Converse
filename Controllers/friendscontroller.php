<?php
	
	class friendsController{
		
		public function indexAction(){
			require_once './config.php';
			$receiver = $_SESSION["user_id"];
			//$result = $db->prepare("SELECT count(*) FROM message WHERE receiver = '".$receiver."' AND unread = 0");
			$display_friends = $db->prepare("
				SELECT friend.friend_id, user.username, user.avatar
				FROM friend
				LEFT JOIN user
				ON friend.friend_id = user.user_id
				WHERE subject = " . $_SESSION["user_id"] . "
				ORDER BY username
				");
			
			$display_friends->execute();
			$result = $display_friends->fetchAll(PDO::FETCH_ASSOC);
		
			require_once "./views/friendsTemplate.php";
		}
		
		public function searchAction(){
			require_once './config.php';
			if(empty($_POST["search"])){
				header('location: ../friends?empty');
			}
			else{
				$search = $db->prepare("
					SELECT *
					FROM user
					WHERE username
					LIKE :term
				");
				$search->execute(array(
					":term" => "%" . $_POST["search"] . "%"
				));
				$result = $search->fetchAll(PDO::FETCH_ASSOC);
				
				foreach ($result as $row){
					$friend_id = $row["user_id"];
					$friend_name = $row["username"];
					$friend_status = $row["status"];
					$friend_avatar = $row["avatar"];
					$friend_statustime = $row["status_time"];
				}
				require_once "./views/addTemplate.php";
			}
		}
		
		public function addAction(){
			require_once './config.php';
			if(isset($_POST["add_id"])){
				$_SESSION["add_id"] = $_POST["add_id"];
			}
			$subject = $_SESSION["user_id"];
			$friend_id = $_SESSION["add_id"];
			
			$stz = $db->prepare("
				SELECT *
				FROM friend
				WHERE subject = " . $subject . "
				AND friend_id
				LIKE " . $friend_id . "
			");
			$stz->execute();
			$friend_add = $stz->fetchAll(PDO::FETCH_ASSOC);
			
			if($friend_add){
				header('location: ../friends?already');
			}
			else{
			
				if($subject!=$friend_id){
					$sth = $db->prepare("
						INSERT INTO friend (subject, friend_id)
						VALUES (:subject, :friend_id)
						");
					$sth->execute(array(
						":subject"=>$subject,
						":friend_id"=>$friend_id
					));
					$sth->execute(array(
						":subject"=>$friend_id,
						":friend_id"=>$subject
					));
					header ('location: ../friends');
				}
				else{
					header ('location: ../friends?double');
				}
			}
		}
		
		public function chatAction(){
			require_once './config.php';
			if(isset($_POST["chat_id"])){
				$_SESSION["chat_id"] = $_POST["chat_id"];
				$_SESSION["chat_name"] = $_POST["chat_name"];
			}
			$sender = $_SESSION["user_id"];
			$receiver = $_SESSION["chat_id"];
			$friendname = $_SESSION["chat_name"];
			
			$stm = $db->prepare("
				UPDATE message
				SET unread=1
				WHERE receiver= " . $sender. "
				AND sender = ". $receiver . "
			");
			$stm->execute();
			
			$sth = $db->prepare("
				SELECT *
				FROM message, user
				WHERE (message.sender = " . $sender . " OR message.receiver = " . $sender . ") 
				AND (message.sender = " . $receiver . " OR message.receiver = " . $receiver . ") 
				AND (message.sender = user.user_id)
				ORDER BY time DESC
			");
			$sth->execute();
			$messages = $sth->fetchAll();
			require_once "./views/chatTemplate.php";
		}
		
		public function sendmessageAction(){
			require_once './config.php';
			
			$sender = $_SESSION["user_id"];
			$receiver = $_POST["chat_id"];
			$content = htmlentities($_POST["chattext"]);
			$friendname = $_POST["chat_name"];
			$unread = 0;
			
			if(!empty($content)){
				$sth = $db->prepare("
					INSERT INTO message(sender, content, receiver, time, unread)
					VALUES (:sender, :content, :receiver, NOW(), :unread)
					");
				$sth->execute(array(
					":sender"=>$sender,
					":content"=>$content,
					":receiver"=>$receiver,
					":unread" =>$unread
				));
				header('location: ../friends/chat');
			}
			else{
				header('location: ../friends/chat?empty');
			}
		}
		
	}

 ?>