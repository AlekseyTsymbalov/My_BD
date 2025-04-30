<?php

declare(strict_types = 1);

const DB_HOST = 'postgres_form';
const DB_NAME = 'list_db';
const DB_USER = 'irina';
const DB_PASSWORD = 'kula';

function getPDO(): PDO
{
    try {
        return new PDO(
            "pgsql:host=" . DB_HOST . ";port=5432;dbname=" . DB_NAME,
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