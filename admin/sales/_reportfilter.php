<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  
 
    //  $connect = mysqli_connect("localhost", "root", "", "testing");  
      $output = '';  
      $query = "  
           SELECT * FROM invoices  
           WHERE idate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Dealer Name</th>  
                     <th width="43%">iclosed</th>  
                     <th width="10%">Value</th>  
                     <th width="12%">Invoice Date</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  $itot = 0;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["iid"] .'</td>  
                          <td>'. $row["idname"] .'</td>  
                          <td>'. $row["iclosed"] .'</td>  
                          <td>$ '. $row["itotal"] .'</td>  
                          <td>'. $row["idate"] .'</td>  
                     </tr>  
                ';  
                $itot = $itot + $row["itotal"];
           }  
           
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Invoices Found</td>  
                </tr>  
           ';  
      }  
      setlocale(LC_MONETARY, 'en_US.UTF-8');
money_format('%.2n', $number);
      $output .= '<tr><td></td><td></td><td></td><td>'.money_format('%.2n', $itot).'</td><td></td></tr></table>';  
      echo $output;  
 }  
 ?>
