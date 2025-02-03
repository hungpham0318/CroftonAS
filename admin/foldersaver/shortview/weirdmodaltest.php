<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.datatables.net/1.10.12/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
  

     <script src="//datatables.net/download/build/nightly/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.jqueryui.min.js"></script>





	
	
	
	

    <meta charset=utf-8 />
    <title>DataTables - JS Bin</title>
  </head>
  <style>
  body {
  font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}


div.container {
  min-width: 980px;
  margin: 0 auto;
}


.hidden
        {
            display: none;
        }
  </style>
  <body>
    
    <asp:DropDownList ID="ddlFactory" ClientIDMode="Static" runat="server" CssClass="ddl"
                    onchange="ldetails()"    Width="550px" >
                    </asp:DropDownList>
    
    <table id="example" class="tableCustomStyle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>
                            emp_id
                        </th>
                        <th>
                            emp_name
                        </th>
                        <th>
                            emp_age
                        </th>
                       
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
      <tbody>
          <tr>
            <td>111</td>
            <td>aaaaa</td>
            <td>63</td>
            
          </tr>
          <tr>
            <td>222</td>
            <td>bbbb</td>
               <td>63</td>
            
          </tr>
          <tr>
            <td>333</td>
            <td>cccc</td>
                       <td>66</td>
           
          </tr>
      </tbody>
            </table>
<div id="dialog">Your non-modal dialog</div>
<a href="#" id="open">Open dialog</a>
    
    <script>
    
	$(document).ready(function() {

	
    $('#demo').html('<table width="100%" class="table table-hover table-condensed stripe compact order-column" id="example" cellspacing="0"></table>');
    oTable = $('#example').dataTable({
        order: [
            [1, "desc"]
        ],
        "columns": [{
            "data": "emp_id",
            sClass: "hidden"
        }, {
            "data": "emp_name",
            "render": function(data, type, full, meta) {
               
 	      //return '<a href="ab.aspx?emp_id=' + data + '">"' + data + '"</a>';
		return '<a href="#?emp_id=' + data + '" +'id="open"'+' >"' + data + '"</a>"';
            }
        }, {
            "data": " emp_age"
        }]
    });

$("#dialog").dialog({
				modal: true,
				resizable: false,
				buttons: {
					"Yeah!": function() {
						$(this).dialog("close");
					},
					"Sure, Why Not": function() {
						$(this).dialog("close");
					}
				}
			});
});




jQuery(document).ready(function() {
    
});
	</script>
  </body>
</html>