<?php
 
$city_name = 'Tbilisi';
$api_key = '0f245e54bb6d307d60040f995dee2474';
$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='. $city_name . '&appid=' . $api_key;
$weather_data = json_decode ( file_get_contents($api_url), true);

$temperature = $weather_data['main']['temp'];
$temperature_in_celcius = round($temperature - 273.15);
?>
