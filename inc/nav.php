<?php
echo "                <img class=\"logo\" alt=\"Logo der Internetseite. In schwarz geschrieben: Learnhub. Das hub in Learnhub steht vor orangenem Hintergrund.\" src=\"../bilder/learnhublogo.png\">\n";
if($page == 'about'){
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" class='active' href=\"proto_about-us.php\">Über uns</a>\n";
}
else{
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" href=\"proto_about-us.php\">Über uns</a>\n";
}

if($page == 'shop'){
    echo "                <a title=\"hier können sie zum Shop gelangen\" class='active' href=\"proto_shopansicht.php\">Shop</a>\n";
}
else{
    echo "                <a title=\"hier können sie zum Shop gelangen\" href=\"proto_shopansicht.php\">Shop</a>\n";
}

if($page == 'erstellte'){
    echo "                <a title=\"hier finden sie ihre erstellten Kurse\" class='active' href=\"proto_erstellte_kurse.php\">erstellte Kurse</a>\n";
}
else{
    echo "                <a title=\"hier finden sie ihre erstellten Kurse\" href=\"proto_erstellte_kurse.php\">erstellte Kurse</a>\n";
}

if($page == 'gekaufte'){
    echo "                <a title=\"hier finden sie ihre gekauften Kurse\" class='active' href=\"proto_gekaufte_kurse.php\">gekaufte Kurse</a>\n";
}
else{
    echo "                <a title=\"hier finden sie ihre gekauften Kurse\" href=\"proto_gekaufte_kurse.php\">gekaufte Kurse</a>\n";
}

if($page == 'gaestebuch'){
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" class='active' href=\"proto_gaestebuch.php\">Gästebuch</a>\n";
}
else{
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" href=\"proto_gaestebuch.php\">Gästebuch</a>\n";
}

echo "                <a title=\"hier können sie sich ausloggen\" href=\"#abmelden\">abmelden</a>\n";
echo "                <a class=\"a-abc\" href=\"#\"><img class=\"img-abc\" src=\"../bilder/abc.png\" alt=\"\" title=\"Font für Legastheniker benutzen\"></a>\n";
?>