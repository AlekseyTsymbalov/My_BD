<?php

declare(strict_types = 1);

const DB_HOST = 'localhost';
const DB_NAME = 'test_db';
const DB_USER = 'alex';
const DB_PASSWORD = 'alex01';

function getPDO(): PDO
{
    try {
        return new PDO(
            "pgsql:host=" . DB_HOST . ";port=8080;dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (PDOException $e) {
        die("Ошибка подключения: " . $e->getMessage());
    }
}

var_dump(phpinfo());