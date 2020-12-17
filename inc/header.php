<?php
include('title.php');
$title = checkPage($page);
echo "<DOCTYPE html>\n";
echo "<html lang=\"de\">\n";
echo "\n";
echo "<head>\n";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">\n";
echo "	<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Poppins\">\n";
echo "	<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\">\n";
echo "	<link rel=\"shortcut icon\" href=\"#\"/>\n";
echo "	<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\n";
echo "	<meta charset=\"UTF-8\">\n";
echo "	<title> ".$title." </title>\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
if((($page == 'registrieren')&&(isset($_SESSION['email'])))||((isset($_SESSION['email']))&&($page == 'login'))){
    echo "	<div class=\"fullscreen fullscreen-bg\">\n";
}else{
    echo "	<div class=\"fullscreen \">\n";
}
echo "		<nav>\n";
echo "            <div class=\"container\">\n";
if (!empty($_SESSION['email'])){
    include('nav.php');
}else{
    include('nav_gast.php');
}
echo "            </div>\n";
echo "        </nav>\n";
echo "\n";
?>
