<?php 
	$showAll = "SELECT * FROM plats";
	$res = mysqli_query($db, $showAll);
	while($data = mysqli_fetch_assoc($res))
	{
		$namePlats = htmlentities($data['nom_plats']);
		echo '<option value="">'.$namePlats.'</option>';
	}
?>