/* INIT */
var portalName = $('[name="portal_name"]').val();var currentPath;
/*var currentFile = $('[name="data-ajax-get-file"]').val();*/
var currentPage;
var currentType;
var currentID;
var htmlTitle;
var currentBusinessName;
var currentDateFormat;var currentAdditionalParameters;var currentYear = new Date().getFullYear();var browserHistory = [];var dataTable;
var dataTableAllRows;
var dataTableAllRowsIDsArray = [];var refreshTrackTimeInterval;var lineItemCount;function init() {
  "use strict";fireTiprPlugin();
  clearInterval(refreshTrackTimeInterval);/* sometimes autocomplete remained */
  $('.autocomplete-suggestions').remove();
  $('.pika-single').remove();/* set environment variables */
  currentPath = window.location.pathname;
  currentPage = $('[name="current_page"]').val();
  currentType = $('[name="current_type"]').val();
  currentID = $('[name="current_id"]').val();
  htmlTitle = $('[name="html_title"]').val();
  currentBusinessName = $('[name="business_name"]').val();
  currentDateFormat = $('[name="current_date_format"]').val();
  currentAdditionalParameters = $('[name="current_additional_parameters"]').val();
  portalName = $('[name="portal_name"]').val();setTimeout(function() {
    $('[name="load_from_datatables_state"]').val('false');
  }, 1000);/* set page title */
  $('title').html(htmlTitle + ' - ' + currentBusinessName);switch (currentPage) {case 'new_invoice':
    case 'new_recinvoice':
    case 'new_bill':
    case 'new_recbill':
    case 'new_estimate':  fireUploadifivePlugin();
      fireDatePicker();  fireAutocomplete('connection');
      fireAutocomplete('item');
      fireAutocomplete('expense');
      fireAutocomplete('mileage');
      fireAutocomplete('time');  //refreshNumberFormatAndPrecision();
      fireSortablePlugin();  showHideTDS();  loadTagsPopover('tags');
      loadTagsPopover('taxes');
      loadTagsPopover('discounts');
      loadTagsPopover('shipping');  // count existing line items for add_line function  
      lineItemCount = $('body').find('.one_item_line.actual').length;  break;case 'edit_invoice':
    case 'edit_recinvoice':
    case 'edit_bill':
    case 'edit_recbill':
    case 'edit_estimate':  fireUploadifivePlugin();
      fireDatePicker();  fireAutocomplete('connection');
      fireAutocomplete('item');
      fireAutocomplete('expense');
      fireAutocomplete('mileage');
      fireAutocomplete('time');  //refreshNumberFormatAndPrecision();
      fireSortablePlugin();  showHideTDS();  loadTagsPopover('tags');
      loadTagsPopover('taxes');
      loadTagsPopover('discounts');
      loadTagsPopover('shipping');  // count existing line items for add_line function  
      lineItemCount = $('body').find('.one_item_line.actual').length;  break;case 'invoices':
    case 'recinvoices':
    case 'bills':
    case 'recbills':
    case 'estimates':
    case 'connections':
    case 'items':
    case 'tasks':
    case 'expenses':
    case 'trips':
    case 'team':
    case 'tags':
    case 'trash':
    case 'expense_entries':
    case 'mileage_entries':
    case 'invoice_activity':
    case 'recinvoice_activity':
    case 'bill_activity':
    case 'recbill_activity':
    case 'estimate_activity':
    case 'invoice_payments':
    case 'bill_payments':
    case 'invoice_comments':
    case 'bill_comments':
    case 'estimate_comments':  // do these two pages exist? 
    case 'invoice_recurring_invoices':
    case 'bill_recurring_bills':case 'recinvoice_invoices':
    case 'recbill_bills':
    case 'connection_invoices':
    case 'connection_recinvoices':
    case 'connection_bills':
    case 'connection_recbills':
    case 'connection_estimates':
    case 'connection_contacts':  fireDataTables();  break;case 'time_entries':  fireDataTables();  /* refresh active time tracker amounts every 30000 ms = 30 seconds */
      refreshTrackTimeInterval = window.setInterval(function() {
        refreshTrackTime();
      }, 30000);
  break;case 'dashboard':  fireDatePicker();  var selectedGraph;
      var graphDisplayName;
      var graphPeriodFrom;
      var graphPeriodTo;
      var graphPeriodFromFormatted;
      var graphPeriodToFormatted;
      var selectedPeriodValue;  /* load graph settings from cookie */
      var storedGraphSettings = $.parseJSON(localStorage.getItem(portalName + '_graph_settings'));  //console.log(storedGraphSettings);  if (storedGraphSettings) {
        selectedGraph = storedGraphSettings.graphType;
        graphDisplayName = storedGraphSettings.graphDisplayName;selectedPeriodValue = storedGraphSettings.graphSelectedPeriod;if (storedGraphSettings.graphSelectedPeriod === 'custom') {
          graphPeriodFrom = storedGraphSettings.graphCustomPeriodFrom;
          graphPeriodTo = storedGraphSettings.graphCustomPeriodTo;
          graphPeriodFromFormatted = storedGraphSettings.graphCustomPeriodFromFormatted;
          graphPeriodToFormatted = storedGraphSettings.graphCustomPeriodToFormatted;
        } else {
          graphPeriodFrom = $('[name="period"] option[value="' + storedGraphSettings.graphSelectedPeriod + '"]').attr('data-period-start');
          graphPeriodTo = $('[name="period"] option[value="' + storedGraphSettings.graphSelectedPeriod + '"]').attr('data-period-end');
          graphPeriodFromFormatted = $('[name="period"] option[value="' + storedGraphSettings.graphSelectedPeriod + '"]').attr('data-period-start-formatted');
          graphPeriodToFormatted = $('[name="period"] option[value="' + storedGraphSettings.graphSelectedPeriod + '"]').attr('data-period-end-formatted');
        }  } else {
        selectedGraph = 'invoiced_received';
        graphDisplayName = 'Invoiced / Received';
        selectedPeriodValue = 3;
        graphPeriodFrom = $('[name="period"] option[value="3"]').attr('data-period-start');
        graphPeriodTo = $('[name="period"] option[value="3"]').attr('data-period-end');
        graphPeriodFromFormatted = $('[name="period"] option[value="3"]').attr('data-period-start-formatted');
        graphPeriodToFormatted = $('[name="period"] option[value="3"]').attr('data-period-end-formatted');
      }  // load selected info into chart container 
      $('[data-chart-box-heading="true"]').html(graphDisplayName + ' (' + graphPeriodFromFormatted + ' - ' + graphPeriodToFormatted + ')');
      $('select[name="report_type"] option[value="' + selectedGraph + '"]').prop('selected', true);
      $('[name="period"] option[value="' + selectedPeriodValue + '"]').prop('selected', true);  mainHighchart(selectedGraph, graphPeriodFrom, graphPeriodTo);  secondaryPieChart($('[name="invoice_summary[received]"]').val(), $('[name="invoice_summary[outstanding]"]').val());  /* parse string to array */
      dashboardComparisonChart($('[name="income_expenditure[income]"]').val().split(',').map(Number), $('[name="income_expenditure[expenditure]"]').val().split(',').map(Number));  break;case 'view_public_invoice':
    case 'view_public_recinvoice':
    case 'view_public_bill':
    case 'view_public_recbill':
    case 'view_public_estimate':
    case 'view_public_account_statement':  //fireDatePicker();  break;case 'view_account_statement':  fireDatePicker();  break;case 'colors':  // not working
      //jscolor.init();  break;case 'files':
      fireDataTables();
      fireUploadifivePlugin();
      break;case 'graphics':
      fireUploadifivePlugin();
      break;case 'reports':
      fireDatePicker();
      fireAutocomplete('connection');
      break;}}/* INITIAL PAGE LOAD */
$(document).ready(function() {
  "use strict";// prevent caching with ajax
  $.ajaxSetup({
    cache: false
  });init();
  currentPath = window.location.pathname;browserHistory[0] = {
    indexNo: 0,
    pagePath: window.location.pathname,
    getFile: $('[name="data-ajax-get-file"]').val(),
    getPage: $('[name="data-ajax-get-page"]').val(),
    getType: $('[name="data-ajax-get-type"]').val(),
    getID: $('[name="data-ajax-get-id"]').val(),
    getAdditionalParameters: $('[name="current_additional_parameters"]').val(),
  };//console.log(JSON.stringify(browserHistory));});/* AJAX PAGE LOAD */
function goToPage(pagePath, getFile, getPage, getType, getID, isBackOrForward, generalInfoArray, additionalParams) {
  "use strict";var URL;if (additionalParams) {
    URL = '/pages/' + getFile + '.php?is_ajax=1&page=' + getPage + '&type=' + getType + '&id=' + getID + additionalParams;
  } else {
    URL = '/pages/' + getFile + '.php?is_ajax=1&page=' + getPage + '&type=' + getType + '&id=' + getID;
  }$.ajax({
    type: 'GET',
    url: URL,
    dataType: "html",
    statusCode: {
      205: function() {
        window.location.href = '/login';
        return false;
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  $('main').html(data);  init();  if (pagePath != window.location) {window.history.pushState({
          path: pagePath
        }, '', pagePath);/* only save this page to browser history if its not the back button AND if target page is not the last saved page */
        if (isBackOrForward !== true && (browserHistory[browserHistory.length - 1].pagePath !== pagePath)) {  var indexNo = browserHistory.length;  browserHistory[indexNo] = {
            indexNo: indexNo,
            pagePath: pagePath,
            getFile: getFile,
            getPage: getPage,
            getType: getType,
            getID: getID,
            getAdditionalParameters: additionalParams
          };  /* refresh environment variables */
          currentFile = getFile;
          currentPath = pagePath;}  }  //console.log(JSON.stringify(browserHistory));  // alert after page change
      if (generalInfoArray) {
        generalInfo(generalInfoArray[0], generalInfoArray[1], generalInfoArray[2]);
      }  return false;}});}/* REFRESH CURRENT PAGE */
function reloadPage(generalInfoArray) {
  'use strict';
  goToPage(currentPath, currentFile, currentPage, currentType, currentID, true, generalInfoArray, currentAdditionalParameters);
}$('body').on('click', '[data-ajax="true"]', function(event) {
  "use strict";
  event.preventDefault();var pagePath = $(this).attr('href');// Check "open in new window/tab" key modifiers
  if (event.shiftKey || event.ctrlKey || event.metaKey) {
    window.open(pagePath, '_blank');
    return false;
  }var getFile = $(this).attr('data-ajax-get-file');
  var getPage = $(this).attr('data-ajax-get-page');
  var getType = $(this).attr('data-ajax-get-type');
  var getID = $(this).attr('data-ajax-get-id');var getAdditionalParams = $(this).attr('data-ajax-get-parameters') ? $(this).attr('data-ajax-get-parameters') : null;/* respect last page additional parameters for onpage back button */
  if ($(this).attr('data-ajax-is-onpage-back-button') && browserHistory.length > 1) {
    getAdditionalParams = browserHistory[browserHistory.length - 2].getAdditionalParameters;
    pagePath = browserHistory[browserHistory.length - 2].pagePath;
  }goToPage(pagePath, getFile, getPage, getType, getID, false, null, getAdditionalParams);});
/* HANDLE BACK BUTTON */
$(window).bind('popstate', function() {
  "use strict";var indexNo = browserHistory.length;
  var indexNoBefore = indexNo - 2;if (indexNo > 1) {var pagePath = browserHistory[indexNoBefore].pagePath;
    var getFile = browserHistory[indexNoBefore].getFile;
    var getPage = browserHistory[indexNoBefore].getPage;
    var getType = browserHistory[indexNoBefore].getType;
    var getID = browserHistory[indexNoBefore].getID;
    var getAdditionalParams = browserHistory[indexNoBefore].getAdditionalParameters;//console.log(getAdditionalParams);goToPage(pagePath, getFile, getPage, getType, getID, true, null, getAdditionalParams);
    browserHistory = browserHistory.slice(0, -1);}});/* FIRE DATATABLES PLUGIN */
function fireDataTables() {
  "use strict";var defaultOrder;
  var ajaxURL;var enableFiltering;
  var filterColumn;// additional config
  switch (currentPage) {case 'files':
      // sort by upload date descrending
      defaultOrder = [
        [1, "desc"]
      ];
      ajaxURL = '/php/table_data.php?type=' + currentPage + '&id=' + currentID;
      break;  /* DELETE
      case 'report':
      var customCurrentType;
      var typeToUse;
			
      if (currentType === 'estimates') {
      customCurrentType = 'dashboard_estimates';
      }
			
      if (customCurrentType) {
      typeToUse = customCurrentType;
      } else {
      typeToUse = currentType;
      }
			
      ajaxURL = '/php/table_data.php?type=' + typeToUse + '&id=' + currentID;
			
      enableFiltering = true;
      filterColumn = 4;
      break;
      */case 'invoices':
    case 'estimates':
    case 'bills':
      ajaxURL = null;
      enableFiltering = true;
      filterColumn = 6;
      break;case 'recinvoices':
    case 'recbills':
      ajaxURL = null;
      enableFiltering = true;
      filterColumn = 5;
      break;case 'connections':
      ajaxURL = null;
      enableFiltering = false;
      break;case 'time_entries':
    case 'expense_entries':
    case 'mileage_entries':
      ajaxURL = null;
      defaultOrder = [
        [1, "desc"]
      ];
      enableFiltering = false;
      break;default:
      ajaxURL = '/php/table_data.php?type=' + currentPage + '&id=' + currentID;
      enableFiltering = false;
      filterColumn = 5;}// extra DataTables functions 
  jQuery.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
    return {
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };//console.log(localStorage.getItem('dataTableSavedLength'));// basic DataTables config 
  dataTable = $('[data-table="table"]').DataTable({
    "ajax": ajaxURL,
    "iDisplayLength": localStorage.getItem('dataTableSavedLength') ? parseInt(localStorage.getItem('dataTableSavedLength')) : 10,
    "order": defaultOrder ? defaultOrder : [],
    stateSave: true,
    stateSaveCallback: function(settings, data) {  // log state data for debugging
      //console.log('SAVED: '+JSON.stringify(data));  // save state data in local storage
      localStorage.setItem('DataTables_state', JSON.stringify(data));},
    stateLoadCallback: function(settings) {  if ($('[name="load_from_datatables_state"]').val() === 'true') {// save state data in variable
        var stateData = JSON.parse(localStorage.getItem('DataTables_state'));// log state data for debugging
        //console.log('LOADED: ' + JSON.stringify(localStorage.getItem('DataTables_state')));// put state data search string into search box
        $('[data-table="search"]').val(stateData.search.search);// load all state data with DataTables
        return stateData;
      }},
    "language": {
      "emptyTable": "Nothing to display here"
    },
    "initComplete": function() {  // get all ids of all objects/items contained in current dataTable
      dataTableAllRows = this.fnGetNodes();  for (var i = 0; i < dataTableAllRows.length; i++) {
        dataTableAllRowsIDsArray.push($(dataTableAllRows[i]).find('td input[type="checkbox"]').attr('data-item-id'));
      }  if (enableFiltering === true) {var thisTable = this;
        // Populate values 
        var $rows = this.fnGetNodes();
        var values = {};
        /* currently used only for 5th column, switch currentPage if use of function widens */
        var colnums = [filterColumn];for (var col = 0, n = colnums.length; col < n; col++) {  var colnum = colnums[col];
          if (typeof values[colnum] === "undefined") values[colnum] = {};  // Create Unique List of Values
          $('td:nth-child(' + colnum + ')', $rows).each(function() {
            //values[colnum][$(this).find('[data-filter]').attr('data-filter')] = 1;
            values[colnum][$(this).find('[data-filter]').text()] = 1;
          });  // Create Checkboxes
          var labels = [];
          $.each(values[colnum], function(key, count) {
            var $checkbox = $('<input />', {
              'class': 'filter-column filter-column-' + colnum,
              'type': 'checkbox',
              'value': key
            });
            var $label = $('<label></label>', {
              'class': 'filter-container'
            }).append($checkbox).append(' ' + ucFirst(key.toLowerCase()));
            $checkbox.on('click', function() {
              thisTable.fnDraw();
            }).data('colnum', colnum);
            labels.push($label.get(0));
          });
          var $sorted_containers = $(labels).sort(function(a, b) {
            return $(a).text().toLowerCase() > $(b).text().toLowerCase();
          });
          $('.table-filters').prepend($sorted_containers);
          $sorted_containers.wrapAll($('<div></div>', {
            'class': 'checkbox-group checkbox-group-column-' + colnum
          }));
        }$.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
          var checked = [];
          $('.filter-column').each(function() {
            var $this = $(this);
            if ($this.is(':checked')) checked.push($this);
          });  if (checked.length) {
            var returnValue = false;
            $.each(checked, function(i, $obj) {
              // $obj.val() contains the string according to which filtering happens
              // aData[$obj.data('colnum') - 1] is "this" current object's value 
              if ($.trim(aData[$obj.data('colnum') - 1].toLowerCase()) === $.trim($obj.val().toLowerCase())) {
                returnValue = true;
                return false; // exit loop early
              }
            });    return returnValue;
          }  if (!checked.length) return true;
          return false;  /* taken from http://jsfiddle.net/vol7ron/z7wJ5/ */});  }},
    "fnDrawCallback": function() {  $('[data-table="show_per_page"]').val(this.fnPagingInfo().iLength);  $('[data-table="meta"]').html('<span data-meta="default">Showing <strong>' + ((this.fnPagingInfo().iStart) + 1) + '</strong> to <strong>' + this.fnPagingInfo().iEnd + '</strong> of <strong>' + this.fnPagingInfo().iTotal + '</strong> item(s)</span><span data-meta="custom" class="hidden">Selected <strong class="dynamic">0</strong> of <strong>' + this.fnPagingInfo().iTotal + '</strong> item(s)</span>');
      deselectAllSelectedItems();}});// move pagination to show per page section
  $('.dataTables_paginate').appendTo('[data-table="pagination"]');// use our search box instead of DataTable.js default 
  $('[data-table="search"]').keyup(function() {
    dataTable.search($(this).val()).draw();
  });// use our show-per-page instead of DataTable.js default 
  $('[data-table="show_per_page"]').change(function() {localStorage.setItem('dataTableSavedLength', $(this).val());dataTable.page.len($(this).val()).draw();
  });// clear the current state config (page, search, etc.)
  //dataTable.state.clear();// https://www.datatables.net 
}/* REFRESH DATA TABLE */
function refreshDataTable(resetPagination, callBack) {
  "use strict";/* resetPagination is either "true" or "false" */
  if (resetPagination !== true) {
    resetPagination = false;
  }if (callBack) {
    dataTable.ajax.reload(function() {
      callBack();
    }, resetPagination);
  } else {
    dataTable.ajax.reload(null, resetPagination);
  }//console.log('datatable refresh success');
}/* REFRESH DATA TABLE WITH NEW URL */
function refreshDataTableNewURL(URL) {
  "use strict";
  dataTable.ajax.url(URL).load(function() {/* this was specific to the old table tabs function, can be deleted
    $('[data-reload-datatable-url]').removeClass('current');
    $('[data-reload-datatable-url="'+URL+'"]').addClass('current');
    */});}/* DATA TABLE CUSTOM FILTERING */
$('body').on('click', '[data-reload-datatable="true"]', function() {
  "use strict";var newURL = $(this).attr('data-reload-datatable-url');
  refreshDataTableNewURL(newURL);});/* CHECK IF STATEMENT PAGE */
function isPrivateStatementPage(currentPage) {
  "use strict";// add view_invoice, edit_invoice pages etc ... 
  if (currentPage === 'new_invoice' || currentPage === 'new_recinvoice' || currentPage === 'new_bill' || currentPage === 'new_recbill' || currentPage === 'new_estimate' || currentPage === 'edit_invoice' || currentPage === 'edit_recinvoice' || currentPage === 'edit_bill' || currentPage === 'edit_recbill' || currentPage === 'edit_estimate') {
    return true;
  } else {
    return false;
  }}/* CHECK IF PUBLIC STATEMENT PAGE */
function isPublicStatementPage(currentPage) {
  "use strict";if (currentPage === 'view_public_invoice' || currentPage === 'view_public_recinvoice' || currentPage === 'view_public_bill' || currentPage === 'view_public_recbill' || currentPage === 'view_public_estimate') {
    return true;
  } else {
    return false;
  }}/* GET LAST CLICKED OBJECT */
var clickedObject;$(document).mousedown(function(e) {
  'use strict';
  clickedObject = $(e.target);
});/* UCFIRST - CAPITALIZE FIRST LETTER OF STRING */
function ucFirst(value) {
  'use strict';
  if (!value) {
    return false;
  }return value.replace(/^./, value[0].toUpperCase());
}function refreshStatementConnectionContacts(connectionID) {
  /* get connection contacts */
  $.ajax({
    type: 'POST',
    url: '/php/autocomplete_handler.php?action_type=connection_contacts&id=' + connectionID,
    dataType: 'json',
    success: function(data) {  var suggestionsArray = '';  $.each(data, function(number) {if (number == 0) {  $('[name="custom_email_to"]').attr('data-empty-on-blur', (data[number].first_name + ' ' + data[number].last_name + ' <' + data[number].email_address + '>'));
          $('[name="custom_email_to"]').attr('data-default-fallback', (data[number].first_name + ' ' + data[number].last_name + ' <' + data[number].email_address + '>'));
          $('[name="custom_email_to"]').val(data[number].first_name + ' ' + data[number].last_name + ' <' + data[number].email_address + '>');  //$('[name="custom_email_bcc"]').attr('data-empty-on-blur', (data[number].first_name +' '+ data[number].last_name +' <'+data[number].email_address+'>'));  $('[name="custom_email_bcc"]').val('');
        }suggestionsArray += (number === 0 ? '' : ',') + data[number].first_name + ' ' + data[number].last_name + ' (' + data[number].email_address + ')';  });  $('[name="custom_email_to"]').attr('data-offline-autocomplete-suggestions', suggestionsArray);
      $('[name="custom_email_bcc"]').attr('data-offline-autocomplete-suggestions', suggestionsArray);}});}/* STATEMENT-PAGE FLIP BOARD */
$('body').on('click', '.flip', function() {
  "use strict";var pageToFlipTo = $(this).attr('data-flippable');
  var connectionID = $(this).closest('form').find('[name="client_id"]').val();if (pageToFlipTo === 'statement_settings' && !connectionID) {
    scrollToTop(0);
    generalInfo('show', 'error', 'Please specify a client/vendor first.');
    return false;
  } else {
    generalInfo('hide');
  }var statementType = $('form[data-form-type="statement"]').attr('data-statement-type');$('.flippable').toggleClass('flipped');if (isPrivateStatementPage(currentPage)) {if ($('[data-flip-text-target="true"]').hasClass('is_dropdown')) {
      $('[data-flip-text-target="true"]').closest('a').toggleClass('flip');
      $('[data-flip-text-target="true"]').closest('a').toggleClass('dropdown-toggle');
    } else {
      $('[data-flip-text-target="true"]').toggleClass('flip');
    }$('[data-flip-text-target="true"]').toggleText('Continue', $('[data-flip-text-target="true"]').attr('data-original-button-text'));
  }if (isPublicStatementPage(currentPage)) {
    $('.back_button.secondary').toggle();
    $('.main_button').toggle();
  }$('.back_button.secondary').toggleClass('flip');
  $('.back_button.secondary').toggleText('Back to ' + ucFirst(statementType), $('.back_button.secondary').attr('data-back-to-title'));scrollToTop(250);if ($('.flippable').hasClass('flipped')) {$('button[form="' + currentPage + '"]').attr('data-prevent-default', 'true');$('.back_button.secondary').attr('data-prevent-default', 'true');
    $('.back_button.secondary').attr('data-ajax', 'false');} else {$('button[form="' + currentPage + '"]').attr('data-prevent-default', 'false');$('.back_button.secondary').attr('data-prevent-default', 'false');
    $('.back_button.secondary').attr('data-ajax', 'true');}});/* PREVENT DEFAULT ON CLICK FUNCTION */
$('body').on('click', '[data-prevent-default="true"]', function(event) {
  "use strict";
  event.preventDefault();
});/* RENDER MAIN HIGHCHART */
function mainHighchart(dataType, periodFrom, periodTo) {
  "use strict";if ($('#main-chart').length == 0) {
    /* optimise this --> mainHighchart should not be called in these cases in the first place */
    return false;
  }var dataHandlerAdditionalParameters = '{"graphs_only":1,"no_cache":1}';var dataTypeName;
  var postDataJSON;
  var goToPageArray;var doubleGraph;switch (dataType) {case 'invoiced':
      dataTypeName = 'invoice_total';
      postDataJSON = '{ "graphs": [{"name":"graph","type":"' + dataTypeName + '","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"}]}';
      goToPageArray = ['/reports/invoices/' + periodFrom + '/' + periodTo + '/all_currencies/all_statuses/all_connections', 'reports', 'reports', null, null, false, null, '&report_type=invoices&report_period=custom&report_period_from=' + periodFrom + '&report_period_to=' + periodTo + '&report_currency=all_currencies&report_statement_status=all_statuses&report_client_type=all_connections'];
      break;case 'estimates':
      dataTypeName = 'estimate_total';
      postDataJSON = '{ "graphs": [{"name":"graph","type":"' + dataTypeName + '","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"}]}';
      goToPageArray = ['/reports/estimates/' + periodFrom + '/' + periodTo + '/all_currencies/all_statuses/all_connections', 'reports', 'reports', null, null, false, null, '&report_type=estimates&report_period=custom&report_period_from=' + periodFrom + '&report_period_to=' + periodTo + '&report_currency=all_currencies&report_statement_status=all_statuses&report_client_type=all_connections'];
      break;  /*case 'outstanding':
      dataTypeName = 'invoice_total_due';
      postDataJSON = '{ "graphs": [{"name":"graph","type":"'+dataTypeName+'","grouping":"","start_date":"'+periodFrom+'","end_date":"'+periodTo+'"}]}';
      break;*/case 'received':
      dataTypeName = 'payments_received_total';
      postDataJSON = '{ "graphs": [{"name":"graph","type":"' + dataTypeName + '","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"}]}';
      goToPageArray = ['/reports/payments/' + periodFrom + '/' + periodTo + '/all_currencies/all_statuses/all_connections', 'reports', 'reports', null, null, false, null, '&report_type=payments&report_period=custom&report_period_from=' + periodFrom + '&report_period_to=' + periodTo + '&report_currency=all_currencies&report_statement_status=all_statuses&report_client_type=all_connections'];
      break;  /*case 'invoiced':
      dataTypeName = 'invoice_total';
      postDataJSON = '{ "graphs": [{"name":"graph","type":"'+dataTypeName+'","grouping":"","start_date":"'+periodFrom+'","end_date":"'+periodTo+'"}]}';
      break;*/case 'income_expenditure':
      postDataJSON = '{ "graphs": [{"name":"graph","type":"bill_total","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"},{"name":"graph2","type":"invoice_total","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"}]}';
      goToPageArray = ['/reports', 'reports', 'reports', null, null, false, null, null];
      doubleGraph = true;
      break;case 'invoiced_received':
      postDataJSON = '{ "graphs": [{"name":"graph","type":"invoice_total","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"},{"name":"graph2","type":"payments_received_total","grouping":"","start_date":"' + periodFrom + '","end_date":"' + periodTo + '"}]}';
      goToPageArray = ['/reports', 'reports', 'reports', null, null, false, null, null];
      doubleGraph = true;
      break;}//console.log(postDataJSON);$.ajax({
    type: "POST",
    url: '/php/ajax_handler.php?endpoint=stats&action_type=create',
    data: ({
      postArray: postDataJSON,
      additional_parameters: dataHandlerAdditionalParameters
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  if (data.success === 1) {/*$.each(data.message.graphs,function(key, value) {
        	alert('');
        });*/var categoriesArray = [];
        var seriesArray = [];
        var seriesArray2 = [];$.each(data.message.graphs.graph, function(key, value) {
          categoriesArray.push(key);
          seriesArray.push(value);
        });/* OPTIMISE THIS! */
        if (doubleGraph === true) {  $.each(data.message.graphs.graph2, function(key, value) {
            seriesArray2.push(value);
          });}var chartSeries;
        var extraLabel = '';switch (dataType) {  case 'income_expenditure':
            chartSeries = [{
              name: 'Expenses',
              data: seriesArray,
              color: '#e35256',
            }, {
              name: 'Invoiced',
              data: seriesArray2,
              color: '#3da07b',
            }, ];
            extraLabel = ' ' + data.message.currency + ' ';
            break;  case 'invoiced_received':
            chartSeries = [{
              name: 'Invoiced',
              data: seriesArray,
              color: '#' + $('[name="ccfg_main_secondary"]').val(),
            }, {
              name: 'Received',
              data: seriesArray2,
              color: '#3da07b',
            }, ];
            extraLabel = ' ' + data.message.currency + ' ';
            break;  default:
            chartSeries = [{
              name: data.message.currency,
              data: seriesArray,
              color: '#' + $('[name="ccfg_main_secondary"]').val(),
            }];
            break;}var chart = new Highcharts.Chart({
          chart: {
            renderTo: 'main-chart',
            type: 'column',
            height: 300,
          },
          credits: {
            enabled: false
          },
          legend: {
            enabled: false
          },
          exporting: {
            enabled: false
          },
          title: {
            text: ''
          },
          yAxis: [{
            opposite: true,
            title: '',
            labels: {
              align: 'left',
            }
          }],
          xAxis: {
            categories: categoriesArray
          },
          plotOptions: {
            series: {
              cursor: 'pointer',
              point: {
                events: {
                  click: function() {
                    /* switch type */
                    if (goToPageArray) {
                      goToPage(goToPageArray[0], goToPageArray[1], goToPageArray[2], goToPageArray[3], goToPageArray[4], goToPageArray[5], goToPageArray[6], goToPageArray[7]);
                    }
                  }
                }
              }
            }
          },
          series: chartSeries,
          tooltip: {
            backgroundColor: 'none',
            borderWidth: 0,
            shadow: false,
            useHTML: true,
            padding: 0,
            formatter: function() {      var s = [];      $.each(this.points, function(i, point) {
                //<strong>'+ point.series.name +'</strong>
                s.push(point.series.name + extraLabel + ' ' + formatNumber(point.y, parseInt($('[name="current_number_format"]').val()), parseInt($('[name="current_number_precision"]').val())));
              });      return '<div class="graph_tooltip_new">' + s.join('<br>') + '</div>';
            },
            shared: true,
            positioner: function(labelWidth, labelHeight, point) {
              var tooltipX, tooltipY;
              if (point.plotX + chart.plotLeft < labelWidth && point.plotY + labelHeight > chart.plotHeight) {
                tooltipX = chart.plotLeft;
                tooltipY = chart.plotTop + chart.plotHeight - 2 * labelHeight - 10;
              } else {
                tooltipX = chart.plotLeft;
                tooltipY = chart.plotTop + chart.plotHeight - labelHeight;
              }
              return {
                x: tooltipX,
                y: tooltipY
              };
            }
          },});  } else {
        //alert(data.message);
      }}});}/* DASHBOARD - CHANGE MAIN GRAPH PARAMETERS */
$('body').on('submit', '[name="graph_params"]', function(event) {
  'use strict';
  event.preventDefault();var reportType = $(this).find('select[name="report_type"]').val();
  var reportName;switch (reportType) {case 'invoiced':
      reportName = 'Invoiced Total';
      break;case 'estimates':
      reportName = 'Estimate Total';
      break;case 'received':
      reportName = 'Payments Received';
      break;case 'income_expenditure':
      reportName = 'Invoiced / Expenses';
      break;case 'invoiced_received':
      reportName = 'Invoiced / Received';
      break;}var periodFrom;
  var periodTo;var periodFromFormatted;
  var periodToFormatted;if ($(this).find('select[name="period"]').val() !== 'custom') {
    periodFrom = $(this).find('select[name="period"] option:selected').attr('data-period-start');
    periodTo = $(this).find('select[name="period"] option:selected').attr('data-period-end');
    periodFromFormatted = $(this).find('select[name="period"] option:selected').attr('data-period-start-formatted');
    periodToFormatted = $(this).find('select[name="period"] option:selected').attr('data-period-end-formatted');
  } else {
    periodFrom = $(this).find('input[name="period_from"]').attr('data-real-date');
    periodTo = $(this).find('input[name="period_to"]').attr('data-real-date');
    periodFromFormatted = $(this).find('input[name="period_from"]').val();
    periodToFormatted = $(this).find('input[name="period_to"]').val();
  }//var graphType = $(this).find('select[name="period"] option:selected').val();mainHighchart(reportType, periodFrom, periodTo);$(this).closest('.board.chart').find('.box_header [data-chart-box-heading="true"]').html(reportName + ' (' + periodFromFormatted + ' - ' + periodToFormatted + ')');/* save settings to cookie */
  var graphSettingsArray = {
    graphType: reportType,
    graphDisplayName: reportName,
    graphSelectedPeriod: $(this).find('select[name="period"]').val(),
    graphCustomPeriodFrom: periodFrom,
    graphCustomPeriodTo: periodTo,
    graphCustomPeriodFromFormatted: periodFromFormatted,
    graphCustomPeriodToFormatted: periodToFormatted,
  };localStorage.setItem(portalName + '_graph_settings', JSON.stringify(graphSettingsArray));});/* RENDER SECONDARY PIE CHART */
function secondaryPieChart(numberReceived, numberOutstanding) {
  "use strict";/* format numbers according to current config */
  var formattedNumberReceived = formatNumber(numberReceived, parseInt($('[name="current_number_format"]').val()), parseInt($('[name="current_number_precision"]').val()));
  var formattedNumberOutstanding = formatNumber(numberOutstanding, parseInt($('[name="current_number_format"]').val()), parseInt($('[name="current_number_precision"]').val()));var chart = new Highcharts.Chart({
    chart: {
      renderTo: 'pie-chart',
      type: 'pie',
      spacingLeft: -10
    },
    title: {
      text: ''
    },
    yAxis: {
      title: {
        text: ''
      }
    },
    credits: {
      enabled: false
    },
    legend: {
      enabled: false
    },
    exporting: {
      enabled: false
    },
    plotOptions: {
      series: {
        shadow: false,
        cursor: 'pointer',
        point: {
          events: {
            click: function() {
              var subPath;      switch (this.name) {        case 'Received':
                  goToPage('/reports/payments/' + currentYear + '-01-01/' + getTodaysDate() + '/all_currencies/all_statuses/all_connections', 'reports', 'reports', null, null, false, null, '&report_type=payments&report_period=custom&report_period_from=' + currentYear + '-01-01&report_period_to=' + getTodaysDate() + '&report_currency=all_currencies&report_statement_status=all_statuses&report_client_type=all_connections');
                  break;        case 'Outstanding':
                  goToPage('/reports', 'reports', 'reports', null, currentYear + '-01-01;' + getTodaysDate(), false, null, null);
                  break;      }
            }
          }
        }
      }
    },
    tooltip: {
      formatter: function() {var labelValue;switch (this.point.name) {  case 'Received':
            labelValue = formattedNumberReceived;
            break;  case 'Outstanding':
            labelValue = formattedNumberOutstanding;
            break;}return '<span class="tooltip_item"><b>' + this.point.name + ':</b> ' + $('[name="current_currency"]').val() + ' ' + labelValue + '</span>';  }
    },
    series: [{
      name: 'Name',
      data: [
        ["Received", parseFloat(numberReceived)],
        ["Outstanding", parseFloat(numberOutstanding)]
      ],
      size: '95%',
      innerSize: '50%',
      colors: ['#3da07b', '#e35256'],
      showInLegend: true,
      dataLabels: {
        enabled: false
      }
    }]
  });
}/* DASHBOARD COMPARISON CHART */
function dashboardComparisonChart(IncomeArray, ExpenditureArray) {
  "use strict";var chart = new Highcharts.Chart({
    chart: {
      renderTo: 'comparison-chart',
    },
    title: {
      text: ''
    },
    credits: {
      enabled: false
    },
    legend: {
      enabled: true,
      layout: 'horizontal',
      backgroundColor: '#FFFFFF',
      align: 'right',
      verticalAlign: 'top',
      floating: true,
    },
    exporting: {
      enabled: false
    },
    plotOptions: {
      series: {
        shadow: false,
        cursor: 'pointer',
        point: {
          events: {
            click: function() {
              goToPage('/reports', 'reports', 'reports', null, currentYear + '-01-01;' + getTodaysDate(), false, null, null);
            }
          }
        }
      }
    },
    tooltip: {
      backgroundColor: 'none',
      borderWidth: 0,
      shadow: false,
      useHTML: true,
      padding: 0,
      formatter: function() {
        var s = [];$.each(this.points, function(i, point) {
          //<strong>'+ point.series.name +'</strong>
          s.push('<span class="tooltip_item ' + point.series.name + '">' + $('[name="current_currency"]').val() + ' ' + formatNumber(point.y, parseInt($('[name="current_number_format"]').val()), parseInt($('[name="current_number_precision"]').val())) + '</span>');
        });return s.join('');
      },
      shared: true,
      positioner: function() {
        return {
          x: 10,
          y: 10
        };
      }
    },
    xAxis: {
      title: {
        text: ''
      },
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ]
    },
    yAxis: {
      gridLineWidth: 0,
      minorGridLineWidth: 0,
      title: {
        text: ''
      },
      labels: {
        enabled: false
      },
      plotLines: [{
        value: 0,
        width: 1,
      }]
    },
    series: [{
      name: 'Invoiced',
      color: '#3da07b',
      lineWidth: 3,
      data: IncomeArray,
      marker: {
        enabled: false
      }
    }, {
      name: 'Expenses',
      type: 'column',
      color: '#e35256',
      lineWidth: 3,
      data: ExpenditureArray,
      marker: {
        enabled: false
      }
    }]
  });
}/* DROPDOWN */
$('body').on('click', '.dropdown-toggle', function(evt) {
  "use strict";if (evt.target.type == "checkbox") {
    return;
  }if ($(this).hasClass('sb_dropdown')) {
    $('.sidebar_menu ul.sb_menu').toggleClass('disabled');
  } else {
    $('.sidebar_menu ul.sb_menu').removeClass('disabled');
  }$('.dropdown-menu').not($(this).next('.dropdown-menu')).hide();
  $(this).next('.dropdown-menu').toggle();
  $(this).toggleClass('open');
});/* CLOSE DROPDOWN */
function closeDropdown() {
  "use strict";
  $('.sidebar_menu ul.sb_menu').removeClass('disabled');
  $('.dropdown-menu').hide();
  $('.dropdown-menu li').removeClass('selected');
  $('.dropdown-toggle').removeClass('open');
  dropdownNavIndex = -1;
}/* CLOSE DROPDOWN ON CLICK OF DOCUMENT */
$(document).click(function(event) {
  "use strict";
  var target = event.target;if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle') && !$(target).is('.dropdown-menu.popover') && !$(target).parents().is('.dropdown-menu.popover') && !$(target).is('select') && !$(target).is('input[type="text"]') && !$(target).parents().is('.table-filters')) {
    closeDropdown();
  }
});/* DROPDOWN NAVIGATION */
var dropdownNavIndex = -1;$('html').on('keydown', 'body', function(event) {
  "use strict";if ($('.dropdown-toggle.open').length) {var dropdownToggle = $('.dropdown-toggle.open');
    var dropdownMenu = $(dropdownToggle).next('.dropdown-menu');
    var isSubmittableDropdown = dropdownMenu.find('[data-dropdown="submit"]').length ? true : false;if (isSubmittableDropdown !== true) {  if (event.keyCode === 40) {
        event.preventDefault();
        navigateDropdown(1, $(dropdownToggle));
      }  if (event.keyCode === 38) {
        event.preventDefault();
        navigateDropdown(-1, $(dropdownToggle));
      }}if (event.keyCode === 13) {
      event.preventDefault();  if (isSubmittableDropdown === true) {
        dropdownMenu.find('[data-dropdown="submit"]').click();
      } else {if (dropdownMenu.hasClass('contains_buttons')) {
          // appending [0] to the link selector makes JS take into account href and target attributes when clicked
          dropdownMenu.find('li').not('[data-dropdown="skip"]').eq(dropdownNavIndex).find('button')[0].click();
        } else {
          // appending [0] to the link selector makes JS take into account href and target attributes when clicked
          dropdownMenu.find('li').not('[data-dropdown="skip"]').eq(dropdownNavIndex).find('a')[0].click();
        }  }}if (event.keyCode === 27) {
      event.preventDefault();
      closeDropdown();
    }}});function navigateDropdown(diff, dropdownToggle) {
  "use strict";var dropdownMenu = dropdownToggle.next('.dropdown-menu');
  var dropdownMenuLinks = dropdownMenu.find('li').not('[data-dropdown="skip"]');dropdownNavIndex += diff;if (dropdownNavIndex >= dropdownMenuLinks.length) {
    dropdownNavIndex = 0;
  }if (dropdownNavIndex < 0) {
    dropdownNavIndex = dropdownMenuLinks.length - 1;
  }dropdownMenuLinks.removeClass('selected').eq(dropdownNavIndex).addClass('selected');
}/* NEW: ACTION ON SELECT CUSTOM VALUE IN INPUTS, SELECT */
$('body').on('change', '[data-action="on-select-custom"]', function() {
  "use strict";var actionType = $(this).attr('data-action-type');
  var inputType = $(this).attr('data-input-type');
  var selector;switch (inputType) {case 'select':
      selector = $(this).val();
      break;case 'radio':
      selector = $('[name="' + $(this).attr('name') + '"]:checked').val();
      break;}if (selector === 'custom') {switch (actionType) {  case 'dashboard_main_graph_params':
        $(this).closest('li').find('[data-action-target="on-select-custom"]').show();
        break;  case 'saved_categories_popup_unit':
        $(this).closest('.form_row').find('[data-action-target="on-select-custom"]').show().focus();
        break;  case 'statement_due_date':
      case 'statement_expiration_date':
        $(this).closest('.form_row').find('[data-action-target="on-select-custom"]').show().focus();
        $(this).closest('.form_row').find('[data-action-target="on-select-custom"] input[type="number"]').focus();
        break;  case 'statement_item_unit':
        $(this).hide();
        $(this).closest('li').find('.select_arrows').hide();
        $(this).closest('li').find('[data-action-target="on-select-custom"]').show().focus();
        break;  case 'statement_total_tds':
        $(this).hide();
        $(this).closest('li').find('.select_arrows').hide();
        $(this).closest('li').find('[data-action-target="on-select-custom"]').show();
        break;  case 'statement_rec_frequency':
      case 'account_satement_period':
        $(this).closest('.page').find('[data-action-target="on-select-custom"]').css('display', 'inline-block');
        break;  case 'default_custom_statement_email':
        $(this).closest('.page').find('section.editor').removeClass('disabled');
        break;  case 'report_builder_period':
      case 'report_builder_client_type':
        $(this).closest('.form_row').next('[data-action-target="on-select-custom"]').css('display', 'inline-block').focus();
        break;}} else {switch (actionType) {  case 'dashboard_main_graph_params':
        $(this).closest('li').find('[data-action-target="on-select-custom"]').hide();
        break;  case 'saved_categories_popup_unit':
      case 'statement_expiration_date':
      case 'statement_due_date':
        $(this).closest('.form_row').find('[data-action-target="on-select-custom"]').val('').hide();
        break;  case 'statement_rec_frequency':
      case 'account_satement_period':
        $(this).closest('.page').find('[data-action-target="on-select-custom"]').css('display', 'none');
        break;  case 'default_custom_statement_email':
        $(this).closest('.page').find('section.editor').addClass('disabled');
        $(this).closest('form').find('[name="custom_email_to"]').val($(this).closest('form').find('[name="custom_email_to"]').attr('data-default-fallback'));
        $(this).closest('form').find('[name="custom_email_bcc"]').val($(this).closest('form').find('[name="custom_email_bcc"]').attr('data-default-fallback'));
        $(this).closest('form').find('[name="custom_email_subject"]').val($(this).closest('form').find('[name="custom_email_subject"]').attr('data-default-fallback'));
        $(this).closest('form').find('[name="custom_email_content"]').val($(this).closest('form').find('[name="custom_email_content"]').attr('data-default-fallback'));
        break;  case 'report_builder_period':
      case 'report_builder_client_type':
        $(this).closest('.form_row').next('[data-action-target="on-select-custom"]').hide();
        break;}}
});/* VALIDATE EMAIL */
function isValidEmailAddress(emailAddress) {
  var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
  return pattern.test(emailAddress);
}/* CHECK IF STRING CONTAINS EMAIL */
function checkIfEmailInString(text) {
  var re = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
  return re.test(text);
}/* EXTRACT ALL EMAILS FROM STRING */
function extractEmails(text) {
  return text.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi);
}/* INITIALISE POPUP STRUCTURES */
function initPopup() {$('.x_page').show(0);
  $('.popup_load_spinner').hide();
  scrollToTop(0);}function scrollToTop(speed) {if (!speed) {
    speed = 0;
  }$("html, body").animate({
    scrollTop: 0
  }, speed);}/* OPEN POPUP - DYNAMIC */
$('body').on('click', '[data-popup="open"]', function(event) {
  "use strict";
  event.preventDefault();// un-focus button to prevent re-click on enter
  $(this).blur();// get type of popup
  var identification = $(this).attr('data-popup-id');// PHP file to get HTML popup
  var fileIdentifier;// get ID of item to be edited, POSTed below via AJAX
  var itemID;// get ID of connection related to current request, POSTed below via AJAX
  var connectionID;// additional config
  var fireDatePicker;
  var fireUploadifive;
  var doLoadExistingTags;
  var fireAutocompletePlugin;// additional detail for special cases
  var popupDetail = $(this).attr('data-popup-detail');// additional GET params to append to URL
  var URLaddons = '';switch (identification) {case 'new_client':
    case 'new_vendor':
      fileIdentifier = 'create_edit_connection';
      break;case 'edit_client':
    case 'edit_vendor':
      fileIdentifier = 'create_edit_connection';
      break;case 'new_connection_contact':
      fileIdentifier = 'create_edit_connection_contact';
      connectionID = $('[name="current_id"]').val();
      break;case 'edit_connection_contact':
      fileIdentifier = 'create_edit_connection_contact';
      itemID = $(this).closest('tr').find('input[type="checkbox"]').attr('data-item-id');
      break;case 'new_track_time':
    case 'new_track_expense':
    case 'new_track_mileage':
      fileIdentifier = 'create_edit_track_entry';
      fireDatePicker = true;
      fireUploadifive = true;
      doLoadExistingTags = true;
      fireAutocompletePlugin = true;
      break;case 'edit_track_time':
    case 'edit_track_expense':
    case 'edit_track_mileage':
      fileIdentifier = 'create_edit_track_entry';
      fireDatePicker = true;
      fireUploadifive = true;
      doLoadExistingTags = true;
      fireAutocompletePlugin = true;
      itemID = $(this).closest('tr').find('input[type="checkbox"]').attr('data-item-id');
      break;case 'new_saved_item':
    case 'new_saved_task':
    case 'new_saved_expense':
    case 'new_saved_trip':
    case 'new_saved_tag':
      fileIdentifier = 'create_edit_categories';  if (popupDetail === 'statement') {URLaddons = '&statement=true';var categoryName = $(this).closest('.one_item_line').find('.item_textarea').val();
        var categoryRate = $(this).closest('.one_item_line').find('[data-calculation="rate"]').val();
        var categoryUnit;var defaultCategoryUnit = $(this).closest('.one_item_line').find('.unit_lower select').val();
        var customCategoryUnit = $(this).closest('.one_item_line').find('.unit_lower input[type="text"]').val();var useTextInput;
        var passIn;if (identification === 'new_saved_item') {  if (customCategoryUnit) {
            categoryUnit = customCategoryUnit;
            useTextInput = true;
          } else {
            categoryUnit = defaultCategoryUnit;
          }}if (categoryName || categoryRate || categoryUnit) {
          passIn = true;
        }  }  break;case 'edit_saved_item':
    case 'edit_saved_task':
    case 'edit_saved_expense':
    case 'edit_saved_trip':
    case 'edit_saved_tag':
      fileIdentifier = 'create_edit_categories';
      itemID = $(this).closest('tr').find('input[type="checkbox"]').attr('data-item-id');
      break;case 'new_statement_comment':
      fileIdentifier = 'create_edit_statement_comment';
      itemID = $('[name="current_id"]').val();
      break;case 'edit_statement_comment':
      fileIdentifier = 'create_edit_statement_comment';
      itemID = $(this).closest('tr').find('input[type="checkbox"]').attr('data-item-id');
      break;case 'new_invoice_payment':
    case 'new_bill_payment':
      fileIdentifier = 'create_edit_statement_payment';
      fireDatePicker = true;
      fireUploadifive = true;
      doLoadExistingTags = true;
      itemID = $('[name="current_id"]').val();
      break;case 'edit_invoice_payment':
    case 'edit_bill_payment':
      fileIdentifier = 'create_edit_statement_payment';
      fireDatePicker = true;
      fireUploadifive = true;
      doLoadExistingTags = true;
      itemID = $(this).closest('tr').find('input[type="checkbox"]').attr('data-item-id');
      break;case 'new_payment_method':
      fileIdentifier = 'new_payment_method';
      break;case 'upgrade':
      fileIdentifier = 'upgrade';
      itemID = $(this).attr('data-feature');
      break;default:
      fileIdentifier = identification;
  }initPopup();$('.x_window').css('min-height', '200px');
  $('.popup_load_spinner').show();$.ajax({
    url: '/templates/x_page/' + fileIdentifier + '.php?is_ajax=1' + URLaddons,
    dataType: 'html',
    data: ({
      identification: identification,
      itemID: itemID,
      connectionID: connectionID
    }),
    type: 'POST',
    statusCode: {
      205: function() {
        window.location.href = '/login';
        return false;
      }
    },
    success: function(data) {  $('.x_window').css('overflow', 'visible');  $('.x_window').append(data);
      $('.popup_load_spinner').hide();  if (fireDatePicker === true) {
        datePicker('datepicker');
      }  if (fireUploadifive === true) {
        fireUploadifivePlugin();
      }  if (doLoadExistingTags === true) {
        loadTagsPopover('tags');
        loadTagsPopover('taxes');
        loadTagsPopover('discounts');
        loadTagsPopover('shipping');
      }  if (fireAutocompletePlugin === true) {
        fireAutocomplete('connection');
        fireAutocomplete('item');
        fireAutocomplete('expense');
        fireAutocomplete('mileage');
        fireAutocomplete('time');
      }  if (passIn === true) {
        $('[name="create_edit_category[name]"]').val(categoryName);
        $('[name="create_edit_category[rate]"]').val(categoryRate);if (useTextInput === true) {
          $('[name="create_edit_category[unit]"]').val('custom');
          $('[name="create_edit_category[custom_unit]"]').show();
          $('[name="create_edit_category[custom_unit]"]').val(categoryUnit);
        } else {
          $('option[value="' + categoryUnit + '"]').attr('selected', 'selected');
        }  }}
  });});/* OPEN POPUP - CONFIRMATION */
$('body').on('click', '[data-confirmation-popup="open"]', function(event) {
  "use strict";
  event.preventDefault();// un-focus button to prevent re-click on enter
  $(this).blur();// get initial form for "submit-initial-form" actionType
  var initialFormID = $(this).attr('form');$('.x_window').css('min-height', '0px');var confirmAction = $(this).attr('data-confirmation-popup-action');var that = $(this);var confirmationText;
  var confirmationButton;
  var actionType;switch (confirmAction) {case 'selection-delete':
      confirmationText = 'Are you sure you want to delete the selected item(s)?';
      confirmationButton = 'Delete';
      actionType = 'selection';
      break;case 'selection-delete-page-reload':
      confirmationText = 'Are you sure you want to delete the selected item(s)?';
      confirmationButton = 'Delete';
      actionType = 'selection-page-reload';
      break;case 'selection-mark-paid':
      confirmationText = 'Are you sure you want to mark the selected item(s) as paid?';
      confirmationButton = 'Confirm';
      actionType = 'selection-mark-paid';
      break;case 'selection-mark-unpaid':
      confirmationText = 'Are you sure you want to mark the selected item(s) as unpaid?';
      confirmationButton = 'Confirm';
      actionType = 'selection-mark-unpaid';
      break;case 'selection-delete-permanently':
      confirmationText = 'Are you sure you want to permanently delete the selected item(s)?';
      confirmationButton = 'Delete';
      actionType = 'trash';
      break;case 'empty-trash':
      confirmationText = 'Are you sure you want to delete all trashed items? This cannot be undone.';
      confirmationButton = 'Delete';
      actionType = 'empty-trash';
      break;case 'selection-archive':
      confirmationText = 'Are you sure you want to archive the selected item(s)?';
      confirmationButton = 'Archive';
      actionType = 'selection';
      break;case 'selection-activate':
      confirmationText = 'Are you sure you want to activate the selected team member(s)?';
      confirmationButton = 'Activate';
      actionType = 'selection';
      break;case 'selection-cancel':
      confirmationText = 'Are you sure you want to cancel the selected item(s)?';
      confirmationButton = 'Confirm';
      actionType = 'selection';
      break;case 'selection-cancel-page-reload':
      confirmationText = 'Are you sure you want to cancel the selected item(s)?';
      confirmationButton = 'Confirm';
      actionType = 'selection-page-reload';
      break;case 'selection-archive-page-reload':
      confirmationText = 'Are you sure you want to archive the selected item(s)?';
      confirmationButton = 'Confirm';
      actionType = 'selection-page-reload';
      break;case 'selection-unarchive-page-reload':
      confirmationText = 'Are you sure you want to unarchive the selected item(s)?';
      confirmationButton = 'Confirm';
      actionType = 'selection-page-reload';
      break;case 'selection-recover':
      confirmationText = 'Are you sure you want to recover the selected item(s)?';
      confirmationButton = 'Recover';
      actionType = 'trash';
      break;case 'selection-convert-to-invoice':
      confirmationText = 'An invoice will be created from this item.';
      confirmationButton = 'Create Invoice';
      actionType = 'selection-convert-to-invoice';
      break;case 'selection-convert-to-bill':
      confirmationText = 'A bill will be created from this item.';
      confirmationButton = 'Create Bill';
      actionType = 'selection-convert-to-bill';
      break;case 'selection-convert-to-estimate':
      confirmationText = 'An estimate will be created from this item.';
      confirmationButton = 'Create Estimate';
      actionType = 'selection-convert-to-estimate';
      break;case 'reset-account':
      confirmationText = 'Are you sure you want to reset your account?';
      confirmationButton = 'Reset Account';
      actionType = 'submit-initial-form';
      break;case 'cancel-account':
      confirmationText = 'Are you sure you want to cancel your account?';
      confirmationButton = 'Cancel Account';
      actionType = 'cancel-account';
      break;case 'single-trash':
      confirmationText = 'Are you sure you want to delete this item?';
      confirmationButton = 'Delete';
      actionType = 'direct';
      break;case 'single-cancel':
      confirmationText = 'Are you sure you want to cancel this item?';
      confirmationButton = 'Confirm';
      actionType = 'direct';
      break;case 'single-archive':
      confirmationText = 'Are you sure you want to archive this item?';
      confirmationButton = 'Confirm';
      actionType = 'direct';
      break;case 'single-unarchive':
      confirmationText = 'Are you sure you want to unarchive this item?';
      confirmationButton = 'Confirm';
      actionType = 'direct';
      break;case 'delete-business':
      confirmationText = 'Are you sure you want to delete this business? This action cannot be reversed.';
      confirmationButton = 'Delete Business';
      actionType = 'delete-business';
      break;case 'delete-payment-method':
      confirmationText = 'Are you sure you want to delete this payment method? This action cannot be reversed.';
      confirmationButton = 'Delete';
      actionType = 'delete-payment-method';
      break;case 'downgrade-plan':
      confirmationText = 'Are you sure you want to downgrade your subscription plan?';
      confirmationButton = 'Downgrade';
      actionType = 'downgrade-plan';
      break;case 'reset-access-key':
      confirmationText = 'Are you sure you want to reset your API access key?';
      confirmationButton = 'Confirm';
      actionType = 'reset-access-key';
      break;default:
      confirmationText = 'Are you sure?';
      confirmationButton = 'Confirm';
      actionType = 'direct';}initPopup();/* append confirmation popup content */
  $('.x_window').append('<div class="x_content confirmation"><header><h1>Confirmation</h1><a class="x_close close_x"></a></header><form id="confirm" class="form_standard x_form"><div class="board"><div class="page"><section><p>' + confirmationText + '</p></section><section><div class="form_row"><button type="submit" form="confirm" class="save_button ccfg_button_secondary">' + confirmationButton + '</button><a class="cancel_button close_x">Cancel</a></section></div></div></form></div>');$('.x_content.confirmation form').on('submit', function(event) {
    event.preventDefault();/* if no error, show loading animation */
    $('[form="' + $(this).attr('id') + '"]').addClass('loading');if (actionType === 'submit-initial-form') {
      $('form#' + initialFormID).submit();
    } else {
      ajaxHandlerAction(that, actionType, null);
    }});});/* CLOSE POPUP */
function closePopup() {
  "use strict";
  $('.x_page').hide();
  $('.x_window').css('overflow', 'hidden');
  $('.x_page .x_window .x_content').remove();
}$("body").on("click", '.close_x', function(event) {
  "use strict";
  event.preventDefault();
  closePopup();
});/* POPUP ERROR INFO SUCCESS MESSAGE */
function popupInfo(showHide, type, message) {
  "use strict";var defaultMessage;$('.x_page .x_window .x_content .info_strip').removeClass('error').removeClass('success');if (showHide === 'hide') {$('.x_page .x_window .x_content .info_strip').hide();} else {$('.x_page .x_window .x_content .info_strip').show();if (type === 'error') {
      defaultMessage = 'Error: Please try again or contact support.';
      $('.x_page .x_window .x_content .info_strip').addClass('error');
    } else if (type === 'success') {
      defaultMessage = 'Success: The requested action has been performed.';
      $('.x_page .x_window .x_content .info_strip').addClass('success');
    }if (message) {
      $('.x_page .x_window .x_content .info_strip .message').html(message);
    } else {
      $('.x_page .x_window .x_content .info_strip .message').html(defaultMessage);
    }}}/* GENERAL PANEL ERROR INFO SUCCESS MESSAGE */
function generalInfo(showHide, type, message) {
  "use strict";if (showHide === 'hide') {$('.alert.dynamic').remove();} else if (showHide && type && message) {scrollToTop(0);
    $('aside#alerts').html('<p class="alert ' + type + ' dynamic">' + message + '</p>');}}/* ACTION SELECTED ITEMS */
function ajaxHandlerAction(that, type, customData) {
  "use strict";var selectedItemsArray = $('[name="selected_items"]').val();var dataHandlerEndpoint = $(that).attr('data-handler-endpoint');
  var dataHandlerAction = $(that).attr('data-handler-action');
  var dataHandlerPostData = $(that).attr('data-handler-postdata');
  var dataObjectID = $(that).attr('data-object-id');var dataHandlerType = $(that).attr('data-handler-type');var doReloadPage = $(that).attr('data-reload-page');var showSuccessMessage;
  var successMessage;var doRefreshDataTable;var hardRedirectURL = $(that).attr('data-hard-redirect-url');var redirect = $(that).attr('data-redirect');
  var redirectPath = $(that).attr('data-redirect-path');
  var redirectFile = $(that).attr('data-redirect-file');
  var redirectPage = $(that).attr('data-redirect-page');
  var redirectType = $(that).attr('data-redirect-type');
  var redirectID = $(that).attr('data-redirect-id');var saveDatatableState;var URL;
  var data = {};switch (type) {case 'direct':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      data = {
        postArray: dataHandlerPostData
      };
      showSuccessMessage = true;
      break;case 'selection':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      data = {
        postArray: dataHandlerPostData,
        object_array: selectedItemsArray
      };
      doRefreshDataTable = true;
      showSuccessMessage = true;
      break;case 'trash':
      URL = '/php/advanced_ajax_handler.php?type=' + dataHandlerType;
      data = {
        postArray: selectedItemsArray
      };
      doRefreshDataTable = true;
      showSuccessMessage = true;
      break;case 'selection-page-reload':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      data = {
        postArray: dataHandlerPostData,
        object_array: selectedItemsArray
      };
      showSuccessMessage = true;
      saveDatatableState = true;
      doReloadPage = true;
      break;case 'selection-mark-paid':
    case 'selection-mark-unpaid':
      URL = '/php/advanced_ajax_handler.php?type=' + dataHandlerType;
      data = {
        object_array: selectedItemsArray
      };
      showSuccessMessage = true;
      saveDatatableState = true;
      doReloadPage = true;
      break;case 'empty-trash':
      //console.log(dataTableAllRowsIDsArray);
      URL = '/php/advanced_ajax_handler.php?type=' + dataHandlerType;
      data = {
        postArray: JSON.stringify(dataTableAllRowsIDsArray)
      };
      doRefreshDataTable = true;
      showSuccessMessage = true;
      break;case 'start-timer':
      dataHandlerPostData = '{"tracker_active":1}';
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'stop-timer':
      dataHandlerPostData = '{"tracker_active":0}';
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'delete-business':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      hardRedirectURL = '/select?deleted';
      break;case 'delete-payment-method':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      showSuccessMessage = true;
      break;case 'downgrade-plan':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      showSuccessMessage = true;
      break;case 'upgrade-plan':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'cancel-checkout':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'checkout-change-payment-frequency':
      /* allow only if radio button is not already checked */
      if (that.attr('data-radio-selected') === 'true') {
        return false;
      } else {
        $('[data-radio-selected="true"]').removeAttr('data-radio-selected');
        $(that).attr('data-radio-selected', 'true');
      }
      /* allow only if radio button is not already checked */
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'cancel-account':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {};
      break;case 'reset-access-key':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {};
      showSuccessMessage = true;
      break;case 'selection-convert-to-invoice':
      window.location.href = '/invoices/new/' + currentType + ':' + $.parseJSON(selectedItemsArray);
      return false;
      break;case 'selection-convert-to-estimate':
      window.location.href = '/estimates/new/' + currentType + ':' + $.parseJSON(selectedItemsArray);
      return false;
      break;case 'selection-convert-to-bill':
      window.location.href = '/bills/new/' + currentType + ':' + $.parseJSON(selectedItemsArray);
      return false;
      break;case 'accept-estimate':
      URL = '/php/public_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'mark-items-billed':
      URL = '/php/public_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      break;case 'mark-estimate-invoiced':
      URL = '/php/ajax_handler.php?&endpoint=estimate&action_type=edit&object_id=' + customData;
      data = {
        postArray: '{"statement_status":"invoiced"}'
      };
      break;case 'mark-trackers-billed':
      URL = '/php/ajax_handler.php?endpoint=tracker&action_type=edit';  var trackerItemsArray = [];
      var trackerItemsEach = customData.split(',');  $.each(trackerItemsEach, function(number) {
        trackerItemsArray.push(trackerItemsEach[number]);
      });  //console.log(JSON.stringify(trackerItemsArray));  data = {
        postArray: '{"tracker_billed":1}',
        object_array: JSON.stringify(trackerItemsArray)
      };
      break;case 'mark-statement-paid':
    case 'mark-statement-unpaid':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      data = {
        postArray: dataHandlerPostData
      };
      showSuccessMessage = true;
      break;default:}if (showSuccessMessage === true) {
    successMessage = ['show', 'success', $(that).attr('data-success-message')];
  }if (saveDatatableState === true) {
    $('[name="load_from_datatables_state"]').val('true');
  }$.ajax({
    type: 'POST',
    url: URL,
    data: data,
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  if (data.success == 1) {if (hardRedirectURL) {
          window.location.href = hardRedirectURL;
          return false;
        }if (doReloadPage) {
          closePopup();
          reloadPage(successMessage);
          return false;
        }if ((type === 'upgrade-plan' || type === 'checkout-change-payment-frequency') && data.message.payment_required == 1) {
          redirect = true;
          redirectPath = '/checkout/' + data.message.invoice_id;
          redirectFile = 'checkout';
          redirectPage = 'checkout';
          redirectID = data.message.invoice_id;
        }if (redirect) {
          closePopup();
          goToPage(redirectPath, redirectFile, redirectPage, redirectType, redirectID, false, successMessage, null);
          return false;
        }if (doRefreshDataTable === true) {
          refreshDataTable(false, null);
        }generalInfo(successMessage[0], successMessage[1], successMessage[2]);  } else {/* if user downgrades to Free Plan, action succeeds but system returns error anyway --> reload page in spite of error */
        if (type === 'downgrade-plan' && doReloadPage) {
          closePopup();
          reloadPage(successMessage);
          return false;
        }//alert(data.message);
        generalInfo('show', 'error', 'An unknown error occured. Please try again later or contact support.');
      }  closePopup();}});}/* CONFIRMATION POPUPS NAVIGATION */
$('html').on('keydown', 'body', function(event) {
  "use strict";if ($('.x_content.confirmation').length) {/* submit on enter */
    if (event.keyCode === 13) {
      event.preventDefault();  $('.x_content').find('button[type="submit"]').click();}/* close on ESC */
    if (event.keyCode === 27) {
      event.preventDefault();
      closePopup();
    }}});/* DIRECT ACTION CALL - merge the two! */
$('body').on('click', '[data-direct-action]', function() {
  'use strict';var directActionMode = $(this).attr('data-direct-action');ajaxHandlerAction($(this), directActionMode, null);});
/* WAIT FUNCTION */
$.wait = function(ms) {
  var defer = $.Deferred();
  setTimeout(function() {
    defer.resolve();
  }, ms);
  return defer;
};/* DATEPICKER FOR MULTIPLE INPUTS */
function datePicker(identification) {
  "use strict";/*
  if (!identification) {
  return false;	
  }*/var isDateTag;if ($('[for="' + identification + '"]').hasClass('attach_button')) {
    isDateTag = true;
  }var dateFormat;switch (currentDateFormat) {case 'YMd':
      dateFormat = 'YYYY MMMM DD';
      break;case 'dMY':
      dateFormat = 'DD MMMM YYYY';
      break;case 'MdY':
      dateFormat = 'MMMM DD YYYY';
      break;case 'Y-m-d':
      dateFormat = 'YYYY-MM-DD';
      break;case 'd-m-Y':
      dateFormat = 'DD-MM-YYYY';
      break;case 'm-d-Y':
      dateFormat = 'MM-DD-YYYY';
      break;case 'd.m.Y':
      dateFormat = 'DD.MM.YYYY';
      break;default:
      dateFormat = 'YYYY-MM-DD';}new Pikaday({
    field: document.getElementById(identification),
    firstDay: 1,
    format: dateFormat,
    minDate: $('#' + identification).attr('data-datepicker') === 'minDate' ? new Date(moment().format("YYYY, MM, DD")) : undefined,
    onSelect: function() {  if (isDateTag === true) {$('#' + identification).closest('.one_item_line.actual').find('.tag.date').css('display', 'inline-block');
        $('#' + identification).closest('.one_item_line.actual').find('.tag.date .filename').html(this.toString());
        $('#' + identification).closest('.one_item_line.actual').find('.tag.date .filename').attr('data-real-date', this.getMoment().format('YYYY-MM-DD'));
  } else {
        $('#' + identification).attr('data-real-date', this.getMoment().format('YYYY-MM-DD'));
      }
    }
  });}function getTodaysDate() {
  "use strict";var d = new Date();var month = d.getMonth() + 1;
  var day = d.getDate();var output = d.getFullYear() + '-' +
    (('' + month).length < 2 ? '0' : '') + month + '-' +
    (('' + day).length < 2 ? '0' : '') + day;return output;}function fireDatePicker(singleID) {
  "use strict";if (singleID) {
    datePicker(singleID);
  } else {
    $('.datepicker').each(function() {
      datePicker($(this).attr('id'));
    });
  }
}/* PERCENTAGE INPUT RESTRICTION */
$(document).ready(function() {
  "use strict";
  $('body').on('keypress', '[data-input-restriction="percentage"]', function(event) {
    // allow no more typing after first %
    if (this.selectionStart > 0 && $(this).val().charAt(this.selectionStart - 1) === '%') {
      event.preventDefault();
    }
    // Allow only backspace and delete
    if (event.which == 46 && (($(this).val().split(".").length - 1) < 1) || event.which == 8 || event.which == 37) {
      // continue
    } else {
      // Ensure that it is a number and stop the keypress
      if (event.which < 48 || event.which > 57) {
        event.preventDefault();
      }
    }
  });
  $('body').on('keyup', '[data-input-restriction="percentage"]', function() {var inputValue = $(this).val();if ((inputValue.split("%").length - 1) > 1 || (inputValue.split(".").length - 1) > 1 || (inputValue.split("%").length - 1) < 1 && !$.isNumeric(inputValue)) {
      $(this).addClass('error');
    } else {
      $(this).removeClass('error');
    }});
  $('body').on('blur', '[data-input-restriction="percentage"]', function() {var inputValue = $(this).val();if ((inputValue.split("%").length - 1) > 1 || (inputValue.split(".").length - 1) > 1 || (inputValue.split("%").length - 1) < 1 && !$.isNumeric(inputValue)) {
      $(this).val('0.00');
      $(this).removeClass('error');  if (isPrivateStatementPage($('input[name="current_page"]').val())) {
        makeCalculation();
      }
    }
  });});/* NUMBER INPUT RESTRICTION
$(document).ready(function() {
	"use strict";
  $('body').on('keypress', '[data-input-restriction="number"]', function(event) {
  		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    	event.preventDefault();
  		}
  });
  $('body').on('keyup', '[data-input-restriction="number"]', function() {
		
	var inputValue = $(this).val();
	
	if ((inputValue.split(".").length - 1) > 1 || !$.isNumeric(inputValue)) {
		$(this).addClass('error');
	} else {
		$(this).removeClass('error');
	}
		
  });
  $('body').on('blur', '[data-input-restriction="number"]', function() {
		
	var inputValue = $(this).val();
	
	if ((inputValue.split(".").length - 1) > 1 || !$.isNumeric(inputValue)) {var zero = 0;if($(this).attr('data-calculation') === 'quantity') {
			$(this).val('0');
		} else {
			$(this).val(zero.toFixed(2));
		}$(this).removeClass('error');if (isPrivateStatementPage($('input[name="current_page"]').val())) { 
		makeCalculation();
		}
	
	} 
		
  });
  
});
*//* TIME INPUT RESTRICTION */
$(document).ready(function() {
  "use strict";
  /*$('body').on('keypress', '[data-input-restriction="time"]', function(event) {
        // Allow only backspace and delete
        if (event.which == 8 || event.which == 58) {
			// allow no more typing after first ":"
			if(($(this).val().toString().split(":").length - 1) > 0) {
          	      event.preventDefault(); 
			}
			
        } else {
            // Ensure that it is a number and stop the keypress
            if (event.which < 48 || event.which > 57) {
                event.preventDefault(); 
            }   
        }
		
    });*/
  $('body').on('blur', '[data-input-restriction="time"]', function() {var timeInput = $(this).val();if (timeInput) {  /* if time input with ":" */
      if (timeInput.indexOf(':') > -1) {var timeSplitArr = timeInput.split(':');
        var hours = timeSplitArr[0];
        var minutes = timeSplitArr[1];var totalminutes = parseInt(hours) * 60 + parseInt(minutes);var resultTimeArray = MinsToHrsMins(totalminutes);// save total minutes in data attribute for form submissions etc. 
        $(this).attr('data-total-minutes', totalminutes);$(this).val(resultTimeArray[0] + ':' + resultTimeArray[1]);  } else if (!isNaN(timeInput)) {
        /* if no time input with ":" but valid number */$(this).val(decimalToHrsMins(timeInput));// save total minutes in data attribute for form submissions etc. 
        $(this).attr('data-total-minutes', timeInput * 60);  } else {
        /* if invalid input */$(this).val('00:00');
        $(this).attr('data-total-minutes', 0);  }} else {  $(this).val('00:00');
      $(this).attr('data-total-minutes', 0);}makeCalculation();});
});/* SECONDS TO HRS:MINS */
function MinsToHrsMins(mins) {
  var hours = Math.floor(mins / 60);if (hours < 10) {
    hours = '0' + hours;
  }var minutes = "0" + (mins - hours * 60);
  return [hours, minutes.substr(-2)];
}/* DECIMAL NUMBERS TO HRS:MINS */
function decimalToHrsMins(decimal) {
  return (function(i) {var hourValue = i;
    var minuteValue = (Math.round(((decimal - i) * 60), 10));if (hourValue < 10) {
      hourValue = '0' + hourValue;
    }if (minuteValue === 0) {
      minuteValue = '00';
    }return hourValue + ':' + (minuteValue);
  })(parseInt(decimal));
}/* DYNAMICALLY CALL TIPR PLUGIN */
function fireTiprPlugin() {
  "use strict";
  $('.tipr').each(function() {
    $(this).tipr();
  });
  $('.tiprtop').each(function() {
    $(this).tipr({
      'mode': 'top'
    });
  });
}/* NEW: Switch between Individual & Organization */
$('body').on('change', '[name="connection_type"]', function() {
  "use strict";
  var chosenType = $(this).val();
  var translatedType;switch (chosenType) {
    case '1':
      translatedType = 'organization';
      $(this).closest('form').find('.form_row.organization input').removeAttr('disabled');
      $(this).closest('form').find('.form_row.individual input').attr('disabled', 'disabled');
      break;case '2':
      translatedType = 'individual';
      $(this).closest('form').find('.form_row.individual input').removeAttr('disabled');
      $(this).closest('form').find('.form_row.organization input').attr('disabled', 'disabled');
      break;
  }$(this).closest('form').attr('data-connection-type', translatedType);
});/* NEW CLIENT - MORE DETAILS */
$("body").on("click", '.more_client_details_button', function() {
  "use strict";
  $('#more_client_details_container').toggleClass('hidden');
  $('.more_client_details_button span').toggleText('Show less', 'Show more');});/* ADJUST CUSTOM FIELD VALUES AND NAMES */
function adjustCustomFields(formContainer) {
  "use strict";$(formContainer).find('.custom_field_container').each(function() {var fieldName = $(this).find('[name="custom_field_key"]').val();
    var fieldValue = $(this).find('[name="custom_field_value"]').val();// disregard 1st input (key) and set name of 2nd input (value) to value of 1st input
    $(this).find('[name="custom_field_value"]').attr("name", "custom_fields[" + fieldName + "]");});}/* SERIALIZE FORM TO JSON */
(function($) {
  $.fn.serializeFormJSON = function() {var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
      if (o[this.name]) {
        if (!o[this.name].push) {
          o[this.name] = [o[this.name]];
        }
        o[this.name].push(this.value || '');
      } else {
        o[this.name] = this.value || '';
      }
    });
    return o;
  };
})(jQuery);/* VALIDATE FORM FIELDS FUNCTION */
function validateFormFields(form) {
  'use strict';var error;$(form).find('[data-validate="required"]:visible').each(function() {if (!$(this).val()) {
      $(this).addClass('error');
      error = true;
    } else {
      $(this).removeClass('error');
    }});if (error === true) {if ($(form).hasClass('x_form')) {
      popupInfo('show', 'error', 'There were errors. Please try again.');
    } else {
      generalInfo('show', 'error', 'There were errors. Please amend all required fields and try again.');
    }return false;} else {
    generalInfo('hide');
  }return true;}/* TRANSLATE API ERROR MESSAGES */
function translateError(errorMessage) {
  'use strict';var translatedErrorMessage;switch (errorMessage) {case 'invalid_email_address':
      translatedErrorMessage = 'You have specified an invalid email address.';
      break;case 'business_identifier_exists':
      translatedErrorMessage = 'This Vanity URL (sub domain) is already taken.';
      break;case 'invalid_password':
      translatedErrorMessage = 'Sorry, we could not find an account with that email/password combination.';
      break;case 'invalid_password_invoiceable':
      translatedErrorMessage = 'Invalid Password. We have just sent you an e-mail with your new invoiceable import password. Please check your e-mail inbox and try again with the new password.';
      break;case 'missing_email':
      translatedErrorMessage = 'Please enter a valid email address.';
      break;case 'invoiceable_user_not_found':
      translatedErrorMessage = 'Sorry, we could not find an Invoiceable account with that email/password combination.';
      break;case 'missing_statement_send_subject':
      translatedErrorMessage = 'Please enter custom email subject.';
      break;case 'missing_statement_send_content':
      translatedErrorMessage = 'Please enter custom email message.';
      break;case 'missing_card_object':
      translatedErrorMessage = 'Please enter your credit card details.';
      break;case 'action_not_permitted':
      translatedErrorMessage = 'You do not have the required permissions to do this.';
      break;case 'invalid_value_for_custom_domain':
      translatedErrorMessage = 'Please enter a valid custom domain. Our systems failed detecting your CNAME records.';
      break;case 'invalid_connection_id':
    case 'missing_connection_id':
      translatedErrorMessage = 'Please specify a connection (client/vendor).';
      break;case 'invalid_address_1':
      translatedErrorMessage = 'Please enter a valid address.';
      break;case 'duplicate_statement_id':
      translatedErrorMessage = 'A statement with this number already exists. Please enter a different statement number.';
      break;case 'import_already_performed':
      translatedErrorMessage = 'It seems like your data has already been imported. In case you are looking to import your data once more, please make sure to clear out all invoices from your invoicely account and retry your import.';
      break;case 'invalid_statement_recurring_start_date':
      translatedErrorMessage = 'The Start Date you entered for your recurring profile is invalid.';
      break;case 'invalid_recurring_frequency_number':
      translatedErrorMessage = 'The Frequency you entered for your recurring profile is invalid.';
      break;case 'invalid_statement_recurring_due_after':
      translatedErrorMessage = 'The Due Date (or days) you entered for your recurring profile is invalid.';
      break;case 'invalid_recurring_profile_name':
      translatedErrorMessage = 'The Profile Name you entered for your recurring profile is invalid.';
      break;case 'invalid_statement_date':
      translatedErrorMessage = 'The Date you entered is invalid.';
      break;case 'invalid_statement_status':
      translatedErrorMessage = 'An error with the reference "invalid_statement_status" occurred. Please try again or contact support for assistance.';
      break;case 'no_recipients':
      translatedErrorMessage = 'Please enter at least one valid recipient.';
      break;case 'invalid_payment_date':
      translatedErrorMessage = 'Please enter a valid payment date.';
      break;default:
      translatedErrorMessage = errorMessage;
      break;}return translatedErrorMessage;}/* SUBMIT FORM */
$('body').on('submit', '[data-submit-form]', function(event) {
  "use strict";
  event.preventDefault();var URL;
  var serializeForm;
  var customPostData;var showCustomFields;var successMessage = ['show', 'success', $(this).attr('data-success-message')];var DoRefreshDataTable;
  var DoClosePopup;var doSaveCategory;
  var saveCategoryChecked;
  var saveCategoryType;
  var saveCategoryName;
  var saveCategoryRate;var includeTags;
  var includeFiles;var insertConnection;
  var insertConnectionData;var doReloadPage = $(this).attr('data-reload-page');
  var doReloadPageOnError = $(this).attr('data-reload-on-error');var redirect = $(this).attr('data-redirect');
  var redirectPath = $(this).attr('data-redirect-path');
  var redirectFile = $(this).attr('data-redirect-file');
  var redirectPage = $(this).attr('data-redirect-page');
  var redirectType = $(this).attr('data-redirect-type');
  var redirectID = $(this).attr('data-redirect-id');var hardRedirectURL;var dataHandlerAction = $(this).attr('data-handler-action');
  var dataHandlerEndpoint = $(this).attr('data-handler-endpoint');
  var dataObjectID = $(this).attr('data-object-id');
  var dataHandlerAdditionalParameters = $(this).attr('data-handler-additional-parameters');var that = $(this);/* check if popup */
  var isPopup = false;if ($(this).closest('form').hasClass('x_form')) {
    isPopup = true;
  }
  /* check if popup */var dataSubmitForm = $(this).attr('data-submit-form');
  var dataSubmitFormRedirect = $(this).attr('data-submit-form-redirect');var saveDatatableState;switch (dataSubmitForm) {case 'new_connection':
    case 'edit_connection':
    case 'business_profile':
      URL = '/php/advanced_ajax_handler.php?type=' + dataHandlerEndpoint + '&id=' + dataObjectID;
      serializeForm = true;
      showCustomFields = true;
      break;case 'new_team_member':
    case 'edit_team_member':
      URL = '/php/advanced_ajax_handler.php?type=' + dataHandlerEndpoint + '&id=' + dataObjectID;
      serializeForm = true;
      showCustomFields = true;
      redirect = true;
      redirectPath = '/team';
      redirectFile = 'team';
      redirectPage = 'team';
      break;case 'new_connection_contact':
    case 'edit_connection_contact':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      serializeForm = true;
      DoRefreshDataTable = true;
      DoClosePopup = true;
      break;case 'new_statement_payment':
    case 'edit_statement_payment':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      DoRefreshDataTable = true;
      DoClosePopup = true;
      customPostData = {
        statement_hash: $(this).find('[name="create_edit_statement_payment[statement_hash]"]').val(),
        payment_status: 'completed',
        payment_date: $(this).find('[name="create_edit_statement_payment[date]"]').attr('data-real-date'),
        payment_type: $(this).find('[name="create_edit_statement_payment[type]"]').val(),
        payment_amount: $(this).find('[name="create_edit_statement_payment[amount]"]').val(),
        payment_details: $(this).find('[name="create_edit_statement_payment[details]"]').val(),
        object_links: {
          files: [],
          tags: [],
        }
      };
      includeTags = true;
      includeFiles = true;
      break;case 'new_track_time':
    case 'new_track_expense':
    case 'new_track_mileage':
    case 'edit_track_time':
    case 'edit_track_expense':
    case 'edit_track_mileage':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      //DoRefreshDataTable = true;
      DoClosePopup = true;
      customPostData = {
        connection_id: $(this).find('[name="client_id"]').val(),
        tracker_type: $(this).find('[name="new_track_entry[type]"]').val(),
        category_name: $(this).find('[name="new_track_entry[name]"]').val(),
        category_rate: $(this).find('[name="new_track_entry[rate]"]').val(),
        category_save: $(this).find('[name="new_track_entry[save]"]').is(':checked') ? 1 : 0,
        tracker_date: $(this).find('[name="new_track_entry[date]"]').attr('data-real-date'),
        tracker_description: $(this).find('[name="new_track_entry[description]"]').val(),
        tracker_amount: $(this).find('[name="new_track_entry[quantity]"]').attr('data-total-minutes') ? $(this).find('[name="new_track_entry[quantity]"]').attr('data-total-minutes') : $(this).find('[name="new_track_entry[quantity]"]').val(),
        object_links: {
          files: [],
          tags: [],
        }
      };
      includeTags = true;
      includeFiles = true;
      doSaveCategory = true;
      saveCategoryChecked = $(this).find('[name="new_track_entry[save]"]:checked').is(':visible') ? true : false;
      saveCategoryType = $(this).find('[name="new_track_entry[type]"]').val();
      saveCategoryName = $(this).find('[name="new_track_entry[name]"]').val();
      saveCategoryRate = $(this).find('[name="new_track_entry[rate]"]').val();
      /* if edit, reload from datatable state */
      if (dataHandlerAction === 'edit') {
        saveDatatableState = true;
      }
      doReloadPage = true;
      break;case 'new_client':
    case 'new_vendor':
      //case 'edit_client':
      //case 'edit_vendor':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      DoClosePopup = true;
      customPostData = {
        connection_type: $(this).find('[name="connection_type"]:checked').val(),
        first_name: $(this).find('[name="connection[first_name]"]:enabled').val(),
        last_name: $(this).find('[name="connection[last_name]"]:enabled').val(),
        company_name: $(this).find('[name="connection[organization_name]"]').val(),
        default_currency: $(this).find('[name="connection[currency]"]').val().toUpperCase(),
        default_language: $(this).find('[name="connection[language]"]').val(),
        email_address: $(this).find('[name="connection[email_address]"]').val(),
        address_1: $(this).find('[name="connection[street_1]"]').val(),
        address_2: $(this).find('[name="connection[street_2]"]').val(),
        city: $(this).find('[name="connection[city]"]').val(),
        state: $(this).find('[name="connection[state]"]').val(),
        zip_code: $(this).find('[name="connection[postal_code]"]').val(),
        country_code: $(this).find('[name="connection[country]"]').val(),
        phone_number: $(this).find('[name="connection[phone]"]').val(),
        fax_number: $(this).find('[name="connection[fax]"]').val(),
        tax_id: $(this).find('[name="connection[tax_id]"]').val(),
        notes: $(this).find('[name="notes"]').val(),
        website_url: $(this).find('[name="connection[website_url]"]').val(),
        custom_fields: {},
      };
      showCustomFields = true;
      insertConnection = true;
      break;case 'new_saved_item':
    case 'new_saved_task':
    case 'new_saved_expense':
    case 'new_saved_trip':
    case 'new_saved_tag':
    case 'edit_saved_item':
    case 'edit_saved_task':
    case 'edit_saved_expense':
    case 'edit_saved_trip':
    case 'edit_saved_tag':  URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      DoRefreshDataTable = true;
      DoClosePopup = true;  if ($(this).attr('data-category-type') === 'item') {
        customPostData = {
          name: $(this).find('[name="create_edit_category[name]"]').val(),
          description: $(this).find('[name="create_edit_category[description]"]').val(),
          price: $(this).find('[name="create_edit_category[rate]"]').val() == 0 ? '' : $(this).find('[name="create_edit_category[rate]"]').val(),
          unit: $(this).find('[name="create_edit_category[custom_unit]"]').val() ? $(this).find('[name="create_edit_category[custom_unit]"]').val() : $(this).find('[name="create_edit_category[unit]"]').val(),
        };
      } else {
        customPostData = {
          name: $(this).find('[name="create_edit_category[name]"]').val(),
          description: $(this).find('[name="create_edit_category[description]"]').val(),
          rate: $(this).find('[name="create_edit_category[rate]"]').val() == 0 ? '' : $(this).find('[name="create_edit_category[rate]"]').val(),
          unit: $(this).find('[name="create_edit_category[custom_unit]"]').val() ? $(this).find('[name="create_edit_category[custom_unit]"]').val() : $(this).find('[name="create_edit_category[unit]"]').val(),
        };
      }
  break;case 'new_statement_comment':
    case 'edit_statement_comment':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      serializeForm = true;
      DoRefreshDataTable = true;
      DoClosePopup = true;
      break;case 'payment_integrations':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      serializeForm = true;
      break;case 'graphics':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      serializeForm = true;
      break;case 'business_settings':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction + '&object_id=' + dataObjectID;
      serializeForm = true;  /* do redirect to new vanity URL only if vanity URL was changed */
      if ($(this).find('[name="business_identifier"]').val() !== $(this).find('[name="business_identifier"]').attr('data-current')) {
        hardRedirectURL = 'https://' + $(this).find('[name="business_identifier"]').val() + '.invoicely.com/settings';
      }  break;case 'new_payment_method':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      serializeForm = true;
      DoClosePopup = true;
      doReloadPage = true;
      break;case 'switch_payment_method':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      customPostData = {
        profile_id: $(this).find('[name="payment_methods"]:checked').val()
      };
      break;case 'checkout_existing_payment_method':
      /* do not do dataReloadPage if PayPal is submitted */
      if ($(this).find('[name="payment_methods"]:checked').attr('data-payment-type') === 'paypal') {
        doReloadPage = false;
      }
      /* do not do dataReloadPage if PayPal is submitted */  URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      customPostData = {
        invoice_id: $(this).find('[name="invoice_id"]').val(),
        profile_id: $(this).find('[name="payment_methods"]:checked').val()
      };
      break;case 'checkout_new_payment_method':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      serializeForm = true;
      break;case 'account_details':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      serializeForm = true;
      break;case 'send_statement':
      URL = '/php/advanced_ajax_handler.php?&type=' + dataHandlerEndpoint;
      serializeForm = true;
      break;case 'invoiceable_import':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      serializeForm = true;
      break;case 'popup_contact_form':
      URL = '/php/public_ajax_handler.php?type=' + dataHandlerEndpoint;
      customPostData = {
        name: $(this).find('[name="first_name"]').val() + ' ' + $(this).find('[name="last_name"]').val(),
        email_address: $(this).find('[name="email_address"]').val(),
        subject: $(this).find('[name="subject"]').val(),
        message: $(this).find('[name="message"]').val()
      };
      DoClosePopup = true;
      break;case 'general_preferences':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      customPostData = {
        default_language: $(this).find('[name="default_language"]').val(),
        default_currency: $(this).find('[name="default_currency"]').val().toUpperCase(),
        number_format: $(this).find('[name="number_format"]').val(),
        decimal_places: $(this).find('[name="decimal_places"]').val(),
        date_format: $(this).find('[name="date_format"]').val(),
        time_format: $(this).find('[name="time_format"]').val(),
        currency_format: $(this).find('[name="currency_format"]').val(),
        currency_position: $(this).find('[name="currency_position"]').val(),
        mileage_unit: $(this).find('[name="mileage_unit"]').val(),
        fiscal_year_start: $(this).find('[name="fiscal_year_start"]').val(),
        paper_size: $(this).find('[name="paper_size"]').val(),
        receipt_number_prefix: $(this).find('[name="receipt_number_prefix"]').val(),
        statement_list_default_tab_invoices: $(this).find('[name="statement_list_default_tab_invoices"]').val(),
        statement_list_default_tab_bills: $(this).find('[name="statement_list_default_tab_bills"]').val(),
        statement_list_default_tab_estimates: $(this).find('[name="statement_list_default_tab_estimates"]').val(),
        custom_domain: $(this).find('[name="custom_domain"]').val(),
        show_branding: $(this).find('[name="show_branding"]').prop('checked') === true ? 1 : 0,
      };
      break;case 'statement_preferences':
      URL = '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=' + dataHandlerAction;
      customPostData = {
        default_invoice_due: $(this).find('[name="default_invoice_due"]').val(),
        invoice_always_attach_pdf: $(this).find('[name="invoice_always_attach_pdf"]').prop('checked') === true ? 1 : 0,
        invoice_always_send_payment_reminders: $(this).find('[name="invoice_always_send_payment_reminders"]').prop('checked') === true ? 1 : 0,
        invoice_always_bcc: $(this).find('[name="invoice_always_bcc"]').prop('checked') === true ? 1 : 0,
        invoice_always_send_alerts: $(this).find('[name="invoice_always_send_alerts"]').prop('checked') === true ? 1 : 0,
        invoice_always_send_payment_receipts: $(this).find('[name="invoice_always_send_payment_receipts"]').prop('checked') === true ? 1 : 0,
        invoice_always_allow_partial_payments: $(this).find('[name="invoice_always_allow_partial_payments"]').prop('checked') === true ? 1 : 0,
        default_estimate_valid: $(this).find('[name="default_estimate_valid"]').val(),
        estimate_always_attach_pdf: $(this).find('[name="estimate_always_attach_pdf"]').prop('checked') === true ? 1 : 0,
        estimate_always_send_expiration_reminders: $(this).find('[name="estimate_always_send_expiration_reminders"]').prop('checked') === true ? 1 : 0,
        estimate_always_bcc: $(this).find('[name="estimate_always_bcc"]').prop('checked') === true ? 1 : 0,
        estimate_always_send_alerts: $(this).find('[name="estimate_always_send_alerts"]').prop('checked') === true ? 1 : 0,
        default_bill_due: $(this).find('[name="default_bill_due"]').val(),
        enable_public_account_statement: $(this).find('[name="enable_public_account_statement"]').prop('checked') === true ? 1 : 0,
        statement_show_country: $(this).find('[name="statement_show_country"]').prop('checked') === true ? 1 : 0,
      };
      break;}/* remove or hide all general/popup info messages */
  if (isPopup === true) {
    popupInfo('hide', null, null);
  } else {
    generalInfo('hide', null, null);
  }/* form validation */
  if (!validateFormFields($(this))) {
    return false;
  }/* if no error, show loading animation */
  $('[data-form-id="' + $(this).attr('id') + '"]').addClass('loading');
  $('[form="' + $(this).attr('id') + '"]').addClass('loading');var postData;
if (serializeForm === true) {
    postData = $(this).serializeFormJSON();
    //console.log(postData);
  } else {postData = customPostData;/* TAGS */
    if (includeTags === true) {  $(this).find('[data-tag-info="name"]').each(function() {
        postData.object_links.tags.push($(this).val());
      });}
    /* TAGS *//* FILES */
    if (includeFiles === true) {  $(this).find('[data-file-id]').each(function() {
        if (!$(this).attr('data-file-id')) {
          // jQuery's equivalent for "continue"
          return true;
        }
        postData.object_links.files.push($(this).attr('data-file-id'));
      });}
    /* FILES */}if (showCustomFields === true) {
    /* adjust array for custom fields submission */
    postData.custom_fields = {};$(this).find('.custom_field_container').each(function() {  var fieldName = $(this).find('.double_input.first').val();
      var fieldValue = $(this).find('.double_input.second').val();  if (fieldName) {
        postData.custom_fields[fieldName] = fieldValue;
      }});
    /* adjust array for custom fields submission */
  }var postDataJSON = JSON.stringify(postData);
  //console.log(postDataJSON);if (saveDatatableState === true) {
    $('[name="load_from_datatables_state"]').val('true');
  }
$.ajax({
    type: "POST",
    url: URL,
    data: ({
      postArray: postDataJSON,
      additional_parameters: dataHandlerAdditionalParameters
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  /* remove loading */
      $('[data-form-id="' + $(that).attr('id') + '"]').removeClass('loading');
      $('[form="' + $(that).attr('id') + '"]').removeClass('loading');  if (data.success == 1) {/* for invoiceable import */
        if (dataSubmitForm === 'invoiceable_import') {
          $('#container .announcement p a').html('Import Finished');
          $('#container .announcement p a').attr('data-finished', 'true');
          $('#container .announcement p a').css('background', '#3da07b');
          $('button#start_import').html('Import Finished');
          $('form#invoiceable_import').css('opacity', 0.5);
          $('form#invoiceable_import input').attr('disabled', true);
          $('form#invoiceable_import').css('cursor', 'default');
          $('form#invoiceable_import').css('pointer-events', 'none');
          $('form#invoiceable_import input').val('');
          $('button#start_import').css('background', '#3da07b');
          $('.announcement_content').slideUp(100);
          return false;
        }
        /* for invoiceable import *//* if user switches payment method to paypal, hard redirect to paypal url */
        if ((dataSubmitForm === 'switch_payment_method' || dataSubmitForm === 'checkout_existing_payment_method') && data.message.redirect_url) {
          hardRedirectURL = data.message.redirect_url;
        }/* now for create client only, may have to be adjusted for future redirects... */
        if (dataSubmitForm === 'new_connection') {
          if (data.message.connection_id) {
            redirectID = data.message.connection_id;
            redirectPath = redirectPath + redirectID;
          }
          refreshStatementConnectionContacts(data.message.connection_id);
        }
        /* now for create client only, may have to be adjusted for future redirects... */if (DoClosePopup === true) {
          closePopup();
        }/* hard redirect */
        if (hardRedirectURL) {
          window.location.href = hardRedirectURL;
          return false;
        }/* refresh current page */
        if (doReloadPage) {
          reloadPage(successMessage);
          return false;
        }/* normal redirect */
        if (redirect) {  // if the page path IS NOT the current 
          if (redirectPath !== window.location.pathname) {
            goToPage(redirectPath, redirectFile, redirectPage, redirectType, redirectID, false, successMessage, null);
          } else {
            // if the page type IS the current
            if (successMessage) {
              generalInfo(successMessage[0], successMessage[1], successMessage[2]);
            }    if (DoRefreshDataTable === true) {
              refreshDataTable(false, null);
            }
          }}/* insert connection into statement */
        if (insertConnection === true) {  var connectionName = postData.connection_type === '1' ? postData.company_name : (postData.first_name + ' ' + postData.last_name);  var appendContent = '<div class="autocomplete_card"><a class="close_icon"></a><p>' + connectionName + '</p>';  if (postData.address_1) {
            appendContent += postData.address_1;
          }  if (postData.address_2) {
            appendContent += '<br/>' + postData.address_2;
          }  if (postData.city || postData.zip_code || postData.state) {
            appendContent += '<br/>';
          }  if (postData.city) {
            appendContent += ' ' + postData.city;
          }  if (postData.zip_code) {
            appendContent += ' ' + postData.zip_code;
          }  if (postData.state) {
            appendContent += ' ' + postData.state;
          }  if (postData.country) {
            appendContent += '<br/>' + postData.country;
          }  appendContent += '</div>';  $('[data-autocomplete="connection"]').hide();
          $('[data-autocomplete="connection"]').closest('[data-identifier="autocomplete_wrapper"]').find('input[name="client_id"]').val(data.message.connection_id);
          $('[data-autocomplete="connection"]').closest('[data-identifier="autocomplete_wrapper"]').find('.autocomplete_card').remove();
          $('[data-autocomplete="connection"]').parent().append(appendContent);}if (successMessage && !redirect) {
          // if no redirect && an alert message
          generalInfo(successMessage[0], successMessage[1], successMessage[2]);
        }if (DoRefreshDataTable === true && !redirect) {
          refreshDataTable(false, null);
        }// save category
        if (doSaveCategory === true && saveCategoryChecked === true) {
          saveCategory(saveCategoryType, saveCategoryName, saveCategoryRate);
        }// preview uploaded icons and images
        if (dataSubmitForm === 'graphics') {
          $('.select_business img').attr('src', that.find('[name="custom_icon"]').val());
          $('.sidebar_menu .logo').css('background', 'url("' + that.find('[name="custom_logo"]').val() + '") center center no-repeat');
          $('.sidebar_menu .logo').css('background-size', 'contain');
        }// update business name
        if (dataSubmitForm === 'business_settings') {
          $('[data-identifier="business_name"]').html(that.find('[name="business_name"]').val());
        }  } else {if (doReloadPageOnError) {
          reloadPage(['show', 'error', translateError(data.message)]);
          return false;
        }if (isPopup === true) {
          popupInfo('show', 'error', translateError(data.message));
        } else {
          generalInfo('show', 'error', translateError(data.message));
        }
      }}});});/* SUBMIT EDIT TAX DISCOUNT SHIPPING PAGE */
$('body').on('submit', '[name="create_edit_tds"]', function(event) {
  "use strict";/* TODO: use ajax and move to submitForm() *//* TODO: error & validation handling */var count = 0;$(this).find('.custom_field_container').each(function() {var currentCount = count++;$(this).attr('data-count', currentCount);var fieldName = $(this).find('[name="tds_name"]').val();
    var fieldValue = $(this).find('[name="tds_rate"]').val();var setDefault = $(this).find('[name="tds_is_default"]').prop('checked') === true ? 1 : 0;$(this).find('[name="tds_name"]').attr('name', 'tds[' + currentCount + '][name]');
    $(this).find('[name="tds_name"]').val(fieldName);$(this).find('[name="tds_rate"]').attr('name', 'tds[' + currentCount + '][value]');
    $(this).find('[name="tds_rate"]').val(fieldValue);$(this).find('[name="tds_is_default"]').attr('name', 'tds[' + currentCount + '][tds_is_default]');
    $(this).find('[name="tds_is_default"]').val(setDefault);});});/* ACCOUNT STATEMENT PERIOD CHANGE */
$('body').on('submit', '[name="account_statement_period"]', function(event) {
  "use strict";
  event.preventDefault();var originalPath = '/connections/' + currentID + '/account_statement';var period = $(this).find('[name="account_satement_period"]').val();var customPeriodFrom = $(this).find('[name="account_satement_period[from]"]').attr('data-real-date');
  var customPeriodTo = $(this).find('[name="account_satement_period[to]"]').attr('data-real-date');var redirectParams;if (!validateFormFields($(this))) {
    return false;
  }var redirectPath;if (period === 'custom') {
    redirectParams = '&period=custom&start_date=' + customPeriodFrom + '&end_date=' + customPeriodTo;
    redirectPath = '/' + customPeriodFrom + '/' + customPeriodTo;
  } else {
    redirectParams = '&period=' + period;
    redirectPath = '/' + period;
  }goToPage(originalPath + redirectPath, currentFile, currentPage, currentType, currentID, true, null, redirectParams);});/* HIDE DYNAMIC PARENT */
function hideDynamicParent(container, parentIdentifier) {
  "use strict";container.closest(parentIdentifier).remove();}/* Add Custom Fields Dynamically */
$(document).ready(function() {
  "use strict";
  var x = 1;
  $("body").on("click", '.add_dynamic_fields', function(e) {
    e.preventDefault();var type = $(this).attr('data-type');x++;if (type === 'custom_fields') {  $(".form_row.custom_fields").append('<div class="mt15 custom_field_container"> <input class="double_input first" placeholder="Custom Field Name" type="text" name="custom_field_key"/> <input class="double_input second" placeholder="Custom Field Value" type="text" name="custom_field_value" /> <a href="javascript:void();" onClick="hideDynamicParent($(this), \'div\');" class="remove_custom_field_button">Remove Field</a> </div>');} else if (type === 'taxes_fields') {  $(".form_row.custom_fields").append('<div class="mt15 custom_field_container tds"><input class="double_input first" placeholder="Tax Name" type="text" name="tds_name" /> <input class="double_input second" placeholder="Tax Rate" type="text" name="tds_rate" data-input-restriction="percentage" /> <div class="set_default"> <input type="checkbox" name="tds_set_default" id="tds_set_default_' + x + '"> <label for="tds_set_default_' + x + '">Set Default?</label> </div> <a href="javascript:void(0)" onClick="hideDynamicParent($(this), \'div\');" class="remove_custom_field_button">Remove</a> </div>');} else if (type === 'discounts_fields') {  $(".form_row.custom_fields").append('<div class="mt15 custom_field_container tds"> <input class="double_input first" placeholder="Discount Name" type="text" name="tds_name"/> <input class="double_input second" placeholder="Discount Rate" type="text" name="tds_rate" data-input-restriction="percentage" /> <div class="set_default"> <input type="checkbox" name="tds_set_default" id="tds_set_default_' + x + '"> <label for="tds_set_default_' + x + '">Set Default?</label> </div> <a href="javascript:void(0)" onClick="hideDynamicParent($(this), \'div\');" class="remove_custom_field_button">Remove</a> </div>');} else if (type === 'shipping_fields') {  $(".form_row.custom_fields").append('<div class="mt15 custom_field_container tds"> <input class="double_input first" placeholder="Shipping Name" type="text" name="tds_name"/> <input class="double_input second" placeholder="Shipping Rate" type="text" name="tds_rate" data-input-restriction="number" /> <div class="set_default"> <input type="checkbox" name="tds_set_default" id="tds_set_default_' + x + '"> <label for="tds_set_default_' + x + '">Set Default?</label> </div> <a href="javascript:void(0)" onClick="hideDynamicParent($(this), \'div\');" class="remove_custom_field_button">Remove</a> </div>');}});
});/* DRAG ITEM LINES */
function fireSortablePlugin() {var el = document.getElementById('drag_item_list');var sortable = new Sortable(el, {
    group: "name",
    store: null,
    animation: 150,
    handle: ".drag_item",
    //dataIdAttr: 'data-id',
    ghostClass: 'ghost_drag_item',
    //chosenClass: 'chosen_drag_item',onEnd: function() {
      "use strict";
      // put order array into hidden form input - disabled for now
      //$('input[name="statement[item_order]"]').val(sortable.toArray());
    },});}/* ITEM LINES - ADD ITEM, EXPENSE, MILEAGE or TIME */
$(document).ready(function() {
  "use strict";$('body').on('click', '[data-action="add_line"]', function(e) {
    e.preventDefault();lineItemCount++;/* probably no longer necessary */
    if (lineItemCount == 1) {
      lineItemCount = 2;
    }
    /* probably no longer necessary */var lineType = $(this).attr('data-action-type');
    var appendContent;var lineTypeName;var includeQuantity;
    var quantityInputPlaceholder;
    var quantityInputRestriction;var includeRate;
    var rateInputPlaceholder;
    var includeUnit;var amountEditable;switch (lineType) {  case 'item':
        lineTypeName = 'item';
        includeQuantity = true;
        quantityInputPlaceholder = 'Quantity';
        quantityInputRestriction = 'number';
        includeRate = true;
        rateInputPlaceholder = 'Unit Price';
        includeUnit = true;
        break;  case 'expense':
        lineTypeName = 'expense';
        amountEditable = true;
        break;  case 'mileage':
        lineTypeName = 'trip';
        includeQuantity = true;
        quantityInputPlaceholder = 'Miles';
        quantityInputRestriction = 'number';
        includeRate = true;
        rateInputPlaceholder = 'Rate';
        break;
  case 'time':
        lineTypeName = 'task';
        includeQuantity = true;
        quantityInputPlaceholder = '00:00';
        quantityInputRestriction = 'time';
        includeRate = true;
        rateInputPlaceholder = 'Rate';
        break;}/* onClick="createDateTags($(this));" */appendContent = '<li class="one_item_line actual" data-parent-identifier="one_item_line" data-id="' + lineItemCount + '" data-type="' + lineType + '"> <div class="hidden_item_inputs hidden"> <input type="hidden" name="line_type_' + lineItemCount + '" value="' + lineType + '" /> </div><div class="drag_item"></div><ul class="item_row"> <li class="item_column name_description"> <div class="inner"> <div id="item_textarea_' + lineItemCount + '" class="item_textarea_container"> <textarea data-autocomplete="' + lineType + '" class="item_textarea" name="statement[item_name_description]" placeholder="' + ucFirst(lineTypeName) + ' Name &amp; Description"></textarea> <span class="input_loader"></span> <div class="files_area file_upload_' + lineItemCount + '" data-fileupload-id="' + lineItemCount + '"> <div class="tag date" id="date_tag_' + lineItemCount + '" data-tag-type="date"> <a class="close_item" href="javascript:void(0)"></a> <div class="inside"> <span class="filename"></span> </div></div></div></div><div class="textarea_actions left"> <input type="file" name="file_upload_' + lineItemCount + '" id="file_upload_' + lineItemCount + '" data-fileupload-id="' + lineItemCount + '" class="fileupload hidden"/> <label  for="datepicker_item_' + lineItemCount + '" class="attach_button date extra tipr" data-tip="Date" style="z-index: 1000;"></label> <input class="datepicker visibility_hidden_absolute" id="datepicker_item_' + lineItemCount + '" name="date_' + lineItemCount + '" type="text" value=""/> <div class="restrainer"> <a href="javascript:void(0)" class="attach_button extra dropdown-toggle links tipr" data-tip="Link"></a> <ul class="dropdown-menu popover links"> <li> <div class="form_heading"><label for="link_ttd_' + lineItemCount + '">Text To Display</label></div><input type="text" class="link_ttd" name="link_ttd_' + lineItemCount + '" id="link_ttd_' + lineItemCount + '" placeholder="This is a Link"/> </li><li> <div class="form_heading"><label for="link_url_' + lineItemCount + '">Link URL</label></div><input type="text" class="link_url" name="link_url_' + lineItemCount + '" id="link_url_' + lineItemCount + '" value="http://" placeholder="http://example.com"/> <div class="form_row" style="margin-top: 14px;"> <label class="save_button add_link ccfg_button_secondary" data-dropdown="submit">Add Link</label> </div></li></ul> </div> <div class="restrainer"> <a href="javascript:void(0)" class="attach_button extra dropdown-toggle popo tags tipr" data-tip="Tag"></a> <ul class="dropdown-menu popover tags"> <li> <select data-handler-autocomplete="tags" data-create-tag="tag"> </select> <div class="select_arrows"></div></li><li class="gray border"> <a href="javascript:void(0)" class="new_item switch">New Tag</a> <section class="new_tag_item_form hidden"> <input type="text" class="new_tag_item_input" name="new_tag_' + lineItemCount + '" id="new_tag_' + lineItemCount + '" placeholder="Tag Name"/> <div class="form_row"> <input class="remember_tag inline" name="remember_tag_' + lineItemCount + '" id="remember_tag_' + lineItemCount + '" type="checkbox" value="1"> <label for="remember_tag_' + lineItemCount + '" style="margin-left: 3px;">Remember</label> </div><div class="form_row" style="margin-top: 14px;"> <label class="save_button ccfg_button_secondary" data-create-tag="tag" data-dropdown="submit">Add</label> <a href="javascript:void(0)" class="use_existing_tag_item switch">Use Existing</a> </div></section> </li></ul> </div> </div><div class="textarea_actions right"> <div class="restrainer"> <a href="javascript:void(0)" class="attach_button tipr dropdown-toggle popo tax" data-tip="Tax"></a> <ul class="dropdown-menu popover tax"> <li> <select data-handler-autocomplete="taxes" data-create-tag="tax"> </select> <div class="select_arrows"></div></li><li class="gray border"> <a href="javascript:void(0)" class="new_item switch">New Tax</a> <section class="new_tag_item_form hidden"> <input type="text" class="new_tag_item_input" name="new_item_tax_' + lineItemCount + '" id="new_item_tax_' + lineItemCount + '" placeholder="Tax Name"/> <input type="text" class="new_tag_item_rate_input" name="new_item_tax_rate_' + lineItemCount + '" id="new_item_tax_rate_' + lineItemCount + '" data-input-restriction="percentage" placeholder="Rate"/> <div class="form_row"> <input class="remember_tag inline" name="remember_item_tax_' + lineItemCount + '" id="remember_item_tax_' + lineItemCount + '" type="checkbox" value="1"> <label for="remember_item_tax_' + lineItemCount + '" style="margin-left: 3px;">Remember</label> </div><div class="form_row" style="margin-top: 14px;"> <label class="save_button ccfg_button_secondary" data-create-tag="tax" data-dropdown="submit">Add</label> <a href="javascript:void(0)" class="use_existing_tag_item switch">Use Existing</a> </div></section> </li></ul> </div> <div class="restrainer"> <a href="javascript:void(0)" class="attach_button tipr dropdown-toggle popo discount" data-tip="Discount"></a> <ul class="dropdown-menu popover discount"> <li> <select data-handler-autocomplete="discounts" data-create-tag="discount"> </select> <div class="select_arrows"></div></li><li class="gray border"> <a href="javascript:void(0)" class="new_item switch">New Discount</a> <section class="new_tag_item_form hidden"> <input type="text" class="new_tag_item_input" name="new_item_discount_' + lineItemCount + '" id="new_item_discount_' + lineItemCount + '" placeholder="Discount Name"/> <input type="text" class="new_tag_item_rate_input" name="new_item_discount_rate_' + lineItemCount + '" id="new_item_discount_rate_' + lineItemCount + '" data-input-restriction="percentage" placeholder="Rate"/> <div class="form_row"> <input class="remember_tag inline" name="remember_item_discount_' + lineItemCount + '" id="remember_item_discount_' + lineItemCount + '" type="checkbox" value="1"> <label for="remember_item_discount_' + lineItemCount + '" style="margin-left: 3px;">Remember</label> </div><div class="form_row" style="margin-top: 14px;"> <label class="save_button ccfg_button_secondary" data-create-tag="discount" data-dropdown="submit">Add</label> <a href="javascript:void(0)" class="use_existing_tag_item switch">Use Existing</a> </div></section> </li></ul> </div> <div class="restrainer"> <a href="javascript:void(0)" class="attach_button tipr dropdown-toggle popo shipping" data-tip="Shipping"></a> <ul class="dropdown-menu popover shipping"> <li> <select data-handler-autocomplete="shipping" data-create-tag="shipping"> </select> <div class="select_arrows"></div></li><li class="gray border"> <a href="javascript:void(0)" class="new_item switch">New Shipping</a> <section class="new_tag_item_form hidden"> <input type="text" class="new_tag_item_input" name="new_item_shipping_' + lineItemCount + '" id="new_item_shipping_' + lineItemCount + '" placeholder="Shipping Name"/> <input type="text" class="new_tag_item_rate_input" name="new_item_shipping_rate_' + lineItemCount + '" id="new_item_shipping_rate_' + lineItemCount + '" data-input-restriction="number" placeholder="Rate"/> <div class="form_row"> <input class="remember_tag inline" name="remember_item_shipping_' + lineItemCount + '" id="remember_item_shipping_' + lineItemCount + '" type="checkbox" value="1"> <label for="remember_item_shipping_' + lineItemCount + '" style="margin-left: 3px;">Remember</label> </div><div class="form_row" style="margin-top: 14px;"> <label class="save_button ccfg_button_secondary" data-create-tag="shipping" data-dropdown="submit">Add</label> <a href="javascript:void(0)" class="use_existing_tag_item switch">Use Existing</a> </div></section> </li></ul> </div> </div></div></li>';/* quantity */
    appendContent += '<li class="item_column quantity">';if (includeQuantity === true) {
      appendContent += '<div class="inner"> <div class="quantity_input"> <input data-validate="required" name="statement[item_quantity]" placeholder="' + quantityInputPlaceholder + '" type="text" data-input-restriction="' + quantityInputRestriction + '" data-trigger="calculation" data-calculation="quantity" value=""> </div></div>';
    }appendContent += '</li>';
    /* quantity *//* rate, unit */
    appendContent += '<li class="item_column unit">';if (includeRate === true) {  appendContent += '<div class="inner"> <div class="unit_input"> <input class="with_addon" name="statement[item_rate]" data-input-restriction="number" data-trigger="calculation" data-calculation="rate" data-autocomplete-fill="rate" placeholder="' + rateInputPlaceholder + '" type="text" value="0.00">';  if (includeUnit === true) {
        appendContent += '<div class="unit_lower"> <select class="with_addon" name="statement[item_unit]" data-action="on-select-custom" data-action-type="statement_item_unit" data-input-type="select"> <option value="" selected="selected">Unit</option> <option value="pc">pc</option> <option value="lb">lb.</option> <option value="ft">ft</option> <option value="hrs">hrs</option> <option value="d">d</option> <option value="m">m</option> <option value="y">y</option> <option value="custom">Custom</option> </select> <div class="select_arrows"></div> <input style="display:none;" data-action-target="on-select-custom" class="text_unit_input_css" name="statement[item_custom_unit]" placeholder="Unit" type="text"> </div>';
      }  appendContent += '</div></div>';}appendContent += '</li>';
    /* rate, unit *//* amount */
    appendContent += '<li class="item_column amount"> <div class="inner">';if (amountEditable === true) {
      appendContent += '<div class="total_input"> <a href="javascript:void(0)"><span class="input_addon total border" data-currency="code">USD</span></a> <input class="with_addon total border" name="statement[item_amount]" data-trigger="calculation" data-calculation="line_total" data-format-number="precision" placeholder="0.00" type="text" data-input-restriction="number" value="0.00"> </div>';
    } else {
      appendContent += '<div class="total_input"> <a href="javascript:void(0)"><span class="input_addon total" data-currency="code">USD</span></a> <input class="with_addon total" data-format-number="precision" disabled name="statement[item_amount]" data-trigger="calculation" data-calculation="line_total" placeholder="0.00" type="text" value="0.00"> </div>';
    }appendContent += '</div></li><li class="item_column action"> <div class="inner"> <div class="pull-right"> <div class="relative"> <a class="button dropdown-toggle"></a> <ul class="dropdown-menu"> <li><a data-action="remove_item_line" href="javascript:void(0)">Delete</a></li><li><a data-popup="open" data-popup-id="new_saved_' + lineTypeName + '" data-popup-detail="statement" href="javascript:void(0)">Save ' + ucFirst(lineTypeName) + '</a></li></ul> </div></div></div></li></ul> </li>';
    /* amount */$("#drag_item_list").append(appendContent);showHideTDS();fireUploadifivePlugin('file_upload_' + lineItemCount + '');fireAutocomplete('item');
    fireAutocomplete('expense');
    fireAutocomplete('mileage');
    fireAutocomplete('time');fireTiprPlugin();refreshStatementCurrency();
    refreshNumberFormatAndPrecision();makeCalculation();loadTagsPopover('tags');
    loadTagsPopover('taxes');
    loadTagsPopover('discounts');
    loadTagsPopover('shipping');fireDatePicker('datepicker_item_' + lineItemCount + '');
});
});/* REMOVE ITEM LINE */
$('body').on('click', '[data-action="remove_item_line"]', function() {
  "use strict";var itemLine = $(this).closest('.one_item_line');itemLine.find('.tag').each(function() {
    var tagID = $(this).attr('id');
    $('[data-tag-id="' + tagID + '"]').remove();
  });itemLine.remove();showHideTDS();
  makeCalculation();});/* ITEM LINES - ADD AND REMOVE TAX SHIPPING AND DISCOUNTS */
var xTDS = 1;$('body').on('click', '[data-add-total-tds]', function(e) {
  "use strict";
  e.preventDefault();xTDS++;var that = $(this);
  var tdsType = $(this).attr('data-add-total-tds');$(this).addClass('loading');
  $(this).find('.tipr_container_bottom').hide();var loadTagsKeyword;
  var rateInputRestriction;switch (tdsType) {case 'tax':
      loadTagsKeyword = 'taxes';
      rateInputRestriction = 'percentage';
      break;case 'discount':
      loadTagsKeyword = 'discounts';
      rateInputRestriction = 'percentage';
      break;case 'shipping':
      loadTagsKeyword = 'shipping';
      rateInputRestriction = 'number';
      break;}$.ajax({
    type: 'POST',
    url: '/php/autocomplete_handler.php?action_type=' + loadTagsKeyword,
    dataType: 'json',
    success: function(data) {  var selectOptions;
      var selectOptionsCount = 0;  $.each(data, function(number) {selectOptionsCount++;var name;
        var rate;
        var compiled;name = data[number].name;if ($.isNumeric(data[number].rate)) {
          rate = (data[number].rate).toFixed(2);
        } else {
          rate = data[number].rate;
        }if (rate) {
          compiled = name + ' (' + rate + ')';
        } else {
          compiled = name;
        }selectOptions += '<option data-name="' + name + '" data-rate="' + rate + '" value="' + compiled + '">' + compiled + '</option>';
      });  var selectDisplayNone;
      var inputDisplayNone;  /* if options available, show in select box, if not, show "Add New ..." input */
      if (selectOptionsCount > 1) {
        selectDisplayNone = '';
        inputDisplayNone = 'display: none;';
      } else {
        selectDisplayNone = 'display: none;';
        inputDisplayNone = '';
      }  $("#tax_discount_shipping_wrapper").append('<ul class="statement_amount_container tds total ' + tdsType + '" data-tds-type="' + tdsType + '"> <li class="statement_amount"> <a class="close_icon"></a> <div class="col second"> <div class="inner"> <select style="' + selectDisplayNone + '" data-trigger="calculation" data-calculation="select_total_' + tdsType + '" data-action="on-select-custom" data-action-type="statement_total_tds" data-input-type="select"> ' + selectOptions + ' <option value="custom">Add New ...</option> </select> <div class="select_arrows" style="' + selectDisplayNone + '"></div></div><div style="' + inputDisplayNone + '" data-action-target="on-select-custom"> <input class="inline tds_name" type="text" name="' + tdsType + '_name_' + xTDS + '" placeholder="' + ucFirst(tdsType) + ' Name" style="width: 50%;"> <input class="inline tds_rate" id="' + tdsType + '_rate_' + xTDS + '" data-trigger="calculation" data-calculation="total_' + tdsType + '_rate" name="' + tdsType + '_rate_' + xTDS + '" type="text" data-input-restriction="' + rateInputRestriction + '" placeholder="Rate" style="width: 17%;margin-left: -6px;text-align: center;min-width: 62px;"> <input class="inline" name="' + tdsType + '_remember_' + xTDS + '" id="' + tdsType + '_remember_' + xTDS + '" type="checkbox" style="width: 5%;margin-left: 10px;"> <label for="' + tdsType + '_remember_' + xTDS + '" style="display: inline-block;width: 20%;">Remember</label> </div></div> </div></div><input class="col third no_input" type="text" disabled data-calculation="total_' + tdsType + '_result" value="(0.00)"></li></ul>');  setAllTotalTDSValues();
      showHideTDS();
      makeCalculation();  $(that).removeClass('loading');}});});function setTotalTDSValue(singleElement) {
  "use strict";var TDSName;
  var TDSRate;if (singleElement.val() === 'custom') {/* empty inputs */
    singleElement.closest('.statement_amount_container.total').find('.tds_name').val('');
    singleElement.closest('.statement_amount_container.total').find('.tds_rate').val('');} else {TDSName = $(singleElement).find('option:selected').attr('data-name');
    TDSRate = $(singleElement).find('option:selected').attr('data-rate');singleElement.closest('.statement_amount_container.total').find('.tds_name').val(TDSName);
    singleElement.closest('.statement_amount_container.total').find('.tds_rate').val(TDSRate);}makeCalculation();}function setAllTotalTDSValues() {
  "use strict";
  $('select[data-trigger="calculation"]').each(function() {if (!$(this).closest('.statement_amount_container').find('.tds_name').val() && !$(this).closest('.statement_amount_container').find('.tds_rate').val()) {
      setTotalTDSValue($(this));
    }});
}$('body').on('change', 'select[data-trigger="calculation"]', function() {
  "use strict";
  setTotalTDSValue($(this));
});/* REMOVE TDS LINE */
$('body').on('click', '.statement_amount_container .close_icon', function() {
  "use strict";$(this).closest('.statement_amount_container').remove();showHideTDS();
  makeCalculation();});/* ADD STATEMENT - FILE UPLOAD AJAX */
function fileUpload(identification) {
  "use strict";var buttonClasses;
  var buttonText;
  var statementActions;var DoRefreshDataTable;
  var hideCloseItemOnComplete;
  var hideProgessOnComplete;
  var multipleFiles;
  var showSuccessMessage;
  var useTooltips;
  var loadingAnimationInButton;switch (currentPage) {case 'files':
      buttonClasses = 'main_button ccfg_button_primary';
      buttonText = 'Add File';
      DoRefreshDataTable = true;
      hideCloseItemOnComplete = true;
      showSuccessMessage = true;
      multipleFiles = true;
      break;case 'new_invoice':
    case 'new_recinvoice':
    case 'new_bill':
    case 'new_recbill':
    case 'new_estimate':
    case 'edit_invoice':
    case 'edit_recinvoice':
    case 'edit_recbill':
      buttonClasses = 'attach_button extra uploadify first';
      buttonText = '';
      hideProgessOnComplete = true;
      useTooltips = true;
      multipleFiles = true;
      break;case 'graphics':
      buttonClasses = 'button upload ccfg_button_secondary';
      buttonText = 'Upload';
      hideProgessOnComplete = true;
      loadingAnimationInButton = true;
      break;default:
      buttonClasses = 'attach_button extra uploadify first';
      buttonText = '';
      hideProgessOnComplete = true;
      useTooltips = true;
      multipleFiles = true;
      break;}$('#' + identification).uploadifive({
    'uploadScript': '/php/ajax_handler.php?action_type=create&endpoint=file&file_upload=1',
    'buttonClass': buttonClasses,
    'multi': multipleFiles === true ? true : false,
    'buttonText': buttonText,
    'fileSizeLimit': 10000,
    'fileType': ["image\/gif", "image\/jpeg", "image\/png", "text\/plain", "application\/pdf"],
    'onInit': function() {
      if (useTooltips === true) {
        fireTiprPlugin();
      }
    },
    'onAddQueueItem': function(file) {
      // id of the uploadifive item being uploaded
      // file.currentFileID exists here as well;
      if (loadingAnimationInButton === true) {
        $('label[for="' + $('#' + identification).attr('data-fileupload-id') + '"]').addClass('loading');
      }  if (currentPage === 'graphics') {
        $('#' + identification).closest('.upload_branding').find('.remove').hide();
      }},
    'onCancel': function() {
      if (loadingAnimationInButton === true) {
        $('label[for="' + $('#' + identification).attr('data-fileupload-id') + '"]').removeClass('loading');
      }
    },
    'onError': function(errorType) {
      console.log(errorType);
      if (loadingAnimationInButton === true) {
        $('label[for="' + $('#' + identification).attr('data-fileupload-id') + '"]').removeClass('loading');
      }
    },
    'onUploadComplete': function(file, data) {  if (loadingAnimationInButton === true) {
        $('label[for="' + $('#' + identification).attr('data-fileupload-id') + '"]').removeClass('loading');
      }  data = $.parseJSON(data);  var fileID = data.message.file_id;
      var fileURL = data.message.file_url;  //console.log(fileID);  if ($.isNumeric(fileID)) {if (DoRefreshDataTable === true) {  var callBack = function() {
            $('table').find('[data-item-id="' + fileID + '"]').closest('tr').find('section.name span strong').html('<span class="new">NEW</span> ' + $('table').find('[data-item-id="' + fileID + '"]').closest('tr').find('section.name span strong').html());
          };  refreshDataTable(true, callBack);}if (hideCloseItemOnComplete === true) {
          $('.close_item').remove();
        }if (showSuccessMessage === true) {
          generalInfo('show', 'success', 'Your file has been uploaded.');
        }if (hideProgessOnComplete === true) {
          $(".progress").slideUp(250);
        }if (currentPage === 'graphics') {
          $('#' + identification).closest('.upload_branding').find('.remove').show();
          $('#' + identification).closest('.upload_branding').find('img').attr('src', 'https://' + fileURL);
          $('#' + identification).closest('.upload_branding').find('input[type="hidden"]').val('https://' + fileURL);
        }// add fileID and download URLs to file tags
        //alert('add ID: '+ fileID +' to file ID: ' + currentFileID);
        $('#' + identification).closest('form').find('#' + file.currentFileID).attr('data-file-id', fileID);
        $('#' + identification).closest('form').find('#' + file.currentFileID + ' a.download_item').attr('href', 'https://' + fileURL);  }}// http://www.uploadify.com/documentation/
  });
}function fireUploadifivePlugin(singleID) {
  "use strict";
  if (singleID) {
    fileUpload(singleID);
  } else {
    $('.fileupload').each(function() {
      fileUpload($(this).attr('id'));
    });
  }
}/* ADD STATEMENT - CREATE TAGS FROM DATE - DELETE! */
function createDateTags(container) {
  "use strict";/*$("#" + container.attr('for')).on("change", function() {// get the last character of the date label's "for" attribute
		var lastChar = container.attr('for').substr(container.attr('for').length - 1);// show date tag + put selected date into tag
		$('#date_tag_' + lastChar).css('display','inline-block');
		$('#date_tag_' + lastChar).find($('.filename')).html($('#datepicker_item_' + lastChar).val());
	
    });*/}/* RESET NEW TAG FORM */
function resetNewTagItemForm(container, closeAsWell) {
  "use strict";if (closeAsWell === true) {
    // close menu
    $(container).closest('.dropdown-menu.popover').hide();
  }// empty input
  $(container).closest('.new_tag_item_form').find('.new_tag_item_input').val('');
  $(container).closest('.new_tag_item_form').find('.new_tag_item_rate_input').val('');
  $(container).closest('.new_tag_item_form').find('.new_tag_item_input').removeClass('error');
  $(container).closest('.new_tag_item_form').find('.new_tag_item_rate_input').removeClass('error');// untick "remember" field
  $(container).closest('.new_tag_item_form').find('.remember_tag').removeAttr('checked');// switch to "select existing" mode
  $(container).closest('.new_tag_item_form').toggleClass('hidden');
  $(container).closest('.dropdown-menu').find('select').removeAttr('disabled');
  $(container).closest('.new_tag_item_form').prev('.new_item.switch').show();// select default "choose tag" option
  $(container).closest('.dropdown-menu.popover').find('.default_option').prop('selected', true);
}/* RESET "EXISTING TAGS" SELECT OPTION MENU WHEN TAG MENU IS OPENED */
$('body').on("click", ".dropdown-toggle.popo", function() {
  "use strict";
  $(this).closest('.restrainer').find('.default_option').prop('selected', true);
});/* ADD TAG - OPEN FORM INSIDE ADD TAG POPOVER */
$("body").on("click", '.switch', function() {
  "use strict";$(this).closest('.dropdown-menu').find('.default_option').attr('selected', 'selected');if ($(this).hasClass('new_item')) {$(this).next('.new_tag_item_form').toggleClass('hidden');
    $(this).closest('.dropdown-menu').find('select').attr('disabled', 'true');
    $(this).closest('.dropdown-menu').find('select').attr('disabled', 'true');
    $(this).closest('.dropdown-menu').find('.new_tag_item_input').focus();
    $(this).hide();} else if ($(this).hasClass('use_existing_tag_item')) {resetNewTagItemForm($(this), false);}
});/* LOAD EXISTING TAGS, TAXES, DISCOUNTS, SHIPPINGS INTO NEW-TAG-ITEM SELECT OPTION MENUS */
function loadTagsPopover(identifier) {
  "use strict";var jsonType;switch (identifier) {case 'tags':
      jsonType = 'single';
      break;case 'taxes':
      jsonType = 'double';
      break;case 'discounts':
      jsonType = 'double';
      break;case 'shipping':
      jsonType = 'double';
      break;}$.ajax({
    type: 'POST',
    url: '/php/autocomplete_handler.php?action_type=' + identifier,
    dataType: 'json',
    success: function(data) {  var selectOptions;  $.each(data, function(number) {var name;
        var rate;
        var compiled;if (jsonType === 'double') {
          name = data[number].name;
          if ($.isNumeric(data[number].rate)) {
            rate = (data[number].rate).toFixed(2);
          } else {
            rate = data[number].rate;
          }
        } else {
          name = data[number];
        }if (rate) {
          compiled = name + ' (' + rate + ')';
        } else {
          compiled = name;
        }selectOptions += '<option data-name="' + name + '" data-rate="' + rate + '" value="' + compiled + '">' + compiled + '</option>';
      });  $('[data-handler-autocomplete="' + identifier + '"]').html('<option class="default_option" value="">Choose</option>' + selectOptions);}});}/* ADD TAGS DYNAMICALLY */
var x = 1;function addTagItemsDynamically(container, tagType) {
  'use strict';x++;/* Check if an existing type is being added */
  var existingTag;if ($(container).is('select')) {
    existingTag = true;
  }var tagName;
  var tagRate;
  var tagRemember;/* identify item line number - DELETE?*/
  var lineNumber = $(container).closest('[data-parent-identifier="one_item_line"]').attr('data-id');
if (existingTag === true) {
    /* existing tag */
    var selectedOption = $(container).find('option:selected');
    tagName = selectedOption.attr('data-name');
    tagRate = selectedOption.attr('data-rate');} else {
    /* new tag */
    tagName = $(container).closest('.dropdown-menu').find('.new_tag_item_input').val();
    tagRate = $(container).closest('.dropdown-menu').find('.new_tag_item_rate_input').val();if ($(container).closest('.dropdown-menu').find('.remember_tag').is(':checked')) {
      tagRemember = true;
    }}var error = false;if (!tagName) {
    $(container).closest('.dropdown-menu').find('.new_tag_item_input').addClass('error');
    error = true;
  } else {
    $(container).closest('.dropdown-menu').find('.new_tag_item_input').removeClass('error');
  }if (tagType !== 'tag') {
    if (!tagRate) {
      $(container).closest('.dropdown-menu').find('.new_tag_item_rate_input').addClass('error');
      error = true;
    }}if (error === true) {
    return false;
  }var appendContent;
  var tagAppendContent;var statementTDS;
  var statementAppendContent;var tagClass;switch (tagType) {case 'tag':
      tagAppendContent = tagName;
      tagClass = 'classic';
      break;case 'tax':
      tagAppendContent = tagName + ' (' + tagRate + ')';
      statementTDS = true;
      tagClass = 'tax tds';
      break;case 'discount':
      tagAppendContent = tagName + ' (' + tagRate + ')';
      statementTDS = true;
      tagClass = 'discount tds';
      break;case 'shipping':
      tagAppendContent = tagName + ' (' + tagRate + ')';
      statementTDS = true;
      tagClass = 'shipping tds';
      break;}/* add tag */
  appendContent = '<div class="tag ' + tagClass + '" id="tag_item_' + tagType + '_' + lineNumber + '_' + x + '" data-tag-type="' + tagType + '"> <a class="close_item" href="javascript:void(0)"></a> <div class="inside"> <span class="filename">' + tagAppendContent + '<span class="amount_info"></span></span> <input type="hidden" data-tag-info="name" value="' + tagName + '" /><input type="hidden" data-tag-info="rate" data-calculation="item_' + tagType + '_rate" value="' + tagRate + '" /> </div></div>';$(container).closest('[data-parent-identifier="one_item_line"]').find(".files_area").append(appendContent);
  /* add tag *//* add TDS line */
  if (statementTDS === true) {/*var tdsTypeExists = false;
		var randomToken = token();
	
        $('.statement_amount_container.item.'+tagType).each(function() {	if ($(this).find('.col').html() === tagAppendContent) {
			tdsTypeExists = true;	
			$(this).find('input[type="text"]').attr('data-summarize', randomToken);
			}});*//*if (tdsTypeExists === true) {
	    statementAppendContent = '<ul style="visibility:hidden;position:absolute;" class="statement_amount_container item '+tagType+'" data-tag-id="tag_item_'+tagType+'_'+lineNumber+'_'+x+'"> <li class="statement_amount"> <div class="col">'+tagAppendContent+'</div><input data-summarize="'+randomToken+'" class="col no_input" type="text" disabled data-calculation="item_'+tagType+'_result" value="0.00"> </li></ul>'; 
		} else {*/
    statementAppendContent = '<ul class="statement_amount_container item ' + tagType + '" data-tag-id="tag_item_' + tagType + '_' + lineNumber + '_' + x + '"> <li class="statement_amount"> <div class="col">' + tagAppendContent + '</div><input class="col no_input" type="text" disabled data-calculation="item_' + tagType + '_result" value="0.00"> </li></ul>';
    /*}*/$('#item_tax_discount_shipping_wrapper').append(statementAppendContent);
}
  /* add TDS line */if (tagRemember === true) {
    saveCategory(tagType, tagName, tagRate);
  }if (statementTDS === true) {
    makeCalculation();
    showHideTDS();
  }resetNewTagItemForm($(container), true);}$("body").on("click", 'label[data-create-tag]', function(e) {
  "use strict";
  e.preventDefault();var tagType = $(this).attr('data-create-tag');
  addTagItemsDynamically($(this), tagType);
});$("body").on("change", 'select[data-create-tag]', function(e) {
  "use strict";
  e.preventDefault();var tagType = $(this).attr('data-create-tag');
  addTagItemsDynamically($(this), tagType);
});/* GENERATE RANDOM HASH */
var rand = function() {
  return Math.random().toString(36).substr(2); // remove `0.`
};var token = function() {
  return rand() + rand(); // to make it longer
};/* REMOVE FILES, TAGS, TDS */
$("body").on("click", '.close_item', function() {
  "use strict";var tagType = $(this).closest('[data-tag-type]').attr('data-tag-type');
  var tag = $(this).closest('[data-tag-type]');var doCalculation;
  var removeTag;
  var removeTDS;var emptyTag;switch (tagType) {case 'file':
      removeTag = true;
      break;case 'date':
      emptyTag = true;
      break;case 'tag':
      removeTag = true;
      break;case 'tax':
      removeTag = true;
      removeTDS = true;
      doCalculation = true;
      break;case 'discount':
      removeTag = true;
      removeTDS = true;
      doCalculation = true;
      break;case 'shipping':
      removeTag = true;
      removeTDS = true;
      doCalculation = true;
      break;}if (removeTag === true) {
    tag.remove();
  } else {
    tag.hide();if (emptyTag === true) {
      tag.find('.filename').html('');
      tag.find('.filename').attr('data-real-date', '');
    }}if (removeTDS === true) {
    $('[data-tag-id="' + tag.attr('id') + '"]').remove();
    showHideTDS();
  }if (doCalculation === true) {
    makeCalculation();
  }});/* DYNAMICALLY HIDE AND SHOW TDS BUTTONS ACCORDING TO EXISTENCE OF OTHERS */
function showHideTDS() {
  "use strict";$('body').find('.textarea_actions.right .restrainer').removeClass('disabled');
  $('body').find('.button_row.tax_discount_shipping').show();if ($('body').find('.tag.tds').length > 0) {$('body').find('.button_row.tax_discount_shipping').hide();} else if ($('body').find('.statement_amount_container.total.tds').length > 0) {$('body').find('.textarea_actions.right .restrainer').addClass('disabled');}}/* RESET NEW LINK FORM */
function resetLinkForm(container, closeAsWell) {
  "use strict";if (closeAsWell === true) {
    // close menu
    $(container).closest('.dropdown-menu.popover.links').hide();
  }// empty inputs and remove errors
  $(container).closest('.dropdown-menu.popover.links').find('.link_ttd').val('');
  $(container).closest('.dropdown-menu.popover.links').find('.link_url').val('http://');
  $(container).closest('.dropdown-menu.popover.links').find('.link_ttd').removeClass('error');
  $(container).closest('.dropdown-menu.popover.links').find('.link_url').removeClass('error');}/* ADD LINKS DYNAMICALLY */
$(document).ready(function() {
  "use strict";
  var x = 1;$("body").on("click", '.add_link', function(e) {
    e.preventDefault();x++;var TextToDisplay = $(this).closest('[data-parent-identifier="one_item_line"]').find(".link_ttd").val();
    var LinkURL = $(this).closest('[data-parent-identifier="one_item_line"]').find(".link_url").val();var error = false;if (!TextToDisplay) {
      $(this).closest('[data-parent-identifier="one_item_line"]').find(".link_ttd").addClass('error');
      error = true;
    }if (!LinkURL || !/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(LinkURL)) {
      $(this).closest('[data-parent-identifier="one_item_line"]').find(".link_url").addClass('error');
      error = true;
    }if (error == true) {
      return false;
    }var textareaContent = $(this).closest('[data-parent-identifier="one_item_line"]').find("textarea").val();$(this).closest('[data-parent-identifier="one_item_line"]').find("textarea").html(textareaContent + '[' + TextToDisplay + '](' + LinkURL + ')');
    $(this).closest('[data-parent-identifier="one_item_line"]').find("textarea").val(textareaContent + '[' + TextToDisplay + '](' + LinkURL + ')');resetLinkForm($(this), true);});
});/* STATEMENT - ITEM ROW - TOTAL - CALCULATION */
function makeCalculation() {
  "use strict";//alert('calc triggered');var subTotal = 0;
  var Total = 0;$('.one_item_line.actual').each(function() {var rate;
    var quantity;
    var lineTotal;var zero = 0;if ($(this).attr('data-type') === 'expense') {  lineTotal = parseFloat($(this).find('[data-calculation="line_total"]').val());} else if ($(this).attr('data-type') === 'time') {  var timeInput = $(this).find('[data-calculation="quantity"]').val();  rate = parseFloat($(this).find('[data-calculation="rate"]').val());
      var ratePerSecond = rate / 60;  var timeSplitArr = timeInput.split(':');
      var minutes = timeSplitArr[0];
      var seconds = timeSplitArr[1];  var totalSeconds = parseInt(minutes) * 60 + parseInt(seconds);  lineTotal = parseFloat(totalSeconds * ratePerSecond).toFixed(getCurrentNumberFormatVars('precision'));  if (isNaN(parseFloat(lineTotal)) === true) {
        $(this).find('[data-calculation="line_total"]').val(zero.toFixed(parseInt(getCurrentNumberFormatVars('precision'))));
      } else {
        $(this).find('[data-calculation="line_total"]').val(lineTotal);
      }} else {  rate = parseFloat($(this).find('[data-calculation="rate"]').val());
      quantity = parseFloat($(this).find('[data-calculation="quantity"]').val());  // new 
      lineTotal = (parseFloat((quantity * rate) * 100) / 100).toFixed(getCurrentNumberFormatVars('precision'));  if (isNaN(parseFloat(lineTotal)) === true) {
        $(this).find('[data-calculation="line_total"]').val(zero.toFixed(parseInt(getCurrentNumberFormatVars('precision'))));
      } else {
        $(this).find('[data-calculation="line_total"]').val(lineTotal);
      }}
  });$('.one_item_line.actual').find('[data-calculation="line_total"]').each(function() {
    subTotal = subTotal + parseFloat($(this).val());
  });if (isNaN(parseFloat(subTotal)) === true) {
    $('[data-form-type="statement"]').find('[data-calculation="subtotal"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
  } else {
    $('[data-form-type="statement"]').find('[data-calculation="subtotal"]').val(formatNumber(subTotal, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
  }// Apply Item Discounts
  var itemDiscountAmountsCombined = 0;$('body').find('[data-calculation="item_discount_rate"]').each(function() {var tagID = $(this).closest('.tag.discount').attr('id');
    var itemLineTotal = $(this).closest('.one_item_line').find('[data-calculation="line_total"]').val();var DiscountValue = $(this).val();
    var DiscountAmount;if (DiscountValue.indexOf("%") >= 0) {
      DiscountValue = DiscountValue.replace('%', '');
      DiscountAmount = (itemLineTotal / 100) * DiscountValue;
    } else if (DiscountValue) {
      DiscountAmount = parseFloat(DiscountValue);
    } else {
      DiscountAmount = 0;
    }if (isNaN(parseFloat(DiscountAmount)) === true) {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_discount_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_discount_result"]').val('-' + formatNumber(DiscountAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(DiscountAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }itemDiscountAmountsCombined = itemDiscountAmountsCombined + DiscountAmount;});// Apply Total Discounts
  var totalDiscountAmountsCombined = 0;$('body').find('[data-calculation="total_discount_rate"]').each(function() {var DiscountValue = $(this).val();
    var DiscountAmount;if (DiscountValue.indexOf("%") >= 0) {
      DiscountValue = DiscountValue.replace('%', '');
      DiscountAmount = (subTotal / 100) * DiscountValue;
    } else if (DiscountValue) {
      DiscountAmount = parseFloat(DiscountValue);
    } else {
      DiscountAmount = 0;
    }if (isNaN(parseFloat(DiscountAmount)) === true) {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_discount_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_discount_result"]').val('-' + formatNumber(DiscountAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }totalDiscountAmountsCombined = totalDiscountAmountsCombined + DiscountAmount;});
var TotalBeforeTax;if (totalDiscountAmountsCombined > 0) {
    TotalBeforeTax = subTotal - parseFloat(totalDiscountAmountsCombined);
  } else if (itemDiscountAmountsCombined > 0) {
    TotalBeforeTax = subTotal - parseFloat(itemDiscountAmountsCombined);
  } else {
    TotalBeforeTax = subTotal;
  }// Apply Item Taxes
  var itemTaxAmountsCombined = 0;$('body').find('[data-calculation="item_tax_rate"]').each(function() {var tagID = $(this).closest('.tag.tax').attr('id');
    var itemLineTotal = $(this).closest('.one_item_line').find('[data-calculation="line_total"]').val();// Calculate item discounts sum again
    var itemDiscountsParticular = 0;$(this).closest('.one_item_line').find('[data-calculation="item_discount_rate"]').each(function() {  var DiscountValue = $(this).val();
      var DiscountAmount;  if (DiscountValue.indexOf("%") >= 0) {
        DiscountValue = DiscountValue.replace('%', '');
        DiscountAmount = (itemLineTotal / 100) * DiscountValue;
      } else if (DiscountValue) {
        DiscountAmount = parseFloat(DiscountValue);
      } else {
        DiscountAmount = 0;
      }  itemDiscountsParticular = itemDiscountsParticular + DiscountAmount;});if (itemDiscountsParticular > 0) {
      itemLineTotal = itemLineTotal - parseFloat(itemDiscountsParticular);
    }var TaxValue = $(this).val();
    var TaxAmount;if (TaxValue.indexOf("%") >= 0) {
      TaxValue = TaxValue.replace('%', '');
      TaxAmount = (itemLineTotal / 100) * TaxValue;
    } else if (TaxValue) {
      TaxAmount = parseFloat(TaxValue);
    } else {
      TaxAmount = 0;
    }
if (isNaN(parseFloat(TaxAmount)) === true) {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_tax_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_tax_result"]').val(formatNumber(TaxAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(TaxAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }itemTaxAmountsCombined = itemTaxAmountsCombined + TaxAmount;});// Apply Total Taxes
  var totalTaxAmountsCombined = 0;$('body').find('[data-calculation="total_tax_rate"]').each(function() {var TaxValue = $(this).val();
    var TaxAmount;if (TaxValue.indexOf("%") >= 0) {
      TaxValue = TaxValue.replace('%', '');
      TaxAmount = (TotalBeforeTax / 100) * TaxValue;
    } else if (TaxValue) {
      TaxAmount = parseFloat(TaxValue);
    } else {
      TaxAmount = 0;
    }if (isNaN(parseFloat(TaxAmount)) === true) {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_tax_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_tax_result"]').val(formatNumber(TaxAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }totalTaxAmountsCombined = totalTaxAmountsCombined + TaxAmount;});var TotalAfterTax;if (totalTaxAmountsCombined > 0) {
    TotalAfterTax = TotalBeforeTax + parseFloat(totalTaxAmountsCombined);
  } else if (itemTaxAmountsCombined > 0) {
    TotalAfterTax = TotalBeforeTax + parseFloat(itemTaxAmountsCombined);
  } else {
    TotalAfterTax = TotalBeforeTax;
  }// Apply Item Shippings
  var itemShippingAmountsCombined = 0;$('body').find('[data-calculation="item_shipping_rate"]').each(function() {var tagID = $(this).closest('.tag.shipping').attr('id');var ShippingValue = $(this).val();
    var ShippingAmount;if (ShippingValue) {
      ShippingAmount = parseFloat(ShippingValue);
    } else {
      ShippingAmount = 0;
    }if (isNaN(parseFloat(ShippingAmount)) === true) {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_shipping_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      // add amount to statement amount
      $('.statement_amount_container.item[data-tag-id="' + tagID + '"]').find('[data-calculation="item_shipping_result"]').val(formatNumber(ShippingAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
      // append amount info to tag
      $('.tag#' + tagID + ' .filename .amount_info').html(' = <span data-currency="code">' + $('.td_currency').html() + '</span> ' + formatNumber(ShippingAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }itemShippingAmountsCombined = itemShippingAmountsCombined + ShippingAmount;});// Apply Total Shippings
  var totalShippingAmountsCombined = 0;$('body').find('[data-calculation="total_shipping_rate"]').each(function() {var ShippingValue = $(this).val();
    var ShippingAmount;if (ShippingValue) {
      ShippingAmount = parseFloat(ShippingValue);
    } else {
      ShippingAmount = 0;
    }if (isNaN(parseFloat(ShippingAmount)) === true) {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_shipping_result"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    } else {
      $(this).closest('.statement_amount_container.total').find('[data-calculation="total_shipping_result"]').val(formatNumber(ShippingAmount, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    }totalShippingAmountsCombined = totalShippingAmountsCombined + ShippingAmount;});if (totalShippingAmountsCombined > 0) {
    Total = TotalAfterTax + parseFloat(totalShippingAmountsCombined);
  } else if (itemShippingAmountsCombined > 0) {
    Total = TotalAfterTax + parseFloat(itemShippingAmountsCombined);
  } else {
    Total = TotalAfterTax;
  }// get already paid amount for total due value
  var amountAlreadyPaid = parseFloat($('[data-form-type="statement"]').find('[data-calculation="total_due"]').attr('data-paid-amount'));if (isNaN(parseFloat(Total)) === true) {
    // total
    $('[data-form-type="statement"]').find('[data-calculation="total"]').val(formatNumber(0, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    // total due
    $('[data-form-type="statement"]').find('[data-calculation="total_due"]').val(formatNumber((0 - amountAlreadyPaid), getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
  } else {
    // total
    $('[data-form-type="statement"]').find('[data-calculation="total"]').val(formatNumber(Total, getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
    // total due
    $('[data-form-type="statement"]').find('[data-calculation="total_due"]').val(formatNumber((Total - amountAlreadyPaid), getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
  }}$('body').on('keyup', 'input[data-trigger="calculation"]', function() {
  "use strict";
  makeCalculation();
});/* AUTOCOMPLETE */
function autocomplete(type) {
  "use strict";var action;
  var autocompleteClass;var doCalculation;switch (type) {case 'item':
      action = 'items';
      autocompleteClass = 'item_autocomplete';
      doCalculation = true;
      break;case 'expense':
      action = 'expenses';
      autocompleteClass = 'item_autocomplete';
      doCalculation = true;
      break;case 'mileage':
      action = 'trips';
      autocompleteClass = 'item_autocomplete';
      doCalculation = true;
      break;case 'time':
      action = 'tasks';
      autocompleteClass = 'item_autocomplete';
      doCalculation = true;
      break;case 'connection':
      action = 'connections';
      autocompleteClass = 'connection_autocomplete';
      break;default:
      action = type;}$('[data-autocomplete="' + type + '"]').autocomplete({/* $(this) = input */serviceUrl: '/php/autocomplete_handler.php?action_type=' + action,
    type: 'post',
    maxHeight: 250,
    minChars: 0,
    autoSelectFirst: false,
    tabDisabled: true,
    triggerSelectOnValidInput: false,
    formatResult: function(suggestion) {
      /* format suggestions */  var returnContent;  returnContent = '<span class="left">' + suggestion.value + '</span>';  if (action === 'items' || action === 'expenses' || action === 'trips' || action === 'tasks') {if (suggestion.rate) {
          returnContent += '<span class="right">' + parseFloat(suggestion.rate).toFixed(2) + '</span>';
        } else if (suggestion.price) {
          returnContent += '<span class="right">' + parseFloat(suggestion.price).toFixed(2) + '</span>';
        } else {
          returnContent += '<span class="right">-&nbsp;</span>';
        }  }  return returnContent;
      /* format suggestions */
    },beforeRender: function(container) {
      /* actions before autocomplete loads */
      container.addClass(autocompleteClass);
      /* actions before autocomplete loads */
    },
    onSearchStart: function() {
      $(this).parent().find('.input_loader').show();
    },
    onSearchComplete: function() {
      $(this).parent().find('.input_loader').hide();
    },
    onSelect: function(suggestions) {  if (action === 'connections') {
        /* CONNECTIONS */
        var connectionName = suggestions.value;var appendContent = '<div class="autocomplete_card"><a class="close_icon"></a><p>' + connectionName + '</p>';if ($(this).attr('data-autocomplete-use') !== 'track_connection' && $(this).attr('data-autocomplete-use') !== 'report_select_client') {  if (suggestions.address_1) {
            appendContent += suggestions.address_1;
          }  if (suggestions.address_2) {
            appendContent += '<br/>' + suggestions.address_2;
          }  if (suggestions.city || suggestions.zip_code || suggestions.state) {
            appendContent += '<br/>';
          }  if (suggestions.city) {
            appendContent += ' ' + suggestions.city;
          }  if (suggestions.zip_code) {
            appendContent += ' ' + suggestions.zip_code;
          }  if (suggestions.state) {
            appendContent += ' ' + suggestions.state;
          }  if (suggestions.country) {
            appendContent += '<br/>' + suggestions.country;
          }}appendContent += '</div>';$(this).hide();
        $(this).closest('[data-identifier="autocomplete_wrapper"]').find('input[name="client_id"]').val(suggestions.connection_id);
        refreshStatementConnectionContacts(suggestions.connection_id);$(this).parent().append(appendContent);if ($(this).attr('data-autocomplete-use') !== 'track_connection' && $(this).attr('data-autocomplete-use') !== 'report_select_client') {  if (suggestions.default_currency) {
            $('[name="statement[currency]"]').val(suggestions.default_currency);
            $('[name="statement[currency]"]').find('[value="' + (suggestions.default_currency).toLowerCase() + '"]').prop('selected', true);
            refreshStatementCurrency();
          }  if (suggestions.default_language) {
            $('[name="statement_language"]').val(suggestions.default_language);
            $('[name="statement_language"]').find('[value="' + (suggestions.default_language).toLowerCase() + '"]').prop('selected', true);
          }}/* CONNECTIONS */
      }  if (action === 'items' || action === 'expenses' || action === 'trips' || action === 'tasks') {
        /* ITEM EXPENSE TRIP TASK */
        if (suggestions.description && $(this).attr('data-autocomplete-use') !== 'create_edit_track_entry') {  $(this).val($(this).val() + ' - ' + suggestions.description);}if ($(this).attr('data-autocomplete-use') === 'create_edit_track_entry') {  $(this).hide();
          $(this).closest('.form_row').append('<div class="autocomplete_card"><a class="close_icon"></a><p>' + suggestions.value + '</p>');  $(this).closest('[data-identifier="autocomplete_wrapper"]').find('.radio_checkbox').closest('.form_row').hide();  if (suggestions.rate) {
            $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete-fill="rate"]').hide();
            $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete-fill="rate"]').closest('.form_row').append('<div class="autocomplete_card"><p>' + suggestions.rate + '</p>');
          }}if (type === 'time') {
          $(this).closest('.one_item_line').find('[data-calculation="quantity"]').val('01:00');
          $(this).closest('.one_item_line').find('[data-calculation="quantity"]').attr('data-total-minutes', 60);
        } else {
          $(this).closest('.one_item_line').find('[data-calculation="quantity"]').val('1');
        }if (suggestions.rate) {
          $(this).closest('[data-parent-identifier="one_item_line"]').find('[data-autocomplete-fill="rate"]').val(parseFloat(suggestions.rate).toFixed(2));
        }if (suggestions.price) {
          $(this).closest('[data-parent-identifier="one_item_line"]').find('[data-autocomplete-fill="rate"]').val(parseFloat(suggestions.price).toFixed(2));
        }if (suggestions.unit) {
          $(this).closest('.one_item_line').find('.unit_lower select').hide();
          $(this).closest('.one_item_line').find('.unit_lower .select_arrows').hide();
          $(this).closest('.one_item_line').find('.unit_lower input').show();
          $(this).closest('.one_item_line').find('.unit_lower input').val(suggestions.unit);
        }
        /* ITEM EXPENSE TRIP TASK */
      }  if (doCalculation === true) {
        makeCalculation();
      }
}});}
/* UNIFIED AUTOCOMPLETE *//* AUTOCOMPLETE CALL */
function fireAutocomplete(type) {
  "use strict";
  $('[data-autocomplete="' + type + '"]').each(function() {
    autocomplete($(this).attr('data-autocomplete'));
  });
}
/* AUTOCOMPLETE CALL *//* CLOSE AUTOCOMPLETE CARD */
$('body').on('click', '.autocomplete_card a.close_icon', function() {
  "use strict";if ($(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete]').attr('data-autocomplete-use') === 'create_edit_track_entry') {
    $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete-fill="rate"]').show();
    $(this).closest('[data-identifier="autocomplete_wrapper"]').find('.radio_checkbox').closest('.form_row').show();
  }//$(this).autocomplete('enable');
  $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete]').autocomplete('clear');
  $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete]').show();$(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete]').val('');
  $(this).closest('[data-identifier="autocomplete_wrapper"]').find('[data-autocomplete-fill]').val('');
  $(this).closest('[data-identifier="autocomplete_wrapper"]').find('input[name="client_id"]').val('');$(this).closest('[data-identifier="autocomplete_wrapper"]').find('.autocomplete_card').remove();});
/* CLOSE AUTOCOMPLETE CARD *//* CURRENCY ISO CODE ARRAY */
var currencyCodesIso = {
  AED: "AED",
  AFN: "Ø‹",
  ALL: "Lek",
  AMD: "AMD",
  ANG: "Æ’",
  AOA: "AOA",
  ARS: "$",
  AUD: "$",
  AWG: "Æ’",
  AZN: "Ð¼Ð°Ð½",
  BAM: "KM",
  BBD: "$",
  BDT: "BDT",
  BGN: "Ð»Ð²",
  BHD: "BHD",
  BIF: "BIF",
  BMD: "$",
  BND: "$",
  BOB: "$b",
  BOV: "BOV",
  BRL: "R$",
  BSD: "$",
  BTN: "BTN",
  BWP: "P",
  BYR: "p.",
  BZD: "BZ$",
  CAD: "$",
  CDF: "CDF",
  CHE: "CHE",
  CHF: "CHF",
  CHW: "CHW",
  CLF: "CLF",
  CLP: "$",
  CNY: "Â¥",
  COP: "$",
  COU: "COU",
  CRC: "â‚¡",
  CUC: "CUC",
  CUP: "â‚±",
  CVE: "CVE",
  CZK: "KÄ",
  DJF: "DJF",
  DKK: "kr",
  DOP: "RD$",
  DZD: "DZD",
  EGP: "Â£",
  ERN: "ERN",
  ETB: "ETB",
  EUR: "â‚¬",
  FJD: "$",
  FKP: "Â£",
  GBP: "Â£",
  GEL: "GEL",
  GHS: "GHS",
  GIP: "Â£",
  GMD: "GMD",
  GNF: "GNF",
  GTQ: "Q",
  GYD: "$",
  HKD: "$",
  HNL: "L",
  HRK: "kn",
  HTG: "HTG",
  HUF: "Ft",
  IDR: "Rp",
  ILS: "â‚ª",
  INR: "INR",
  IQD: "IQD",
  IRR: "ï·¼",
  ISK: "kr",
  JMD: "J$",
  JOD: "JOD",
  JPY: "Â¥",
  KES: "KES",
  KGS: "Ð»Ð²",
  KHR: "áŸ›",
  KMF: "KMF",
  KPW: "â‚©",
  KRW: "â‚©",
  KWD: "KWD",
  KYD: "$",
  KZT: "Ð»Ð²",
  LAK: "â‚­",
  LBP: "Â£",
  LKR: "Rs",
  LRD: "$",
  LSL: "LSL",
  LTL: "Lt",
  LVL: "Ls",
  LYD: "LYD",
  MAD: "MAD",
  MDL: "MDL",
  MGA: "MGA",
  MKD: "Ð´ÐµÐ½",
  MMK: "MMK",
  MNT: "â‚®",
  MOP: "MOP",
  MRO: "MRO",
  MUR: "Rs",
  MVR: "MVR",
  MWK: "MWK",
  MXN: "$",
  MXV: "MXV",
  MYR: "RM",
  MZN: "MT",
  NAD: "$",
  NGN: "â‚¦",
  NIO: "C$",
  NOK: "kr",
  NPR: "Rs",
  NZD: "$",
  OMR: "ï·¼",
  PAB: "B/.",
  PEN: "S/.",
  PGK: "PGK",
  PHP: "â‚±",
  PKR: "Rs",
  PLN: "zÅ‚",
  PYG: "Gs",
  QAR: "ï·¼",
  RON: "lei",
  RSD: "Ð”Ð¸Ð½.",
  RUB: "Ñ€ÑƒÐ±",
  RWF: "RWF",
  SAR: "ï·¼",
  SBD: "$",
  SCR: "Rs",
  SDG: "SDG",
  SEK: "kr",
  SGD: "$",
  SHP: "Â£",
  SLL: "SLL",
  SOS: "S",
  SRD: "$",
  SSP: "SSP",
  STD: "STD",
  SYP: "Â£",
  SZL: "SZL",
  THB: "à¸¿",
  TJS: "TJS",
  TMT: "TMT",
  TND: "TND",
  TOP: "TOP",
  TRY: "TRY",
  TTD: "TT$",
  TWD: "NT$",
  TZS: "TZS",
  UAH: "â‚´",
  UGX: "UGX",
  USD: "$",
  USN: "USN",
  USS: "USS",
  UYI: "UYI",
  UYU: "$U",
  UZS: "Ð»Ð²",
  VEF: "Bs",
  VND: "â‚«",
  VUV: "VUV",
  WST: "WST",
  XAF: "XAF",
  XAG: "XAG",
  XAU: "XAU",
  XBA: "XBA",
  XBB: "XBB",
  XBC: "XBC",
  XBD: "XBD",
  XCD: "$",
  XDR: "XDR",
  XFU: "XFU",
  XOF: "XOF",
  XPD: "XPD",
  XPF: "XPF",
  XPT: "XPT",
  XTS: "XTS",
  XXX: "XXX",
  YER: "ï·¼",
  ZAR: "R",
  ZMW: "ZMW",
  EEK: "EEK",
  SVC: "$",
  SKK: "SKK",
  TMM: "TMM",
  ZMK: "ZK",
  ZWD: "ZWD",
};/* REFRESH STATEMENT CURRENCY ACCORDING TO INPUT */
function refreshStatementCurrency() {
  "use strict";var currencyCode = $('[name="statement[currency]"]').val();
  var currencySymbol = currencyCodesIso[(currencyCode.toUpperCase())];if ($('[name="statement[currency]"]').attr('data-currency-format') === 'code') {
    $('[data-currency="code"]').html(currencyCode.toUpperCase());
  } else if ($('[name="statement[currency]"]').attr('data-currency-format') === 'symbol') {
    $('[data-currency="code"]').html(currencySymbol);
  }}/* SHAKE TEXT INPUT */
$('body').on('click', '[data-currency="code"]', function() {
  "use strict";function customRemoveShakeInputClass() {
    $('[name="statement[currency]"]').removeClass('shakeInput');
    $('[name="statement[currency]"]').closest('.form_row').find('.select_arrows').fadeIn(50);
  }$('[name="statement[currency]"]').addClass('shakeInput');
  $('[name="statement[currency]"]').closest('.form_row').find('.select_arrows').hide();
  $.wait(500).then(customRemoveShakeInputClass);
});/* NUMBER FORMATTING + PRECISION */
function formatNumber(numberToFormat, formatType, precision) {
  "use strict";var thousands;
  var decimals;switch (formatType) {case 1:
      thousands = ',';
      decimals = '.';
      break;case 2:
      thousands = '.';
      decimals = ',';
      break;case 3:
      thousands = ' ';
      decimals = '.';
      break;case 4:
      thousands = ' ';
      decimals = ',';
      break;case 5:
      thousands = '';
      decimals = '.';
      break;case 6:
      thousands = '';
      decimals = ',';
      break;default:
      thousands = ',';
      decimals = '.';}if (!precision) {
    precision = 2;
  }return accounting.formatMoney(numberToFormat, '', precision, thousands, decimals);/* usage: formatNumber([number], [int formatType, 1-6], [str precision, 0-4]) */
}/* GET CURRENT NUMBER FORMAT & PRECISION VALUE */
function getCurrentNumberFormatVars(type) {
  "use strict";var numberFormat = $('[name="statement[number_format]"]').val();
  var numberPrecision = $('[name="statement[number_precision]"]').val();if (type === 'format') {
    if (isPrivateStatementPage($('input[name="current_page"]').val())) {
      return parseInt(numberFormat);
    } else {
      return 1;
    }
  } else if (type === 'precision') {
    if (isPrivateStatementPage($('input[name="current_page"]').val())) {
      return numberPrecision;
    } else {
      return 2;
    }
  }}/* REFRESH NUMBER FORMATTING & PRECISION */
function refreshNumberFormatAndPrecision() {
  "use strict";$('[data-format-number="both"]').each(function() {
    $(this).val(formatNumber(parseFloat($(this).val()), getCurrentNumberFormatVars('format'), getCurrentNumberFormatVars('precision')));
  });$('[data-format-number="precision"]').each(function() {
    $(this).val(parseFloat($(this).val()).toFixed(getCurrentNumberFormatVars('precision')));
  });}/* SUBMIT STATEMENT */
$('body').on('click', '[data-submit-statement="true"]:not(.flip)', function(event) {
  "use strict";
  event.preventDefault();var that = $(this);
  var statementForm = $(this).closest('body').find('[data-form-type="statement"]');var submitAction = $(this).attr('data-submit-statement-action');var successMessage = ['show', 'success', $(statementForm).attr('data-success-message')];/* validation 
  if (!validateFormFields(statementForm)) {
  return false;	
  }
  /* validation */var statementType = $(statementForm).find('[name="statement[type]"]').val();
  var statementTypeTranslated;var statementRecurring = $(statementForm).find('[name="statement[recurring]"]').val();var statementDate = $(statementForm).find('[name="statement[date]"]').attr('data-real-date');
  var statementExpirationDate;
  var daysToAdd;var statementStatus;
  var statementRecurringSendType;// for edit, current statement status
  var currentStatementStatus = $(statementForm).find('[name="statement[statement_status]"]').val();var handlerEndpoint;
  var handlerAction = $(statementForm).attr('data-handler-action');
  var dataObjectID = $(statementForm).attr('data-object-id');var redirectPath;var redirectPathElement;
  var redirectFile;
  var redirectPage;
  var redirectType;var loadingItem;switch (statementType) {case 'invoice':  if (handlerAction === 'create' || (handlerAction === 'edit' && currentStatementStatus === 'draft')) {if (submitAction === 'save_draft' || submitAction === 'save_start_profile') {
          loadingItem = $(this);
        } else {
          loadingItem = $(this).closest('.dropdown').find('.dropdown-toggle');
        }  } else {loadingItem = $(this);  }  statementTypeTranslated = 1;
      statementStatus = handlerAction === 'create' ? 'draft' : $(statementForm).find('[name="statement[statement_status]"]').val();
      handlerEndpoint = 'invoice';
      redirectPathElement = 'invoices';
      redirectFile = 'view_statement';
      redirectPage = 'view_invoice';
      redirectType = 'invoice';  if (statementRecurring == 1) {
        statementRecurringSendType = parseInt($(statementForm).find('[name="statement[recurring_occurrence_actions]"]:checked').val());
      }  if (handlerAction === 'create' || (handlerAction === 'edit' && currentStatementStatus === 'draft')) {if (submitAction === 'save_start_profile') {
          statementStatus = 'active';
        } else if (submitAction === 'save' || submitAction === 'save_send') {
          statementStatus = 'unsent';
        } else if (submitAction === 'save_mark_sent') {
          statementStatus = 'sent';
        } else {
          statementStatus = 'draft';
        }  } else {
        statementStatus = $(statementForm).find('[name="statement[statement_status]"]').val();
      }  /* submit actions */
      if (submitAction === 'save_send') {
        redirectPathElement = 'invoices';
        redirectFile = 'send_statement';
        redirectPage = 'send_invoice';
        redirectType = 'invoice';
      }
      /* submit actions */  break;case 'bill':  loadingItem = $(this);  statementTypeTranslated = 3;
      handlerEndpoint = 'bill';
      redirectPathElement = 'bills';
      redirectFile = 'view_statement';
      redirectPage = 'view_bill';
      redirectType = 'bill';  if (statementRecurring == 1) {
        statementRecurringSendType = 1;
      }  if (handlerAction === 'create' || (handlerAction === 'edit' && currentStatementStatus === 'draft')) {if (submitAction === 'save_start_profile') {
          statementStatus = 'active';
        } else if (submitAction === 'save_draft') {
          statementStatus = 'draft';
        } else {
          statementStatus = 'payable';
        }  } else {
        statementStatus = $(statementForm).find('[name="statement[statement_status]"]').val();
      }  break;case 'estimate':  if (handlerAction === 'create' || (handlerAction === 'edit' && currentStatementStatus === 'draft')) {if (submitAction === 'save_draft' || submitAction === 'save_start_profile') {
          loadingItem = $(this);
        } else {
          loadingItem = $(this).closest('.dropdown').find('.dropdown-toggle');
        }  } else {
        loadingItem = $(this);
      }  statementTypeTranslated = 2;
      statementStatus = handlerAction === 'create' ? 'draft' : $(statementForm).find('[name="statement[statement_status]"]').val();
      handlerEndpoint = 'estimate';
      redirectPathElement = 'estimates';
      redirectFile = 'view_statement';
      redirectPage = 'view_estimate';
      redirectType = 'estimate';  if (handlerAction === 'create' || (handlerAction === 'edit' && currentStatementStatus === 'draft')) {if (submitAction === 'save' || submitAction === 'save_send') {
          statementStatus = 'unsent';
        } else if (submitAction === 'save_mark_sent') {
          statementStatus = 'sent';
        } else {
          statementStatus = 'draft';
        }  } else {
        statementStatus = $(statementForm).find('[name="statement[statement_status]"]').val();
      }  /* submit actions */
      if (submitAction === 'save_send') {
        redirectPathElement = 'estimates';
        redirectFile = 'send_statement';
        redirectPage = 'send_estimate';
        redirectType = 'estimate';
      }
      /* submit actions */  /* count forward expiration days from estimate date */
      if ($(statementForm).find('[name="statement[expiration_date]"]').is(':visible')) {
        statementExpirationDate = $(statementForm).find('[name="statement[expiration_date]"]').attr('data-real-date');  } else {
        daysToAdd = $(statementForm).find('[name="statement[expiration]"]').val();if (daysToAdd === '0') {
          statementExpirationDate = '';
        } else {
          statementExpirationDate = moment(statementDate).add(daysToAdd, "days").format("YYYY-MM-DD");
        }  }
      /* count forward expiration days from estimate date */
      break;}loadingItem.addClass('loading');/* count forward invoice/bill due date from selected invoice/bill date */
  var statementDueDate;if ($(statementForm).find('[name="statement[due_date]"]').is(':visible')) {
    statementDueDate = $(statementForm).find('[name="statement[due_date]"]').attr('data-real-date');
  } else {
    daysToAdd = $(statementForm).find('[name="statement[due]"]').val();
    statementDueDate = moment(statementDate).add(daysToAdd, "days").format("YYYY-MM-DD");
  }
  /* count forward invoice/bill due date from selected invoice/bill date *//* check for custom statement titles */
  var customStatementTitle;if ($(statementForm).find('[name="statement[custom_title]"]').val() !== $(statementForm).find('[name="statement[custom_title]"]').attr('data-default')) {
    customStatementTitle = $(statementForm).find('[name="statement[custom_title]"]').val();
  }
  /* check for custom statement titles */var postData = {
    statement_status: statementStatus,
    custom_statement_title: customStatementTitle,
    statement_type: statementTypeTranslated,
    statement_summary: $(statementForm).find('[name="statement[description]"]').val(),
    statement_id: $(statementForm).find('[name="statement[number]"]').val(),
    statement_currency: $(statementForm).find('[name="statement[currency]"]').val().toUpperCase(),
    statement_language: $(statementForm).find('[name="statement[language]"]').val(),
    statement_date: statementDate,
    statement_notes: $(statementForm).find('[name="statement[notes]"]').val(),
    statement_due_date: statementDueDate,
    statement_expiration_date: statementExpirationDate,
    statement_ref_id: $(statementForm).find('[name="statement_po_number"]').val(),
    connection_id: $(statementForm).find('[name="client_id"]').val(),/* statement settings */
    payment_options: [],
    allow_partial_payments: $(statementForm).find('[name="statement[partial_payments]"]').prop('checked') ? 1 : '',
    send_receipts: $(statementForm).find('[name="statement[send_receipts]"]').prop('checked') ? 1 : '',
    send_reminders: $(statementForm).find('[name="statement[send_reminders]"]').prop('checked') ? 1 : '',
    statement_send_attach_pdf: $(statementForm).find('[name="statement[attach_pdf_copy]"]').prop('checked') ? 1 : '',
    statement_send_type: $(statementForm).find('[name="statement[mail_default_custom]"]:checked').val() === 'custom' ? 2 : 1,
    statement_send_to: $(statementForm).find('[name="custom_email_to"]').val(),
    statement_send_bcc: $(statementForm).find('[name="custom_email_bcc"]').val(),
    statement_send_subject: $(statementForm).find('[name="custom_email_subject"]').val(),
    statement_send_content: $(statementForm).find('[name="custom_email_content"]').val(),
    /* statement settings *//* recurring settings here */
    statement_recurring: $(statementForm).find('[name="statement[recurring]"]').val(),
    statement_recurring_send_type: statementRecurringSendType,
    statement_recurring_profile_name: $(statementForm).find('[name="statement[recurring_profile_name]"]').val(),
    statement_recurring_custom_invoice_sequencing: $(statementForm).find('[name="statement[recurring_profile_id]"]').val(),
    statement_recurring_start_date: $(statementForm).find('[name="statement[recurring_start_date]"]').attr('data-real-date'),
    statement_recurring_frequency_number: $(statementForm).find('[name="statement[recurring_custom_frequency_amount]"]').is(':visible') ? $(statementForm).find('[name="statement[recurring_custom_frequency_amount]"]').val() : $(statementForm).find('[name="statement[recurring_frequency]"] option:selected').attr('data-amount'),
    statement_recurring_frequency_type: $(statementForm).find('[name="statement[recurring_custom_frequency_unit]"]').is(':visible') ? $(statementForm).find('[name="statement[recurring_custom_frequency_unit]"]').val() : $(statementForm).find('[name="statement[recurring_frequency]"] option:selected').attr('data-unit'),
    statement_recurring_total_occurences: $(statementForm).find('[name="statement[recurring_occurrences]"]').val(),
    statement_recurring_due_after: $(statementForm).find('[name="statement[due_days]"]').is(':visible') ? parseInt($(statementForm).find('[name="statement[due_days]"]').val()) : parseInt($(statementForm).find('[name="statement[due]"]').val()),
    /* recurring settings here */pricing_items: [],//line_items_order: $(this).find('[name="statement[item_order]"]').val(),
    line_items: [],
  };/* payment methods */
  $(statementForm).find('[name="statement[payment_method]"]').each(function() {
    if ($(this).prop('checked')) {
      postData.payment_options.push($(this).val());
    }
  });
  /* payment methods *//* total TDS */
  $(statementForm).find('.statement_amount_container.tds').each(function() {var TDStype = $(this).attr('data-tds-type');
    var TDSname = $(this).find('input.tds_name').val() ? $(this).find('input.tds_name').val() : $(this).find('select option:selected').attr('data-name');
    var TDSrate = $(this).find('input.tds_rate').val() ? $(this).find('input.tds_rate').val() : $(this).find('select option:selected').attr('data-rate');if ($(this).find('input[type="checkbox"]:checked').is(':visible')) {
      saveCategory(TDStype, TDSname, TDSrate);
    }var totalTDSarray = {
      item_type: TDStype,
      item_name: TDSname,
      amount: TDSrate,
    };postData.pricing_items.push(totalTDSarray);});
  /* total TDS */$(statementForm).find('.one_item_line.actual').each(function() {var thisLineItem = $(this);
    var lineItemType = $(this).attr('data-type');var itemUnit;if ($(this).find('[name="statement[item_custom_unit]"]').is(':visible')) {
      itemUnit = $(this).find('[name="statement[item_custom_unit]"]').val();
    } else {
      itemUnit = $(this).find('[name="statement[item_unit]"]').val();
    }var lineItemQuantity;if (lineItemType === 'time') {
      // divide data-tota-minutes by 60 to get decimal hour value
      lineItemQuantity = (thisLineItem.find('[name="statement[item_quantity]"]').attr('data-total-minutes') / 60);
    } else if (lineItemType === 'expense') {
      // quantity always 1 for expenses
      lineItemQuantity = 1;
    } else {
      lineItemQuantity = parseFloat($(this).find('[name="statement[item_quantity]"]').val());
    }var lineItem = {
      //item_id: $(this).attr('data-id'),
      line_item_type: lineItemType,
      line_item_description: $(this).find('[name="statement[item_name_description]"]').val(),
      line_item_quantity: lineItemQuantity,
      line_item_unit_price: lineItemType === 'expense' ? $(this).find('[name="statement[item_amount]"]').val() : parseFloat($(this).find('[name="statement[item_rate]"]').val()),
      line_item_unit: itemUnit,
      //item_total: $(this).find('[name="statement[item_amount]"]').val(),
      line_item_date: $(this).find('.tag.date .filename').attr('data-real-date'),
      pricing_items: [],
      object_links: {
        files: [],
        tags: [],
      },
    };/* item files */
    $(this).find('[data-file-id]').each(function() {
      if (!$(this).attr('data-file-id')) {
        return true;
      }
      lineItem.object_links.files.push($(this).attr('data-file-id'));
    });
    /* item files *//* item tags */
    $(this).find('.tag.classic').each(function() {
      lineItem.object_links.tags.push($(this).find('[data-tag-info="name"]').val());
    });
    /* item tags *//* item TDS */
    $(this).find('.tag.tds').each(function() {  var tdsType = $(this).attr('data-tag-type');  var pricingItem = {
        item_type: tdsType,
        item_name: $(this).find('[data-tag-info="name"]').val(),
        amount: $(this).find('[data-tag-info="rate"]').val(),
      };
      lineItem.pricing_items.push(pricingItem);});
    /* item TDS */postData.line_items.push(lineItem);});var postDataJSON = JSON.stringify(postData);console.log(postDataJSON);$.ajax({
    type: "POST",
    url: '/php/ajax_handler.php?endpoint=' + handlerEndpoint + '&action_type=' + handlerAction + '&object_id=' + dataObjectID,
    data: ({
      postArray: postDataJSON
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  /* remove loading */
      loadingItem.removeClass('loading');  if (data.success == 1) {/* if user converts estimate to invoice */
        if ($('[name="post_statement_creation_action"]').val() === 'mark_estimate_as_invoiced') {
          ajaxHandlerAction(null, 'mark-estimate-invoiced', $('[name="post_statement_creation_action_value"]').val());
        }
        /* if user converts estimate to invoice *//* if user converts tracker(s) to invoice */
        if ($('[name="post_statement_creation_action"]').val() === 'mark_trackers_as_billed') {
          ajaxHandlerAction(null, 'mark-trackers-billed', $('[name="post_statement_creation_action_value"]').val());
        }
        /* if user converts tracker(s) to invoice */if (handlerAction === 'create') {  if (submitAction === 'save_send') {
            redirectPath = '/' + redirectPathElement + '/' + data.message.statement_hash + '/send';
          } else {
            redirectPath = '/' + redirectPathElement + '/' + data.message.statement_hash;
          }  goToPage(redirectPath, redirectFile, redirectPage, redirectType, data.message.statement_hash, false, successMessage, null);} else if (handlerAction === 'edit') {  goToPage('/' + redirectPathElement + '/' + dataObjectID, redirectFile, redirectPage, redirectType, dataObjectID, false, successMessage, null);}
  } else {
        generalInfo('show', 'error', translateError(data.message));
      }
},
  });});/* SELECT ALL NONE */
$('body').on('click', '[data-trigger="select-all-none"]', function() {
  "use strict";if ($(this).attr('data-action') === 'select-all') {
    $('[data-select-all-none="true"]').prop('checked', true);
    $('[data-trigger="select-all-none"]').prop('checked', true);
  } else if ($(this).attr('data-action') === 'select-none') {
    $('[data-select-all-none="true"]').prop('checked', false);
    $('[data-trigger="select-all-none"]').prop('checked', false);
  } else {
    $('[data-select-all-none="true"]').prop('checked', $(this).prop("checked"));
  }markYellowChecked('tr');
  updateSelectedStatementsCount();
  updateCheckedItemsArray();});$('body').on('change', '[data-select-all-none="true"]', function() {
  "use strict";
  markYellowChecked('tr');
  updateSelectedStatementsCount();
  updateCheckedItemsArray();
});function markYellowChecked(parentToMark) {$('body').find('[data-select-all-none="true"]').each(function() {if ($(this).prop('checked')) {
      $(this).closest(parentToMark).addClass('selected');
    } else {
      $(this).closest(parentToMark).removeClass('selected');
    }});}function updateCheckedItemsArray() {var selectedItems = [];$('body').find('[data-select-all-none="true"]').each(function() {if ($(this).prop('checked')) {
      selectedItems.push($(this).attr('data-item-id'));
    }});$('[name="selected_items"]').val(JSON.stringify(selectedItems));var hrefStatementIDs = selectedItems.toString();if (currentPage === 'invoices' || currentPage === 'estimates' || currentPage === 'bills') {
    $('[data-action="insert_selected_items_array_href"]').attr('href', '/php/advanced_ajax_handler.php?&type=multi_statement_download&statement_ids=' + hrefStatementIDs);
  }}/* COUNT SELECTED ITEMS */
function countSelectedItems() {var count = 0;$('body').find('[data-select-all-none="true"]').each(function() {
    if ($(this).prop('checked')) {
      count++;
    }
  });return count;}/* DESELECT ALL */
function deselectAllSelectedItems() {
  $('body').find('[data-select-all-none="true"]').prop('checked', false);
  markYellowChecked('tr');
  updateSelectedStatementsCount();
  updateCheckedItemsArray();
}/* SHOW SELECTED ITEMS */
function updateSelectedStatementsCount() {var count = countSelectedItems();if (count > 0) {
    $('[data-meta="default"]').addClass('hidden');
    $('[data-meta="custom"]').removeClass('hidden');
    $('[data-meta="custom"] .dynamic').html(count);
    $('#options-strip .button').addClass('active');
  } else {
    $('[data-meta="custom"]').addClass('hidden');
    $('[data-meta="default"]').removeClass('hidden');
    $('#options-strip .button').removeClass('active');
  }}/* TIMER FOR TRACK TIME */
$('body').on('click', '.start-timer', function() {
  "use strict";var secondsToStartAt = $(this).closest('tr').find('td [data-timer="time"]').attr('data-timer-start');/* if timer is not running */
  if ($(this).attr('data-timer') !== 'on') {$(this).attr('data-timer', 'on');
    ajaxHandlerAction($(this), 'start-timer', null);/* if timer is running */
  } else {$(this).attr('data-timer', 'off');
    ajaxHandlerAction($(this), 'stop-timer', null);}});/* COPY TO CLIPBOARD */
$('body').on('click', '[data-clipboard="true"]', function() {
  "use strict";var container = $(this);container.html('Copied');var linkToCopy = container.attr('data-link');var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(linkToCopy).select();document.execCommand("copy");$temp.remove();setTimeout(function() {
    container.html('Copy Link');
  }, 1000);});/* FUNCTION TO INSERT TEXT AT CARET */
function insertAtCaret(areaId, text) {
  var txtarea = document.getElementById(areaId);
  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
    "ff" : (document.selection ? "ie" : false));
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    strPos = range.text.length;
  } else if (br == "ff") strPos = txtarea.selectionStart;var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    range.moveStart('character', strPos);
    range.moveEnd('character', 0);
    range.select();
  } else if (br == "ff") {
    txtarea.selectionStart = strPos;
    txtarea.selectionEnd = strPos;
    txtarea.focus();
  }
  txtarea.scrollTop = scrollPos;
}/* EDITOR PLACEHOLDERS */
$('body').on('click', '#desk.editor section.placeholders ul li', function() {
  'use strict';
  var textFill = '{{' + $(this).find('a').html() + '}}';insertAtCaret('editor_text', textFill);});/* SET BRANDING COLORS */
$('body').on('click', '[data-color-action]', function(event) {
  'use strict';
  event.preventDefault();var thisItem = $(this);
  var HEXinput;var colorAction = thisItem.attr('data-color-action'); /* "apply" or "revert" */
  var colorContext = thisItem.attr('data-context');// adjust object names to fit API 
  var APIObjectName;switch (colorContext) {case 'main_primary':
      APIObjectName = 'primary_color';
      break;case 'main_secondary':
      APIObjectName = 'secondary_color';
      break;case 'button_primary':
      APIObjectName = 'primary_button_color';
      break;case 'button_secondary':
      APIObjectName = 'secondary_button_color';
      break;}if (colorAction === 'revert') {HEXinput = thisItem.attr('data-default-color');} else {HEXinput = thisItem.closest('tr').find('input[name="hex_code"]').val();
    var validHEX = /^#[0-9A-F]{6}$/i.test('#' + HEXinput);if (!HEXinput || !validHEX) {
      thisItem.closest('tr').find('input[name="hex_code"]').addClass('error');
      return false;
    } else {
      thisItem.closest('tr').find('input[name="hex_code"]').removeClass('error');
    }}var postData;if (colorContext === 'main_primary') {
    postData = {
      primary_color: HEXinput,
    };
  } else if (colorContext === 'main_secondary') {
    postData = {
      secondary_color: HEXinput,
    };
  } else if (colorContext === 'button_primary') {
    postData = {
      primary_button_color: HEXinput,
    };
  } else if (colorContext === 'button_secondary') {
    postData = {
      secondary_button_color: HEXinput,
    };
  }var postDataJSON = JSON.stringify(postData);$.ajax({
    type: "POST",
    url: "/php/ajax_handler.php?endpoint=setting&action_type=edit",
    data: ({
      postArray: postDataJSON
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function() {
      //console.log(postDataJSON);
      $('[name="ccfg_' + colorContext + '"]').val(HEXinput);
      $('.ccfg_' + colorContext).css('background', '#' + HEXinput);
      thisItem.closest('tr').find('[data-refresh="hex_code"]').html('#' + HEXinput);
      thisItem.closest('tr').find('[data-refresh="preview"]').css('background', '#' + HEXinput);  if (colorAction === 'revert') {
        thisItem.closest('tr').find('input.jscolor').val(HEXinput);
      }}});});/* SWITCH PAYMENT METHOD CHECKOUT PAGE */
$('body').on('change', '[data-switch-payment-method]', function() {
  'use strict';var clickedPaymentMethod = $(this).attr('data-switch-payment-method');$(this).closest('.board').attr('data-payment-method', clickedPaymentMethod);});/* CHANGE PAYMENT FREQUENCY CHECKOUT 
$('body').on('change', '[name="payment_frequency"]', function() {
	'use strict';
	
	var paymentFrequency = $(this).attr('id');
	
	alert('AJAX: Change invoice payment frequency to ' + paymentFrequency);
	
});
*//* OFFLINE AUTOCOMPLETE SUGGESTIONS */
function openOfflineAutocomplete(container) {
  'use strict';var suggestions = $(container).attr('data-offline-autocomplete-suggestions');
  var autocompleteClass = $(container).attr('data-offline-autocomplete-class');if (suggestions && $(container).attr('data-offline-autocomplete-active') !== 'true') {var appendContent;appendContent = '<div class="offline_autocomplete ' + autocompleteClass + '"><ul>';var splitSuggestions = suggestions.split(',');$.each(splitSuggestions, function(number) {
      appendContent += '<li>' + splitSuggestions[number] + '</li>';
    });appendContent += '</ul></div>';$(appendContent).insertAfter($(container));$(container).attr('data-offline-autocomplete-active', 'true');}
}$('body').on('focus', 'input[data-offline-autocomplete="on"]', function() {
  'use strict';
  openOfflineAutocomplete($(this));
});$('body').on('keyup', 'input[data-offline-autocomplete="on"]', function() {
  'use strict';
  openOfflineAutocomplete($(this));
});function closeOfflineAutocomplete() {
  'use strict';
  $('.offline_autocomplete').remove();
  $('[data-offline-autocomplete-active="true"]').attr('data-offline-autocomplete-active', 'false');
}$(document).click(function(e) {
  'use strict';
  var target = e.target;if (!$(target).is('input[data-offline-autocomplete="on"]')) {
    closeOfflineAutocomplete();
  }});/* DROPDOWN NAVIGATION - should be merged with navigate dropdown functions */
var offlineAutocompleteNavIndex = -1;$('html').on('keydown', 'body', function(event) {
  "use strict";if ($('input[data-offline-autocomplete-active="true"]').length) {var autocompleteInput = $('input[data-offline-autocomplete-active="true"]');
    var autocompleteMenu = $(autocompleteInput).next('.offline_autocomplete');if (event.keyCode === 40) {
      event.preventDefault();
      navigateOfflineAutocomplete(1, $(autocompleteInput));
    }if (event.keyCode === 38) {
      event.preventDefault();
      navigateOfflineAutocomplete(-1, $(autocompleteInput));
    }if (event.keyCode === 13) {
      event.preventDefault();
      autocompleteMenu.find('li').eq(offlineAutocompleteNavIndex)[0].click();
      closeOfflineAutocomplete();
      $('input[data-offline-autocomplete="on"]').blur();
    }if (event.keyCode === 27) {
      event.preventDefault();
      closeOfflineAutocomplete();
      $('input[data-offline-autocomplete="on"]').blur();
    }}});function navigateOfflineAutocomplete(diff, autocompleteInput) {
  "use strict";var autocompleteMenu = autocompleteInput.next('.offline_autocomplete');
  var autocompleteMenuLinks = autocompleteMenu.find('li');offlineAutocompleteNavIndex += diff;if (offlineAutocompleteNavIndex >= autocompleteMenuLinks.length) {
    offlineAutocompleteNavIndex = 0;
  }if (offlineAutocompleteNavIndex < 0) {
    offlineAutocompleteNavIndex = autocompleteMenuLinks.length - 1;
  }autocompleteMenuLinks.removeClass('selected').eq(offlineAutocompleteNavIndex).addClass('selected');
}
/* STATEMENT SETTINGS - TO BCC EMAIL ADDRESSES */
$('body').on('click', '.email_tags ul li', function() {
  'use strict';var autocompleteValue = $(this).html().replace('(', '<').replace(')', '>');
  var inputContainer = $(this).closest('section').find('input[data-offline-autocomplete="on"]');
  var inputValue = inputContainer.val();addEmailToInput(inputContainer, autocompleteValue);});/* ADD EMAIL TO INPUT 
TODO:
- if only one email address make it email@address.com <email@address.com>	
*/
function addEmailToInput(inputContainer, passedValue) {
  "use strict";var maxEmails = 10;//var wordCountRegex = /\s+/gi;var space = inputContainer.val() ? ', ' : '';
  var inputValue = (inputContainer.val().replace('<', '').replace('>', '')) + space + passedValue;var containedValues = [];if (inputValue) {var separateElements = inputValue.split(',');
    var formattedInputValue = '';$.each(separateElements, function(number) {  var splitSeparateElement = separateElements[number].split(" ");  // new count, UNUSED
      //var newCountSplitSeparateElements = (separateElements[number].trim().replace(wordCountRegex, ' ').split(' ')).length;
      //console.log('NEW count says: ' + newCountSplitSeparateElements);  // old count
      var countSplitSeparateElements = splitSeparateElement.length;
      //console.log('OLD count says: ' + newCountSplitSeparateElements);  var formattedSplitSeparateElement = '';  $.each(splitSeparateElement, function(number) {//console.log(splitSeparateElement[number]);if (isValidEmailAddress(splitSeparateElement[number])) {  //if (newCountSplitSeparateElements === 1) {
          //splitSeparateElement[number] = splitSeparateElement[number] + ' <'+ splitSeparateElement[number] + '>';
          //} else {
          splitSeparateElement[number] = '<' + splitSeparateElement[number] + '>';
          //}}if (countSplitSeparateElements < 2) {
          formattedSplitSeparateElement += splitSeparateElement[number];
        } else {
          formattedSplitSeparateElement += splitSeparateElement[number] + ' ';
        }formattedSplitSeparateElement = formattedSplitSeparateElement.replace('  ', ' ').replace(' ,', ',');  });  // check if already MAX email addresses specified
      if (containedValues.length < 10) {//console.log('Max email limit not reached');// check if there are ANY valid emails in string
        if (checkIfEmailInString(separateElements[number])) {  //console.log('At least ONE valid email');  var filteredEmailAddress = extractEmails(separateElements[number]).join(' ');
          var numberOfEmailsContained = filteredEmailAddress.split(' ').length;  // check if there is only ONE valid email contained
          if (numberOfEmailsContained === 1) {    //console.log('Only ONE valid email');
            //console.log('filteredEmailAddress is ' + filteredEmailAddress);
            //console.log('containedValues is ' + containedValues);
            //console.log('inputValue is ' + inputValue);					    // check if this ONE contained email already exists in containedValues array
            if ($.inArray(filteredEmailAddress, containedValues) == '-1') {      //console.log('No Dupe! Searching for ' + filteredEmailAddress + ' in ' + containedValues);      formattedInputValue += formattedSplitSeparateElement + ',';
              formattedInputValue = formattedInputValue.replace('  ', ' ').replace(' ,', ',');      // add to containedValues array
              containedValues.push(filteredEmailAddress);    } else {
              //console.log('Dupe! Searching for ' + filteredEmailAddress + ' in ' + containedValues);
            }  } else {
            //console.log('Error: More than ONE email');
          }} else {
          //console.log('Error: No valid email found in string');
        }  } else {
        //console.log('Error: Max emails reached');	
      }});$(inputContainer).val(formattedInputValue.replace('  ', ' ').replace(' ,', ','));
    $(inputContainer).attr('data-contained-values', containedValues);}}/* CALL ADD EMAIL FUNCTION ON BLUR */
$('body').on('blur', 'section.editor.email input', function() {
  'use strict';if (!$(clickedObject).parents().is('.offline_autocomplete')) {
    addEmailToInput($(this), '');
  }});/* EMPTY INPUT ON BLUR */
$('body').on('blur', '[data-empty-on-blur]', function(event) {
  'use strict';var string = $(this).attr('data-empty-on-blur');// FYI: variable "clickedObject" is global, defined at the top
  if (!$(this).val() && !$(clickedObject).parents().is('.offline_autocomplete')) {
    $(this).val(string);
  }});/* PUBLIC STATEMENT - MAKE PAYMENT - SWITCH ONPAGE PAYMENT METHODS */
$('body').on('click', 'a[data-onpage-payment]', function() {
  'use strict';var paymentType = $(this).attr('data-onpage-payment');// reset
  $(this).closest('.board').find('div[data-onpage-payment]').hide();if (paymentType == 'reset') {$(this).closest('.board').find('ul.statement_payment_methods a').removeClass('selected');
    $(this).closest('.board').find('ul.statement_payment_methods a').show();$(this).closest('.board').find('.payments_made').show();} else {$(this).addClass('selected');$(this).closest('.board').find('ul.statement_payment_methods a').hide();
    $(this).show();$(this).closest('.board').find('div[data-onpage-payment="' + paymentType + '"]').show();$(this).closest('.board').find('.payments_made').hide();
}});/* PAYMENT INTEGRATIONS - ENABLE DISABLE SECTIONS */
$('body').on('change', '#desk.payment_integrations input[type="checkbox"]', function() {$(this).closest('div.board').find('[data-payment-integration="details"]').toggle();if ($(this).prop('checked')) {
    $(this).closest('div.board').find('[data-value-toggle="true"]').val(1);
  } else {
    $(this).closest('div.board').find('[data-value-toggle="true"]').val(0);
  }});/* EXTERNAL FUNCTION TO SAVE ITEM EXPENSE MILEAGE TIME */
function saveCategory(categoryType, categoryName, categoryRate) {
  'use strict';var dataHandlerEndpoint;switch (categoryType) {case 'time':
      dataHandlerEndpoint = 'task';
      break;case 'expense':
      dataHandlerEndpoint = 'expense';
      break;case 'mileage':
      dataHandlerEndpoint = 'trip';
      break;case 'tag':
      dataHandlerEndpoint = 'tag';
      break;case 'tax':
      dataHandlerEndpoint = 'tax';
      break;case 'discount':
      dataHandlerEndpoint = 'discount';
      break;case 'shipping':
      dataHandlerEndpoint = 'shipping';
      break;}var postData = {
    name: categoryName,
    rate: categoryRate == 0 ? '' : categoryRate,
  };var postDataJSON = JSON.stringify(postData);
  //console.log(postDataJSON);	$.ajax({
    type: "POST",
    url: '/php/ajax_handler.php?endpoint=' + dataHandlerEndpoint + '&action_type=create',
    data: ({
      postArray: postDataJSON
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {
      //console.log('item added');
    }});}/* GRAPHICS - REMOVE ICON LOGO */
$('body').on('click', '[data-action="remove_image"]', function() {
  'use strict';var defaultImage = $(this).closest('.upload_branding').find('input[type="hidden"]').attr('data-default');$(this).closest('.upload_branding').find('img').attr('src', defaultImage);$(this).closest('.upload_branding').find('input[type="hidden"]').val(defaultImage);
  $(this).hide();});/* REFRESH TRACK ENTRY TIME */
function refreshTrackTime() {$.ajax({
    type: 'GET',
    url: '/php/ajax_handler.php?action_type=get&endpoint=tracker',
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  $.each(data, function(number) {var trackerID = data[number].tracker_id;
        var trackerStatus = data[number].tracker_status;
        var trackerAmountMinutes = data[number].tracker_amount;if (trackerStatus === 1) {  var trackerAmountFormattedArray = MinsToHrsMins(trackerAmountMinutes);  $('[data-item-id="' + trackerID + '"]').closest('tr').find('.tracker_amount').html(trackerAmountFormattedArray[0] + ':' + trackerAmountFormattedArray[1]);} else {
          return true;
        }  });}});}/* SELECT TEXT ON ONE CLICK */
function selectText(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select();
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
  }
}/* PUBLIC PAYMENT AJAX FUNCTION - optimise! - move to scripts.public */
$('body').on('click', '[data-make-payment="true"]', function() {var paymentType = $(this).attr('data-payment-type') === 'credit_card' ? 'credit_card' : 'not_credit_card';var that = $(this);$(this).addClass('loading');
  $(this).find('li').addClass('loading');var paymentPostData;var dataProviderID;
  var paymentCurrency = $('[name="payment_currency"]').val();
  var paymentAmount = $('[name="payment_amount"]').val();
  var statementHash = $('[name="current_id"]').val();if (paymentType === 'credit_card') {$('[form="' + $(this).attr('id') + '"]').addClass('loading');/* credit card payment */
    dataProviderID = $('[data-onpage-payment="credit_card"]').attr('data-provider-id');var paymentPostDataRaw = {
      gateway: dataProviderID,
      currency: paymentCurrency,
      amount: paymentAmount,
      statement_hash: statementHash,
      customer_ip_address: $(this).closest('form').find('[name="public_invoice_payment[customer_ip]"]').val(),
      customer_name: $(this).closest('form').find('[name="public_invoice_payment[customer_first_name]"]').val() + ' ' + $(this).closest('form').find('[name="public_invoice_payment[customer_last_name]"]').val(),
      customer_email: $(this).closest('form').find('[name="public_invoice_payment[customer_email_address]"]').val(),
      customer_address: $(this).closest('form').find('[name="public_invoice_payment[customer_address]"]').val(),
      customer_city: $(this).closest('form').find('[name="public_invoice_payment[customer_city]"]').val(),
      customer_state: $(this).closest('form').find('[name="public_invoice_payment[customer_state]"]').val(),
      customer_postal_code: $(this).closest('form').find('[name="public_invoice_payment[customer_postcode]"]').val(),
      customer_country: $(this).closest('form').find('[name="public_invoice_payment[customer_country_code]"]').val(),
      cc_number: $(this).closest('form').find('[name="public_invoice_payment[credit_card_number]"]').val(),
      cc_expiry: $(this).closest('form').find('[name="public_invoice_payment[credit_card_expiration_month]"]').val() + '/' + $(this).closest('form').find('[name="public_invoice_payment[credit_card_expiration_year]"]').val(),
      cc_cvv: $(this).closest('form').find('[name="public_invoice_payment[credit_card_cvv]"]').val(),
      cc_name: $(this).closest('form').find('[name="public_invoice_payment[credit_card_cardholder]"]').val(),
    };var paymentPostData = JSON.stringify(paymentPostDataRaw);
    /* credit card payment */
  } else {
    /* 3rd party payment */
    dataProviderID = $(this).attr('data-provider-id');
    paymentPostData = '{"gateway":"' + dataProviderID + '", "currency":"' + paymentCurrency + '", "amount":"' + paymentAmount + '", "statement_hash":"' + statementHash + '"}';
    /* 3rd party payment */
  }console.log(paymentPostData);$.ajax({
    type: 'POST',
    url: '/php/ajax_handler.php?endpoint=invoicepayment&action_type=create',
    data: ({
      postArray: paymentPostData
    }),
    dataType: "json",
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      //alert(textStatus + ', ' + errorThrown);
    },
    success: function(data) {  if (data.success == 1) {that.removeClass('loading');
        that.find('li').removeClass('loading');if (data.message.redirect_url) {
          window.location.href = data.message.redirect_url;
          return false;
        } else if (paymentType === 'credit_card') {
          window.location.href = window.location.href + '&paymentcomplete=1';
          return false;
        }  } else {
        that.removeClass('loading');
        that.find('li').removeClass('loading');
        generalInfo('show', 'error', translateError(data.message));
      }}});});/* INVOICEABLE ANNOUNCEMENT */
$('body').on('click', '[data-action="toggle_announcement"]', function() {
  $('.announcement_content').slideToggle(100);
  generalInfo('hide');
  $('.announcement_content .error').removeClass('error');if ($(this).attr('data-finished') !== 'true') {
    $('.announcement_header a').toggleText('Start Import', 'Import Later');
  }
});/* CHECK IF INTERNET EXPLORER */
function msieversion() {var ua = window.navigator.userAgent;
  var msie = ua.indexOf("MSIE ");if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer, return version number
  {
    return true;
  } else // If another browser, return 0
  {
    return false;
  }return false;
}/* GENERATE REPORTS */
$('body').on('submit', '[data-action="generate_report"]', function(event) {
  event.preventDefault();var redirectParams;
  var redirectPath;$('button[form="generate_report"]').addClass('loading');var reportType = $(this).find('[name="report[type]"]').val();
  var reportPeriod = $(this).find('.form_row.custom_period').is(':visible') ? 'custom' : $(this).find('[name="report[period]"]').val();
  var reportPeriodFrom = $(this).find('[name="report[period_from]"]').attr('data-real-date');
  var reportPeriodTo = $(this).find('[name="report[period_to]"]').attr('data-real-date');
  var reportStatementStatus = $(this).find('[name="report[statement_status]"]').val();
  var reportCurrency = $(this).find('[name="report[currency]"]').val();
  var reportClientType = $(this).find('[name="report[client_type]"]').val();
  var reportSingleClient = $(this).find('[name="client_id"]').val();redirectParams = '&report_type=' + reportType;
  redirectPath = '/reports/' + reportType;if (reportPeriod === 'custom') {
    redirectParams += '&report_period=custom&report_period_from=' + reportPeriodFrom + '&report_period_to=' + reportPeriodTo;
    redirectPath += '/' + reportPeriodFrom + '/' + reportPeriodTo;
  } else {
    redirectParams += '&report_period=' + reportPeriod;
    redirectPath += '/' + reportPeriod;
  }if (reportCurrency === 'all_currencies') {
    redirectParams += '&report_currency=all_currencies';
    redirectPath += '/all_currencies';
  } else {
    redirectParams += '&report_currency=' + reportCurrency;
    redirectPath += '/' + (reportCurrency.toUpperCase());
  }if (reportStatementStatus === 'all_statuses') {
    redirectParams += '&report_statement_status=all_statuses';
    redirectPath += '/all_statuses';
  } else {
    redirectParams += '&report_statement_status=' + reportStatementStatus;
    redirectPath += '/' + reportStatementStatus;
  }if (reportClientType === 'custom' && reportSingleClient) {
    redirectParams += '&report_client_type=single_client&report_client_id=' + reportSingleClient;
    redirectPath += '/' + reportSingleClient;
  } else {
    redirectParams += '&report_client_type=all_connections';
    redirectPath += '/all_connections';
  }//alert('path: '+redirectPath+'<br> Params: '+redirectParams);goToPage(redirectPath, 'reports', 'reports', null, null, false, null, redirectParams);
  return false;});$('body').on('change', '[name="report[type]"]', function() {var reportType = $(this).val();$('.form_row').not('[data-action-target="on-select-custom"]').css('display', 'inline-block');
  $('.line_breaks').show();switch (reportType) {case 'payments':
      $('.status_selector').hide();
      break;case 'invoices':
      $('[data-report-type]').hide();
      $('[data-report-type="invoices"]').show();
      break;case 'bills':
      $('[data-report-type]').hide();
      $('[data-report-type="bills"]').show();
      break;case 'estimates':
      $('[data-report-type]').hide();
      $('[data-report-type="estimates"]').show();
      break;case 'ar':
      $('.currency_selector').hide();
      $('.period_selector').hide();
      $('.custom_period').hide();
      $('.status_selector').hide();
      $('.client_selector').hide();
      $('.single_client_selector').hide();
      $('.line_breaks').hide();
      break;case 'ap':
      $('.currency_selector').hide();
      $('.period_selector').hide();
      $('.custom_period').hide();
      $('.status_selector').hide();
      $('.client_selector').hide();
      $('.single_client_selector').hide();
      $('.line_breaks').hide();
      break;
}});$('body').on('change', '[name="client_selector"]', function() {// currently only optimised for statement listvar originalPath;
  var defaultStatus;switch (currentPage) {case 'invoices':
      originalPath = '/invoices/list';
      defaultStatus = $('[name="statement_list_default_tab_invoices"]').val();
      break;case 'recinvoices':
      originalPath = '/invoices/recurring/list';
      defaultStatus = 'all';
      break;case 'bills':
      originalPath = '/bills/list';
      defaultStatus = $('[name="statement_list_default_tab_bills"]').val();
      break;case 'recbills':
      originalPath = '/bills/recurring/list';
      defaultStatus = 'all';
      break;case 'estimates':
      originalPath = '/estimates/list';
      defaultStatus = $('[name="statement_list_default_tab_estimates"]').val();
      break;case 'time_entries':
      originalPath = '/track/time';
      defaultStatus = 'unbilled';
      break;case 'expense_entries':
      originalPath = '/track/expenses';
      defaultStatus = 'unbilled';
      break;case 'mileage_entries':
      originalPath = '/track/mileage';
      defaultStatus = 'unbilled';
      break;}var status = $('[name="additional_parameter[status]"]').val();if (!status) {
    status = defaultStatus;
  }var targetPath = originalPath + '/' + status;
  var targetAdditionalParams = '&status=' + status;if ($(this).val() !== 'all_clients') {
    targetPath += '/client:' + $(this).val();
    targetAdditionalParams += '&custom=client:' + $(this).val();
  }goToPage(targetPath, currentFile, currentPage, currentType, currentID, false, null, targetAdditionalParams);});
