<?php

require 'Conexao.php' ;

class Base
{
    protected  $conexao = null ;
    public function __construct() {
        $this->conexao = Conexao :: conectar();
    }
}