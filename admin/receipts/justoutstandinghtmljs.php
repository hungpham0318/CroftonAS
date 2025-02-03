<?php session_start();
$title="Outstanding";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>
<head>
<?php include "../sales/stylehead-begin.html";?>
input:disabled{color:black;}
.sorting{background-image:none!important;font-size: .8em;}
.sorting_asc, .sorting_desc {background-image:none!important;font-size: 1em;font-weight:bold;}

<?php include "../sales/stylehead-end.html";?>

<body>
<div style="font-size:.8em!important"><?php include "../worldview/css/snow-admin-nav.html";?></div>
 <?php include "../sales/jsscripts.html"?>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.15/api/sum().js""></script>

<div style="width:97%;margin: 0 auto; ">
<table id="example" class="display compact" cellspacing="0" width="100%" style = "font-size: 12px!important;">


<thead><tr style ="padding-left:4px; padding-right:2px;"><th style ="width: 7em;">Invoice</th><th>Payments</th><th>Invoice Date</th><th>Total</th><th>Outstanding</th><th>Location</th><th>Id</th><th>Dealership Name</th><th>Emailed To</th><th>Paid</th><th>Email</th></tr></thead>

<tbody>
<?php 
include "iclosedarrcreate.php";

include "../process/connecti.php";
$result = mysqli_query($con, "SELECT invoices.iid, invoices.idate, invoices.itotal, invoices.ipdfurl, invoices.iaid, invoices.idid, invoices.idname, invoices.idattn, invoices.idaddress, invoices.idcitystatezip, invoices.idinvoiceemail, invoices.iclosed FROM invoices WHERE invoices.iclosed != 1");
$x = 0;

foreach($result as $row){

$x++;
$iaid = $row['iaid'];
if ($iaid === 3){$iaid = "Bel Air";
}else{
$iaid = "Manheim,PA";
}

$itotal = $row['itotal'];
$ipmtsum = $row['pmtsum'];
$balance = $itotal - $ipmtsum;
if($balance == "0"){$iclosed = 1;
echo '<tr id = "row_'.$row['iid'].'" style ="background-color:#CCFFCC; color:black;">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="border-radius:.5em;font-size:.8em;width:7em;background-color:#CCFFCC; color:black;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';
echo'<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="margin-right:6px;padding-right:6px;border-radius:.5em;width:7.5em;font-size:.8em;font-weight:normal;text-transform:uppercase;background-color:#CCFFCC; color:#000000;">Payments&nbsp;&nbsp;</button></a></td>';


}else{
$iclosed = $row['iclosed'];
echo '<tr id = "row_'.$row['iid'].'">';
echo '<td><a href ="'.$row['ipdfurl'].'" target="_blank"><button style ="width:7em;font-size:.8em;">&nbsp;# '.$row['iid'].'&nbsp;&nbsp;&nbsp;&nbsp;</button></a></td>';
echo'<td><a href="/admin/receipts/paymenthtmljs.php?iid='.$row['iid'].'"><button style ="width:7.5em;font-size:.8em;font-weight:normal;text-transform:uppercase;">Payments&nbsp;&nbsp;</button></a></td>';

}
echo'<td>'.$row['idate'].'</td>
<td>$'.$row['itotal'].'</td>
<td>$'.number_format($balance,2).'</td>';
echo'<td>'.$iaid.'</td>
<td>'.$row['idid'].'</td>
<td>'.$row['idname'].'</td>
<td>'.strtolower($row['idinvoiceemail']).'</td>';

if($iclosed === 1){
echo '<td><input type= "checkbox" value="'.$iclosed.'" style = "border:1px solid green;" disabled readonly checked></td>';
}else{
echo '<td><input type= "checkbox" value="'.$iclosed.'" disabled readonly></td>';

}
echo'<td><a href="/admin/accnts/invoice/invoicereemail.php?iid='.$row['iid'].'"><button style ="width:7em;font-size:.8em;font-weight:normal;text-transform:uppercase;">&nbsp;Email&nbsp;</button></a></td></tr>';




}
?>


</tbody>
<tfoot><tr><th>Invoice</th><th>Payments</th><th>Invoice Date</th><th>Inv. Total</th><th>Balance Due</th><th>Auction</th><th>DID</th><th>Dealership</th><th>Emailed To</th><th>Paid</th><th>Email</th></tr></tfoot></table></div>



	 

<script>
Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
$(document).ready(function() {



var table = $('#example').DataTable({
      dom: 'Bifrt',
      iDisplayLength: -1,
      	"scrollY": 700,
      	stateSave: false,
        "columns": [ 
	 
            { "data": "invoices.iid" },
            { "data": "invoices.idate" },
            { "data": "invoices.itotal" },
            	 {
            "data": "pmtsum",
            "render": function ( data, type, full, meta ) {
              return data;
            }              
        },
            { "data": "invoices.ipdfurl" },
            { "data": "invoices.iaid`" },
			{ "data": "invoices.idid" },
			{ "data": "invoices.idname" },
			
			{ "data": "invoices.idinvoiceemail" },
			{ "data": "invoices.iclosed" },
			  	 {
            "data": "email",
            "render": function ( data, type, full, meta ) {
              return data;
            }              
        },
		     
	 ],
	 
	  buttons: [
 	//{ extend: "create", editor: editor },
 	'colvis'
 	],

	
	"rowCallback": function ( row, data ) { 
	$('td', row).attr('nowrap','nowrap');
	$('td', row).css('padding-right', '10px');
	$('td', row).css('padding-left', '10px');
//	if(data.invoices.pmtsum = 0 ){ 
//		$('td', row).css('color', 'darkgreen');
//	   		//$('td', row).css('border-color-top', 'darkgreen');
	//$('input.editor-active', row).prop( 'checked', data.invoices.iclosed == 1 );
//		}	        
				// $('td', row).css('text-transform', 'uppercase');
				//$('td', row).css('font-family','monospace');
				//$('td', row).css('white-space','nowrap');
				//$('td', row).css('font-size','1.25em');
				//$('td', row).attr('title','The information in Auction, Registrant, and Dealership columns is only editable when using the checkbox selector and the Edit button.');			
		},
				//if ( data.master.msubstatus =='Inv-No' ){ 
				// $('td', row).css('color', 'darkgreen');
				//    $('td', row).css('border-color-top', 'darkgreen');
				//}	
				

     drawCallback: function() {
   var api = this.api();

   // Total over all pages
   var total = api.column(3).data().sum();

   // Total over this page
   var pageTotal = api.column(3, {page:'current'}).data().sum();
   var acctRecv = api.column(4, {page: 'current'}).data().sum();
   //var invTotal = api.column(9, {page:'current'}).data().sum();
  // var cntTotal = api.column(9, {page:'current'}).data().count();
  // var divTotal = invTotal/cntTotal;
//   var stillDue = divTotal - pageTotal;
 // if (pageTotal <1 ){stillDue='No Payments';}
 // if (pageTotal > 0){stillDue='$'.stillDue;}
  $(api.column(3).header()).html('$' + (pageTotal).formatMoney(2, '.', ',')   + '<br/>Billed');
 $(api.column(4).header()).html('$' + (acctRecv).formatMoney(2, '.', ',')   + '<br/>');
   //$(api.column(9).footer()).html(' Balance: $' + stillDue  );
   
}
    
    
    
    
  } );
          
          
          
          
          
          new $.fn.dataTable.Buttons( table, {
   buttons: [

    {
   extend: 'pdfHtml5',
    titleAttr: 'Can be sorted by any column, sort the table before printing.',
   text: 'Receivables Report',
  // download: 'open',
  header: true,
  //footer: true,
  
   title: 'Receivables Report ',
   orientation: 'landscape',
 
    exportOptions: {
        //    columns: ':visible'
     columns: [0, 2, 4,6,7,8 ]
    // columns: [6,7,8,9,5,12,19,20,21,22,23,24,27,28,29,30,37,38]

    },
    customize: function (doc) {
        doc.pageMargins = [20,20,20,20];
        doc.defaultStyle.fontSize =12;
        doc.styles.tableHeader.fontSize = 9;
        doc.styles.title.fontSize = 13;
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
    titleAttr: 'Can be sorted by any column, sort the table before printing.  ',
   text: 'Statement-Like Attachment',
  // download: 'open',
  header: true,
  //footer: true,
  
   title: 'Statement of Invoices Due',
   orientation: 'portrait',
 
    exportOptions: {
     // columns: ':visible'
   columns: [0, 2, 4, 7, 8 ]
    // columns: [6,7,8,9,5,12,19,20,21,22,23,24,27,28,29,30,37,38]

    },
    customize: function (doc) {
        doc.pageMargins = [20,20,20,20];
        doc.defaultStyle.fontSize =12;
        doc.styles.tableHeader.fontSize = 9;
        doc.styles.title.fontSize = 13;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
               //'<?php echo $acctRecv;?>',
            
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

         
$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
           // table.column( 2 ).data().sum();
    });
    


</script>
</body>
</html>

