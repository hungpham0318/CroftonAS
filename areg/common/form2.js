(function($, undefined) {
    var isFired = false;
    var oldReady = jQuery.fn.ready;
    $(function() {
        isFired = true;
        $(document).ready();
    });
    jQuery.fn.ready = function(fn) {
        if(fn === undefined) {
            $(document).trigger('_is_ready');
            return;
        }
        if(isFired) {
            window.setTimeout(fn, 1);
        }
        $(document).bind('_is_ready', fn);
    };
})(jQuery);

$(function() {

$("#dname").change(function(e) {
var dname = $(this).val();
$.ajax({
url: "../common/getDealer2.php",	
dataType: 'JSON',	
type: 'POST',
//async : false,  commenting this takes away the deprecation warning in the debug console
data: {dname : dname},
success : function(data) {
answer = JSON.parse(data);
	
$('#inpFiveMilNum').val(answer.dnumber);
$('#inpSDContact').val(answer.dcontact);
$('#inpDPhone').val(answer.dsdphone);
$('#did').val(answer.did);
} //END success fn
}); //END $.ajax
});//END dropdown change event
});	

window.setTimeout(function() {$(document).ready();}, 2000);

$(function() {
$("#registration").submit(function(e) {
removeFeedback();
var errors = validateForm();
if (errors == "") {
return true;
} else {
provideFeedback(errors);
e.preventDefault();
return false;
}

     $("#btnSubmit").on('click', function (event) {  
           event.preventDefault();
           var el = $(this);
           el.prop('disabled', true);
           setTimeout(function(){el.prop('disabled', false); }, 3000);
     });

});
function validateForm() {
var errorFields = new Array();
//Check required fields have something in them
if ($('#dname').val() == "") {
errorFields.push('dname');
}

if ($('#inpSDContact').val() == "") {
errorFields.push('inpSDContact');
}
if ($('#inpDPhone').val() == "") {
errorFields.push('inpDPhone');
}
if ($('#inpSaleDate').val() == "") {
errorFields.push('inpSaleDate');
}
if ($('#inpYourName').val() == "") {
errorFields.push('inpYourName');
}
if ($('#inpYourPhone').val() == "") {
errorFields.push('inpYourPhone');
}
if ($('#inpYourEmail').val() == "") {
errorFields.push('inpYourEmail');
}
if ( ($('#txtVIN1').val() !== "") && ($('#txtPrice1').val() == "") ){
errorFields.push('txtPrice1');
}
if ( ($('#txtVIN2').val() !== "") && ($('#txtPrice2').val() == "") ){
errorFields.push('txtPrice2');
}
if ( ($('#txtVIN3').val() !== "") && ($('#txtPrice3').val() == "") ){
errorFields.push('txtPrice3');
}
if ( ($('#txtVIN4').val() !== "") && ($('#txtPrice4').val() == "") ){
errorFields.push('txtPrice4');
}
if ( ($('#txtVIN5').val() !== "") && ($('#txtPrice5').val() == "") ){
errorFields.push('txtPrice5');
}
if ( ($('#txtVIN6').val() !== "") && ($('#txtPrice6').val() == "") ){
errorFields.push('txtPrice6');
}
if ( ($('#txtVIN7').val() !== "") && ($('#txtPrice7').val() == "") ){
errorFields.push('txtPrice7');
}
if ( ($('#txtVIN8').val() !== "") && ($('#txtPrice8').val() == "") ){
errorFields.push('txtPrice8');
}
if ( ($('#txtVIN9').val() !== "") && ($('#txtPrice9').val() == "") ){
errorFields.push('txtPrice9');
}
if ( ($('#txtVIN10').val() !== "") && ($('#txtPrice10').val() == "") ){
errorFields.push('txtPrice10');
}
return errorFields;
} //end function validateForm
function provideFeedback(incomingErrors) {
for (var i = 0; i < incomingErrors.length; i++)
{
$("#" + incomingErrors[i]).
addClass("errorClass");
$("#" + incomingErrors[i] + "Error").
removeClass("errorFeedback");
}
$("#errorDiv").html("Errors Encountered!");
}
function removeFeedback() {
$("#errorDiv").html("");
$('input').each(function() {
$(this).removeClass("errorClass");
});
$('select').each(function() {
$(this).removeClass("errorClass");
});
$('.errorSpan').each(function() {
$(this).addClass("errorFeedback");
});
}
});