<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MVC : Hello World - Cidades</title>
</head>
<body>
	<h2>Listagem de Cidades</h2>

	<p>
		<a href="index.php?modulo=cidades&acao=incluir">Incluir</a>
	</p>

	<?php

		while( $dados = $r_listagem->fetch(PDO::FETCH_ASSOC) )
		{
			$bt_exc = '<a href="index.php?modulo=cidades&acao=excluir&cod_cidade='.$dados['cod_cidade'].'">Excluir</a>';

			$bt_alt = '<a href="index.php?modulo=cidades&acao=alterar&cod_cidade='.$dados['cod_cidade'].'">Alterar</a>';

			echo $dados['nome'] . '-' . $dados['uf'] . '&nbsp;&nbsp;&nbsp; ' . $bt_alt . '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; ' . $bt_exc . '<br>';


		} // while

	?>

	<p>
		<a href="index.php">Voltar</a>
	</p>

</body>
</html>