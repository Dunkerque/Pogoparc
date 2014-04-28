<?php 
	$showBoissons = "SELECT * FROM boissons";
	$resBoissons = mysqli_query($db, $showBoissons);
	while($dataBoissons = mysqli_fetch_assoc($resBoissons))
	{
		$nameBoissons = htmlentities($dataBoissons['nom_boisson']);
		echo '<option value="'.$dataBoissons['nom_boisson'].'">'.$nameBoissons.'</option>';
	}
?>