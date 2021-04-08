<?php 
    session_start();
    const host = 'localhost';
    const dbname = 'avaliacao_web2';
    const user = 'root';
    const senha = '';

    try {
        $pdo = new PDO('mysql:host='.host.';dbname='.dbname.'', user, senha, [PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'"]);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (Exception $e) { 
        echo 'Houve algum erro ao conectar no banco de dados!';
        echo $e;
    } 
?>