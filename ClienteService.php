<?php

class ClienteService extends ServiceDB
{
    public function __construct($db, EntidadeInterface $entity)
    {
        parent::__construct($db, $entity);
    }
}