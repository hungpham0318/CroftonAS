<?php session_start();
$title="steptwotest";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{}
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];


if(isset($_POST)){
/*/ invoice process post file for new invoices

1. $_POST all the invoice fields to invoice variables
2. make a loop to post icharges
3. $_POST all the i_charges to ic_variables
4. post to some new version of step three
/*/
		

$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";

define('COMPANY', 'Crofton Auction Services');
define('ADDRESS','5 Park Place, Suite 519');
define('ADDRESS2','Annapolis, MD 21401');
$address3 = $address." ".$address2;
define('EMAIL','crofton@comcast.net');
define('TELEPHONE','301-706-7951');

include "../../process/connecti.php";


//1 $_POST all the invoice fields to invoice variables
include "../../process/connecti.php";
$iid=mysqli_real_escape_string($con, $_POST['iid']);
$idate = mysqli_real_escape_string($con, $_POST['idate']);
//$itotal = mysqli_real_escape_string($con, $_POST['itotal']);
$ipdfurl = mysqli_real_escape_string($con, $_POST['ipdfurl']);
$iaid = mysqli_real_escape_string($con, $_POST['iaid']);
$idid = mysqli_real_escape_string($con, $_POST['idid']);
$idname = mysqli_real_escape_string($con, $_POST['idname']);
$idattn = mysqli_real_escape_string($con, $_POST['idattn']);
$idaddress = mysqli_real_escape_string($con, $_POST['idaddress']);
$idcitystatezip = mysqli_real_escape_string($con, $_POST['idcitystatezip']);
$idinvoiceemail = mysqli_real_escape_string($con, $_POST['idinvoiceemail']);
$iclosed  = mysqli_real_escape_string($con, $_POST['iclosed']);



define('IPDFURL', $ipdfurl);

define('idate',$idate);
define('idid',$idid);
define('idname',$idname);
define('idattn',$idattn);
define('idaddress',$idaddress);
define('idcitystatezip',$idcitystatezip);
define('idinvoiceemail',$idinvoiceemail);

include "../../process/connecti.php";
$sql = <<<SQL
SHOW TABLE STATUS LIKE 'test_invoices'
SQL;

if(!$result = $con->query($sql)){
    die(' Could not obtain the next invoice id.  There was an error running the query line 74 [' . $con->error . ']');
}

$row = $result->fetch_assoc();
echo "AUTO INCREMENT line 72 ";
echo $row['Auto_increment'];

$iid = $row['Auto_increment'];
echo "at line 93(postfromsteptwo) the iid= ".$iid;
define('IID',$iid);
echo"<br><br>constant IID is set to: ";
echo IID;
echo 'iid = '.$iid;
echo '<br>line75<br>'.$iid;
$ic_iid = $iid;
$number =$iid;
$minvid = $iid;
//-----------------------------------------------------------



$ichargeArr = array();
$ichargeEntry = array();
/*/-----------------------------------
do while
$i = 0;
do {
    echo $i;
} while ($i > 0);
-----------------------------------------/*/
	//Post the inputs from steptwo
$j=1;
	
		 $itotalsum = 0;
		 //$itotalsum = $itotalsum+$ic_amount;
do {

$ichargeEntry[0] = mysqli_real_escape_string($con,strtoupper($_POST['ic_description'.$j]));
$ichargeEntry[1] = mysqli_real_escape_string($con, $_POST['ic_solddate'.$j]);
$ichargeEntry[2] = mysqli_real_escape_string($con, $_POST['ic_mid'.$j]);
$ichargeEntry[3] = mysqli_real_escape_string($con, $_POST['ic_maid'.$j]);
$ichargeEntry[4] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_stock'.$j]));
$ichargeEntry[5] = mysqli_real_escape_string($con, $_POST['ic_qty'.$j]);
$ichargeEntry[6] = mysqli_real_escape_string($con, $_POST['ic_rate'.$j]);
$ichargeEntry[7] = mysqli_real_escape_string($con, number_format($_POST['ic_qty'.$j] * $_POST['ic_rate'.$j]));

//$ichargeEntry[7] = mysqli_real_escape_string($con, $_POST['$ic_amount'.$j]);
$ichargeEntry[8] = mysqli_real_escape_string($con, $_POST['ic_price'.$j]);
$ichargeEntry[9] = mysqli_real_escape_string($con, $_POST['ic_date'.$j]);
$ichargeEntry[10] = mysqli_real_escape_string($con, $_POST['ic_paid'.$j]);
$ichargeEntry[11] = mysqli_real_escape_string($con, $_POST['ic_note'.$j]);
$ichargeEntry[12] = $iid;
$ichargeEntry[13] = mysqli_real_escape_string($con,strtoupper( $_POST['ic_ratedesc'.$j]));
$ichargeEntry[14] = mysqli_real_escape_string($con, $_POST['msubstatus'.$j]);
$ichargeEntry[15] = mysqli_real_escape_string($con,strtoupper( $_POST['mstatus'.$j]));
  $ichargeArr[] = $ichargeEntry;
  $itotalsum = $itotalsum+$ichargeEntry[7];
  $j++;
} while (!empty( $_POST['ic_id'.$j]));

echo $itotalsum;
$itotal= $itotalsum;

/*------------------------------------------------

---------------------------------------------*/

echo COMPANY; //$company = "Crofton Auction Services";
echo ADDRESS; //$address = "5 Park Place, Suite 519";
echo ADDRESS2; // = "Annapolis, MD 21401";
echo ADDRESS3;  // = $address." ".$address2;
echo EMAIL; // = "crofton@comcast.net";
echo TELEPHONE; // = "301-706-7951";


foreach($ichargeArr as $ichargeEntry){echo '<pre>'; print_r($ichargeEntry); echo '</pre>';}
}




/*/ ------------------------------------------
above is the post file pasted on top of the 
steptwoinvoicing file to produce this self-posting 
wysiwig version of step two.
I've included the first few obviously repetitve 
statements in this comment

<?php session_start();
$title="2-Invoicing";
$perms=3;
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
------------------------------------------/*/ 


?>
<html>
<?php include "../../sales/stylehead-begin.html";?>

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
<?php include "../../sales/stylehead-end.html";?>
<body>
<?php 
include "../../worldview/css/snow-admin-nav.html";?>
<div id = "btncreate"><button style = "position: absolute;left: 12em;top: 39em;" title="When you create a new row, or change values in the row, the totals also need to be updated on this form...for a little while...until the juice is worth the squeeze, anyway" onclick="myCreateFunction()">Create row</button></div>
<?php
include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM test_invoices_temp WHERE idid = $qmdid");

// mysqli_query returns false if something went wrong with the query
if($resultit === FALSE) { 
     die(mysqli_error($con)."<b><br>
     <br>query begins line 261 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}
else {//echo 'line 49 <br>';
// as of php 5.4 foreach
   
foreach( $resultit as $row ) {
//$iid=$row['iid'];
$idate=$row['idate'];
//$itotal= money_format('%i', $row['itotal']);
$itotal= number_format($row['itotal'],2);
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
   

echo '<br /><table id ="maintable" style = "width:90%;margin-left:8%"><thead><tr><br /><th style = "width:48%!important;" ></th><th style = "width:48%!important;" ></th></tr></thead>
<tbody><tr><td style="vertical-align:top;"><form id="invcorrect" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >';
echo '<img src = "invimage.png" style = "margin-left: -3em;width:95%;"><br />';
echo '<label class="label-input" style = "position: relative;left:33em;top: -2.6em;width:2em;">Date:</label><br /> <input name ="idate"  value  = "'.$idate.'" type="date" style = "padding:0px!important; margin:0px!important; position: relative;left:36em;top:-4.6em!important;height:2em; width:9em!important;"><br />
<label class="label-input" style = "position: relative;left: 18em;top: -3.3em;">Invoice #:</label><input name ="iid"  value  = "'.$iid.'" type="text" style = "width: 4em!important;position: relative;left: 14em;top: -3.4em;" readonly><br />
<label class="label-input" style = "text-align:left;" >TO:  </label><br />
<input name ="idname"  value  = "'.$idname.'" type="text" style = ""><br />
<input name ="idattn"  value  = "'.$idattn.'" type="text" style = "/*position: absolute;left:3em;top: 18em;*/"  placeholder="Attn:"><br />
<input name ="idaddress"  value  = "'.$idaddress.'" type="text" style = "/*position: absolute;left: 3em;top: 20em;*/"><br />
<input name ="idcitystatezip"  value  = "'.$idcitystatezip.'" type="text" style = "/*position: absolute;left: 3em;top: 22em;*/"><br /><br /><br />';

include "../../process/connecti.php";

$resultic=mysqli_query($con, "SELECT * FROM test_i_charges_temp WHERE 1 ");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con)."<b><br><br>query begins line 110 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}else {
// as of php 5.4 foreach
echo '<br /><table id="myTable" style ="width:45%;border: 1px solid #000000;/*position:absolute;*/top:50em;"><thead> <tr><th></th><th>Description</th><th></th><th>Qty</th><th>Rate</th><th>Amount</th><th></th></tr>';

echo '<tbody>';
$GLOBALS['x'] = 1;
foreach( $resultic as $row ) {

$icnum = $x;

echo'
  <tr id="rows" style = "border:1px solid #000000;"><td><input name="icnum'.$x.'" value="'.$x.'" style="width: 3em;"></td>
<td style="text-transform:uppercase!important;"><input name="ic_description'.$x.'" value="'.$row['ic_description'].'" style="text-transform:uppercase!important;width: 24em;"></td>
	<td style="text-transform:uppercase!important;"><input name="ic_ratedesc'.$x.'" value="'.$row['ic_ratedesc'].'" style="width: 13em;style="text-transform:uppercase!important;"></td>
	<td><input name="ic_qty'.$x.'" value="'.$row['ic_qty'].'" style="width: 3em;"></td>
	<td><input name="ic_rate'.$x.'" value="'. number_format($row['ic_rate'],0).'" style="width: 4em;"></td>
	<td><input name="ic_amount'.$x.'" value="'.$row['ic_amount'].'" style="width: 5em;"></td>
	<td><input name="ic_id'.$x.'" value="'.$row['ic_id'].'" type="hidden" readonly>
	<input name="ic_iid'.$x.'" value="'.$row['ic_iid'].'" type="hidden" readonly></td>	
	</tr>	';
	
	/*
echo'
  <tr id="rows" style = "border:1px solid #000000;">
   <td><input name="'.$icnum.'" value="'.$icnum.'" style="width: 3em;"></td>
<td><input name="'.$row['ic_description'].'" value="'.$row['ic_description'].'" style="width: 24em;"></td>
	<td><input name="'.$row['ic_ratedesc'].'" value="'.$row['ic_ratedesc'].'" style="width: 13em;"></td>
	<td><input name="'.$row['ic_qty'].'" value="'.$row['ic_qty'].'" style="width: 3em;"></td>
	<td><input name="'.$row['ic_rate'].'" value="'.$row['ic_rate'].'" style="width: 4em;"></td>
	<td><input name="'.$row['ic_amount'].'" value="'.$row['ic_amount'].'" style="width: 5em;"></td>
	<td><input name="'.$row['ic_id'].'-'.$x.'" value="'.$row['ic_id'].'" type="hidden" readonly>
	<input name="'.$row['ic_iid'].'" value="'.$row['ic_iid'].'" type="hidden" readonly>
	<input name="'.$row['ic_mid'].'" value="'.$row['ic_mid'].'" type="hidden" readonly>
	<input name="'.$row['ic_date'].'" value="'.$row['ic_date'].'" type="hidden" readonly>
	<input name="'.$row['ic_solddate'].'" value="'.$row['ic_solddate'].'" type="hidden" readonly>
	<input name="'.$row['ic_maid'].'" value="'.$row['ic_maid'].'" type="hidden" readonly>
	<input name="'.$row['ic_stock'].'" value="'.$row['ic_stock'].'" type="hidden" readonly>
	<input name="'.$row['ic_paid'].'" value="'.$row['ic_paid'].'" type="hidden" readonly>
	<input name="'.$row['ic_note'].'" value="'.$row['ic_note'].'" type="hidden" readonly>
	<input name="'.$row['ic_xtraint'].'" value="'.$row['ic_xtraint'].'" type="hidden" readonly>
	<input name="'.$row['ic_price'].'" value="'.$row['ic_price'].'" type="hidden" readonly>
	<input id="'.$x.' name "delete" type="checkbox" value="" onclick="mychick($icnum)" style="width: 2em;"></td>
	</tr>
	';
	*/

$icnum++;
$x++;
}
echo '</tbody></table><br>';?>




<?php echo'<label class="label-input" style = "/*position: absolute;left:32em;top:50em;*/">Invoice Total</label> <input name ="itotal"  value  = "'.$itotal.'" type="amount" style = "width: 5em;/*position: absolute;left: 40em;top: 50em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 48em;*/">Invoice Link</label><input name ="ipdfurl"  value  = "'.$ipdfurl.'" type="url" style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 51em;*/">Email to:</label> <input name ="idinvoiceemail"  value  = "'.$idinvoiceemail.'" type="text"  style="width:36em;text-transform:lowercase!important;"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top:54em;*/">Invoice Paid</label><input name ="iclosed"  value  = "'.$iclosed.'" type="text" style = "/*position: absolute;left: 5em;top: 70em;*/"><br />
<label class="label-input" style = "/*position: absolute;left:1em;top: 57em;*/">DealerId</label><input name ="idid"  value  = "'.$idid.'" type="text" style = "/*position: absolute;left: 8em;top: 73em;*/"><br />
<label class="label-input" style = "/*position: absolute;left: 1em;top: 60em;*/">Auctionid</label> <input name ="iaid"  value  = "'.$iaid.'" type="text" style = "/*position: absolute;left: 8em;top: 75em;*/"><br />
<button style = "" disabled> Submitchanges(all buttons disabled)</button><button style = "" disabled> Recreate Invoice</button><button style = "" disabled>Change Invoice Record</button><button style = "" disabled>Send Invoice Link</button><br />
</fieldset></form>';
//bunker/<?php echo $idid.'.'.$iid.'.pdf';
}?>
</td> <td><p id="iframe" align="center">
<iframe src="invimage.jpg" width="100%" height="1024px" style="valign:top;" allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts allow-pointer-lock name="" onError="location.href='invimage.jpg'">
  <p>Your browser does not support iframes.</p>
</iframe></p>
<img src="invimage.jpg" width="1" height="1" style="visibility:hidden" onError="document.getElementById('iframe').innerHTML = '<img src='invimage.jpg'>'">
 <!---->
</td></tr>
</tbody>
</table>

<?php
$icnum	=$x;
$icnumdata = '<td><input name="icnum'.$icnum.'.'.$x.'" value="'.$icnum.'" style="width: 3em;"></td>';
	
$icd = '<td style="text-transform:uppercase!important;"><input name="ic_description'.$x.'" value="" style="text-transform:uppercase;width: 24em;"></td>';
$icrd = '<td style="text-transform:uppercase!important;"><input name="ic_ratedesc'.$x.'" value="" style="width: 13em;text-transform:uppercase!important;"></td>';
$icq = '<td><input name="ic_qty'.$x.'" value="" style="width: 3em;"></td>';
$icr = '<td><input name="ic_rate'.$x.'" value="" style="width: 4em;"></td>';
$ica = '<td><input name="ic_amount'.$x.'" value="" style="width: 5em;border:none!important;"></td>';

$myreadonly = '<td><input name="ic_id'.$x.'" value="" type="hidden" readonly>'+'<input name="ic_iid'.'.'.$x.'" value="" type="hidden" readonly></td>';

/*
$mycheckdata= '<input name="ic_id'.'.'.$x.'" value="" type="hidden" readonly>'+
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
});


 var x =document.getElementById("myTable").rows.length; 
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
     
      	icnumdata.innerHTML = '<td><input name="icnum'+ x + '" value="'+ x +'" style="width: 3em;"></td>';
	ic_description.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_description'+x+'" value="" style="text-transform:uppercase;width: 24em;"></td>';
     	ic_ratedesc.innerHTML = '<td style="text-transform:uppercase;"><input name="ic_ratedesc'+x+'" value="" style="text-transform:uppercase!important;width: 13em;"></td>';
      	ic_qty.innerHTML = '<td><input name="ic_qty'+x+'" value="" style="width: 3em;"></td>';
       	ic_rate.innerHTML = '<td><input name="ic_rate'+x+'" value="" style="width: 4em;"></td>';
        ic_amount.innerHTML ='<td><input name="ic_amount'+x+'" value="" style="width: 5em;"></td>';
        invreadonly.innerHTML ='<td style ="borders:none!important;"><input name="ic_id'+x+'" value="" type="hidden" readonly>'+'<input name="ic_iid'+x+'" value="" type="hidden" readonly></td>';
}

function myDeleteFunction() {
    //document.getElementById("myTable").deleteRow(0);
}


$(document).on("click",'#mybtn',function(){	
    var datatoadd="<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6 </td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td></tr>";
    $('#mytable').append(datatoadd);  
}); 

	</script>
</body>
</html>