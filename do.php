<?php
	if (session_status() == PHP_SESSION_NONE) {
			session_start();
	}

	require_once 'lib/primaerfunktionen.php';
	if(isset($_POST["logout"]))
	{
		session_destroy();
	}

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

	if(isset($_POST["register"]))
	{
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
		}
		header("Location: /nachricht.php?type=registriert");

	}

	if(isset($_POST["deleteCourse"]))
	{
		deleteCourse($_POST["id"]);
		header("Location: adminpanel.php");

	}


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
		}
		header("Location: /nachricht.php?type=bearbeitet");

	}

	if(isset($_POST["addCourse"]))
	{
		try
		{
			$_POST["courseImage"] = $_FILES["courseImage"];
			$_POST["instructorImage"] = $_FILES["instructorImage"];

			addCourse($_POST);

		} catch (notLoggedInException $e)
		{
			echo "nich eingeloggt";

		} catch (fileUploadFailedException $e)
		{
			echo "datei fail";
		} catch (courseFieldEmptyException $e)
		{
			echo "vergessen einzugeben";
		}

		header("Location: /nachricht.php?type=erstellt");

	}

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
