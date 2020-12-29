
<?php

	$_htmltitel = array(
												"gekauft" => "Kauf erfolgreich!",
												"erstellt" => "Kurs erfolgreich erstellt!",
												"bearbeitet" => "Kurs erfolgreich bearbeitet!",
												"abgemeldet" => "Erfolgreich abgemeldet!",
												"angemeldet" => "Erfolgreich angemeldet!",
												"login_fehlgeschlagen" => "Anmelden war nicht erfolgreich!",
												"erst_registrieren" => "Bitte Registrieren!",
												"registriert" => "Willkommen!",
												"unbefugt" => "Unbefugt!",
											);

	$_nachrichtentitel = array(
												"gekauft" => "Ihr Kauf war erfolgreich!",
												"erstellt" => "Ihr Kurs wurde erstellt!",
												"bearbeitet" => "Kurs erfolgreich bearbeitet!",
												"abgemeldet" => "Abmelden erfolgreich!",
												"angemeldet" => "Willkommen zurück!",
												"login_fehlgeschlagen" => "Anmelden war nicht erfolgreich!",
												"erst_registrieren" => "Bitte registrieren Sie sich.",
												"registriert" => "Herzlich Willkommen!",
												"unbefugt" => "Nicht erlaubt!",
											);

	$_nachrichten = array(
												"gekauft" => "Der Kursleiter wird Ihnen eine E-Mail mit weiteren Anweisungen schreiben. <br>Wir wünschen Ihnen viel Erfolg!",
												"erstellt" => "Sie können Ihren erstellten Kurs noch im Nachhinein bearbeiten.<br>Wir wünschen Ihnen viel Erfolg!",
												"bearbeitet" => "Sie haben Ihren Kurs erfolgreich bearbeitet!",
												"abgemeldet" => "Beehren Sie uns bald wieder!",
												"login_fehlgeschlagen" => "Es trat ein Fehler während Ihres Anmeldeversuches auf. Bitte versuchen Sie es noch einmal, oder Kontaktieren Sie uns unter ...!",
												"angemeldet" => "Wir freuen uns, dass Sie wieder da sind.",
												"erst_registrieren" => "Sie haben versucht, einen Kurs zu kaufen, obwohl Sie noch nicht angemeldet sind.<br>Nachdem Sie sich mit Ihrer E-Mail Adresse und einem Passwort einen Benutzer angelegt haben, können Sie unsere Dienstleistungen voll ausnutzen!",
												"registriert" => "Nun dass Sie sich einen Benutzer angelegt haben, können Sie Kurse kaufen, und auch erstellen. Viel Spaß und Erfolg !",
												"unbefugt" => "Der Eintritt in den Adminpanel ist Ihnen unbefugt! Versuchen Sie es mit dem Benutzername admin und Kennwort admin!",
											);
	
	$_redirects = array(
												"gekauft" => "/gekaufte_kurse.php",
												"erstellt" => "/erstellte_kurse.php",
												"bearbeitet" => "/erstellte_kurse.php",
												"abgemeldet" => "/shop.php",
												"angemeldet" => "/shop.php",
												"login_fehlgeschlagen" => "/anmelden.php",
												"erst_registrieren" => "/registrieren.php",
												"registriert" => "/shop.php",
												"unbefugt" => "/adminlogin.php",
											);

	$_redirecttext = array(
												"gekauft" => "Zu meinen gekauften Kursen",
												"erstellt" => "Zu meinen erstellten Kursen",
												"bearbeitet" => "Zu meinen erstellten Kursen",
												"abgemeldet" => "Zum Shop",
												"angemeldet" => "Zum Shop",
												"login_fehlgeschlagen" => "Zurück zur Anmeldung",
												"erst_registrieren" => "Zur Registration",
												"registriert" => "Zum Shop",
												"unbefugt" => "Zum Admin Login",
											);


	
	
	if(!isset($_GET["type"]))
	{
		header("Location: shop.php");
	}

	$nachrichttyp = $_GET["type"];
	$titel = $_htmltitel[$nachrichttyp];
	$titel2 = $_nachrichtentitel[$nachrichttyp];
	$nachricht = $_nachrichten[$nachrichttyp];
	$redirect = $_redirects[$nachrichttyp];
	$redirecttext = $_redirecttext[$nachrichttyp];

	echo "<!DOCTYPE html>\n";
	echo "<html lang=\"de\">\n";
	echo "	<head>\n";
	echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\"> \n";
	echo "		<link rel=\"stylesheet\" href='https://fonts.googleapis.com/css?family=Poppins'>\n";
	echo "		<meta charset=\"UTF-8\">\n";
	echo "		<title>".$titel." </title>\n";
	echo "	</head>\n";
	echo "	<body class=\"body_kaufnachricht\">\n";
	echo "		<h1> <span class=\"span-bg\">".$titel2." </span> <br>".$nachricht."</h1>\n";
	echo "		<a class=\"redirect\" href=\"$redirect\">$redirecttext</a>\n";
	echo "	</body>\n";
	echo "</html>\n";


?>
