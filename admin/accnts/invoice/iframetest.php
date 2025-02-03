
<!DOCTYPE html>
<html>
  <head>
<title>iframetest.php</title>
<style>
</style>
  </head>
  <body>
<h1>Simple Start</h1>



<br/>Success Case :- http://www.w3schools.com/
<br/>Failure Case :- http://www.google.com
<br/>
<input type="text" id="addr" />
<input type="button" value="Go" onclick="change();" />
<iframe id="browse" src="http://www.google.com" style="width:100%;height:100%"></iframe>











 <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script><script><script>




<script>

var iframeError;

function change() {
    var url = $("#addr").val();
    $("#browse").attr("src", url);
    iframeError = setTimeout("error()", 5000);
}

function load(e) {
    alert(e);
}

function error() {
    alert('error');
}

$(document).ready(function () {
    $('#browse').on('load', (function () {
        load('ok');
        clearTimeout(iframeError);
    }));

});
</script>
</body>
</html>