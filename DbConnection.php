<?php

class DbConnection
{
    private $db_connection;

    public function __construct()
    {
        $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $user = 'dbuser';
        $password = 'dbpass';

        $this->db_connection = new PDO($dsn, $user, $password);
    }

    public function getConnection()
    {
        return $this->db_connection;
    }
}