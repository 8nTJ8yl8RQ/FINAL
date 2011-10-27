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
	var $errNoSelect   = 'Error connecting to mysql: Could not select the %s database';
	var $errNoConnect  = 'Error connecting to mysql: Could not connect';
	var $errInScript   = 'An error occurred in script %s on line %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'Contains';
	var $optNotLike    = 'Does Not Contain';
	var $optEq         = 'Matches Exactly';
	var $optNotEq      = 'Does Not Match Exactly';
	var $optGreat      = 'Greater Than';
	var $optLess       = 'Less Than';
	var $optGreatEq    = 'Greater Than Or Equal To';
	var $optLessEq     = 'Less Than Or Equal To';
	
	var $ttlAddRow     = 'Add Row';
	var $ttlEditRow    = 'Edit Row';
	var $ttlEditMult   = 'Edit Multiple Rows';
	var $ttlViewRow    = 'View Row';
	var $ttlShowHide   = 'Show/Hide Columns';
	var $ttlOrderCols  = 'Order Columns';
	//function doDefault
	var $errNoAction   = 'Error in program %s action not found.';
	//function doQuery
	var $errQuery      = 'There was an error executing the following query:';
	var $errMysql      = 'mysql said:';
	// function editMultRows
	var $edit1Row      = 'You can only edit 1 row at a time.';
	// function updateRow
	var $errVal        = 'Please correct the fields in red';
	// function formatIcons
	var $ttlInfo       = 'Info';
	var $ttlEdit       = 'Edit';
	var $ttlCopy       = 'Copy';
	var $ttlDelete     = 'Delete';
	// function getAdvancedSearchHtml
	var $lblSelect     = 'Select One';
	// All Buttons
	var $btnBack       = 'Back';
	var $btnCancel     = 'Cancel';
	var $btnEdit       = 'Edit';
	var $btnAdd        = 'Add';
	var $btnUpdate     = 'Update';
	var $btnView       = 'View';
	var $btnCopy       = 'Copy';
	var $btnDelete     = 'Delete';
	var $btnExport     = 'Export';
	var $btnSearch     = 'Search';
	var $btnCSearch    = 'Clear Search';
	var $btnASearch    = 'Advanced Search';
	var $btnQSearch    = 'Quick Search';
	var $btnReset      = 'Reset';
	var $btnAddCrit    = 'Add Criteria';
	var $btnShowHide   = 'Show/Hide Columns';
	var $btnOrderCols  = 'Order Columns';
	var $btnCFilters   = 'Clear Filters';
	var $btnFilters    = 'Apply Filters';
	// function displayTableHtml
	var $ttlDispRecs   = 'Displaying %s - %s of %s Records';
	var $ttlDispNoRecs = 'Displaying 0 Records';
	var $ttlRecords    = 'Records';
	var $ttlNoRecord   = 'No Records Found';
	var $lblSearch     = 'Search';
	var $lblPage       = 'Page #:';
	var $lblDisplay    = 'Display #:';
	var $lblMatch      = 'Match:';
	var $lblAllCrit    = 'All Criteria';
	var $lblAnyCrit    = 'Any Criteria';
	// function showHideColumns
	var $ttlColumn     = 'Column';
	var $ttlCheckBox   = 'Display';
	// function handleFileUpload
	var $errFileSize   = 'The %s was too big';
	var $errFileReq   = '%s is a required field';
}
?>
