<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"de\">\n";
echo "	<head>\n";
echo "		<meta charset=\"UTF-8\" name=\"description\" content=\"Informationen über die Creator\" name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "		<title>Prototyp Index</title>\n";
echo "	</head>\n";
echo "\n";
echo "	<style>\n";
echo "		ul{\n";
echo "			margin-bottom:20px;\n";
echo "		}\n";
echo "		li{\n";
echo "			margin-bottom:2px;\n";
echo "		}\n";
echo "	</style>\n";
echo "\n";
echo "	<body>\n";
echo "		<h1>Willkommen zum Prototyp</h1>\n";
echo "		<p>Diese Seite ist eine Navigationshilfe für den Prototyp unseres Projektes.</p>\n";
echo "		<p>Um die unterschiedlichen Benutzergruppen zu simulieren, gibt es zwei verschiedene Ansichten des Prototyps:</p>\n";
echo "		<ul>\n";
echo "					\n";
echo "			<li>\n";
echo "				<a href=\"angemeldeter_benutzer_ansicht/proto_shopansicht.php\"> Ansicht als angemeldeter Benutzer </a>\n";
echo "\n";
echo "\n";
echo "				<p> Ordner: angemeldeter_benutzer_ansicht </p>\n";
echo "				<p> Highlights (Nicht alle Seiten aufgelistet):</p>\n";
echo "				<ul>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_shopansicht.php\"> Übersicht erhältlicher Kurse </a> </li>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_kursansicht_nichtteilnehmender-Benutzer.php\"> Ansicht eines Kurses </a> </li>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_kurs-bearbeitung.php\"> Bearbeitung eines erstellten Kurses </a> </li>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_gekaufte_kurse.php\"> Übersicht gekaufter Kurse </a> </li>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_gaestebuch.php\"> Gästebuch </a> </li>\n";
echo "					<li> <a href=\"angemeldeter_benutzer_ansicht/proto_about-us.php\"> About Us </a> </li>\n";
echo "				</ul>\n";
echo "\n";
echo "			</li>\n";
echo "\n";
echo "			<li>\n";
echo "				<a href=\"gast_ansicht/proto_shopansicht.php\"> Ansicht als Gast </a>\n";
echo "\n";
echo "				<p> Ordner: gast_ansicht </p>\n";
echo "				<p> Highlights (Nicht alle Seiten aufgelistet):</p>\n";
echo "				<ul>\n";
echo "					<li> <a href=\"gast_ansicht/proto_registration_gast.php\"> Registrierung </a> </li>\n";
echo "					<li> <a href=\"gast_ansicht/proto_login_gast.php\"> Benutzer Login </a> </li>\n";
echo "				</ul>\n";
echo "\n";
echo "			</li>\n";
echo "\n";
echo "		</ul>\n";
echo "\n";
echo "\n";
echo "		<br>\n";
echo "		<br>\n";
echo "		<p>Zusätzlich gibt es den Ordner <i> admin_ansicht </i> mit folgenden Seiten:</p>\n";
echo "\n";
echo "		<ul>\n";
echo "			<li><a href=\"admin_ansicht/proto_adminlogin.php\"> Admin Login </a></li>\n";
echo "			<li><a href=\"admin_ansicht/proto_adminpanel.php\"> Admin Panel </a></li>\n";
echo "		</ul>\n";
echo "\n";
echo "\n";
echo "\n";
echo "	</body>\n";
echo "</html>\n";
?>