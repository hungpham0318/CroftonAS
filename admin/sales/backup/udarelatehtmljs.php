
<?php 
$quid=$_GET['uid'];
?>
<!DOCTYPE html>
<html>	

	<?php include "stylehead-begin.html"?>
<?php include "stylehead-end.html"?>	

	<table id="udrelate" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>User</th>
                <th>Dealer</th>
               
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>User</th>
                <th>Dealer</th>
                
               
            </tr>
        </tfoot>
    </table>
    <form id="frm-example" action="/path/to/your/script.php" method="POST">

<table id="example" class="display" cellspacing="0" width="100%">
   <thead>
      <tr>
         <th></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
         <th>Extn</th>
         <th>Start date</th>
         <th>Salary</th>
      </tr>
   </thead>
   <tfoot>
      <tr>
         <th></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
         <th>Age</th>
         <th>Start date</th>
         <th>Salary</th>
      </tr>
   </tfoot>
</table>

<hr>

<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<p><b>Selected rows data:</b></p>
<pre id="example-console-rows"></pre>

<p><b>Form data as submitted to the server:</b></p>
<pre id="example-console-form"></pre>

</form>

	<?php include "jsscripts.html"?>
	<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "udarelate.php?uid=<?php echo $quid;?>",
        table: "#udarelate",
        fields: [ {
                label: "User:",
                name:  "ud_relate.u_id",
                 type:  "select"
            }, {
                label: "Dealer:",
                name:  "ud_relate.d_id",
                type:  "select"
            }
        ]
    } );
 
    $('#udrelate').DataTable( {
        dom: "Bfrtip",
        ajax: {
            url: "udarelate.php?uid=<?php echo $quid;?>",
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
 $('#frm-example').on('submit', function(e){
      var form = this;
       //var rows_selected = table.column(0).checkboxes.selected();
      var rows_selected = table.rows('.selected').data(rowId);

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

} );
} );
</script>
</body>
</html>