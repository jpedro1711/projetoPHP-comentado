<?php
  // Página responsável por deletar um mentor
  session_start();
  include 'connection.php';

  $id = $_POST['exc_mentor_id'];
  // Selecionamos o mentor 
  $sql = "SELECT * FROM mentores WHERE id='$id'";
  $result_curso = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result_curso) === 1){
    // Pegando a 'linha' do banco de dados correspondente ao mentor
    $row = mysqli_fetch_assoc($result_curso);
    $id = $row['id'];
    // Excluimos o mentor
    $delete = "DELETE FROM mentores where id=$id";
    // Verificamos se o mentor realmente foi deletado
    if ($conn->query($delete) === TRUE) {
      $_SESSION['msg_exc_mentor'] = "
      Mentor deletado com sucesso!";
      header('Location: mentores.php');
    }
    else {
      $_SESSION['msg_exc_mentor'] = "
      Erro ao deletar mentor!";
      header('Location: mentores.php');
    }
  }
  else {
    $_SESSION["msg_exc_mentor"] = "O id do mentor é inválido";
    header('Location: mentores.php');
  }
?>