<?php
	require_once 'ausnahmen.php';
												
	$COURSE_KEYS = array(
												0 => "id",
												1 => "title",
												2 => "summary",
												3 => "courseImagePath",
												4 => "priceCent",
												5 => "priceEuro",
												6 => "educationalContent",
												7 => "suitableFor",
												8 => "materialContent",
												9 => "instructorName",
												10 => "instructorContact",
												11 => "instructorImagePath",
												12 => "hImpairedSuitability",
												13 => "vImpairedSuitability",
												14 => "courseImageAlt",
												15 => "creatorId",
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
	
	$COURSES_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/courses.csv";
	$ENTRIES_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/entries.csv";
	$USERS_PATH = $_SERVER["DOCUMENT_ROOT"] . "/private/data/users.csv";
	$COURSE_IMAGE_PATH_ABS = $_SERVER["DOCUMENT_ROOT"] . "/bilder/course-images";
	$INSTRUCTOR_IMAGE_PATH_ABS = $_SERVER["DOCUMENT_ROOT"] . "/bilder/instructor-images";
	$COURSE_IMAGE_PATH = "/bilder/course-images";
	$INSTRUCTOR_IMAGE_PATH = "/bilder/instructor-images";


													


	function countCourses()
	{
		$amount = 0;
		if(($handle = fopen($GLOBALS["COURSES_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$amount = $amount + 1;
			}
		}
		
		return $amount / 2;
	}

	function countUsers()
	{
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

	function readUsersFile()
	{
		global $USER_KEYS;

		$entries_index = 0;
		$entries = array();
		if(($handle = fopen($GLOBALS["USERS_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$entry = array();
				$csvfield_index = 0;
				foreach($data as $value)
				{
					$entry[$USER_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				$entries[$entries_index] = $entry;
				$entries_index = $entries_index + 1;
			}
		}
		return $entries;
	

		
	}

	function readCoursesFile()
	{
		global $COURSE_KEYS;

		$entries_index = 0;
		$entries = array();
		if(($handle = fopen($GLOBALS["COURSES_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$entry = array();
				$csvfield_index = 0;
				foreach($data as $value)
				{
					$entry[$COURSE_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				$entry["participants"] = fgetcsv($handle);
				$entries[$entries_index] = $entry;
				$entries_index = $entries_index + 1;
			}
		}
		return $entries;


	}

	function readEntriesFile()
	{
		global $ENTRY_KEYS;

		$entries_index = 0;
		$entries = array();
		if(($handle = fopen($GLOBALS["ENTRIES_PATH"], "r")) !== false)
		{
			while(($data = fgetcsv($handle)) !== false)
			{
				$entry = array();
				$csvfield_index = 0;
				foreach($data as $value)
				{
					$entry[$ENTRY_KEYS[$csvfield_index]] = $value;
					$csvfield_index = $csvfield_index + 1;
				}
				$entries[$entries_index] = $entry;
				$entries_index = $entries_index + 1;
			}
		}
		return $entries;

	}

	function writeCoursesFile($courses)
	{
		global $COURSE_KEYS;

		if(($handle = fopen($GLOBALS["COURSES_PATH"], "w")) !== false)
		{
		}

		foreach($courses as $course)
		{
			$toWrite = array();
			foreach($COURSE_KEYS as $key => $value)
			{
				if(!isset($course[$value]))
				{
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

	function writeCourse($course, $participants)
	{
		global $COURSE_KEYS;

		$toWrite = array();
		foreach($COURSE_KEYS as $key => $value)
		{
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

	function writeEntry($entry)
	{
		global $ENTRY_KEYS;

		$toWrite = array();
		foreach($ENTRY_KEYS as $key => $value)
		{
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

	function writeUser($user)
	{
		global $USER_KEYS;

		$toWrite = array();
		foreach($USER_KEYS as $key => $value)
		{
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

	function getBoughtCourses($courses, $userId)
	{
		
		$boughtCourses = array();

		foreach($courses as $key => $value)
		{

			if(in_array($userId, $value["participants"]))
			{
				$boughtCourses[$value["id"]] = $value;
			}
		}
	
		return $boughtCourses;


	}

	function getCreatedCourses($courses, $userId)
	{
		$createdCourses = array();

		foreach($courses as $key => $value)
		{

			if($value["creatorId"] == $userId)
			{
				$createdCourses[$value["id"]] = $value;
			}
		}
	
		return $createdCourses;


	}

	function findUserByEmail($users, $email)
	{
		foreach($users as $key => $value)
		{

			if($value["email"] == $email)
			{
				return $value;
			}
		}

		throw new userDoesntExistException("");

	}

	function findUserById($users, $userId)
	{
		foreach($users as $key => $value)
		{

			if($value["id"] == $userId)
			{
				return $value;
			}
		}

		throw new userDoesntExistException("");


	}
?>
