<?php

$config = include_once 'config.php';

$dsn = "mysql:host={$config['host']};";

try {
    $pdo = new \PDO($dsn, $config['user'], $config['pass'], array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ));

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['name']}`");
    $pdo->exec("USE `{$config['name']}`");
    $pdo->exec('DROP TABLE IF EXISTS `pagina`');
    $pdo->exec(
        "CREATE TABLE `pagina` (     
            id INT(11) NOT NULL AUTO_INCREMENT,
            uri VARCHAR(255) NOT NULL,
            nome VARCHAR(255) NOT NULL,
            conteudo TEXT NOT NULL,

            PRIMARY KEY(`id`)
        ) Engine=InnoDB CHARSET=UTF8;"        
    );

    $pdo->exec(
        "INSERT INTO `pagina`(`uri`, `nome`, `conteudo`) VALUES"
            ."('home','Home','Seja bem vindo à página inicial.'),"
            ."('empresa','Empresa','Você está na página que fala sobre a empresa.'),"
            ."('produtos','Produtos','Esta é a página referente aos produtos.'),"
            ."('servicos','Serviços','Saiba um pouco sobre os serviços ofertados.'),"
            ."('contato','Contato','Entre em contato conosco.')"
    );
} catch (\PDOException $ex) {
    die("Error Loading Fixtures:\n" . $ex->getMessage() . "\n");
}

echo "Fixtures Loaded Successfully.\n";