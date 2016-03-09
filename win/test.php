<?php
    $radius = radius_auth_open();
    $username = "F8:A9:63:4C:EE:BD";
    $password = "F8:A9:63:4C:EE:BD";
    $host = "10.0.0.1";
    $key = "mytestkey";
    $timeout = 10;
    $retry = 3;
    radius_add_server($radius,$host,0,$key,$timeout,$retry);
    radius_create_request($radius,RADIUS_ACCESS_REQUEST);
    radius_put_attr($radius,RADIUS_USER_NAME,$username);
    radius_put_attr($radius,RADIUS_USER_PASSWORD,$password);
    $status=radius_send_request($radius);
    if ($status == RADIUS_ACCESS_ACCEPT ) {
    	echo 'true';
    	return ;
    }
    elseif($status == RADIUS_ACCESS_REJECT)
    {
    	echo 'false';
#	return false;
    }
radius_close($radius);
?>

