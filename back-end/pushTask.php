<?php 

header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

$jsonTasks= file_get_contents("list.json");
$Tasks = json_decode($jsonTasks, true);
$priorita = $_GET['priorita']; 
$task = $_GET['task'];
$date = $_GET['data_scadenza'];

    $newTask = [
        "task" => $task,
        'priorita' => $priorita,
        'data_scadenza'=>$date,
        'completed' => false
    ];
    $Tasks[]= $newTask;
    $jsonTasks = json_encode($Tasks);
    file_put_contents("list.json", $jsonTasks);
    echo $jsonTasks;

// $ToDoList = [
//         [
//             "task" => "Fare la spesa",
//             "priorita" => "Alta",
//             "data_scadenza" => "2024-01-31"
//         ],
//         [
//             "task" => "Pulire la casa",
//             "priorita" => "Media",
//             "data_scadenza" => "2024-02-05"
//         ],
//         [
//             "task" => "Studiare PHP",
//             "priorita" => "Alta",
//             "data_scadenza" => "2024-01-28"
//         ],
//         [
//             "task" => "Preparare la cena",
//             "priorita" => "Bassa",
//             "data_scadenza" => "2024-02-01"
//         ],
//         [
//             "task" => "Andare in palestra",
//             "priorita" => "Media",
//             "data_scadenza" => "2024-02-10"
//         ]
//     ];
    // $task = $_GET['task'];
    // $newTask = [
    //     "task" => $task,
    //     'priorità' => 'bassa',
    //     'data_scadenza'=>$date,
    // ];
  

//     $ToDoList[]= $newTask;
//     $jsonTasks = json_encode($ToDoList);
//     echo $jsonTasks;