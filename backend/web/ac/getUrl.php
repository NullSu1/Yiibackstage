<?php
require_once "functions.php";
$conn = ConnectDB('ac');
$id = text_input(@$_GET['getid']);
if(!empty($id)) {
    $sql = "select ID, url, md5, size from recommend where ID='$id'";
    if($row = $conn->query($sql)){
        $result = $row->fetch_assoc();
        echo json_encode([
            'id'=>$result['ID'],
            'url'=>$result['url'],
            'md5'=>$result['md5'],
            'size'=>$result['size']
        ],JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }else{
        echo json_encode(['data'=>'false']);
    }
}