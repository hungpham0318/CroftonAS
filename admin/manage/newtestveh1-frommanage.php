<?php session_start();
//admin/manage/newtestveh.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<meta name="description" content=""/>

<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.css" rel="stylesheet" type="text/css">
<link href="../css/css.css" rel="stylesheet" type="text/css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  


		
<script type="text/javascript" src="../../../js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<link rel="stylesheet" href="../css/display.css" type="text/css" />
		<link rel="stylesheet" href="../css/dbd.css" type="text/css" />
		<link rel="stylesheet" href="../css/jquery.dataTables.min.css" type="text/css" />
		<link rel="stylesheet" href="../css/pure.css" type="text/css" />
		<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<style>
.redback {background-color:#F49AC1!important;}
.greenback {background-color:#84C98B!important;}
.yellowback {background-color:#FFF799!important;}
.blueback {background-color:#ABE1FA!important;}
.purpleback {background-color:#B0ACD5!important;}
.orangeback {background-color:#F7966B!important;}
.display_table {text-transform:uppercase;
overflow:auto!important;}
.container {width:100%; overflow:auto!important;}</style>

<script>
$(document).ready(function() {
   $('#example').dataTable( {
    "paging":   false,
  "createdRow": function( row, data, dataIndex ) {
    if ( data[15] == "0" ) {
      $(row).addClass( 'redback' );}
      else if ( data[15] == "1" ) {
      $(row).addClass( 'yellowback' );                    }
                
                else if ( data[15] == "2" ) {
      $(row).addClass( 'greenback' );                    }
                
                else if ( data[15] == "3" ) {
      $(row).addClass( 'blueback' );                    }
      else if ( data[15] == "4" ) {
      $(row).addClass( 'purpleback' );                    }
      else if ( data[15] == "5" ) {
      $(row).addClass( 'orangeback' );                    }
                
       }
            });


var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
   // $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();

$(".announce").click(function(){ // Click to only happen on announce links
     $("#uid").val($(this).data('id'));
     $("#uname").val($(this).data('uname'));
     $("#uphone").val($(this).data('uphone'));
     $("#uemail").val($(this).data('uemail'));
     $('#').modal('show');
   });
$(".d_announce").click(function(){ // Click to only happen on d_announce links
     $("#did").val($(this).data('did'));
     $("#dname").val($(this).data('dname'));
     $("#sdcontact").val($(this).data('inpSDContact'));
     $("#dphone").val($(this).data('inpDPhone'));
     $('#').modal('show');
   });
 
});
</script>



</head>
<body>

	<div class="container">
	
		<div id="banner">
<img src="../../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />
</div>


<div id="navigation">
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'manage-incmenu.htm';
	}?>
	
	</div>
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;zoom: 70%;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
		//begin insert
include "../process/connect.php";
echo '<div id="table-scroll"><table id="example" class="display" cellspacing="0" width="80%"  style="overflow-x:scroll;overflow-y:scroll;">';


//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
     $query2 = mysql_query("SELECT r_record.r_id, r_record.r_uid, r_record.r_did, r_record.dname, r_record.inpFiveMilNum, r_record.inpYourEmail, r_record.inpSaleDate, r_record.SaleDate, r_record.inpYourName, r_record.inpSDContact, r_record.inpDPhone, r_record.inpYourPhone, r_record.auction, r_record.rtime, v_record.v_id, v_record.v_did, v_record.v_uid, v_record.v_rid, v_record.txtVIN, v_record.txtYear, v_record.txtMake, v_record.txtModel, v_record.txtColor, v_record.txtMileage, v_record.txtAnon, v_record.inpvehStock, v_record.popDetail, v_record.txtTrans, v_record.txtPrice, v_record.r_time,v_record.v_status FROM v_record INNER JOIN r_record ON (v_record.v_did = r_record.r_did) AND (v_record.v_uid = r_record.r_uid) AND (v_record.v_rid = r_record.r_id) AND (v_record.r_time = r_record.rtime)  LIMIT 0, 5000");
	
	echo '<thead><tr><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Detail</th><th>Transport</th><th>Registrant</th><th>Dealership</th><th>Announce</th><th>Stock#</th><th>auction</th><th>status</th><th>ViewRegInfo</th><th>EditVehInfo</th></tr></thead>';
	echo '<tfoot><tr><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Detail</th><th>Transport</th><th>Registrant</th><th>Dealership</th><th>Announce</th><th>Stock#</th><th>auction</th><th>status</th><th>ViewRegInfo</th><th>EditVehInfo</th></tr></tfoot><tbody class="display_table">';
	
    while($row = mysql_fetch_array($query2))
   {
    $vehid = $row[v_id];
	echo '<tr><td>'.$row['SaleDate'].'</td><td>'.$row['txtYear'].'</td><td>'.$row['txtMake'].'</td><td>'.$row['txtModel'].'</td><td>'.$row['txtMileage'].'</td><td>'.$row['txtPrice'].'</td><td>'.$row['txtColor'].'</td><td>'.$row['txtVIN'].'</td><td>'.$row['popDetail'].'</td><td>'.$row['txtTrans'].'</td>';
	echo '<td><a class="btn announce" data-toggle="modal" data-id="'.$row['v_uid'].'" data-uname="'.$row['inpYourName'].'" data-uphone="'.$row['inpYourPhone'].'" data-uemail="'.$row['inpYourEmail'].'" data-modal-id="popup1">'.$row['inpYourName']."</a></td>";
	//echo "<td><a href='#?uname=".$row['inpYourName']."' data-modal-id='popup1'>".$row['inpYourName']."</a></td>";
	//<a class="btn btn-primary announce" data-toggle="modal" data-id="107" >Announce</a>
	//echo "<td><a href='#?uname=".$row['inpYourName']."' data-modal-id='popup1'>".$row['inpYourName']."</a></td>";
	//<a  href="#" data-modal-id="popup1"> Pop Up One</a>
	echo '<td><a class="btn d_announce" data-toggle="modal" data-did="'.$row['v_did'].'" data-dname="'.$row['dname'].'" data-sdcontact="'.$row['inpSDContact'].'" data-dphone="'.$row['inpDPhone'].'" data-modal-id="popup2">'.$row['dname']."</a></td>";
	//echo "<td><a href='manage/viewdealerinfo.php?d_id=".$row['v_did']."'>".$row['dname']."</a></td>";
	echo '<td>'.$row['txtAnon'].'</td><td>'.$row['inpvehStock'].'</td><td>'.$row['auction'].'</td><td>'.$row['v_status'].'</td>';

	
   
   
   
   
   
	echo "<td><a href='manage/viewreginfo.php?r_id=".$row['v_rid']."'>".$row['RegRecord']."</a>".$row['inpYourName']."</td>";
	
echo "<td><a href='manage/vehiclerecord-edit.php?v_id=".$row['v_id']."'>".$row['v_id']."</a></td></tr>";
	
    }
  
   
	

 echo "</tbody></table></div>";  
 echo "</tbody></table></div>";  

 mysql_close();
      
}
//session_destroy();
?>  <!-- end insert -->

<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3>Pop Up One</h3>
  </header>
  <div class="modal-body">
  <label>UID</label>
  <label>uid</label><input type="text" name="uid" id="uid" value=""></br>
  <label>uname</label><input type="text" name="uname" id="uname" value=""></br>
  <label>uemail</label><input type="text" name="uemail" id="uemail" value=""></br>
  <label>uphone</label><input type="text" name="uphone" id="uphone" value=""></br>
    
  </div>
  <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>
</div>
<div id="popup2" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3>Modal Popup</h3>
  </header>
  <div class="modal-body">
    <label>dID</label>
  <label>did</label><input type="text" name="did" id="did" value=""></br>
  <label>dname</label><input type="text" name="dname" id="dname" value=""></br>
  <label>sdcontact</label><input type="text" name="sdcontact" id="sdcontact" value=""></br>
  <label>dphone</label><input type="text" name="dphone" id="dphone" value=""></br>
  </div>
  <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>
</div>


</div></br>
<input type="button" class="pure-button button-success" onclick="tableToExcel('testTable', 'Registrations by Date')" value="Export to Excel">

</div></br>


</body>
</html>