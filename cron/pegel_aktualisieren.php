#!/usr/bin/php
<?php
/*
erstellt von Tim Reinartz im Rahmen der Bachelor-Thesis
letzte Änderung 13.05.11 12:20 Uhr
Aufgabe der Datei:
Daten mithilfe einer Lokalen XML-Datei aktualisieren, kann für die automatische Aktualisierung genutzt werden.
*/

include('config.inc.php');
require(PATH_CLASSES.'daten.class.php');

$xmlname=PATH_FILES."pegelstaende_neu.xml";
//muss angepasst werden


	//lokal z.b. mit wget geholt siehe bash script
    if(file_exists($xmlname)) {
        $xml = simplexml_load_file($xmlname);
        if($xml) { //pruefen ob gueltiges xml bzw. wohlgeformt
		echo 'XML Datei ist Fehlerfrei bzw. Wohlgeformt wird verarbeitet ...';
		foreach ($xml->table->gewaesser as $gewaesser) {
            foreach($gewaesser->item as $item) {
				Daten::save_update_xml_shell($pegelnummer = $item->pegelnummer, $pegelname = $item->pegelname, $km = $item->km, $messwert = $item->messwert, $datum = $item->datum, $uhrzeit = $item->uhrzeit, $pnp = $item->pnp, $tendenz = $item->tendenz);
            }
		}
        } else {
            echo '<p>Die Datei '. $xmlname .' enhaelt fehler</p>';
        }
    } else {
		echo '<p>Die Datei '. $xmlname .' ist nicht vorhanden</p>';
	}


echo "done";
?>
