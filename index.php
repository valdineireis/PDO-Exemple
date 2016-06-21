<?php

require_once 'Cliente.php';
require_once 'ClienteServiceDB.php';

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");
}
catch (\PDOException $e) {
    die("Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode());
}

$cliente = new Cliente();

$cliente->setNome("Teste")
        ->setEmail("teste@email.com")
;

$serviceDb = new ClienteServiceDB($conexao, $cliente);
$serviceDb->inserir();

//foreach ($cliente->listar("id DESC") as $c) {
//    echo $c['nome'] . "<br>";
//}