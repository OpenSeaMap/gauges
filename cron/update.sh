#!/bin/bash -e
cd $(dirname $0)/..

file="temp/pegelstaende_neu.xml"

if ! test -d temp ; then 
	echo "Directory 'temp' not found. Exiting."
	exit 1
fi
if test -e $file ; then 
	rm -f $file
fi
wget -O $file "http://www.pegelonline.wsv.de/svgz/pegelstaende_neu.xml"
cd web
../cron/pegel_aktualisieren.php
echo "erfolgreich ausgefuehrt"
