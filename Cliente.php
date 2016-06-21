<?php

class Cliente
{
    private $db;

    private $id;
    private $nome;
    private $email;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function listar($ordem = null)
    {
        if ($ordem) {
            $query = "SELECT * FROM clientes ORDER BY {$ordem}";
        } else {
            $query = "SELECT * FROM clientes";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir()
    {
        $query = "INSERT INTO clientes(nome, email) VALUES(:nome, :email)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());

        if ($stmt->execute()) {
            return true;
        }
    }

    public function alterar()
    {
        $query = "UPDATE clientes SET nome=:nome, email=:email WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());

        if ($stmt->execute()) {
            return true;
        }
    }

    public function deletar()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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