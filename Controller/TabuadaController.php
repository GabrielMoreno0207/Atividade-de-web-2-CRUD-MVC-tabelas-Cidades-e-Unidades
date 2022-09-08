<?php

include_once("Model/TabuadaModel.php");

class TabuadaController
{
    public function Index()
    {
        include "View/TabuadaIndexView.php";
    }

    public function Calcular()
    {
    	$model = new TabuadaModel();

    	$n = isset($_POST['n']) ? $_POST['n'] : '1';
    	
    	$tabela = $model->GetTabelaCalculada( $n );

        include "View/TabuadaCalculoView.php";
    }

} // final da classe

