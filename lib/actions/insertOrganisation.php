<?php
/*

Copyright 2019 macooa GmbH

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

*/

require_once('../includeAllUtils.php');

$_token = $_tenant = $_resp = $_payload = "";

$currentHeaders = getallheaders();

$_token = checkInboundTokenAndTenant($currentHeaders['token']);

$_tenant = checkInboundTokenAndTenant($currentHeaders['tenant']);

$_payload = checkInboundJSON(file_get_contents('php://input'));

IF(!function_exists('curl_init')){

	die('Sorry cURL is not installed!');

}

else{

    $headers = array(
        'Content-Type: application/json',
        'Content-Length: '.strlen($_payload).'',        
        'token: '.$_token.'',
        'tenant: '.$_tenant
    );

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_URL => PROTOCOL.HOST.BASEPATH.ORGANISATION,
        CURLOPT_USERAGENT => 'cURL Insert single Organisation Request',
        CURLOPT_POSTFIELDS => $_payload,
        CURLOPT_HTTPHEADER => $headers
    ]);

    $_resp = curl_exec($curl);

    curl_close($curl);

    echo $_resp;

}
?>

