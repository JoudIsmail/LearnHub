<?php session_start(); 
$page = 'shop';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
echo "            <div class=\"search-bar\">\n";
echo "				<h1>Hier finden Sie angebotene Kurse </h1>\n";
echo "					<input class=\"search-input\" placeholder=\"Suche nach Begriff...\">\n";
echo "					<noscript>\n";
echo "						<p class=\"nojavascriptmsg\">Suchfunktion nur mit Javascript möglich!</p>\n";
echo "					</noscript>\n";
echo "			</div>\n";
generateShopCourses();
require_once('inc/footer.php');
?>
