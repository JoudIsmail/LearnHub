<?php

	/*
		hilfsfunktionen.php

			Datenbestandsfunktionen benutzt von Primärfunktionen und Sekundärfunktionen.
	*/

	require_once 'ausnahmen.php';


	/*
			Key Arrays dienen zur Übersetzung von Indizes zu Assoziativen Array-Schlüsseln.
			Sie geben die Schreibereihenfolge der Daten in einem CSV Feld an.
	*/
												
	$COURSE_KEYS = array(
										0 => "id", 
										1 => "title",
										2 => "summary", //kurzbeschreibung
										3 => "courseImagePath", //pfad zum kursbild auf dem server
										4 => "priceCent", 
										5 => "priceEuro",
										6 => "educationalContent", //lernbare themen
										7 => "suitableFor", //für wen ist der kurs geeignet
										8 => "materialContent", //was ist im kurs enthalten 
										9 => "instructorName", //name des kursleiters
										10 => "instructorContact",
										11 => "instructorImagePath", //pfad zum bild des kursleiters auf dem server
										12 => "hImpairedSuitability", //ist der kurs für hörbehinderte geeignet?
										13 => "vImpairedSuitability", //ist der kurs für sehbehinderte geeignet?
										14 => "courseImageAlt", //text beschreibung des kurs bildes
										15 => "creatorId", //benutzer-id des kurs besitzers
									);

	$ENTRY_KEYS = array(
												0 => "title",
												1 =>"comment",
												2 => "name",
												3 =>"dateTimeString",
											);


	$USER_KEYS = array(
												0 => "id",
												1 => "email",
												2 => "password",
											);

	
	//Pfad zur CSV Datei, in der Kurse gespeichert werden
	$COURSES_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/courses.csv";
	//Pfad zur CSV Datei, in der Gästebucheinträge gespeichert werden
	$ENTRIES_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/entries.csv";
	//Pfad zur CSV Datei, in der Benutzeraccounts gespeichert werden
	$USERS_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/users.csv";
	

	//Absoluter Pfad zum Ordner, in dem hochgeladene Kursbilder gespeichert werden
	$COURSE_IMAGE_PATH_ABS = $_SERVER["DOCUMENT_ROOT"] . "/bilder/course-images"; //absoluter pfad (also mit angabe des dateisystems)
	$COURSE_IMAGE_PATH = "/bilder/course-images"; //nicht angewendet
	//Absoluter Pfad zum Ordner, in dem hochgeladene Bilder von Kurserstellern gespeichert werden
	$INSTRUCTOR_IMAGE_PATH_ABS = $_SERVER["DOCUMENT_ROOT"] . "/bilder/instructor-images";
	$INSTRUCTOR_IMAGE_PATH = "/bilder/instructor-images"; //nicht angewendet


	


	/*
			Erstellt nötige Dateien und Ordner, falls sie nicht bereits existieren.
	*/
	function init_fs()
	{

		global $COURSES_PATH;
		global $ENTRIES_PATH;
		global $USERS_PATH;
		global $INSTRUCTOR_IMAGE_PATH_ABS;
		global $COURSE_IMAGE_PATH_ABS;

		//falls Datei unter $path nicht existiert, kreiere die Datei
		function create_file_if_not_exists($path)
		{
			if(!file_exists($path))
			{
				$f = fopen($path, "w");
				fclose($f);
			}
		}

		//falls Ordner unter $path nicht existiert, kreiere den Ordner
		function create_dir_if_not_exists($path)
		{
			if(!is_dir($path))
			{
				mkdir($path);
			}
		}

		create_file_if_not_exists($COURSES_PATH);
		create_file_if_not_exists($ENTRIES_PATH);
		create_file_if_not_exists($USERS_PATH);

		create_dir_if_not_exists($COURSE_IMAGE_PATH_ABS);
		create_dir_if_not_exists($INSTRUCTOR_IMAGE_PATH_ABS);

	}


	init_fs();





	

	/*
			Gibt Anzahl der Kurse aus.
	*/
	function countCourses()
	{
		
		//Anzahl der CSV Felder in der courses.csv
		$amount = 0;
		if(($handle = fopen($GLOBALS["COURSES_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$amount = $amount + 1;
			}
		}
		//Ein Kurs besteht aus zwei CSV Feldern, daher durch 2 dividieren
		return $amount / 2;
	}


	/*
			Gibt Anzahl der Benutzeraccounts aus.
	*/
	function countUsers()
	{
		//Anzahl der CSV Felder in der users.csv
		$amount = 0;
		if(($handle = fopen($GLOBALS["USERS_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$amount = $amount + 1;
			}
		}
		
		return $amount;

	}



	/*
			Gibt ein Array bestehend aus registrierten Benutzern aus.
			Ein Benutzer ist ein assoziatives Array.
			Indizes des ausgegebenen Arrays sind nicht Benutzer-IDs.
	*/
	function readUsersFile()
	{
		global $USER_KEYS;

		$users_index = 0;
		$users = array();
		if(($handle = fopen($GLOBALS["USERS_PATH"], "r")) !== false)
		{
			//für jedes CSV Feld $data in users.csv
			while(($data = fgetcsv($handle)) !== false)
			{
				$user = array();
				//index eines elements im csv-feld $data
				$csvfield_index = 0;
				//für jedes csv-element im csv-feld $data
				foreach($data as $value)
				{
					//$user bestücken
					$user[$USER_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				//$user in $users hinzufügen
				$users[$users_index] = $user;
				$users_index = $users_index + 1;
			}
		}
		return $users;
	
	}


	/*
			Gibt ein Array bestehend aus existierenden Kursen aus.
			Ein Kurs ist ein assoziatives Array.
			Indizes des ausgegebenen Arrays sind nicht Kurs-IDs.
	*/
	function readCoursesFile()
	{
		global $COURSE_KEYS;

		$courses_index = 0;
		$courses = array();
		if(($handle = fopen($GLOBALS["COURSES_PATH"], "r")) !== false)
		{
			//für jedes CSV Feld $data in courses.csv
			while(($data = fgetcsv($handle)) !== false)
			{
				$course = array();
				//index eines elements im csv-feld $data
				$csvfield_index = 0;
				//für jedes csv-element im csv-feld $data
				foreach($data as $value)
				{
					//$course bestücken
					$course[$COURSE_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				//das nächste CSV feld besteht aus teilnehmenden benutzer-IDs
				$course["participants"] = fgetcsv($handle);
				$courses[$courses_index] = $course;
				$courses_index = $courses_index + 1;
			}
		}
		return $courses;


	}


	/*
			Gibt ein Array bestehend aus existierenden Gästebucheinträgen aus.
			Ein Eintrag ist ein assoziatives Array.
	*/
	function readEntriesFile()
	{
		global $ENTRY_KEYS;

		$entries_index = 0;
		$entries = array();
		if(($handle = fopen($GLOBALS["ENTRIES_PATH"], "r")) !== false)
		{
			//für jedes CSV Feld $data in entries.csv
			while(($data = fgetcsv($handle)) !== false)
			{
				$entry = array();
				//index eines elements im csv-feld $data
				$csvfield_index = 0;
				//für jedes csv-element im csv-feld $data
				foreach($data as $value)
				{
					//$entry bestücken
					$entry[$ENTRY_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				$entries[$entries_index] = $entry;
				$entries_index = $entries_index + 1;
			}
		}
		return $entries;

	}



	/*
			Überschreibt die courses.csv
			Parameter $courses ist ein Array bestehend aus assoziativen Arrays, die Kurse repräsentieren.
	*/
	function writeCoursesFile($courses)
	{
		global $COURSE_KEYS;

		//vor dem überschreiben sichern
		copy($GLOBALS["COURSES_PATH"], $GLOBALS["COURSES_PATH"] . "_safe");

		//courses.csv leeren
		if(($handle = fopen($GLOBALS["COURSES_PATH"], "w")) !== false)
		{
		}

		//für jeden $course in $courses
		foreach($courses as $course)
		{
			//toWrite ist Kopie von $course, wobei dessen elemente in korrekter reihenfolge initialisiert werden.
			//Dadurch kann die courses.csv später wieder in vorhersehbarer reihenfolge eingelesen werden.
			$toWrite = array();
			foreach($COURSE_KEYS as $key => $value)
			{
				//falls ein benötigtes Feld nicht in $course existiert, soll do.php über diesen fehler informiert werden
				if(!isset($course[$value]))
				{
					//gesicherte courses.csv widerherstellen
					copy($GLOBALS["COURSES_PATH"] . "_safe", $GLOBALS["COURSES_PATH"]);

					throw new courseFieldEmptyException("");
				}
				$toWrite[$key] = $course[$value];
			}
			
			if(($handle = fopen($GLOBALS["COURSES_PATH"], "a")) !== false)
			{
				fputcsv($handle, $toWrite);
				fputcsv($handle, $course["participants"]);
			}

		}

	}


	/*
			Fügt einen Kurs in courses.csv hinzu.
			Parameter $course ist ein assoziatives Array, welches einen Kurs repräsentiert.
			Parameter $participants ist ein Array bestehend aus Benutzer-iDs, die am Kurs teilnehmen.
	*/
	function writeCourse($course, $participants)
	{
		global $COURSE_KEYS;

		$toWrite = array();
		foreach($COURSE_KEYS as $key => $value)
		{
			//falls ein benötigtes feld in $course nicht existiert, informiere do.php über diesen fehler
			if(!isset($course[$value]))
			{
				throw new courseFieldEmptyException("");
			}

			$toWrite[$key] = $course[$value];
		}

		if(($handle = fopen($GLOBALS["COURSES_PATH"], "a")) !== false)
		{
			fputcsv($handle, $toWrite);
			fputcsv($handle, $participants);
		}

	}


	/*
			Fügt einen Gästebucheintrag in entries.csv hinzu
			Parameter $entry ist ein assoziatives Array, welches einen Gästebucheintrag repräsentiert.
	*/
	function writeEntry($entry)
	{
		global $ENTRY_KEYS;

		$toWrite = array();
		foreach($ENTRY_KEYS as $key => $value)
		{
			//falls ein benötigtes feld in $entry nicht existiert, informiere do.php über diesen fehler
			if(!isset($entry[$value]))
			{
				throw new entryFieldEmptyException("");
			}

			$toWrite[$key] = $entry[$value];
		}

		if(($handle = fopen($GLOBALS["ENTRIES_PATH"], "a")) !== false)
		{
			fputcsv($handle, $toWrite);
		}

	}

	/*
			Fügt einen Benutzeraccount in users.csv hinzu
			Parameter $user ist ein assoziatives Array, welches einen Benutzeraccount repräsentiert.
	*/
	function writeUser($user)
	{
		global $USER_KEYS;

		$toWrite = array();
		foreach($USER_KEYS as $key => $value)
		{
			//falls ein benötigtes feld in $users nicht existiert, informiere do.php über diesen fehler
			if(!isset($user[$value]))
			{
				throw new userFieldEmptyException("");
			}

			$toWrite[$key] = $user[$value];
		}

		if(($handle = fopen($GLOBALS["USERS_PATH"], "a")) !== false)
		{
			fputcsv($handle, $toWrite);
		}

	}


	/*
			Sucht im Array bestehend aus Kurs-Arrays $courses nach einem Kurs mit angegebener $courseId.
			Gibt den Index zurück, an dem der Kurs gefunden wurde.
	*/
	function findCourseById($courses, $courseId)
	{

		foreach($courses as $key => $value)
		{
			if($value["id"] == $courseId)
			{
				return $key;
			}
		}

		throw new courseDoesntExistException("");
	}


	/*
			Sucht im Array bestehend aus Kurs-Arrays $courses nach Kursen, bei denen der Benutzer mit Benutzer-ID 
				$userId Teilnehmer ist.
			Rückgabe ist ein Array bestehend aus Kursen, wobei die Indizes die Kurs-IDs sind.
	*/
	function getBoughtCourses($courses, $userId)
	{
		
		$boughtCourses = array();

		//für jeden kurs in $courses
		foreach($courses as $key => $value)
		{
			//falls $userId in den teilnehmern des kurses auftaucht
			if(in_array($userId, $value["participants"]))
			{
				//hinzufügen des gefundenen kurses in boughtCourses
				$boughtCourses[$value["id"]] = $value;
			}
		}
	
		return $boughtCourses;

	}


	/*
			Sucht im Array bestehend aus Kurs-Arrays $courses nach Kursen, die vom Benutzer mit Benutzer-ID 
				$userId erstellt wurden.
			Rückgabe ist ein Array bestehend aus Kursen, wobei die Indizes die Kurs-IDs sind.
	*/
	function getCreatedCourses($courses, $userId)
	{
		$createdCourses = array();

		//für jeden kurs in $courses
		foreach($courses as $key => $value)
		{
			//falls $userid der ersteller des kurses ist
			if($value["creatorId"] == $userId)
			{
				//hinzufügen des gefundenen kurses in createdCourses
				$createdCourses[$value["id"]] = $value;
			}
		}
	
		return $createdCourses;


	}


	/*
			Sucht in einem Array bestehend aus Benutzer-Arrays nach einem Benutzeraccount, dessen email $email ist.
			Rückgabe ist der gefundene Benutzeraccount.
	*/
	function findUserByEmail($users, $email)
	{
		//für jeden Benutzer in $users
		foreach($users as $key => $value)
		{
			//falls die email adresse des benutzers mit dem zu suchenden parameter übereinstimmt
			if($value["email"] == $email)
			{
				//direkte ausgabe des gefundenen benutzer-accounts
				return $value;
			}
		}

		throw new userDoesntExistException("");

	}


	/*
			Sucht in einem Array bestehend aus Benutzer-Arrays nach einem Benutzeraccount, dessen Benutzer-ID $userId ist.
			Rückgabe ist der gefundene Benutzeraccount.
	*/

	function findUserById($users, $userId)
	{

		//für jeden Benutzer in $users
		foreach($users as $key => $value)
		{
			//falls die Benutzer-ID des Benutzers mit dem parameter übereinstimmt
			if($value["id"] == $userId)
			{
				//direkte ausgabe des gefundenen Benutzer-accounts
				return $value;
			}
		}

		throw new userDoesntExistException("");


	}
?>
