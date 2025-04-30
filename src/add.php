<?php

declare(strict_types=1);

require 'helper.php';

    $task = $_POST["task"];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $task = $_POST["task"] ?? '';

        if(empty(trim($task))){
            die("Ошибка: поле задачи не может быть пустым!");
        }
    }


$pdo = getPDO();
    $psql = 'INSERT INTO work_list(task) VALUES(:task)';
    $query = $pdo->prepare($psql);
    $query->execute(['task' => $task ]);

    header('Location: /');
    exit;