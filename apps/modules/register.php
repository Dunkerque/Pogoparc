<?php 
	$msg_register = '';
	$loginUForm = "";
    $passwordUForm = "";
    $emailUForm = "";
    $nameUForm = "";
    $surnameUForm = "";
    $adressUForm = "";
    $cpUForm = "";
    $dateUForm = "";
    $infosUForm = "";
    $cityUForm = "";
    $t ="";
if (isset($_POST["form_user"]))
{
    $loginUForm = $_POST['register_login'];
    $passwordUForm = $_POST['register_password'];
    $emailUForm = $_POST['register_email'];
    $nameUForm = $_POST['register_nom'];
    $surnameUForm = $_POST['register_prenom'];
    $adressUForm = $_POST['register_adress'];
    $cpUForm = $_POST['register_cp'];
    $dateUForm = $_POST['register_birthday'];
    $infosUForm = $_POST['register_info_comp'];
    $cityUForm = $_POST['register_city'];
}

if(isset($_POST['form_user']))
{
	if (empty($_POST["register_login"]) ||
		empty($_POST["register_password"]) ||
		empty($_POST["register_email"]) ||
		empty($_POST["register_nom"]) ||
		empty($_POST["register_prenom"]) ||
		empty($_POST["register_adress"]) ||
		empty($_POST["register_cp"]) ||
		empty($_POST["register_birthday"]) ||
		empty($_POST["register_city"]))
		{
			$msg_register = "Des champs requis sont manquants";
		}
		else
		{
				if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['register_email']))
		        {
		            $msg_register = "L'adresse E-mail n'a pas un format valide";
		        }
		        elseif(!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["register_login"])){
		        	$msg_register = "Le login n'est pas un format valide";
		        }
		        elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["register_nom"]))
		        {
		        	$msg_register = "Le nom ne peut contenir que des lettres ne pas dépasser 32 caractères";
		        }

		        elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["register_prenom"]))
		        {
		        	$msg_register = "Le prénom ne peut contenir que des lettres ne pas dépasser 32 caractères";
		        }

		        elseif (!preg_match("#^[a-zA-Z0-9 ]{3,32}$#",$_POST["register_adress"]))
		        {
		        	$msg_register = "L'adresse ne peut contenir que des lettres et des chiffres, ainsi que 32 caractères maximum";
		        }

		        elseif (!preg_match("#^[0-9]{2,5}$#",$_POST["register_cp"]))
		        {
		        	$msg_register = "Le code postal ne peut contenir que des chiffres, sous format 9X ou 9XXXX";
		        }

		        elseif (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["register_city"]))
		        {
		        	$msg_register = "La ville ne peut contenir que des lettres et ne pas dépasser 32 caractères";
		        }
				else
				{
					$hash = password_hash($_POST['register_password'],PASSWORD_BCRYPT,["cost"=>13]);
					$login = trim($_POST['register_login']);
					$login = mysqli_real_escape_string($db, $_POST['register_login']);
					$password = mysqli_real_escape_string($db, $hash); // sha1 pour sécurisé le password
					$email = mysqli_real_escape_string($db, $_POST['register_email']);
					$nom = mysqli_real_escape_string($db, $_POST['register_nom']);
					$prenom = mysqli_real_escape_string($db, $_POST['register_prenom']);
					$adresse = mysqli_real_escape_string($db, $_POST['register_adress']);
					/*| Un code postal peut commencer par 0, faire attention, parce que intval va transformer 04000 par 4000 :) |*/
					$code_postal = mysqli_real_escape_string($db,$_POST['register_cp']);
					$ville = mysqli_real_escape_string($db, $_POST['register_city']);
					$info_complementaire = mysqli_real_escape_string($db, $_POST['register_info_comp']);
					$birthday = mysqli_real_escape_string($db, $_POST['register_birthday']);
					$point = "1";
					$fidelpoint = intval($point);
					$checklogin = 'SELECT * FROM users WHERE login = "'.$login.'"';
					$res_checklogin = mysqli_query($db, $checklogin);
					$ligne = mysqli_fetch_assoc($res_checklogin);
					if (!$ligne) 
					{
						$insert_user = 'INSERT INTO users (login, password, email, nom, prenom, adresse, code_postal, ville, info_complementaire, birthday,register_date,fidel_point)
						VALUES ("'.$login.'", "'.$password.'","'.$email.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$code_postal.'","'.$ville.'","'.$info_complementaire.'","'.$birthday.'",NOW(),"'.$fidelpoint.'")';
						$res_insert_user = mysqli_query($db, $insert_user);
						$msg_register = 'Votre compte à bien été créé';
					} 
					else 
					{
						$msg_register = 'Ce login  existe déjà, veuillez en choisir un autre.';
					}	
			}
	}
}
require('views/register.html');

// PB CONSTATER:
// - calendrier bloquuer le calendrier sur les dates trop vieilles et sur les dates futur a faire en PHP (conseil de PAscal).
// - sur le code postal il faut obligatoirement remplir 5 chiffre, ce qui n'est pas le cas on peut mettre un seul nombre.

?>
