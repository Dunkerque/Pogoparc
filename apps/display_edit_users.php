<?php

$msg="";

if (isset($_SESSION["success_deleteU"]))
{
	$msg = $_SESSION["success_deleteU"];
	unset($_SESSION["success_deleteU"]);
}
$querySUsers = 'SELECT * FROM users ORDER BY login';
$resQuerySUsers = mysqli_query($db,$querySUsers);

while($resSUsers = mysqli_fetch_assoc($resQuerySUsers))
{
	$idSU = $resSUsers["id_users"];

    $loginSU = htmlentities($resSUsers["login"]);
    $nameSU = htmlentities($resSUsers["nom"]);
    $surnameSU = htmlentities($resSUsers["prenom"]);
    $emailSU = htmlentities($resSUsers["email"]);
    $adressSU = htmlentities($resSUsers["adresse"]);
    $cpSU = htmlentities($resSUsers["email"]);
    $citySU = htmlentities($resSUsers["ville"]);
    $infosSU = htmlentities($resSUsers["info_complementaire"]);
    $registerDateSU = $resSUsers["register_date"];
    require("views/display_edit_users.html");
}
?>