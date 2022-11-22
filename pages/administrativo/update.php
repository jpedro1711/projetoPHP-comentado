<?php
  // Página responsável pela atualização dos dados dos cursos 
  session_start();
  include 'connection.php';

  $id = $_POST['curso_id'];
  $desc = $_POST['course_desc'];
  $link = $_POST['course_link'];
  $sql = "SELECT * FROM cursos WHERE id='$id'";
  $result_curso = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result_curso) === 1){
    $row = mysqli_fetch_assoc($result_curso);
        // Pegamos a linha na tabela correspondente ao curso e atualizamos os dados
    $id = $row['id'];
    $delete = "UPDATE cursos SET descricao='$desc', link='$link' WHERE id='$id'";
    if ($conn->query($delete) === TRUE) {
      $_SESSION['msg_update'] = "
      Curso atualizado com sucesso!";
      header('Location: index.php');
    }
    else {
      $_SESSION['msg_update'] = "
      Erro ao atualizar curso!";
      header('Location: index.php');
    }
  }
  else {
    $_SESSION["msg_update"] = "O curso que você quer editar não existe";
    header('Location: index.php');
  }
?>