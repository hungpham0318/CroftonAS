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
                <th>Auction</th>
               
              
            </tr>
        </thead>
        <tfoot>
           
        </tfoot>
    </table>
 <!--   <form id="frm-example" action="/path/to/your/script.php" method="POST">



<hr>

<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<p><b>Selected rows data:</b></p>
<pre id="example-console-rows"></pre>

<p><b>Form data as submitted to the server:</b></p>
<pre id="example-console-form"></pre>

</form>-->

	<?php include "jsscripts.html"?>
	<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "uarelatephp.php?uid=<?php echo $quid;?>",
        table: "#uarelate",
           
        fields: [ {
                label: "User:",
                name:  "a_relate.a_uid",
                 type:  "select"
            }, {
                label: "Auction:",
                name:  "a_relate.a_aid",
                type:  "select"
            }
        ]
    } );
 
    $('#udrelate').DataTable( {
        dom: "ifti",
        ajax: {
            url: "uarelatephp.php?uid=<?php echo $quid;?>",
            type: 'POST'
        },
        iDisplayLength: -1,
        columns: [
            { data: "users.uname" },
            { data: "auctions.a_name" }
           
            
        ],
        select: true,
        buttons: [
         //   { extend: "create", editor: editor },
           // { extend: "edit",   editor: editor },
        //    { extend: "remove", editor: editor }
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