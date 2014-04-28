<?php
$loginU = htmlentities($_SESSION["login"]);
$fidelPoint = $data["fidel_point"];
$idU = $_SESSION["id"];
require("views/logged.html");
?>