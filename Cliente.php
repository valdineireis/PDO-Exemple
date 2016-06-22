<?php

class Cliente extends Entidade implements EntidadeInterface
{
    private $table = "clientes";
    
    private $nome;
    private $email;

    public function getDados()
    {
        return array(
            "nome" => $this->getNome(),
            "email" => $this->getEmail()
        );
    }
    
    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
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