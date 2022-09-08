<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MVC : Hello World - Unidades</title>
</head>
<body>
	<h2>Listagem de Unidades</h2>

	<p>
		<a href="index.php?modulo=unidades&acao=incluir">Incluir</a>
	</p>

	<?php

		while( $dados = $r_listagem->fetch(PDO::FETCH_ASSOC) )
		{
			$bt_exc = '<a href="index.php?modulo=unidades&acao=excluir&cod_unidade='.$dados['cod_unidade'].'">Excluir</a>';

			$bt_alt = '<a href="index.php?modulo=unidades&acao=alterar&cod_unidade='.$dados['cod_unidade'].'">Alterar</a>';

			echo $dados['descricao'] . '-' . $dados['sigla'] . '&nbsp;&nbsp;&nbsp; ' . $bt_alt . '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; ' . $bt_exc . '<br>';


		} // while

	?>

	<p>
		<a href="index.php">Voltar</a>
	</p>

</body>
</html>