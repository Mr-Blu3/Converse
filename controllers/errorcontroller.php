<?php

	require_once './config.php';
	require_once './views/errorTemplate.php';
	
	class errorController{
		
		public function indexAction(){
			
		}
		
		public function notFoundAction(){
			header('location: '.root.'error?notfound');
		}
		
		public function urlErrorAction(){
			header('location: '.root.'error?url');
		}
	}
	
?>