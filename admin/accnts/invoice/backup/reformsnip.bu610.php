<?php session_start();
$title="Edit/Correct Invoice";
$qiid=$_GET['iid'];
$qipid=$_GET['ipid'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<?php include "../../sales/stylehead-begin.html";?>


    /* For mobile phones: */
   body{font-size: 13px;}

.label-input {
width: 20%;
text-align:left;
height: 1.5em;
vertical-align:middle;
display:inline-block;
line-height:1em;
font-size:1em;

}
input {  
padding: 5px 10px;
height: 1.5em;
width:25em;
/*margin : 0 auto;*/
border: none;
/* border: 1px solid #660000;*/
border-radius : 5px;
box-shadow : 0 1px 1px #ccc inset, 0 1px 0 #ccc;
display:inline-block;
margin : 0 auto;
  font-size:1em;
  line-height:1em;

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
    border: 2px groove (internal value);
    position: absolute;
    left: 10px;
    top: 6.3em;
    font-size:1em;
    line-height:1em;
}
#myTable input{
font-size:14px;
font-weight:500;
font-family:'Arial', sans-serif;
box-shadow: none;
line-height: 1.4em;
height:1.4em;

}
#myTable thead tr{
border-top:1px solid #000000!important;
padding:10px;
border-bottom:1px solid #000000!important;
border-left:none!important;
}
#myTable {
position:absolute;
left:2em;
top:28em;
border-collapse:collapse;
border-left:none!important;
}
#myTable td{
border-right:1px solid #000000;
border-left:none!important;
}
#myTable tr{border-top:1px solid #000000;
}
<?php include "../../sales/stylehead-end.html";?>
<body>
<?php 
include "../../worldview/css/snow-admin-nav.html";
echo '<img src = "invimage.png" style = "position: absolute;left: 1em;top: 6.5em;text-align:left;width:45%;">';?>
<?php
include "../../process/connecti.php";

$resultit=mysqli_query($con, "SELECT * FROM invoices WHERE iid = $qiid ");

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
$idate=$row['idate'];
$itotal=$row['itotal'];
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
    

echo '<table style = "width:100%;"><thead><tr><th style = "width:50%!important;" ></th><th style = "width:50%!important;" ></th></tr></thead>
<tbody><tr><td>
<form id="invcorrect" method="post" action = "" >
<fieldset style="vertical-align: top; height: 1024px;">
<label class="label-input" style = "position: absolute;left: 37em;top: 7.5em;text-align:left;">Date</label> <input name ="idate"  value  = "'.$idate.'" type="text" style = "width: 7em!important;position: absolute;left:40em;top: 7.5em;">
<label class="label-input" style = "position: absolute;left: 18em;top: 10em;">Invoice #</label><input name ="iid"  value  = "'.$iid.'" type="text" style = "width: 4em!important;position: absolute;left: 23em;top: 10em;" readonly>
<label class="label-input" style = "position: absolute;left:3em;top: 14em;" >To:  </label>
<input name ="idname"  value  = "'.$idname.'" type="text" style = "position: absolute;left: 3em;top: 16em;">
<input name ="idattn"  value  = "'.$idattn.'" type="text" style = "position: absolute;left:3em;top: 18em;"  placeholder="Attn:">
<input name ="idaddress"  value  = "'.$idaddress.'" type="text" style = "position: absolute;left: 3em;top: 20em;">
<input name ="idcitystatezip"  value  = "'.$idcitystatezip.'" type="text" style = "position: absolute;left: 3em;top: 22em;">';

include "../../process/connecti.php";

$resultic=mysqli_query($con, "SELECT * FROM i_charges WHERE ic_iid = $qiid ");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con)."<b><br><br>query begins line 110 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}else {
// as of php 5.4 foreach
echo '<table id="myTable" style ="width:45%;border: 1px solid #000000;"position:absolute;top:50em;"><thead> <tr><th><button onclick="myCreateFunction()">New</button></th><th>Description</th><th></th><th>Qty</th><th>Rate</th><th>Amount</th><th></th></tr>';
echo '<tbody>';
 $x=1;  
foreach( $resultic as $row ) {

$icnum = $x;
echo'
  <tr id="rows" style = "position:relative;top:32em;left:2em;border:1px solid #000000;">
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
	<input id="'.$x.' name "delete" type="checkbox" value="" onclick="myCheck($icnum)" style="width: 2em;"></td>
	</tr>
	';


$x++;
}

//echo '<button onclick="myCreateFunction()">Create row</button>';
echo '</tbody></table><br>';?>
<div id="add_new">ADD NEW</div>

<?php echo'<label class="label-input" style = "position: absolute;left:32em;top:50em;">Invoice Total</label> <input name ="itotal"  value  = "'.$itotal.'" type="text" style = "width: 5em;position: absolute;left: 40em;top: 50em;">
<label class="label-input" style = "position: absolute;left: 1em;top: 48em;">Invoice Link</label><input name ="ipdfurl"  value  = "'.$ipdfurl.'" type="text" style = "position: absolute;left: 5em;top: 52em;">
<label class="label-input" style = "position: absolute;left: 1em;top: 51em;">Email to:</label> <input name ="idinvoiceemail"  value  = "'.$idinvoiceemail.'" type="text" style = "position: absolute;left: 5em;top:54em;">
<label class="label-input" style = "position: absolute;left: 1em;top:54em;">Invoice Paid</label><input name ="iclosed"  value  = "'.$iclosed.'" type="text" style = "position: absolute;left: 5em;top: 70em;">
<label class="label-input" style = "position: absolute;left:1em;top: 57em;">DealerId</label><input name ="idid"  value  = "'.$idid.'" type="text" style = "position: absolute;left: 8em;top: 73em;">
<label class="label-input" style = "position: absolute;left: 1em;top: 60em;">Auctionid</label> <input name ="iaid"  value  = "'.$iaid.'" type="text" style = "position: absolute;left: 8em;top: 75em;">
<button style = "position: absolute;left: 45%;top: 62em;"> Submitchanges</button>
</fieldset></form>';}?>
</td> <td>
 <!--<iframe src="bunker/<?php echo $idid.'.'.$iid.'.pdf';?>" width="100%" height="1024px" style="valign:top;" allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts allow-pointer-lock name="">
  <p>Your browser does not support iframes.</p>
</iframe>-->
</td></tr>
</tbody>
</table>

<?php
$mycheckdata= '<input name="ic_id'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_iid'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_mid'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_date'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_solddate'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_maid'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_stock'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_paid'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_note'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_xtraint'.'.'.$x.'" value="" type="hidden" readonly>
	<input name="ic_price'.'.'.$x.'" value="" type="hidden" readonly>
	<input id="'.$x.'" name= "delete'.'.'.$x.'" type="checkbox" value="" onclick="myCheck()" style="width: 2em;">';
$icd = '<td><input name="ic_description'.'.'.$x.'" value="" style="width: 24em;"></td>';
$icrd = '<td><input name="ic_ratedesc'.'.'.$x.'" value="" style="width: 13em;"></td>';
$icq = '<td><input name="ic_qty'.'.'.$x.'" value="" style="width: 3em;"></td>';
$icr = '<td><input name="ic_rate'.'.'.$x.'" value="" style="width: 4em;"></td>';
$ica = '<td><input name="ic_amount'.'.'.$x.'" value="" style="width: 5em;"></td>';
$icnum	=$x;
	?>
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




function myCreateFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var icnum= row.insertCell(0);
    var ic_description = row.insertCell(1);
    var ic_ratedesc = row.insertCell(2);
    var ic_qty = row.insertCell(3);
    var ic_rate = row.insertCell(4);
    var ic_amount = row.insertCell(5);
      var myCheck = row.insertCell(6);
    icnum.innerHTML = '<?php echo $icnum;?>';
    ic_description.innerHTML = '<?php echo $icd;?>';
     ic_ratedesc.innerHTML = '<?php echo $icrd;?>';
      ic_qty.innerHTML = '<?php echo $icq;?>';
       ic_rate.innerHTML = '<?php echo $icr;?>';
         ic_amount.innerHTML ='<?php echo $ica;?>';
    myCheck.innerHTML = '<?php echo $mycheckdata;?>';
}
function myCheck() {
   // document.getElementById("<?php echo $icnum;?>").deleteRow(<?php echo $icnum;?>);
}
function myDeleteFunction() {
    document.getElementById("myTable").deleteRow(0);
}


$(document).on("click",'#mybtn',function(){	
    var datatoadd="<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6 </td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td></tr>";
    $('#mytable').append(datatoadd);  
}); 

	</script>
</body>
</html>