<?php
// Página que é responsável por cadastrar cursos no banco de dados
session_start();
include 'connection.php';

$nome = $_POST['course_name'];
$desc = $_POST['course_desc'];
$link = $_POST['course_link'];

if ($nome !== '' and $desc !== '') {
  // Inserindo os valores entrados pelo usuário na tabela curso
  $curso = "INSERT INTO cursos (nome, descricao, link) VALUES ('$nome', '$desc', '$link')";
  $result_curso = mysqli_query($conn, $curso);

  // Verifica de conseguiu cadastrar o curso
  if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "--- Curso cadastrado com sucesso ---";
    header('Location: ./index.php');
  }
  else {
    $_SESSION['msg'] = "--- Falha ao tentar cadastrar curso ---";
    header('Location: ./index.php');
  }
}
else {
  echo "nome e descrição inválidos";
}
?>