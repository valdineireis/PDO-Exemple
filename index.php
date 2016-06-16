<?php

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");

    #$query = "show tables";
    $query = "select * from clientes";

    $stmt = $conexao->exec($query);
    $resultado = $stmt->fetchAll();

    print_r($resultado);
}
catch (\PDOException $e) {
    echo "Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode();
}
