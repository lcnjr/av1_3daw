<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta charset="UTF-8" />
  </head>
  <body>
      <?php 
      require_once('conexao.php');
      $conn = createCon();
        if(isset($_POST['btn'])) { 

            if((isset($_POST['id'])) &&(isset($_POST['disc'])) && (isset($_POST['Prof'])) && (isset($_POST['turno'])) && (isset($_POST['sala']))){
                $id = $_POST['id'];
                $disc = $_POST['disc'];
                $prof =$_POST['Prof'];
                $turno =$_POST['turno'];
                $sala =$_POST['sala'];
                $sql = "INSERT into turma (idturma,professor,idDisciplina,turno, sala)	values (" . $id. ",'" . $prof . "', " . $disc . ",'" . $turno . "','" . $sala . "')"; 
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert(' turma: $id criada com sucesso');</script> " ;
                } else {
                    echo "<script type='text/javascript'>alert('Falha ao inserir');</script>" ;
                }
            }
        } 
      
      ?>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="telaAluno.html">Alunos</a></li>
      <li><a href="telaTurma.php">Turmas</a></li>
      <li><a href="AssocTurmaAluno.php">Associa Aluno Turma</a></li>
    </ul>
    <h1>Tela Turma</h1>
    <form method="POST">
    Numero turma: <br /><input type="text" name="id" />
      <br />
      Professor: <br /><input type="text" name="Prof" />
      <br />
      <label for="aluno">Escolha a disciplina:</label>
        <select name="disc">
        <?php
            
            $sql = "SELECT id, Nome FROM disciplinas "; 
            $resultado = $conn->query($sql);
            
                if ($resultado->num_rows > 0) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                    $id =  $linha["id"];
                    $nome = $linha["Nome"];

                    echo "<option value='$id'>$nome </OPTION>";		 
                } 
            } else {
                echo "<script type='text/javascript'>alert('Sem Disciplinas cadastradas');</script>";
                echo "<option value= 'vazio'>vazio</OPTION>";	
            }
        
            
            closeCon($conn);
        ?>
        </select>
      <br />
      Turno: <br /><input type="text" name="turno" />
      <br />
      Sala: <br /><input type="text" name="sala" />
      <br />
      <br />
      <input type="submit" value="cadastrar" name="btn" />
      <input type="reset" value="limpar" name="btn" />
    </form>
  </body>
</html>
