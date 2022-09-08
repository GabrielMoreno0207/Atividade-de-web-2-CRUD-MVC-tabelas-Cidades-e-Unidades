<?php 

require_once("Connect/BD.php");

class CidadesModel
{

    protected $pdo;

    //--------------------------------------------------------
    function __construct()
    {
        $this->pdo = BD::Conectar();

    } // construtor

    //--------------------------------------------------------
    public function Listagem()
    {
        
        $sql = " select *
                 from cidades
                 order by nome 
               ";

        $r = $this->pdo->query( $sql );

    	return $r;

    } // Listagem()

    //--------------------------------------------------------
    public function GetRegistro($cod_cidade)
    {
        
        $sql = " select *
                 from cidades
                 where cod_cidade = '$cod_cidade'                 
               ";

        $r = $this->pdo->query( $sql );

        return $r->fetch(PDO::FETCH_ASSOC);

    } // GetRegistro()


    //--------------------------------------------------------
    public function Excluir($cod_cidade)
    {
        
        $sql = " delete from cidades where cod_cidade = :cod_cidade ";
        
        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":cod_cidade" , $cod_cidade);

        $r = $cmd->Execute();

        return $r;

    } // Excluir()

    //--------------------------------------------------------
    public function Gravar($dados)
    {
        
        if( $dados['cod_cidade'] == '0' )
        {
            $sql = " insert into cidades 
                        (nome, uf) 
                     values
                        (:nome, :uf) 
                    ";
            
            $cmd = $this->pdo->prepare($sql);

            $cmd->bindValue(":nome" , $dados['nome']);
            $cmd->bindValue(":uf" , $dados['uf']);

        } // incluindo
        else 
        {
            $sql = " update cidades set
                        nome = :nome,
                        uf = :uf
                     where
                        cod_cidade = :cod_cidade
                    ";
            
            $cmd = $this->pdo->prepare($sql);

            $cmd->bindValue(":nome" , $dados['nome']);
            $cmd->bindValue(":uf" , $dados['uf']);
            $cmd->bindValue(":cod_cidade" , $dados['cod_cidade']);

        } // alterando

        $r = $cmd->Execute();

        return $r;

    } // Excluir()



} // class CidadesModel