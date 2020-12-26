<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'registrieren';
require_once('lib/sekundaerfunktionen.php');
require_once('inc/header.php');
require_once('do.php');
redirectIfLoggedIn("shop.php");

if(isset($_GET["error"]))
{
	if($_GET["error"] == "bereits_registriert")
	{
		
		echo "<h1 style=\"color:red\">Es gibt bereits bereits einen Benutzer mit der angegebenen E-Mail Addresse. Bitte melden Sie sich mit Ihren Nutzerdaten an, oder kontaktieren Sie uns.</h1>";
	}else if($_GET["error"] == "feld_leer")
	{
		echo "<h1 style=\"color:red\">Ein oder mehrere Eingabefelder wurden nicht ausgefüllt. Bitte versuchen Sie es noch einmal.</h1>";
	}

}


echo "            <div class=\"outer\">\n";
echo "            <div class=\"box\">\n";
echo "                <form action=\"do.php\" method= \"post\" accept-charset= \"UTF-8\">\n";
echo "                    <h1 class=\"text-center\">Registrieren</h1>\n";
echo "                <div class=\"input-container\">\n";
echo "                    <input id=\"email\" name=\"email\" type=\"email\" required=\"\" placeholder=\"E-Mail Addresse\"/>		\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip\"></span>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip-1\"></span>\n";
echo "                </div>\n";
echo "                <div class=\"input-container\">\n";
echo "                    <input id=\"password\" name=\"password\" type=\"password\" required=\"\" placeholder=\"Passwort\" onkeypress=\"return AvoidSpace(event)\"/>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPass\"></span>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPassStrength\"></span>\n";
echo "                </div>\n";
echo "                <div class=\"input-container\">		\n";
echo "                    <input id=\"confirm-pass\" name=\"password\" type=\"password\" required=\"\" placeholder=\"Passwort wiederholen\" onkeypress=\"return AvoidSpace(event)\"/>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPassConf\"></span>\n";
echo "                </div>\n";
echo "                    <input id=\"register\" name=\"register\" type=\"submit\" class=\"btn-01\"  value=\"Registrieren\"/>\n";
echo "            </form>	\n";
echo "            </div> \n";
echo "        </div>\n";
require_once('inc/footer.php');
?>
