<?php
echo "                <img class=\"logo\" alt=\"Logo der Internetseite. In schwarz geschrieben: Learnhub. Das hub in Learnhub steht vor orangenem Hintergrund.\" src=\"../bilder/learnhublogo.png\">\n";
if($page == 'about_gast'){
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" class=\"active\" href=\"proto_about-us.php\">Über uns</a>\n";
}
else{
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" href=\"proto_about-us.php\">Über uns</a>\n";
}

if($page == 'shop_gast'){
    echo "                <a title=\"hier können sie zum Shop gelangen\" class=\"active\" href=\"proto_shopansicht.php\">Shop</a>\n";
}
else{
    echo "                <a title=\"hier können sie zum Shop gelangen\" href=\"proto_shopansicht.php\">Shop</a>\n";
}

if($page == 'registrieren'){
    echo "                <a title=\"hier können Sie sich registrieren, um sich dann anmelden zu können\" class=\"active\" href=\"proto_registration_gast.php\">registrieren</a>\n";
}
else{
    echo "                <a title=\"hier können Sie sich registrieren, um sich dann anmelden zu können\" href=\"proto_registration_gast.php\">registrieren</a>\n";
    
}

if($page == 'login'){
    echo "                <a title=\"hier können Sie sich mit Ihren Benutzerdaten anmelden\" class=\"active\" href=\"proto_login_gast.php\">anmelden</a>\n";
}
else{
    echo "                <a title=\"hier können Sie sich mit Ihren Benutzerdaten anmelden\" href=\"proto_login_gast.php\">anmelden</a>\n";

}

if($page == 'gaestebuch_gast'){
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" class=\"active\" href=\"proto_gaestebuch.php\">Gästebuch</a>\n";
}
else{
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" href=\"proto_gaestebuch.php\">Gästebuch</a>\n";
    
}
echo "                <a class=\"a-abc\" href=\"#\"><img class=\"img-abc\" src=\"../bilder/abc.png\" alt=\"\" title=\"Font für Legastheniker benutzen\"></a>\n";
?>