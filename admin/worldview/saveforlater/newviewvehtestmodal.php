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
		
				<link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.css" rel="stylesheet" type="text/css">
	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<!-- dataTables jquery 
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>  -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>  
		
	<!-- dataTables jquery extras for export features -->	
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"></script>  
<script src="../../Editor16/js/dataTables.editor.min.js"></script>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<!--<link rel="stylesheet" href="../css/purebuttons.css" type="text/css" />-->
		<!--<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />-->

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" type="text/css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.1/css/buttons.dataTables.min.css" type="text/css" />
<link rel="stylesheet" href="../../Editor16/css/editor.dataTables.min.css">
		
		
		
		
		
		
		
		
		
		
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.1.3/css/autoFill.jqueryui.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.2.0/css/keyTable.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.0.0/css/rowGroup.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.jqueryui.min.css"/>
		
		
		
		
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
 

		
		
		
		
		
		
		
		
		
		
		
		
		

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="../css/admin.css" type="text/css" />
		<!--<link rel="stylesheet" href="../css/purebuttons.css" type="text/css" />-->
		<!--<link href="../../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />-->

		
<link rel="stylesheet" href="../../Editor16/css/editor.dataTables.min.css">
<style>
.redback {background-color:#F49AC1!important;}
.greenback {background-color:#84C98B!important;}
.yellowback {background-color:#FFF799!important;}
.blueback {background-color:#ABE1FA!important;}
.purpleback {background-color:#B0ACD5!important;}
.orangeback {background-color:#F7966B!important;}
</style>

</head>
<body class="container">

<div class="container">
	
	<div id="banner">
	<!--<img src="../../../images/croftonasbanner3.png" alt="crofton auction services banner for website" />-->
	</div>

	<div id="navigation">
		<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
			{}else{ include '../manage/manage-incmenu.htm';}?>
	</div></br></br>
	
	<div id="section1"> <span style ="font-size:.8em; line-height:.8em;zoom: 100%;">

<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
				{echo "Please log in to see this page";}
				else{include "../process/connect.php";
	echo '<div id="table-scroll"><table id="example" class="display nowrap" cellspacing="0" width="auto" style="overflow-x:scroll;overflow-y:scroll;">';

//echo '<tr><td style="border:none;line-height: 2em;color:#ffffff;">.</td></tr>';
    $sdate = $row[SaleDate];
     $query2 = mysql_query("SELECT r_record.r_id, r_record.r_uid, r_record.r_did, r_record.dname, r_record.inpFiveMilNum, r_record.inpYourEmail, r_record.inpSaleDate, r_record.SaleDate, r_record.inpYourName, r_record.inpSDContact, r_record.inpDPhone, r_record.inpYourPhone, r_record.auction, r_record.rtime, v_record.v_id, v_record.v_did, v_record.v_uid, v_record.v_rid, v_record.txtVIN, v_record.txtYear, v_record.txtMake, v_record.txtModel, v_record.txtColor, v_record.txtMileage, v_record.txtAnon, v_record.inpvehStock, v_record.popDetail, v_record.txtTrans, v_record.txtPrice, v_record.r_time,v_record.v_status FROM v_record INNER JOIN r_record ON (v_record.v_did = r_record.r_did) AND (v_record.v_uid = r_record.r_uid) AND (v_record.v_rid = r_record.r_id) AND (v_record.r_time = r_record.rtime) WHERE (`v_id` > 2323 AND `v_uid` != 8) LIMIT 0, 5000");
	
	echo '<thead><tr><th>VehId</th><th>RegId</th><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Stock#</th><th>Detail</th><th>Transport</th><th>Registrant-Dealership</th><th>Announce</th><th>auction</th><th>status</th></tr></thead>';
	echo '<tfoot><tr><th>VehicleId</th><th>RegId</th><th>Sale Date</th><th>Year</th><th>Make</th><th>Model</th><th>Mileage</th><th>Floor</th><th>Color</th><th>VIN</th><th>Stock#</th><th>Detail</th><th>Transport</th><th>Registrant-Dealership</th><th>Announce</th><th>auction</th><th>status</th></tr></tfoot><tbody class="display">';
	
    while($row = mysql_fetch_array($query2))
   {
    $vehid = $row[v_id];
    echo '<tr><td>'.$row['v_id'].'</td>';
    echo "<td><a href='manage/viewreginfo.php?r_id=".$row['v_rid']."'>".$row['v_rid']."</a></td>";
	echo '<td>'.$row['SaleDate'].'</td><td>'.$row['txtYear'].'</td><td>'.$row['txtMake'].'</td><td>'.$row['txtModel'].'</td><td>'.$row['txtMileage'].'</td><td>'.$row['txtPrice'].'</td><td>'.$row['txtColor'].'</td><td>'.$row['txtVIN'].'</td><td>'.$row['inpvehStock'].'</td><td>'.$row['popDetail'].'</td><td>'.$row['txtTrans'].'</td>';
	
	echo '<td><a data-toggle="modal"   class="open-viewInfoModal" href="#viewInfoModal" title="Add this item" data-id="'.$row['v_uid'].'" data-uname="'.$row['inpYourName'].'" data-uphone="'.$row['inpYourPhone'].'" data-uemail="'.$row['inpYourEmail'].'" data-modal-id="popup1">'.$row['inpYourName']."&nbsp</a>-";
	
	echo '&nbsp<a data-toggle="modal"  title="Add this item" class="open-viewDInfoModal" href="#viewDInfoModal" data-did="'.$row['v_did'].'" data-dname="'.$row['dname'].'" data-sdcontact="'.$row['inpSDContact'].'" data-dphone="'.$row['inpDPhone'].'" data-modal-id="popup2">'.$row['dname']."</a></td>";
	
	echo '<td>'.$row['txtAnon'].'</td><td>'.$row['auction'].'</td><td>'.$row['v_status'].'</td></tr>';

	
	

	
    }
	echo "</tbody></table></div>";  
  
mysql_close();
      
}
//session_destroy();
?> 


<div id="viewInfoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">×</button>
				<h3>Registrant/User Info</h3>
			</div>
			<div class="modal-body" id="viewInfoModal">
			<input class="nbi" type="hidden" name="uid" id="uid" value=""></br></br>
			<input type="text" name="uname" id="uname" value=""></br></br>
			<input class="nbi" type="text" name="uemail" id="uemail" value=""></br></br>
			<input class="nbi" type="text" name="uphone" id="uphone" value=""></br></br><p></p>
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
			<input type="text" name="dname" id="dname" value=""></br></br>
			<input class="nbi" type="text" name="sdcontact" id="sdcontact" value=""></br></br>
			<input class="nbi" type="text" name="dphone" id="dphone" value=""></br></br>
			<input class="nbi" type="hidden" name="did" id="did" value=""></br></br><p></p>
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
			<input type="text" name="dname" id="dname" value=""></br></br>
			<input class="nbi" type="text" name="sdcontact" id="sdcontact" value=""></br></br>
			<input class="nbi" type="text" name="dphone" id="dphone" value=""></br></br>
			<input class="nbi" type="hidden" name="did" id="did" value=""></br></br><p></p>
			</div>
		</div>  
	</div>
</div>

</div></br>
</div></br>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		
		<script src="../../Editor16/js/dataTables.editor.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  


<script src="../../Editor16/js/dataTables.editor.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.1.3/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.1.3/js/autoFill.jqueryui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.jqueryui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.2.0/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.jqueryui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script>
$(document).ready(function() {
   $('#example').dataTable( { 
    ajax: {
            url: "newviewvehtestmodal.php",
            type: 'POST'
        },
        
   "scrollX": true,
         "dom": '<"wrapper"fliptB>',
         "columns": [
            { "data": "SaleDate" },
{ "data": "txtYear" },
{ "data": "txtMake" },
{ "data": "txtModel" },
{ "data": "txtMileage" },
{ "data": "txtPrice" },
{ "data": "txtColor" },
{ "data": "txtVIN" },
{ "data": "inpvehStock" },
{ "data": "popDetail" },
{ "data": "txtTrans" },
{ "data": "v_uid" },
{ "data": "inpYourName" },
{ "data": "inpYourPhone" },
{ "data": "inpYourEmail" },
{ "data": "v_did" },
{ "data": "dname" },
{ "data": "inpSDContact" },
{ "data": "inpDPhone" },
{ "data": "dname" },
{ "data": "txtAnon" },
{ "data": "txtAnon" },
{ "data": "auction" },
{ "data": "v_status" },

        ],
          buttons: [
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
$(document).on("click", ".open-viewInfoModal", function () {
     
     
     var uname = $(this).data('uname');
     var uphone = $(this).data('uphone');
     var uemail = $(this).data('email');
     
     
     
     $(".modal-body #uid").val($(this).data('id'));
     $(".modal-body #uname").val($(this).data('uname'));
     $(".modal-body #uphone").val($(this).data('uphone'));
     $(".modal-body #uemail").val($(this).data('uemail'));
});
$(document).on("click", ".open-viewDInfoModal", function () {
     
     
     var dname = $(this).data('dname');
     var dphone = $(this).data('dphone');
     var sdcontact = $(this).data('sdcontact');
     
     
     
     $(".modal-body #did").val($(this).data('did'));
     $(".modal-body #dname").val($(this).data('dname'));
     $(".modal-body #dphone").val($(this).data('dphone'));
     $(".modal-body #sdcontact").val($(this).data('sdcontact'));
});

$(document).on("click", ".open-viewRInfoModal", function () {
    
     
     var rtime = $(this).data('dname');
     var dphone = $(this).data('dphone');
     var sdcontact = $(this).data('sdcontact');
     
     
     
     $(".modal-body #did").val($(this).data('did'));
     $(".modal-body #dname").val($(this).data('dname'));
     $(".modal-body #dphone").val($(this).data('dphone'));
     $(".modal-body #sdcontact").val($(this).data('sdcontact'));
});
editor = new $.fn.dataTable.Editor( {
        ajax: "newviewvehtestmodal.php",
       table: "#example",
        fields: [ {
                label: "VehicleId:",
                name: "v_id"
            }, {
                label: "DealerId:",
                name: "v_did"
            }, {
            	label: "UserId:",
                name: "v_uid"
            }, {
            label: "RecordId:",
                name: "v_rid"
            }, {
              label: "VIN:",
                name: "txtVIN"
            }, {
              label: "Year:",
                name: "txtYear"
            }, {
              label: "Make:",
                name: "txtMake"
            }, {
              label: "Model:",
                name: "txtModel"
            }, {
              label: "Color:",
                name: "txtColor"
            }, {
                label: "Mileage:",
                name: "txtMileage"
            }, {
                label: "StockNo:",
                name: "inpvehStock"
            }, {
            label: "Detail:",
                name: "popDetail"
            }, {
            label: "Transport:",
                name: "txtTrans"
            }, {
             label: "Floor:",
                name: "txtPrice"
            }, {
               label: "Status:",
                name: "v_status"
            }, { 
               label: "Substatus:",
                name: "v_substatus"
                
           }, {
                label: "Announcement:",
                name: "txtAnon"
            }, {
                label: "Timestamp:",
                name: "r_time"
            }
        ]
 });
// Activate an inline edit on click of a table cell
    $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            onBlur: 'submit'
        } );
    } );


});
</script>

</body>
</html>