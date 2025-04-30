<?php

declare(strict_types = 1);

try {
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM work_list ORDER BY id DESC");
    $query->execute();
    if ($query->rowCount() === 0) {
        echo '<div class="alert alert-info mt-3">Список задач пуст. Добавьте задачу!</div>';
        exit;
    }
    echo '<ul class="list-group">';
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo htmlspecialchars($row->task);
        echo '<button class="btn btn-danger btn-sm delete-task" data-id="' . $row->id . '">Удалить</button>';
        echo '</li>';
    }
    echo '</ul>';
} catch (PDOException $e) {
    echo '<div class="alert alert-danger mt-3">Ошибка добавления данных: '
        .htmlspecialchars($e->getMessage()) . '</div>';
}