<?php

include("vendor/autoload.php");

try {
    $curl = new \Curl\Curl();
} catch (ErrorException $e) {
}

/*
 * ?app_id={YOUR_APP_ID}
  &app_code={YOUR_APP_CODE}
  &searchtext=425+W+Randolph+Chicago
 */
$curl->get('https://geocoder.api.here.com/6.2/geocode.json', [
    'app_id' => 'hPwgQ5qFrwfVRUztyvP8',
    'app_code' => 'X1e1d2GM_sjFy29PNs7SRw',
    'searchtext'=>'Мильчакова 8А, Ростов-на-Дону'
]);

$data = $curl->getResponse();

echo "<pre>";
print_r($data);