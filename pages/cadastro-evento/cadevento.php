<?php
// Página de inscrição em evento
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./cadevento.css" />
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
        <div>
          <p class="logo"><a href="../../index.php">StepUP</a></p>
        </div>
      </header>

      <section class="section">
        <?php
          if (isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            unset ($_SESSION["msg"]);
          }
        ?>
        <div class="container">
          <!--Ao enviar o formulário, realizamos a validação na página cad_evento_valid.php-->
          <form class="form-register" id="form-event" method="post" action="./cad_evento_valid.php" >
            <p class="form-title">Inscrição no evento</p>

            
            <label for="email" class="input-label"></label>
            <input type="email" class="input" name="email" id="email" placeholder="E-mail" required autocomplete="off">


            <div class="radio-container">
              <label class="input-label">Selecione o evento que deseja se inscrever:</label><br>
              <input type="radio" name="evento" value="01" id="evento1" class="input-radio">
              <label for="evento1" class="event-input">Acessibilidade da web</label><br>
              <input type="radio" name="evento" id="evento2" value="02" class="input-radio">
              <label for="evento2" class="event-input">Carreiras em Tecnologia da informação</label><br>
            </div>

            <div class="btn-form-group">
              <input type="submit" id="btn-submit" value="Enviar Inscrição" onclick="eventoCadFormOnSubmit()" onkeypress="eventoCadFormOnSubmit()">
              <!-- <input type="reset" id="btn-clear" value="limpar"> -->
            </div>
          </form> 
        </div>
      </section>

      <footer class="footer">
        <a href="" class="footer-partners">Parceiros</a>
        <a href="#backToTop" class="txt-footer">Voltar ao ínicio</a>
      </footer>
    </div>
    <script src="./script.js"></script>
  </body>
</html>
