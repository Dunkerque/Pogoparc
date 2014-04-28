<?php
$showAll = "SELECT id_plats, nom_plats, contenu_plats, tarif_plats FROM plats";
$request_showAll = mysqli_query($db, $showAll);
while($data = mysqli_fetch_assoc($request_showAll))
{
	$nom_plats = htmlentities($data['nom_plats']);
	$contenu_plats = htmlentities($data['contenu_plats']);
	require('views/showPlats.html');
}
?>
