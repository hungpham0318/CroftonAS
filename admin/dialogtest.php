<!DOCTYPE html>
<html>
<head>

<style>
#keysbutton{background-color:#660000;color:#ffffff;}
<?php include"worldview/css/snow-nav-admin.css";?>
#wrapkeysmenu{display:block; float:left;text-align:left;width:100%;}
#floatrightmenu{text-align:right;float:right; width:55%;display:block;}
#statuskey{width:290px;border:none;}
#substatuskey{width:375px;border:none;}
#showhidekeys {
    width:40%;
    padding: 5px 0;
    text-align: left;
    background-color: white;
    margin-top:5px;
    display:none;

}
</style>
</head>
<body>


<div id="wrapkeysmenu">
<button id="keysbutton" onclick="myShowStatusKeys()">Keys</button>
<div id="floatrightmenu">
<?php include"worldview/css/snow-admin-nav.html";?>
</div>
<div id="showhidekeys">
 <iframe id="statuskey" src="http://www.croftonas.com/admin/worldview/css/status-key-iframe.php" sandbox="allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts "></iframe> <iframe id="substatuskey" src="http://www.croftonas.com/admin/worldview/css/substatus-key-iframe.php" sandbox="allow-forms allow-top-navigation allow-popups allow-same-origin allow-scripts "></iframe>
</div>
</div>
<script>
function myShowStatusKeys() {
    var x = document.getElementById('showhidekeys');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

</body>
</html>

