<?php
    //   ini_set('display_errors', 1);
    //   ini_set('display_startup_errors', 1);
    //   error_reporting(E_ALL);
      
    //   print_r($_SESSION);die;
      
    if (isset($_SESSION["id"])) {
        $userValue = $_SESSION["id"];
        // echo "Value of 'id' cookie: " . $userValue;
    } else {
       	header( "Location:logout.php");
    }
	
?>