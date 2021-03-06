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

function trimInboundData($data){

    $data = trim($data);

    $data = stripslashes($data);
     
    $data = htmlspecialchars($data);

    return $data;

}

function checkInboundTokenAndTenant($data){
     
    $data = trimInboundData($data);

    IF(preg_match("/^[a-z0-9]{32}$/",$data))
	{

		return($data);

	}

	else

	{

		return(0);

	}

}

function checkInboundId($data){
     
    $data = trimInboundData($data);

    IF(preg_match("/^[a-z0-9]{24}$/",$data))
	{

		return($data);

	}

	else

	{

		return(0);

	}

}

function checkInboundJSON($data){
     
    $data = trim($data);

    $data = stripslashes($data);

	return($data);

}

?>