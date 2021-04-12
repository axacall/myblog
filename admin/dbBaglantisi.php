<?php 
try {
	$db=new PDO("mysql:host=localhost;dbname=xxxxxx","root","xxxxxxxxx");
	// echo "Success Connecting";
} catch (Exception $e) {
	echo $e->getMessage();
}

?>