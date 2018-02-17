<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$location = (empty ($_POST['city']))?"New York":$_POST['city'];
	$units = 'metric';
	$mode = 'xml';
	$key = '7154dddfd3b6fde40800ed15340d8895';
	
	$forecast = 'http://api.openweathermap.org/data/2.5/weather?'.'q='.$location.'&units='.$units.'&mode='.$mode.'&APPID='.$key;
	
	$xml = simplexml_load_file($forecast) or die ('wanderror');
	
	$sky ='http://api.openweathermap.org/img/w/'.$xml->weather['icon'].'.png';
	
	echo '<h1> It\'s '.$xml->weather['value'];
	echo ' in '.$xml->city['name'].'<img src='.$sky.'></h1>';
	echo '<ul><li>Temperature: '.$xml->temperature['value'];
	echo '&deg;';
	echo '<li>Wind: '.$xml->wind->speed['name'];
	echo '<li>Humidity: '.$xml->humidity['value'];
	echo '&#37;</ul>';
}
echo '<form method="POST" action="celsius.php">';
echo '<fieldset><legend>Enter Location:</legend>';
echo '<input type="text" name="city">';
echo '<input type="submit" name="go" value="Cast">';
echo '</fieldset></form>';

?>
	