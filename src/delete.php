<?php

declare(strict_types = 1);

require 'helper.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("DELETE FROM work_list WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    echo 'Задача удалена';
}