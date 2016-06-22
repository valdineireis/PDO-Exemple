<?php

interface EntidadeInterface
{
    /**
     * @return ID do objeto criado no banco de dados
     */
    public function getId();

    /**
     * @param $id Codigo gerado pelo banco de dados
     * @return ID
     */
    public function setId($id);

    /**
     * Nome da tabela que representa o objeto no banco de dados
     * @return Nome da tabela do banco de dados
     */
    public function getTableName();

    /**
     * Array com os campos que representam as colunas do banco de dados
     * @return array
     */
    public function getDados();
}