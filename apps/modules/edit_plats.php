<?php 
	$msg_plats = '';
	$edit_nom_plats = '';
	$edit_contenu_plats = '';
	$edit_tarif_plats = '';
	if (isset($_POST["form_edit_plats"]))
	{
	    $edit_nom_plats = $_POST['nom_plat'];
	    $edit_contenu_plats = $_POST['contenu_plat'];
	    $edit_tarif_plats = $_POST['tarif_plat'];
	    
	}

	if(isset($_POST['form_edit_plats']))
	{
		if (empty($_POST["nom_plat"]) ||
			empty($_POST["contenu_plat"]) ||
			empty($_POST["tarif_plat"]))
			{
				$msg_plats = "Des champs requis sont manquants";
			}
			else
			{
					if (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["nom_plat"]))
			        {
			        	$msg_plats = "Le nom  du plat ne peut contenir que des lettres ne pas dépasser 32 caractères.";
			        }

			        elseif (!preg_match("#^[a-zA-Z -]{3,128}$#",$_POST["contenu_plat"]))
			        {
			        	$msg_plats = "Le contenu du plat ne peut contenir que des lettres ne pas dépasser 128 caractères.";
			        }

			        elseif (!floatval($_POST["tarif_plat"]))
			        {
			        	$msg_plats = "Le prix du plat ne peut contenir que des chiffres décimaux.";
			        }

					else
					{
						$edit_nom_plats = mysqli_real_escape_string($db, $_POST['nom_plat']);
						$edit_contenu_plats = mysqli_real_escape_string($db, $_POST['contenu_plat']);
						$edit_tarif_plats = mysqli_real_escape_string($db,$_POST['tarif_plat']);
						$check_nom_plats = 'SELECT * FROM plats WHERE nom_plats = "'.$edit_nom_plats.'"';
						$res_nom_plats = mysqli_query($db, $check_nom_plats);
						$ligne = mysqli_fetch_assoc($res_nom_plats);
						if (!$ligne) 
						{
							$insert_plats = 'INSERT INTO plats (nom_plats,contenu_plats,tarif_plats)
							VALUES ("'.$edit_nom_plats.'", "'.$edit_contenu_plats.'","'.$edit_tarif_plats.'")';
							$res_insert_plats = mysqli_query($db, $insert_plats);
							$msg_plats = 'Votre plats à bien été créé';
						} 
						else 
						{
							$msg_plats = 'Ce plat  existe déjà, veuillez en choisir un autre.';
						}	
				}
		}
	}


	require("views/edit_plats.html");
?>
