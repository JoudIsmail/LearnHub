<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'login';
require_once('inc/header.php');
require_once('do.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedIn("shop.php");


echo "            <section class=\"outer\">\n";
echo "                    <div class=\"box\">\n";
echo "                        <form action=\"do.php\" method= \"post\" accept-charset= \"UTF-8\">\n";
echo "                            <h1 class=\"text-center\">Anmelden</h1>\n";
echo "                        <div class=\"input-container\">\n";
if(isset($_GET["error"]))
{
	if($_GET["error"] == "benutzer_nicht_existent")
	{
		
		echo "<span class=\"spanError\">Es gibt keinen registrierten Benutzer mit der eingegebenen E-Mail Addresse.<br> Bitte überprüfen Sie Ihre Eingabe,<br> oder registrieren Sie sich unter Ihrer eingegebenen E-Mail Addresse</span>";
	}else if($_GET["error"] == "feld_leer")
	{
		echo "<span class=\"spanError\">Ein oder mehrere Eingabefelder wurden nicht ausgefüllt. Bitte versuchen Sie es noch einmal.</span>";
	}else if($_GET["error"] == "falsches_passwort")
	{
		echo "<span class=\"spanError\">Ihr eingegebenes Passwort ist falsch. Bitte versuchen Sie es noch einmal, oder kontaktieren Sie uns.</span>";
	}


}
echo "                            <input id=\"email\" name=\"email\" type=\"email\" required=\"\" placeholder=\"E-Mail Addresse\"/>		\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip\"></span>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip-1\"></span>\n";
echo "                        </div>\n";
echo "                        <div class=\"input-container\">\n";
echo "                            <input id=\"password\" name=\"password\" type=\"password\" required=\"\" placeholder=\"Passwort\" onkeypress=\"return AvoidSpace(event)\"/>	\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPass\"></span>\n";
echo "                        </div>\n";
echo "                            <button id=\"login\" name=\"login\" type=\"submit\" class=\"btn-01\">Anmelden</button>\n";
echo "                    </form>	\n";
echo "                    </div>\n";
echo "            </section>\n";
echo "            \n";
require_once('inc/footer.php');
 ?>