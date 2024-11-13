<?php 
$servername="localhost";	
$username="root";
$password="";
$db="db_studentManagement";

$con=mysqli_connect($servername,$username,$password,$db);

if(!$con)
{
 echo "ERROR CONNECTION";	
}

?>