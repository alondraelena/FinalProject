<?php 
$database = true;    // set to true to connect to database - see db_misc.php
$session = false;    // no session needed
include("inc/const.php");     // include global constants
include("inc/db_misc_new.php");   // include generic database functions 
 
$makes = dbMultiResult('SELECT id, description FROM makes ORDER by description');
$exercise_number = 3;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>PHP Exercise</title>
</head>
<body onLoad="document.test.make.focus()">
 
<?php     
if( count( $_POST ) > 0 ) {                                   // check if being posted back
    if ($_POST["button"] == 'OK') {
        $make_id = $_POST["make"];     
        header("Location: php_exercise_3_result.php?var1=$make_id");  // call result.php and pass make
    }
}
?>
 
<script type="text/javascript">
function submitForm(o) {    
        if (cancelAction) {
              alert("Cancel button pressed.");
            return true;
          }    
        if (o.make.value == 'Select') {
              alert("Please select a make.");
            o.make.focus();
            return false;
        }                
        return true;
}
</script>
 
<table>
    <tr> 
        <td width="200"><a href="php_exercise_3.php"><img src="img/cate-logo.gif" alt="Cate School" /></a></td> 
        <td width="500"><h1>PHP Exercise <?= $exercise_number ?></h1></td> 
</tr>
</table>
<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>" onSubmit="return submitForm(this.elements)" accept-charset="UTF-8" name=exercise >
<br /><br /><br />
   <table>
      <tr>
      <td width="125"><b>Make:</b></td>
      <td width="200">
            <select name="make">
                <option value="Select" selected="selected">Select</option> 
                <? foreach ($makes as $m) { ?>
                    <option value="<?= $m['id'] ?>" /><?= $m['description']; ?>
                    </option>
                <? } ?>
            </select>
      </td>
      </tr>
   </table>
   <br><br>
   <table>
      <tr>
      <td width="25">&nbsp;</td>
      <td width="100"><input type="submit" name="button" value="OK"  onclick="cancelAction=false" /></td>
      <td width="100"><input type="submit" name="button" value="Cancel"  onclick="cancelAction=true" /></td>
      </tr>
   </table>    
</form>
</body>
</html>