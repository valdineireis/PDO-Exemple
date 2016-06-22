<?php

require_once 'EntidadeInterface.php';
require_once 'Cliente.php';
require_once 'ServiceDB.php';

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}
catch(\PDOException $e) {
    die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: ".$e->getCode().": ".$e->getMessage());
}

$cliente = new Cliente();

$cliente->setId(3)
    ->setNome("Valdinei Reis")
    ->setEmail("valdinei@nocodigo.com")
;

$serviceDb = new ServiceDB($conexao, $cliente);

//$serviceDb->inserir();
$serviceDb->alterar();

foreach ($serviceDb->listar("id DESC") as $c) {
    echo $c['id'] . ' - ' . $c['nome'] . ' - ' . $c['email'] . "<br>";
}