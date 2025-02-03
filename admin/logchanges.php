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


<style>
</style>
  </head>
  <body>
<h1>Simple Start</h1>



<div id="lol"></div>
 <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script>
 
 











<?php
$old_article = '{"id":50,"name":"AIK","description":"Hejja!","tasks":[{"foo":"bar"}]}';;
$new_article = '{"id":50,"name":"Djurgården","description":"Hejja!","tasks":[{"foo":"zaz"}]}';

$diff = xdiff_string_diff($old_article, $new_article, 1);
if (is_string($diff)) {
    echo "Differences between two articles:\n";
    echo $diff;
}

?>

<script>


var aik = {"id":50,"name":"AIK","description":"Hejja!","tasks":[{'foo':'bar'}]};
var dif = {"id":50,"name":"Djurgården","description":"Hejja!","tasks":[{'foo':'zaz'}]};

console.log(filter(aik, dif));

function filter(obj1, obj2) {
    var result = {};
    for(key in obj1) {
        if(obj2[key] != obj1[key]) result[key] = obj2[key];
        if(typeof obj2[key] == 'array' && typeof obj1[key] == 'array') 
            result[key] = arguments.callee(obj1[key], obj2[key]);
        if(typeof obj2[key] == 'object' && typeof obj1[key] == 'object') 
            result[key] = arguments.callee(obj1[key], obj2[key]);
    }
    return result;
}

console.log(diff);
    //http://stackoverflow.com/questions/679915/how-do-i-test-for-an-empty-javascript-object
                var isEmptyObject = function(obj) {
                    var name;
                    for (name in obj) {
                        return false;
                    }
                    return true;
                };
var obj1 = {"id":50,"name":"AIK","description":"Hejja!","tasks":[{'foo':'bar'}]};
var obj2 = {"id":50,"name":"Djurgården","description":"Hejja!","tasks":[{'foo':'zaz'}]};
                //http://stackoverflow.com/questions/8431651/getting-a-diff-of-two-json-objects
                var diff = function(obj1, obj2) {
                    var result = {};
                    var change;
                    for (var key in obj1) {
                        if (typeof obj2[key] == 'object' && typeof obj1[key] == 'object') {
                            change = diff(obj1[key], obj2[key]);
                            if (isEmptyObject(change) === false) {
                                result[key] = change;
                            }
                        }
                        else if (obj2[key] != obj1[key]) {
                            result[key] = obj2[key];
                        }
                    }
                    return result;
                };
                
 </script>               
                </body>
</html>