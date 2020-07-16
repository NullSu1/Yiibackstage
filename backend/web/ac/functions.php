<?php
function ConnectDB($database){
    $conn = new mysqli('localhost','root','',$database);
    if(!$conn){
        return false;
    }else{
        return $conn;
    }
}

function text_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
