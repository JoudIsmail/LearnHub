<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'bearbeiten';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');

redirectIfLoggedOut("anmelden.php");

if(!isset($_GET["id"]))
{
	header("Location: /shop.php");
}

$kursid = $_GET["id"];
if(!isset($_SESSION["createdCourses"][$kursid]))
{
	header("Location: /shop.php");
}
$course = $_SESSION["createdCourses"][$kursid];

if(isset($_GET["error"]))
{
	if($_GET["error"] == "feld_leer")
	{
		echo "<h1 style=\"color:red\"> Ein oder mehrere Felder wurden leer gelassen. Bitte füllen Sie alle Felder aus. </h1>";
	}
}

echo "            <div class=\"col-wrapper\">\n";
echo "            <div class=\"column2 column-bg column-1\">\n";
echo "                <h1>Kurs bearbeiten\n";
echo "                    <input type=\"submit\" class=\"btn\" value=\"Änderungen verwerfen\">\n";
echo "		    <form action=\"do.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "                    <input name=\"editCourse\" type=\"submit\" class=\"btn\" value=\"Speichern\">\n";
echo "		    <input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">\n";
echo "                  </h1>\n";
echo "                    <p>Titel des Kurses:</p>\n";
echo "                    <input name=\"title\" class=\"input-bg\" value=\"".$course['title']."\" required>\n";
echo "                    <p class=\"pkurz\">Kurzbeschreibung (Wird auf der Startseite angezeigt):</p>\n";
echo "					<textarea name=\"summary\" class=\"txtarea\" required>".$course['summary']."</textarea>";
echo "					<p class=\"plernen\">Was kann man in diesem Kurs lernen?</p>\n";
echo "									<textarea name=\"educationalContent\" class=\"txtarea\" required>".$course['educationalContent']."</textarea>";
echo "					\n";
echo "					\n";
echo "									<p class=\"pgoal\">Für wen ist dieser Kurs geeignet?</p>\n";
echo "									<textarea name=\"suitableFor\" class=\"txtarea\" required>".$course['suitableFor']."</textarea>\n";
echo "						\n";
echo "					\n";
echo "				<br>\n";
echo "				<br>\n";
echo "				<fieldset>\n";
echo "					<legend> Zur Person, Kontaktmöglichkeiten </legend>\n";
echo "					<div class=\"kurststeller-holder\">\n";
echo "						<div class=\"kurssteller column-1\">\n";
echo "							<p>Name des Kurserstellers:</p>\n";
echo "							<input name=\"instructorName\" class=\"input-bg input-1\" value=\"".$course['instructorName']."\" required/>\n";
echo "							<br>\n";
echo "							<p>Kontaktmöglichkeiten:</p>\n";
echo "							<textarea name=\"instructorContact\" class=\"txtarea\" required>".$course['instructorContact']."\n";
echo "				</textarea>\n";
echo "\n";
echo "						</div>\n";
echo "						<div class=\"uploaded-img-wrapper column-2\">\n";
echo "							<img class=\"uploaded-img\" alt=\"Platzhalter für das Bild des Erstellers\" src=\"".$course['instructorImagePath']."\"><br>\n";
echo "							<input name=\"instructorImage\" class=\"input-img\" type=\"file\">\n";
echo "						</div>\n";
echo "\n";
echo "\n";
echo "						<div class=\"place-holder\">\n";
echo "						</div>\n";
echo "					</div>\n";
echo "\n";
echo "				</fieldset>\n";
echo "				<br>\n";
echo "				<fieldset id=\"barrierefreiheit_fieldset\">\n";
echo "					<legend> Barrierefreiheit </legend>\n";
echo "\n";
echo "					<p class=\"p-learn\">Ist dieser Kurs für Sehbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn visuelle Medien ausreichend per Text (für Screenreader) oder Stimme beschrieben werden.\"></i></p>\n";
if($course["vImpairedSuitability"] == "true")
{
	echo "					<input type=\"radio\" id=\"sehbehinderteJa\" name=\"vImpairedSuitability\" value=\"true\" checked required>\n";
}else{
	echo "					<input type=\"radio\" id=\"sehbehinderteJa\" name=\"vImpairedSuitability\" value=\"true\" required>\n";

}
echo "					<label for=\"sehbehinderteJa\"> Ja </label>\n";
if($course["vImpairedSuitability"] == "false")
{
	echo "					<input type=\"radio\" id=\"sehbehinderteNein\" name=\"vImpairedSuitability\" value=\"false\" checked required>\n";
}else{
	echo "					<input type=\"radio\" id=\"sehbehinderteNein\" name=\"vImpairedSuitability\" value=\"false\" required>\n";
}

echo "					<label for=\"sehbehinderteNein\"> Nein </label>\n";
echo "\n";
echo "					<p class=\"p-learn\">Ist dieser Kurs für Hörbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn begleitend zu Audiomaterial (etwa in Videos) inhaltich ausreichender Text verfügbar ist.\"></i></p>\n";
if($course["hImpairedSuitability"] == "true")
{
	echo "					<input type=\"radio\" id=\"hörbehindeteJa\" name=\"hImpairedSuitability\" value=\"true\" checked required>\n";
}else{
	echo "					<input type=\"radio\" id=\"hörbehindeteJa\" name=\"hImpairedSuitability\" value=\"true\" required>\n";
}
echo "					<label for=\"hörbehindeteJa\"> Ja </label>\n";
if($course["hImpairedSuitability"] == "false")
{
	echo "					<input type=\"radio\" id=\"hörbehindeteNein\" name=\"hImpairedSuitability\" value=\"false\" checked required>\n";
}else{
	echo "					<input type=\"radio\" id=\"hörbehindeteNein\" name=\"hImpairedSuitability\" value=\"false\" required>\n";
}
echo "					<label for=\"hörbehinderteNein\"> Nein </label>\n";
echo "\n";
echo "\n";
echo "					<p class=\"p-learn\">Beschreibung des Kursbildes für Benutzer mit Screenreadern:</p>\n";
echo "					<input name=\"courseImageAlt\" class=\"input-bg\" value=\"".$course["courseImageAlt"]."\" required >\n";
echo "\n";
echo "\n";
echo "				</fieldset>\n";
echo "								</div>\n";
echo "                <div class=\"column2 column-bg column-4 col-bg-3\">\n";
echo "                    <div class=\"upload-container\">\n";
echo "                        <div class=\"upload-wrapper\">\n";
echo "                                <p class=\"pupload-img\">Bild hochladen</p>\n";
echo "                            <img class=\"upload-img\" alt=\"Platzhalter für das Bild des Kurses\" src=".$course['courseImagePath'].">\n";
echo "														<input name=\"courseImage\" class=\"input-img\" type=\"file\" >\n";
echo "                        </div>\n";
echo "                        <p id=\"preisdisplay\"> <strong class=\"price\"> Preis: ".$course['priceEuro'].",".$course['priceCent']."€ </strong></p>\n";
echo "                        <p> Euro: <input onchange=\"euroChanged()\" name=\"priceEuro\" id=\"europicker\" class=\"u-currency currency\" type=\"number\" min=\"1\" step=\"any\" value=\"".$course["priceEuro"]."\" required/></p>\n";
echo "                        <p> Cent: <input onchange=\"centChanged()\" name=\"priceCent\"id=\"centpicker\" class=\"c-currency currency\" type=\"number\" min=\"1\" max=\"99\" step=\"any\" value=\"".$course["priceCent"]."\"/ required></p>\n";
echo "                        <script>\n";
echo "        \n";
echo "                            function updatePreis(preistext)\n";
echo "                            {\n";
echo "                                document.getElementById(\"preisdisplay\").innerText  = preistext\n";
echo "                            }\n";
echo "        \n";
echo "                            function euroChanged()\n";
echo "                            {\n";
echo "                                updatePreis(\"Preis: \" + document.getElementById(\"europicker\").value + \",\" + document.getElementById(\"centpicker\").value + \"€\");\n";
echo "                            }\n";
echo "        \n";
echo "                            function centChanged()\n";
echo "                            {\n";
echo "                                updatePreis(\"Preis: \" + document.getElementById(\"europicker\").value + \",\" + document.getElementById(\"centpicker\").value + \"€\");\n";
echo "                            }\n";
echo "        \n";
echo "                            \n";
echo "                        </script>\n";
echo "        \n";
echo "                        <br>\n";
echo "                        <p>Was ist in diesem Kurs enthalten?</p>\n";
echo "                        <textarea name=\"materialContent\" class=\"txtarea\" required>".$course['materialContent']."</textarea>\n";
echo "                    </div> \n";
echo "                </div>\n";
echo "            </div>\n";
require_once("inc/footer.php");
?>
