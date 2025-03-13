<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // Manual .env parsing
        $env = [];
        $envFile = __DIR__ . '/../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                list($name, $value) = explode('=', $line, 2);
                $env[trim($name)] = trim($value);
            }
        }

        if ($env['DB_SERVER'] === 'mssql') {
            $serverName = $env['DB_HOST'] . ',' . $env['DB_PORT'];
            $connectionOptions = [
                "Database" => $env['DB_NAME'],
                "UID" => $env['DB_USER'],
                "PWD" => $env['DB_PASS'],
            ];
            try {
                $conn = sqlsrv_connect($serverName, $connectionOptions);
                if ($conn === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                $this->pdo = $conn;
            } catch (\Exception $exception) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}