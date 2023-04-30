<?php

class Connector
{
    public static function make($config)
    {
        try {
            return new PDO("mysql:host={$config['servername']};dbname={$config['dbname']}", $config['user'], $config['pass'],$config['options']);
        } catch (PDOException $e) {
            die($e);
        }
    }
}