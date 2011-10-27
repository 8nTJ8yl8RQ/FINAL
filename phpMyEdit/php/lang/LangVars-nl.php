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
	var $errNoSelect   = 'Fout in sql: Selectie fout met %s database';
	var $errNoConnect  = 'Fout in sql: Connectie fout met';
	var $errInScript   = 'Een fout is opgetreden in script %s in regel %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'Bevat';
	var $optNotLike    = 'Bevat niet';
	var $optEq         = 'Exact gelijk';
	var $optNotEq      = 'Niet exact gelijk';
	var $optGreat      = 'Groter dan';
	var $optLess       = 'Kleiner dan';
	var $optGreatEq    = 'Gelijk of Groter dan';
	var $optLessEq     = 'Gelijk of Kleiner dan';
	
	var $ttlAddRow     = 'Toevoegen Rij';
	var $ttlEditRow    = 'Bewerk Rij';
	var $ttlEditMult   = 'Bewerk meerdere rijen';
	var $ttlViewRow    = 'Bekijk Rij';
	var $ttlShowHide   = 'Show/Verberg Kolommen';
	var $ttlOrderCols  = 'Kolom volgorde';
	//function doDefault
	var $errNoAction   = 'Fout in programma %s actie niet gevonden.';
	//function doQuery
	var $errQuery      = 'Er is een fout opgetreden met de volgende query: ';
	var $errMysql      = 'mysql rapporteerd:';
	// function editMultRows
	var $edit1Row      = 'Je kan slechts 1 rij per keer bewerken.';
	// function valError
	var $errVal        = 'De rode velden dienen gecorrigeerd te worden.';
	// function formatIcons
	var $ttlInfo       = 'Info';
	var $ttlEdit       = 'Bewerk';
	var $ttlCopy       = 'Kopi&euml;er';
	var $ttlDelete     = 'Verwijder';
	// function getAdvancedSearchHtml
	var $lblSelect     = 'Selecteer';
	// All Buttons
	var $btnBack       = 'Terug';
	var $btnCancel     = 'Annuleer';
	var $btnEdit       = 'Bewerk';
	var $btnAdd        = 'Toevoegen';
	var $btnUpdate     = 'Vernieuwen';
	var $btnView       = 'Bekijk';
	var $btnCopy       = 'Kopi&euml;er';
	var $btnDelete     = 'Verwijder';
	var $btnExport     = 'Exporteer';
	var $btnSearch     = 'Zoeken';
	var $btnCSearch    = 'Zoeken verwijderen';
	var $btnASearch    = 'Uitgebreid zoeken';
	var $btnQSearch    = 'Snel Zoeken';
	var $btnReset      = 'Default';
	var $btnAddCrit    = 'Toevoegen Criteria';
	var $btnShowHide   = 'Show/Verberg Kolommen';
	var $btnOrderCols  = 'Order Kolommen';
	var $btnCFilters   = 'Verwijder filters';
	var $btnFilters    = 'Toepassen filters';
	// function displayTableHtml
	var $ttlDispRecs   = 'In beeld %s - %s van %s Rijen';
	var $ttlDispNoRecs = 'In beeld 0 Rijen';
	var $ttlRecords    = 'Rijen';
	var $ttlNoRecord   = 'Geen rijen gevonden';
	var $lblSearch     = 'Zoeken';
	var $lblPage       = 'Pagina nr: ';
	var $lblDisplay    = 'In beeld ';
	var $lblMatch      = 'Match: ';
	var $lblAllCrit    = 'Alle Criteria';
	var $lblAnyCrit    = 'E&eacute;n van de Criteria';
	// function showHideColumns
	var $ttlColumn     = 'Kolom';
	var $ttlCheckBox   = 'Display';
	// function handleFileUpload
	var $errFileSize   = 'De %s was te groot';
	var $errFileReq   = '%s is een verplicht veld';
}
?>
