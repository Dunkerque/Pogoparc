<?php
$msg ="";

if(isset($_SESSION['pass_success']))
{
    $msg = htmlentities($_SESSION['pass_success']);
    unset($_SESSION['pass_success']);
}

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if (isset($_POST["update_pass_sub"]))
        {
            if (empty($_POST["update_old_pass"]) || empty($_POST["update_new_pass"]) || empty($_POST["update_new_pass_chk"]))
            {
                $msg = "Des champs requis sont manquants";
            }
            else
            {
                $update_new_pass = sha1($_POST["update_new_pass"]);

                if(!preg_match("#[a-zA-Z0-9]{5,}#", $_POST['update_new_pass']))
                {
                    $msg = "Le mot de passe doit contenir 5 caractères.";
                }

                elseif (sha1($_POST["update_old_pass"]) !== $passU )
                {
                    $msg = "L'ancien mot de passe n'est pas correct";
                }

                elseif ($_POST["update_new_pass"] !== $_POST["update_new_pass_chk"])
                {
                    $msg = "La vérification du nouveau mot de passe à échouée";
                }

                else
                {
                    $modif_pass = mysqli_real_escape_string($db, $update_new_pass);

                    $modif_u = "UPDATE users SET password = '".$modif_pass."' WHERE id_users = $idU";
                    $request_edit = mysqli_query($db,$modif_u);

                    $_SESSION["pass"] = $update_new_pass;

                    $_SESSION["pass_success"] = "Le mot de passe à bien été changé";

                    header("location:index.php?$url");
                }
            }
        }
        require('views/edit_mdp.html');
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