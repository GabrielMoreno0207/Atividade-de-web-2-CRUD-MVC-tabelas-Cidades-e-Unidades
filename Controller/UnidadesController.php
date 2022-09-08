<?php

include_once("Model/UnidadesModel.php");

class UnidadesController
{
    //------------------------------------------------------------------
    public function Listar()
    {
        $model = new UnidadesModel();
        
        $r_listagem = $model->Listagem();
        
        include "view/UnidadesListarView.php";
    }
                        
    //------------------------------------------------------------------
    public function Excluir()
    {
        $model = new UnidadesModel();

        $cod_unidade = $_GET['cod_unidade'];

        $model->Excluir($cod_unidade);

        $this->Listar();
        
    }

    //------------------------------------------------------------------
    public function Incluir()
    {

        $cod_unidade = '0'; // incluindo
        $descricao = "";
        $sigla = "";
    
        include "view/UnidadesFormView.php";
    }

    //------------------------------------------------------------------
    public function Alterar()
    {

        $cod_unidade = $_GET['cod_unidade']; // alterando

         $model = new UnidadesModel();

        $dados = $model->GetRegistro($cod_unidade);

        // se encontrou o registro da cidade que está alterando
        if( $dados )
        {
            $descricao = $dados['descricao'];
            $sigla = $dados['sigla'];            
        }
        else
        {
            die("Unidade não cadastrada!");
            $descricao = "";
            $sigla = "";            
        }
    
        include "view/UnidadesFormView.php";
    }

    //------------------------------------------------------------------
    public function Gravar()
    {
        $model = new UnidadesModel();

        $model->Gravar($_POST);

        $this->Listar();
    }


} // final da classe