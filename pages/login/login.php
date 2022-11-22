<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./login.css">
    <title>Login</title>
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
      #passBtn:hover{
        background-color: #0061FE;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <span id="backToTop"></span>
      <header class="header" id="header">
        <div> 
          <p class="logo"><a href="../../index.php" title="Voltar">StepUP</a></p>
        </div>
      </header>

      <section class="section">
          <?php
            if (isset($_SESSION["msg"])){
              echo $_SESSION["msg"];
              unset ($_SESSION["msg"]);
            }
          ?>
          <form class="form-register" method="post" action="./verifica_login.php">
            <p class="form-title">LOGIN</p>
            <br>
            <label for="email" class="input-label"></label>
            <input type="email" class="input" name="email" id="email" placeholder="E-mail" required autocomplete="on">
            <br>
            
            <input type="password" class="input" name="senha" id="senha" placeholder="Senha" required autocomplete="on">
            <br>
            
            <div class="password-show">
              <label>Mostrar a senha</label>
              <input type="checkbox" onclick="passwordVisibility()" class="mostrar-senha" title="mostrar a senha">
            </div>

            <div class="btn-form-group">
              <input type="submit" id="btn-submit" value="Realizar Login" title="Realizar Login" onclick="//loginFormOnSubmit()" onkeypress="loginFormOnSubmit()">
              <!-- <input type="reset" id="btn-clear" value="limpar"> -->
            </div>
            <a href="../cadastro/cadastro.php" id="link-login" title="Realizar Cadastro">Ainda não se cadastrou? <span>Realizar Cadastro</span></a>
          </form> 
      </section>

      <footer class="footer">
        <a href="" class="footer-partners" title="Parceiros">Parceiros</a>
        <a href="#backToTop" class="txt-footer" title="Voltar ao ínicio">Voltar ao ínicio</a>
      </footer>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
