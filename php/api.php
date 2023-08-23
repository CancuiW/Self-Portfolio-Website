 <!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: get the information from weather API


-->


<?php
//get the $data from weather API
//Json file: {"coord":{"lon":-83.0458,"lat":42.3314},"weather":[{"id":803,"main":"Clouds","description":"broken clouds","icon":"04n"}],"base":"stations","main":{"temp":15.89,"feels_like":15.81,"temp_min":11.97,"temp_max":18.04,"pressure":1012,"humidity":87},"visibility":10000,"wind":{"speed":8.75,"deg":210,"gust":11.83},"clouds":{"all":75},"dt":1680747889,"sys":{"type":2,"id":2006979,"country":"US","sunrise":1680692883,"sunset":1680739285},"timezone":-14400,"id":4990729,"name":"Detroit","cod":200}
//apiKey---User account(personal)
$apiKey = "5fb1a144fc01f5c4df7c6e76edbc1b2a";
$cityId = "4990729";
$googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
// create & initialize a curl session
$ch = curl_init();
//The HTTP response header information is not returned, only the response body
curl_setopt($ch, CURLOPT_HEADER, 0);
// Set the result output to be a string.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Set the url
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
//1--Automatic follow redirection
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//0, does not output detailed debugging information, only the necessary information
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
//Execution with curl_exec().
$response = curl_exec($ch);
// Releasing the cURL handle.
curl_close($ch);
// DECODE our JSON from API to use in PHP
$data = json_decode($response);
$currentTime = time();
?>
