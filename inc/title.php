<?php
    function checkPage($title) {
      switch ($title) {
        case "about":
          $title = "About-us - Learnhub";
          break;
        case "shop":
          $title = "Shop - Learnhub";
          break;
        case "registrieren":
          $title = "Registration - Learnhub";
          break;
        case "login":
          $title = "Anmelden - Learnhub";
          break;
        case "gaestebuch":
          $title = "Gästebuch - Learnhub";
          break;
        case "erstellte":
          $title = "Erstellte Kurse - Learnhub";
          break;
        case "gekaufte":
          $title = "Gekaufte Kurse - Learnhub";
          break;
        case "kurs":
          $title = "Kurs - Learnhub";
          break;
        case "bearbeiten":
          $title = "Kurs bearbeiten - Learnhub";
          break;
        case "erstellen":
          $title = "Neuer Kurs - Learnhub";
          break;


      }
 return $title;

}
?>
