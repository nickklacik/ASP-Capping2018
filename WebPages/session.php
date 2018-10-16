<?php

    //Establish a connection to the IRB database
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "postgres";
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres");

    //Check if the session is active
    if(session_status() != PHP_SESSION_ACTIVE){
	  session_start();
    }

?>
