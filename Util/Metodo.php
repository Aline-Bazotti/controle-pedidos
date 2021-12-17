<?php

require  'Base.php' ;

class  Metodo  extends  Base
{

     public function LoginPaciente ( $email , $senha )
    {
        try {
            $sql = $this -> conexao -> prepare ( "SELECT id, nome FROM paciente WHERE email = :email AND senha = :senha" );
            $sql -> execute ( array (
                ':email' => $email ,
                ':senha' => $senha
            ));
            $dados = $sql -> fetchAll ();
            return  $dados ;
        } catch ( PDOException  $e ) {
            echo  "Erro:" . $e -> getMessage ();
        }
    }
     public function LoginAdmin ( $email , $senha )
    {
        try {
            $sql = $this -> conexao -> prepare ( "SELECT id, nome, id_grupo FROM usuario WHERE email = :email AND senha = :senha e status = 1" );
            $sql -> execute ( array (
                ':email' => $email ,
                ':senha' => $senha
            ));
            $dados = $sql -> fetchAll ();
            return  $dados ;
        } catch ( PDOException  $e ) {
            echo  "Erro:" . $e -> getMessage ();
        }
    }
}