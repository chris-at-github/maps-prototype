<?php
/*
|-----------------------------------------------------------------
| PHP - Fehlerausgabe
|-----------------------------------------------------------------
| waehrend der Entwicklungsphase sollten alle PHP Fehlermeldungen
| ausgegeben werden.
|
*/
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);


/*
|-----------------------------------------------------------------
| deutsche Sprachausgabe
|-----------------------------------------------------------------
| deutsche Formatierung fuer Datums- und Zeitangaben
|
*/
	setlocale(LC_TIME, 'german');


/*
|-----------------------------------------------------------------
| Define
|-----------------------------------------------------------------
| definiert die gaengigsten Methoden als einfache Funktionen um
| Schreibarbeit zu sparen
|
*/
	include($_SERVER['DOCUMENT_ROOT'] . '/co3/functions.php');


/*
|-----------------------------------------------------------------
| Klassenregistrierung | Klassenlader
|-----------------------------------------------------------------
| laedt wenn moeglich automatisch benoetige Klassen und schreibt
| sie in die Registry
|
*/
	include($_SERVER['DOCUMENT_ROOT'] . '/co3/libraries/loader.php');

	function __autoload($name) {
		return Co3Loader::_($name);
	}
?>