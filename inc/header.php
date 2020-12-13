<?php
echo "<DOCTYPE html>\n";
echo "<html lang=\"de\">\n";
echo "\n";
echo "<head>\n";
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/style3.css\">\n";
echo "	<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Poppins\">\n";
echo "	<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css\">\n";
echo "	<link rel=\"shortcut icon\" href=\"#\"/>\n";
echo "	<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\n";
echo "	<meta charset=\"UTF-8\">\n";
echo "	<title> About-us - Learnhub </title>\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
if((($page == 'registrieren')&&(empty($_SESSION[$user['id']])))||((empty($_SESSION[$user['id']]))&&($page == 'login'))){
    echo "	<div class=\"fullscreen fullscreen-bg\">\n";
}else{
    echo "	<div class=\"fullscreen \">\n";
}
echo "		<nav>\n";
echo "            <div class=\"container\">\n";
if (!empty($_SESSION[$user['id']])){
    include('../inc/nav.php');
}else{
    include('../inc/nav_gast.php');
}
echo "            </div>\n";
echo "        </nav>\n";
echo "\n";
?>

