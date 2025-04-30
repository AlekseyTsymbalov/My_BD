<?php

declare(strict_types = 1);
$pdo = getPDO();
$query = $pdo->prepare("SELECT * FROM work_list ORDER BY `id` DESC");
echo 'ul class="list-group">';
while($row = $query->fetch(PDO::FETCH_OBJ)){
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
    echo htmlspecialchars($row->task);
    echo '<button class="btn btn-danger btn-sm delete-task" data-id="'.$row->id.'">Удалить</button>';
    echo '</li>';
}
echo '</ul>';