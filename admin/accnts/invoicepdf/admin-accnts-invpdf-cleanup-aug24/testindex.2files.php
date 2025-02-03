<?php 
$qmid=$_GET['mid'];
$company = "Crofton Auction Services";
$address = "5 Park Place, Suite 519";
$address2 = "Annapolis, MD 21401";
$address3 = $address." ".$address2;
$email = "crofton@comcast.net";
$telephone = "301-706-7951";
echo $qmid;
//get last invoice id and add one and assign to iid




//SELECT FROM master 

include "../../process/connecti.php";
$qmid=mysqli_real_escape_string($con, $_GET['mid']);
$result = mysqli_query($con, "SELECT `maid`, `mdid`, `mvin`, `myear`, `mmodel`, `mstock`, `mstatus`, `msubstatus`, `msolddate`, `minvid`, `did`,`dnumber`,`dname`,`daddress`,`dcity`,`dstate`,`dzip` 
FROM master, dealers WHERE `mid` = $qmid AND `did` = mdid");
// mysqli_query returns false if something went wrong with the query
if($result === FALSE) { 
     die(mysqli_error($con)."First master query failed <br>query begins line 15 - This error probably means no record number was sent -or- it cannot find the record that matches the record sent in the url</b>");
    //or die(mysql_error($con));

    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result as $row ) {
$myear = $row['myear'];
echo $myear;
$mmodel = $row['mmodel'];
echo $mmodel;

$mvin = $row['mvin'];
echo $mvin;
$msolddate = $row['msolddate'];
$mstatus = $row['mstatus'];
$msubstatus = $row['msubstatus'];
$muid =	$row['muid'];
$maid =	$row['maid'];
$msoldprice = $row['msoldprice'];
$minvid = $row['minvid'];

$mstock = $row['mstock'];

//from dealers

$did = $row['did'];
$dname = $row['dname'];
$dattn = $row['dattn'];
$daddress = $row['daddress'];
$dcity = $row['dcity'];
$dstate = $row['dstate'];
$dzip = $row['dzip'];
$daddress2 = $dcity.' '.$dstate.' '.$dzip;
mysqli_close($result);}
//fields for single record invoices



include "../../process/connecti.php";

//$qmid = mysqli_real_escape_string($con, $_GET['mid']);
$lastone = mysqli_query($con, "SELECT `iid` from `invoices` ORDER BY iid DESC LIMIT 1");

// mysqli_query returns false if something went wrong with the query
if($lastone === FALSE) { 
     die(mysqli_error($con));
    //or die(mysql_error($con));
}else{
foreach ($lastone as $_row){
$lastiid= $_row['iid'];
echo $lastiid;
mysqli_close($con);}
$nextiid = $lastiid++;
echo $nextiid;
$iid=$nextiid;

$ic_iid = $iid;
$partone=$iid;
$apndx="0".substr($j/10, -1);

$ic_id = $partone.".".$apndx;
//$ic_description = $myear."&nbsp;&nbsp;".$mmodel."&nbsp;&nbsp;".$mvin."&nbsp;&nbsp;";
$ic_solddate = $msoldate;
$ic_mid = $mid;
$ic_maid = $maid;
$ic_stock = $mstock;
$ic_description = substr($myear, -2)." &middot; ".$mmodel." &middot; ".substr($mvin, -8)." &middot; ".$mstock." &middot; ".$msolddate." &middot; REP FEE "; 
$ic_description2 = "Stock #".$mstock ." &middot; Date Sold: ".$msolddate; 
$ic_qty = 1;
$ic_rate = 150;
$ic_price = $ic_rate*$ic_qty;
$i_amount = $ic_price;

$price = $ic_qty*$ic_rate;
$itotal = $i_amount;
//for invoices (fields that will remain the same after form submit)
$iid=$nextiid;
$iaid = $maid;
$idid = $did;
$idate = date('m-d-Y');
$idname = $dname;
$idattn = $dattn;
$idaddress = $daddress;
$idaddress2 = $dcity.' '.$dstate.' '.$dzip;
//variables that won't change after post
$ic_paid = false;



//reassign single record fields for array

//after initial query to db for master and dealers fields
//assign i_charges variables (after form submission)

//$ic_iid = $_POST['iid'];
//$ic_qty = $_POST['ic_qty'];
//$ic_rate = $_POST['ic_rate'];
//$ic_price = $ic_rate*$ic_qty;
//$itotal = $i_amount;
//$price=$ic_qty*$ic_rate;
//$year = substr($myear, -2);

//status
//$ipdfurl = "bunker"."\/".$row['did'].\"/".$iid.".".date('Y-m-d').;

//ic_iid mi_iid, ui_iid, ,di_iid
} }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create a PDF invoice with PHP</title>
<style>
body{background-color:#550000;
}
a{
color:#550000;
text-decoration:none;
}
a:hover{
color:#770000;
text-decoration:underline;
}
#content{
width:960px;
height:960px;background-image:url(img/bg.jpg);

background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:960px;
height:30px;
padding-top:15px;
color:#666666;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#440001;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:960px;
height:450px;
margin:15px;
color:#550000;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:450px;
height:450px;
float:left;
}
#body_r{
width:450px;
height:450px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #666;
background-image:url(img/paper_fibers.png);
color:#440000;
margin-left:15px;
padding:5px;
}
#up{
width:960px;
height:40px;
margin:auto;
margin-top:10px;
}</style>
</head>

<body>
<div id="content">
<div id="title" align="center">Create New Invoice | Crofton Auction Services</div>
<div id="body">
<form action="testindex2.2files.part2.php" method="post" >
<div id="body_l" class="">
<?php echo "Dealership: ".$dname;
echo "<br>";
echo "Attn: ".$dattn;
echo "<br>";

echo $daddress;
echo "<br>";
echo "Item: ".$ic_description;
echo "<br>";
echo "Sold Date: ".$msolddate;
echo "<br>";
echo "Amount: ".$ic_amount;
echo "<br>";
echo "Invoice Id: ".$iid;
echo "<br>";

echo "chargeid: ".$ic_id;
echo "<br>";
echo "chargedate: ".$ic_date;
echo "<br>";
echo "Sold Date: ".$ic_solddate;
echo "<br>";
echo "Qty: ".$ic_qty;
echo "<br>";
echo "Rate: ".$ic_rate;
echo "<br>";
echo "Stock Number: ".$ic_stock;
echo "<br>";
echo "Notes: ".$ic_notes;
echo "<br>";?>
</div>
<div id="body_r">
<div id="ic_description"><label>Item:</label><br><input name="ic_description" placeholder="Item: <?php echo $ic_description;?>" type="text" value="<?php echo $ic_description;?>"/>
</div>


<div id="ic_qty"><label>Qty:</label><br><input name="ic_qty" placeholder= "<?php echo $ic_qty;?>" type="text" value= "<?php echo $ic_qty;?>"  /></div>

<div id="ic_rate"><label>Rate:</label><br><input name="ic_rate" placeholder="" type="text" value="<?php echo $ic_rate;?>"/></div>
<!--<div id="Price"><label>Fee:</label><br><input name="price" placeholder="Amount: <?php echo $price;?>" type="text" value="<?php echo $price;?>"/></div> -->


<div id="iid"><label>Invoice Id:</label><br><input name="iid" placeholder="Invoice number: <?php echo $nextiid;?>" type="text" value="<?php echo $nextiid;?>" ></div>

<div id="dattn"><label>Attention:</label><br><input name= "dattn" placeholder="Attention: <?php echo $dattn;?>" type="text" value="<?php echo $dattn;?>" /></div>


<!--<div id="ic_date"><label>Sold Date:</label><br><input name="ic_date" placeholder="Date Sold:<?php echo $msolddate;?>" type="text" value="<?php echo $msolddate;?>"  /></div>-->

<div id="ic_notes"><label>Notes:</label><br><input name="ic_notes" placeholder="Additional note for this invoice." type="text" value="<?php echo $ic_notes;?>"  /></div>
</div>
<!--<div id="up" align="center"><input name="file" disabled="disabled" type="file" /></div>-->
<br>
<div id="up" class=""  align="center"><input name="submit" style="margin-top:60px;" value="Create Invoice" type="submit"/><br /><br />
</div>
<div id="down" class="" align="center">
</div>
</form>
</div>
</div>
<div id="footer" align="center">..</a></div>
</body>
</html>