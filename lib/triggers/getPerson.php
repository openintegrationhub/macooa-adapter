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

require_once(__DIR__.'/includeAllUtils.php');

$_token = $_token = $_id = $_resp = "";

IF(isset($_GET['token'])){

  $_token = checkInboundTokenAndTenant($_GET['token']);

}

IF(isset($_GET['tenant'])){

  $_tenant = checkInboundTokenAndTenant($_GET['tenant']);

}

IF(isset($_GET['id'])){

  $_id = checkInboundId($_GET['id']);

}

if(!function_exists('curl_init')){

	die('Sorry cURL is not installed!');

}

else{

    $headers = array(
        'Content-Type: application/json',
        'token: '.$_token.'',
        'tenant: '.$_tenant
    );

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPGET => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_URL => PROTOCOL.HOST.BASEPATH.PERSON.$_id,
        CURLOPT_USERAGENT => 'cURL Get single Person Request',
        CURLOPT_HTTPHEADER => $headers
    ]);

    $_resp = curl_exec($curl);

    curl_close($curl);

    echo $_resp;

}
?>

