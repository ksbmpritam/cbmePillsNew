<?php

// $con=mysqli_connect("localhost","wwwparik_wwwparikshagyan","wqewqe@@!#","wwwparik_infotrade");

// mysqli_set_charset('utf8', $con);

// if(mysqli_connect_errno()){

// 	echo "faild to connect to mysql".mysqli_connect_errno();

// }

	

		if($_SERVER['HTTP_HOST']=="localhost" or $_SERVER['HTTP_HOST']=="162.241.67.7")

		{	

			//local  


			 DEFINE ('DB_USER', 'cbmepill_test');

			 DEFINE ('DB_PASSWORD', 'R1OyPtqjwCUa');

			 DEFINE ('DB_HOST', 'localhost'); 

			 DEFINE ('DB_NAME', 'cbmepill_test');

		}

		else

		{

		
		 	DEFINE ('DB_USER', 'cbmepill_test');

			 DEFINE ('DB_PASSWORD', 'R1OyPtqjwCUa');

			 DEFINE ('DB_HOST', 'localhost');

			 DEFINE ('DB_NAME', 'cbmepill_test');

		}



	

	$con =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	



	if ($con->connect_errno) 

	{

    	echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;

	}







// mysqli_query('SET character_set_results=utf8');

// mysqli_query('SET names=utf8');

// mysqli_query('SET character_set_client=utf8');

// mysqli_query('SET character_set_connection=utf8');

// mysqli_query('SET character_set_results=utf8');

// mysqli_query('SET collation_connection=utf8_general_ci');



?>

