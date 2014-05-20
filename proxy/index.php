<pre>
<?php

// get the variables
$url    = urldecode ($_REQUEST['url']);
$method = strtoupper ($_REQUEST['method']);
$body   = urldecode ($_REQUEST['data']);

print "$url\r\n$method\r\n$body";

// attempt the request
//$response = http_request ($method, $url, $body, NULL, $info);
//$response = http_request ("GET", "http://www.google.com/", "", NULL, $info);
//print "$response\r\n";
//print_r ($info);

$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec ($ch);

if ($result)
    print $result;
else
    print curl_error ($ch);
    
curl_close ($ch);

?>
</pre>