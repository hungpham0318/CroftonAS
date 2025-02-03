<?php session_start();
$title="Invoice Charges";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<?php include"stylehead-begin.html";?>
body{
/*  font-family:   "Helvetica Narrow","Arial Narrow",Tahoma,Arial,Helvetica,sans-serif;
font-family: 'Open Sans', sans-serif;*/


/*font-family: 'Open Sans', sans-serif!important;*/

font-family: Verdana,
sans-serif!important;
font-size:16px;
width:99%;

}
div.DTE_Body div.DTE_Body_Content div.DTE_Field>label{float:left;width:100%;padding-top:6px}
div.DTE_Body div.DTE_Body_Content div.DTE_Field>div.DTE_Field_Input{float:right;width:100%}





th {
  font-family: 'Open Sans', sans-serif;
  text-transform: uppercase;
}
div.DTE_Body div.DTE_Body_Content div.DTE_Field {
  box-sizing: border-box;
}
div.DTE_Body div.DTE_Form_Content {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.DTE_Label {
  font-size: .9em!important
}
.DTE_Field {
  width: 100em!important;
  white-space: nowrap;
  margin: 1px;
  float: left;
  text-transform: uppercase;
}
div.DTED_Lightbox_Wrapper {
  left: 1em;
  right: 1em;
  margin: 0 auto;
  width: 75%;
  overflow-x: hidden;
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
  margin: 0 auto;
  padding: .2em;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  text-transform: uppercase;
}
.DTE_Field.fortyeight {
  width: 100em!important;
  white-space: nowrap;
  margin: 1px;
  float: left;
  text-transform: uppercase;
}
#customForm input .fortyeight{
  min-width: 30em;
  max-width: 30em;
  font-size: 1em;
  text-transform: uppercase;
}
#customForm select.fortyeight {
  width: 30em;
  min-width: 30em;
  max-width: 30em;
  height: 2.3em;
  font-size: 1em!important;
}
#customForm.hr input text {
  width: 15em;
  min-width: 15em;
  max-width: 15em;
  text-transform: uppercase;
}
#customForm.hr select {
  min-width: 15em;
  max-width: 15em;
  height: 2.3em;
  text-transform: uppercase;
  font-size: 1em!important;
}
#customForm.office input text {
  width: 15em;
  min-width: 15em;
  max-width: 15em;
  text-transform: uppercase;
}
#customForm.office select {
  min-width: 15em;
  max-width: 15em;
  height: 2.3em;
  text-transform: uppercase;
  font-size: 1em!important;
}

#customForm.name input text {
  width: 15em;
  min-width: 15em;
  max-width: 15em;
  text-transform: uppercase;
}
#customForm.name select {
  min-width: 15em;
  max-width: 15em;
  height: 2.3em;
  text-transform: uppercase;
  font-size: 1em!important;
}
#customForm div.DTE_Field.fortyeight {
    min-width: 50em;
    max-width: 50em; 
    padding: .2em;
}
#customForm.fortyeight input {
    min-width: 30em!important;
    max-width: 30em!important;
    font-size: 1em;
    text-transform: uppercase;
    }
#customForm.fortyeight input text {
  min-width: 30em!important;
    max-width: 30em!important;
    text-transform: uppercase;
}
#customForm.fortyeight select {
   min-width: 30em!important;
    max-width: 30em!important;
  height: 2.3em;
  text-transform: uppercase;
  font-size: 1em!important;
}
.DTE_Field.DTE_Field_Type_text{
min-width:50em;
}
#customForm fieldset {
  flex: 1;
  border: 1px solid #aaa;
  margin: 0.2em;
  text-transform: uppercase;
  min-width: 21.5em!important;
}
#customForm fieldset legend {
  padding: .2em .2em;
  border: 1px solid #aaa;
  font-weight: bold;
  margin: 1px;
}

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
  flex: 2 48%;
}
#customForm fieldset.fortyeight {
  flex: 2 ;
}
#customForm fieldset.hr {
  flex: 2;
  float:left;
}
#customForm fieldset.inside {
  flex: 2;
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
#customForm fieldset.fortyeight legend {
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
.DTE_Field {
  text-transform:uppercase;
}
.DTE_Field_Type_text {}
#DTE_Field_Name_master.mvin {}

/* The Modal (background) */
.modal {
  display: none;
  /* Hidden by default */
  position: fixed;
  /* Stay in place */
  z-index: 1;
  /* Sit on top */
  padding-top: 100px;
  /* Location of the box */
  left: 0;
  top: 0;
  width: 100%;
  /* Full width */
  height: 100%;
  /* Full height */
  overflow: auto;
  /* Enable scroll if needed */
  background-color: rgb(0, 0, 0);
  /* Fallback color */
  background-color: rgba(0, 0, 0, 0.4);
  /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
div.dt-button-collection a.dt-button.active:not(.disabled) {
  background-color: #880000;
  opacity: 1;
}
a.dt-button.disabled {
  color: #d0d0d0;
  border: 1px solid #d0d0d0;
  cursor: default;
  background-color: #440000;
  opacity:.3;
}
a.dt-button:hover,
a.dt-button:focus,
a.dt-button.active:hover {
  background-color: #990000!important;
  background-image: none!important;
}
a.dt-button:active,
a.dt-button.active {
  background-color: #440000!important;
  opacity:.8;
  background-image: none!important;
}
a.dt-button {
  background-color: #660000;
  /*  background-color: rgb(233, 233, 233);*/
  background-image: none!important;
  border-bottom-color: rgb(153, 153, 153);
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
  border-bottom-style: solid;
  border-bottom-width: 1px;
  border-image-outset: 0px;
  border-image-repeat: stretch;
  border-image-slice: 100%;
  border-image-source: none;
  border-image-width: 1;
  border-left-color: rgb(153, 153, 153);
  border-left-style: solid;
  border-left-width: 1px;
  border-right-color: rgb(153, 153, 153);
  border-right-style: solid;
  border-right-width: 1px;
  border-top-color: rgb(153, 153, 153);
  border-top-left-radius: 2px;
  border-top-right-radius: 2px;
  border-top-style: solid;
  border-top-width: 1px;
  box-sizing: border-box;
  color: #ffffff;
  /*color: rgb(0, 0, 0);*/
  cursor: pointer;
  display: inline-block;
  filter: none;
  font-size: 1em;
  height: 2.3em;
  margin-right: 0px;
  outline-color: rgb(0, 0, 0);
  outline-style: none;
  outline-width: 0px;
  overflow-x: hidden;
  overflow-y: hidden;
  padding-bottom: 5.72px;
  padding-left: 11.44px;
  padding-right: 11.44px;
  padding-top: 5.72px;
  position: relative;
  text-decoration-color: rgb(0, 0, 0);
  text-decoration-line: none;
  text-decoration-style: solid;
  user-select: none;
  white-space: nowrap;
  /*width: 102.641px;*/
}
.active {
  background-color:#440000;
}

</style>

</head>
<body><div id="<?php echo $title;?>" class="">   




<?php include "../worldview/css/snow-admin-nav.html";?>
</br><!--<button id="kount">Row count</button>--></br><p>

<div id="crazyInsert"><!-- begin crazy insert -->


    <div class="container container-wrapper" style="display:block;">
     




      <div id="section1" style="display:block;">
        <div id="sect1leftcol">
          <?php 
	
	
	
	
	include "../process/connecti.php";
$qmdid = mysqli_real_escape_string($con, $_GET['did']);
$result = mysqli_query($con, "SELECT * FROM dealers WHERE `did` = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 85 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {
//echo '<br>line 93<br>';
// as of php 5.4 I can use foreach
   
foreach( $result as $row ) {
//from dealers

$did = $row['did'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$dnumber = $row['dnumber'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dstate = $row['dstate'];
$dzip = $row['dzip'];
$daddress2 = $dcity.' '.$dstate.' '.$dzip;
$drepfee = $row['drepfee'];
$drepfeedesc = $row['drepfeedesc'];
$dinvoiceemail = $row['dinvoiceemail'];
}}




$idid = $did;
$idate = date('Y-m-d');
$iaid = 1;
$idname = $dname;
$idnumber = $dnumber;
$idattn = $dattn;
$idaddress = $daddress;
$idaddress2 = $dcity.', '.$dstate.' '.$dzip;
$idemailcontacts="";//join d_contacts and use dcontacts.dcemailto
	
	
/*

Create icharge array
create master update array
create mi relate array
create di relate array
create invoice final updatequery

SELECT FROM master 





*/

$ichargeArr = array();
$ichargeEntry = array();
$mastinvArr =array();
$mastinvEntry =array();


include "../process/connecti.php";

$result3 = mysqli_query($con, "SELECT `mid`, `maid`, `muid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `minvid`, `msubstatus`, `msolddate`,`msoldprice`
FROM master WHERE mdid = $did  AND minvid <= 0");


//$result3 = mysqli_query($con, "SELECT `mid`, `maid`, `muid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `minvid`, `msubstatus`, `msolddate`,`msoldprice`
//FROM master WHERE mdid = $did AND mstatus = 'A' AND msubstatus = 'recon-green' AND minvid <= 0");

// mysqli_query returns false if something went wrong with the query
if($result3 === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 234 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));
}
else {//echo 'line 243<br>';
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result3 as $row ) {


//--------------------
//assign variables from master query
//from master
//create array first then add rows
/**/

$mid =	$row['mid'];
$mdid =	$row['mdid'];
$myear = $row['myear'];
$mmodel = $row['mmodel'];
$mvin = $row['mvin'];
$msolddate = $row['msolddate'];
$mstatus = $row['mstatus'];
$msubstatus = $row['msubstatus'];
$muid =	$row['muid'];
$maid =	$row['maid'];
$msoldprice = $row['msoldprice'];
$mstock = $row['mstock'];

$mastinvEntry[0] = $mid;
$mastinvEntry[1] = $maid;
$mastinvEntry[2] = $muid;
$mastinvEntry[3] = $mdid;
$mastinvEntry[4] = $mvin;

$mastinvEntry[5] = $myear;
$mastinvEntry[6] = $mmodel;
$mastinvEntry[7] = $mstock;
$mastinvEntry[8] = $mstatus;
$mastinvEntry[9] = $msubstatus;
$mastinvEntry[10] = $minvid;
$mastinvEntry[11] = $msolddate;
$mastinvEntry[12] = $msoldprice;
$mastinvArr[] = $mastinvEntry;



/*
echo "<br>mid: ".$mid;
echo "<br>myear: ".$myear;
echo "<br>mmodel: ".$mmodel;
echo "<br>mvin: ".$mvin;
echo "<br>msolddate: ".$msolddate;
echo "<br>mstatus: ".$mstatus;
echo "<br>msubstatus: ".$msubstatus;
echo "<br>muid: ".$muid;
echo "<br>maid: ".$maid;
echo "<br>msoldprice: ".$msoldprice;
echo "<br>mstock: ".$mstock;
*/
//set icharges in the icharges item array and variables for each outstanding uninvoiced vehicle for that dealership
 
$ic_solddate = $row['msolddate'];
if($ic_solddate <=0){$ic_solddate = $idate;}
$ic_mid = $mid;
$ic_maid = $row['maid'];
$ic_stock = $row['mstock'];

$ic_rate = $drepfee;
$ic_ratedesc = $drepfeedesc;
$ic_qty = 1;
$ic_amount = $ic_rate * $ic_qty;
$ic_price = $drepfee;
$price = $ic_amount;
$iclosed=1;
$ic_date = $idate;
//$itotal = 0;
$itotal = $itotal+$ic_amount;

if(!empty($ic_stock)){
$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8)." - Stk# ".$mstock." - ".$drepfeedesc;}
else{$ic_description = substr($myear, -2)." ".$mmodel." ".substr($mvin, -8)." - ".$drepfeedesc;}

$ichargeEntry[0] = $ic_description;
$ichargeEntry[1] = $ic_solddate;
$ichargeEntry[2] = $ic_mid;
$ichargeEntry[3] = $ic_maid;
$ichargeEntry[4] = $ic_stock;
$ichargeEntry[5] = $ic_qty;
$ichargeEntry[6] = $ic_rate;
$ichargeEntry[7] = $ic_amount;
$ichargeEntry[8] = $ic_price;
$ichargeEntry[9] = $ic_date;
$ichargeEntry[10] = $ic_ratedesc;
$ichargeArr[] = $ichargeEntry;

}

}

//echo 'line 334<br>';
/*
foreach ($ichargeArr as $ichargeEntry){
echo '<pre></br>icharge array';
 print_r($ichargeEntry);}
echo '</br></pre>';
foreach ($mastinvArr as $mastinvEntry){echo '<pre></br>master-invoice array'; 
print_r($mastinvEntry); 
echo '</br></pre>';}*/
/*
echo '<pre></br>icharge array'; print_r($ichargeArr);
echo '<pre></br>master-invoice array'; print_r($mastinvArr); echo '</br></pre>';*/
/*attempt to get the next id for invoices then set the variables needed*/
include "../process/connecti.php";

$sql = <<<SQL
SHOW TABLE STATUS LIKE 'invoices'
SQL;

if(!$result = $con->query($sql)){
    die('There was an error running the query line 353 [' . $con->error . ']');
}

$row = $result->fetch_assoc();

//echo $row['Auto_increment'];

$iid = $row['Auto_increment'];
//echo "at line 362 the iid= ".$iid;
//echo "<br>";
$ipdfurl = 'http://www.croftonas.com/admin/accnts/invoice/bunker/'.$idid.'.'.$iid.'.pdf';
/**/


// ----------------------------------------------------------//
// 'insert invoice' query  $result2 
// ----------------------------------------------------------//
	include "../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE invoices_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );


include "../process/connecti.php";

$result2 = mysqli_query($con, "INSERT INTO `invoices_temp`(`iid`, `idate`, `itotal`, `ipdfurl`, `iaid`, `idid`, `idname`, `idattn`, `idaddress`,`idcitystatezip`,`iclosed`) VALUES ($iid, '$idate', '$itotal', '$ipdfurl', $iaid, $idid, '$idname', '$idattn', '$idaddress', '$idaddress2', 0)");

// mysqli_query returns false if something went wrong with the query
if($result2 === FALSE) { echo 'died at line 382 insert invoices query result2 which means there is no iid defined henceforth';
    die(mysqli_error($con));
    
}
else {//$last_id = mysqli_insert_id($con);
//$iid = $last_id;
}
//echo "<br>";
//echo 'line 390 Invoice Number: ';
//echo $iid;
//echo "<br>";
//echo 'line 393<br>';
$ic_iid = $iid;
$di_iid = $iid;
$mi_iid = $iid;

$minvid = $iid;
//$iidname= $iid;
//$ipdfurl = "http://www.croftonas.com/admin/accnts/invoice/bunker'.$idid.'.'.$iid.'.pdf";

$ic_paid = 0;
$ic_note = "none";
//echo "</br>";
//echo 'line 405<br>';

	include "../process/connecti.php";
	
	$deleterecords = "TRUNCATE TABLE i_charges_temp"; //empty the table of its current records
mysqli_query( $con, $deleterecords );
	
	include "../process/connecti.php";
//$qmid = mysqli_real_escape_string($con, $_GET['mid']);
//$result4 = mysqli_query($con, "INSERT INTO `i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ic_iid', '$ic_mid', '$ic_date', $ic_amount, $ic_description, '$ic_solddate', '$ic_qty', '$ic_rate', '$ic_maid', '$ic_stock', '$ic_paid', '$ic_note')");

foreach ($ichargeArr as $ichargeEntry){
$result4 = mysqli_query($con, "INSERT INTO `i_charges_temp`(`ic_id`, `ic_iid`, `ic_mid`, `ic_date`, `ic_amount`, `ic_description`, `ic_solddate`, `ic_qty`, `ic_rate`, `ic_ratedesc`, `ic_maid`, `ic_stock`, `ic_paid`, `ic_note`) VALUES (null, '$ic_iid', '$ichargeEntry[2]', '$ichargeEntry[9]', '$ichargeEntry[7]', '$ichargeEntry[0]', '$ichargeEntry[1]', '$ichargeEntry[5]', '$ichargeEntry[6]', '$ichargeEntry[10]', '$ichargeEntry[3]', '$ichargeEntry[4]', '$ic_paid', '$ic_note')");



// mysqli_query returns false if something went wrong with the query
if($result4 === FALSE) { echo 'No vehicles for this dealership are available for invoicing.  This page only returns vehicles whose Status is set to S(old) or A(ctive) with the Substatus set to recon-green';
    die(mysqli_error($con));
    
}
}



	echo '<a href="/admin/accnts/invoice/invoicestepthree.php" class="button" >Create Invoice</a>';
	//include 'views/steptwohtml.html';
	//echo "</script></body></html>";
	//echo "</script>";
	?>
<button id="myBtn">Preview Invoice</button>

<!-- The Modal -->
<div id="myModal" class="modal" style="width:100%;">

  <!-- Modal content -->
  <div class="modal-content" style="width:60%;text-transform:uppercase;overflow:scroll;">
    <span class="close">&times;</span>
   
<iframe id="iframeid" src="previewinvoicemodal.html.php" sandbox="allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts" style="width:100%;height:70%;" name="">
  <p>Your browser does not support iframes.</p>
  <div><button id="myBtn2" onclick="reload(#iframeid);">Refresh Preview</button></div>

</iframe>

 
   

</div>

</div><!-- end crazy insert -->



 <div id="customForm">
                        <fieldset class="fortyeight">
                            <legend>.</legend>
                            
                           
                            
                            
                            <editor-field name="i_charges_temp.ic_id"></editor-field>
<editor-field name="i_charges_temp.ic_date"></editor-field>
<editor-field name="i_charges_temp.ic_iid"></editor-field>
<editor-field name="i_charges_temp.ic_mid"></editor-field>
<editor-field name="i_charges_temp.ic_amount"></editor-field>
                            <editor-field name="i_charges_temp.ic_description"></editor-field>
                            <editor-field name="i_charges_temp.ic_solddate"></editor-field>
                              </fieldset>
                       <fieldset class="hr">
                            <legend>..</legend>
                           
                            <editor-field name="i_charges_temp.ic_qty"></editor-field>
                            <editor-field name="i_charges_temp.ic_rate"></editor-field>
                            <editor-field name="i_charges_temp.ic_maid"></editor-field>
                            <editor-field name="i_charges_temp.ic_stock"></editor-field>
                               
                            <editor-field name="i_charges_temp.ic_note"></editor-field>
                            <editor-field name="i_charges_temp.ic_ratedesc"></editor-field>
                           
                         
                     
                            
                     <!--        
                      </fieldset>
                       <fieldset class="hr">
                            <legend>...</legend>
                                 <editor-field name="i_charges_temp.ic_id"></editor-field>
                           <editor-field name="i_charges_temp.ic_date"></editor-field>
<editor-field name="i_charges_temp.ic_iid"></editor-field>
<editor-field name="i_charges_temp.ic_mid"></editor-field>

<editor-field name="i_charges_temp.ic_amount"></editor-field>
<editor-field name="i_charges_temp.ic_description"></editor-field>
<editor-field name="i_charges_temp.ic_solddate"></editor-field>
 </fieldset>
                       <fieldset class="hr">
                            <legend>....</legend>
<editor-field name="i_charges_temp.ic_qty"></editor-field>
<editor-field name="i_charges_temp.ic_rate"></editor-field>
<editor-field name="i_charges_temp.ic_maid"></editor-field>
<editor-field name="i_charges_temp.ic_stock"></editor-field>

<editor-field name="i_charges_temp.ic_note"></editor-field>
<editor-field name="i_charges_temp.ic_price"></editor-field>   -->
                            
                        </fieldset>
                       
                        
                        
                        
                    </div>


 <div style="width:97%;margin: 0 auto;">
<table id="example" class="display compact" cellspacing="0" width="100%">
                    <thead>
                   
                        <tr>

<th>ic_id</th>
<th>ic_date</th>
<th>ic_iid</th>
<th>ic_mid</th>

<th>ic_amount</th>
<th>ic_description</th>
<th>ic_solddate</th>
<th>ic_qty</th>
<th>ic_rate</th>
<th>Fee Type</th>
<th>ic_maid</th>
<th>ic_stock</th>

<th>ic_note</th>



							
                        </tr>
                    </thead>
                    <tfoot> 
                    <tr>

<th>ic_id</th>
<th>ic_date</th>
<th>ic_iid</th>
<th>ic_mid</th>

<th>ic_amount</th>
<th>ic_description</th>
<th>ic_solddate</th>
<th>ic_qty</th>
<th>ic_rate</th>
<th>Fee Type</th>
<th>ic_maid</th>
<th>ic_stock</th>

<th>ic_note</th>




                        </tr>
                    </tfoot>
                    
                </table>
	</div><!--close table div -->


	
	</div> <!-- closing title div -->
	
	
	
<?php include "jsscripts.html";?>	
	
	

	
	
	
	
	
	
	
	
	
	



	<script type="text/javascript" language="javascript" class="init">
	
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


				//template.js


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "createinvoicephp.php",
//display: 'envelope',
//display: 'lightbox',
       table: "#example",
       template: '#customForm',
       fields: [ 
{"label": "Chg.Id","name":"i_charges_temp.ic_id"},
{"label": "Inv. Date","name":"i_charges_temp.ic_date", type:"datetime"},
{"label": "Inv.Id","name":"i_charges_temp.ic_iid"},

{"label": "Reg.Id","name":"i_charges_temp.ic_mid"},

{"label": "Line Fee","name":"i_charges_temp.ic_amount"},
{"label": "Line Item Desc.","name":"i_charges_temp.ic_description"},
{"label": "Sold Date","name":"i_charges_temp.ic_solddate", "type":"datetime"},
{"label": "Qty","name":"i_charges_temp.ic_qty"},
{"label": "Rate","name":"i_charges_temp.ic_rate"},
{"label": "Fee Desc","name":"i_charges_temp.ic_ratedesc"},
{"label": "Auct. Id","name":"i_charges_temp.ic_maid"},
{"label": "Stock","name":"i_charges_temp.ic_stock"},
//{"label": "i_charges_temp.ic_paid","name":"i_charges_temp.ic_paid"},
{"label": "Notes","name":"i_charges_temp.ic_note"},



        ] 
         
         
    } );


var table = $('#example').DataTable( {
         dom: "Bfrti",
        ajax: "createinvoicephp.php",
"scrollY": 700,
   // responsive: true,
    scrollX: "true",    
    dom: "Bfrt",
    //colReorder: true,
   stateSave: true,
    iDisplayLength: -1,
     "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                      //  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                        '<tr class="group"><td colspan="10">'+"Invoice Number:&nbsp;"+group+'<a href="editinvoice.php?iid='+group+'">&nbsp;&nbsp;Preview this Invoice (Click here to preview and confirm creation)</a></td></tr>');
                        // '<tr class="group"><td colspan="10">'+"Invoice Number:&nbsp;"+group+'<a href="editinvoice.php?iid='+group+'">&nbsp;&nbsp;Delete this Invoice (Click here to review and confirm deletion)</a></td></tr>');
                  //  );
 
                    last = group;
                }
            } );
        },
select: {  
type: 'os',
style:    'os'
//selector: 'td:not(:nth-child(36))' // no row selection on last column
 //selector: 'td:first-child'
//selector: 'td.select-checkbox'
     },
     
     "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        
//order: [[ 19, 'desc' ],[22,'asc']],
   columns: [ 
{data: "i_charges_temp.ic_id"},
{data: "i_charges_temp.ic_date"},
{data: "i_charges_temp.ic_iid"},
{data: "i_charges_temp.ic_mid"},

{data: "i_charges_temp.ic_amount"},
{data: "i_charges_temp.ic_description"},
{data: "i_charges_temp.ic_solddate", type: 'datetime'},
{data: "i_charges_temp.ic_qty"},
{data: "i_charges_temp.ic_rate"},
{data: "i_charges_temp.ic_ratedesc"},
{data: "i_charges_temp.ic_maid"},
{data: "i_charges_temp.ic_stock"},
//{data: "i_charges_temp.ic_paid"},
{data: "i_charges_temp.ic_note"},


/*end new data*/
	 ],
	 select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },


        buttons: [  { extend: "create", editor: editor },
            //{ extend: "edit",   editor: editor },
            { extend: "remove", editor: editor },
                   {
                extend: "edit",
                editor: editor,
                formButtons: [
                    'Update',
                    { label: 'Cancel', fn: function () { this.close(); } }
                ]
            },
         //    {
           //     text: 'Mark as Ready',
            //    titleAttr: 'Select row(s) and click here to change Status to A - Active, and Substatus to Recon-Green - Ready, at Auction .',
           //      action: function ( e, dt, node, config ) {
  // editor
   //.edit(dt.rows({selected:true}).indexes('mid'), false)
    //    .val('master.msubstatus', 'recon-green' )
 //  .val('master.mstatus', 'A' )
  //.val('master.msolddate', '<?php echo date("Y-m-d");?>' )
      //  .submit();},
     //  editor: editor
 // },
  'colvis',
	 
             
        
     

                
                      {text: 'Reload table', action: function () { table.ajax.reload();}}
    
       // 'pageLength'
        ],

  "rowCallback": function ( row, data ) { 


   
  
        
   $('td', row).css('text-transform', 'uppercase');
   $('td', row).css('white-space', 'nowrap');
   
   
$('td', row).attr('nowrap','nowrap');
 $('td', row).css('font-family','monospace');
$('td', row).css('white-space','nowrap');
$('td', row).css('font-size','1.25em');
$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');


   
   
   
   
   
   
  }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  //if ( data.master.msubstatus =='Inv-No' ){ 
    
   // $('td', row).css('color', 'darkgreen');
   //    $('td', row).css('border-color-top', 'darkgreen');

   //}

  
    } );
          
          
   
  new $.fn.dataTable.Buttons( table, {
        buttons: [
         {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Invoices',
   exportOptions: { 
    
 columns: ':visible'
    
   },
  header: true,
   footer: false,
   title: '<?php echo $title;?>',
   orientation: 'landscape',
  /**/
     orientation: 'landscape',
    exportOptions: {
         columns: ':visible'
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
        doc.styles.tableHeader.fontSize = 7;
        doc.styles.title.fontSize = 9;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
                    '<?php  echo "Printed: ". date("Y-m-d H:i:s");?>',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .5; };
        // Vertikal line thickness
        objLayout['vLineWidth'] = function(i) { return .5; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return '#aaa'; };
        // Vertical line color
        objLayout['vLineColor'] = function(i) { return '#aaa'; };
        // Left padding of the cell
        objLayout['paddingLeft'] = function(i) { return 4; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 4; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    },
    {
   extend: 'pdfHtml5',
    titleAttr: 'Use the Column Visibility list to exclude fields from this report',
   text: 'Invoices - Portrait',
   
  header: true,
  
   title: 'Invoices',
   orientation: 'letter',
 
    exportOptions: {
        columns: ':visible'
      //   columns: [1, 2, 3,  11, 12, 16, 17, 18 ]
    },
    customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 7;
        doc.styles.tableHeader.fontSize = 11;
        doc.styles.title.fontSize = 11;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
                    '<?php  echo "Printed: ". date("Y-m-d H:i:s");?>',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .5; };
        // Vertikal line thickness
        objLayout['vLineWidth'] = function(i) { return .5; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return '#aaa'; };
        // Vertical line color
        objLayout['vLineColor'] = function(i) { return '#aaa'; };
        // Left padding of the cell
        objLayout['paddingLeft'] = function(i) { return 4; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 4; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    }
            
        ]
    } );
 
    table.buttons( 1, null ).container().appendTo(
        table.table().container()
    );
   // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    //$('#kount').click( function () {
      //  alert( table.rows('.selected').data().length +' row(s) selected' );
   // } );
 
    


 
});


</script>
</body>
</html>


