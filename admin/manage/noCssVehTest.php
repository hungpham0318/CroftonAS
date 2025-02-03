<?php session_start();
//admin/manage/newtestveh.php
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="admin"){$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];}else{
		}?>
<!DOCTYPE html>

<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content=""/>
			
	<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<!-- dataTables jquery -->
	

	<script type="text/javascript" src="https://cdn.datatables.net/s/bs-3.3.5/jqc-1.11.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.js"></script>	
		
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.foundation.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs-3.3.5/jqc-1.11.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.css"/>
 

<style>
.redback {background-color:#F49AC1!important;}
.greenback {background-color:#84C98B!important;}
.yellowback {background-color:#FFF799!important;}
.blueback {background-color:#ABE1FA!important;}
.purpleback {background-color:#B0ACD5!important;}
.orangeback {background-color:#F7966B!important;}
</style>

<script>
$(document).ready(function() {
   $('#example').dataTable( { 
   "scrollX": true,
         "dom": '<"wrapper"fliptB>',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
  "createdRow": function( row, data, dataIndex ) {
    if ( data[17] == "0" ) {
      $(row).addClass( 'redback' );}
		else if ( data[17] == "1" ) {
			$(row).addClass( 'yellowback' );                    }
			else if ( data[17] == "2" ) {
				$(row).addClass( 'greenback' );                    }
				else if ( data[17] == "3" ) {
					$(row).addClass( 'blueback' );                    }
					else if ( data[17] == "4" ) {
						$(row).addClass( 'purpleback' );                    }
						else if ( data[17] == "5" ) {
							$(row).addClass( 'orangeback' );                    }
}
});
$(document).on("click", ".open-viewUInfoModal", function () {
     var uid = $(this).data('id');
     var uname = $(this).data('uname');
     var uphone = $(this).data('uphone');
     var uemail = $(this).data('email');
      
     
     $(".modal-body #uid").val($(this).data('id'));
     $(".modal-body #uname").val($(this).data('uname'));
     $(".modal-body #uphone").val($(this).data('uphone'));
     $(".modal-body #uemail").val($(this).data('uemail'));
});
$(document).on("click", ".open-viewcomboInfoModal", function () {
     var myBookId = $(this).data('id');
     
     var dname = $(this).data('dname');
     var dphone = $(this).data('dphone');
     var sdcontact = $(this).data('sdcontact');
     var uname = $(this).data('uname');
     var uphone = $(this).data('uphone');
     var uemail = $(this).data('email');
     
         
     $(".modal-body #uid").val($(this).data('id'));
     $(".modal-body #uname").val($(this).data('uname'));
     $(".modal-body #uphone").val($(this).data('uphone'));
     $(".modal-body #uemail").val($(this).data('uemail'));
     $(".modal-body #bookId").val( myBookId );
     
     $(".modal-body #did").val($(this).data('did'));
     $(".modal-body #dname").val($(this).data('dname'));
     $(".modal-body #dphone").val($(this).data('dphone'));
     $(".modal-body #sdcontact").val($(this).data('sdcontact'));
});
$(document).on("click", ".open-viewDInfoModal", function () {
     var myBookId = $(this).data('id');
     
     var dname = $(this).data('dname');
     var dphone = $(this).data('dphone');
     var sdcontact = $(this).data('sdcontact');
     
     $(".modal-body #bookId").val( myBookId );
     
     $(".modal-body #did").val($(this).data('did'));
     $(".modal-body #dname").val($(this).data('dname'));
     $(".modal-body #dphone").val($(this).data('dphone'));
     $(".modal-body #sdcontact").val($(this).data('sdcontact'));
});
$(document).on("click", ".open-viewRInfoModal", function () {
     var myBookId = $(this).data('id');
     
     var rtime = $(this).data('dname');
     var dphone = $(this).data('dphone');
     var sdcontact = $(this).data('sdcontact');
     
     $(".modal-body #bookId").val( myBookId );
     
     $(".modal-body #did").val($(this).data('did'));
     $(".modal-body #dname").val($(this).data('dname'));
     $(".modal-body #dphone").val($(this).data('dphone'));
     $(".modal-body #sdcontact").val($(this).data('sdcontact'));
});
     
});
</script>
</head>
<body>

<div ">
	
	<div id="banner">
	<!--<img src="../../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />-->
	</div>

	<div id="navigation">
		<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
			{}//else{ include 'manage-incmenu.htm';}?>
	</div><br><br>
	
	<div id="section1"> 

<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
				{echo "Please log in to see this page";}
				else{include "../process/connect.php";
	//echo <table id="example" class="display nowrap" cellspacing="0" width="auto" style="overflow-x:scroll;overflow-y:scroll;">';
echo '<table id="example" class="display" cellspacing="0" width="100%">';
//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
     $query2 = mysql_query("SELECT r_record.r_id, r_record.r_uid, r_record.r_did, r_record.dname, r_record.inpFiveMilNum, r_record.inpYourEmail, r_record.inpSaleDate, r_record.SaleDate, r_record.inpYourName, r_record.inpSDContact, r_record.inpDPhone, r_record.inpYourPhone, r_record.auction, r_record.rtime, v_record.v_id, v_record.v_did, v_record.v_uid, v_record.v_rid, v_record.txtVIN, v_record.txtYear, v_record.txtMake, v_record.txtModel, v_record.txtColor, v_record.txtMileage, v_record.txtAnon, v_record.inpvehStock, v_record.popDetail, v_record.txtTrans, v_record.txtPrice, v_record.r_time,v_record.v_status FROM v_record INNER JOIN r_record ON (v_record.v_did = r_record.r_did) AND (v_record.v_uid = r_record.r_uid) AND (v_record.v_rid = r_record.r_id) AND (v_record.r_time = r_record.rtime) WHERE (`v_id` > 1 AND `v_uid` != 8) LIMIT 0, 50000");
	
	echo '<thead><tr><th>VehId</th><th>RegId</th><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Stock#</th><th>Detail</th><th>Transport</th><th>Registrant-Dealership</th><th>Announce</th><th>auction</th><th>status</th></tr></thead>';
	echo '<tfoot><tr><th>VehicleId</th><th>RegId</th><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Stock#</th><th>Detail</th><th>Transport</th><th>Registrant-Dealership</th><th>Announce</th><th>auction</th><th>status</th></tr></tfoot><tbody class="display">';
	
    while($row = mysql_fetch_array($query2))
   {
    $vehid = $row[v_id];
    echo '<tr><td>'.$row['v_id'].'</td>';
    echo "<td><a href='manage/viewreginfo.php?r_id=".$row['v_rid']."'>".$row['v_rid']."</a></td>";
	echo '<td>'.$row['SaleDate'].'</td><td>'.$row['txtYear'].'</td><td>'.$row['txtMake'].'</td><td>'.$row['txtModel'].'</td><td>'.$row['txtMileage'].'</td><td>'.$row['txtPrice'].'</td><td>'.$row['txtColor'].'</td><td>'.$row['txtVIN'].'</td><td>'.$row['inpvehStock'].'</td><td>'.$row['popDetail'].'</td><td>'.$row['txtTrans'].'</td>';
	
	echo '<td><a data-toggle="modal"   class="open-viewUInfoModal" href="#viewUInfoModal" title="Add this item" data-id="'.$row['v_uid'].'" data-uname="'.$row['inpYourName'].'" data-uphone="'.$row['inpYourPhone'].'" data-uemail="'.$row['inpYourEmail'].'" data-modal-id="popup1">'.$row['inpYourName']."&nbsp</a>-";
	
	echo '&nbsp<a data-toggle="modal"  title="Add this item" class="open-viewDInfoModal" href="#viewDInfoModal" data-did="'.$row['v_did'].'" data-dname="'.$row['dname'].'" data-sdcontact="'.$row['inpSDContact'].'" data-dphone="'.$row['inpDPhone'].'" data-modal-id="popup2">'.$row['dname']."</a></td>";
	
	echo '<td>'.$row['txtAnon'].'</td><td>'.$row['auction'].'</td><td>'.$row['v_status'].'</td></tr>';

	
	

	
    }
	echo "</tbody></table></div>";  
  
mysql_close();
      
}
//session_destroy();
?> 


<div id="viewUInfoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">×</button>
				<h3>Registrant/User Info</h3>
			</div>
			<div class="modal-body" id="viewInfoModal">
			<input type="hidden" name="uid" id="uid" value=""><br><br>
			<input type="text" name="uname" id="uname" value=""><br><br>
			<input type="text" name="uemail" id="uemail" value=""><br><br>
			<input  type="text" name="uphone" id="uphone" value=""><br><br><p></p>
			</div>
		</div>
	</div>
</div>

<div id="viewDInfoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">×</button>
				<h3>Dealership Contact</h3>
			</div>
			<div class="modal-body">
			<input type="text" name="dname" id="dname" value=""><br><br>
			<input  type="text" name="sdcontact" id="sdcontact" value=""><br><br>
			<input  type="text" name="dphone" id="dphone" value=""><br><br>
			<input  type="hidden" name="did" id="did" value=""><br><br><p></p>
			</div>
		</div>  
	</div>
</div>

<div id="viewRInfoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">×</button>
				<h3>Dealership Contact</h3>
			</div>
			<div class="modal-body">
			<input type="text" name="rtime" id="rtime" value=""><br><br>
			<input type="text" name="sdcontact" id="sdcontact" value=""><br><br>
			<input type="text" name="dphone" id="dphone" value=""><br><br>
			<input type="hidden" name="did" id="did" value=""><br><br><p></p>
			</div>
		</div>  
	</div>
</div>

</div><br>
</div><br>
</body>
</html>