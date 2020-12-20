<?php

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
				$boughtCourses = getBoughtCourses($courses, $_SESSION["id"]);
				$_SESSION["boughtCourses"] = $boughtCourses;
				$createdCourses = getCreatedCourses($courses, $_SESSION["id"]);
				$_SESSION["createdCourses"] = $createdCourses;
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

				$courses[$index]["summary"] = $course["summary"];


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

				$courses[$index]["educationalContent"] = $course["educationalContent"];

				if($course["suitableFor"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["suitableFor"] = $course["suitableFor"];

				if($course["materialContent"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["materialContent"] = $course["materialContent"];

				if($course["instructorName"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["instructorName"] = $course["instructorName"];

				if($course["instructorContact"] == "")
				{
					throw new courseFieldEmptyException("");
				}

				$courses[$index]["instructorContact"] = $course["instructorContact"];


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
				$_SESSION["createdCourses"][$course["id"]] = $course;
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
			}

			if($course["suitableFor"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["materialContent"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["instructorName"] == "")
			{
				throw new courseFieldEmptyException("");
			}

			if($course["instructorContact"] == "")
			{
				throw new courseFieldEmptyException("");
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
			$_SESSION["createdCourses"][$course["id"]] = $course;
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
			if(!isset($_SESSION["boughtCourses"][$courseId]))
			{
				$courses = readCoursesFile();
				$index = findCourseById($courses, $courseId);
				array_push($courses[$index]["participants"], $_SESSION["id"]);
				writeCoursesFile($courses);
				$course = $courses[$index];
				$_SESSION["boughtCourses"][$course["id"]] = $course;
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
		}
		writeEntry($entry);
	}
?>
