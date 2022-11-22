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
    // Verifica se as informações correspondem
    if ($row['email'] === $email && $row['senha'] === $senha) {
      // verifica se é usuário administrador
      if ($row['email'] === 'admin@gmail.com' && $row['senha'] === 'Adm@2022#') {
        header("Location: ../administrativo/index.php");
      }
      else {
        // Define veriáveis de sessão
        $_SESSION['email'] = $row['email'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['senha'] = $row['senha'];
        $_SESSION["sucessufly-loged"] = "<a href='./pages/profile' target='blank' id='passBtn'style='background-color:#fff; padding: 10px 15px;font-family: arial;text-align:center;color:#0061FE; text-decoration: none; border-radius: 4px; border: 1px solid #0061FE; margin-right: 20px'> Redefinir Senha</a>";
        header("Location: ../../index.php");
      }
    }
    else {
      $_SESSION["msg"] =  "<p style='font-family: arial;
      text-align:center;
      background-color: #F8D7DA;
      padding: 10px 20px;
      border-radius: 4px;
      color: #932029;'>Login ou senha incorretos<p>";
      header("Location: login.php");
    }
  }
  if (mysqli_num_rows($result) !== 1) {
    $_SESSION["msg"] =  "<p style='font-family: arial;
    text-align:center;
    background-color: #F8D7DA;
    padding: 10px 20px;
    border-radius: 4px;
    color: #932029;'>E-mail não cadastrado<p>";
    header("Location: login.php");
  }
?>