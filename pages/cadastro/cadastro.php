<?php
  // Página de cadastro do usuário
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./cadastro.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
      *{
        font-family: 'Roboto', sans-serif;
      }
      span {
        font-family: 'Roboto', sans-serif;
      }
      .section {
        margin-top: 0px;
      }
      .header {
        color: black;
        background-color: var(--white-color);
        padding: 34px 0px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #0061FE;
      }
      .footer {
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: black;
        padding: 30px;
        display: flex;
        justify-content: space-around;
        align-items: center;
      }

      .logo a {
        background-color: #0061FE;
        font-size: 30px;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        padding: 34px;
        text-decoration: none;
        border: 2px solid transparent;
        transition: 0.5s;
      }

      .logo a:hover {
        border-bottom: 2px solid #fff;
      }
      .txt-footer {
        font-family: 'Roboto', sans-serif;
        color: #fff;
        text-decoration: none;
      }
      .txt-footer:hover{
        text-decoration: underline;
      }
      .footer-partners:hover{
        text-decoration: underline;
      }
      
      .footer-partners {
        font-family: 'Roboto', sans-serif;
        color: #fff;
        text-decoration: none;
      }

      .form-title{
        color: #22272E;
        font-weight: 400;
        margin-bottom: 20px;
      }
      #btn-submit {
        background-color: #0D88EB;
        transition: 0.5s;
        font-weight: 400;
      }
      #btn-submit:hover {
        background-color: #0061FE;
        font-weight: 400;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <span id="backToTop"></span>
      <header class="header">
        <p class="logo"><a href="../../index.php" title="Voltar">StepUP</a></p>
      </header>,
      <section class="section">
        <?php
          if (isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            unset ($_SESSION["msg"]);
          }
        ?>
        <div class="container">
          <!-- No envio do formulário, iremos tentar realizar o cadastro no banco de dados-->
          <form class="form-register" id="form-register1" action="./verifica_cadastro.php" method="post">
            <p class="form-title">CADASTRO</p>
            <label for="nome" class="input-label">Nome: </label>
            <input type="text" class="input" name="nome" id="nome" required autocomplete="off">

            <label for="senha" class="input-label">Senha: </label>
            <input type="password" class="input" name="senha" id="senha" required autocomplete="off">
            <div class="password-show">
              Mostrar a senha <input type="checkbox" onclick="passwordVisibility()" class="mostrar-senha">
            </div>

            <label for="email" class="input-label">E-mail: </label>
            <input type="email" class="input" name="email" id="email" required>
            
            <div class="radio-container">
              <label class="input-label">Selecione sua profissão:</label><br>
              <input type="radio" id="student" name="profession" value="01" class="input-radio">
              <label for="student">Estudante</label><br>
              <input type="radio" id="unemployed" name="profession" value="02" class="input-radio">
              <label for="unemployed">Desempregado</label><br>
              <input type="radio" id="teacher" name="profession" value="03" class="input-radio">
              <label for="teacher">Professor</label><br>
              <input type="radio" id="another" name="profession" value="04" class="input-radio">
              <label for="another">Outra</label>
            </div>
            <br>
            <div class="radio-container">
              <label class="input-label">Selecione sua escolaridade:</label><br>
              <input type="radio" id="emi" name="schooling" value="01" class="input-radio">
              <label for="emi">Ensino médio incompleto</label><br>
              <input type="radio" id="unemp" name="schooling" value="02" class="input-radio">
              <label for="unemp">Ensino médio completo</label><br>
              <input type="radio" id="teach" name="schooling" value="03" class="input-radio">
              <label for="teach">Ensino superior incompleto</label><br>
              <input type="radio" id="other" name="schooling" value="04" class="input-radio">
              <label for="other">Ensino superior completo</label>
            </div>

            <div class="btn-form-group">
              <input type="submit" id="btn-submit" value="Finalizar cadastro" title="Finalizar Cadastro" onclick="registerFormOnSubmit()" onkeypress="registerFormOnSubmit()">
              <!-- <input type="reset" id="btn-clear" value="limpar"> -->
            </div>
            
            <a href="../login/login.php" id="link-login" title="Realizar Login" class="loginLink">Já se cadastrou? <span>Realize Login</span></a>

          </form> 
        </div>
      </section>
      <br>
      <footer class="footer">
        <a href="" class="footer-partners" title="Parceiros">Parceiros</a>
        <a href="#backToTop" class="txt-footer" title="Voltar ao ínicio">Voltar ao ínicio</a>
      </footer>
    </div>
    <script src="./script.js"></script>
  </body>
</html>
