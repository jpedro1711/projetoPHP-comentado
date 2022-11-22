<?php
  include "connection.php";
  session_start();
  // Utilizando a biblioteca PHPmailer para simular o envio de e-mail ao usuário
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  if (isset($_POST["evento"])) {

    $email = $_POST["email"];
    $evento = $_POST["evento"];

    $sql = "SELECT * FROM usuários WHERE email='$email'";

    $result = mysqli_query($conn, $sql); // número de emails que ele acha ao se conectar ao banco

    // verifica se o usuário tem cadastro
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['email'] === $email) {
        $_SESSION['email'] = $row['email'];
        $id = $row['id'];
        $verification = "SELECT * FROM inscricoes_evento WHERE id_usuario='$id' and evento='$evento'";
        $result1 = mysqli_query($conn, $verification);
        // Verifica se o usuário já se cadastrou
        if (mysqli_num_rows($result1) === 1) {
          $_SESSION["msg"] =  "<p style='font-family: arial;
          text-align:center;
          background-color: #F8D7DA;
          padding: 10px 20px;
          border-radius: 4px;
          color: #932029;'>Você já se cadastrou nesse evento<p>";
          header("Location: cadevento.php");
        }
        else {
          // Solicitando a lib do PHP =mailer
          require './lib/vendor/autoload.php';
    
    
          try {
            $mail = new PHPMailer(true);
    
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';  //'smtp.mailtrap.io'        //Set the SMTP server to send through
            $mail->SMTPSecure = "tls";
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '53df54444f89f4'; //53df54444f89f4                     //SMTP username
            $mail->Password   = '8aceece7288a2f'; //8aceece7288a2f    
            $mail->CharSet = 'UTF-8';                           //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 2525;   //2525 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            $mail->setFrom('stepup@contato.com', 'StepUP');
            $mail->addAddress($email);     //Add a recipient
    
            //Content do email
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'StepUp - Recebemos sua inscrição';
            $mail->Body    = 'Olá, sua inscrição no evento foi realizada com sucesso<br><a href="https://www.youtube.com">Você pode acessar o evento clicando aqui</a>';
            $mail->AltBody = 'Você pode acessar o evento através do link:.\n youtube.com';
            
            $mail->send();
    
            $_SESSION["msg"] =  "<p style='font-family: arial;
            text-align:center;
            background-color: #D1E7DD;
            border-radius: 4px;
            padding: 10px 20px;
            width: auto;
            color: #0F5132;'>Inscrição enviada com sucesso, os dados foram enviados para o seu e-mail</p>";
            $result_usuario = "INSERT INTO inscricoes_evento (evento, id_usuario) VALUES ('$evento','$id')";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            header("Location: cadevento.php");
          } catch (Exception $e) {
            $_SESSION["msg"] =  "Não foi possível enviar o e-mail - Error PHPmailer: {$mail->ErrorInfo}";
          }
        }
      }
      else{
        $_SESSION["msg"] =  "<p style='font-family: arial;
        text-align:center;
        background-color: #F8D7DA;
        padding: 10px 20px;
        border-radius: 4px;
        color: #932029;'>E-mail inválido<p>";
        header("Location: cadevento.php");
      }
    }
    else {
      $_SESSION["msg"] =  "<p style='font-family: arial;
      text-align:center;
      background-color: #F8D7DA;
      padding: 10px 20px;
      border-radius: 4px;
      color: #932029;'>Você deve se cadastrar para se inscrever em eventos<p>";
      header("Location: cadevento.php");
    }
  }
  else {
    $_SESSION["msg"] =  "<p style='font-family: arial;
    text-align:center;
    background-color: #F8D7DA;
    padding: 10px 20px;
    border-radius: 4px;
    color: #932029;'>Você deve selecionar um evento<p>";
    header("Location: cadevento.php");
  }

?>