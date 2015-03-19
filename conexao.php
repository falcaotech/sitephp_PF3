<?php

function conexao(){    
try {
    $config = include "config.php";
    if(! isset($config['db'])){
        throw new \InvalidArgumentException("A configuração do banco de dados não existe!");
    }
    
    $host       = (isset($config['db']['host']))        ? $config['db']['host']:null;
    $dbname     = (isset($config['db']['dbname']))      ? $config['db']['dbname']:null;
    $user       = (isset($config['db']['user']))        ? $config['db']['user']:null;
    $password   = (isset($config['db']['password']))    ? $config['db']['password']:null;
    
    return new \PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user, $password);
    
    } catch (\PDOException $e) {
        echo $e->getMessage(). "\n";
        echo $e->getTraceAsString(). "\n";
    }
}