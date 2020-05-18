<!DOCTYPE html>
<?php

	require_once "conecta.php";

?>
<html>
	<head>
		<title> Atividade final - estudante </title>
		<link href="css/estilo.css" rel="stylesheet"/>
		<script src ="js/codigo.js"></script>
		<meta charset="utf-8"/>
	</head>
		<body>
			<?php
				$NOME=@$_POST['nome'];
				$CPF=@$_POST['cpf'];
				$EMAIL=@$_POST['email'];
				$TEL=@$_POST['telefone'];
				$CEP=@$_POST['cep'];
				$endereco=@$_POST['endereco'];
				$NUMERO=@$_POST['numero'];
				$pais=@$_POST['pais'];
				$Disciplina1 = @$_POST['cboDisciplina1'];
				$Disciplina2 = @$_POST['cboDisciplina2'];
				$Disciplina3 = @$_POST['cboDisciplina3'];
				
				if($CEP != ''){
					$arq = file_get_contents('https://viacep.com.br/ws/' .$CEP .'/json/');

					$json = json_decode($arq);
					
					$endereco = $json->logradouro;
					$bairro = $json->bairro;
					$cidade = $json->localidade;
					$estado = $json->uf;
					$pais = 'Brasil';
				}else{
					$NOME = '';
					$CEP = '';
					$bairro = '';
					$cidade = '';
					$estado = '';
				}
				if ($Disciplina1 != '') {
					$query_aluno = "INSERT INTO `aluno`(`NOME_ALUNO`, `CPF_ALUNO`, `CEP`, `RUA`, `NUMERO`, `BAIRRO`, `CIDADE`, `ESTADO`, `EMAIL`, `TELEFONE`) VALUES ('".$NOME."',".$CPF.",".$CEP.",'".$endereco."',".$NUMERO.",'".$bairro."','".$cidade."','".$estado."','".$EMAIL."',".$TEL.")";

					if (mysqli_query($mysqli, $query_aluno)) {
						echo "<script>alert('Aluno(a) Cadastrado(a) com sucesso');</script>";
						$query_select = "SELECT `ID_ALUNO` FROM `aluno` WHERE CPF_ALUNO = ".$CPF."";
						$resultado_select = mysqli_query($mysqli,$query_select);
							if (!$resultado_select) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $query;
								echo "<script>alert('Erro ao encontrar id do aluno !');</script>";
								die($message);
							}else{
								while ($row = mysqli_fetch_array($resultado_select)) {
									$id_aluno = $row[0];
									echo "ID do aluno:".$id_aluno."<br>";
									$query_matricula = "INSERT INTO `matricula`(`DISCIPLINA_ID`, `ALUNO_ID`) VALUES (".$Disciplina1.",".$id_aluno.")";
									if(mysqli_query($mysqli, $query_matricula)){
										echo "Matricula na disciplina ".$Disciplina1." efetuada com sucesso !<br>";
										$NOME=@$_POST['nome'];
										$CPF=@$_POST['cpf'];
										$EMAIL=@$_POST['email'];
										$TEL=@$_POST['telefone'];
										$CEP=@$_POST['cep'];
										$endereco=@$_POST['endereco'];
										$NUMERO=@$_POST['numero'];
										$pais=@$_POST['pais'];
										$Disciplina1 = @$_POST['cboDisciplina1'];
										$Disciplina2 = @$_POST['cboDisciplina2'];
										$Disciplina3 = @$_POST['cboDisciplina3'];
									}else{
										echo "Erro na matrícula da 1ª disciplina<br>";
									}
								}
							}
							mysqli_free_result($resultado_select);
					} else {
						echo "<script>('Erro no cadastro do aluno');</script>";
					}
					
				}else{
					echo " ";	
				}
				
				if ($Disciplina2 != '') {
						$query_select = "SELECT `ID_ALUNO` FROM `aluno` WHERE CPF_ALUNO = ".$CPF."";
						$resultado_select = mysqli_query($mysqli,$query_select);
							if (!$resultado_select) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $query;
								//echo "erro ao encontrar o id do aluno";
								//se não achar na disciplina 1 não achará aqui tambem !
								die($message);
							}else{
								while ($row = mysqli_fetch_array($resultado_select)) {
									$id_aluno = $row[0];
									$query_matricula = "INSERT INTO `matricula`(`DISCIPLINA_ID`, `ALUNO_ID`) VALUES (".$Disciplina2.",".$id_aluno.")";
									if(mysqli_query($mysqli, $query_matricula)){
										echo "Matricula na disciplina ".$Disciplina2." efetuada com sucesso !<br>";
										$NOME=@$_POST['nome'];
										$CPF=@$_POST['cpf'];
										$EMAIL=@$_POST['email'];
										$TEL=@$_POST['telefone'];
										$CEP=@$_POST['cep'];
										$endereco=@$_POST['endereco'];
										$NUMERO=@$_POST['numero'];
										$pais=@$_POST['pais'];
										$Disciplina1 = @$_POST['cboDisciplina1'];
										$Disciplina2 = @$_POST['cboDisciplina2'];
										$Disciplina3 = @$_POST['cboDisciplina3'];
									}else{
										echo "Erro na matrícula da 2ª disciplina<br>";
									}
								}
							}
							mysqli_free_result($resultado_select);
					
				}else{
					echo " ";	
				}

				if ($Disciplina3 != '') {
						$query_select = "SELECT `ID_ALUNO` FROM `aluno` WHERE CPF_ALUNO = ".$CPF."";
						$resultado_select = mysqli_query($mysqli,$query_select);
							if (!$resultado_select) {
								$message  = 'Invalid query: ' . mysql_error() . "\n";
								$message .= 'Whole query: ' . $query;
								//echo "erro ao encontrar o id do aluno";
								//se não achar na disciplina 1 não achará aqui tambem !
								die($message);
							}else{
								while ($row = mysqli_fetch_array($resultado_select)) {
									$id_aluno = $row[0];
									$query_matricula = "INSERT INTO `matricula`(`DISCIPLINA_ID`, `ALUNO_ID`) VALUES (".$Disciplina3.",".$id_aluno.")";
									if(mysqli_query($mysqli, $query_matricula)){
										echo "Matricula na disciplina ".$Disciplina3." efetuada com sucesso !<br>";
										$NOME=@$_POST['nome'];
										$CPF=@$_POST['cpf'];
										$EMAIL=@$_POST['email'];
										$TEL=@$_POST['telefone'];
										$CEP=@$_POST['cep'];
										$endereco=@$_POST['endereco'];
										$NUMERO=@$_POST['numero'];
										$pais=@$_POST['pais'];
										$Disciplina1 = @$_POST['cboDisciplina1'];
										$Disciplina2 = @$_POST['cboDisciplina2'];
										$Disciplina3 = @$_POST['cboDisciplina3'];
									}else{
										echo "Erro na matrícula da 3ª disciplina<br>";
									}
								}
							}
							mysqli_free_result($resultado_select);
					
				}else{
					echo " ";	
				}
				
				?>
			<form action="estudante.php" method="post">
			
				<h1>Adicionar estudante</h1>
				
				<hr><p class="hr">Dados pessoais</p><hr>
				<p class="nome"> 
					<label for="nome"> Nome: </label>	
					<input type="text" id="nomeid" placeholder="Insira o nome do aluno" name="nome" required="required" value="<?php echo $NOME;?>"/>
				</p>
				
				<p class="cpf"> 
					<label for="nome"> CPF: </label>	
					<input type="text" id="cpfid" placeholder="xxxxxxxxxxx" name="cpf" required="required" value="<?php echo $CPF;?>"/>
				</p>
				<p class="email"> 
					<label for="email"> Email: </label>	
					<input type="text" id="emailid" placeholder="Insira o email do aluno" name="email" required="required" value="<?php echo $EMAIL;?>"/>
				</p>
				<p class="telefone"> 
					<label for="telefone"> Telefone: </label>	
					<input type="tel" id="telefoneid" placeholder="00000000000" name="telefone" required="required" value="<?php echo $TEL;?>"/>
				</p>
				<hr> <p class="hr">Endereço</p> <hr>
				<p class="cep">
					<label for="cep"> Cep: </label>	
					<input type="text"  maxlength="9" id="cepid" placeholder="Informe apenas os números" name="cep" required="required" value="<?php echo $CEP;?>"/>
					<input type="submit" class="btn" value="Buscar CEP"/>
				</p>
				<p class="endereco">
					<label for="endereco"> Logradouro: </label>	
					<input type="text" id="enderecoid" size="40" name="endereco" disabled value="<?php echo $endereco;?>"/>
				</p>
				<p class="bairro">
					<label for="bairro"> Bairro: </label>	
					<input type="text" id="bairroid" name="bairro" disabled value="<?php echo $bairro;?>"/>
				</p>
				<p class="cidade">
					<label for="cidade"> Cidade: </label>	
					<input type="text" id="cidadeid" disabled value="<?php echo $cidade;?>"/>
				</p>
				<p class="estado">
					<label for="bairro"> Estado: </label>	
					<input type="text" id="estadoid" name="estado" disabled value="<?php echo $estado;?>"/>
				</p>
				<p class="pais">
					<label for="pais"> País: </label>	
					<input type="text" id="paisid" name="pais" disabled value="<?php echo $pais;?>"/>
				</p>
				<p class="numero">
					<label for="numero"> Nº da casa: </label>	
					<input type="text" id="numeroid" name="numero" value="<?php echo $NUMERO;?>"/>
				</p>
				<hr> <p class="hr">Acadêmico</p> <hr>
				<p>Selecione ao menos uma disciplina:</p>
				<p class="disciplina"> 
					<label for="disciplina"> Disciplina 1: </label>
					<select id="cboDisciplina1" name="cboDisciplina1" multiple>
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
				<p class="disciplina"> 
					<label for="disciplina"> Disciplina 2: </label>
					<select id="cboDisciplina2" name="cboDisciplina2" multiple>
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
				<p class="disciplina"> 
					<label for="disciplina"> Disciplina 3: </label>
					<select id="cboDisciplina3" name="cboDisciplina3" multiple>
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


				<input type="submit" class="btn" value="Cadastrar"/>
				<a href="index.php" class="btn">Voltar</a>
			</form>
		</body>
</html>