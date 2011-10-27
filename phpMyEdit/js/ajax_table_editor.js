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
var historyObject = new Array();
var historyCounter = 0;
var trackHistory = false;
var javascript = '';

var scripts = document.getElementsByTagName('script');
var script = scripts[scripts.length - 1];
var pathWithFile = script.getAttribute("src");
var jsPath = pathWithFile.indexOf('/') >= 0 ? pathWithFile.match(/^(.+)\//)[0] : '';

if(typeof(mateDeleteMsg) == 'undefined' || mateDeleteMsg == null)
{
	document.write('<script type="text/javascript" src="'+jsPath+'lang/lang_vars-en.js"></scr' + 'ipt>');
}

function displayInfo(info)
{
	javascript = '';
	var i = 0;
	while(info[i] != null)
	{
		/* Uncomment if else statement for debugging
		if(info[i].layer_id != null && info[i].layer_id.length > 0 && $(info[i].layer_id) == null)
		{
			alert(info[i].layer_id + ' does not exist');
		}
		else
		{
		*/
			if(info[i].where == 'innerHTML')
				$(info[i].layer_id).innerHTML = info[i].value;
			else if(info[i].where == 'remove')
				$(info[i].layer_id).remove();
			else if(info[i].where == 'append')
				$(info[i].layer_id).insert(info[i].value);
			else if(info[i].where == 'value')
				$(info[i].layer_id).value = info[i].value;
			else if(info[i].where == 'javascript')
			{
				eval(info[i].value);
				if(trackHistory != null && trackHistory)
				{
					javascript += info[i].value+"\n";
				}
			}
		//}
		i = i + 1;
	}
	if($('ajaxLoader1') != null)
	{
		$('ajaxLoader1').setStyle('display: none;');
	}
}

function toAjaxTableEditor(action,info)
{
	if($('ajaxLoader1') != null)
	{
		$('ajaxLoader1').setStyle('display: inline;');
	}
	
	var data = new Object();
	data.action = action;
	data.info = info;
	var json = encodeURIComponent(Object.toJSON(data));
	
	new Ajax.Request(ajaxUrl,
	{
		method:'post',
		parameters: 'json='+json,
		onSuccess: 
		function(transport)
		{
			if(transport.responseText.isJSON()) {
				//alert(transport.responseText);
				displayInfo(transport.responseText.evalJSON(true));
				if(trackHistory != null && trackHistory)
				{
					setTimeout("storeHistory();",100);
				}
			}
			else {
				var respText = transport.responseText.replace(/<br \/>/g, '\n');
				alert(mateErrRespText+'\n\n' + respText.replace(/<br>/g, '\n'));	
			}
			// Un-comment to view json returned from server
			//alert(transport.responseText);
		},
		onFailure: function(){ alert(mateErrAjaxUrl) }
	});
}

function storeHistory()
{
	var index = historyObject.length;
	if((historyCounter + 1) < index)
	{
		index = historyCounter + 1;
	}
	historyObject[index] = new Object();
	historyObject[index].historyHtml = $('historyContainer').innerHTML;
	historyObject[index].javascript = javascript;
	
	
	// Unset all future history entries
	var minValue = index + 1;
	var maxValue = historyObject.length - 1;
	
	while(minValue <= maxValue)
	{
		if(delete historyObject[minValue])
		{
			historyObject.length--;
		}
		minValue++;
	}
	
	historyCounter = index;
	updateHistoryButtons();
}	

function backButtonPressed()
{
	historyCounter--;
	$('historyContainer').innerHTML = historyObject[historyCounter].historyHtml;
	eval(historyObject[historyCounter].javascript);
	updateHistoryButtons();
}

function forwardButtonPressed()
{
	historyCounter++;
	$('historyContainer').innerHTML = historyObject[historyCounter].historyHtml;
	eval(historyObject[historyCounter].javascript);
	updateHistoryButtons();
}

function updateHistoryButtons(disableForward)
{
	var backDisabled = '';
	var forwardDisabled = '';
	if(historyCounter == 0)
	{
		backDisabled = 'disabled="disabled"';
	}
	if((historyCounter + 1) >= historyObject.length)
	{
		forwardDisabled = 'disabled="disabled"';		
	}
	var navButtonHtml = '<button onclick="backButtonPressed();" ' + backDisabled + '>'+mateBtnBack+'</button>&nbsp;<button onclick="forwardButtonPressed();" ' + forwardDisabled + '>'+mateBtnForward+'</button>';
	$('historyButtonsLayer').innerHTML = navButtonHtml;
}

function handleSearch()
{
	var info = $('searchString').value;	
	toAjaxTableEditor('handle_search',info);
}

function clearSearch()
{
	$('searchString').value = '';	
	toAjaxTableEditor('handle_search','');
}

function confirmDeleteRow(id)
{
	if(confirm(mateDeleteMsg))
	{
		toAjaxTableEditor('delete_row',id);	
	}
}

function updateRow(id,varPrefix)
{
	var info = new Object();
	info['old_primary_key_value'] = id;
	var formElem = document.getElementById(varPrefix + '_edit_form');
	for(i=0; i < formElem.elements.length; i++)
	{
		var inputId = formElem.elements[i].id;
		if(formElem.elements[i].type.toLowerCase() == 'radio')
		{
			if(formElem.elements[i].checked)
			{
				info[inputId] = formElem.elements[i].value;
			}
		}
		else
		{
			info[inputId] = $(inputId).value;
		}
	}
	toAjaxTableEditor('update_row',info);
}

function updateMultRows(idArr,varPrefix)
{
	if(confirm(mateUpdateMultMsg.replace(/#num_rows#/,idArr.length)))
	{
		var info = new Object();
		info.idArr = idArr;
		info.inputInfo = new Object();
		var formElem = document.getElementById(varPrefix + '_edit_form');
		for(i=0; i < formElem.elements.length; i++)
		{
			var inputId = formElem.elements[i].id;
			if(formElem.elements[i].disabled == false)
			{
				if(formElem.elements[i].type.toLowerCase() == 'radio')
				{
					if(formElem.elements[i].checked)
					{
						info.inputInfo[inputId] = formElem.elements[i].value;
					}
				}
				else
				{
					info.inputInfo[inputId] = $(inputId).value;
				}
			}
		}
		toAjaxTableEditor('update_mult_rows',info);
	}
}

function addRow(varPrefix)
{
	var info = new Object();
	var formElem = document.getElementById(varPrefix + '_add_form');
	for(i=0; i < formElem.elements.length; i++)
	{
		var inputId = formElem.elements[i].id;
		if(formElem.elements[i].type.toLowerCase() == 'radio')
		{
			if(formElem.elements[i].checked)
			{
				info[inputId] = formElem.elements[i].value;
			}
		}
		else
		{
			info[inputId] = $(inputId).value;
		}
	}
	toAjaxTableEditor('insert_row',info);
}

function enterPressed(e)
{
	var characterCode;
	if(e && e.which){           // NN4 specific code
		e = e
		characterCode = e.which
	}
	else {
		e = event
		characterCode = e.keyCode // IE specific code
	}
	if (characterCode == 13) 
		return true   // Enter key is 13
	else 
		return false
}

function handleAdvancedSearch(numSearches)
{
	var i;
	var info = new Object();
	for(i = 0; i < numSearches; i++)
	{
		info[i] = new Object();
		info[i]['cols'] = $('as_cols_' + i).value;
		info[i]['opts'] = $('as_opts_' + i).value;
		info[i]['strs'] = $('as_strs_' + i).value;
	}
	toAjaxTableEditor('advanced_search',info);
}

function selectCbs(cb,varPrefix)
{
	var tableForm = $(varPrefix + '_table_form');
	if(cb.checked)
	{
		for(i=0; i < tableForm.elements.length; i++)
		{
			var checkbox = tableForm.elements[i];
			if(checkbox.disabled == false)
			{
				checkbox.checked = true;
				changeRowStyle(checkbox);
			}
		}
	}
	else
	{
		for(i=0; i < tableForm.elements.length; i++)
		{
			var checkbox = tableForm.elements[i];
			if(checkbox.disabled == false)
			{
				checkbox.checked = false;
				changeRowStyle(checkbox);
			}
		}
	}
}

function changeRowStyle(cb)
{
	var idParts = cb.id.split('_');
	var id = idParts[1];
	if(cb.checked)
	{
		var row = $('row_' + id);
		if(row != null)
		{
			row.setStyle('background-color: #fcffd0;');
		}
	}
	else
	{
		var row = $('row_' + id);
		if(row != null)
		{
			var oldColor = '#ffffff;';
			if(row.hasAttribute("bgcolor"))
			{
				oldColor = row.getAttribute("bgcolor");
			}
			row.setStyle('background-color: ' + oldColor + ';');
		}
	}
}

function checkBoxClicked(cb)
{
	var idParts = cb.id.split('_');
	var id = idParts[1];
	if(cb.checked)
	{
		cb.checked = false;
	}
	else
	{
		cb.checked = true;
	}
}

function cellClicked(id)
{
	var cb = $('cb_' + id);
	if(cb.checked)
	{
		cb.checked = false;
	}
	else
	{
		cb.checked = true;
	}
	changeRowStyle(cb);
}

function userButtonClicked(varPrefix,buttonKey,confirmMsg)
{
	var info = new Object();
	info['buttonKey'] = buttonKey;
	info['checkboxes'] = new Object();
	var numRows = 0;
	var tableForm = $(varPrefix + '_table_form');
	for(i=0; i < tableForm.elements.length; i++)
	{
		var cb = tableForm.elements[i];
		if(cb.checked && cb.id != 'select_all_cb')
		{
			info['checkboxes'][i] = cb.value;
			numRows++;
		}
	}
	if(numRows == 0)
	{
		alert(mateSelectRow);	
	}
	else if(confirmMsg.length > 0)
	{
		if(confirm(confirmMsg))
		{
			toAjaxTableEditor('user_button_clicked',info);
		}
	}
	else
	{
		toAjaxTableEditor('user_button_clicked',info);		
	}
}

function userIconClicked(action,info,confirmMsg)
{
	if(confirmMsg.length > 0)
	{
		if(confirm(confirmMsg))
		{
			toAjaxTableEditor(action,info);
		}
	}
	else
	{
		toAjaxTableEditor(action,info);		
	}
}

function editCopyViewDelete(varPrefix,action)
{
	var info = new Object();
	var numRows = 0;
	var selectedIndex;
	var tableForm = $(varPrefix + '_table_form');
	for(i=0; i < tableForm.elements.length; i++)
	{
		var cb = tableForm.elements[i];
		if(cb.checked && cb.id != 'select_all_cb')
		{
			info[i] = cb.value;
			selectedIndex = i;
			numRows++;
		}
	}
	if(numRows == 0)
	{
		alert(mateSelectRow);
	}
	else
	{
		if(action == 'edit_row')
		{
			if(numRows == 1)
			{
				toAjaxTableEditor(action,info[selectedIndex]);
			}
			else
			{
				//alert(mateEdit1Row);
				toAjaxTableEditor('edit_mult_rows',info);				
			}
		}
		else if(action == 'view_row')
		{
			if(numRows == 1)
			{
				toAjaxTableEditor(action,info[selectedIndex]);
			}
			else
			{
				alert(mateView1Row);	
			}
		}
		else if(action == 'delete_mult_rows')
		{
			var confirmMsg;
			if(numRows == 1)
			{
				confirmMsg = mateDeleteMsg;
			}
			else
			{
				confirmMsg = mateDeleteMultMsg.replace(/#num_rows#/,numRows);
			}
			if(confirm(confirmMsg))
			{
				toAjaxTableEditor(action,info);
			}
		}
		else if(action == 'copy_mult_rows')
		{
			if(numRows == 1)
			{
				toAjaxTableEditor('copy_row',info[selectedIndex]);
			}
			else if(confirm(mateCopyMultMsg.replace(/#num_rows#/,numRows)))
			{
				toAjaxTableEditor(action,info);
			}
		}
	}
}

function formatDate(dateStr,dateFormat)
{
	var date = new Date(dateStr.substring(0,4),dateStr.substring(5,7) - 1,dateStr.substring(8,10),dateStr.substring(11,13),dateStr.substring(14,16),dateStr.substring(17,19));
	info = new Object();
	info["disp_date"] = date.print(dateFormat);
	info["php_date"] = dateStr;
	info["js_date"] = date;
	return info;
}

function prepareForCalendar(input,id,dateFormat,resetDate,extraInfo)
{
	var jsPath2 = jsPath == null ? 'js/' : jsPath;
	if(input)
	{
		if(dateFormat == null || dateFormat == '') { dateFormat = '%d %B %Y'; }
		if(extraInfo == null || extraInfo == '') { extraInfo = ''; }
		input.id = id;
		var phpDate = '0000-00-00';
		var dispDate = mateNoDate;
		var jsDate = new Date();
		var result = input.value.search(/0000-00-00/);
		if(resetDate == null || resetDate == '')
		{
			var resetDate = ''; 
		}
		else
		{
			resetDate = '<a class="resetDate" href="javascript: void(0);" onclick="resetDate(\''+id+'\');" title="'+mateRemoveDate+'"><img src="'+jsPath2.substring(0,jsPath2.length - 3)+'images/reset_date.gif" alt="reset" /></a>';
		}
		if(result == -1 && input.value.length > 0)
		{
			dateInfo = formatDate(input.value,dateFormat);
			dispDate = dateInfo["disp_date"];
			jsDate = dateInfo["js_date"];
			phpDate = dateInfo["php_date"];
		}
		var container = input.parentNode;
		container.innerHTML = '<span id="show_'+id+'">'+dispDate+'</span><img src="'+jsPath2+'jscalendar/img.gif" id="trigger_'+id+'" style="cursor: pointer; border: 1px solid red; margin: 0 3px 0 3px;" title="Date selector" onMouseOver="this.style.background=\'red\';" onmouseout="this.style.background=\'\'" />'+resetDate+extraInfo+'<input type="hidden" name="'+id+'" id="'+id+'" value="'+phpDate+'" />';
		Calendar.setup({
			inputField     :    id,     // id of the input field
			ifFormat       :    "%Y-%m-%d %H:%M:%S",     // format of the input field (even if hidden, this format will be honored)
			displayArea    :    "show_"+id,       // ID of the span where the date is to be shown
			daFormat       :    dateFormat,     // format of the displayed date
			button         :    "trigger_"+id,  // trigger button (well, IMG in our case)
			align          :    "Tl",
			date           :    jsDate,
			singleClick    :    true,		
			weekNumbers    :    false
		});			
	}
}

function resetDate(id)
{
	$(id).value = '0000-00-00';
	$('show_'+id).innerHTML = mateNoDate;
}

function resetScrollTop()
{
	document.documentElement.scrollTop = 0;
	document.body.scrollTop = 0;
}

function showHideColumn(cb,col)
{
    if(cb.checked)
    {
        toAjaxTableEditor('show_column',col);
    }
    else
    {
        toAjaxTableEditor('hide_column',col);
    }
}

function disableEnableInput(column,cb)
{
	if(cb.checked)
	{
		$(column).disabled = false;
		if($(column + '_req_mark') != null)
		{
			$(column + '_req_mark').setStyle("display: inline;");
		}
	}
	else
	{
		$(column).disabled = true;
		if($(column + '_req_mark') != null)
		{
			$(column + '_req_mark').setStyle("display: none;");
		}
	}
}

function updateCheckBoxValue(cb,checkedValue,unCheckedValue)
{
	if(cb.checked)
	{
		cb.value = checkedValue;
	}
	else
	{
		cb.value = unCheckedValue;
	}
}

