<?php

include_once("model/UsuarioModel.php");

class HomeController
{
    public function Index()
    {
        $model = new UsuarioModel();
        $usuario = $model->UsuarioLogado();
        
        include "view/HomeIndexView.php";
    }

} // final da classe