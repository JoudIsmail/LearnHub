<?php session_start();
$page = 'erstellte';
include('../inc/header.php');
echo "			<div>\n";
echo "				<h1 class=\"h1gekauft\"> Hier findest du deine erstellten Kurse </h1>\n";
echo "			</div>\n";
echo "			<div class=\"grid_container_EK\">\n";
echo "				<div class=\"grid_element_EK1\">\n";
echo "					<a href=\"proto_kursansicht_besitzender-Benutzer.php\"> <img alt=\"obligatorisches Python Bild\" class=\"grid_element_bild_EK\" src=\"../bilder/python.png\"> </a>\n";
echo "					<h3 class=\"grid_element_titel_EK\" >Python Bootcamp</h3>\n";
echo "				</div>\n";
echo "	\n";
echo "				<div class=\"grid_element_EK1\">\n";
echo "					<a href=\"proto_kursansicht_besitzender-Benutzer.php\"> <img alt=\"obligatorisches Java Bild\" class=\"grid_element_bild_EK\" src=\"../bilder/java.png\"> </a>\n";
echo "					<h3 class=\"grid_element_titel_EK\" >Java 101</h3>\n";
echo "				</div>\n";
echo "	\n";
echo "				<div class=\"grid_element_EK1\">\n";
echo "					<a href=\"proto_kursansicht_besitzender-Benutzer.php\"> <img alt=\"obligatorisches Web-Entwicklungs Bild\" class=\"grid_element_bild_EK\" src=\"../bilder/web-entwicklung.png\"> </a>\n";
echo "					<h3 class=\"grid_element_titel_EK\"> Einstieg WWW</h3>\n";
echo "				</div>\n";
echo "	\n";
echo "				<div class=\"grid_element_EK1\">\n";
echo "					<a href=\"proto_kurserstell.php\"> <img alt=\"obligatorisches Kurserstellungs Bild\" class=\"grid_element_bild_EK\" src=\"../bilder/java.png\"> </a>\n";
echo "					<h3 class=\"grid_element_titel_EK\" > Einen neuen Kurs erstellen </h3>\n";
echo "				</div>	\n";
echo "			</div>\n";
include('../inc/footer.php')
?>