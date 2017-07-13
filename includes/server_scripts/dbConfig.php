<?php 
	#Define the database credentials as constants
	define("SERVER_NAME", "localhost");
    define("USER_NAME", "root");
    define("USER_PASSWORD", "");
    define("DATABASE_NAME", "records");

    //Instantiate an object of the mysqli class to connect to the database
    $database = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,DATABASE_NAME) or die("Sorry, could not connect to database.");

?>