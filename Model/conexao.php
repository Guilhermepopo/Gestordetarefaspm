<?php
class Conexao extends PDO {

    protected static $instance;

    // Realiza a comunicação com o banco de dados
    public static function getInstance() {
        if(empty(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;dbname=prefeituramb", "root", "", [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8;"]);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }

}
?>