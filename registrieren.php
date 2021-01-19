<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = 'registrieren';
require_once('lib/sekundaerfunktionen.php');
require_once('inc/header.php');
require_once('do.php');
redirectIfLoggedIn("shop.php");



echo "            <div class=\"outer\">\n";
echo "            <div class=\"box\">\n";
echo "                <form action=\"do.php\" method= \"post\" accept-charset= \"UTF-8\">\n";
echo "                    <h1 class=\"text-center\">Registrieren</h1>\n";
echo "                <div class=\"input-container\">\n";
if(isset($_GET["error"]))
{

	switch($_GET["error"])
	{
		case "bereits_registriert":
			echo "<span class=\"spanError\">Es gibt bereits bereits einen Benutzer mit der angegebenen E-Mail Adresse.<br> Bitte melden Sie sich mit Ihren Nutzerdaten an, oder kontaktieren Sie uns.</span>";
			break;
		case "feld_leer":
			echo "<span class=\"spanError\">Ein oder mehrere Eingabefelder wurden nicht ausgefüllt. Bitte versuchen Sie es noch einmal.</span>";
			break;
		case "wiederholung_falsch":
			echo "<span class=\"spanError\">Das Passwort wurde nicht korrekt wiederholt. Bitte versuchen Sie es noch einmal.</span>";
			break;
		case "schlechtes_passwort":
			echo "<span class=\"spanError\">Ihr gewähltes Passwort erfüllt nicht die Vorraussetzungen für ein sicheres Passwort. Bitte wählen Sie ein geeignetes Passwort.</span>";
			break;
		case "schlechte_email":
			echo "<span class=\"spanError\">Die von Ihnen angegebene E-Mail Adresse ist nicht gültig. Bitte geben Sie eine gültige E-Mail Adresse ein.</span>";
			break;

	}
}
echo "                    <input id=\"email\" name=\"email\" type=\"email\" required=\"\" placeholder=\"E-Mail Adresse\"/>		\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip\"></span>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltip-1\"></span>\n";
echo "                </div>\n";
echo "                <div class=\"input-container\">\n";
echo "                    <input id=\"password\" name=\"password\" type=\"password\" required=\"\" placeholder=\"Passwort\" onkeypress=\"return AvoidSpace(event)\"/>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPass\"></span>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPassStrength\"></span>\n";
echo "                </div>\n";
echo "                <div class=\"input-container\">		\n";
echo "                    <input id=\"confirm-pass\" name=\"passwordRepeat\" type=\"password\" required=\"\" placeholder=\"Passwort wiederholen\" onkeypress=\"return AvoidSpace(event)\"/>\n";
echo "                            <span class= \"tooltip left\" id=\"tooltipPassConf\"></span>\n";
echo "                </div>\n";
echo "								<noscript>\n";
echo " 		 	         		<p style=\"color:white\"> Das Passwort muss 8 bis 20 Zeichen haben, und aus folgenden Dingen bestehen:<ul style=\"color:white\"><li>mindestens ein Kleinbuchstabe</li><li>mindestens ein Großbuchstabe</li><li>mindestens eine Zahl (0-9)</li><li>mindestens ein Sonderzeichen (Erlaubt sind " . '!"#$%&\'()*+,-./:;<=>@[]^_`{|}~@' . ")</li><li>Keine Leerzeichen</li></ul></p>\n";
echo "								</noscript>\n";
echo "								<br>\n";
echo "                    <input id=\"register\" name=\"register\" type=\"submit\" class=\"btn-01\"  value=\"Registrieren\"/>\n";
echo "            </form>	\n";
echo "            </div> \n";
echo "        </div>\n";
require_once('inc/footer.php');
?>
