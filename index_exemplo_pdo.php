<?php

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");

    #$query = "show tables";
    $query = "select * from clientes where id = :id";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $_GET['id'], \PDO::PARAM_INT);
    $resultado = $stmt->execute();

    print_r($resultado->fetchAll(\PDO::FETCH_ASSOC));

}
catch (\PDOException $e) {
    echo "Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode();
}
