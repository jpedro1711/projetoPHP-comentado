<?php
  include "connection.php";
  session_start();

  // Página de validação de login

  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $sql = "SELECT * FROM usuários WHERE email='$email'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // Verifica se os dados do usuário correspondem
    if ($row['email'] === $email && $row['senha'] === $senha) {
      // salva os dados em variáveis de sessão
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['nome'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['senha'] = $row['senha'];

      header("Location: index.php");
    }
    else {
      $_SESSION["msg"] =  "<p style='font-family: arial;
      text-align:center;
      background-color: #F8D7DA;
      padding: 10px 20px;
      border-radius: 4px;
      color: #932029;'>Login ou senha incorretos<p>";
      header("Location: index.php");
    }
  }
  if (mysqli_num_rows($result) !== 1) {
    $_SESSION["msg"] =  "<p style='font-family: arial;
    text-align:center;
    background-color: #F8D7DA;
    padding: 10px 20px;
    border-radius: 4px;
    color: #932029;'>E-mail não cadastrado<p>";
    header("Location: index.php");
  }
?>