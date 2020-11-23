<?php
 require_once('conexao.php');
 $conn = createCon();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$btn = $_POST["btn"];
	$nome = $_POST["nome"];
	$mat = $_POST["matricula"];
	$cpf = $_POST["cpf"];
	
switch ($btn) {
	case "cadastrar":
	$sql = "INSERT into alunos (matricula, nome, cpf)	values (" . $mat . ", '" . $nome . "', '" . $cpf . "')";
	
	if ($conn->query($sql) === TRUE) {
		echo "registro inserido " ;
	} else {
		echo "Erro na criacao de aluno" ;
	}
	 
		break;
	case "consultar":
		$sql = "SELECT matricula, nome, cpf FROM alunos where matricula = " . $mat; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {
		while ($linha = mysqli_fetch_assoc($resultado)) {
			echo "Matricula: " . $linha["matricula"] . "<br> Nome: " . $linha["nome"] . "<br> CPF: " . $linha["cpf"] ."<br>";		
		}
	} else {
		echo "Aluno não encontrado";
	}

	  
	  break;
	case "alterar":
		$sql = "UPDATE alunos set matricula =" . $mat . ", nome = '" . $nome . "', cpf=   '" . $cpf . "' where matricula = " . $mat;
	
	if ($conn->query($sql) === TRUE) {
		echo "registro alterado  " ;
	} else {
		echo "Erro ao alterar o aluno" ;
	}
	  
	  break;
	case "deletar":
		$sql = "DELETE FROM alunos where matricula = " . $mat;
	
		if ($conn->query($sql) === TRUE) {
			echo "registro alterado " ;
		} else {
			echo "Erro ao alterar o aluno" ;
		}
	break;
	case "listar":
		$sql = "SELECT matricula, nome, cpf FROM alunos "; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {
		while ($linha = mysqli_fetch_assoc($resultado)) {
			echo "<br> <hr/>Matricula: " . $linha["matricula"] . "<br> Nome: " . $linha["nome"] . "<br> CPF: " . $linha["cpf"] ."" ;		
		}
	} else {
		echo "Aluno não encontrado";
	}
	
	break;
	default:
	  echo "ação não encontrada ";
  }
	
} else {
	echo "metodo errado";
}
echo "<br><hr/><a href='index.html'>HOME</a>";	

closeCon($conn);
?>