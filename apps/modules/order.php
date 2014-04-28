<?php
var_dump($_POST);
if(isset($_POST['order_plats']))
{
	if(empty($_POST['order_plats']))
	{
		$_SESSION['msg_error'] = "Vous devez choisir au minimum un article";
		header('Location: index.php?page=command');
	}
}
?>