<?php

require_once 'Cliente.php';

try {
    $conexao = \PDO("mysql:host=localhost;dbname=pdo", "root", "root");
}
catch (\PDOException $e) {
    die("Não foi possível estabelecer uma conexão com o banco de dados. Erro código: " . $e->getCode());
}

$cliente = new Cliente($conexao);
$cliente->setNome("Valdinei")
        ->setEmail("valdinei@nocodigo.com")
;

$resultado = $cliente->inserir();
echo $resultado;