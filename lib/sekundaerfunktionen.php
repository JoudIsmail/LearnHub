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

		/*shop courses to do */

	function generateShopCourses($amount, $offset){
		$courses = readCoursesFile();
		$amount = min($amount, sizeof($courses));
		$subcourses = array_slice($courses, $offset, $amount);
		if ($amount == $courses){
			foreach($subcourses as $course){
				echo "                <div class=\"columns column-66\">\n";
				echo "                    <div class=\"col-21\">\n";
				echo "                        <a class=\"kurs_link_EK\" href=\"kurs.php?id=".$course["id"]."\">\n";
				echo "                            <img class=\"kurs_box_EK\" alt=".$course["courseImageAlt"]." src=".$course["courseImagePath"]."></a>\n";
				echo "                    </div>\n";
				echo "                    <div class=\"col-69\">\n";
				echo "                            <a class=\"p-420\" href=\"kurs.php?id=".$course["id"]."\"> <h3> <strong> <u> ".$course["title"]." </u> </strong> </h3> \n";
				$course['summary'];
				echo "                                                    </a>\n";
				echo "                    </div>\n";
				echo "                    <div class=\"col-420\"><p class=\"p-bg\">\n";
				echo "                        Ersteller:".$course['instructorName']." <br>\n";
				echo "                                                Preis:".$course['priceEuro'].",".$course['priceCent']."€</p><br>\n";
				echo "						<form action=\"do.php\">\n";
				echo "                                                <input name=\"buyCourse\" type=\"submit\" class=\"btn-purchase\" value=\"Kurs kaufen\">\n";
				echo "						<input type=\"hidden\" name=\"id\" value =\"".$course['id']."\">\n";
				echo "						</form>\n";
				echo "                    </div>\n";
				echo "                </div>\n";
			}
		}
	}

	/*bought courses to do */

	function generateBoughtCourses(){
		$courses = readCoursesFile();
		foreach ($_SESSION["boughtCourses"] as $course){
			echo "				<div class=\"grid_element_EK1\">\n";
			echo "					<a href=\"kurs.php?id=".$course["id"]."\"> <img alt=".$course["courseImageAlt"]." class=\"grid_element_bild_EK\" src=".$course["courseImagePath"]."> </a>\n";
			echo "					<h3 class=\"grid_element_titel_EK\" >".$course["title"]."</h3>\n";
			echo "				</div>\n";
			echo "	\n";
		}	
	}
	
	function generateCreatedCourses(){
		$course = $courses = readCoursesFile();
		foreach($_SESSION["createdCourses"] as $course){
			echo "				<div class=\"grid_element_EK1\">\n";
			echo "					<a href=\"kurs.php?id=".$course["id"]."\"> <img alt=".$course["courseImageAlt"]." class=\"grid_element_bild_EK\" src=".$course["courseImagePath"]."> </a>\n";
			echo "					<h3 class=\"grid_element_titel_EK\" >".$course["title"]."</h3>\n";
			echo "				</div>\n";
			echo "	\n";
		}
	}

	function generateParticipantsList($kursId){
		$course = $_SESSION["createdCourses"]["kursId"];
		$emailArray = array();
		$users = readUsersFile();
		foreach ($course["participants"] as $participant){
			$user = findUserById($users, $userid);
			array_push($emailArray, $user["email"]);
		}
		$emailArraySize = sizeof($emailArray);
		foreach($emailArray as $email){
			echo "                    <p class=\"p-bg\"> <strong>".$email["email"]." </strong></p>\n";
		}
	}
	
	function generateEntries($amount, $offset){
		$entries = readEntriesFile();
		$subentries = array_slice($entries, $offset, $amount);
		$subentriesSize = sizeof($subentries);
		foreach($subentries as $entry){
			echo "			<div class=\"kommentar_box_GB\">\n";
			echo "				<h3>".$entry["title"]."</h3>\n";
			echo "				<p class=\"kommentar_text_GB\">".$entry["comment"]."</p>\n";
			echo "				<p class=\"kommentar_info_GB\">".$entry["name"]."</p>\n";
			echo "				<p class=\"kommentar_info_GB\">".$entry["dateTimeString"]."</p>\n";
			echo "			</div>\n";
			echo "			<hr class=\"kommentar_seperator_GB\">\n";
		}
	}

?>
