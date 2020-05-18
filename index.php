<!DOCTYPE html>
<?php
	
	require_once "conecta.php";

?>

<html>
	<head>
		<title> Atividade final - index </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
	</head>
		<body>
			<form>
			<h1>Escolha uma das opções abaixo: </h1>
			<p class="index">
			<hr> <p class="hr"> Cadastrar </p><hr>
			<a href="estudante.php" class="btn">Novo estudante</a>
			<a href="disciplina.php" class="btn">Nova disciplina</a>
			<a href="addnota.php" class="btn">Nota</a><br><br>
			<hr> <p class="hr"> Alterar </p><hr>
			<a href="alterarnota.php" class="btn">Nota</a><br><br>
			<hr> <p class="hr"> Exibir </p><hr>
			<a href="relatorio.php" class="btn">Relatório</a>
			</p>
			</form>
			
<?php
	$query = "SELECT id_aluno, nome_aluno, email, telefone FROM aluno";
	$resultado = mysqli_query($mysqli,$query);
	
	if (!$resultado) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		echo "erro";
		die($message);
	}else{
		echo "<table>";
		echo "<tr><th>RA</th><th>Nome</th><th>E-mail</th><th>Telefone</th></tr>";
		while ($row = mysqli_fetch_array($resultado)) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		}
		echo "</table>";
	}
	mysqli_free_result($resultado);
?>
			
		</body>
</html>