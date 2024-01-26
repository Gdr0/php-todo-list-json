<?php

$jsonList = file_get_contents("list.json");
$ToDoList = json_decode($jsonList, true);


var_dump($ToDoList);


?>