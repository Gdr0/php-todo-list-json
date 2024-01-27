<?php 

header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    
$index = $_GET['index'];

$jsonTasks = file_get_contents("list.json");

$Tasks = json_decode($jsonTasks, true);

array_splice($Tasks, $index, 1);

// var_dump($Tasks);

$jsonTasks = json_encode($Tasks);

file_put_contents("list.json", $jsonTasks);

echo $jsonTasks;
