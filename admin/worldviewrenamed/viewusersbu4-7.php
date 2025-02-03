<?php session_start();
$title="Users";
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']==""){}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		

		
		
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<title><?php echo $title;?></title>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.1.1/css/keyTable.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.1.1/css/autoFill.dataTables.min.css">

<link rel="stylesheet" href="../Editor/css/editor.dataTables.min.css">
		
		<link rel="stylesheet" href="css/world-admin.css" type="text/css">
		<link rel="stylesheet" href="css/world-login.css" type="text/css">
<link rel="stylesheet" href="css/snow-nav-admin.css">
<link rel="stylesheet" href="css/wraptable-page.css">
<link rel="stylesheet" href="css/status-key.css">
<link rel="stylesheet" href="css/substatus-key.css">


<style>
.mybuttoncreate {
    display: block;
    /* color: #333; */
    text-decoration: none;
    /* font-weight: 700; */
    font-size: 12px;
    line-height: 40px;
    padding: 0 15px;
    font-family: "HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif;
    /* font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; */
    color: #fff;
    background: #660000;
    text-decoration: none;
    box-shadow: 0.5px 0.5px 1px 1px #ccc inset;
    max-width:100px;}

</style>
</head>
<body>
<div class="container container-wrapper" style="display:block;">
<div><!-- un-id-d navigation div -->
 	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'css/snow-admin-nav.html';
	}?>
	<br/>
	</div>	<!--Close id-ed navigation div-->
	<div id="worldbannerline" >
<!--<div id="leftcolumnAdminIncludeClip">
<div class="worldbannerline"><img class="worldbannerline" src="/images/croftonasbanner3.png"  alt="crofton auction services banner for website" /><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{ }else{echo'<div class="wbannerline">';
	//include 'css/status-key.html';
//include 'css/substatus-key.html';
	echo'</div>';
	 }?></div>-->

	

<!-- <div id="rightcolumnAdminIncludeClip"> -->
<div class="wbannerline">
	<?php 
	if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo'<div class="wbannerline"></div><div class="wbannerline" style="float:right;" width:18%">';
			//include 'forms/li-form.html';
			echo"</div></div></div><!--NOT logged in and close div after login form displayed-->";
	}
	else{
		$bar = $ausername;
		//include 'css/status-key.html';
	echo "</div></div><!--IS logged in and 2 close divs after logged in form displayed-->";
	 }?> 
	
	
	
	<div id="section1" style="display:block;">
	
	<!--begin relative snip -->
	
	<div id="section1">
		<span style ="font-size:.8em; line-height:.8em;">




<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo "Please log in to see this page";}else{
	
	//begin insert
echo'


<table id="maintable" align="center">
    <tr><td><table>
    <tr>
        <td width="400">
            <table border="0" width="800" align="center">
                    <tr>
                        <td><form id = "adddeleteudrform"action="" method="post">
                        <div id="headline">Add or Delete Dealer Relationship</br></div>
                        <select id="uid" name="uid" tabindex="1" width="250px">
 			<div id="headline">Add or Delete Dealer Relationship</br></div>
 			</br>
 			<option value="">Select User</option>';
       			include "../process/connecti.php";
 $result = mysqli_query($con,"SELECT users.uname,  users.uid FROM  users");
 while($row = mysqli_fetch_array($result)) {
 //while($row = mysql_fetch_array($result)){
    echo "<option value='".$row['uid']."'>".$row['uname']."</option>";
    }
    echo "</select>";
       //mysql_close(); 
       echo' </br></td></tr>
                    <tr><td></br>&nbsp;</td>
    <tr>
                               
                        <td><select id="did" name="did" tabindex="1" width="250px">
 			<option value="">Select Dealership</option>';
       			include "../process/connecti.php";
 $result = mysqli_query($con,"SELECT dealers.dname, dealers.did FROM dealers");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['did']."'>".$row['dname']."</option>";
    }
    echo "</select>";
      // mysql_close(); 
       echo' </td></tr><tr><td></br>&nbsp;</td></tr><tr>
                        <td>
                        <button type="submit" name="add" class = "" formaction="/admin/process/addrelates.php">Add</button>&nbsp;&nbsp;&nbsp;
<button type="submit" name="delete" class = "" formaction="/admin/process/delete-ud-relate.php">Delete</button></td></tr><tr>
<td></br>
    <button type="submit" name="delete" target="_blank" class = "" formaction="/admin/UnderConstruction.php">See Current Relationships for selected User</button>                        
                </form>        </td>
                </tr>
                <tr>
                <td>
               </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="headfoot">&nbsp;</td>
    </tr>
</table></td>
<!-- SECOND SELECTION FOR AUCTION -->
<td><table width="400">
    <tr>
        <td >
           <form id = "adddeleteaform" action="" method="post">
                  
 			<div id="headline">Add or Delete Auction Relationship</br></div>
                       </br>
                        <select id="auid" name="auid" tabindex="1" width="250px">
 			<option value="">Select User</option>';
       			include "../process/connecti.php";
 $result = mysqli_query($con,"SELECT users.uname,  users.uid FROM  users");
 while($row = mysqli_fetch_array($result)) {
 //while($row = mysql_fetch_array($result)){
    echo "<option value='".$row['uid']."'>".$row['uname']."</option>";
    }
    echo "</select>";
       //mysql_close(); 
       echo' </td></tr>
                    <tr><td></br>&nbsp;</td>
    <tr>
                               
                        <td><select id="did" name="did" tabindex="1" width="250px">
 			<option value="">Select Auction</option>';
       			include "../process/connecti.php";
 $result = mysqli_query($con,"SELECT auctions.a_name, auctions.a_id FROM auctions");

 while($row = mysqli_fetch_array($result))
    {
    echo "<option value='".$row['a_id']."'>".$row['a_name']."</option>";
    }
    echo "</select>";
      // mysql_close(); 
       echo' </td></tr><tr><td></br>&nbsp;</td></tr><tr>
       
                    
                    
                        <td>
                        <button type="submit" name="add" class = "" formaction="/admin/process/addrelates.php">Add</button>&nbsp;&nbsp;&nbsp;
<button type="submit" name="delete" class = "" formaction="/admin/process/delete-ud-relate.php">Delete</button></td></tr><tr>
<td></br>
    <button type="submit" name="delete" target="_blank" class = "" formaction="/admin/UnderConstruction.php">See Current Relationships for selected User</button>                        
               </form>         </td>
                </tr>
                <tr>
       
                    
                    
                        <td>
                       
                            
                        </td>
                </tr>
            </table>
        </td>
    </tr>
    



</tr></table></div></div></br>';

//echo '</html>';
}
//session_destroy();
?>
	
	
	<!--end relative snip -->
	
	
	
	<div id="sect1leftcol"><?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{echo '<p>Log in to see contents</p><a href="/admin/worldview/index.php"> Click here to log in.</a></div><!--sect1leftcolcomingfromifNOTloggedin=cannot go past-->';}else{echo '</div><!--sect1leftcolcomingfromifISloggedin=close-div-andcontinue-->';} ?>

	<?php if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="")
	{}else{ include 'views/usershtml.html';
	echo "</script></body></html>";
	}?> 

