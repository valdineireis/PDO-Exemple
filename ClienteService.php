<?php

/**
 * Name: Valdinei Reis
 * Email: valdinei@nocodigo.com
 * Date: 22/06/16
 */
class ClienteService extends ServiceDB
{
    public function __construct($db, EntidadeInterface $entity)
    {
        parent::__construct($db, $entity);
    }
}