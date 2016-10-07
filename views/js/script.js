
$(document).ready(function(){

	var randomMessage = [
		"Step it up! Converse!",
		"Leave your footprint on the interwebs!",
		"How are you feeling today? Converse it!",
		"Don't forget to bring your shoes!",
		"The Converse is strong within you.",
		"Conversation is the start to a better today."
	];
	
	if(document.getElementById("logo_random")){
		var rand = randomMessage[Math.floor(Math.random() * randomMessage.length)];
		document.getElementById("logo_random").innerHTML = rand + "<br/>";
		console.log(rand);
	}
	
	var menu = [
		{
			txt: "profile",
			url: "profile"
		},
		{
			txt: "account",
			url: "account"
		},
		{
			txt: "friends",
			url: "friends"
		},
		{
			txt: "wall",
			url: "wall"
		},
		{
			txt: "logout",
			url: "user/logout"
		}
	];
	
	if(document.getElementById("menu")){
		var root = "http://89.45.226.90/Converse/";
		for(var x = 0; x < menu.length; x++){
			var link = "<a href=" + root + menu[x].url + ">" + menu[x].txt + "</a>";
			document.getElementById("menu").innerHTML += link;
		}
	}
	
});

	function toggle(obj){
		if (document.getElementById(obj).style.display=='block'){
			document.getElementById(obj).style.display='none';
		}
		else{
			document.getElementById(obj).style.display='block';
		}
	}

	function show(obj){
		if (obj == 'frontpage_form_login'){
			document.getElementById('frontpage_form_login').style.display = 'block';
			document.getElementById('frontpage_form_register').style.display = 'none';
			if(document.getElementById('frontpage_form_login').style.display = 'block'){
				document.getElementById('frontpage_topic_on').id = "frontpage_topic_off";
				document.getElementById('frontpage_topic_off').id = "frontpage_topic_on";
			}
		}
		if (obj == 'frontpage_form_register'){
			document.getElementById('frontpage_form_register').style.display = 'block';
			document.getElementById('frontpage_form_login').style.display = 'none';
			if(document.getElementById('frontpage_form_register').style.display = 'block'){
				document.getElementById('frontpage_topic_off').id = "frontpage_topic_on";
				document.getElementById('frontpage_topic_on').id = "frontpage_topic_off";
			}
		}
	}
