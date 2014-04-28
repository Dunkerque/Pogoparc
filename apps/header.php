
<?php
$erreur = '';
if(isset($_SESSION['login']))
{
	$request_checkLogin = 'SELECT * FROM users WHERE login = "'.$_SESSION['login'].'" && password = "'.$_SESSION['pass'].'"';
	$res = mysqli_query($db, $request_checkLogin);
	/* INITIATION DES VARIABLES NECESSAIRES */
	$data = mysqli_fetch_assoc($res);
	$loginU = htmlentities($data["login"]);
	$passU = htmlentities($data['password']);
	$nomU = htmlentities($data['nom']);
	$prenomU = htmlentities($data['prenom']);
	$adresseU = htmlentities($data['adresse']);
	$codePostalU = htmlentities($data['code_postal']);
	$villeU = htmlentities($data['ville']);
	$emailU = htmlentities($data['email']);
	$infoU = htmlentities($data['info_complementaire']);
	$date = strftime("%A %d %B %Y", strtotime($data['register_date']));
	$date = mb_convert_encoding($date, 'utf-8');
	$date = ucwords(htmlentities($date));
	$heure = htmlentities((date("H:i:s")));

	if($_SESSION['login'] == $data['login'] && $_SESSION['pass'] == $data['password'])
	{
		$page_login = 'apps/logged.php';
	}
	else
	{
		require("apps/modules/logout.php");
	}
}
else
{
	if(isset($_POST['login_user'], $_POST['login_pass']))
	{
		$login_user = mysqli_real_escape_string($db,$_POST['login_user']);
		$login_pass = mysqli_real_escape_string($db,$_POST['login_pass']);
		$request_checkUser = 'SELECT * FROM users WHERE login = "'.$login_user.'"';
		$resUser = mysqli_query($db,$request_checkUser);
		$dataUser = mysqli_fetch_assoc($resUser);

		if($resUser)
		{
			if($dataUser)
			{
				echo"ok";
				echo $dataUser['password'];
				echo $login_pass;
				if(password_verify($login_pass,$dataUser['password']))
				{

					echo "ok1";
					$_SESSION['id'] = $dataUser['id_users'];
					$_SESSION['login'] = $dataUser['login'];
					$_SESSION['pass'] = $dataUser['password'];
					if($dataUser['admin'] == 1)
					$_SESSION['admin'] = 1;
					else
					$_SESSION['admin'] = 0;
					header("Location:index.php?$url");
				}
				else
					$erreur = 'Password incorrect';
			}
			else
				$erreur = 'Login incorrect';
		}
		else
			$erreur = "Erreur Internet";
	}
	$page_login = "apps/login.php";

}
require("views/header.html");
?>
