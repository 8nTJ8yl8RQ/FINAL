<?php 
/*
 * Mysql Ajax Table Editor
 *
 * Copyright (c) 2008 Chris Kitchen <info@mysqlajaxtableeditor.com>
 * All rights reserved.
 *
 * See COPYING file for license information.
 *
 * Download the latest version from
 * http://www.mysqlajaxtableeditor.com
 */
// LANGUAGE variables
class LangVars
{
	//Class Common
	var $errNoSelect   = 'Fehler bei Datenbank-Verbindung: Datenbank %s nicht gefunden';
	var $errNoConnect  = 'Fehler bei Datenbank-Verbindung: Kann nicht verbinden';
	var $errInScript   = 'Fehler im Skript %s gefunden in Zeile %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'enth&auml;lt';
	var $optNotLike    = 'enth&auml;lt nicht';
	var $optEq         = 'ist gleich';
	var $optNotEq      = 'ist ungleich';
	var $optGreat      = 'ist gr&ouml;sser als';
	var $optLess       = 'ist kleiner als';
	var $optGreatEq    = 'ist gr&ouml;sser gleich';
	var $optLessEq     = 'ist kleiner gleich';
	
	var $ttlAddRow     = 'Datensatz zuf&uuml;gen';
	var $ttlEditRow    = 'Datensatz editieren';
	var $ttlEditMult   = 'Bearbeit mehrerer Zeilen';
	var $ttlViewRow    = 'Datensatz zeigen';
	var $ttlShowHide   = 'zeigen/ausblenden';
	var $ttlOrderCols  = 'Spalten Reihenfolge';
	//function doDefault
	var $errNoAction   = 'Fehler in Programm %s Aktion nicht gefunden.';
	//function doQuery
	var $errQuery      = 'Fehler in der folgenden SQL-Abfrage: ';
	var $errMysql      = 'mySQL Meldung war:';
	// function editMultRows
	var $edit1Row      = 'Sie können nur 1 Datensatz gleichzeitig ändern';
	// function valError
	var $errVal        = 'Die roten Felder m&uuml;ssen korrigiert werden.';
	// function formatIcons
	var $ttlInfo       = 'Info';
	var $ttlEdit       = '&auml;ndern';
	var $ttlCopy       = 'kopieren';
	var $ttlDelete     = 'l&ouml;schen';
	// function getAdvancedSearchHtml
	var $lblSelect     = '-Spalte w&auml;hlen-';
	// All Buttons
	var $btnBack       = 'fertig';
	var $btnCancel     = 'abbrechen';
	var $btnEdit       = 'bearbeiten';
	var $btnAdd        = 'zuf&uuml;gen';
	var $btnUpdate     = '&uuml;bernehmen';
	var $btnView       = 'ansehen';
	var $btnCopy       = 'kopieren';
	var $btnDelete     = 'l&ouml;schen';
	var $btnExport     = 'als .csv exportieren';
	var $btnSearch     = 'suchen';
	var $btnCSearch    = 'Suchtext l&ouml;schen';
	var $btnASearch    = 'Multi-Suche';
	var $btnQSearch    = 'einfache Suche';
	var $btnReset      = 'zur&uuml;ck zum Original';
	var $btnAddCrit    = 'weiteres Kriterium';
	var $btnShowHide   = 'Spalten anzeigen/verbergen';
	var $btnOrderCols  = 'Spalten Reihenfolge';
	var $btnCFilters   = 'Filter zurücksetzen';
	var $btnFilters    = 'Filter anwenden';
	// function displayTableHtml
	var $ttlDispRecs   = 'Angezeigt sind die Datensätze %s - %s von insgesamt %s';
	var $ttlDispNoRecs = 'Keine Datensätze angezeigt';
	var $ttlRecords    = 'Datensätzen';
	var $ttlNoRecord   = 'Keine Datensätze gefunden';
	var $lblSearch     = 'Suchen';
	var $lblPage       = 'Seite Nr: ';
	var $lblDisplay    = 'Anzeige ';
	var $lblMatch      = 'Sucherfolg beim Zutreffen ';
	var $lblAllCrit    = 'aller Kriterien';
	var $lblAnyCrit    = 'einem der Kriterien';
	// function showHideColumns
	var $ttlColumn     = 'Spalte';
	var $ttlCheckBox   = 'Anzeige';
	// function handleFileUpload
	var $errFileSize   = '%s war zu groß';
	var $errFileReq   = '%s ist ein benötigtes Feld';
}
?>
