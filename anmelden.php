<?php session_start(); 
$page = 'login';
require_once('inc/header.php');
require_once('do.php');
require_once('lib/sekundaerfunktionen.php');
redirectIfLoggedIn("shop.php");

if(isset($_GET["error"]))
{
	if($_GET["error"] == "benutzer_nicht_existent")
	{
		
		echo "<h1 style=\"color:red\">Es gibt keinen registrierten Benutzer mit der eingegebenen E-Mail Addresse. Bitte überprüfen Sie Ihre Eingabe, oder registrieren Sie sich unter Ihrer eingegebenen E-Mail Addresse</h1>";
	}else if($_GET["error"] == "feld_leer")
	{
		echo "<h1 style=\"color:red\">Ein oder mehrere Eingabefelder wurden nicht ausgefüllt. Bitte versuchen Sie es noch einmal.</h1>";
	}else if($_GET["error"] == "falsches_passwort")
	{
		echo "<h1 style=\"color:red\">Ihr eingegebenes Passwort ist falsch. Bitte versuchen Sie es noch einmal, oder kontaktieren Sie uns.</h1>";
	}


}
echo "            <div class=\"outer\">\n";
echo "                    <div class=\"box\">\n";
echo "                        <form action=\"do.php\" method= \"post\" accept-charset= \"UTF-8\">\n";
echo "                            <h1 class=\"text-center\">Anmelden</h1>\n";
echo "                        <div class=\"input-container\">\n";
echo "                            <input name=\"email\" type=\"email\" required=\"\" placeholder=\"E-Mail Addresse\"/>		\n";
echo "                        </div>\n";
echo "                        <div class=\"input-container\">\n";
echo "                            <input name=\"password\" type=\"password\" required=\"\" placeholder=\"Passwort\"/>	\n";
echo "                        </div>\n";
echo "                            <button name=\"login\" type=\"submit\" class=\"btn-01\">Anmelden</button>\n";
echo "                    </form>	\n";
echo "                    </div>\n";
echo "            </div>\n";
echo "            \n";
require_once('inc/footer.php');
 ?>
