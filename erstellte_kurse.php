<?php session_start();
$page = 'erstellte';
include('../inc/header.php');
include('../lib/sekundaerfunktionen.php');
echo "			<div>\n";
echo "				<h1 class=\"h1gekauft\"> Hier findest du deine erstellten Kurse </h1>\n";
echo "			</div>\n";
echo "			<div class=\"grid_container_EK\">\n";
generateCreatedCourses();
echo "			</div>\n";
include('../inc/footer.php')
?>
