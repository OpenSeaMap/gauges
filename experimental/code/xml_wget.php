<!--
erstellt von Tim Reinartz im Rahmen der Bachelor-Thesis
letzte �nderung 17.04.11 17:31 Uhr
Aufgabe der Datei:
Daten per wget holen.
-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
    <head>
        <title>XML loeschen und per wget neu holen (nur linux)</title>
    </head>
    <body>
<?php
include('config.inc.php');
//besser per linux shell

//bestehende datei l�schen (geht nur wenn der webserver daf�r rechte hat)
Util::rm_datei($xmlname);

//neue datei holen (geht nur wenn der webserver daf�r rechte hat)
Util::wget_datei($xmlurl);

?>
<br><br>
    </body>
</html>