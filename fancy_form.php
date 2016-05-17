<?php 

$database = true;    // set to true to connect to database - see db_misc.php
$session = false;    // no session needed
include("inc/const.php");     // include global constants
include("inc/db_misc_new.php");   // include generic database functions 
$students = dbMultiResult('SELECT id, name FROM students.seniors ORDER by name');
$dbname = 'Seniors';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<!-- Google Fonts API: Josefin Slab -->
	<link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
<style>
	body {
	font-family: 'Josefin Slab', serif;
	color: #DAA520;
	}
	select {
	    width: 100%;
	    padding: 16px 20px;
	    border: none;
	    border-radius: 10px;
	    background-color: #FFDAB9;
	}
</style>

	<title>Fancy Form</title>

</head>

<body onLoad="document.test.make.focus()" bgcolor = "#00008B" >
 
<?php     
if( count( $_POST ) > 0 ) {                                   // check if being posted back
    if ($_POST["button"] == 'OK') {
        $senior_id = $_POST["student"];     
        header("Location: fancy_form_result.php?var1=$senior_id");  // call result.php and pass make
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
              alert("Please select a student.");
            o.make.focus();
            return false;
        }                
        return true;
}
</script>
 
	<center><a href="fancy_form.php"><img width ="1000" src="img/rotated.jpeg" alt="cool Pic" /></a></center>
	<center><h1 style=" font-size: 48px">Cate School <?= $dbname ?></h1></center>
    <hr>

<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>" onSubmit="return submitForm(this.elements)" accept-charset="UTF-8" name=exercise >
<br /><br /><br />
   <table>
      <tr>
      <td width="125"><b style="font-size: 36px">Student:  </b></td>
      <td width="200">
            <select name="student">
                <option value="Select" selected="selected">Select</option> 
                <? foreach ($students as $s) { ?>
                    <option value="<?= $s['id'] ?>" /><?= $s['name']; ?>
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