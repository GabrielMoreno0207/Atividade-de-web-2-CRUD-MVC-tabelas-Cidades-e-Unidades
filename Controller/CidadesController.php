<?php

include_once("Model/CidadesModel.php");

class CidadesController
{
    //------------------------------------------------------------------
    public function Listar()
    {
        $model = new CidadesModel();
        
        $r_listagem = $model->Listagem();
        
        include "view/CidadesListarView.php";
    }

    //------------------------------------------------------------------
    public function Excluir()
    {
        $model = new CidadesModel();

        $cod_cidade = $_GET['cod_cidade'];

        $model->Excluir($cod_cidade);

        $this->Listar();
        
    }

    //------------------------------------------------------------------
    public function Incluir()
    {

        $cod_cidade = '0'; // incluindo
        $nome = "";
        $uf = "";
    
        include "view/CidadesFormView.php";
    }

    //------------------------------------------------------------------
    public function Alterar()
    {

        $cod_cidade = $_GET['cod_cidade']; // alterando

         $model = new CidadesModel();

        $dados = $model->GetRegistro($cod_cidade);

        // se encontrou o registro da cidade que está alterando
        if( $dados )
        {
            $nome = $dados['nome'];
            $uf = $dados['uf'];            
        }
        else
        {
            die("Cidade não cadastrada!");
            $nome = "";
            $uf = "";            
        }
    
        include "view/CidadesFormView.php";
    }

    //------------------------------------------------------------------
    public function Gravar()
    {
        $model = new CidadesModel();

        $model->Gravar($_POST);

        $this->Listar();
    }


} // final da classe