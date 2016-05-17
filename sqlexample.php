<?php
define("HOST", "localhost");
define("NAME", "vehicles");
define("USER", "baduser");
define("PASS", "KelloggIsCool");

// define("HOST", "localhost");
// define("NAME", "vehicles");
// define("USER", "dbvehicles");
// define("PASS", "Test1234!");
 
$mysqli = new mysqli(HOST, USER, PASS, NAME);
 
$result = $mysqli->query('SELECT * FROM cars ORDER by make');
 
$whole_result = array();
 
while ($row = $result->fetch_assoc()){ 
    array_push($whole_result, $row);
} 
 
print_r ($whole_result);
 
echo ("<br><br>");
 
foreach ($whole_result as $c) { 
    echo ($c['make'] . "," . $c['model'] . "," . $c['color']) . "<br>";
} 
?>