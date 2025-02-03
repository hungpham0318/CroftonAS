<?php 
$qdid=$_GET['did'];
?>
<!DOCTYPE html>
<html>	

	<?php include "../sales/stylehead-begin.html"?>
<?php include "../sales/stylehead-end.html"?>	

	<table id="udrelate" class="display" cellspacing="0" width="100%">
        <thead>
            <tr> 
            <!--<th>Dealer</th>-->
                <th>User</th>
              
               
              
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

	<?php include "../sales/jsscripts.html"?>
	<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "durelatepriority.php?did=<?php echo $qdid;?>",
        table: "#udarelate",
           
        fields: [ //{
               // label: "Dealer:",
             //   name:  "ud_relate.d_id",
             //   type:  "select"
           // },
           {
                label: "User:",
                name:  "priority_ud_relate.u_id",
                 type:  "select"
            }
        ]
    } );
 
    $('#udrelate').DataTable( {
        dom: "ifti",
        ajax: {
            url: "durelatepriority.php?did=<?php echo $qdid;?>",
            type: 'POST'
        },
        iDisplayLength: -1,
        columns: [ 
        
        //{ data: "dealers.dname" },
            { data: "users.uname" }
        
           
            
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