<?php session_start();
$page = 'gekaufte';
include('../inc/header.php');
include('../lib/sekundaerfunktionen.php');
echo "			<div>\n";
echo "				<h1 class=\"h1gekauft\"> Hier findest du deine gekauften Kurse </h1>\n";
echo "			</div>\n";
echo "			<div class=\"grid_container_EK\">\n";
generateBoughtCourses();
echo "			</div>\n";
include('../inc/footer.php');
?>
