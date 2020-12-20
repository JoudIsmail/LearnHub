<?php
if (session_status() == PHP_SESSION_NONE) {
		session_start();
}

$page = 'gaestebuch';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
echo "		<div class=\"bewertung-holder\">\n";
echo "			<h1 class=\"h1bewertung\"> Bewerten Sie unsere Dienstleistungen </h1>\n";
echo "		</div>\n";
echo "\n";
echo "		<a class=\"kerstellung\" id=\"zeige_kommentar_ersteller\" href=\"#\" onClick='(function(){\n";
echo "			document.getElementById(\"zeige_kommentar_ersteller\").style.visibility = \"hidden\";\n";
echo "			document.getElementById(\"kommentar_ersteller\").style.visibility = \"visible\";\n";
echo "		})(); return false;'>Neuen Eintrag verfassen</a>\n";
echo "		<div class=\"kommentarersteller\" id=\"kommentar_ersteller\">\n";
echo "			<form action=\"do.php\" method= \"post\">\n";
echo "				<input name=\"title\" placeholder=\"Titel\" /><br>\n";
echo "				<textarea name=\"comment\" class=\"comment\" placeholder=\"Kommentar\"></textarea><br>\n";
echo "				<input name=\"name\" placeholder=\"Name\" /><br>\n";
echo "				<input name=\"addEntry\" type=\"submit\" value=\"Senden\" />\n";
echo "			</form>\n";
echo "		</div>\n";
echo "		<div class=\"comment-container\">\n";
generateEntries();
echo "		</div>\n";
require_once('inc/footer.php');
?>
