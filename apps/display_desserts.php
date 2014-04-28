<?php 
	$showDesserts = "SELECT * FROM desserts";
	$resDesserts = mysqli_query($db, $showDesserts);
	while($dataDesserts = mysqli_fetch_assoc($resDesserts))
	{
		$nameDesserts = htmlentities($dataDesserts['nom_dessert']);
		echo '<option value="'.$dataDesserts['nom_dessert'].'">'.$nameDesserts.'</option>';
	}
?>