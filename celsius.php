<?php

	$city = 'New York';
	$units = 'metric';
	$mode = 'xml';
	$key = '7154dddfd3b6fde40800ed15340d8895';
	
	$forecast = 'http://api.openweathermap.org/data/2.5/weather?'.'q='.$city.'&units='.$units.'&mode='.$mode.'&APPID='.$key;
	
	$xml = simplexml_load_file($forecast) or die ('wanderror');
	
	echo $xml->city['name'];
	echo $xml->weather['value'];
	echo $xml->temperature['value'];

?>