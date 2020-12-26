<?php
echo "        <footer class=\"footer-distributed\">\n";
echo "\n";
echo "			<div class=\"footer-left\">\n";
echo "				<img alt=\"leanhublogo\" src=\"../bilder/learnhublogo.png\">\n";
echo "				<h3>About<span class=\"learn\">Learn</span><span class=\"hub\"><mark>hub</mark></span></h3>\n";
echo "\n";
echo "				<p class=\"footer-company-name\">© 2020 E-Learning Platform. Ltd.</p>\n";
echo "			</div>\n";
echo "\n";
echo "			<div class=\"footer-center\">\n";
echo "				<div>\n";
echo "					<i class=\"fa fa-map-marker\"></i>\n";
echo "					<p><span>Hochschule</span>\n";
echo "						Trier</p>\n";
echo "				</div>\n";
echo "				<div>\n";
echo "					<i class=\"fa fa-envelope\"></i>\n";
echo "					<p><a href=\"ismailj@hochschule-trier.de\">ismailj@hochschule-trier.de</a></p>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "			<div class=\"footer-right\">\n";
echo "				<p class=\"footer-company-about\">\n";
echo "					<span>Über das Unternehmen</span>\n";
echo "					Wir bieten Schulungen und Kurse zum Aufbau von Fähigkeiten in den Bereichen Technologie, Design, Business und Wissenschaft an\n";
echo "					</p>\n";
echo "				<div class=\"footer-icons\">\n";
echo "					<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\n";
echo "					<a href=\"#\"><i class=\"fa fa-twitter\"></i></a>\n";
echo "					<a href=\"#\"><i class=\"fa fa-instagram\"></i></a>\n";
echo "					<a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>\n";
echo "					<a href=\"#\"><i class=\"fa fa-youtube\"></i></a>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "		</footer>\n";
echo "    </article>\n";
if(($page == 'login') || ($page == 'registrieren')){
    echo "  <script src=\"../js/validationLog.js\"></script>\n";
}
if(($page == 'erstellen') || ($page == 'bearbeiten')){
    echo "  <script src=\"../js/validation.js\"></script>\n";
}
if($page == 'shop'){
    echo "  <script src=\"../js/search.js\"></script>\n";
}
echo "  <script src=\"../js/font.js\"></script>\n";
echo "</body>\n";
echo "</html>\n";
?>