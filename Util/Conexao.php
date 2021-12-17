<?php

 final class Conexao
{
    private static $instance = null ;
    private function __construct(){}
    private function __clone(){}


    // método de conexão
    public static function conectar () {
        if (!isset ( self::$instance )) {
            // Use um nome de fonte de dados (DSN) para se conectar ao Cloud SQL por meio do proxy
            $dsn = 'mysql: host = localhost; port = 3306; dbname = controle_pedidos' ;
            // Instancie seu banco de dados usando o DSN, nome de usuário e senha
            $dbUser = 'root' ;
            $dbPass = '' ;
            // conexão não existe, então cria
            try {
                self::$instance = new  PDO ( $dsn , $dbUser , $dbPass );
                self::$instance-> setAttribute (
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                );
            } catch ( PDOException  $e ) {
                echo  "Erro na conexão:" .
                    $e -> getMessage ();
            }
        }

        return  self::$instance ;
    }
}