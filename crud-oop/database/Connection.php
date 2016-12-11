<?php

class Connection
{
    public static function make($config)
    {
        try {

            $hostname   = $config['hostname'];
            $dbname     = $config['dbname'];
            $username   = $config['username'];
            $password   = $config['password'];

            return new PDO("mysql:host={$hostname};dbname={$dbname}",$username,$password);

        } catch (PDOException $e) {
            var_dump($e->getMessage());

        }
    }
}
