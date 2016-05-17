<?php 
$database = true;    // set to true to connect to database - see db_misc.php
$session = false;    // no session needed
include("inc/const.php");     // include global constants
include("inc/db_misc_new.php");   // include generic database functions 
 
$make = $_GET["var1"];
$cars = dbMultiResult('SELECT cars.*, makes.description FROM cars, makes WHERE makes.id = ' . $make . ' AND cars.id = makes.id;');
$exercise_number = 3;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>PHP Exercise</title>
</head>
<body onLoad="document.test.make.focus()">
 
<table>
    <tr> 
        <td width="200"><a href="php_exercise_3.php"><img src="img/cate-logo.gif" alt="Cate School" /></a></td> 
        <td width="500"><h1>PHP Exercise <?= $exercise_number ?></h1></td> 
</tr>
</table>
        <h2>Inventory:</h2>                
<br>
    <? foreach ($cars as $c) { ?>
        Make: <?= $c['description'] ?><br>                
        Model: <?= $c['model'] ?><br>                
        Color: <?= $c['color'] ?><br><br>
        Options:<br>
        <? $car_id = $c['id']; ?>
        <? $options = dbMultiResult('SELECT available_options.description FROM car_options, available_options WHERE car_options.car_id = ' . $car_id . ' AND car_options.option_id = available_options.id'); ?>
        <? foreach ($options as $o) { ?>
            <?= $o['description'] ?><br>                
        <? } ?>                        
    <? } ?>
 
</body>
</html>