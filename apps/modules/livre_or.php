<?php	

$message ="";

if(isset($_SESSION['msg_success']))
{
	$message = htmlentities($_SESSION['msg_success']);
	unset($_SESSION['msg_success']);
}
	if (isset($_SESSION['login'])) 
	{
		$login = htmlentities($_SESSION['login']);
		if(isset($_POST['form_livre_or']))
		{

			if(empty($_POST['commentaire']))
			{

				$message = "Le champs commentaire est vide";
			}
		
		else
		{
			$content = trim($_POST['commentaire']);
			$content = mysqli_real_escape_string($db,$_POST['commentaire']);
			
			$insert_comment = "INSERT INTO livre_or (`date`, commentaires, users_id_users) VALUES (NOW(),'".$content."', '".$idU."')";
			$request = mysqli_query($db, $insert_comment);
			$idArticle = mysql_insert_id($db);
			if($request)
			{
				$_SESSION['msg_success'] = "Votre message à bien été ajouter";
				header("Location:index.php?$url");
				exit();
			}
			else{
				$message = "Une erreur est survenue";
			}
		}
	}
} 
require("views/livre_or.html");


?>

<!-- ajouter submit -->