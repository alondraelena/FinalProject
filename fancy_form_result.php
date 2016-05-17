<?php 

$database = true;    // set to true to connect to database - see db_misc.php
$session = false;    // no session needed
include("inc/const.php");     // include global constants
include("inc/db_misc_new.php");   // include generic database functions 
$dbname = 'Seniors';
$sel_senior = $_GET["var1"]; // sel_senior is the index of the selected senior from the index page 
$age = dbMultiResult('SELECT age FROM students.seniors WHERE id =' . $sel_senior . '');
$name = dbMultiResult('SELECT name FROM students.seniors WHERE id ='. $sel_senior . '');
$dorm = dbMultiResult('SELECT dorm FROM students.seniors WHERE id ='. $sel_senior . '');
$last = dbMultiResult('SELECT last FROM students.seniors WHERE id ='. $sel_senior . '');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
<style>
    body {
    font-family: 'Josefin Slab', serif;
    color: #191970;
    }
</style>
<title>New PHP Exercise</title>
</head>

<body onLoad="document.test.make.focus()" bgcolor = "#778899" >
 
<!-- <table>
    <tr> 
        <td width="200"><a href="fancy_form.php"><img src="img/cate-logo.gif" alt="Cate School" /></a></td> 
        <td width="500"><h1>Information about <? arraytostring($name)?> <? arraytostring($last) ?></h1></td>  -->
        <a href="fancy_form.php"><img width="200"src="img/cate-logo.gif" alt="Cate School" align ="left" /></a>
        
    

</tr>
</table>
        <center><h1>Information about <? arraytostring($name)?> <? arraytostring($last) ?></h1></center>
        <!-- <center><img width ="150"src = 'http://www.cate.org/cateprofiles/132.jpg'/></center> -->
        <center><h2><? arraytostring($name)?> is <? arraytostring($age) ?> years old  
            <br> 
            and lives in <a href='http://www.cate.org/125/'><? arraytostring($dorm) ?> </a>.
        </h2> </center>


</body>
</html>