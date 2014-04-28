<?php
$msg ="";

if (isset($_POST["update_profil_sub"]))
{
    $emailUForm = $_POST['update_email'];
    $nameUForm = $_POST['update_name'];
    $surnameUForm = $_POST['update_surname'];
    $adressUForm = $_POST['update_adress'];
    $cpUForm = $_POST['update_cp'];
    $cityUForm = $_POST['update_city'];
    $infosUForm = $_POST['update_info_comp'];
}

else
{
    $emailUForm = $emailU;
    $nameUForm = $nomU;
    $surnameUForm = $prenomU;
    $adressUForm = $adresseU;
    $cpUForm = $codePostalU;
    $cityUForm = $villeU;
    $infosUForm = $infoU;
}

if (isset($_SESSION["login"]))
{
	if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
	{
		if (isset($_POST["update_profil_sub"]))
		{
			if (empty($_POST["update_email"]) || empty($_POST["update_name"]) || empty($_POST["update_surname"]) || empty($_POST["update_adress"]) || empty($_POST["update_cp"]) || empty($_POST["update_city"]))
			{
				$msg = "Des champs requis sont manquants";
			}
			else
			{
				if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['update_email']))
                {
                    $msg = "L'adresse E-mail n'a pas un format valide";
                }

                elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["update_name"]))
                {
                	$msg = "Le nom ne peut contenir que des lettres ne pas dépasser 32 caractères";
                }

                elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["update_surname"]))
                {
                	$msg = "Le prénom ne peut contenir que des lettres ne pas dépasser 32 caractères";
                }

                elseif (!preg_match("#^[a-zA-Z0-9 -]{3,32}$#",$_POST["update_adress"]))
                {
                	$msg = "L'adresse ne peut contenir que des lettres et des chiffres, ainsi que 32 caractères maximum";
                }

                elseif (!preg_match("#^[0-9]{2,5}$#",$_POST["update_cp"]))
                {
                	$msg = "Le code postal ne peut contenir que des chiffres, sous format 9X ou 9XXXX";
                }

                elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["update_city"]))
                {
                	$msg = "La ville ne peut contenir que des lettres et ne pas dépasser 32 caractères";
                }

                else
                {
                	$modif_email = mysqli_real_escape_string($db, $_POST['update_email']);
                	$modif_name = mysqli_real_escape_string($db, $_POST['update_name']);
                	$modif_surname = mysqli_real_escape_string($db, $_POST['update_surname']);
                	$modif_adress = mysqli_real_escape_string($db, $_POST['update_adress']);
					$modif_cp = mysqli_real_escape_string($db, $_POST['update_cp']);
					$modif_city = mysqli_real_escape_string($db, $_POST['update_city']);
					$modif_infos = mysqli_real_escape_string($db, $_POST['update_info_comp']);

					$modif_u = "UPDATE users SET email = '".$modif_email."', nom = '".$modif_name."', prenom = '".$modif_surname."',  adresse = '".$modif_adress."', code_postal = '".$modif_cp."',ville = '".$modif_city."', info_complementaire = '".$modif_infos."' WHERE id_users = $idU";
					$request_edit = mysqli_query($db,$modif_u);

                    header("location:index.php?page=profile&id=".$idU);
                }
			}
		}
		require('views/edit_profile.html');
	}

	else
	{
		header("location:index.php?page=logout");
	}
}

else
{
	header("location:index.php");
}
?>