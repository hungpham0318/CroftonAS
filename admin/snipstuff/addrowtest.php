<!DOCTYPE html>
<html>
<style>
input[type=text]{
 padding:4px;
 margin:3px;
}
.add_button{
  text-decoration:none;
  color:green;
}
.remove_button{
  text-decoration:none;
}</style>

<body>
<form name="codexworld_frm" action="addrowpost.php" method="post">
<div class="field_wrapper">

<?php
$qmdid = $_GET['did'];

        include ".configbs.php";






$resultic=mysqli_query($mysqli, "SELECT * FROM test_i_charges_temp WHERE 1");

// mysqli_query returns false if something went wrong with the query
if($resultic === FALSE) { 
     die(mysqli_error($con)."<b><br><br>query begins line 34 - This error invoice query  resultit </b>");
    //or die(mysql_error($con));
}else {
// as of php 5.4 foreach
//echo '<br /><table id="myTable" style ="width:45%;border: 1px solid #000000;/*position:absolute;*/top:50em;"><thead> <tr><th>#</th><th>Description</th><th>rd</th><th>Qty</th><th>Rate</th><th>Amount</th><th>x</th></tr>';

//echo '<tbody>';
$GLOBALS['x'] = 1;
foreach( $resultic as $row ) {

$icnum = $x;

echo ' <div>
<input name="ichargefield['+f+'][]" value="'+$row['ic_id']+'" style="width: 3em;">
<input name="ichargefield['+f+'][]" value="'.$row['ic_description'].'" style="text-transform:uppercase!important;width: 24em;">
<input name="ichargefield['+f+'][]" value="'.$row['ic_ratedesc'].'" style="width: 13em;style="text-transform:uppercase!important;">
<input name="ichargefield['+f+'][]" value="'.$row['ic_qty'].'" style="width: 3em;">
<input name="ichargefield['+f+'][]" value="'. number_format($row['ic_rate'],0).'" style="width: 4em;">
<input name="ichargefield['+f+'][]" value="'.$row['ic_amount'].'" style="width: 5em;">
<input name="ichargefield['+f+'][]" value="'.$row['ic_did'].'" type="hidden" >
<input name="ichargefield['+f+'][]" value="'.$row['ic_iid'].'" type="hidden">
	
<input name="ichargefield['+f+'][]" value="'+ $row['ic_mid']+'" type="hidden" >
<input name="ichargefield['+f+'][]" value="'.$row['ic_date'].'" type="hidden">
<input name="ichargefield['+f+'][]" value="'.$row['ic_solddate'].'" type="hidden" >
<input name="ichargefield['+f+'][]" value="'.$row['ic_maid'].'" type="hidden">
<input name="ichargefield['+f+'][]" value="'.$row['ic_stock'].'" type="hidden" >
<input name="ichargefield['+f+'][]" value="'.$row['ic_paid'].'" type="hidden">
<input name="ichargefield['+f+'][]" value="'.$row['ic_note'].'" type="hidden">
<input name="ichargefield['+f+'][]" value="'.$row['ic_xtraint'].'" type="hidden">
<input name="ichargefield['+f+'][]" value="'.$row['ic_price'].'" type="hidden" >
</div>';
     
       
          }}?> 
        
  
</div> <a href="javascript:void(0);" class="add_button" title="Add field">Add Fields</a>';
<input type="submit" name="submit" value="SUBMIT"/>
</form>
  <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script>
<script>
    var maxField = 99; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML =  {row :function(f){
            return '<div><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/><input type="text" name="ichargefield['+f+'][]" value=""/> <a href="javascript:void(0);" class="remove_button" title="Remove field">&times;</a></div>'; 
            //New input field html 
        }};

    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML.row(x)); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });</script>
</body>
</html>
