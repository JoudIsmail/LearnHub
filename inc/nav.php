<?php
echo "                <img class=\"logo\" alt=\"Logo der Internetseite. In schwarz geschrieben: Learnhub. Das hub in Learnhub steht vor orangenem Hintergrund.\" src=\"../bilder/learnhublogo.png\">\n";
if($page == 'about'){
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" class='active' href=\"about_us.php\">Über uns</a>\n";
}
else{
    echo "                <a title=\"hier finden sie nützliche Informationen über unsere Organisation\" href=\"about_us.php\">Über uns</a>\n";
}

if($page == 'shop'){
    echo "                <a title=\"hier können sie zum Shop gelangen\" class='active' href=\"shop.php\">Shop</a>\n";
}
else{
    echo "                <a title=\"hier können sie zum Shop gelangen\" href=\"shop.php\">Shop</a>\n";
}

if($page == 'erstellte'){
    echo "                <a title=\"hier finden sie ihre erstellten Kurse\" class='active' href=\"erstellte_kurse.php\">erstellte Kurse</a>\n";
}
else{
    echo "                <a title=\"hier finden sie ihre erstellten Kurse\" href=\"erstellte_kurse.php\">erstellte Kurse</a>\n";
}

if($page == 'gekaufte'){
    echo "                <a title=\"hier finden sie ihre gekauften Kurse\" class='active' href=\"gekaufte_kurse.php\">gekaufte Kurse</a>\n";
}
else{
    echo "                <a title=\"hier finden sie ihre gekauften Kurse\" href=\"gekaufte_kurse.php\">gekaufte Kurse</a>\n";
}

if($page == 'gaestebuch'){
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" class='active' href=\"gaestebuch.php\">Gästebuch</a>\n";
}
else{
    echo "                <a title=\"hier gelangen sie zum Gästebuch in dem User Bewertungen für die Seite hinterlassen können\" href=\"gaestebuch.php\">Gästebuch</a>\n";
}

echo "                <a title=\"hier können sie sich ausloggen\" href=\"abmelden.php\">abmelden</a>\n";
echo "                <a id=\"change-font\" class=\"a-abc\" href=\"\"><img class=\"img-abc\" src=\"../bilder/abc.png\" alt=\"\" title=\"Font für Legastheniker benutzen\"></a>\n";
?>
