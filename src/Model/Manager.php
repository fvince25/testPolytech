<?php

namespace App\Model;

class Manager
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=testpolytech;charset=utf8', 'root', '');
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
