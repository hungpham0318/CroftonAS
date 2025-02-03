<?php session_start();
$title="i_charges";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}

 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 $query = "SELECT * FROM i_charges ORDER BY ic_date asc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> i_charges</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center"></h2>  
                <h3 align="center">I_charges Report Start</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="return_results">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">VehID</th>  
                     <th width="30%">did</th>  
                     <th width="43%">line item</th>  
                     <th width="10%">Charge Amount</th>  
                     <th width="12%">Charge Date</th>   
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["ic_mid"]; ?></td>  
                               <td><?php echo $row["ic_did"]; ?></td>  
                               <td><?php echo $row["ic_description"]; ?></td>  
                               <td>$ <?php echo $row["ic_amount"]; ?></td>  
                               <td><?php echo $row["ic_date"]; ?></td>  
                          </tr>  
                     <?php  
                         $itot = $itot + $row["ic_amount"];
                   }  
                    setlocale(LC_MONETARY, 'en_US.UTF-8');
                  echo'<tr><td></td><td></td><td></td><td>'.money_format('%.2n', $itot).'</td><td></td></tr>';
                     ?>   
                     </table>  
                </div>  
           </div>  
 
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"icharges_filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#return_results').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

</body>
</html>

