<?php
// Validação após envio do formulário de cadastro, inserindo os dados do usuário no banco
  include "connection.php";
  session_start();
  $nome = $_POST["nome"];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $profissao = $_POST["profession"];
  $escolaridade = $_POST["schooling"];

  //echo "Email: " . $email;
  //echo "senha: " . $senha;

  $sql = "SELECT * FROM usuários WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  // Verifica se o e-mail já está cadastrado no sistema
  if (mysqli_num_rows($result) === 1) {
    $_SESSION["msg"] = "<p style='font-family: arial;
    text-align:center;
    background-color: #F8D7DA;
    padding: 10px 20px;
    border-radius: 4px;
    color: #932029;'>E-mail já cadastrado no sistema<p>";
    header("Location: cadastro.php");
  }
  else {
    // Insere os dados no banco
    $result_usuario = "INSERT INTO usuários (nome, email, senha, profissao, escolaridade) VALUES ('$nome','$email', '$senha','$profissao', '$escolaridade')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if(mysqli_insert_id($conn)) {
      $_SESSION["msg"] = "<p style='font-family: arial;
      text-align:center;
      background-color: #D1E7DD;
      border-radius: 4px;
      padding: 10px 20px;
      width: auto;
      color: #0F5132;'>Usuário cadastrado com sucesso</p>";
      header("Location: ../login/login.php");
    } else {
      $_SESSION["msg"] = "<p style='font-family: arial;
      text-align:center;
      background-color: #F8D7DA;
      padding: 10px 20px;
      border-radius: 4px;
      color: #932029;'>Falha ao cadastrar usuário<p>";
      header("Location: cadastro.php");
  }
  }
?>