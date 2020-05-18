<!DOCTYPE html>
<?php
	
	require_once "conecta.php";

?>
<html>
	<head>
		<title> Atividade final - relatorio </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
	</head>
		<body>
			<form>
				<h1>Relatório</h1>
<?php
	$query = "SELECT ALUNO.ID_ALUNO, ALUNO.NOME_ALUNO, DISCIPLINA.NOME_DISCIPLINA, MATRICULA.AVALIACAO_1,MATRICULA.AVALIACAO_2,MATRICULA.AVALIACAO_3,MATRICULA.MEDIA,MATRICULA.CONCEITO FROM ALUNO INNER JOIN MATRICULA ON ALUNO.ID_ALUNO = MATRICULA.ALUNO_ID INNER JOIN DISCIPLINA ON MATRICULA.DISCIPLINA_ID = DISCIPLINA.ID_DISCIPLINA ORDER BY ALUNO.ID_ALUNO";
	$resultado = mysqli_query($mysqli,$query);
	
	if (!$resultado) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		echo "<script>alert('erro');</script>";
		die($message);
	}else{
		echo "<table>";
		echo "<tr><th>RA</th><th>Nome</th><th>Disciplina</th><th>A1</th><th>A2</th><th>A3</th><th>Média</th><th>Conceito</th></tr>";
		while ($row = mysqli_fetch_array($resultado)) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>";
		}
		echo "</table>";
	}
	mysqli_free_result($resultado);
?>
				<a href="index.php" class="btnnota">Voltar</a>
			</form>
		</body>
</html>
<?php
/* SELECT ALUNO.ID_ALUNO, ALUNO.NOME_ALUNO, DISCIPLINA.NOME_DISCIPLINA, MATRICULA.AVALIACAO_1,MATRICULA.AVALIACAO_2,MATRICULA.AVALIACAO_3,MATRICULA.MEDIA,MATRICULA.CONCEITO
FROM ALUNO
INNER JOIN MATRICULA ON ALUNO.ID_ALUNO = MATRICULA.ALUNO_ID
INNER JOIN DISCIPLINA ON MATRICULA.DISCIPLINA_ID = DISCIPLINA.ID_DISCIPLINA
ORDER BY ALUNO.ID_ALUNO */

/* SELECT ALUNO.ID_ALUNO, ALUNO.NOME_ALUNO, DISCIPLINA.NOME_DISCIPLINA, MATRICULA.AVALIACAO_1,MATRICULA.AVALIACAO_2,MATRICULA.AVALIACAO_3,MATRICULA.MEDIA,MATRICULA.CONCEITO FROM ALUNO INNER JOIN MATRICULA ON ALUNO.ID_ALUNO = MATRICULA.ALUNO_ID INNER JOIN DISCIPLINA ON MATRICULA.DISCIPLINA_ID = DISCIPLINA.ID_DISCIPLINA ORDER BY ALUNO.ID_ALUNO */

?>
