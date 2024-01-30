<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: POST");

    $jsonTasks = file_get_contents(__DIR__ . "/list.json");
    $tasks = json_decode($jsonTasks, true);
    $Index = $_POST['index'];
    $task = $tasks[$Index];
    $task['completed'] = !$task['completed'];

    $tasks[$Index] = $task;

    $jsonTasks = json_encode($tasks);
    file_put_contents(__DIR__ . "/list.json", $jsonTasks);
    echo $jsonTasks;