<?php session_start();
$title="frankenstein";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{}
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];

$qmdid=$_GET['did'];
$qnumitems=$_GET['numitems'];
?>


<html>
<?php //include "../../sales/stylehead-begin.html";
?>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.2.0/css/autoFill.dataTables.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/css/editor.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Select2-1.6.2/editor.select2.min.css"/>

<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Selectize-1.6.2/editor.selectize.min.css"/>
<link rel="stylesheet" type="text/css" href="/Editor16/FieldType-Title-1.6.2/editor.title.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.0.0/css/rowGroup.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css"/>
	
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
    /* For mobile phones: */
body{font-size: 16px;
font-family: 'Open Sans', sans-serif!important;}
.label-input {
width: 20%;
text-align:left;
height: 1.5em;
vertical-align:middle;
display:inline-block;
line-height:1em;
font-size:1em;
font-family: 'Open Sans', sans-serif!important;
}
tbody{border-color:#ffffff!important;}
input {  
padding: 5px 10px;
height: 1.5em;
width:25em;
/*margin : 0 auto;*/
border: none;
/* border: 1px solid #660000;*/
border-radius : 5px;
/*box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #ccc;*/
display:inline-block;
margin : 0 auto;
  font-size:1em;
  line-height:1em;
   font-family: 'Open Sans', sans-serif!important;

}
fieldset { 
    display: block;
    width:45%;
    margin-left: 1%;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: .5em;
    padding-right: 0.75em;
 /*   border:none!important;
    position: absolute;
    left: 10px;
    top: 6.3em;*/
    font-size:1em;
    line-height:1em;
}
#myTable input{
font-size:14px;
font-weight:500;
font-family:'Open Sans', sans-serif;
box-shadow: none;
line-height: 1.4em;
height:1.4em;

}
#myTable thead tr{
border-top:1px solid #000000!important;
padding:10px;
border-bottom:1px solid #000000!important;
border-left:none!important;
text-transform:uppercase!important;
}
#myTable {/*
position:absolute;
left:2em;
top:28em;*/
border-collapse:collapse;
border-left:none!important;
}
#myTable tbody{border-left: none!important;border-right:none!important;}
#myTable td{
border-right:1px solid #000000;
border-left:none!important;
text-transform:uppercase!important;
}
#myTable tr{border-top:1px solid #000000;border-left:none!important;border-right:none!important;
}
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
.btn{
  display: inline-block;
  text-align: center;
  text-decoration: none;
  letter-spacing: .02em;
  font-weight: 500; font-size: 14px;
  color: #ffffff;
  background-color: #660000;
  border-radius: .18em;
  margin-bottom: .1em;
  transition: .3s all ease-in-out;
  padding-left:1px; 
  padding-right: 1px;
  font-family:'Open Sans'; 
  margin-top:1px;
  margin-left:1px;
  margin-right:1px;
  box-shadow: 0 1px #ecf0f1, 0 1px 2px 1px rgba(236, 240, 241, .7) inset ;
/*  box-shadow: 0 0.1em #660000, 0 0.08em .08em rgba(236, 240, 241, .7)inset ;
  min-width: 80px;
  max-width:140px;*/
	font-size: .8em;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	line-height: .8em;
/*background-color: #dec9a5;*/
    border-color: #440000;
}
.btn:active{
box-shadow: 0 0.1em #ecf0f1, 0 0.08em .8em rgba(236, 240, 241, .7) inset;
background-color:#dec9a5;
transition: .3s all ease-in-out;
}
.btn-group>.btn:active{
  z-index: 2; 66-5.5=60.5
  background-color:#660000;
  transition: .3s all ease-in-out;
  border-color: #ffffff;
}
.btn-group-vertical>.btn:active{
  z-index: 2; 
  background-color:#dec9a5;
  transition: .3s all ease-in-out;
  border-color: #ffffff;
}
.btn-group-vertical>.btn.active {
  z-index: 2; 
  background-color:#dec9a5;
  transition: .3s all ease-in-out;
  border-color: #ffffff;
}
.btn-group>.btn:hover{
     z-index: 2; 
background-color:#990000;
transition: .3s all ease-in-out;
border-color: #cc9966;
}
.btn-group-vertical>.btn:hover{
  z-index: 2; 
  /*background-color:#dec9a5;*/
  background-color:#990000;
  transition: .3s all ease-in-out;
  border-color: #ffffff;
}
.btn-group>.btn:focus{
  z-index: 2; 
/* to prevent 'open tab in new window' from breaking the background color */
  background-color:#660000;
  transition: .3s all ease-in-out;
  border-color: #801323;
}
.btn-current{
  color: #ffffff;
    background-color: #990000;
 transition: .2s all ease-in-out;
border-color:#660000;
/*
border-color:#cc9966;
    background-color: #cc9966;
    color: #660000;
    transition: .2s all ease-in-out;
*/
 box-shadow: 0 0.2em #ecf0f1, 0 .12em .25em .12em rgba(236, 240, 241, .8) inset ;
}
.btn-current a:link{
border-color: #660000;
}
.btn-primary a:link{
border-color: #660000;
}
.btn-primary:active{
background-color: #660000;
}
.btn i{
padding-right: 1em;
}
.btn:hover{
  color: #ffffff;
  background-color: #990000;
  box-shadow: 0 0.2em #ffffff, 0 .12em .25em .12em rgba(236, 240, 241, .8) inset ;
/*  background: #f92838;
     border-color: #dec9a5;
    transition: .2s all ease-in-out; */
}
.btn-group{
 border-radius: .3em!important;
 min-width:70px;
 max-width:140px;
}
.btn-small{
    font-size: .8em;
    padding: .1em .2em;
}
.btn-medium{
    font-size: .9em;
    padding: .2em .4em;
}
.btn-large{
    font-size: 1em;
    padding: .4em .8em;
transition: .2s all ease-in-out;
}
div.DTED.DTED_Envelope_Wrapper
 {
  
    width: 100%!IMPORTANT;
    margin-left: -50%!important;}
 div.DTED_Lightbox_Content {
   margin-left:7%;
    width: 86%;
}    
div.DTE_Body div.DTE_Body_Content div.DTE_Field {
  
    box-sizing: border-box;
}
.dt-button{font-size:.6em!important;}
.dt-button.buttons-columnVisibility{
background-color:#440000!important;
}
.dt-button.buttons-columnVisibility.active{
background-color:#990000!important;
}
.dt-button.buttons-columnVisibility:hover{
background-color:#660000!important;
opacity:.5!important;
}
div.dt-button-collection a.dt-button.active:not(.disabled) {
 background-color: #990000;
  opacity: 1;}
div.DTE_Body div.DTE_Form_Content {
    display:flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.DTE_Label{
font-size:.7em!important

}

.DTE_Field {
width:20em!important;
white-space: nowrap;
margin:1px;
float:left;
text-transform:uppercase;}

div.DTED_Lightbox_Wrapper {
    left: 1em;
    right: 1em;
    margin: 0 auto;
    width: 99%;
overflow-x: hidden ;
overflow-y: auto;
}
#customForm {
    display: flex;
    flex-flow: row wrap;
display: -webkit-flex;
    display: flex;
    width: 100%;
  -webkit-align-content: center;
    align-content: center;
    background-color: white;
    margin:0 auto;
    padding: .2em;  
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
text-transform:uppercase;
}
#customForm input {
    min-width:15em;
  max-width:15em;
font-size:1em;

text-transform:uppercase;
}
#customForm.hr input text {
    width:15em;
 min-width:15em;
  max-width:15em;


text-transform:uppercase;
}
 #customForm.hr select {
 min-width:15em;
  max-width:15em;
height:2.3em;
text-transform:uppercase;
font-size:1em!important;
}
  #customForm select {
    width:15em;
 min-width:15em;
  max-width:15em;
height:2.3em;
font-size:1em!important;
}
#customForm fieldset {
    flex: 1;
    border: 1px solid #aaa;
    margin: 0.2em;

text-transform:uppercase;
min-width: 21.5em!important;
}
 
#customForm fieldset legend {
    padding: .2em .2em;
    border: 1px solid #aaa;
    font-weight: bold;




margin:1px;}
}
 #customForm fieldset legend.inside {
    padding: 5px 20px;
    border: 1px solid #aaa;
    font-weight: bold;
}
 
#customForm fieldset.name {
    flex: 1 100%;
margin:0 auto;


}


#customForm fieldset.office {
    flex: 2 ;


}
#customForm fieldset.hr {
    flex: 2  ;
  
    float:left;
}
#customForm fieldset.inside {
    flex: 2 ;
   
    float:left;
}
 
#customForm fieldset.name legend {
    background: #660000;
color:#ffffff;
}
 
#customForm fieldset.office legend {
    background: #660000;
color:#ffffff;
}
 
#customForm fieldset.hr legend {
    background: #660000;
color:#ffffff;
}
 
#customForm div.DTE_Field {
 min-width:20em;
  max-width:20em;
    padding: .2em;
}
.sorting {padding:0;}
#myTable th, td{padding:0!important;}
</style>
	<link rel="stylesheet" type="text/css" href="/admin/worldview/css/snow-nav-admin.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<?php// include "../../sales/stylehead-end.html";?>
</head>

<body>
	

<?php 
include "../../worldview/css/snow-admin-nav.html";?>
<!--<div id = "btncreate"><button class="dt-button" style = "position: absolute;left: 12em;top: 39em;" title="When you create a new row, or change values in the row, the totals also need to be updated on this form...for a little while...until the juice is worth the squeeze, anyway" onclick="myCreateFunction()">Create row</button></div>-->

<div id="customForm">
                        <fieldset class="hr">
                            <legend>Name</legend>
                                                                         
                            
                           
<editor-field name="ic_date"></editor-field>
<editor-field name="ic_maid"></editor-field>
                            <editor-field name="ic_stock"></editor-field>
                            <editor-field name="ic_note"></editor-field>
                        
                            
                          
                            <editor-field name="ic_solddate"></editor-field>
                             </fieldset>
                            <fieldset class="hr">
                            <legend>Name</legend>
                             <editor-field name="ic_id"></editor-field>
                              <editor-field name="ic_description"></editor-field>
                              <editor-field name="ic_ratedesc"></editor-field>
                            <editor-field name="ic_qty"></editor-field>
                            <editor-field name="ic_rate"></editor-field>
                            <editor-field name="ic_amount"></editor-field>
                            
                            
                            
                          
                           </fieldset></div>

<?php
include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM test_invoices_temp WHERE idid = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($resultit === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 38 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}
else {//echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultit as $row ) {
$iid=$row['iid'];
$idate = date("Y-m-d");
$itotal= money_format('%i', $row['itotal']);
$itotal= $row['itotal'];
$ipdfurl=$row['ipdfurl'];
$iaid=$row['iaid'];
$idid=$row['idid'];
$idname=$row['idname'];
$idattn=$row['idattn'];
$idaddress=$row['idaddress'];
$idcitystatezip=$row['idcitystatezip'];
$idinvoiceemail=$row['idinvoiceemail'];
$iclosed =$row['iclosed'];
}}
   ?>

<br /><table id ="maintable" style = "width:90%;margin-left:8%"><thead><tr><br /><th style = "width:48%!important;" ></th><th style = "width:48%!important;" ></th></tr></thead>
<tbody><tr><td style="vertical-align:top;"><form id="invcorrect" method="post" action="frankenpreviewpost.php?did=<?php echo $qmdid;?>" >
<img src = "invimage.png" style = "margin-left: -3em;width:95%;"><br />
<label class="label-input" style = "position: relative;left:33em;top: -2.6em;width:2em;">Date:</label><br /> <input name ="idate" value = "<?php echo $idate;?>" type="date" style = "padding:0px!important; margin:0px!important; position: relative;left:36em;top:-4.6em!important;height:2em; width:9em!important;"><br />
<label class="label-input" style = "position: relative;left: 18em;top: -3.3em;">Invoice #:</label><input name ="iid" value = "<?php echo $iid;?>" type="text" style = "width: 4em!important;position: relative;left: 14em;top: -3.4em;" readonly><br />
<label class="label-input" style = "text-align:left;" >TO:  </label><br />
<input name ="idname" value = "<?php echo $idname;?>" type="text" style = ""><br />
<input name ="idattn" value = "<?php echo $idattn;?>" type="text" style = "/*position: absolute;left:3em;top: 18em;*/"  placeholder="Attn:"><br />
<input name ="idaddress" value = "<?php echo $idaddress;?>" type="text" style = "/*position: absolute;left: 3em;top: 20em;*/"><br />
<input name ="idcitystatezip" value = "<?php echo $idcitystatezip;?>" type="text" style = "/*position: absolute;left: 3em;top: 22em;*/"><br /><br /><br />
<div style = "width:80%"><table id="myTable" style ="width:100%;border: 1px solid #000000;top:50em;font-size:.8em;">
<thead><tr><th></th><th>Description</th><th></th><th>Qty</th><th>Rate</th><th>Amount</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr></thead>

</table><br>




<label class="label-input" style = "/*position: absolute;left:32em;top:50em;*/">Invoice Total</label> <input name ="itotal"  value = "<?php echo $itotal;?>" type="amount" style = "width: 5em;/*position: absolute;left: 40em;top: 50em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 48em;*/">Invoice Link</label><input name ="ipdfurl"  value = "<?php echo $ipdfurl;?>" type="url" style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 51em;*/">Email to:</label> <input name ="idinvoiceemail"  value = "<?php echo $idinvoiceemail;?>" type="text"  style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top:54em;*/">Invoice Paid</label><input name ="iclosed"  value = "<?php echo $iclosed;?>" type="text" style = "/*position: absolute;left: 5em;top: 70em;*/"><br />
<label class="label-input" style = "/*position: absolute;left:1em;top: 57em;*/">DealerId</label><input name ="idid"  value = "<?php echo $idid;?>" type="text" style = "/*position: absolute;left: 8em;top: 73em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 60em;*/">Auctionid</label> <input name ="iaid"  value = "<?php echo $iaid;?>" type="text" style = "/*position: absolute;left: 8em;top: 75em;*/"><br />
<button class="dt-button" type = "submit" >Save Changes</button><button class="dt-button"  style = "" disabled> Recreate Invoice</button><button class="dt-button" style = "" disabled>Change Invoice Record</button><button class="dt-button" style = "" disabled>Send Invoice Link</button><br />
</fieldset></form>



</td> <td><p id="iframe" align="center">
<iframe src="preview/<?php echo $qmdid;?>.pdf" width="100%" height="1024px" style="valign:top;" allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts allow-pointer-lock name="" onError="location.href='invimage.jpg'">
  <p>Your browser does not support iframes.</p>
</iframe></p>
<img src="invimage.jpg" width="1" height="1" style="visibility:hidden" onError="document.getElementById('iframe').innerHTML = '<img src='invimage.jpg'>'">
 <!---->
</td></tr>
</tbody>
</table>

<?php 
/*
$icnum	=$x;
$icnumdata = '<td><input name="icnum'.$icnum.'.'.$x.'" value="'.$icnum.'" style="width: 3em;"></td>';
	
$icd = '<td style="text-transform:uppercase!important;"><input name="ic_description'.$x.'" value="" style="text-transform:uppercase;width: 24em;"></td>';
$icrd = '<td style="text-transform:uppercase!important;"><input name="ic_ratedesc'.$x.'" value="" style="width: 13em;text-transform:uppercase!important;"></td>';
$icq = '<td><input name="ic_qty'.$x.'" value="" style="width: 3em;"></td>';
$icr = '<td><input name="ic_rate'.$x.'" value="" style="width: 4em;"></td>';
$ica = '<td><input name="ic_amount'.$x.'" value="" style="width: 5em;border:none!important;"></td>';
$myreadonly = '<div><td> <td><input name="ic_id'.$x.'" value="<?php echo $x;?>" type="hidden" readonly><input name="ic_iid'+x+'" value="<?php echo $iid;?>" type="hidden" readonly><input name="ic_mid'+x+'" value="" type="hidden" readonly><input name="ic_date'+x+'" value="<?php echo $idate;?>" type="hidden" readonly><input name="ic_solddate'+x+'" value="" type="hidden" readonly><input name="ic_maid'+x+'" value="<?php echo $iaid;?>" type="hidden" readonly><input name="ic_stock'+x+'" value="" type="hidden" readonly><input name="ic_paid'+x+'" value="0" type="hidden" readonly><input name="ic_note'+x+'" value="" type="hidden" readonly><input name="ic_xtraint'+x+'" value="" type="hidden" readonly><input name="ic_price'+x+'" value="" type="hidden" readonly></td></div>';

$myreadonly = '<td><input name="ic_id'.$x.'" value="" type="hidden" readonly>'+'<input name="ic_iid'.'.'.$x.'" value="" type="hidden" readonly></td>';

//$myreadonly = '<td><input name="ic_id'.$x.'" value="" type="hidden" readonly>'+'<input name="ic_iid'.'.'.$x.'" value="" type="hidden" readonly></td>';
$myreadonly = '<div><td> <input name="ic_iid'.$x.'" value="'.$iid.'" type="hidden" readonly><input name="ic_mid'.$x.'" value="" type="hidden" readonly><input name="ic_date'.$x.'" value="'.$idate.'" type="hidden" readonly><input name="ic_solddate'.$x.'" value="" type="hidden" readonly><input name="ic_maid'.$x.'" value="'.$iaid.'" type="hidden" readonly><input name="ic_stock'.$x.'" value="" type="hidden" readonly><input name="ic_paid'.$x.'" value="0" type="hidden" readonly><input name="ic_note'.$x.'" value="" type="hidden" readonly><input name="ic_xtraint'.$x.'" value="" type="hidden" readonly><input name="ic_price'.$x.'" value="" type="hidden" readonly></td></div>';
$myreadonly = '<div><td> <input name="ic_iid'.$x.'" value="'.$iid.'" type="hidden" readonly><input name="ic_mid'.$x.'" value="" type="hidden" readonly><input name="ic_date'.$x.'" value="'.$idate.'" type="hidden" readonly><input name="ic_solddate'.$x.'" value="" type="hidden" readonly><input name="ic_maid'.$x.'" value="'.$iaid.'" type="hidden" readonly><input name="ic_stock'.$x.'" value="" type="hidden" readonly><input name="ic_paid'.$x.'" value="0" type="hidden" readonly><input name="ic_note'.$x.'" value="" type="hidden" readonly><input name="ic_xtraint'.$x.'" value="" type="hidden" readonly><input name="ic_price'.$x.'" value="" type="hidden" readonly></td></div>';

$myreadonly = '<div><td> <input name="ic_iid'+x+'" value="'.$iid.'" type="hidden" readonly><input name="ic_mid'+x+'" value="" type="hidden" readonly><input name="ic_date'+x+'" value="'.$idate.'" type="hidden" readonly><input name="ic_solddate'+x+'" value="" type="hidden" readonly><input name="ic_maid'+x+'" value="'.$iaid.'" type="hidden" readonly><input name="ic_stock'+x+'" value="" type="hidden" readonly><input name="ic_paid'+x+'" value="0" type="hidden" readonly><input name="ic_note'+x+'" value="" type="hidden" readonly><input name="ic_xtraint'+x+'" value="" type="hidden" readonly><input name="ic_price'+x+'" value="" type="hidden" readonly></td></div>';




$mycheckdata= '
<input name="ic_did'+x+'" value="" type="hidden" readonly>'<input name="ic_id'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_iid'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_mid'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_date'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_solddate'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_maid'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_stock'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_paid'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_note'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_xtraint'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name="ic_price'.'.'.$x.'" value="" type="hidden" readonly>'+
	'<input name= "ic_chick'.'.'.$x.'" id="chick'.$x.'" type="checkbox" value="" onclick="mychick()" style="width: 2em;">';
$icd = '<td><input name="ic_description'.'.'.$x.'" value="" style="width: 24em;"></td>';
$icrd = '<td><input name="ic_ratedesc'.'.'.$x.'" value="" style="width: 13em;"></td>';
$icq = '<td><input name="ic_qty'.'.'.$x.'" value="" style="width: 3em;"></td>';
$icr = '<td><input name="ic_rate'.'.'.$x.'" value="" style="width: 4em;"></td>';
$ica = '<td><input name="ic_amount'.'.'.$x.'" value="" style="width: 5em;"></td>';
$icnum	=$x;*/
	?>
 <?php include '../../sales/jsscripts.html';?>
<script>
//--------------------
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: 'franken.php?did=<?php echo $qmdid;?>',
        table: '#myTable',
        display: 'envelope',
      template: '#customForm',
        fields: [ 
{"label": "Charge Id","name":"ic_id"},
{"label": "Description","name":"ic_description"},
{"label": "Description","name":"ic_ratedesc"},
{"label": "Qty","name":"ic_qty"},
{"label": "Rate","name":"ic_rate"},
{"label": "Charge Amount","name":"ic_amount"},

{"label": "Charge Date","name":"ic_date", "type":"datetime"},		
{"label": "Invoice","name":"ic_iid"},
{"label": "Veh. Id","name":"ic_mid"},
{"label": "Dealer. Id","name":"ic_did"},
{"label": "Sold Date","name":"ic_solddate", "type":"datetime"},

{"label": "Auction","name":"ic_maid"},
{"label": "Stock","name":"ic_stock"},
{"label": "Paid","name":"ic_paid"},
{"label": "Charge Notes","name":"ic_note"},
{"label": "Charge Extra","name":"ic_xtraint"},
		
		
		  ]
    } );
		
	$('#myTable').DataTable( {
        dom: "Bt",
        ajax: "franken.php?did=<?php echo $qmdid;?>",
        stateSave: true,
        columns: [	
		

 

        
{data: "ic_id"},
{data: "ic_description"},
{data: "ic_ratedesc"},
{data: "ic_qty"},
{data: "ic_rate"},
{data: "ic_amount"},
{data: "ic_date"},
{data: "ic_iid"},
{data: "ic_mid"},
{data: "ic_did"},

{data: "ic_solddate", type: 'datetime'},

{data: "ic_maid"},
{data: "ic_stock"},
{data: "ic_paid"},
{data: "ic_note"},
{data: "ic_xtraint"},

        ],
        select: true,
        buttons: [
        'colvis',
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
          
        ]
    } );
} );






























//-------------------------










 /*var x =document.getElementById("myTable").rows.length; 
   console.log(x);
function myCreateFunction() {
    var x =document.getElementById("myTable").rows.length; 
    console.log(x);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var icnumdata  = row.insertCell(0);
    var ic_description = row.insertCell(1);
    var ic_ratedesc = row.insertCell(2);
    var ic_qty = row.insertCell(3);
    var ic_rate = row.insertCell(4);
    var ic_amount = row.insertCell(5);
    var invreadonly = row.insertCell(6);

      	icnumdata.innerHTML = '<tr id ="rows"><td><input name="ic_id'+ x + '" value="'+ x +'" style="width: 3em;"></td>';
	ic_description.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_description'+x+'" value="" style="text-transform:uppercase;width: 24em;"></td>';
     	ic_ratedesc.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_ratedesc'+x+'" value="" style="text-transform:uppercase!important;width: 13em;"></td>';
      	ic_qty.innerHTML = '<td><input name="ic_qty'+x+'" value="" style="width: 3em;"></td>';
       	ic_rate.innerHTML = '<td><input name="ic_rate'+x+'" value="" style="width: 4em;"></td>';
        ic_amount.innerHTML ='<td><input name="ic_amount'+x+'" value="" style="width: 5em;"></td>';
        invreadonly.innerHTML ='<div><td> <input name="ic_iid'+x+'" value="<?php echo $iid;?>" type="hidden" ><input name="ic_mid'+x+'" value="" type="hidden" ><input name="ic_date'+x+'" value="<?php echo $idate;?>" type="hidden" ><input name="ic_solddate'+x+'" value="" type="hidden" ><input name="ic_maid'+x+'" value="<?php echo $iaid;?>" type="hidden" ><input name="ic_stock'+x+'" value="" type="hidden" ><input name="ic_paid'+x+'" value="0" type="hidden" ><input name="ic_note'+x+'" value="" type="hidden" ><input name="ic_xtraint'+x+'" value="" type="hidden" ><input name="ic_price'+x+'" value="" type="hidden" ></td></div></tr>';
}

function myDeleteFunction() {
    //document.getElementById("myTable").deleteRow(0);
}


$(document).on("click",'#mybtn',function(){	
    var datatoadd='<tr id ="rows"><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6 </td><td><div></div></td></tr>';
    $('#mytable').append(datatoadd);  
  }); 

$("#insert-more").click(function () {
     $("#myTable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});

$("#add_new").click(function () { 

    $("#myTable").each(function () {
       
        var tds = '<tr>';
        jQuery.each($('tr:last td', this), function () {
            tds += '<td>' + $(this).html() + '</td>';
        });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append(tds);
        } else {
            $(this).append(tds);
        }
    });
});*/
	</script>
</body>
</html>