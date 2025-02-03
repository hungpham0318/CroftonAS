
<?php
$iid=3205;
$j=0;
while($j<=30){
$j++;
echo "</br>";
if ($j<=10){
$ic_icid=".0".substr($j, -1);
}else{$ic_icid=number_format(substr($j/10,-3),3 );}
echo "<b>".$iid.$ic_icid."</b>";


}
?>





<?php
$ic_icid= $iid;
$j=0;
while($j<=20){
$j++;
echo "</br>";
if ($j<=9){
$apndx10=substr($j/10, -1);
echo "appndx10=substr($j/10, -1):";
}else{$apndx10=substr($j, -2);
echo "appndx10=substr($j/10, -2):";}
echo "</br>";
echo $apndx10; 
echo "</br>";
echo "3201.substr($apndx10, -3))";
echo "</br>";
echo "<b>3201".".".substr($apndx10, -3)."</b>";
echo "</br>";
}
?>

<?php
$iid=3205;
$j=0;
while($j<=-1){
$j++;
echo "</br>";
if ($j<=9){
$apndx10=substr($j/10, -1);
echo "appndx10=substr($j/10, -1):";
}else{$apndx10=substr($j, -2);
echo "appndx10=substr($j/10, -2):";}
echo "</br>";
echo $apndx10; 
echo "</br>";
echo "3201.substr($apndx10, -3))";
echo "</br>";
echo "3201".".".substr($apndx10, -3);
echo "</br>";
echo number_format(substr($j/10,-3),3 );

echo "</br>";
$apndx1000=substr($j/1000, -4);
echo $apndx1000;
echo "</br>";
echo $iid.".".substr($apndx1000, -4);
echo "</br>";
$ic_icid= $iid.".".$j;
echo number_format($ic_icid,2);
echo "</br>";
}





$j=0;
$k=0;
while ($j<=-1){
$j++;
$k=$j/10;
$k10 = number_format(substr($j/10,-3),2 );
echo "3201".".".$f2;
echo "</br>";

echo "3201".$f2;
echo "</br>";
}




$j=0;
while ($j<=-1){
$j++;
$f2 = number_format($j/10, 2);
echo "3201".$f2;
echo "</br>";

echo "3201".$f2;
echo "</br>";
}

?>