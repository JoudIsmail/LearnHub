<?php
if (session_status() == PHP_SESSION_NONE) {
		session_start();
}

$page = 'erstellen';

require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedOut("anmelden.php");
echo "	<form action=\"do.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "    <section id=\"col-wrapper\" class=\"col-wrapper\">\n";
echo "      <div class=\"column2 column-bg column-1\">\n";
if(isset($_GET["error"]))
{

	switch($_GET["error"])
	{
		case "feld_leer":
			echo "<span class=\"spanError\"> Ein oder mehrere Felder wurden leer gelassen. Bitte füllen Sie alle Felder aus. </span>";
			break;
		case "badSummary":
			echo "<span class=\"spanError\"> Die Kurzbeschreibung darf 500 Zeichen nicht überschreiten. </span>";
			break;
		case "badTitle":
			echo "<span class=\"spanError\"> Der Titel darf 70 Zeichen nicht überschreiten. </span>";
			break;
		case "badMaterialContent":
			echo "<span class=\"spanError\"> Die Angabe der im Kurs enthaltenen Dinge darf 300 Zeichen nicht überschreiten. </span>";
			break;
		case "badInstructorName":
			echo "<span class=\"spanError\"> Der Name des Kurserstellers darf 30 Zeichen nicht überschreiten. </span>";
			break;
		case "badInstructorContact":
			echo "<span class=\"spanError\"> Die Angabe über Kontaktmöglichkeiten darf 100 Zeichen nicht überschreiten. </span>";
			break;
		case "badSuitableFor":
			echo "<span class=\"spanError\"> Die Angabe, für wen dieser Kurs geeignet ist, darf 1000 Zeichen nicht überschreiten . </span>";
			break;
		case "badEducationalContent":
			echo "<span class=\"spanError\"> Die Angabe der Wissensinhalte, die im Kurs gelehrt werden, darf 1000 Zeichen nicht überschreiten. </span>";
			break;
		case "badCourseImageAlt":
			echo "<span class=\"spanError\"> Die Textalternative des Kursbildes darf 70 Zeichen nicht überschreiten</span>";
			break;
	}
}
echo "				<h1>Neuen Kurs erstellen</h1>\n";
echo "					<input id=\"create\" name=\"addCourse\" type=\"submit\" class=\"btn\" value=\"Erstellen\">\n";
echo "					<section class=\"courseInputWrapper\">\n";
echo "						<h3>Titel des Kurses:</h3>\n";
echo "           	<input id=\"title\" name=\"title\" class=\"input-bg\" value=\"\" required>\n";
echo "           	<span class= \"tooltip left\" id=\"spanTitle\"></span>\n";
echo "          	<p class=\"maxCharLimit\">(Maximal 70 Zeichen)</p>\n";
echo "          </section>\n";
echo "          <section class=\"courseInputWrapper\">\n";
echo "    	    	<h3 class=\"pkurz\">Kurzbeschreibung (Wird auf der Startseite angezeigt):</h3>\n";
echo "						<textarea id=\"summary\" name=\"summary\" class=\"txtarea\" required></textarea>\n";
echo "          	<span class= \"tooltip left\" id=\"spanSummary\"></span>\n";
echo "          	<p class=\"maxCharLimit\">(Maximal 500 Zeichen)</p>\n";
echo "          </section>\n";

echo "    \n";
echo "          <section class=\"courseInputWrapper\">\n";
echo "						<h3 class=\"plernen\">Was kann man in diesem Kurs lernen?</h3>\n";
echo "						<textarea id=\"edContent\" name=\"educationalContent\" class=\"txtarea\" required></textarea>\n";
echo "          	<span class= \"tooltip left\" id=\"spanEdContant\"></span>\n";
echo "           	<p class=\"maxCharLimit\">(Maximal 1000 Zeichen)</p>\n";
echo "          </section>\n";

echo "	\n";
echo "	\n";

echo "          <section class=\"courseInputWrapper\">\n";
echo "						<h3 class=\"pgoal\">Für wen ist dieser Kurs geeignet?</h3>\n";
echo "						<textarea id=\"suitableFor\" name=\"suitableFor\" class=\"txtarea\" required></textarea>\n";
echo "          	<span class= \"tooltip left\" id=\"spanSuitableFor\"></span>\n";
echo "          	<p class=\"maxCharLimit\">(Maximal 1000 Zeichen)</p>\n";
echo "          </section>\n";

echo "    	\n";
echo "	\n";
echo "					<br>\n";
echo "					<br>\n";
echo "					<fieldset>\n";
echo "						<legend> Zur Person, Kontaktmöglichkeiten </legend>\n";
echo "						<div class=\"kurststeller-holder\">\n";
echo "							<div class=\"kurssteller column-1\">\n";

echo "           			<section class=\"courseInputWrapper\">\n";
echo "									<h3>Name des Kurserstellers:</h3>\n";
echo "									<input id= \"instructorName\" name=\"instructorName\" class=\"input-bg input-1\" value=\"\" required>\n";
echo "              		<span class= \"tooltip left\" id=\"spanInstructorName\"></span>\n";
echo "           				<p class=\"maxCharLimit\">(Maximal 30 Zeichen)</p>\n";
echo "         				</section>\n";

echo "								<br>\n";
echo "            		<section class=\"courseInputWrapper\">\n";
echo "									<h3>Kontaktmöglichkeiten:</h3>\n";
echo "									<textarea id= \"instructorContact\" name=\"instructorContact\" class=\"txtarea\" required></textarea>\n";
echo "                 	<span class= \"tooltip left\" id=\"spanInstructorContact\"></span>\n";
echo "           				<p class=\"maxCharLimit\">(Maximal 100 Zeichen)</p>\n";
echo "         				</section>\n";

echo "\n";
echo "							</div>\n";
echo "							<section class=\"uploaded-img-wrapper column-2\">\n";
echo "								<h3 class=\"p-bg\">Bild des Kurserstellers:</h3>\n";
echo "								<img id=\"instructorImage\" alt=\"Platzhalter für das Bild des Erstellers\" class=\"uploaded-img\" src=\"bilder/noimage.png\"><br>\n";
echo "								<noscript>\n";
echo "									<p class=\"p-bg\">Bildvorschau ohne Javascript nicht möglich.</p>\n";
echo "								</noscript>\n";
echo " 	            	<span class= \"tooltip left\" id=\"spanInstructorImage\"></span>\n";
echo "								<input name=\"instructorImage\" id =\"file1\" type=\"file\" onchange=\"loadInstructorImage(event)\" required>\n";
echo "								<label for=\"file1\" class=\"input-img\">Bild hochladen</label>\n";
echo "							</section>\n";
echo "						</div>\n";
echo "\n";
echo "					</fieldset>\n";
echo "					<br>\n";
echo "					<fieldset id=\"barrierefreiheit_fieldset\">\n";
echo "						<legend> Barrierefreiheit </legend>\n";
echo "\n";
echo "						<section>\n";
echo "							<h3 class=\"p-learn\">Ist dieser Kurs für Sehbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn visuelle Medien ausreichend per Text (für Screenreader) oder Stimme beschrieben werden.\"></i></h3>\n";
echo "							<input name=\"vImpairedSuitability\" type=\"radio\" id=\"sehbehinderteJa\"  value=\"true\" required>\n";
echo "							<label for=\"sehbehinderteJa\"> Ja </label>\n";
echo "							<input name=\"vImpairedSuitability\" type=\"radio\" id=\"sehbehinderteNein\"  value=\"false\" required checked>\n";
echo "							<label for=\"sehbehinderteNein\"> Nein </label>\n";
echo "						</section>\n";
echo "\n";
echo "						<section>\n";
echo "							<h3 class=\"p-learn\">Ist dieser Kurs für Hörbehinderte geeignet? <i class=\"fa fa-info-circle\" title=\"Dies ist beispielsweise der Fall, wenn begleitend zu Audiomaterial (etwa in Videos) inhaltich ausreichender Text verfügbar ist.\"></i></h3>\n";
echo "							<input name=\"hImpairedSuitability\" type=\"radio\" id=\"hörbehinderteJa\"  value=\"true\" required>\n";
echo "							<label for=\"hörbehinderteJa\"> Ja </label>\n";
echo "							<input name=\"hImpairedSuitability\" type=\"radio\" id=\"hörbehinderteNein\"  value=\"false\" required checked>\n";
echo "							<label for=\"hörbehinderteNein\"> Nein </label>\n";
echo "						</section>\n";
echo "\n";
echo "  	        <section class=\"courseInputWrapper\">\n";
echo "							<h3 class=\"p-learn\">Beschreibung des Kursbildes für Benutzer mit Screenreadern:</h3>\n";
echo "							<input id= \"courseImageAlt\" name=\"courseImageAlt\" class=\"input-bg\"  required>\n";
echo " 	           	<span class= \"tooltip left\" id=\"spanCourseImageAlt\"></span>\n";
echo " 	        		<p class=\"maxCharLimit\">(Maximal 70 Zeichen)</p>\n";
echo "       			</section>\n";

echo "\n";
echo "\n";
echo "					</fieldset>\n";
echo "\n";
echo "       	</div>\n";
echo "        <div class=\"column2 column-bg column-4 col-bg-3\">\n";
echo "        	<div class=\"upload-container\">\n";
echo "          	<section class=\"upload-wrapper\">\n";
echo "            	<h3 class=\"pupload-img\">Kursbild</h3>\n";
echo "              <img id= \"courseImage\" class=\"upload-img\" alt=\"Platzhalter für ein Bild vom Kursersteller\" src=\"bilder/noimage.png\">\n";
echo "							<noscript>\n";
echo "								<p class=\"p-bg\">Bildvorschau ohne Javascript nicht möglich.</p>\n";
echo "							</noscript>\n";
echo "             	<span class= \"tooltip left\" id=\"spanCourseImage\"></span>\n";
echo "							<br>\n";
echo "							<input name=\"courseImage\" class=\"input-img\" id =\"file\" type=\"file\" onchange=\"loadCourseImage(event)\" required>\n";
echo "							<label for=\"file\" class=\"input-img\">Bild hochladen</label>\n";
echo "							<br>\n";
echo "            </section>\n";
echo "           	<p id=\"preisdisplay\"> <strong class=\"price\"> Preis: 89,99€ </strong></p>\n";
echo "            <noscript>\n";
echo "							<p class=\"p-learn\">Preis</p>\n";
echo "            </noscript>\n";
echo "            <p> Euro: <input name=\"priceEuro\" onchange=\"euroChanged()\" id=\"europicker\" class=\"u-currency currency\" type=\"number\" min=\"1\" step=\"any\" value=\"89\"  required></p>\n";
echo "            <span class= \"tooltip left\" id=\"spanEuroPicker\"></span>\n";
echo "            <p> Cent: <input name=\"priceCent\" onchange=\"centChanged()\" id=\"centpicker\" class=\"c-currency currency\" type=\"number\" min=\"0\" max=\"99\" step=\"any\" value=\"99\" required></p>\n";
echo "            <span class= \"tooltip left\" id=\"spanCentPicker\"></span>\n";
echo "            <script>\n";
echo "        \n";
echo "              document.getElementById(\"preisdisplay\").style.display=\"block\"\n";
echo "             	function updatePreis(preistext)\n";
echo "              {\n";
echo "             		document.getElementById(\"preisdisplay\").innerText  = preistext\n";
echo "             	}\n";
echo "        \n";
echo "             	function euroChanged()\n";
echo "              {\n";
echo "              	updatePreis(\"Preis: \" + document.getElementById(\"europicker\").value + \",\" + document.getElementById(\"centpicker\").value + \"€\");\n";
echo "              }\n";
echo "        			\n";
echo "             	function centChanged()\n";
echo "              {\n";
echo "              	updatePreis(\"Preis: \" + document.getElementById(\"europicker\").value + \",\" + document.getElementById(\"centpicker\").value + \"€\");\n";
echo "            	}\n";
echo "        \n";
echo "                            \n";
echo "            </script> \n";
echo "        \n";
echo "            <br>\n";
echo "  					<section class=\"courseInputWrapper\">\n";
echo "       	    	<h3>Was ist in diesem Kurs enthalten?</h3>\n";
echo " 	          	<textarea id=\"materialContent\" name=\"materialContent\" class=\"txtarea\" required></textarea>\n";
echo "            	<span class= \"tooltip left\" id=\"spanMaterialContent\"></span>\n";
echo "         			<p class=\"maxCharLimit\">(Maximal 300 Zeichen)</p>\n";
echo "       			</section>\n";
echo "  	      </div>\n";
echo "      </div> \n";
echo "    </section>\n";
echo "   </form>\n";
require_once('inc/footer.php');
?>
