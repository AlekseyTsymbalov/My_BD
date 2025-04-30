<?php
declare(strict_types=1);

require 'helper.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim($_POST['task'] ?? '');

    if (empty($task)) {
        http_response_code(400);
        die(json_encode(['error' => 'Поле задачи не может быть пустым!'], JSON_THROW_ON_ERROR));
    }

    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("INSERT INTO work_list (task) VALUES (?)");
        $stmt->execute([$task]);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            echo json_encode(['success' => true], JSON_THROW_ON_ERROR);
        } else {
            header('Location: /');
        }
        exit;
    } catch (PDOException $e) {
        http_response_code(500);
        die(json_encode(['error' => 'Ошибка базы данных: ' . $e->getMessage()], JSON_THROW_ON_ERROR));
    }
}