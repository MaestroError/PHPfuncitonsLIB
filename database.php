<?php

// connection func
function db_connect($dbname) {
    $servername = $GLOBALS["db_server"];
    $username = $GLOBALS["db_user"];
    $password = $GLOBALS["db_pass"];
       // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// order func
function db_request($connection, $sqlrequest) {
    $result = $connection->query($sqlrequest) or die($connection->error);
    return $result;
}
// USE $r = $result->fetch_assoc();

// connection close
function db_close($conn){
    $conn->close();
}

?>