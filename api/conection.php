<?php

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception('.env file not found');
    }
    
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Ignora comentários
        }
        
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        
        if (!isset($_ENV[$name])) {
            $_ENV[$name] = $value;
        }
    }
}

// Carrega as variáveis do .env
loadEnv(__DIR__ . '/.env');

define('HOST', $_ENV['HOST']);
define('USER', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWORD']);
define('DB', $_ENV['DB']);

$conection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Não foi possivel conectar');
?>
