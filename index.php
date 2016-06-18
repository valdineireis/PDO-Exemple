<?php

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");

    #$query = "show tables";
    $query = "select * from clientes";

    foreach ($conexao->query($query) as $cliente) {
        echo $cliente['nome'] . "<br>";
    }

}
catch (\PDOException $e) {
    echo "Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode();
}
