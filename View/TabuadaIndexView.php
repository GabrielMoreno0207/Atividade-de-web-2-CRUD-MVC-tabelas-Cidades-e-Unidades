<!DOCTYPE html>
<html>
<head>
	<title>MVC : Cálculo da Tabula</title>
</head>
<body>
	<h2>CÁLCULO DA TABUADA</h2>

	<form name="ftab" id="ftab" method="post" action="index.php?modulo=tabuada&acao=calcular">

		<p>&nbsp;</p>

		Informe o número que deseja calcular a tabuada:
		<input type="text" name="n" id="n" value="">

		<p>&nbsp;</p>

		<input type="submit" name="btcalcular" id="btcalcular" value=" Calcular ">
		&nbsp;
		<input type="button" name="btvoltar" id="btvoltar" value=" Voltar " onclick="document.location='index.php';">

	</form>	
</body>
</html>


