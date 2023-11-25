<?php

$host="dev-pvsupplies-db.cjzs8wy5u6is.us-east-1.rds.amazonaws.com";
$port=3306;
$user="master";
$password="57?[V+gJ";
$dbname="PVSUPPLIES_DB";

try{

	$con = new mysqli($host, $user, $password, $dbname, $port)

	or die ('Could not connect to the database server' . mysqli_connect_error());

}catch(Exception $e){
	echo''. $e->getMessage();
}


 

//$con->close();

?>