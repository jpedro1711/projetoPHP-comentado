<?php
// Página responsável pelo update dos mentores
  session_start();
  include 'connection.php';

  $id = $_POST['id_mentor_upd'];
  $nome = $_POST['upd_nome'];
  $email = $_POST['updt_email'];
  $desc = $_POST['updt_desc'];
  $cod_curso_up = $_POST['cod_curso_up'];
  $sql = "SELECT * FROM mentores WHERE id='$id'";
  $result_curso = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result_curso) === 1){
    // Pegamos a linha na tabela correspondente ao mentor e atualizamos os dados
    $row = mysqli_fetch_assoc($result_curso);
    $id = $row['id'];
    $delete = "UPDATE mentores SET nome='$nome', email='$email', descricao='$desc', cod_curso='$cod_curso_up' WHERE id='$id'";
    if ($conn->query($delete) === TRUE) {
      $_SESSION['msg_upd'] = "
      mentor atualizado com sucesso!";
      header('Location: mentores.php');
    }
    else {
      $_SESSION['msg_upd'] = "
      Erro ao atualizar mentor!";
      header('Location: mentores.php');
    }
  }
  else {
    $_SESSION["msg_upd"] = "O mentor que você quer editar não existe";
    header('Location: mentores.php');
  }
?>