<?php
session_start();
// Página responsável por cadastrar mentores no banco de dados
include 'connection.php';

$nome = $_POST['cad_mentor_nome'];
$email = $_POST['cad_mentor_email'];
$desc = $_POST['mentor_desc'];
$cod_curso = $_POST['cod_curso'];

if ($nome !== '' and $desc !== '' and $email!== '') {
  // Inserindo dados do mentor na tabela mentores
  $curso = "INSERT INTO mentores (nome, descricao, email, cod_curso) VALUES ('$nome', '$desc', '$email', '$cod_curso')";
  $result_curso = mysqli_query($conn, $curso);

  // Verifica se conseguiu cadastrar o mentor
  if (mysqli_insert_id($conn)) {
    $_SESSION['msg_cad'] = "--- Mentor cadastrado com sucesso ---";
    header('Location: mentores.php');
  }
  else {
    $_SESSION['msg_cad'] = "--- Falha ao tentar cadastrar mentor ---";
    header('Location: mentores.php');
  }
}
else {
  echo "nome, descrição ou e-mail inválidos inválidos";
  header('Location: mentores.php');
}
?>