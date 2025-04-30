<?php
declare(strict_types=1);

if (!function_exists('getPDO')) {
    function getPDO(): PDO
    {
        try {
            return new PDO(
                "pgsql:host=postgres_form;port=5432;dbname=list_db",
                'irina',
                'kula',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
}