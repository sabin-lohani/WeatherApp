<?php
    $findcity = "SELECT * FROM data WHERE city='{$cityname}';";
    $checkfreshness = "SELECT * FROM data WHERE city='{$cityname}' AND fetched_on >= DATE_SUB(NOW(), INTERVAL 5 MINUTE) ORDER BY fetched_on DESC limit 1";
    $foundcity = $con -> query($findcity);
    $freshness = $con -> query($checkfreshness);

    if($foundcity -> num_rows == 0) {
        $apiurl = 'https://api.openweathermap.org/data/2.5/weather?q='.$cityname.'&appid=[Your API Key]&units=metric';

        // store in json object
        $data = file_get_contents($apiurl);
        $json = json_decode($data, true);

        // assigning fetched datas to variables as required
        $city = $json['name'];
        $fetched_on = date("Y-m-d H:i:s");  // current date
        $country = $json['sys']['country'];
        $timezone = $json['timezone'];
        $temperature = $json['main']['temp'];
        $weather_condition = $json['weather'][0]['main'].' - '.$json['weather'][0]['description'];
        $pressure =$json['main']['pressure'];
        $humidity =$json['main']['humidity'];
        $wind_sp = $json['wind']['speed'];
        $wind_deg = $json['wind']['deg'];
        $icon = $json['weather'][0]['icon'];

        // inserting to the database table
        $insertquery = "INSERT INTO data (city, fetched_on, country, timezone, temperature, weather_condition, pressure, humidity, wind_sp, wind_deg, icon) VALUES ('$city', '$fetched_on', '$country', $timezone, $temperature, '$weather_condition', $pressure, $humidity, $wind_sp, $wind_deg, '$icon');";
        $con->query($insertquery);

    } elseif($freshness -> num_rows == 0) {
        $apiurl = 'https://api.openweathermap.org/data/2.5/weather?q='.$cityname.'&appid=[Your API Key]&units=metric';

        // store in json object
        $data = file_get_contents($apiurl);
        $json = json_decode($data, true);

        // assigning fetched datas to variables as required
        $fetched_on = date("Y-m-d H:i:s");  // current date
        $temperature = $json['main']['temp'];
        $weather_condition = $json['weather'][0]['main'].' - '.$json['weather'][0]['description'];
        $pressure =$json['main']['pressure'];
        $humidity =$json['main']['humidity'];
        $wind_sp = $json['wind']['speed'];
        $wind_deg = $json['wind']['deg'];
        $icon = $json['weather'][0]['icon'];

        // update to the database table
        $updatequery = "UPDATE data SET fetched_on='$fetched_on', temperature=$temperature, weather_condition='$weather_condition', pressure=$pressure, humidity=$humidity, wind_sp=$wind_sp, wind_deg=$wind_deg, icon='$icon' WHERE city='$cityname';";
        $con->query($updatequery);
    }
?>