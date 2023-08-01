<?php
    $cityname = $_GET['cityname'];

    // connecting database
    $con = new mysqli('DB_USERNAME', 'DB_HOST', 'DB_PASSWORD', 'weather_data'); 
    if(!$con){
        die('Failed to connect database');
    }

    // check if fresh data is available else retrive from openweather api
    include '_apitomysql.php';

    // retrive the fresh data
    $query = "SELECT * FROM data WHERE city='$cityname' ORDER BY fetched_on DESC limit 1";
    $result = $con -> query($query);

    // get data, convert json and print
    $row = $result->fetch_assoc();
    print json_encode($row);

    // freeing memory and closing connection with database
    $result -> free_result();
    $con -> close();
?>