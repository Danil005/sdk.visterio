<?php
include_once('vendor/autoload.php');

try {
    $api = new \Visterio\Client\VisterioApiClient(1.0);
} catch (ErrorException $e) {

}
//echo "<pre>";
$api->auth()->setClientId(3)->setClientToken('mpuwps9KLfAzmlZWzfxEv1iq91R4Z8wHVksCm4ey');
$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxNjY5NzNlNjY0YTViOTJlYTc2NTI5MzY5YTI2NmUxMzhiMzAwNzJiMDg4ODQ3NGI1MzI1M2M5YWUwNTI5MjkwNGZlZTMyNTEwNzRlODNhIn0.eyJhdWQiOiIzIiwianRpIjoiZTE2Njk3M2U2NjRhNWI5MmVhNzY1MjkzNjlhMjY2ZTEzOGIzMDA3MmIwODg4NDc0YjUzMjUzYzlhZTA1MjkyOTA0ZmVlMzI1MTA3NGU4M2EiLCJpYXQiOjE1NTk3NjI5NzgsIm5iZiI6MTU1OTc2Mjk3OCwiZXhwIjoxNTkxMzg1Mzc3LCJzdWIiOiI0Iiwic2NvcGVzIjpbIioiXX0.nLAyb-02RdWxXg8g_avXT2-VpaqRyZavkkK7dfPUDIX0Q9WXdpso0OpSkGf_42aTdifPrrvBwsq0qxUG1B678qxL32D7nNoQYb1c2epus_3VTF2Ylhgn1IdmpIDhilLcge6ofBHFDNv4czBe-ov2R25jHcnBxfghw6sgDuCNYeYJHZ6PQ2AegO4zKkdG5Gwzveqtyh0PlRP5DrsmJCdb7fkcTpiKguqSpuFkoYkEyLNq3FHyczGN1REZcBQizs_WxtKbb1BsNzX1lGPQUPqGybOZJ-jk8G1rDd_QUPqb4TNYE8eTcOSbjA5iYEHAGIAAC4YhQEPKVZaDyswjgA3SgFS3JFvMQoKN6Vf4za2xRy6JhnkjcRPpBSzcX_vN2fTcXcADz7Z-w5pqyABn-JsJS26uhpK039N7T6Cmz5cSjSWt2BTy-d1HK6XweK_2d72uifU4IaU2pkrLaBm1OssPSyHHhTpVOkiKo12CmRMctRsPSA6M0zkKdL2MtLezRRCGMaB1gI43D0XRZBteE21ep5QnSrkdms7n48ak0mtUlPSYreQVwBXJt-CUXzL6xy9COBNjsj4rTjh5HmjOAxUwky6RkTolSfpURpwtagdSBtHDUCGT8KhqjIgMuGn8mi4UkNglrmIEL3oMvy02V717s8bCj2rpbxUxbSjuNdZzdxE";

//$resp = $api->auth()->login(['email'=>'dsidorenko@sfedu.ru', 'password' => 'Danil005']);

$resp = $api->departments()->setDirector($access_token, [
    'department_id' => "5cf82bdc2441481918003547",
    'director_id' => 1
]);

print_r($resp);