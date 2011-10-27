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
	var $errNoSelect   = 'Erreur avec sql: erreur de s&eacute;lection de %s';
	var $errNoConnect  = 'Erreur avec sqll: Erreur de connexion avec';
	var $errInScript   = 'Une erreur s\'est produite dans le script %s dans ligne %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'Ressembler';
	var $optNotLike    = 'Non ressembler';
	var $optEq         = '&Eacute;galit&eacute;';
	var $optNotEq      = 'Non &eacute;galit&eacute;';
	var $optGreat      = 'Plus de';
	var $optLess       = 'Moins de';
	var $optGreatEq    = '&Eacute;galit&eacute; ou Plus de';
	var $optLessEq     = '&Eacute;galit&eacute; ou Moins de';
	
	var $ttlAddRow     = 'Ajouter enregistrement';
	var $ttlEditRow    = 'Modifier enregistrement';
	var $ttlEditMult   = 'Modifier plusieurs lignes';
	var $ttlViewRow    = 'Afficher enregistrement';
	var $ttlShowHide   = 'Afficher/Cacher les colonnes';
	var $ttlOrderCols  = 'Ordre les colonnes';
	//function doDefault
	var $errNoAction   = 'Erreur dans le programme %s l\'action ne trouve pas.';
	//function doQuery
	var $errQuery      = 'Il y avait une erreur avec la requ�te suivante: ';
	var $errMysql      = 'mysql rapporte:';
	// function editMultRows
	var $edit1Row      = 'Vous pouvez modifier seulement 1 ligne à la fois.';
	// function valError
	var $errVal        = 'Les champs en rouge doivent &ecirc;tre corrig&eacute;s.';
	// function formatIcons
	var $ttlInfo       = 'Info';
	var $ttlEdit       = 'Modifier';
	var $ttlCopy       = 'Copier';
	var $ttlDelete     = 'Supprimer';
	// function getAdvancedSearchHtml
	var $lblSelect     = 'Selecter';
	// All Buttons
	var $btnBack       = 'Retour';
	var $btnCancel     = 'Annuler';
	var $btnEdit       = 'Modifier';
	var $btnAdd        = 'Ajouter';
	var $btnUpdate     = 'Actualiser';
	var $btnView       = 'Afficher';
	var $btnCopy       = 'Copier';
	var $btnDelete     = 'Supprimer';
	var $btnExport     = 'Exporter';
	var $btnSearch     = 'Rechercher';
	var $btnCSearch    = 'supprimer le recherche';
	var $btnASearch    = 'Recherche avanc&eacute;e';
	var $btnQSearch    = 'Recherche rapide';
	var $btnReset      = 'Défaut';
	var $btnAddCrit    = 'Ajouter des crit&egrave;res';
	var $btnShowHide   = 'Afficher/Cacher les colonnes';
	var $btnOrderCols  = 'Ordre les colonnes';
	var $btnCFilters   = 'Supprimer Filtres';
	var $btnFilters    = 'Appliquer des filtres';
	// function displayTableHtml
	var $ttlDispRecs   = 'Afficher %s - %s de %s lignes';
	var $ttlDispNoRecs = 'Afficher 0 lignes';
	var $ttlRecords    = 'Lignes';
	var $ttlNoRecord   = 'Ne trouver pas des lignes';
	var $lblSearch     = 'Rechercher';
	var $lblPage       = 'Page nr: ';
	var $lblDisplay    = 'Afficher ';
	var $lblMatch      = 'Correspondre: ';
	var $lblAllCrit    = 'Toutes des crit&egrave;res';
	var $lblAnyCrit    = 'Une des crit&egrave;res';
	// function showHideColumns
	var $ttlColumn     = 'Colonne';
	var $ttlCheckBox   = 'Afficher';
	// function handleFileUpload
	var $errFileSize   = 'Le %s est trop grand';
	var $errFileReq   = '%s est champ obligatoire';
}
?>
