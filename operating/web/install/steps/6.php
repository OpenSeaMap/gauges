<div>
<p><b>GK Koordinaten Krassowsky transformieren</b></p>
<p>
Es werden die notwendigen Transformationen fuer den Krassowsky-Ellipsoid durchgefuehrt:<br><br>
<?php
Daten::set_coord_krass();
 ?>
 <?=$db->getQueryCount()?> Datenbankabfragen in <?=substr($db->getQueryTimeSum(),0,6)?> Sekunden. 
</p>
<p>Klicken Sie auf &quot;Weiter&quot; um fortzufahren</p>
</div>
<div><input type="submit" value="Weiter" /></div>