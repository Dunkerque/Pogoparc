<?php 
	$showPlats = "SELECT * FROM plats";	
	$resPlats = mysqli_query($db, $showPlats);
	while($dataPlats = mysqli_fetch_assoc($resPlats))
	{
		$namePlats = htmlentities($dataPlats['nom_plats']);
		echo '<option value="'.$dataPlats['nom_plats'].'">'.$namePlats.'</option>';
	}
?>