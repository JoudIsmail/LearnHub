<?php

	/*
		sekundaerfunktionen.php
			
			Definiert Funktionen zur Ausgabe von HTML Code.
			Diese Funktionen werden von den PHP Dateien aufgerufen, die vom Browser angesprochen werden.
			
			
			
	*/

	require_once 'hilfsfunktionen.php';

	function redirectIfLoggedOut($link){
		if (!isset($_SESSION["id"])){
			header("Location: /$link");
		}
	}

	function redirectIfLoggedIn($link){
		if (isset($_SESSION["id"])){
			header("Location: /$link");
		}
	}

	//falls amount -1 ist, generiere unendlich viele gästebucheinträge
	function generateShopCourses($amount=-1, $offset=0){
		$courses = readCoursesFile();
		if($amount == -1)
		{
			$amount = sizeof($courses);
		}
		$subcourses = array_slice($courses, $offset, $amount);
		$subcourses = array_reverse($subcourses);
		foreach($subcourses as $course){
			echo "                <article class=\"columns column-66\">\n";
			echo "                    <div class=\"col-21\">\n";
			echo "                        <a class=\"kurs_link_EK\" href=\"kurs.php?id=".$course["id"]."\">\n";
			echo "                            <img class=\"kurs_box_EK\"  alt=\"".$course["courseImageAlt"]."\" src=\"".$course["courseImagePath"]."\"></a>\n";
			echo "                    </div>\n";
			echo "                    <div class=\"col-69\">\n";
			echo "                            <a class=\"p-420\" href=\"kurs.php?id=".$course["id"]."\"> <h3 id=\"".$course["id"]."\"> <strong> <u> ".$course["title"]." </u> </strong> </h3> \n";
			echo "                            ".strip_tags($course["summary"])."\n";
			echo "                                                    </a>\n";
			echo "                    </div>\n";
			echo "                    <div class=\"col-420\"><p class=\"p-bg\">\n";
			echo "                        Ersteller:".$course['instructorName']." <br>\n";
			echo "                                                Preis:".$course['priceEuro'].",".$course['priceCent']."€</p><br>\n";
			if(isset($_SESSION["email"]))
			{
				if($course["creatorId"] != $_SESSION["id"] && !in_array($_SESSION["id"], $course["participants"]))
				{
					echo "									<form action=\"do.php\" method=\"post\">\n";
					echo "										<input type=\"hidden\" name=\"id\" value =\"".$course['id']."\">\n";
					echo "                    <input name=\"buyCourse\" type=\"submit\" class=\"btn-purchase\" value=\"Kurs kaufen\">\n";
					echo "									</form>\n";
				}
			} else {
					echo "                    <form action=\"nachricht.php\" method=\"get\">\n";
					echo "											<input type=\"hidden\" name=\"type\" value=\"erst_registrieren\">\n";
					echo "											<button class=\"btn-purchase\" type=\"submit\">Kurs kaufen</button>\n";
					echo "										</form>\n";
			}
			echo "                    </div>\n";
			echo "                </article>\n";
		}
	}

	/*bought courses to do */

	function generateBoughtCourses(){
		$courses = readCoursesFile();
		$boughtCourses = getBoughtCourses($courses, $_SESSION["id"]);
		foreach ($boughtCourses as $courseId => $course){
			echo "				<article class=\"grid_element_EK1\">\n";
			echo "					<a href=\"kurs.php?id=".$courseId."\"> <img alt=\"".$course["courseImageAlt"]."\" class=\"grid_element_bild_EK\" src=\"".$course["courseImagePath"]."\"> </a>\n";
			echo "					<h3 class=\"grid_element_titel_EK\" >".$course["title"]."</h3>\n";
			echo "				</article>\n";
			echo "	\n";
		}	
	}
	
	function generateCreatedCourses(){
		$courses = readCoursesFile();
		$createdCourses = getCreatedCourses($courses, $_SESSION["id"]);
		foreach($createdCourses as $courseId => $course){
			echo "				<article class=\"grid_element_EK1\">\n";
			echo "					<a href=\"kurs.php?id=".$courseId."\"> <img alt=\"".$course["courseImageAlt"]."\" class=\"grid_element_bild_EK\" src=\"".$course["courseImagePath"]."\"> </a>\n";
			echo "					<h3 class=\"grid_element_titel_EK\" >".$course["title"]."</h3>\n";
			echo "				</article>\n";
			echo "	\n";
		}
	}


	//generiert aus dem "participants" Feld in $course eine liste von teilnehmer-email adressen
	function generateParticipantsList($course){
		$emailArray = array();
		$users = readUsersFile();
		foreach ($course["participants"] as $participantUserId){
			try
			{
				$user = findUserById($users, $participantUserId);
				array_push($emailArray, $user["email"]);
			}catch(userDoesntExistException $e)
			{
			}
		}
		if(sizeof($emailArray) > 0)
		{
			foreach($emailArray as $email){
				echo "                    <p class=\"p-bg\"> <strong>".$email." </strong></p>\n";
			}
		}else{
			echo "                    <p class=\"p-bg\"> <strong>Leider noch keine Teilnehmer. </strong></p>\n";
		
		}
	}
	

	//falls amount -1 ist, generiere unendlich viele gästebucheinträge
	function generateEntries($amount=-1, $offset=0){
		$entries = readEntriesFile();
		if($amount == -1)
		{
			$amount = sizeof($entries);
		}

		$subentries = array_slice($entries, $offset, $amount);
		$subentries = array_reverse($subentries);
		foreach($subentries as $entry){
			echo "			<article class=\"kommentar_box_GB\">\n";
			echo "				<h4>".$entry["title"]."</h4>\n";
			echo "				<p class=\"kommentar_text_GB\">".$entry["comment"]."</p>\n";
			echo "				<p class=\"kommentar_info_GB\">Von ".$entry["name"]."</p>\n";
			echo "				<p class=\"kommentar_info_GB\">".$entry["dateTimeString"]."</p>\n";
			echo "			</article>\n";
			echo "			<hr class=\"kommentar_seperator_GB\">\n";
		}
	}

	function generateAdminCourses($amount=-1, $offset=0){
		$courses = readCoursesFile();
		if($amount == -1)
		{
			$amount = sizeof($courses);
		}
		$subcourses = array_slice($courses, $offset, $amount);
		$subcourses = array_reverse($subcourses);
		foreach($subcourses as $course){
			echo "				<form class=\"admin_kursL_kurs\" action=\"do.php\" method=\"post\">\n";
			echo "					<p class=\"p-admin\">".$course["title"]."</p>	 \n";
			echo "					<p class=\"p-admin-bg\">\n";
			echo "						<a href=\"kurs.php?id=".$course["id"]."\" class=\"admin_actionlink\">Zum Kurs</a>\n";
			echo "						<input name=\"id\" type=\"hidden\" value=\"".$course["id"]."\" class=\"admin_actionlink\">\n";
			echo "						<input type=\"submit\" name=\"deleteCourse\" value=\"Löschen\" class=\"admin_actionbutton\">\n";
			echo "					</p>\n";
			echo "\n";
			echo "				</form>\n";
		}
	}


?>

