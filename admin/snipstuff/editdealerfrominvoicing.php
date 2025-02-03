<?php session_start();
$title="Edit Invoice Dealer";
$pageperms =3;
$aperms= $_SESSION['perms'];
$Dealerid = $_GET['did'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>
<?php include"../sales/stylehead-begin.html";?>
input.dinfo{width: 20em;
font-size:1.5em;
line-height:2em;
border-radius:3px;
padding-left:.5em;
}
.dlabel {width: 10em;
font-size:1.5em;
line-height:2em;}
<?php include"../sales/stylehead-end.html";?>
<body>
		<div id="section1"> <span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	
	//begin insert
	//echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';
$did=$_GET['did'];
$Dealerid=$_GET['did'];
//echo $Userid;
include "../process/connecti.php";

$result = mysqli_query($con,"SELECT * FROM dealers WHERE did = $Dealerid");

 while($row = mysqli_fetch_array($result))
    {
     	$did=$row['did'];
	$dname=$row['dname'];
	$daddress=$row['daddress']; 
	$dcity=$row['dcity'];
	$dstate=$row['dstate'];
	$dzip=$row['dzip'];
	$dattn=$row['dattn'];
	$dmailAcctNum=$row['dmailAcctNum'];
	$dnotes=$row['dnotes'];
	$dinvoiceemail=$row['dinvoiceemail'];
	$dnumber=$row['dnumber'];
	$dcontact=$row['dcontact'];
	$dphone=$row['dphone'];
	$dsdphone=$row['dsdphone'];

    }
	
    }
         mysqli_close($con);
         
        
       
        
  ?>

<form action="editdealerfrominvoicingupdate.php" method="post">
<table id="maintable" align="center">
    <tr><td>
       
<div id = "customForm" class="headline"></div>
            <p align="center"><font color="white"><span style="font-size:24pt;"><b>Edit Dealership</b></span></font></p>
            <p>
        </td>
    </tr>
    <tr>
        <td width="400">
            <table border="0" width="800" >
            <tr>
                        <td class="dlabel">Dealership Id:</td>
                        <td><input type="text" class="dinfo" name="did" value="<?php echo $did;?>"  maxlength="250" readonly></td>
                    </tr>
                    <tr>
                        <td class="dlabel">Dealership Name:</td>
                        <td><input type="text" class="dinfo" name="dname" value="<?php echo $dname;?>"  maxlength="250" required></td>
                    </tr>
       
                    <td class="dlabel">Dealer Address:</td>
                    <td><input type="text" class="dinfo" Title="Address" name="daddress" value="<?php echo $daddress;?>" ></td>
                </tr>
                    <td class="dlabel">Dealer City:</td>
                    <td><input type="text" class="dinfo" Title="City" name="dcity" value="<?php echo $dcity;?>" ></td>
                </tr>
                <tr>            
                    <td class="dlabel">Dealer State:</td>
                    <td><input type="text" class="dinfo" Title="State" name="dstate" value="<?php echo $dstate;?>" ></td>
                </tr>
                <tr>
                <td class="dlabel">Dealer Zip:</td>
                    <td><input type="text" class="dinfo" Title="5 digit zip" name="dzip" value="<?php echo $dzip;?>" ></td>
                </tr>
                <tr>
                    <td class="dlabel">Email Invoices To:</td>
                    <td><input type="text" class="dinfo" name="dinvoiceemail" placeholder ="Separate multiple email addresses with commas" title ="Separate multiple email addresses with commas"  value="<?php echo $dinvoiceemail;?>" ></td>
                </tr>
                 <tr>
                    <td class="dlabel">Attention:</td>
                    <td><input type="text" class="dinfo" name="dattn" placeholder ="Leave blank if none" title ="Leave blank if none"  value="<?php echo $dattn;?>" ></td>
                </tr>
            
          
                
                
                
                
                
                <tr>
                    <td class="dlabel">&nbsp;</td>
                        <td>
                            
                            <input type="submit" class="pure-button button-success" style="width: 200px;" name="submit" value="Update Dealer Record">
                        </td>
                </tr>
            </table>
        </td>
    </tr>
     <tr>
                               
                  
                    <td><input type="hidden" class="dinfo" Title="MailAccount" name="dmailAcctNum" value="<?php echo $dmailAcctNum;?>" ></td>
               
                    <td><input type="hidden" class="dinfo" Title="Notes" name="dnotes" value="<?php echo $dnotes;?>" ></td>
               
                        <td><input type="hidden" class="dinfo" name="dnumber" value="<?php echo $dnumber;?>" maxlength="7" required></td>
                 </tr> 
              
              
               
                    <td><input  type="hidden" title="Enter phone in this format: 000-000-0000" class="dinfo" name="dphone"value="<?php echo $dphone;?>" ></td>
                </tr>
                <tr>
                    
                    <td><input type="hidden" class="" name="dcontact" required value="<?php echo $dcontact;?>" ></td>
                </tr>
                <tr>
                    
                    <td><input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="hidden" title="Enter phone in this format: 000-000-0000" class="" name="dsdphone" value="<?php echo $dsdphone;?>" required></td>
                </tr>
    
    
    
    
    
    <tr>
        <td class="headfoot">&nbsp;</td>
    </tr>
</table>
</form></div></div></br>




</body>
  </html>