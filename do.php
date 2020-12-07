<?php

	include 'lib/primaerfunktionen.php';

	session_start();
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
			echo "gibts nich";

		} catch (loginFieldEmptyException $e)
		{
			echo "leer";

		} catch (loginException $e)
		{
			echo "falsch";

		} catch (alreadyLoggedInException $e)
		{
			echo "biste schon";

		}

	}

	if(isset($_POST["register"]))
	{
		try
		{
			register($_POST["email"], $_POST["password"]);

		} catch (alreadyRegisteredException $e)
		{
			echo "schon da";

		} catch (alreadyLoggedInException $e)
		{
			echo "biste schon ";

		} catch (registerFieldEmptyException $e)
		{
			echo "leer";

		} catch (userFieldEmptyException $e)
		{
			echo "programming error";
		}

	}

	if(isset($_POST["deleteCourse"]))
	{
		try
		{
			deleteCourse($_POST["id"]);

		} catch (courseDoesntExistException $e)
		{
			echo "gibts nich";

		} catch (courseNotOwnedException $e)
		{
			echo "nich deins ";

		} catch (notLoggedInException $e)
		{
			echo "nich eingeloggt";
		}


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
			echo "nich deins ";

		} catch (notLoggedInException $e)
		{
			echo "nich eingeloggt";

		} catch (courseDoesntExistException $e)
		{
			echo "gibts nich";
		} catch (fileUploadFailedException $e)
		{
			echo "datei fail";
		} catch (courseFieldEmptyException $e)
		{
			echo "vergessen einzugeben";
		}

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
	}

	if(isset($_POST["addEntry"]))
	{
		try
		{
			addEntry($_POST);
		} catch (entryFieldEmptyException $e)
		{
			echo "nicht ausgefüllt";
		}

	}


?>
