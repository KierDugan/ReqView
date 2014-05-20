<?php
header ('Content-Type: text/plain');

// make sure the GET and POST arguments are at index one so we can verify that
// the arrays aren't full of junk
reset ($_GET);
reset ($_POST);

echo "General information\r\n";
echo "-------------------\r\n\r\n";
echo "Request Method:          {$_SERVER['REQUEST_METHOD']}\r\n";
echo "Query string:            {$_SERVER['QUERY_STRING']}\r\n";
echo "URL-decode query string: ".urldecode ($_SERVER['QUERY_STRING'])."\r\n";
echo "\r\n\r\n";

// request body
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    $body = file_get_contents ("php://input");
    
    if (empty ($body)) {
        $body = "Empty.";
    }
    
    echo "Request body data:\r\n";
    echo "------------------\r\n\r\n";
    echo "$body\r\n";
    echo "\r\n\r\n";
}

// only print GET on an element-by-element basis if it is not junk
echo "GET variables:\r\n";
echo "--------------\r\n\r\n";
if (empty ($_GET) || (count ($_GET) == 1 && current ($_GET) == NULL)) {
    echo "No GET variables.\r\n";
} else {
    // iterator over the GET variables
    foreach ($_GET as $key => $value)
        echo "$key = $value\r\n";
}
echo "\r\n\r\n";

// print all available POST variables
echo "POST variables:\r\n";
echo "---------------\r\n\r\n";
if (empty ($_POST)) {
    echo "No POST variables.\r\n";
} else {
    foreach ($_POST as $key => $value)
        echo "$key = $value\r\n";
}
echo "\r\n\r\n";

?>

