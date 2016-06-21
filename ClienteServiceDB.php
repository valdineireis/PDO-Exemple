<?php

class ClienteServiceDB
{
    private $db;
    private $cliente;
    
    public function __construct($db, Cliente $cliente)
    {
        $this->db = $db;
        $this->cliente = $cliente;
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->cliente->getTable()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null)
    {
        if ($ordem) {
            $query = "SELECT * FROM {$this->cliente->getTable()} ORDER BY {$ordem}";
        } else {
            $query = "SELECT * FROM {$this->cliente->getTable()}";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir()
    {
        $query = "INSERT INTO {$this->cliente->getTable()}(nome, email) VALUES(:nome, :email)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':email', $this->cliente->getEmail());

        if ($stmt->execute()) {
            return true;
        }
    }

    public function alterar()
    {
        $query = "UPDATE {$this->cliente->getTable()} SET nome=:nome, email=:email WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->cliente->getId());
        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':email', $this->cliente->getEmail());

        if ($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "DELETE FROM {$this->cliente->getTable()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
    }
}