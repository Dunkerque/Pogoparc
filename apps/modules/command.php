<?php

 $msg_error = "";
if(isset($_SESSION['msg_error']))
{
	$msg_error = htmlentities($_SESSION['msg_error']);
	unset($_SESSION['msg_error']);
}

// var_dump($_POST);
if(isset($_POST['order_plats']))
{
	var_dump($_POST);
	echo $_POST['numberProducts'];
	// if(empty($_POST["list"]))
	// {
	// 	$_SESSION['msg_error'] = "Veuillez au moins choisir un article";
	// 	header("Location:index.php?$url");
	// }
	// else{

	// 	$i = 0;
	// 	if(!isset($_SESSION['pannier']))
	// 	{
	// 		$_SESSION['pannier'] = array();
	// 	}
	// 	while (isset($_POST["list"][$i])){
	// 		$pannier = array();
	// 			$pannier['pannierIdPlats'][$i] = $_POST["list"][$i];
	// 			$namePlats = "SELECT id_plats, nom_plats, tarif_plats FROM plats WHERE id_plats = '".$pannier["pannierIdPlats"][$i]."'";
	// 			$request_namePlats = mysqli_query($db,$namePlats);
	// 			while($dataPlats = mysqli_fetch_assoc($request_namePlats))
	// 			{
	// 				$pannier['pannierNomPlats'][$i] = $dataPlats['nom_plats'];
	// 				$pannier['pannierTarifPlats'][$i] = $dataPlats['tarif_plats'];
	// 				$pannier['pannierQuantity'] = 1;
	// 			}
	// 			$_SESSION['pannier'][] = $pannier;
	// 		$i++;
	// 	}
	// 	echo "<pre>";
	// 	print_r($_SESSION);
	// 	echo "</pre>";
	// }
	//echo $nom_plats;
}

// echo $data['id_plats'];
require('views/command.html');
?>
