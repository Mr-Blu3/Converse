<?php
	session_start();
	
	// laddar klasserna inför sidbyte
	function __autoload($class){
		require_once __DIR__ . "/Controllers/" . strtolower($class) . ".php";
	}
	
	// tar ut / ur länken efter root och räknar ut hur många det är = vilken path du är i
	$uri = explode("/", parse_url(rtrim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));
	$script = explode("/", rtrim(strtolower($_SERVER["SCRIPT_NAME"]), "/"));
	$count = count($script);
	
	for ($i = 0; $i < $count; $i++) {
		if ((isset($uri[$i])) && ($uri[$i] == $script[$i]))
			unset($uri[$i]);
	}
	
	$path = array_values($uri);
	$defaultController = "views/loginTemplate.php";
	$defaultAction = "indexAction";
	
	if(count($path) == 0){
		$defaultController = "userController";
		$defaultAction = "loginAction";
	}
	if(count($path) == 1){
		$defaultController = $path[0] . "Controller";
	}
	else if(count($path) == 2){
		$defaultController = $path[0] . "Controller";
		$defaultAction = $path[1] . "Action";
	}
	else if(count($path) > 2){
		$defaultController = "errorController";
		$defaultAction = "urlErrorAction";
	}

	/*
	* visar ifall filen finns som path:en "kräver"
	*/

	if(is_readable("./Controllers/". strtolower($defaultController) . ".php")){
		//echo "<div class='router_txt'>readable</div>";
	}
	else{
		//echo "<div class='router_txt'>not readable</div>";
	}
	
	/* visar på sidan vad som händer i bakgrunden, vilken path vi är på, vilken       *  controller som används
	*
	* echo "<div class='router_array'>";
	*	print_r($path);
	* echo "</div>";
	*
	* echo "<div class='router_stuff'>";
	*	echo "pathcount" . count($path) . " ";
	*	echo "./controllers/". strtolower($defaultController) . ".php";
	*	echo " ( " . $defaultAction . " ) ";
	* echo "</div>";
	*/

	
	if(file_exists("./Controllers/". strtolower($defaultController) . ".php") && method_exists($defaultController, $defaultAction)){
		$obj = new $defaultController;
		$obj->$defaultAction();
	}
	else{
		$obj = new errorController;
		$obj->notFoundAction();
	}

?>
