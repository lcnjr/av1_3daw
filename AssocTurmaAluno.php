<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<meta charset="UTF-8" />
</head>
<body>
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="telaAluno.html">Alunos</a></li>
<li><a href="telaTurma.php">Turmas</a></li>
<li><a href="AssocTurmaAluno.php">Associa Aluno Turma</a></li>
</ul >
<h1>Criando Turma</h1>
<?php
require_once('conexao.php');
$conn = createCon();	

if(isset($_POST['btn'])) { 

	if((isset($_POST['insTurma'])) && (isset($_POST['insTurma'])) ){
		$turma = $_POST['insTurma'];
		$aluno =$_POST['insAluno'];
		$sql = "INSERT into assoc_aluno_turma (aluno, turma)	values (" . $aluno . ", " . $turma . ")"; 
		
		if ($conn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('aluno inserido na turma: $turma');</script> " ;
		} else {
			echo "<script type='text/javascript'>alert('Falha ao inserir');</script>" ;
		}
	}
} 
?>

<form method="POST">
<label for="aluno">Escolha o Aluno:</label>
<select name="insAluno">
<?php
	$sql = "SELECT matricula, nome FROM alunos "; 
	$resultado = $conn->query($sql);
	
	/* if ($resultado->num_rows > 0) { */
        echo "*";
		if ($resultado->num_rows > 0) {
			while ($linha = mysqli_fetch_assoc($resultado)) {
            $mat =  $linha["matricula"];
            $nome = $linha["nome"];

			echo "<option value='$mat'>$nome </OPTION>";		 
		 } 
	} else {
        echo "<script type='text/javascript'>alert('Sem alunos cadastrados');</script>";
        echo "<option value= 'vazio'>vazio</OPTION>";	
	}
 
    

?>
 
</select>
<br>

<label for="aluno">Escolha a Turma:</label>
<select name="insTurma">
<?php
	$sql = "SELECT idturma FROM turma "; 
	$resultado = $conn->query($sql);
	
	/* if ($resultado->num_rows > 0) { */
        echo "*";
		if ($resultado->num_rows > 0) {
			while ($linha = mysqli_fetch_assoc($resultado)) {
            $turma =  $linha["idturma"];
           	echo "<option value='$turma'>$turma </OPTION>";		 
		 } 
	 } else {
        
        echo "<script type='text/javascript'>alert('Sem Turmas cadastradas');</script>";
        echo "<option value= 'vazio'>vazio</OPTION>";	
	}
 
    

?>
 
</select>
<br>
<input type="submit" value="cadastrar" name="btn" />
</form>
</body>
<?php 
closeCon($conn);
?>
</html>