<?php

/**
 * Name: Valdinei Reis
 * Email: valdinei@nocodigo.com
 * Date: 22/06/16
 */
abstract class Entidade
{
    /**
     * @var ID coluna AUTO_INCREMENT no banco de dados
     */
    private $id;

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
}