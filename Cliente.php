<?php

/**
 * Name: Valdinei Reis
 * Email: valdinei@nocodigo.com
 * Date: 22/06/16
 */
class Cliente extends Entidade implements EntidadeInterface
{
    private $nome;
    private $email;

    public function getTableName()
    {
        return "clientes";
    }

    public function getDados()
    {
        return array(
            "nome" => $this->getNome(),
            "email" => $this->getEmail()
        );
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}