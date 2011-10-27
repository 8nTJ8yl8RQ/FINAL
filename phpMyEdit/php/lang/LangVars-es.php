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
	var $errNoSelect   = 'Error al conectar a mysql: No podía seleccionar el base de datos %s';
	var $errNoConnect  = 'Error no podía conectar a mysql';
	var $errInScript   = 'Un error ocurrío en script %s en línea %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'Contiene';
	var $optNotLike    = 'No contiene';
	var $optEq         = 'Coincide exactamente';
	var $optNotEq      = 'No coincide exactamente';
	var $optGreat      = 'Mas grande que';
	var $optLess       = 'Menos que';
	var $optGreatEq    = 'Mas grande que o igual';
	var $optLessEq     = 'Menos que o igual';
	
	var $ttlAddRow     = 'Anadir Record';
	var $ttlEditRow    = 'Editar Record';
	var $ttlEditMult   = 'Editar Mutiples Filas';
	var $ttlViewRow    = 'Ver Record';
	var $ttlShowHide   = 'Mostrar/Esconder Columnas';
	var $ttlOrderCols  = 'Ordenar Columnas';
	//function doDefault
	var $errNoAction   = 'Error en programa accion %s no existe.';
	//function doQuery
	var $errQuery      = 'Había un error al ejecutar la siguiente consulta:';
	var $errMysql      = 'mysql dijó:';
	// function editMultRows
	var $edit1Row      = 'Solo se puede editar un registro a la vez.';
	// function updateRow
	var $errVal        = 'Por favor corriga los campos marcados en rojo';
	// function formatIcons
	var $ttlInfo       = 'Info';
	var $ttlEdit       = 'Editar';
	var $ttlCopy       = 'Copiar';
	var $ttlDelete     = 'Borrar';
	// function getAdvancedSearchHtml
	var $lblSelect     = 'Seleccione uno';
	// All Buttons
	var $btnBack       = 'Atras';
	var $btnCancel     = 'Cancelar';
	var $btnEdit       = 'Editar';
	var $btnAdd        = 'Anadir';
	var $btnUpdate     = 'Guardar';
	var $btnView       = 'Ver';
	var $btnCopy       = 'Copiar';
	var $btnDelete     = 'Borrar';
	var $btnExport     = 'Exportar';
	var $btnSearch     = 'Buscar';
	var $btnCSearch    = 'Quitar Búsqueda';
	var $btnASearch    = 'Búsqueda Avanzada';
	var $btnQSearch    = 'Búsqueda Rápida';
	var $btnReset      = 'Reiniciar'; // Reajustar or Resetear?
	var $btnAddCrit    = 'Anadir Criterio';
	var $btnShowHide   = 'Mostrar/Esconder Columnas';
	var $btnOrderCols  = 'Ordenar Columnas';
	var $btnCFilters   = 'Quitar Filtrós';
	var $btnFilters    = 'Aplicar Filtrós';
	// function displayTableHtml
	var $ttlDispRecs   = 'Mostrando %s - %s de %s Registros';
	var $ttlDispNoRecs = 'Mostrando 0 Registros';
	var $ttlRecords    = 'Registros';
	var $ttlNoRecord   = 'Ningun Registro Fue Encontrado';
	var $lblSearch     = 'Buscar';
	var $lblPage       = '# De Página:';
	var $lblDisplay    = '# Para Mostrar:';
	var $lblMatch      = 'Coincidir:';
	var $lblAllCrit    = 'Todos Criterios';
	var $lblAnyCrit    = 'Cualquier Criterio';
	// function showHideColumns
	var $ttlColumn     = 'Columna';
	var $ttlCheckBox   = 'Mostrar';
	// function handleFileUpload
	var $errFileSize   = 'The %s was too big';
	var $errFileReq   = '%s is a required field';
}
?>
