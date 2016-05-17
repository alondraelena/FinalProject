<?

if( $database ) {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
}

if( $session  ) {
	session_start();
	header("Cache-control: private"); 
}

function dbMultiResult($sql){ 
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$result = $mysqli->query($sql);
	$whole_result = array();
    while ($row = $result->fetch_assoc()){ 
		array_push($whole_result, $row);
    } 

	return $whole_result; 
}

function dbRowResult($sql){ 
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
	if( $row[id] )
		return $row; 
	else
		return array();
}

function dbValueResult($sql){ 
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
	return $row[0];
}

function dbNoResult($sql){
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$result = $mysqli->query($sql);
	return $result;
}
// this new function turns an array into a string 
function arraytostring($array){
	foreach ($array as &$s){
            echo implode (",", $s);
            } 
}


?>