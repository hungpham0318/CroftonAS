<?php session_start();
$title="All Invoices";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){header('Location: ../worldview/index.php?msg=Please_Log_In_to_continue!');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>

<html>
<head>
<?php include "../sales/stylehead-begin.html";?>
input:disabled{color:black;}
.sorting{background-image:none!important;font-size: .8em;}
.sorting_asc, .sorting_desc {background-image:none!important;font-size: 1em;font-weight:bold;}

<?php include "../sales/stylehead-end.html";?>

<body>
<div style="font-size:.8em!important"><?php include "../worldview/css/snow-admin-nav.html";?></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="/admin/js/pdfmake.min.js"></script>
<script type="text/javascript" src="/admin/js/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<!--//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js-->
<!--<script type="text/javascript" src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/v1.13.4/dist/jquery.mask.min.js"></script>-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.9.0/js/standalone/selectize.js"></script>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.2.0/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>-->



<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.display.min.js"></script>
<!--<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.mask.min.js"></script>-->
<!--<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.select2.min.js"></script>-->
<!--<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.selectize.min.js"></script>-->
<script type="text/javascript" src="https://editor.datatables.net/plug-ins/download?cdn=cdn-download&amp;q=field-type/editor.title.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.3.3/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>

<div style="width:97%;margin: 0 auto; ">
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>

<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "font-size: 12px!important;">


<thead><tr style ="padding-left:4px; padding-right:2px;"><th style ="width: 7em;">Dealership</th><th>DID</th><th>Oldest</th><th>Newest</th><th># Unpaid Inv </th><th>Outstanding Amount</th><th>Address</th><th>City</th></tr></thead>

<tbody>
<?php 
//include "iclosedarrcreate.php";

include "../process/connecti.php";
$resultd = mysqli_query($con, "SELECT DISTINCT dealers.did FROM `dealers`LEFT JOIN invoices on  dealers.did = invoices.idid  WHERE invoices.iclosed !=1 ");


foreach($resultd as $drow){
    
$drid = $drow['did'];
include "../process/connecti.php";
$daresult = mysqli_query($con, "SELECT * FROM dealers WHERE did = $drid");
while($darow = mysqli_fetch_array($daresult)){
    $dacity = $darow['dcity'];
    $daaddress = $darow['daddress'];
    $dastate = $darow['dstate'];
     $dasdcontact = $darow['dcontact'];
      $dasdphone = $darow['dsdphone'];
}
include "../process/connecti.php";
$ddresult = mysqli_query($con, "SELECT * FROM invoices WHERE idid = $drid AND iclosed != 1 ORDER BY idate desc LIMIT 1");
while($ddrow = mysqli_fetch_array($ddresult)){
    $ddnewest = $ddrow['idate'];}
   
    
include "../process/connecti.php";
$result = mysqli_query($con, "SELECT count(*) as iid, idid, iclosed, idate,idname, idcitystatezip, SUM(itotal) as itotal FROM invoices iv
LEFT JOIN (SELECT did, daddress, dcity, dcontact
FROM `dealers`
GROUP BY did
HAVING `did` = $drid)  ds
ON   ds.did = iv.idid
WHERE ds.did = iv.idid AND iv.iclosed != 1 AND iv.idid = $drid
ORDER BY `idate` asc LIMIT 1");

while($row = mysqli_fetch_array($result)){

echo'<td>'.$row['idname'].'</td><td>'.$drow['did'].'</td><td>'.$row['idate'].'</td><td>'.$ddnewest.'</td><td>'.$row['iid'].'</td><td>'.$row['itotal'].'</td><td>'.$daaddress.'</td><td>'.$dacity.'</td></tr>';}
}


?>

</tbody>
<tfoot><tr><th>Dealership</th><th>DID</th><th>Oldest</th><th>Newest</th><th># Unpaid Inv </th><th>Outstanding Amount</th><th>Address</th><th>City</th></tr></tfoot></table></div>
<script>
$(document).ready(function() {



var table = $('#example').DataTable({
      dom: 'bifrt',
      iDisplayLength: -1,
      //	"scrollY": 700,
      //	stateSave: true,
        "columns": [ 
	 { "data": "invoices.idname" },
	  { "data": "dealers.did" },
	 { "data": "invoices.idate" },
	 	 
            { "data": "invoices.iid" },
              { "data": "$ddnewest" },
           { "data": "invoices.itotal" },
         { "data": "ds.dcity" },
		 { "data": "ds.daddress" },
//{ "data": "ds.dcontact" },
		//     { "data": "ds.dsdphone" },
	 ],
	 
	 

	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('padding-right', '10px');
	$('td', row).css('padding-left', '10px');
		},
			
				


    
    
    
    
  } );
                
          new $.fn.dataTable.Buttons( table, {
   buttons: [

    {
   extend: 'pdfHtml5',
    titleAttr: 'Can be sorted by any column, sort the table before printing.',
   text: 'Receivables Report',
    //download: 'open',
  header: true,
  //footer: true,
  
   title: 'Receivables Report ',
   orientation: 'landscape',
 
    exportOptions: {
         columns: ':visible'
   //  columns: [0, 2, 4,6,7,8 ]
    // columns: [6,7,8,9,5,12,19,20,21,22,23,24,27,28,29,30,37,38]

    },
    customize: function (doc) {
        doc.pageMargins = [20,20,20,20];
        doc.defaultStyle.fontSize = 10;
        doc.styles.tableHeader.fontSize = 10;
        doc.styles.title.fontSize = 10;
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
              margin: [10,0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .3; };
        // Vertikal line thickness
        objLayout['vLineWidth'] = function(i) { return .3; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return '#aaa'; };
        // Vertical line color
        objLayout['vLineColor'] = function(i) { return '#aaa'; };
        // Left padding of the cell
        objLayout['paddingLeft'] = function(i) { return 3; };
        // Right padding of the cell
        objLayout['paddingRight'] = function(i) { return 3; };
        // Inject the object in the document
        doc.content[1].layout = objLayout;
    }
    },
            
        
          


            
       ]
    } );

   table.buttons(0, null ).container().prependTo(
       table.table().container()
    );    
          
    });
    


</script>


</body>
</html>

