<?php session_start();
$title="TITLE";
$pageperms =3;
$aperms= $_SESSION['perms'];
if(!isset($_SESSION['ausername']) || $_SESSION['ausername']=="" || $aperms < $pageperms){header('Location: ../worldview/index.php?msg=You_do_not_have_permission_to_view_that_page');}else{
		$ausername=$_SESSION['ausername'];
		$apassword=$_SESSION['apassword'];
		}?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body onload='updateFeed();'>
   <button type="button" onclick="loadDoc()">Change Content</button>
  <div id="LiveFeed" class="">
 

      </div>   

 <button type="button" onclick="updateFeed()">Change Content</button>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
   
<script>
// Fill modal with content from link href

function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("LiveFeed").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "logajaxmaster.php", true);
  xhttp.send();
  
  $('#LiveFeed').html(responseText);
setTimeout(loadDoc,1000);
}
function updateFeed(){
$.ajax({
url: 'logajaxmaster.php',
data: my_data,
type: 'GET',
success: function(response){}}

$('#LiveFeed').html(response);
setTimeout(loadDoc,1000);
});



</script>
</body>
</html>
