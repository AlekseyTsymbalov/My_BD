<?php

declare(strict_types = 1);

require_once __DIR__ . '/helper.php';

$pdo = getPDO();
$sql = <<<SQL
SELECT * FROM users
SQL;
foreach ($pdo->query($sql) as $row) {
    echo '<pre>';
        print_r($row);
        echo '</pre>';
}