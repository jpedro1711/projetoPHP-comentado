<?php
// Página responsável pela exclusão dos cursos do banco de dados
  session_start();
  include 'connection.php';

  $id = $_POST['curso_id'];
  // Delete para excluir o curso em si e delete para excluir os mentores cadastrados nesse curso
  $delete = "DELETE FROM cursos where id=$id";
  $delete2 = "DELETE FROM mentores where cod_curso=$id";

  // Verifica se os deletes foram bem sucedidos
  if ($conn->query($delete) === TRUE and $conn->query($delete2) === TRUE) {
    $_SESSION['msg_exc'] = "
    Curso deletado com sucesso!";
    header('Location: index.php');
  }
  else {
    $_SESSION['msg_exc'] = "
    Erro ao deletar curso! Verifique se o id que você digitou está correto";
    header('Location: index.php');
  }

?>