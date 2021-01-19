<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'kurs';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
require_once('lib/hilfsfunktionen.php');

$kursid = $_GET["id"];
$kurse = readCoursesFile();
$kurs = $kurse[findCourseById($kurse, $kursid)];

$erstellerversion = $teilnehmerversion = $nichtteilnehmerversion = $gastversion = false;

if(isset($_SESSION) && isset($_SESSION["id"]))
{
	$erstellerversion = $kurs["creatorId"] == $_SESSION["id"];
	$teilnehmerversion = in_array($_SESSION["id"], $kurs["participants"]);
	$nichtteilnehmerversion = isset($_SESSION["email"]) && !$teilnehmerversion;
	$gastversion = false;
}else{
	$erstellerversion = false;
	$teilnehmerversion = false;
	$nichtteilnehmerversion = false;
	$gastversion = true;

}

echo "      <section>\n";
echo "        <header class=\"main-container\">\n";
echo "        	<div class=\"main-wrapper\">\n";
echo "          	<div class=\"description-container column-8\">\n";
echo "          		<h1 class=\"h1-java\"> ".$kurs["title"]."</h1>\n";
echo "            	<p class=\"p-description\">".$kurs["summary"]." </p>\n";
echo "          	</div>\n";
echo "          	<div class=\"img-container column-9\">\n";
echo "              <img class=\"img-kurs\"\n";
echo "                alt=\"".$kurs["courseImageAlt"]."\"\n";
echo "                src=\"".$kurs["courseImagePath"]."\"><br>\n";
if($erstellerversion)
{
	echo "            <form action=\"kurs_bearbeiten.php\" method=\"get\">\n";
	echo "							<input name=\"id\" type=\"hidden\" value=\"".$kursid."\">\n";
	echo "							<button type=\"submit\" class=\"btn\"> Kurs bearbeiten</button>\n";
	echo "            </form>\n";
}else if($nichtteilnehmerversion)
{
	echo "						<form action=\"do.php\" method=\"post\">\n";
	echo "							<input name=\"id\" type=\"hidden\" value=\"".$kursid."\">\n";
	echo "           		<input name=\"buyCourse\" type=\"submit\" class=\"btn\" value=\"Kaufen\">\n";
	echo "						</form>\n";

}else if($gastversion)
{
	echo "           	<form action=\"nachricht.php\" method=\"get\">\n";
	echo "           		<input type=\"hidden\" name=\"type\" value=\"erst_registrieren\">\n";
	echo "							<button class=\"btn\" type=\"submit\">Kurs kaufen</button>\n";
	echo "            </form>\n";
}
echo "           	</div>\n";
echo "        	</div>\n";
if($erstellerversion)
{
	echo "        <article class=\"teilnehmer-container\">\n";
	echo "       		<h2 class=\"h2-teilnehmer\"> Teilnehmer: </h2>\n";
	echo "         	<div class=\"teilnehmerliste\">\n";
	generateParticipantsList($kurs);
	echo "          </div>\n";
	echo "        </article>\n";

}
echo "     		</header>\n";
echo "        <div class=\"col-wrapper\">\n";
echo "            <div class=\"column2 column-bg column-1\">\n";
echo "                <div class=\"learn-container\">\n";
echo "			<section>\n";
echo "                    <h2 class=\"h2-teilnehmer\"> Das wirst du lernen </h2>\n";
echo "                    ".$kurs["educationalContent"]."\n";
echo "			</section>\n";
echo "			<section>\n";
echo "                    <h2 class=\"h2-teilnehmer\"> Für wen eignet sich dieser Kurs? </h2>\n";
echo "                    ".$kurs["suitableFor"]."\n";
echo "			</section>\n";
echo "                </div>\n";
echo "                <section class=\"barrier-container\">\n";
echo "                    <h2 class=\"h2-teilnehmer\"> Barrierefreiheit </h2>\n";
if($kurs["vImpairedSuitability"] == "true")
{
	echo "                    <p class=\"p-bg\"> Dieser Kurs ist für Sehbehinderte geeignet</p>\n";
} else {
	echo "                    <p class=\"p-bg\"> Dieser Kurs ist leider nicht für Sehbehinderte geeignet</p>\n";

}
if($kurs["hImpairedSuitability"] == "true")
{
	echo "                    <p class=\"p-bg\"> Dieser Kurs ist für Hörbehinderte geeignet</p>\n";
} else {
	echo "                    <p class=\"p-bg\"> Dieser Kurs ist leider nicht für Hörbehinderte geeignet</p>\n";

}

echo "                </section>\n";
echo "            </div>\n";
echo "            <div class=\"column2 column-bg column-4 col-bg-3 col-enthalten\">\n";
echo "                    <section class=\"enthalten-bg\">\n";
echo "                    	<h2 class=\"h2-teilnehmer\"> Das ist im Kurs enthalten </h2> <br>\n";
echo "                    	".$kurs["materialContent"]."\n";
echo "                    </section>\n";
echo "                    <section class=\"contact-container\">\n";
echo "                        <h2 class=\"h2-teilnehmer\"> Kontakt und Beratung </h2>\n";
echo "                        <img class=\"img-teacher\" alt=\"Bild des Kurserstellers\" src=\"".$kurs["instructorImagePath"]."\">\n";
echo "                        <p class=\"p-bg\"> <strong class=\"strong-name\"> ".$kurs["instructorName"]." </strong> <br>\n";
echo "                            Ersteller des Kurses <br> <br>\n";
echo "                            Kontakt <br>\n";
echo "                            ".$kurs["instructorContact"]."</p>\n";
echo "                    </section>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "        <section class=\"review-container\">\n";
echo "            <h2 class=\"h2-teilnehmer\"> Bewertungen von Teilnehmern dieses Kurses </h2>\n";
echo "            <div class=\"columns-3\">\n";
echo "                <div class=\"col-7\">\n";
echo "                    <img class=\"user-img\" alt=\"Bild eines Benutzers\" src=\"../bilder/user_bewertung1.png\">\n";
echo "                </div>\n";
echo "                <div class=\"col-6\">\n";
echo "                    <p class=\"bewertung_k_nB\"> <strong> mxtr0669@hochschule-trier.de: </strong> <br>\n";
echo "                        Ein wirklich sehr schöner Kurs. <br>\n";
echo "                        Die Themen sind sehr pragmatisch und sauber erklärt. Man kann gut folgen und die Umsetzung in den\n";
echo "                        Tools ich wirklich gut gelungen. <br>\n";
echo "                        Ich habe parallel meine eigenen Beispiele umsetzen können. Vielen Dank. </p>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "            <div class=\"columns-3\">\n";
echo "                <div class=\"col-7\">\n";
echo "                    <img class=\"user-img\" alt=\"Bild eines Benutzers\" src=\"../bilder/user_bewertung2.png\">\n";
echo "                </div>\n";
echo "                <div class=\"col-6\">\n";
echo "                    <p class=\"bewertung_k_nB\"> <strong> ismailj@hochschule-trier.de: </strong> <br>\n";
echo "                        Als Einführung in Java war dieser Kurs sehr gut, <br> \n";
echo "                        vor allem die Entwicklung kleiner Programme hat mir sehr gefallen. <br> \n";
echo "                        Da ich vorher schon Fortran und Python gelernt habe, hat sich für mich einiges wiederholt.\n";
echo "                        Z.b. wie Schleifen funktionieren oder die <br> allgemeine Programmierlogik. </p>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "            <div class=\"columns-3\">\n";
echo "                <div class=\"col-7\">\n";
echo "                    <img class=\"user-img\" alt=\"Bild eines Benutzers\" src=\"../bilder/user_bewertung3.png\">\n";
echo "                </div>\n";
echo "                <div class=\"col-6\">\n";
echo "                    <p class=\"bewertung_k_nB\"> <strong> leomathys@hochschule-trier.de: </strong> <br>\n";
echo "                        Anfangs sehr gut, dann bißchen zu schnell. <br>\n";
echo "                        Es wäre gut, wenn man einiges zusammen fasst und \"richtige\" Programme schreiben würde \n";
echo "                        um den gesamten Zusammenhang besser <br> verstehen bzw. nachvollziehen zu können. </p>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </section>\n";
echo "      </section>\n";

require_once('inc/footer.php');
?>
