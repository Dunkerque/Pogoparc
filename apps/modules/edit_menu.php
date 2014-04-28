<?php 
	$msg_menu = '';

	$edit_scroll_entrees = '';
	$edit_scroll_plats = '';
	$edit_scroll_desserts = '';
	$edit_scroll_boissons = '';

	$edit_nom_menu = '';
	// $edit_contenu_menu = $edit_scroll_entrees.', '.$edit_scroll_plats.', '.$edit_scroll_desserts.', '.$edit_scroll_boissons;
	$edit_tarif_menu = '';

	if(isset($_POST['form_edit_menu']))
	{
		// permet d'afficher le contenue du tableau avec une mise en page:
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

    $edit_nom_menu = $_POST['nom_menu'];
    $edit_contenu_menu = $_POST['scroll_entrees'].', '.$_POST['scroll_plats'].', '.$_POST['scroll_desserts'].', '.$_POST['scroll_boissons'];
    $edit_tarif_menu = $_POST['tarif_menu'];
		
		if (empty($_POST["nom_menu"]) || empty($_POST["scroll_entrees"]) ||	empty($_POST["scroll_plats"]) || empty($_POST["scroll_desserts"]) || empty($_POST["scroll_boissons"]) ||	empty($_POST["tarif_menu"]))
		{			
			$msg_menu = "Des champs requis sont manquants";
		}
		else
		{
			if (!ctype_alnum($_POST["nom_menu"]))
	        {
	        	$msg_menu = "Le nom  du menu ne peut contenir que des lettres ne pas dépasser 32 caractères.";
	        }

	        elseif (!ctype_alpha($_POST['scroll_entrees']))
	        {
	        	$msg_menu = "Le contenu de l'entrée ne peut contenir que des lettres ne pas dépasser 128 caractères.";
	        }

	        elseif (!ctype_alpha($_POST['scroll_plats']))
	        {
	        	$msg_menu = "Le contenu du plat ne peut contenir que des lettres ne pas dépasser 128 caractères.";
	        }

	        elseif (!ctype_alpha($_POST['scroll_desserts']))
	        {
	        	$msg_menu = "Le contenu du dessert ne peut contenir que des lettres ne pas dépasser 128 caractères.";
	        }

	        elseif (!ctype_alpha($_POST['scroll_boissons']))
	        {
	        	$msg_menu = "Le contenu de la boisson ne peut contenir que des lettres ne pas dépasser 128 caractères.";
	        }

	        elseif (!floatval($_POST["tarif_menu"]))
	        {
	        	$msg_menu = "Le prix du menu ne peut contenir que des chiffres décimaux.";
	        }

			else
			{

				// $edit_scroll_entrees = mysqli_real_escape_string($db, $_POST['scroll_entrees'];
				// $edit_scroll_plats = mysqli_real_escape_string($db, $_POST['scroll_plats'];
				// $edit_scroll_desserts = mysqli_real_escape_string($db, $_POST['scroll_desserts'];
				// $edit_scroll_boissons = mysqli_real_escape_string($db, $_POST['scroll_boissons']; 

				$edit_nom_menu = mysqli_real_escape_string($db, $_POST['nom_menu']);
				$edit_tarif_menu = mysqli_real_escape_string($db,$_POST['tarif_menu']);
				$check_nom_menu = 'SELECT * FROM menus WHERE nom_menus = "'.$edit_nom_menu.'"';
				$res_nom_menu = mysqli_query($db, $check_nom_menu);
				$ligne = mysqli_fetch_assoc($res_nom_menu);
				if (!$ligne) 
				{
					$insert_menu = 'INSERT INTO menus (nom_menus,contenu_menus,tarif_menu)
					VALUES ("'.$edit_nom_menu.'", "'.$edit_contenu_menu.'","'.$edit_tarif_menu.'")';
					$res_insert_menu = mysqli_query($db, $insert_menu);
					echo $insert_menu;
					$msg_menu = 'Votre menu à bien été créé';
				} 
				else 
				{
					$msg_menu = 'Ce menu  existe déjà, veuillez en choisir un autre.';
				}	
			}
		}
	}
	require("views/edit_menu.html");
?>
