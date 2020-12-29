<?php
	
require_once("lib/sekundaerfunktionen.php");

if(isset($_POST["Login"]))
{
	if($_POST["password"] == "admin" && $_POST["adminname"] == "admin")
	{
		echo "<!DOCTYPE html>\n";
		echo "<html lang=\"de\">\n";
		echo "	<head>\n";
		echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/style.css\"> \n";
		echo "		<link href='https://fonts.googleapis.com/css?family=Poppins' rel=\"stylesheet\">\n";
		echo "		<meta charset=\"UTF-8\">\n";
		echo "		<title> Admin Panel - Learnhub </title>\n";
		echo "	</head>\n";
		echo "	<body class=\"admin_body\">\n";
		echo "	\n";
		echo "		<div class=\"admin-wrapper\">\n";
		echo "			<h1  > Admin Panel </h1>\n";
		echo "			<p  >Angemeldet als: ".$_POST["adminname"]."</p>\n";
		echo "			<hr class=\"admin_hr\">\n";
		echo "\n";
		echo "<br>";

		echo "			<h3 class=\"admin_function\" > Kurse löschen</h3>\n";
		echo "\n";
		echo "			<div class=\"admin_function admin_kursL_box\">\n";
		generateAdminCourses();
		echo "\n";
		echo "			</div>\n";
		echo "\n";
		echo "		</div>\n";
		echo "		\n";
		echo "	</body>\n";
		echo "</html>\n";
		exit;
	}
}
	header("Location: nachricht.php?type=unbefugt");
?>
