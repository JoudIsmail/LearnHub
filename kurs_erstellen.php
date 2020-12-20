<?php
if (session_status() == PHP_SESSION_NONE) {
		session_start();
}

$page = 'erstellen';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedOut("anmelden.php");
echo "            <div class=\"col-wrapper\">\n";
echo "            <div class=\"column2 column-bg column-1\">\n";
echo "                <h1>Neuen Kurs erstellen\n";
echo "		    <form action=\"do.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "                    <input name=\"addCourse\" type=\"submit\" class=\"btn\" value=\"Erstellen\">\n";
echo "                  </h1>\n";
echo "                    <p>Titel des Kurses:</p>\n";
echo "                    <input name=\"title\" class=\"input-bg\" value=\"\" required>\n";
echo "                    <p class=\"pkurz\">Kurzbeschreibung (Wird auf der Startseite angezeigt):</p>\n";
echo "					<textarea name=\"summary\" class=\"txtarea\" required></textarea>\n";
echo "    \n";
echo "					<p class=\"plernen\">Was kann man in diesem Kurs lernen?</p>\n";
echo "					<textarea name=\"educationalContent\" class=\"txtarea\" required></textarea>\n";
echo "	\n";
echo "	\n";
echo "					<p class=\"pgoal\">Für wen ist dieser Kurs geeignet?</p>\n";
echo "					<textarea name=\"suitableFor\" class=\"txtarea\" required></textarea>\n";
echo "    	\n";
echo "	\n";
echo "			<br>\n";
echo "			<br>\n";
echo "			<fieldset>\n";
echo "				<legend> Zur Person, Kontaktmöglichkeiten </legend>\n";
echo "				<div class=\"kurststeller-holder\">\n";
echo "					<div class=\"kurssteller column-1\">\n";
echo "						<p>Name des Kurserstellers:</p>\n";
echo "						<input name=\"instructorName\" class=\"input-bg input-1\" value=\"\"/ required>\n";
echo "						<br>\n";
echo "						<p>Kontaktmöglichkeiten:</p>\n";
echo "						<textarea name=\"instructorContact\" class=\"txtarea\" required></textarea>\n";
echo "\n";
echo "					</div>\n";
echo "					<div class=\"uploaded-img-wrapper column-2\">\n";
echo "						<p class=\"p-bg\">Bild des Kurserstellers:</p>\n";
echo "						<img alt=\"Platzhalter für ein Bild für den Kurs\" class=\"uploaded-img\" src=\"bilder/noimage.png\"><br>\n";
echo "						<input name=\"instructorImage\" class=\"input-img\" type=\"file\" required>\n";
echo "					</div>\n";
echo "\n";
echo "\n";
echo "					<div class=\"place-holder\">\n";
echo "					</div>\n";
echo "				</div>\n";
echo "\n";
echo "			</fieldset>\n";
echo "			<br>\n";
echo "				<fieldset id=\"barrierefreiheit_fieldset\">\n";
echo "					<legend> Barrierefreiheit </legend>\n";
echo "\n";
echo "					<p class=\"p-learn\">Ist dieser Kurs für Sehbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn visuelle Medien ausreichend per Text (für Screenreader) oder Stimme beschrieben werden.\"></i></p>\n";
echo "					<input name=\"vImpairedSuitability\" type=\"radio\" id=\"sehbehinderteJa\" name=\"sehbehinderte\" value=\"true\" required>\n";
echo "					<label for=\"sehbehinderteJa\"> Ja </label>\n";
echo "					<input name=\"vImpairedSuitability\" type=\"radio\" id=\"sehbehinderteNein\" name=\"sehbehinderte\" value=\"false\" required checked>\n";
echo "					<label for=\"sehbehinderteNein\"> Nein </label>\n";
echo "\n";
echo "					<p class=\"p-learn\">Ist dieser Kurs für Hörbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn begleitend zu Audiomaterial (etwa in Videos) inhaltich ausreichender Text verfügbar ist.\"></i></p>\n";
echo "					<input name=\"hImpairedSuitability\" type=\"radio\" id=\"hörbehindeteJa\" name=\"hörbehinderte\" value=\"true\" required>\n";
echo "					<label for=\"hörbehindeteJa\"> Ja </label>\n";
echo "					<input name=\"hImpairedSuitability\" type=\"radio\" id=\"hörbehinderteNein\" name=\"hörbehinderte\" value=\"false\" required checked>\n";
echo "					<label for=\"hörbehinderteNein\"> Nein </label>\n";
echo "\n";
echo "\n";
echo "					<p class=\"p-learn\">Beschreibung des Kursbildes für Benutzer mit Screenreadern:</p>\n";
echo "					<input name=\"courseImageAlt\" class=\"input-bg\"  required>\n";
echo "\n";
echo "\n";
echo "				</fieldset>\n";
echo "\n";
echo "                </div>\n";
echo "                <div class=\"column2 column-bg column-4 col-bg-3\">\n";
echo "                    <div class=\"upload-container\">\n";
echo "                        <div class=\"upload-wrapper\">\n";
echo "                                <p class=\"pupload-img\">Bild hochladen</p>\n";
echo "                            <img class=\"upload-img\" alt=\"Platzhalter für ein Bild vom Kursersteller\" src=\"bilder/noimage.png\">\n";
echo "														<br>\n";
echo "														<input name=\"courseImage\" class=\"input-img\" type=\"file\" required>\n";
echo "														<br>\n";
echo "                        </div>\n";
echo "                        <p id=\"preisdisplay\"> <strong class=\"price\"> Preis: 89,99€ </strong></p>\n";
echo "                        <p> Euro: <input name=\"priceEuro\" onchange=\"euroChanged()\" id=\"europicker\" class=\"u-currency currency\" type=\"number\" min=\"1\" step=\"any\" value=\"89\" / required></p>\n";
echo "                        <p> Cent: <input name=\"priceCent\" onchange=\"centChanged()\" id=\"centpicker\" class=\"c-currency currency\" type=\"number\" min=\"1\" max=\"99\" step=\"any\" value=\"99\"/ required></p>\n";
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
echo "                        </script> \n";
echo "        \n";
echo "                        <br>\n";
echo "                        <p>Was ist in diesem Kurs enthalten?</p>\n";
echo "                        <textarea name=\"materialContent\" class=\"txtarea\" required></textarea>\n";
echo "                        </form>\n";
echo "                    </div> \n";
echo "                </div>\n";
echo "            </div>\n";
require_once('inc/footer.php');
?>
