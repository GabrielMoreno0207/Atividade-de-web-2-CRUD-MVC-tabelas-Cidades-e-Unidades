<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MVC : Hello World - Cidades</title>
</head>
<body>
	<h2>Cadastro de Cidades</h2>


	<form name="fcad" id="fcad" method="post" action="index.php?modulo=cidades&acao=gravar">
		
		<input type="hidden" name="cod_cidade" id="cod_cidade" value="<?= $cod_cidade; ?>">


		Nome da Cidade:<br>
		<input type="text" name="nome" id="nome" value="<?= $nome; ?>" maxlenght="100">

		<p></p>

		Unidade Federal:<br>
		<input type="text" name="uf" id="uf" value="<?= $uf; ?>" maxlenght="2">

		<p></p>

		<input type="submit" name="btsub" id="btsub" value=" Gravar ">
		&nbsp;&nbsp;
		<input type="button" name="btvoltar" id="btvoltar" value=" Cancelar " onclick="document.location='index.php?modulo=cidades';">

	</form>


</body>
</html>