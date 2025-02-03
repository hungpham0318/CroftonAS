<html>
<head>



<link href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css" rel="stylesheet">
<link href="/Editor16/css/editor.dataTables.min.css" rel="stylesheet">




</head><body>
<form action="#" method="POST">
<div id="myDIV2"><p>
<?php
echo $gottendname;
$gottenuid='';
echo'<select id="uid" name="uid" tabindex="1" onchange="this.form.submit()">';

if(isset($_POST['uid']) ){
$gottenuid = $_POST['uid'];
echo $gottenuid;
include "../admin/process/connecti.php";
$conn=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
// Check connection
if (mysqli_connect_errno($conn))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 $result = mysqli_query($conn,"SELECT uid, uname FROM users WHERE uid = $gottenuid");

 while($row = mysqli_fetch_array($result))    {$gottenuname= $row['uname'];
    
   
    
    echo $gottenuname;
    echo '<option value="" selected="selected" ><span style="color:darkblue;">'.$gottenuname."</span></option>";
    
    }
    }else{
    
    

	
	
		echo'<option value="">CHOOSE user</option>';
			
			
	}
			include_once 'selectuserajax.php';
			
?>

</div></form>
				

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Uname</th>
              
				<th>Dealership</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Uname</th>
              
				<th>Dealership</th>
            </tr>
        </tfoot>
    </table>





<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
<script type="text/javascript" charset="utf8" src="/Editor16/js/dataTables.editor.min.js"></script>


<script>
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "udrelatejoin.php",
        table: "#example",
        fields: [ 
        { 
                label: "User:",
                
                 name:  "ud_relate.u_id",
                type:  "select"
                
            }, {
                
		
                
                label: "Dealership:",
                name:  "ud_relate.d_id",
                type:  "select"
            }
        ]
    } );

    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: {
            url: "udrelatejoin.php",
            type: 'POST'
        },
        columns: [
		
            	{ data: "users.uname" },
            
            	
            	{ data: "dealers.dname" }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>
</body>
</html>