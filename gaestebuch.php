<?php
if (session_status() == PHP_SESSION_NONE) {
		session_start();
}

$page = 'gaestebuch';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
echo "	<section>\n";
echo "		<header class=\"bewertung-holder\">\n";
echo "			<h1 class=\"h1bewertung\"> Teilen Sie uns Ihre Meinung mit</h1>\n";
echo "		</header>\n";
echo "\n";
echo "		<section class=\"kommentarersteller\" >\n";
echo "			<h3> Neuen Gästebucheintrag verfassen</h3>\n";
echo "			<br>\n";
echo "			<form class=\"kommentarformular\" action=\"do.php\" method= \"post\">\n";
echo "				<input name=\"title\" placeholder=\"Titel\" /><br>\n";
echo "				<textarea name=\"comment\" class=\"comment\" placeholder=\"Kommentar\"></textarea><br>\n";
echo "				<input name=\"name\" placeholder=\"Name\" /><br>\n";
echo "				<input name=\"addEntry\" type=\"submit\" value=\"Senden\" />\n";
echo "			</form>\n";
echo "		</section>\n";
echo "		<section class=\"comment-container\">\n";
echo "			<h3> Gästebucheinträge</h3>\n";
echo "			<br>\n";
generateEntries();
echo "		</section>\n";
echo "	</section>\n";
require_once('inc/footer.php');
?>
