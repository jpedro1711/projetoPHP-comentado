<?php

  include "connection.php";
  session_start();

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Verifica se o usuário está cadastrado 
  $sql = "SELECT * FROM usuários WHERE email='$email' AND senha='$senha'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    // Verifica se as senhas correspondem
    if ($row['email'] === $email and $row['senha'] === $senha){
      $id = $row['id'];
      // Deletando o usuário e as inscrições que ele realizou em eventos
      $delete = "DELETE FROM usuários where id=$id";
      $delete2 = "DELETE FROM inscricoes_evento where id_usuario=$id";
      // Verifica se conseguiu excluir
      if ($conn->query($delete) === TRUE && $conn->query($delete2) === TRUE) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
        Usuário deletado com sucesso!
      </div>";
        header('Location: index.php');
      }
      else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
        Erro ao tentar apagar usuário!
      </div>";
        header('Location: index.php');
      }

    } 
    else {
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      E-mail ou senha atuais incorretos!
    </div>";
      header('Location: index.php');
    }
  }
  else {
     $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
     Conta não cadastrada!
   </div>";
     header('Location: index.php');
  }
?>