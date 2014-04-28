<?php
if(isset($_SESSION['login']))
{
	if(isset($_SESSION['login'],$_SESSION['password']))
	{
		if($_SESSION['login'] == $data['login'] && $_SESSION['password'] == $data['password'])
		{
			$showAll = "SELECT id_plats, nom_plats, contenu_plats, tarif_plats FROM plats";
			$request_showAll = mysqli_query($db, $showAll);
			while($data = mysqli_fetch_assoc($request_showAll))
			{
				$id_plats = intval($data['id_plats']);
				$nom_plats = htmlentities($data['nom_plats']);
				$contenu_plats = htmlentities($data['contenu_plats']);
				$tarif_plats = floatval($data['tarif_plats']);
				require('views/showPlats.html');
			}
		}
	}
}
else{
	$_SESSION['msg_error'] = "Vous devez vous connecter pour voir ce contenu";
}
?>
