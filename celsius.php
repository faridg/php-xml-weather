<?php

	$location = 'New York';
	$units = 'metric';
	$mode = 'xml';
	$key = '7154dddfd3b6fde40800ed15340d8895';
	
	$forecast = 'http://api.openweathermap.org/data/2.5/weather?'.'q='.$location.'&units='.$units.'&mode='.$mode.'&APPID='.$key;
	
	$xml = simplexml_load_file($forecast) or die ('wanderror');
	
	$sky ='http://api.openweathermap.org/img/w/'.$xml->weather['icon'].'.png';
	
	echo '<h1> Today in '.$xml->city['name'];
	echo ' it\'s '.$xml->weather['value'].'<img src='.$sky.'></h1>';
	echo '<ul><li>Temperature: '.$xml->temperature['value'];
	echo '&deg;';
	echo '<li>Wind: '.$xml->wind->speed['name'];
	echo '<li>Humidity: '.$xml->humidity['value'];
	echo '&#37;';

?>