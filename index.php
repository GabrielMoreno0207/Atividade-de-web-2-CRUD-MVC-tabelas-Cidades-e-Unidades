<?php

// Roteador da Aplicação MVC --------------------------------------------------------

$modulo = isset($_GET["modulo"]) ? $_GET["modulo"] : "home";
$acao = isset($_GET["acao"]) ? $_GET["acao"] : "index";

$arquivo = "Controller/".$modulo."Controller.php";

if( file_exists($arquivo))
{
	include_once($arquivo);	
}
else
{
	include_once("Controller/HomeController.php");		
}



// colocando em minúsculo
$modulo = strtolower($modulo);
$acao = strtolower($acao);


if( $modulo == 'tabuada' ) 
{

	$ctrl = new TabuadaController();

	switch($acao) {
	    
	    case "index" : 
		    $ctrl->Index();
	    	break;
	    
	    case "calcular" : 
		    $ctrl->Calcular();
	    	break;

	    default:
		    $ctrl->Index();
	    	break;    
	}

} // if modulo Home
else
if( $modulo == 'cidades' ) 
{

	$ctrl = new CidadesController();

	switch($acao) {
	    
	    case "listar" : 
		    $ctrl->Listar();
	    	break;
	    
	    case "excluir" : 
		    $ctrl->Excluir();
	    	break;

	    case "incluir" : 
		    $ctrl->Incluir();
	    	break;

	    case "alterar" : 
		    $ctrl->Alterar();
	    	break;

	    case "gravar" : 
		    $ctrl->Gravar();
	    	break;

	    default:
		    $ctrl->Listar();
	    	break;    
	}

} // if modulo cidades
else
{

	$ctrl = new HomeController();

	switch($acao) {
	    case "index" : 
		    $ctrl->Index();
	    	break;

	    default:
		    $ctrl->Index();
	    	break;    

	}

} // if modulo Home

//-------------------------UNIDADES----------------//
if( $modulo == 'unidades' ) 
{

	$ctrl = new UnidadesController();

	switch($acao) {
	    
	    case "listar" : 
		    $ctrl->Listar();
	    	break;
	    
	    case "excluir" : 
		    $ctrl->Excluir();
	    	break;

	    case "incluir" : 
		    $ctrl->Incluir();
	    	break;

	    case "alterar" : 
		    $ctrl->Alterar();
	    	break;

	    case "gravar" : 
		    $ctrl->Gravar();
	    	break;

	    default:
		    $ctrl->Listar();
	    	break;    
	}

} // if modulo unidades




?>