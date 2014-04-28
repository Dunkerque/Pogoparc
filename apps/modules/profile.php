<?php
$msgU ='';
$date = strftime("%A %d %B %Y", strtotime($data['register_date']));
$date = ucwords(htmlentities($date));

if(isset($_GET['success'])){
	$msgU = "Vos informations ont bien été editées";
	$msgU = htmlentities($msgU);
}

if (isset($_SESSION["login"]) && ( $_SESSION['login'] == $loginU && $_SESSION['pass'] == $passU))
{
	$queryUser = 'SELECT * FROM users WHERE login = "'.$loginU.'"';
	$resQueryUser = mysqli_query($db,$queryUser);
	$resUser = mysqli_fetch_assoc($resQueryUser);

	if ($resUser)
	{
		require("views/profile.html");
	}
	else 
	{
		header("location:index.php");
	}
}

else
{
	header("location:index.php");
}
?>