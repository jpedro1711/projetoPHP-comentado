<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <style>
    * {
    margin: 0px;
    padding: 0px;
    font-family: 'Roboto', sans-serif;
  }
  
  .container {
    display: flex;
    flex-direction: column;
  }
  
  .header {
    color: black;
    background-color: var(--white-color);
    padding: 34px 0px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
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

  
  .btn-link {
    color: white;
    text-decoration: none;
    background-color: white;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    margin: 0px 5px;
    font-size: 20px;
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
  .logo a:hover{
    border-bottom: 2px solid white;
  }
  .logo{
    border-bottom: 2px solid transparent;
  }
  .logo:hover{
    border-bottom: 2px solid white;
    
  }
  .txt-footer {
    color: #fff;
    text-decoration: none;
  }
  .txt-footer:hover {
    text-decoration: underline;
  }
  
  .footer-partners {
    color: #fff;
    text-decoration: none;
  }

  .footer-partners:hover{
    text-decoration: underline;
  }
  
  .section {
    flex: 1 0 auto;
    height: auto;
    padding: 50px;
    margin: 0px auto;
  }
  
  .container-content {
    height: auto;
    display: grid;
    justify-content: flex-start;
    grid-template-columns: 1fr 1fr;
    align-items: flex-start;
  }
  
  .form-register {
    display: grid;
    align-items: center;
    background-color: gainsboro;
    padding: 100px;
  }
  
  .input {
    padding: 5px;
    margin-bottom: 10px;
  }
  
  .btn-form-group {
    margin-top: 50px;
    display: flex;
    justify-content: space-around;
    gap: 10px;
  }
  
  .txt {
    font-family: Arial, Helvetica, sans-serif;
    line-height: 1.5;
    padding: 5px;
  }
  
  .img {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .card {
    max-width: 50%;
    display: grid;
    justify-content: flex-start;
    border: 2px solid transparent;
    padding: 20px;
    border-radius: 10px;
    transition: 0.5s;
  }
  
  .card:hover {
    border: 2px solid black;
  }
  
  .mentores {
    display: flex;
    justify-content: space-around;
    gap: 20px;
  }

  .section {
    background-color: #F7F5F2;
  }
</style>  
  <body>
    <div class="container">
      <span id="backToTop"></span>
      <header class="header">
        <div>
          <p class="logo">
            <a href="../../index.php" title="Voltar">StepUP</a>
          </p>
        </div>
      </header>

      <section class="section">
        <div class="flex-container">
          <div class="mentores">
          <?php
            // Lendo os dados da tabela mentores e exibindo em forma de tabela
            include 'connection.php';
            $sql = "SELECT * FROM mentores";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $nome = $row['nome'];
                $desc = $row['descricao'];
                $email = $row['email'];
                echo "<div class='card'>
                        <img src='./imgs/img_avatar.png' alt='Avatar' style='width:100%'>
                        <div class='card-container'>
                          <h4><b>$nome<b></h4>
                          <p>$desc</p>
                          <a href=mailto:$email>$email</a>
                        </div>
                      </div>";
              }
            }
            else {
              echo "0 results";
            }
            $conn->close();
          ?>
          </div>
        </div>
      </section>

      <footer class="footer">
        <a href="#backToTop" class="txt-footer" title="Voltar ao ínicio"
          >Voltar ao ínicio</a
        >
      </footer>
    </div>
  </body>
</html>
