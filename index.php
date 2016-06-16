<?php

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");
}
catch (\PDOException $e) {
    echo "Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode();
}
