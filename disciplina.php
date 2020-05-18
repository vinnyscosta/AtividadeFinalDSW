<!DOCTYPE html>
<html>
	<head>
		<title> Atividade final - disciplina </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
	</head>
		<body>
<?php
	require_once "conecta.php";

	$disciplina	=	@$_POST['disciplina'];
	if($disciplina!=''){
		$query_insert = "INSERT INTO `disciplina`(`NOME_DISCIPLINA`) VALUES ('".$disciplina."')";
		
		if (mysqli_query($mysqli, $query_insert)) {
			echo "<script>alert('Disciplina Cadastrada com sucesso');</script>";
		} else {
			$disciplina = '';
			echo "<script>alert('Erro ao cadastrar disciplina');</script>";
		}

	}
?>
			<form  action="disciplina.php" method="post">
				<h1>Adicionar disciplina</h1>
				<hr> <p class="hr"> Cadastro </p><hr>
				<p class="disciplina"> 
					<label for="disciplina"> Disciplina: </label>	
					<input type="text" id="disciplinaid" placeholder="Insira o nome da disciplina" name="disciplina" required="required"/>
				</p>
				<input type="submit" class="btn" value="Cadastrar Disciplina"/>
				<a href="index.php" class="btn">Voltar</a>
			</form>
<?php
	$query_select = "SELECT * FROM disciplina";
	$resultado_select = mysqli_query($mysqli,$query_select);
	
	if (!$resultado_select) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		echo "erro";
		die($message);
	}else{
		echo "<table>";
		echo "<caption>Disciplinas ja cadastradas</caption>";
		echo "<tr><th>ID</th><th>Nome</th><th>Ação</th></tr>";
		while ($row = mysqli_fetch_array($resultado_select)) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
		}
		echo "</table>";
	}
	mysqli_free_result($resultado_select);
?>

		</body>
</html>