<?php

require_once 'Cliente.php';

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");
}
catch (\PDOException $e) {
    die("Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode());
}

$cliente = new Cliente($conexao);

$cliente->setId(1)
        ->setNome("Valdinei Reis")
        ->setEmail("valdinei@nocodigo.com")
;

$resultado = $cliente->update();

foreach ($cliente->listar("id DESC") as $c) {
    echo $c['nome'] . "<br>";
}