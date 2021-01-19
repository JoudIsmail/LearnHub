<?php
	/*
		do.php
		
			Ziel von HTML Formularen mit method="POST".
			
			Auf erster Ebene wird bestimmt, aus welchem HTML Formular die HTTP Anfrage tatsächlich stammt.
			
			Danach werden Primärfunktionen aufgerufen, die die HTML Formulare behandeln.
	
	*/

	if (session_status() == PHP_SESSION_NONE) {
			session_start();
	}

	require_once 'lib/primaerfunktionen.php';
	if(isset($_POST["logout"]))
	{
		session_destroy();
	}


	//HTML Formular zum Anmelden in anmelden.php
	if(isset($_POST["login"]))
	{

		try
		{
			login($_POST["email"], $_POST["password"]);

		} catch (userDoesntExistException $e)
		{
			header("Location: anmelden.php?error=benutzer_nicht_existent");
			exit;

		} catch (loginFieldEmptyException $e)
		{
			header("Location: anmelden.php?error=feld_leer");
			exit;

		} catch (loginException $e)
		{
			header("Location: anmelden.php?error=falsches_passwort");
			exit;

		} catch (alreadyLoggedInException $e)
		{
			header("Location: shop.php");
			exit;

		}

		header("Location: /nachricht.php?type=angemeldet");

	}

	//HTML Formular zum Registrieren in registrieren.php
	if(isset($_POST["register"]))
	{
		if(strcmp($_POST["password"], $_POST["passwordRepeat"]) !== 0)
		{
			header("Location: registrieren.php?error=wiederholung_falsch");
			exit;
		}
		try
		{
			register($_POST["email"], $_POST["password"]);

		} catch (alreadyRegisteredException $e)
		{
			header("Location: registrieren.php?error=bereits_registriert");
			exit;
		} catch (alreadyLoggedInException $e)
		{
			header("Location: shop.php");
			exit;

		} catch (registerFieldEmptyException $e)
		{
			header("Location: registrieren.php?error=feld_leer");
			exit;

		} catch (userFieldEmptyException $e)
		{
			echo "programming error";
		} catch (badPasswordException $e)
		{
			header("Location: registrieren.php?error=schlechtes_passwort");
			exit;
		} catch (badEmailException $e)
		{
			header("Location: registrieren.php?error=schlechte_email");
			exit;

		}
		header("Location: /nachricht.php?type=registriert");

	}

	//HTML Formular zum Löschen eines Kurses in adminpanel.php
	if(isset($_POST["deleteCourse"]))
	{
		deleteCourse($_POST["id"]);
		header("Location: adminpanel.php");

	}

	//HTML Formular zum Speichern von Änderungen an einem Kurs in kurs_bearbeiten.php
	if(isset($_POST["editCourse"]))
	{
		try
		{
			$_POST["courseImage"] = $_FILES["courseImage"];
			$_POST["instructorImage"] = $_FILES["instructorImage"];

			editCourse($_POST);

		} catch (courseNotOwnedException $e)
		{
			header("Location: /shop.php");
			exit;

		} catch (notLoggedInException $e)
		{
			header("Location: /anmelden.php");
			exit;

		} catch (courseDoesntExistException $e)
		{
			header("Location: /shop.php");
			exit;
		} catch (fileUploadFailedException $e)
		{
			echo "Dateiupload fehlgeschlagen. Kritischer Fehler.";
			exit;
		} catch (courseFieldEmptyException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=feld_leer");
			exit;
		} catch (badCourseTitleException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badTitle");
			exit;
		} catch (badCourseSummaryException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badSummary");
			exit;
		} catch (badCourseMaterialContentException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badMaterialContent");
			exit;
		} catch (badInstructorContactException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badInstructorContact");
			exit;
		} catch (badInstructorNameException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badInstructorName");
			exit;
		} catch (badCourseEducationalContentException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badEducationalContent");
			exit;
		} catch (badCourseSuitableForException $e)
		{
			header("Location: /kurs_bearbeiten.php?id=".$_POST["id"]."&error=badSuitableFor");
			exit;
		} catch (badCourseImageAltException $e)
		{
			header("Location: /kurs_erstellen.php?error=badCourseImageAlt");
			exit;

		}




		header("Location: /nachricht.php?type=bearbeitet");

	}

	//HTML Formular zum Erstellen eines neuen Kurses in kurs_erstellen.php
	if(isset($_POST["addCourse"]))
	{
		try
		{
			$_POST["courseImage"] = $_FILES["courseImage"];
			$_POST["instructorImage"] = $_FILES["instructorImage"];

			addCourse($_POST);

		} catch (notLoggedInException $e)
		{
			header("Location: /anmelden.php");
			exit;

		} catch (fileUploadFailedException $e)
		{
			echo "Dateiupload fehlgeschlagen. Kritischer Fehler.";
			exit;
		} catch (courseFieldEmptyException $e)
		{
			header("Location: /kurs_erstellen.php?error=feld_leer");
			exit;
		} catch (badCourseTitleException $e)
		{
			header("Location: /kurs_erstellen.php?error=badTitle");
			exit;
		} catch (badCourseSummaryException $e)
		{
			header("Location: /kurs_erstellen.php?error=badSummary");
			exit;
		} catch (badCourseMaterialContentException $e)
		{
			header("Location: /kurs_erstellen.php?error=badMaterialContent");
			exit;
		} catch (badInstructorContactException $e)
		{
			header("Location: /kurs_erstellen.php?error=badInstructorContact");
			exit;
		} catch (badInstructorNameException $e)
		{
			header("Location: /kurs_erstellen.php?error=badInstructorName");
			exit;
		} catch (badCourseEducationalContentException $e)
		{
			header("Location: /kurs_erstellen.php?error=badEducationalContent");
			exit;
		} catch (badCourseSuitableForException $e)
		{
			header("Location: /kurs_erstellen.php?error=badSuitableFor");
			exit;
		} catch (badCourseImageAltException $e)
		{
			header("Location: /kurs_erstellen.php?error=badCourseImageAlt");
			exit;

		}



		header("Location: /nachricht.php?type=erstellt");

	}

	//HTML Formular zum Kaufen eines Kurses entweder von kurse.php oder von shop.php
	if(isset($_POST["buyCourse"]))
	{
		try
		{
			buyCourse($_POST["id"]);
		} catch (notLoggedInException $e)
		{
			echo "nicht eingeloggt";
		} catch (alreadyBoughtException $e)
		{
			echo "schon gekauft";
		}
		header("Location: /nachricht.php?type=gekauft");
	}

	//HTML Formular zum Hinzufügen eines neuen Gästebucheintrags in gaestebuch.php
	if(isset($_POST["addEntry"]))
	{
		try
		{
			addEntry($_POST);
		} catch (entryFieldEmptyException $e)
		{
		}
		header("Location: /gaestebuch.php");

	}


?>
