<?php

/**
 * Name: Valdinei Reis
 * Email: valdinei@nocodigo.com
 * Date: 21/06/16
 * Last Update: 22/06/2016
 */
abstract class ServiceDB
{
    protected $db;
    protected $entity;
    
    public function __construct($db, EntidadeInterface $entity)
    {
        $this->db = $db;
        $this->entity = $entity;
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->entity->getTableName()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null)
    {
        if ($ordem) {
            $query = "SELECT * FROM {$this->entity->getTableName()} ORDER BY {$ordem}";
        } else {
            $query = "SELECT * FROM {$this->entity->getTableName()}";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir()
    {
        $fileds = implode(', ', array_keys($this->entity->getDados()));
        $places = ':' . implode(', :', array_keys($this->entity->getDados()));

        $query = "INSERT INTO {$this->entity->getTableName()} ({$fileds}) VALUES ({$places})";
        
        $stmt = $this->db->prepare($query);

        if ($stmt->execute($this->entity->getDados())) {
            return true;
        }
    }

    public function alterar()
    {
        foreach ($this->entity->getDados() as $key => $value) {
            $places[] = $key . ' = :' . $key;
        }
        
        $places = implode(', ', $places);

        $query = "UPDATE {$this->entity->getTableName()} SET {$places} WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->entity->getId());

        foreach ($this->entity->getDados() as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        if ($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "DELETE FROM {$this->entity->getTableName()} WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
    }
}