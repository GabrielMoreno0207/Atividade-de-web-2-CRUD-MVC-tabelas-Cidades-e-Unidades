<?php 

require_once("Connect/BD.php");

class UnidadesModel
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
                 from unidades
                 order by descricao 
               ";

        $r = $this->pdo->query( $sql );

    	return $r;

    } // Listagem()

    //--------------------------------------------------------
    public function GetRegistro($cod_unidade)
    {
        
        $sql = " select *
                 from unidades
                 where cod_unidade = '$cod_unidade'                 
               ";

        $r = $this->pdo->query( $sql );

        return $r->fetch(PDO::FETCH_ASSOC);

    } // GetRegistro()


    //--------------------------------------------------------
    public function Excluir($cod_unidade)
    {
        
        $sql = " delete from unidades where cod_unidade = :cod_unidade ";
        
        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":cod_unidade" , $cod_unidade);

        $r = $cmd->Execute();

        return $r;

    } // Excluir()

    //--------------------------------------------------------
    public function Gravar($dados)
    {
        
        if( $dados['cod_unidade'] == '0' )
        {
            $sql = " insert into unidades 
                        (descricao, sigla) 
                     values
                        (:descricao, :sigla) 
                    ";
            
            $cmd = $this->pdo->prepare($sql);

            $cmd->bindValue(":descricao" , $dados['descricao']);
            $cmd->bindValue(":sigla" , $dados['sigla']);

        } // incluindo
        else 
        {
            $sql = " update unidades set
                        descricao = :descricao,
                        sigla = :sigla
                     where
                        cod_unidade = :cod_unidade
                    ";
            
            $cmd = $this->pdo->prepare($sql);

            $cmd->bindValue(":descricao" , $dados['descricao']);
            $cmd->bindValue(":sigla" , $dados['sigla']);
            $cmd->bindValue(":cod_unidade" , $dados['cod_unidade']);

        } // alterando

        $r = $cmd->Execute();

        return $r;

    } // Excluir()



} // class CidadesModel