<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'erstellte';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedOut("anmelden.php");
echo "			<div>\n";
echo "				<h1 class=\"h1gekauft\"> Hier findest du deine erstellten Kurse </h1>\n";
echo "			</div>\n";
echo "			<div class=\"grid_container_EK\">\n";
generateCreatedCourses();
echo "				<div class=\"grid_element_EK1\">\n";
echo "					<a href=\"kurs_erstellen.php\"> <img alt=\"obligatorisches Kurserstellungs Bild\" class=\"grid_element_bild_EK\" src=\"../bilder/java.png\"> </a>\n";
echo "					<h3 class=\"grid_element_titel_EK\" > Einen neuen Kurs erstellen </h3>\n";
echo "				</div>	\n";
echo "			</div>\n";
require_once('inc/footer.php')
?>
