<?php

//client web service
//to call film web service
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
//call url page web service api 
$result = $client->request('GET', 'http://localhost:8080/webservice/sakila/film_svc.php');

$films = json_decode($result->getBody()->getContents());
foreach ($films as $film) {
	echo $film->title . '<br>';
}