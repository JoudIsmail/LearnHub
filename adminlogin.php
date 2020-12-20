<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"de\">\n";
echo "	<head>\n";
echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\"> \n";
echo "		<link href='https://fonts.googleapis.com/css?family=Poppins' rel=\"stylesheet\">\n";
echo "		<meta charset=\"UTF-8\">\n";
echo "		<title> Panel Login - Learnhub </title>\n";
echo "	</head>\n";
echo "	<body class=\"admin_body\">\n";
echo "	\n";
echo "		<div class=\"box-bg\">\n";
echo "\n";
echo "			<form class=\"admin_loginbox\" method=\"post\" action=\"adminpanel.php\">\n";
echo "				<h1 class=\"admin_loginbox_element\"> Panel Login </h1>\n";
echo "				<input name=\"adminname\" class=\"admin_loginbox_element admin_input\" placeholder=\"Benutzername\" /><br>\n";
echo "				<input name=\"password\" type=\"password\" class=\"admin_loginbox_element admin_input\" placeholder=\"Kennwort\"/><br>\n";
echo "\n";
echo "				<input class=\"admin_loginbox_element admin_button\" type=\"submit\" value=\"Login\" name=\"Login\"/>\n";
echo "			</form>\n";
echo "\n";
echo "		</div>\n";
echo "		\n";
echo "	</body>\n";
echo "</html>\n";
?>
