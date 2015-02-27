<?php 

// return total number of records (int)
function total($conn) {
	$sql = 'SELECT count(*) FROM movies';
	$count = $conn->query($sql)->fetchColumn();
	return $count;
}

function class_autoloader($class) {
	$path = "classes/$class.php";
	if (file_exists($path)) {
		require_once($path);
	} else {
		die("The file $class.php could not be found");
	}
}

spl_autoload_register('class_autoloader');

 ?>