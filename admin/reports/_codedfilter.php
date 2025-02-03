<?php  
$fromdate = "2018-06-01";
$todate = "2018-06-30";
//$fromdate = $_POST["from_date"];
//$todate= $_POST["to_date"];
setlocale(LC_MONETARY, 'en_US.UTF-8');
$output .= '  
           <table class="table table-bordered" style = "width:1200px;">  
                <tr>  
                
                     <th width="19%">Month</th>  
                     <th width="19%">Invoiced</th>  
					 <th width="19%">Registered</th>  
                     <th width="19%">Sold</th>  
					 <th width="19%">Receipts</th> 
                    
                </tr>  
      ';  
//$time = strtotime("2017.06.01");	  
//$time = strtotime($fromdate);
//$monthplus = date("Y-m-d", strtotime("+1 month", $time));

 $connect = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  




// $query = 'SELECT * FROM invoices WHERE idate BETWEEN "'.$fromdate.'" AND "'.$todate.'"';		   
$query = 'SELECT iid, itotal, idate, DAY(idate) AS day, MONTH(idate) AS month, YEAR(idate) AS year FROM invoices ORDER BY idate';
      $result = mysqli_query($connect, $query);  
       
 if(mysqli_num_rows($result) > 0)  
      {  $itot = 0;
           while($row = mysqli_fetch_array($result))  
           {  
                $itot = $itot + $row["itotal"];
           }  
           $output .= '<tr><td>June 2017</td><td>'.money_format('%.2n', $itot).'</td>';
                    
		   }
		  
      else  
      {  
         $output .= '<tr><td colspan="5">Not Found</td></tr>';  
      }  
            //****************
 /*$connect2 = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  


 $query2 = 'SELECT * FROM i_charges WHERE ic_date BETWEEN "'.$fromdate.'" AND "'.$todate.'"';	
		   
        
      $result2 = mysqli_query($connect2, $query2);  
      $ic_amt = 0; 
 if(mysqli_num_rows($result2) > 0)  
      {  
           while($row2 = mysqli_fetch_array($result2))  
           {  
                $ic_amt = $ic_amt + $row2["ic_amount"];
               // echo '<br> Amount:'$ic_amt.' id: '.$ic_id;
           }  
           $output .= '<td>'.money_format('%.2n', $ic_amt).'</td>';
                    
		   }
		  
      else  
      {  
         $output .= '<tr><td colspan="5">Not Found</td></tr>';  
      }  */
      	  	              //****************
$connect2 = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  

$query2 = 'SELECT * FROM master WHERE mrtime BETWEEN "'.$fromdate.'" AND "'.$todate.'"';		   
        
      $result2 = mysqli_query($connect2, $query2);  

$num_rows = mysqli_num_rows($result);
 $output .= '<td> '.$num_rows.' Units</td>';


	  //*********************
      	  	              //****************
 $connect2 = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  



$query2 = 'SELECT * FROM master WHERE msolddate BETWEEN "'.$fromdate.'" AND "'.$todate.'"';		   
        
      $result2 = mysqli_query($connect2, $query2);  
      

$num_rows = mysqli_num_rows($result2);
 $output .= '<td>'.$num_rows.' Units</td>';


	  //*********************
      
      
      
      
      
	              //****************
 $connect2 = mysqli_connect("localhost", "crofton_connct", "wintersS2013", "crofton_cas");  


 $query2 = 'SELECT * FROM i_payments WHERE ip_date BETWEEN "'.$fromdate.'" AND "'.$todate.'"';	
 //$query2 = 'SELECT * FROM i_payments WHERE ip_date BETWEEN "2017-06-01" AND "2017-06-30"';	

 //$query = 'SELECT * FROM invoices WHERE idate BETWEEN "2017-06-01" AND "2017-06-30" ';		   
        
      $result2 = mysqli_query($connect2, $query2);  
      $ip_amt = 0; 
 if(mysqli_num_rows($result2) > 0)  
      {  
           while($row2 = mysqli_fetch_array($result2))  
           {  
                $ip_amt = $ip_amt + $row2["ip_amount"];
               // echo '<br> Amount:'$ic_amt.' id: '.$ic_id;
           }  
           $output .= '<td>'.money_format('%.2n', $ip_amt).'</td>';
                    
		   }
		  
      else  
      {  
         $output .= '<tr><td colspan="5">Not Found</td></tr>';  
      }  


	  //*********************


	  //**********************
$output .= '</tr></table>';
      echo $output;  
   

?>