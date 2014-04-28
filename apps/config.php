<?php 
	// JE RECUPERE LURL EN COURS (index.php?page=module)
if(isset($_GET['page']))
{
	$url_en_cours = basename($_SERVER['REQUEST_URI']);
	// J'EXPLODE MA CHAINE APRES le index.php? POUR RECUPERE QUE LE MODULE EN COURS;
	$url = explode("?", basename(trim($_SERVER['REQUEST_URI'])));
	$url = $url[1];
}
	// $encours[1] = page=lemodule
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "troiswa");
define("DB_NAME", "restodeg");
?>