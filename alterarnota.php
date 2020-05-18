<!DOCTYPE html>
<?php
	
	require_once "conecta.php";

?>
<html>
	<head>
		<title> Atividade final - alterar nota </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
<?php
		$ID_ALUNO=@$_POST['ra'];
		$ID_DISCIPLINA=@$_POST['cboDisciplina'];
		$AVALIACAO1=@$_POST['a1'];
		$AVALIACAO2=@$_POST['a2'];
		$AVALIACAO3=@$_POST['a3'];
		$NOME_ALUNO='';
		$NOME_DISCIPLINA='';
		
		if(($AVALIACAO1!='')||($AVALIACAO1!='')||($AVALIACAO1!='')){
			if($AVALIACAO1!=''){
				
				$MEDIA = ($AVALIACAO1+$AVALIACAO2+$AVALIACAO3)/3;
				if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
				if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
				if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
				if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
				if($MEDIA <= 3.9){$CONCEITO = 'F';}
				
				$query_update = "UPDATE `matricula` SET `AVALIACAO_1`= ".$AVALIACAO1.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ID_ALUNO." AND DISCIPLINA_ID = ".$ID_DISCIPLINA."";	
				
				if (mysqli_query($mysqli, $query_update)) {
					//echo "Nota alterada com sucesso";
				} else {
					$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
					$message .= 'Whole query: ' . $query_update;
				}
			}
			if($AVALIACAO2!=''){
				
				$MEDIA = ($AVALIACAO1+$AVALIACAO2+$AVALIACAO3)/3;
				if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
				if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
				if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
				if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
				if($MEDIA <= 3.9){$CONCEITO = 'F';}
				
				$query_update = "UPDATE `matricula` SET `AVALIACAO_2`= ".$AVALIACAO2.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ID_ALUNO." AND DISCIPLINA_ID = ".$ID_DISCIPLINA."";	
				
				if (mysqli_query($mysqli, $query_update)) {
					//echo "Nota alterada com sucesso";
				} else {
					$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
					$message .= 'Whole query: ' . $query_update;
				}
			}
			if($AVALIACAO3!=''){
				
				$MEDIA = ($AVALIACAO1+$AVALIACAO2+$AVALIACAO3)/3;
				if(($MEDIA <= 10) && ($MEDIA >= 8.5)){$CONCEITO = 'A';}
				if(($MEDIA <= 8.4) && ($MEDIA >= 7)){$CONCEITO = 'B';}
				if(($MEDIA <= 6.9) && ($MEDIA >= 6)){$CONCEITO = 'C';}
				if(($MEDIA <= 5.9) && ($MEDIA >= 4)){$CONCEITO = 'D';}
				if($MEDIA <= 3.9){$CONCEITO = 'F';}
				
				$query_update = "UPDATE `matricula` SET `AVALIACAO_3`= ".$AVALIACAO3.",MEDIA='".$MEDIA."', CONCEITO = '".$CONCEITO."' WHERE ALUNO_ID = ".$ID_ALUNO." AND DISCIPLINA_ID = ".$ID_DISCIPLINA."";	
				
				if (mysqli_query($mysqli, $query_update)) {
					//echo "Nota alterada com sucesso";
				} else {
					$message  = 'Invalid query: ' . mysqli_error($mysqli) . "\n";
					$message .= 'Whole query: ' . $query_update;
				}
			}
			$ID_ALUNO='';
			$ID_DISCIPLINA='';
			$AVALIACAO1='';
			$AVALIACAO2='';
			$AVALIACAO3='';
			$NOME_ALUNO='';
			$NOME_DISCIPLINA='';
			echo "<script>alert('Nota alterada com sucesso');</script>";
		}else{
			if(($ID_ALUNO!='')&&($ID_DISCIPLINA!='')){
				$query_select = "SELECT ALUNO.ID_ALUNO, ALUNO.NOME_ALUNO, MATRICULA.AVALIACAO_1, MATRICULA.AVALIACAO_2, MATRICULA.AVALIACAO_3, MATRICULA.DISCIPLINA_ID, DISCIPLINA.NOME_DISCIPLINA FROM ALUNO INNER JOIN MATRICULA ON ALUNO.ID_ALUNO = MATRICULA.ALUNO_ID INNER JOIN DISCIPLINA ON MATRICULA.DISCIPLINA_ID = DISCIPLINA.ID_DISCIPLINA WHERE ALUNO.ID_ALUNO = ".$ID_ALUNO." AND DISCIPLINA.ID_DISCIPLINA = ".$ID_DISCIPLINA."";
				$resultado_select = mysqli_query($mysqli,$query_select);
				
				if (!$resultado_select) {
					$message  = 'Invalid query: ' . mysqli_error() . "\n";
					$message .= 'Whole query: ' . $query_select;
					echo "<script>alert('Erro na procura das notas !');</script>";
					die($message);
				}else{
					while ($row_select = mysqli_fetch_array($resultado_select)) {
						$NOME_ALUNO = $row_select[1];
						$AVALIACAO1 = $row_select[2];
						$AVALIACAO2 = $row_select[3];
						$AVALIACAO3 = $row_select[4];
						$NOME_DISCIPLINA = $row_select[6];
					}
					mysqli_free_result($resultado_select);
				}
				
			}else{
				echo "SELECIONE UM ALUNO E UMA DISCIPLINA";
			}
		}
?>
	</head>
		<body>
			<form  action="alterarnota.php" method="post">
				<h1>Alterar nota</h1>
				<hr><p class="hr"> Pesquisa </p><hr>
				<p class="ra">
					<label for="ra"> RA do aluno: </label>
					<input type="text" id="raid" placeholder="Insira o RA do aluno" name="ra" value="<?php echo $ID_ALUNO;?>" required="required"/>
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
		if ($row[0]==$ID_DISCIPLINA){
			echo "<option value='".$row[0]."' selected>".$row[0]." - ".$row[1]."</option>";
		}else{
			echo "<option value='".$row[0]."'>".$row[0]." - ".$row[1]."</option>";
		}
	}

	mysqli_free_result($resultado);
?>
					</select>
					<input type="submit" class="btn" value="Pesquisar"/>
				</p>
				
				<hr><p class="hr"> Dados </p><hr>
				<p class="nome"> 
					<label> Nome: </label>	
					<label for="nome" name="nm_aluno"><?php if($NOME_ALUNO!=''){echo $NOME_ALUNO;}else{echo "...";}?> </label>
				</p>
				<p class="disc"> 
					<label> DISCIPLINA: </label>	
					<label for="disc" name="nm_disciplina"><?php if($NOME_DISCIPLINA!=''){echo $NOME_DISCIPLINA;}else{echo "...";}?> </label>
				</p>
				
				<hr><p class="hr"> Notas </p><hr>
				<p class="notas">
<?php
				if(($AVALIACAO1=='')&&($AVALIACAO2=='')&&($AVALIACAO3=='')){
					echo "<label> Avaliação 1: </label>";
					echo "<input type='text' id='a1id' placeholder='Nota A1' name='a1' disabled required='required'/><br>";
					echo "<label> Avaliação 2: </label>";
					echo "<input type='text' id='a2id' placeholder='Nota A2' name='a2' disabled required='required'/><br>";
					echo "<label> Avaliação 3: </label>";
					echo "<input type='text' id='a3id' placeholder='Nota A3' name='a3' disabled required='required'/><br>";
				}else{
					echo "<label> Avaliação 1: </label>";
					echo "<input type='text' id='a1id' name='a1' value='".$AVALIACAO1."' required='required'/><br>";
					echo "<label> Avaliação 2: </label>";
					echo "<input type='text' id='a2id' name='a2' value='".$AVALIACAO2."' required='required'/><br>";
					echo "<label> Avaliação 3: </label>";
					echo "<input type='text' id='a3id' name='a3' value='".$AVALIACAO3."' required='required'/><br>";
				}
?>
				</p>
				<input type="submit" class="btn" value="alterar"/>
				<a href="index.php" class="btnnota">Voltar</a>
			</form>
		</body>
</html>