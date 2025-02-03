<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Edit Profile';

//include header template
//require('../../caslog/layout/headerss.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
<title><?php if(isset($title)){ echo $title.$uname; }?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
	
<!--	 <link rel="stylesheet" href="/admin/css/manage.css" type="text/css" />-->
			
		<link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"">	
		
		<link rel="stylesheet" href="/common/css/editusercas.css" type="text/css" /> 
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>


<body>
<div class="wrapper" >
	
<div id="banner">
<img src="/images/banner4.png" alt="crofton auction services banner for website" />
</div>
<div id="navigation">
<?php require "includes/navcontents.html"; ?>
	</div>


	
	
		
	
	
<div id="section1"> 
<?php if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{echo "Please log in to see this page";}else{
	if(!isset($_SESSION['uid'])){$quid = $_GET['quid'];}else{$quid=$_SESSION['uid'];}
	
	//begin insert
	//echo'<html><head><link rel="stylesheet" type="text/css" href="../../admin/css/admin.css"></head><body>';

include "../admin/process/newconnect.php";

$result = mysql_query("SELECT * FROM users WHERE uid = $quid");

 while($row = mysql_fetch_array($result))
    {
     $uid=$row['uid'];
	$uname=$row['uname'];
	$umobile=$row['umobile'];
	$uusername=$row['username'];
	$uemail=$row['email'];
	$upassword=$row['password'];
	$uofficeph=$row['uofficeph'];
	$ufax=$row['ufax'];
	$uaddress=$row['uaddress'];
	$ucity=$row['ucity'];
	$ustate=$row['ustate'];
	$uzip=$row['uzip'];
	$ucompany=$row['ucompany'];
	$unotes=$row['unotes'];
	$uperms=$row['uperms'];
	$uactive=$row['active'];
	
	
	
    }
         mysql_close();
         
        
         ?>
<!-- <div id="leftcolumns1" style="width:45%;display:overflow;float:left;margin:0 auto;">        -->
        <div id="leftcolumns1" style=""> 
<form action="/admin/process/usrupdateusr.php" method="post">


   
  
        
<table border="0" width="100%" style="{margin:0 auto;}">
<tbody id="">
<tr><td>                
<input style="display:none" type="text" name="fakeusernameremembered"/>
<input style="display:none" type="password" name="fakepasswordremembered"/> 
</td></tr>


<tr>
	<td class="label-left">Name:<br>
                  <input type="text" class="left" name="uname" maxlength="250" value="<?php echo $uname;?>" required></td>
                   	                 </tr>
<tr>
	<td class="label-left">Cell Phone:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="umobile" value="<?php echo $umobile;?>"required></td>
	                 </tr>
<tr>
         <td class="label-left">Address:<br>
                  <input type="text" class="left" name="uaddress" maxlength="250" value="<?php echo $uaddress;?>" required></td>
	      	                 </tr>
<tr>
	<td class="label-left">Office:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="uofficeph" value="<?php echo $uofficeph;?>" required></td>
	                 </tr>
<tr>
	<td class="label-left">City:<br>
                  <input type="text" class="left" name="ucity" maxlength="250" value="<?php echo $ucity;?>" required></td>
               	                 </tr>
<tr>
	<td class="label-left">Fax:<br>
                  <input pattern="\d{3}[\-]\d{3}[\-]\d{4}" type="tel" title="Enter phone in this format: 000-000-0000"  class="left" name="ufax" value="<?php echo $ufax;?>"></td>
</tr>
<tr>

	<td class="label-left">State:<br>
                  <input type="text" class="left" name="ustate" maxlength="250" value="<?php echo $ustate;?>" required></td>

	
		                 </tr>
<tr>


	
	
	<td class="label-left">Company:<br>
                  <input type="text" class="left" name="ucompany" maxlength="250" value="<?php echo $ucompany;?>" required></td>
</tr>
<tr>
	<td class="label-left">Zip:<br>
                  <input type="text" class="left" name="uzip" maxlength="250" value="<?php echo $uzip;?>" required></td></tr>
<tr>
	<td class="label-left">Notes:<br>
                  <input type="text" class="left" name="unotes" maxlength="250" value="<?php echo $unotes;?>" required></td>
	
	                 </tr>
               <tr>
                  <td class="label label-left"></td></tr>
               <tr>
                  <td class=""></td></tr>
               <tr>
                    <td class="label label-left"></td></tr>
               <tr>
                    <!--<td class="label label-left">&nbsp;
                            </td>-->
                  <td><input type="submit" class="btn btn-primary" style="" name="submit" value="Update User"><br></td></tr>
              
<tr><td> <input type="hidden" class="info" name="uid" maxlength="100"value="<?php echo $uid;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="uemail" maxlength="100"value="<?php echo $uemail;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" class="info" name="upassword" maxlength="100"value="<?php echo $upassword;?>" required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uactive" value="<?php echo $uactive;?>"></option>
</td></tr><tr><td> <input type="hidden" class="info" name="uusername" autocomplete="off" value="<?php echo $uusername;?>"required readonly></td>
</td></tr><tr><td> <input type="hidden" name="uperms" value="<?php echo $uperms;?>"></td>
</tr>

                </tbody>
            </table><!--<table>
       
    
    <tr>
        <td class="headfoot"></td>
    </tr>
    
</table>-->
</form>
</div>

<div id="rightcolumns1" style="">
	 
		    
	 

<div class="label-left">	
User Id:</div>

<input value="<?php echo $uid;?>" class="right" readonly title="This value can not be edited"> 

<div class="label-left" style="">	
Email:</div>

<input value="<?php echo $uemail;?>" readonly title="To change your email address, please use the Contact/Change button and request the change."> 
<br>
<div class="label-left" style="">	
Username:</div>


<input value="<?php echo $uusername;?>"readonly title="To change your Username please use the Contact/Change button and request the change.">  <br>
</h1>
<br>


<br>

<div style="text-align:center;font-size:18px;line-height:1.6em;">Directly Text, Call or Email:<br>

Mike Dunne<br>301-706-7951</br>miked@croftonas.com</br></br>

Kelly Zeigler</br> 717-587-8707</br>kellyz@croftonas.com</br></br>

Missy Oswald</br> 717-330-2974</br> missyo@croftonas.com</br></br></p></div>
	 </div>
	 
</div>	 </div>
<div class="footcontainer" >
	
<p>Crofton Auction Services</p>
<p>5 Park Place, Suite 519</p>
<p>Annapolis, MD 21401</p>
<p><a style="color: #801323; text-decoration:none;" href="tel:301-706-7951">301-706-7951</a></p>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <!-- BootStrap -->
<script type="text/javascript" charset="utf8" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

      <!-- <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	
<!-- Core Logic -->
<script type="text/javascript">
if (location.pathname !== '/') {
$("a[href*='" + location.pathname + "']").addClass("btn-current");
} else {
var home = document.getElementById("home").getElementsByTagName('a')[0];
home.className = 'btn-current';
}
</script>
</body>
</html>




<?php 
//include footer template
//require('layout/footer.php'); 
}?>
