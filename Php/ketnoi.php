<?php
   $hostname="localhost";
 $username ="root";
 $pwd="12345678";

 $conn = new mysqli($hostname,$username,$pwd);

 if($conn -> connect_error){
	die("failed: ".$conn ->connect_error);
 }
    mysqli_select_db($conn,"user");

?>