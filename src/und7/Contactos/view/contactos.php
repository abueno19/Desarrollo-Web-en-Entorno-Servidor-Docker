<?php
// echo("hola mundo");
// print_r($data["message"]);
header('Content-type:application/json;charset=utf-8');
echo json_encode($data["message"], JSON_PRETTY_PRINT);
?>