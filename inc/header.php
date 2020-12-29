<?php
require_once('title.php');
$title = checkPage($page);
echo "<DOCTYPE html>\n";
echo "<html lang=\"de\">\n";
echo "\n";
echo "<head>\n";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">\n";
echo "	<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Poppins\">\n";
echo "	<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\">\n";
echo "  <link rel=\"stylesheet\" href=\"https://cdn.clarkhacks.com/OpenDyslexic/v1/OpenDyslexic.css\">\n";
echo "	<link rel=\"shortcut icon\" href=\"#\"/>\n";
echo "	<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\n";
echo "	<meta charset=\"UTF-8\">\n";
echo "	<title> ".$title." </title>\n";
echo "</head>\n";
echo "\n";
echo "<body class=\"normal\">\n";
if((($page == 'registrieren')&&(!isset($_SESSION['email'])))||((!isset($_SESSION['email']))&&($page == 'login'))){
	echo "	<article class=\"fullscreen fullscreen-bg\">\n";
}else{
	echo "	<article class=\"fullscreen \">\n";
}
echo "			<nav>\n";
echo "      	<section class=\"container\">\n";
if (!empty($_SESSION['email'])){
    require_once('nav.php');
}else{
    require_once('nav_gast.php');
}
echo "        </section>\n";
echo "      </nav>\n";
echo "\n";
?>

