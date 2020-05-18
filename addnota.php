<!DOCTYPE html>
<?php
	
	require_once "conecta.php";

?>
<html>
	<head>
		<title> Atividade final - lançar nota </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
<?php
		$ALUNO=@$_POST['cboAluno'];
		$DISCIPLINA=@$_POST['cboDisciplina'];
		$AVALIACAO=@$_POST['cboAvaliacao'];
		$NOTA=@$_POST['nota'];
		
		if($ALUNO != ''){
			if($DISCIPLINA!=''){
				if($AVALIACAO=='avaliacao_1'){
					if($NOTA!=''){
						$query_select = "SELECT * FROM `matricula` WHERE DISCIPLINA_ID = ".$DISCIPLINA." AND ALUNO_ID = ".$ALUNO."";
						$resultado_select = mysqli_query($mysqli,$query_select);
						
						if (!$resultado_select) {
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $query_select;
							echo "<script>alert('Erro ao procurar matrícula !');</script>";
							die($message);
						}else{
							while ($row = mysqli_fetch_array($resultado_select)) {
								if($row[1]==null){
									$MEDIA = ($NOTA+$row[2]+$row[3])/3;
									if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
									if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
									if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
									if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
									if($MEDIA <= 3.9){$CONCEITO = 'F';}
									$query_update = "UPDATE `matricula` SET `".$AVALIACAO."`= ".$NOTA.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ALUNO." AND DISCIPLINA_ID = ".$DISCIPLINA."";
							
									if (mysqli_query($mysqli, $query_update)) {
										echo "<script>alert('Nota cadastrada com sucesso!');</script>";
										$ALUNO='';
										$DISCIPLINA='';
										$AVALIACAO='';
										$NOTA='';
									} else {
										$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
										$message .= 'Whole query: ' . $query_select;
									}
								}else{
									echo "<script>alert('Nota ja cadastrada!');</script>";
									$ALUNO='';
									$DISCIPLINA='';
									$AVALIACAO='';
									$NOTA='';
								}
							}
						}
					}else{
						echo "DIGITE UMA NOTA";
					}
				}else if($AVALIACAO=='avaliacao_2'){
					if($NOTA!=''){
						$query_select = "SELECT * FROM `matricula` WHERE DISCIPLINA_ID = ".$DISCIPLINA." AND ALUNO_ID = ".$ALUNO."";
						$resultado_select = mysqli_query($mysqli,$query_select);
						
						if (!$resultado_select) {
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $query_select;
							echo "<script>alert('Erro ao procurar matrícula !');</script>";
							die($message);
						}else{
							while ($row = mysqli_fetch_array($resultado_select)) {
								if($row[2]==null){
									$MEDIA = ($row[1]+$NOTA+$row[3])/3;
									if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
									if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
									if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
									if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
									if($MEDIA <= 3.9){$CONCEITO = 'F';}
									$query_update = "UPDATE `matricula` SET `".$AVALIACAO."`= ".$NOTA.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ALUNO." AND DISCIPLINA_ID = ".$DISCIPLINA."";
							
									if (mysqli_query($mysqli, $query_update)) {
										echo "<script>alert('Nota cadastrada com sucesso!');</script>";
										$ALUNO='';
										$DISCIPLINA='';
										$AVALIACAO='';
										$NOTA='';
									} else {
										$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
										$message .= 'Whole query: ' . $query_select;
									}
								}else{
									echo "<script>alert('Nota ja cadastrada!');</script>";
									$ALUNO='';
									$DISCIPLINA='';
									$AVALIACAO='';
									$NOTA='';
								}
							}
						}
					}else{
						echo "DIGITE UMA NOTA";
					}
					
				}else if($AVALIACAO=='avaliacao_3'){
					if($NOTA!=''){
						$query_select = "SELECT * FROM `matricula` WHERE DISCIPLINA_ID = ".$DISCIPLINA." AND ALUNO_ID = ".$ALUNO."";
						$resultado_select = mysqli_query($mysqli,$query_select);
						
						if (!$resultado_select) {
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $query_select;
							echo "<script>alert('Erro ao procurar matrícula !');</script>";
							die($message);
						}else{
							while ($row = mysqli_fetch_array($resultado_select)) {
								if($row[3]==null){
									$MEDIA = ($row[1]+$row[2]+$NOTA)/3;
									if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
									if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
									if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
									if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
									if($MEDIA <= 3.9){$CONCEITO = 'F';}
									$query_update = "UPDATE `matricula` SET `".$AVALIACAO."`= ".$NOTA.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ALUNO." AND DISCIPLINA_ID = ".$DISCIPLINA."";
							
									if (mysqli_query($mysqli, $query_update)) {
										echo "<script>alert('Nota cadastrada com sucesso!');</script>";
										$ALUNO='';
										$DISCIPLINA='';
										$AVALIACAO='';
										$NOTA='';
									} else {
										$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
										$message .= 'Whole query: ' . $query_update;
									}
								}else{
									echo "<script>alert('Nota ja cadastrada!');</script>";
									$ALUNO='';
									$DISCIPLINA='';
									$AVALIACAO='';
									$NOTA='';
								}
							}
						}
					}else{
						echo "DIGITE UMA NOTA";
					}					
				}else{
					echo "SELECIONE UMA AVALIACAO";
				}
			}else{
				echo "SELECIONE UMA DISCIPLINA";
			}
		}else{
			echo "SELECIONE UM ALUNO";
		}
?>

	</head>
		<body>
			<form action="addnota.php" method="post">
				<h1>Adicionar nota</h1>
				<hr><p class="hr"> Dados </p><hr>
				<p class="aluno"> 
					<label for="aluno"> Selecione o aluno: </label>	
					<select id="cboAluno" name="cboAluno">
<?php
	$query = "SELECT * FROM aluno";
	$resultado = mysqli_query($mysqli,$query);
						
	if (!$resultado) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		echo "erro";
		die($message);
	}
	echo "<option value=''>...</option>";
	while ($row = mysqli_fetch_array($resultado)) {
		echo "<option value='".$row[0]."'>".$row[0]." - ".$row[1]."</option>";
	}

	mysqli_free_result($resultado);
?>
					</select>
				</p>	
				<p class="disciplina"> 
					<label for="disciplina"> Selecione a(s) disciplina(s): </label>
					<select id="cboDisciplina" name="cboDisciplina">
<?php
	$query = "SELECT * FROM disciplina";
	$resultado = mysqli_query($mysqli,$query);
						
	if (!$resultado) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		echo "erro";
		die($message);
	}
	echo "<option value=''>...</option>";
	while ($row = mysqli_fetch_array($resultado)) {
		echo "<option value='".$row[0]."'>".$row[0]." - ".$row[1]."</option>";
	}

	mysqli_free_result($resultado);
?>
					</select>
				</p>
				<hr><p class="hr"> Nota </p><hr>
				<p class="avaliacao"> 
					<label for="avaliacao"> Selecione qual será a avaliação: </label>	
					<select id="cboAvaliacao" name="cboAvaliacao">
					<option value="">...</option>
					<option value="avaliacao_1">Avaliação 1</option>
					<option value="avaliacao_2">Avaliação 2</option>
					<option value="avaliacao_3">Avaliação 3</option>
					</select>
				</p>	
				<p class="nota"> 
					<label for="nome"> Nota: </label>	
					<input type="text" id="notaid" placeholder="Insira a nota da avaliação" name="nota" required="required"/>
				</p><br>
				<input type="submit" class="btn" value="incluir"/>
				<a href="index.php" class="btnnota">Voltar</a>
			</form>
		</body>
</html>