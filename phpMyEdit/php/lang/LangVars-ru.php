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
	var $errNoSelect   = 'Ошибка при подключении к mysql: невозможно выбрать базу данных %s';
	var $errNoConnect  = 'Ошибка при подключении к mysql: невозможно установить соединение';
	var $errInScript   = 'Ошибка в скрипте %s на строке  %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	var $optLike       = 'Содержит';
	var $optNotLike    = 'Не содержит';
	var $optEq         = 'Равно';
	var $optNotEq      = 'Не равно';
	var $optGreat      = 'Больше чем';
	var $optLess       = 'Меньше чем';
	var $optGreatEq    = 'Больше или равно';
	var $optLessEq     = 'Меньше или равно';
	
	var $ttlAddRow     = 'Добавить строку';
	var $ttlEditRow    = 'Редактировать строку';
	var $ttlEditMult   = 'Редактировать несколько строк';
	var $ttlViewRow    = 'Просмотреть строку';
	var $ttlShowHide   = 'Показать/скрыть столбцы';
	var $ttlOrderCols  = 'Порядок столбцов';
	//function doDefault
	var $errNoAction   = 'Ошибка в программе. Действие %s не найдено.';
	//function doQuery
	var $errQuery      = 'Произошла ошибка при выполнении следующего запроса:';
	var $errMysql      = 'Сообщение mysql:';
	// function editMultRows
	var $edit1Row      = 'Вы можете редактировать только одну строку за раз.';
	// function updateRow
	var $errVal        = 'Пожалуйста исправьте поля выделенные  красным цветом';
	// function formatIcons
	var $ttlInfo       = 'Информация';
	var $ttlEdit       = 'Редактировать';
	var $ttlCopy       = 'Копировать';
	var $ttlDelete     = 'Удалить';
	// function getAdvancedSearchHtml
	var $lblSelect     = 'Выберите';
	// All Buttons
	var $btnBack       = 'Назад';
	var $btnCancel     = 'Отменить';
	var $btnEdit       = 'Редактировать';
	var $btnAdd        = 'Добавить';
	var $btnUpdate     = 'Обновить';
	var $btnView       = 'Просмотреть';
	var $btnCopy       = 'Копировать';
	var $btnDelete     = 'Удалить';
	var $btnExport     = 'Экспортировать';
	var $btnSearch     = 'Поиск';
	var $btnCSearch    = 'Очистить поиск';
	var $btnASearch    = 'Расширенный поиск';
	var $btnQSearch    = 'Быстрый поиск';
	var $btnReset      = 'Сбросить';
	var $btnAddCrit    = 'Добавить критерий';
	var $btnShowHide   = 'Показать/скрыть столбцы';
	var $btnOrderCols  = 'Порядок столбцов';
	var $btnCFilters   = 'Очистить фильтры';
	var $btnFilters    = 'Применить фильтры';
	// function displayTableHtml
	var $ttlDispRecs   = 'Отображается %s - %s из %s записей';
	var $ttlDispNoRecs = 'Отображается 0 записей';
	var $ttlRecords    = 'Записи';
	var $ttlNoRecord   = 'Записей не найдено';
	var $lblSearch     = 'Поиск';
	var $lblPage       = 'Страница #:';
	var $lblDisplay    = 'Отображение #:';
	var $lblMatch      = 'Совпадает:';
	var $lblAllCrit    = 'Все критерии';
	var $lblAnyCrit    = 'Любой критерий';
	// function showHideColumns
	var $ttlColumn     = 'Столбец';
	var $ttlCheckBox   = 'Отображение';
	// function handleFileUpload
	var $errFileSize   = 'The %s was too big';
	var $errFileReq   = '%s is a required field';
}
?>
