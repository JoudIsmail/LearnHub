<?php
echo "                <img class=\"logo\" alt=\"Logo der Internetseite. In schwarz geschrieben: Learnhub. Das hub in Learnhub steht vor orangenem Hintergrund.\" src=\"../bilder/learnhublogo.png\">\n";
if($page == 'about'){
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" class=\"active\" href=\"about_us.php\">Über uns</a>\n";
}
else{
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" href=\"about_us.php\">Über uns</a>\n";
}

if($page == 'shop'){
    echo "                <a title=\"hier können sie zum Shop gelangen\" class=\"active\" href=\"shop.php\">Shop</a>\n";
}
else{
    echo "                <a title=\"hier können sie zum Shop gelangen\" href=\"shop.php\">Shop</a>\n";
}

if($page == 'registrieren'){
    echo "                <a title=\"hier können Sie sich registrieren, um sich dann anmelden zu können\" class=\"active\" href=\"registrieren.php\">registrieren</a>\n";
}
else{
    echo "                <a title=\"hier können Sie sich registrieren, um sich dann anmelden zu können\" href=\"registrieren.php\">registrieren</a>\n";
    
}

if($page == 'login'){
    echo "                <a title=\"hier können Sie sich mit Ihren Benutzerdaten anmelden\" class=\"active\" href=\"anmelden.php\">anmelden</a>\n";
}
else{
    echo "                <a title=\"hier können Sie sich mit Ihren Benutzerdaten anmelden\" href=\"anmelden.php\">anmelden</a>\n";

}

if($page == 'gaestebuch'){
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" class=\"active\" href=\"gaestebuch.php\">Gästebuch</a>\n";
}
else{
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" href=\"gaestebuch.php\">Gästebuch</a>\n";
    
}
echo "                <a id=\"change-font\" class=\"a-abc\" href=\"\"><img class=\"img-abc\" src=\"../bilder/abc.png\" alt=\"\" title=\"Font für Legastheniker benutzen\"></a>\n";
?>
