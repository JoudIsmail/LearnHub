<?php

	/*
		primaerfunktionen.php
			
			Führen Operation durch, die zu Datenbestandsänderungen führen.
			Diese Operationen werden von do.php aufgerufen, also nachdem ein POST Formular abgesandt wurde.
			
			Diese Datei bedient sich an Funktionen aus hilfsfunktionen.php, um Datenbestände zu ändern.
	*/

	require_once 'hilfsfunktionen.php';


	function login($email, $password)
	{
		if (!isset($_SESSION["email"]))
		{
			if($email == "" or $password == "")
			{
				throw new loginFieldEmptyException("");
			}

			$accounts = readUsersFile();
			$account = findUserByEmail($accounts, $email);
			if($password == $account["password"])
			{
				$_SESSION["id"] = $account["id"];
				$courses = readCoursesFile();
				$_SESSION["email"] = $email;

			} 
			else
			{
				throw new loginException("");
			}

		}
		else
		{
			throw new alreadyLoggedInException("");
		}
	} 

	function register($email, $password)
	{
		if (!isset($_SESSION["email"]))
		{
			if($email == "" or $password == "")
			{
				throw new registerFieldEmptyException("");
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				throw new badEmailException("");
			}

			//falls passwort schlechte länge hat, dann werfe exception
			//strlen gibt lediglich die anzahl von bytes zurück, und nicht die anzahl von zeichen.
			//utf8 zeichen bestehen aus 1, 2, 3 oder 4 bytes
			//iso zeichen bestehen aus einem byte
			if (strlen(utf8_decode($password)) < 8 || strlen(utf8_decode($password)) > 20) {
				throw new badPasswordException("");
    			}

			if (!preg_match("#[0-9]+#", $password)) {
				throw new badPasswordException("");
			}

			if (!preg_match("#[a-z]+#", $password)) {
				throw new badPasswordException("");
			}

			if (!preg_match("#[A-Z]+#", $password)) {
				throw new badPasswordException("");
			}

			$specialChars = '!"#$%§&\'()*+,-./:;<=>@[\]^_`{|}~"';

			$specialCharUsed = false;
			foreach(str_split($specialChars) as $char)
			{
				if (strpos($password, $char) !== false) {
    			$specialCharUsed = true;
					break;
				}
			}

			if(!$specialCharUsed)
			{
				throw new badPasswordException("");
			}

			try
			{
				$accounts = readUsersFile();
				$account = findUserByEmail($accounts, $email);
			} 
			catch (userDoesntExistException $e)
			{
				$account = array();
				$account["email"] = $email;
				$account["password"] = $password;
				$account["id"] = countUsers();
				writeUser($account);
				login($email, $password);
				return;
			}
			throw new alreadyRegisteredException("");
		}
		else
		{
			throw new alreadyLoggedInException("");
		}
	}


	function deleteCourse($courseId)
	{
			$courses = readCoursesFile();
			$index = findCourseById($courses, $courseId);
			$course = $courses[$index];
			unset($courses[$index]);
			writeCoursesFile($courses);
	}


	function editCourse($course)
	{
		global $COURSE_IMAGE_PATH;
		global $INSTRUCTOR_IMAGE_PATH;
		global $COURSE_IMAGE_PATH_ABS;
		global $INSTRUCTOR_IMAGE_PATH_ABS;

		if(isset($_SESSION["email"]))
		{
			$courses = readCoursesFile();
			$index = findCourseById($courses, $course["id"]);

			if(strlen(utf8_decode(trim($_POST["summary"]))) > 500)
			{
				throw new badCourseSummaryException("");
			}
			if(strlen(utf8_decode(trim($_POST["title"]))) > 70)
			{
				throw new badCourseTitleException("");
			}
			if(strlen(utf8_decode(trim($_POST["instructorName"]))) > 30)
			{
				throw new badInstructorNameException("");
			}
			if(strlen(utf8_decode(trim($_POST["educationalContent"]))) > 1000)
			{
				throw new badCourseEducationalContentException("");
			}
			if(strlen(utf8_decode(trim($_POST["suitableFor"]))) > 1000)
			{
				throw new badCourseSuitableForException("");
			}
			if(strlen(utf8_decode(trim($_POST["instructorContact"]))) > 100)
			{
				throw new badInstructorContactException("");
			}
			if(strlen(utf8_decode(trim($_POST["materialContent"]))) > 300)
			{
				throw new badCourseMaterialContentException("");
			}
			if(strlen(utf8_decode(trim($_POST["courseImageAlt"]))) > 70)
			{
				throw new badCourseImageAltException("");
			}


			if($courses[$index]["creatorId"] == $_SESSION["id"])
			{
				if(isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] != UPLOAD_ERR_NO_FILE) 
				{
					$courseImagePath = $COURSE_IMAGE_PATH_ABS . "/" . $course["id"] . ".jpg";
					if (!move_uploaded_file($course['courseImage']['tmp_name'], $courseImagePath))
					{
   					throw new fileUploadFailedException("");
					}
					$courses[$index]["courseImagePath"] = $COURSE_IMAGE_PATH . "/" . $course["id"] . ".jpg";
					$course["courseImagePath"] = $courses[$index]["courseImagePath"];
				} 
				else
				{
					$course["courseImagePath"] = $courses[$index]["courseImagePath"];
				}

				if(isset($_FILES['instructorImage']) && $_FILES['instructorImage']['error'] != UPLOAD_ERR_NO_FILE) 
				{
					$instructorImagePath = $INSTRUCTOR_IMAGE_PATH_ABS . "/" . $course["id"] . ".jpg";
					if (!move_uploaded_file($course['instructorImage']['tmp_name'], $instructorImagePath))
					{
   					throw new fileUploadFailedException("");
					}
					$courses[$index]["instructorImagePath"] = $INSTRUCTOR_IMAGE_PATH . "/" . $course["id"] . ".jpg";
					$course["instructorImagePath"] = $courses[$index]["instructorImagePath"];
				} 
				else
				{
					$course["instructorImagePath"] = $courses[$index]["instructorImagePath"];
				}


				if($course["title"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["title"] = $course["title"];

				if($course["summary"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["summary"] = nl2br($course["summary"]);


				if($course["priceEuro"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["priceEuro"] = $course["priceEuro"];

				if($course["priceCent"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["priceCent"] = $course["priceCent"];


				if($course["educationalContent"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["educationalContent"] = nl2br($course["educationalContent"]);

				if($course["suitableFor"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["suitableFor"] = nl2br($course["suitableFor"]);

				if($course["materialContent"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["materialContent"] = nl2br($course["materialContent"]);

				if($course["instructorName"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["instructorName"] = $course["instructorName"];

				if($course["instructorContact"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["instructorContact"] = nl2br($course["instructorContact"]);


				if($course["hImpairedSuitability"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["hImpairedSuitability"] = $course["hImpairedSuitability"];

				if($course["vImpairedSuitability"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["vImpairedSuitability"] = $course["vImpairedSuitability"];

				if($course["courseImageAlt"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["courseImageAlt"] = $course["courseImageAlt"];
				
				writeCoursesFile($courses);
			}
			else
			{
				throw new courseNotOwnedException("");
			}
		}
		else
		{
			throw new notLoggedInException("");
		}
	}


	function addCourse($course)
	{
		global $COURSE_IMAGE_PATH;
		global $INSTRUCTOR_IMAGE_PATH;
		global $COURSE_IMAGE_PATH_ABS;
		global $INSTRUCTOR_IMAGE_PATH_ABS;

		if(isset($_SESSION["email"]))
		{
			$id = countCourses();
			$course["id"] = $id;
			$course["creatorId"] = $_SESSION["id"];

			if(strlen(utf8_decode(trim($_POST["summary"]))) > 500)
			{
				throw new badCourseSummaryException("");
			}
			if(strlen(utf8_decode(trim($_POST["title"]))) > 70)
			{
				throw new badCourseTitleException("");
			}
			if(strlen(utf8_decode(trim($_POST["instructorName"]))) > 30)
			{
				throw new badInstructorNameException("");
			}
			if(strlen(utf8_decode(trim($_POST["educationalContent"]))) > 1000)
			{
				throw new badCourseEducationalContentException("");
			}
			if(strlen(utf8_decode(trim($_POST["suitableFor"]))) > 1000)
			{
				throw new badCourseSuitableForException("");
			}
			if(strlen(utf8_decode(trim($_POST["instructorContact"]))) > 100)
			{
				throw new badInstructorContactException("");
			}
			if(strlen(utf8_decode(trim($_POST["materialContent"]))) > 300)
			{
				throw new badCourseMaterialContentException("");
			}
			if(strlen(utf8_decode(trim($_POST["courseImageAlt"]))) > 70)
			{
				throw new badCourseImageAltException("");
			}


			


			if(isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] != UPLOAD_ERR_NO_FILE) 
			{
				$courseImagePath = $COURSE_IMAGE_PATH_ABS . "/" . $course["id"] . ".jpg";
				if (!move_uploaded_file($course['courseImage']['tmp_name'], $courseImagePath))
				{
					throw new fileUploadFailedException("");
				}
				$course["courseImagePath"] = $COURSE_IMAGE_PATH . "/" . $course["id"] . ".jpg";
			}
			else
			{
				throw new courseFieldEmptyException("");
			}

			if(isset($_FILES['instructorImage']) && $_FILES['instructorImage']['error'] != UPLOAD_ERR_NO_FILE) 
			{
				$instructorImagePath = $INSTRUCTOR_IMAGE_PATH_ABS . "/" . $course["id"] . ".jpg";
				if (!move_uploaded_file($course['instructorImage']['tmp_name'], $instructorImagePath))
				{
					throw new fileUploadFailedException("");
				}
				$course["instructorImagePath"] = $INSTRUCTOR_IMAGE_PATH . "/" . $course["id"] . ".jpg";
			} 
			else
			{
				throw new courseFieldEmptyException("");
			}

			unset($course["courseImage"]);
			unset($course["instructorImage"]);

			if($course["title"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["summary"] == "")
			{
				throw new courseFieldEmptyException("");
			}else{
				$course["summary"] = nl2br($course["summary"]);
			}

			if($course["priceEuro"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["priceCent"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["educationalContent"] == "")
			{
				throw new courseFieldEmptyException("");
			}else{
				$course["educationalContent"] = nl2br($course["educationalContent"]);
			}


			if($course["suitableFor"] == "")
			{
				throw new courseFieldEmptyException("");
			}else{
				$course["suitableFor"] = nl2br($course["suitableFor"]);
			}


			if($course["materialContent"] == "")
			{
				throw new courseFieldEmptyException("");
			}else{
				$course["materialContent"] = nl2br($course["materialContent"]);
			}


			if($course["instructorName"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["instructorContact"] == "")
			{
				throw new courseFieldEmptyException("");
			}else{
				$course["instructorContact"] = nl2br($course["instructorContact"]);
			}


			if($course["hImpairedSuitability"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["vImpairedSuitability"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["courseImageAlt"] == "")
			{
				throw new courseFieldEmptyException("");
			}


			writeCourse($course, array());
			$course["participants"] = array();
		}
		else
		{
			throw new notLoggedInException("");
		}
	
	}

	function buyCourse($courseId)
	{
		if (isset($_SESSION["email"]))
		{
			$courses = readCoursesFile();
			$index = findCourseById($courses, $courseId);
			if(!in_array($_SESSION["id"], $courses[$index]["participants"]))
			{
				array_push($courses[$index]["participants"], $_SESSION["id"]);
				writeCoursesFile($courses);
			}
			else
			{
				throw new alreadyBoughtException("");
			}
		}
		else
		{
			throw new notLoggedInException("");
		}
		
	}


	function addEntry($entry)
	{
		date_default_timezone_set("Europe/Berlin");
		$timestamp = time();
		$datum = date("d.m.Y",$timestamp);
		$uhrzeit = date("H:i",$timestamp);
		$entry["dateTimeString"] = $datum . " " . $uhrzeit;
		if($entry["name"] == "" || $entry["comment"] == "" || $entry["title"] == "")
		{
			throw new entryFieldEmptyException("");
		}else{
			$entry["comment"] = nl2br($entry["comment"]);
		}
		writeEntry($entry);
	}
?>
