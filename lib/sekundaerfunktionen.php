<?php

	include 'hilfsfunktionen.php';

	function redirectIfLoggedOut($link){
		if (!isset($_SESSION["id"])){
			header("$link");
		}
	}

	function redirectIfLoggedIn($link){
		if (isset($_SESSION["id"])){
			header("$link");
		}
	}

	function generateShopCourses($amount, $offset){
		$courses = readCoursesFile();
		$subcourses = array_slice($courses, $offset, $amount);
		$outputHTML = „“
		if $amount == $courses{
			for ($i = 1; $i <= $subcourses; $i++) {
				$outputHTML = $outputHTML + $subcourses[i];
			}
			
			echo $outputHTML;
		}
	}

	function generateBoughtCourses(){
		$courses = readCoursesFile();
		$outputHTML = „“;
		$course =  $_SESSION[„boughtCourses“];
		for ($i = 1; $i <= $course; $i++) {
			$outputHTML = $outputHTML + $course;
		}
			
		echo $outputHTML;	
	}
	
	function generateParticipantsList($kursId){
		$course = $_SESSION[„createdCourses“][„kursId“];
		$emailArray = array();
		$users = readUsersFile();
		for ($i = 1; $1 <= $course[„participants“]; $i++){
			$user = findUserById($users, $userid);
			array_push($emailArray, $user[„email“]);
		}
		$outputHTML = „“;
		$emailArraySize = sizeof($emailArray);
		for ($i = 1; $i <= $emailArraySize; $i++){
			$outputHTML = $outputHTML + $emailArray[i];
		}
		echo $outputHTML;
	}
	
	function generateEntries($amount, $offset){
		$entries = readEntriesFile();
		$subentries = array_slice($entries, $offset, $amount);
		$outputHTML = „“;
		$subentriesSize = sizeof($subentries);
		for ($i = 1; $i <= $subentriesSize; $i++){
			$outputHTML = $outputHTML + $subentries[i];
		}
		echo $outputHTML;
	}

?>
