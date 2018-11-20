<?php
	session_start();

@require("src/mysql.php");

	if (!$mysql)
	{
		echo "Error: no connection to database";
		exit;
	}

	switch ($_GET['query']) {

		case "proposition":
			if (strip_tags($_GET['data']) != $_GET['data']){
				echo "error|Veuillez reformuler.";
			}
			else {
				$query = $mysql->prepare("INSERT INTO propositions (content, author, date)
												VALUES (?, ?, ?)");
				$query->bind_param("sss", $_GET['data'], $_SESSION['login'], date("d/m/Y h:i:s"));
				$query->execute();
				$query->close();
				echo "success";
			}
		break;

		case "posts":
			$quest = $mysql->query("SELECT * FROM propositions");
			while (($tmp = $quest->fetch_assoc()))
				$data[] = $tmp;
			echo json_encode($data);
		break;

		default:
			echo "Erreur: Aucune demande.";
		break;

	}

?>