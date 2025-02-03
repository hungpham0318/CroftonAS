<?php
if($_POST){
    $field_values_array = array_filter($_POST['ichargefield']);
    if($field_values_array){
        foreach ($field_values_array as $value){
            echo $value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6]. '<br />';




            //your mysql goes here
            //$sql="INSERT INTO stock_port (name, ticker) VALUES ('$value[0]', '$value[1]')";          
        }
    }
}
?>
