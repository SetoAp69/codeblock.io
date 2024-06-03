<?php
    $conn = new mysqli('localhost', 'root', '', 'programmingblock');

    if ($conn->connect_error) {
        die(json_encode(array("message" => "Connection failed: " . $conn->connect_error)));
    }

?>