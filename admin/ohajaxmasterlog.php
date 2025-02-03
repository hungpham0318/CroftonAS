<!DOCTYPE html>
<html>
<body>


<p style = "font-size: .8em;" id="masterlog"></p>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>

<script>
function loadDoc() {

  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("masterlog").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "logajaxmaster.php", true);
  xhttp.send();
}
     loadDoc();

var refInterval = window.setInterval('loadDoc()', 30000);  




</script>

</body>
</html>