<?php
include_once('vendor/autoload.php');

try {
    $api = new \Visterio\Client\VisterioApiClient(1.0);
} catch (ErrorException $e) {

}
$api->auth()->setClientId(3)->setClientToken('mpuwps9KLfAzmlZWzfxEv1iq91R4Z8wHVksCm4ey');
$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxNjY5NzNlNjY0YTViOTJlYTc2NTI5MzY5YTI2NmUxMzhiMzAwNzJiMDg4ODQ3NGI1MzI1M2M5YWUwNTI5MjkwNGZlZTMyNTEwNzRlODNhIn0.eyJhdWQiOiIzIiwianRpIjoiZTE2Njk3M2U2NjRhNWI5MmVhNzY1MjkzNjlhMjY2ZTEzOGIzMDA3MmIwODg4NDc0YjUzMjUzYzlhZTA1MjkyOTA0ZmVlMzI1MTA3NGU4M2EiLCJpYXQiOjE1NTk3NjI5NzgsIm5iZiI6MTU1OTc2Mjk3OCwiZXhwIjoxNTkxMzg1Mzc3LCJzdWIiOiI0Iiwic2NvcGVzIjpbIioiXX0.nLAyb-02RdWxXg8g_avXT2-VpaqRyZavkkK7dfPUDIX0Q9WXdpso0OpSkGf_42aTdifPrrvBwsq0qxUG1B678qxL32D7nNoQYb1c2epus_3VTF2Ylhgn1IdmpIDhilLcge6ofBHFDNv4czBe-ov2R25jHcnBxfghw6sgDuCNYeYJHZ6PQ2AegO4zKkdG5Gwzveqtyh0PlRP5DrsmJCdb7fkcTpiKguqSpuFkoYkEyLNq3FHyczGN1REZcBQizs_WxtKbb1BsNzX1lGPQUPqGybOZJ-jk8G1rDd_QUPqb4TNYE8eTcOSbjA5iYEHAGIAAC4YhQEPKVZaDyswjgA3SgFS3JFvMQoKN6Vf4za2xRy6JhnkjcRPpBSzcX_vN2fTcXcADz7Z-w5pqyABn-JsJS26uhpK039N7T6Cmz5cSjSWt2BTy-d1HK6XweK_2d72uifU4IaU2pkrLaBm1OssPSyHHhTpVOkiKo12CmRMctRsPSA6M0zkKdL2MtLezRRCGMaB1gI43D0XRZBteE21ep5QnSrkdms7n48ak0mtUlPSYreQVwBXJt-CUXzL6xy9COBNjsj4rTjh5HmjOAxUwky6RkTolSfpURpwtagdSBtHDUCGT8KhqjIgMuGn8mi4UkNglrmIEL3oMvy02V717s8bCj2rpbxUxbSjuNdZzdxE";

$resp = $api->waylists()->getPredict($access_token, [
    'address' => 'Зорги'
]);

$jsonParse = 1;

if ($jsonParse) {
    echo "<pre>";
    print_r(json_decode($resp));
}
else
    print_r($resp);

//$waypoint1 = "47.216680,39.628622";
//$waypoint2 = "47.216643,39.631658";
//
//echo "<pre>";
//try {
//    $curl = new \Curl\Curl('https://matrix.route.api.here.com/routing/7.2');
//
//} catch (ErrorException $e) {
//    print_r($e);
//}
//
//    $data = $curl->get('https://matrix.route.api.here.com/routing/7.2/calculatematrix.json', [
//    'app_id' => 'hPwgQ5qFrwfVRUztyvP8',
//    'app_code' => 'X1e1d2GM_sjFy29PNs7SRw',
//    'start0' => 'geo!47.216322,39.634652',
//    'start1' => 'geo!47.223328,39.707101',
//    'destination0' => 'geo!47.216863,39.628901',
//    'mode' => 'fastest;car;traffic:enabled',
//    'summaryAttributes' => 'distance,traveltime'
//]);
//
//$data = $curl->getResponse();
//
//print_r($data->response->matrixEntry);