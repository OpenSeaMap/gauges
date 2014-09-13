<?php
/*
erstellt von Tim Reinartz im Rahmen der Bachelor-Thesis
letzte Änderung 10.05.11 17:45 Uhr
Aufgabe der Datei:
Abfrage der Informationen zur Anzeige der Marker auf der Karte.
*/
header("Content-type: text/plain; charset=UTF-8");
include('config.inc.php');

require_once(PATH_CLASSES.'map.class.php');

	
/*
	$b=$_REQUEST["b"];
	$l=$_REQUEST["l"];
	$t=$_REQUEST["t"];
	$r=$_REQUEST["r"];
*/
// so ist besser
if ( isset ($_REQUEST['l']) ) {
	$l=$_REQUEST["l"];
} 
else { 
  $l = "null"; 
}
if ( isset ($_REQUEST['t']) ) {
	$t=$_REQUEST["t"];
} 
else { 
  $t = "null"; 
}
if ( isset ($_REQUEST['r']) ) {
	$r=$_REQUEST["r"];
} 
else { 
  $r = "null"; 
}
if ( isset ($_REQUEST['b']) ) {
	$b=$_REQUEST["b"];
} 
else { 
  $b = "null"; 
}

	$resultMap = $db->qry(" SELECT pegelnummer,pegelname,km,messwert,datum,uhrzeit,pnp,tendenz,namegebiet,name,daten_fehler,lat,lon FROM ".TABLE_PEGEL2." WHERE lat !='' AND lon !='' AND $l<lon AND lon<$r AND $b<lat AND lat<$t ORDER BY `pegelnummer` LIMIT 100 ");
	  while($resMap = mysql_fetch_object($resultMap)) {
		  Map::write_line_osm($resMap);
		//$daten_fehler = Util::show_daten_fehler_osm($resMap->daten_fehler);
		//echo "putTidalScaleMarker($resMap->pegelnummer, $resMap->lon, $resMap->lat, '".addslashes($resMap->pegelname)."', '$resMap->name', '$resMap->namegebiet', '$resMap->messwert', '$resMap->tendenz', '$resMap->pnp', '$resMap->datum', '$resMap->uhrzeit', '$daten_fehler');\n";
	  }
?>
