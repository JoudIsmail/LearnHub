<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$page = 'gekaufte';
require_once('inc/header.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedOut("anmelden.php");
echo "			<div>\n";
echo "				<h1 class=\"h1gekauft\"> Hier findest du deine gekauften Kurse </h1>\n";
echo "			</div>\n";
echo "			<div class=\"grid_container_EK\">\n";
generateBoughtCourses();
echo "			</div>\n";
require_once('inc/footer.php');
?>
