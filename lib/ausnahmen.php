<?php

	//user wurde nicht gefunden
	class userDoesntExistException extends Exception {}
	
	//kurs wurde nicht gefunden
	class courseDoesntExistException extends Exception {}

	//anmelden ist fehlgeschlagen (aufgrund falschem Passwort)
	class loginException extends Exception {}

	//kursdaten sind nicht vollständig eingegeben
	class courseFieldEmptyException extends Exception {}

	//programmatisch: erwartetes array-element nicht gefunden
	class userFieldEmptyException extends Exception {}

	//anmeldedaten sind nicht vollständig eingegeben
	class loginFieldEmptyException extends Exception {}

	//registrierungsdaten sind nicht vollständig eingegeben
	class registerFieldEmptyException extends Exception {}

	//gästebuchdaten sind nicht vollständig eingegeben
	class entryFieldEmptyException extends Exception {}

	//kurs wurde bereits gekauft
	class alreadyBoughtException extends Exception {}

	//benutzer ist nicht angemeldet
	class notLoggedInException extends Exception {}

	//ausführer einer ändernden aktion an einem kurs ist nicht der besitzer des kurses
	class courseNotOwnedException extends Exception {}

	//benutzer ist bereits angemeldet
	class alreadyLoggedInException extends Exception {}

	//ein benutzer mit der angegebenen email ist bereits registriert
	class alreadyRegisteredException extends Exception {}

	//hochladen einer datei ist fehlgeschlagen
	class fileUploadFailedException extends Exception {}

	//wiederholtes passwort stimmt nicht überein
	class badRepeatedPasswordException extends Exception {}

	//gewähltes passwort ist nicht stark genug
	class badPasswordException extends Exception {}
	
	//angegebene email addresse ist nicht gültig (keine email)
	class badEmailException extends Exception {}

	//angegebener kurs titel hat über 70 zeichen
	class badCourseTitleException extends Exception {}

	//angegebene kurs kurzbeschreibung hat über 500 zeichen
	class badCourseSummaryException extends Exception {}

	//angabe der im kurs lernbaren themen hat über 1000 zeichen
	class badCourseEducationalContentException extends Exception {}

	//angabe für wen der kurs geeignet ist hat über 1000 zeichen
	class badCourseSuitableForException extends Exception {}

	//angabe des namens des kursleiters hat über 30 zeichen
	class badInstructorNameException extends Exception {}

	//angabe der kontaktdaten für einen kursleiter hat über 100 zeichen
	class badInstructorContactException extends Exception {}

	//angabe der materiellen inhalte eines kurses hat über 300 zeichen
	class badCourseMaterialContentException extends Exception {}

	//angabe eines beschreibenen textes für das kursbild hat über 70 zeichen
	class badCourseImageAltException extends Exception {}
	


?>
