<?php
	
	session_start();
	if (isset($_GET['agree']))
	{
		setCookie("agree", "J'acceptes l'utilisation de cookie", time()+60*60*24*365*12);
		$_COOKIE["agree"] = 1;
	}

if (isset($_GET['code']))
{
	$post_data['grant_type'] = "authorization_code";
	$post_data['client_id'] = "ee2274db984d1904f03045dab4f61a3b97b2fa433f2b8e82a0206cc6fabe00fb";
	$post_data['client_secret'] = "cc57cae96411d61f4e1561c87a51133895854cec67dd0ee4c1a2c8bbc5825b31";
	$post_data['code'] = $_GET['code'];
	$post_data['redirect_uri'] = "http://localhost:8080/";

	$getdata = curl_init("https://api.intra.42.fr/oauth/token");
  curl_setopt($getdata, CURLOPT_POST, true);
  curl_setopt($getdata, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($getdata, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($post_data)));
	$return_json = json_decode(curl_exec($getdata));

		if (isset($return_json->access_token))
		{
		$_SESSION['access_token'] = $return_json->access_token;
			$getdata = curl_init("https://api.intra.42.fr/v2/me");
 			curl_setopt($getdata, CURLOPT_RETURNTRANSFER, true);
 			curl_setopt($getdata, CURLOPT_RETURNTRANSFER, true);
 			curl_setopt($getdata, CURLOPT_HTTPHEADER, array(
    			"Authorization: Bearer ".$_SESSION['access_token']
    		));
			$return_json = json_decode(curl_exec($getdata));
			$_SESSION['login'] = $return_json->login;
		}
	}

?>
<html>
	<head>
		<title>TIG - Propositions de TIG</title>
		<link href="src/style.css" rel="stylesheet" media="screen"/>
		<script src="src/b.b.js"></script>
	</head>
	<body>
		<?php
		if (!$_COOKIE['agree'])
		{
		?>
		<div class="msg-cookie">
En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies afin de vous connecter. <a href="?agree" title="Nous stockerons un cookie pour cette information." style="color: black;">D'accord</a>
		</div>
		<?php
		}
		?>
		<div class="logo">
			<span style="color: rgb(66, 133, 244);">T</span>
			<span style="color: rgb(234, 67, 53);">I</span>
			<span style="color: rgb(251, 188, 5);">G</span>
		</div>
		<div class="content">
			<?php
				if (!isset($_SESSION['login']))
					@include("src/connect.php");
				else
					@include("src/tig.php");
			?>
		</div>
	</body>
</html>