<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'shop';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
echo "      <section>\n";
echo "      	<header>\n";
echo "        	<div class=\"search-bar\">\n";
echo "						<h1>Hier finden Sie angebotene Kurse </h1>\n";
echo "						<input id=\"search\" class=\"search-input\" placeholder=\"Suche nach Begriff...\" onchange=\"search(event)\">\n";
echo "                            <br><span class= \"tooltip left\" id=\"tooltip\"></span>\n";
echo "						<noscript>\n";
echo "							<p class=\"nojavascriptmsg\">Suchfunktion nur mit Javascript möglich!</p>\n";
echo "						</noscript>\n";
echo "					</div>\n";
echo "				</header>\n";
generateShopCourses();
echo "       </section>\n";
require_once('inc/footer.php');
?>
