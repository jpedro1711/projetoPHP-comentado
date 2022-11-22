<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <style>
    * {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
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
    margin-left: 0px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    -webkit-box-shadow: 0px 4px 3px 0px rgba(50, 50, 50, 0.36);
    -moz-box-shadow:    0px 4px 3px 0px rgba(50, 50, 50, 0.36);
    box-shadow:         0px 4px 3px 0px rgba(50, 50, 50, 0.36);
  }

  .header-login {
    color: black;
    background-color: var(--primary-color);
    padding: 30px;
    display: flex;
    justify-content: space-around;
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
    padding: 35px;
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
  
  .footer-partners {
    color: #fff;
    text-decoration: none;
  }
  
  .section {
    flex: 1 0 auto;
    height: auto;
    padding: 50px;
    margin: 0px auto;
    margin-top: 100px;
    background-color: #F7F5F2;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  
  .container-content {
    height: auto;
    display: grid;
    justify-content: flex-start;
    grid-template-columns: 1fr;
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
    font-family: sans-serif;
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
    border: 2px solid black;
  }
  
  .mentores {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
  }
  .h2 {
    display: flex;
    justify-content: center;
  }
  #nameCourse {
    text-align: center;
  }
</style>  
  <body>
    <div class="container">
      <span id="backToTop"></span>
      <header class="header">
        <div>
          <p class="logo"><a href="../../../index.php">StepUP</a></p>
        </div>
        <div class="btn-group">
          <a href="../../../index.php" class="btn-link">Voltar</a>
      </header>

      <section class="section">
        <div class="container-content">
          <div class="txt">
            <?php
            // Realizando leitura das informações de cada curso
              include '../connection.php';
              $sql = "SELECT nome,link,descricao FROM cursos WHERE nome like 'Análise e desenvolvimento de sistemas'";
              $result = $conn->query($sql);
  
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $nome = $row['nome'];
                  // Exibindo informações de cada curso
                  echo "<h1 id='nameCourse'>$nome</h1><br>";
                  echo $row['descricao'] . "<br>";
                }
              }
              else {
                echo "0 results";
              }
              $conn->close();
            ?>
          </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="h2">
          <h2>Entre em contato com os mentores para saber se esse é o curso certo pra você</h2>
        </div>
        <br>
        <div class="mentores">
          <?php
          // Realizando leitura dos mentores cadastrados no curso
            include '../connection.php';
            $sql = "SELECT m.nome, m.descricao, m.email FROM mentores m
            INNER JOIN cursos c
            on m.cod_curso = c.id
            where c.nome = 'Análise e desenvolvimento de sistemas'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // Utilizamos o fetch array por conta da seleção ser no formato inner join
              while($row = $result->fetch_array()) {
                // retornamos os dados de cada mentor 
                $nome = $row['nome'];
                $desc = $row['descricao'];
                $email = $row['email'];
                echo "<div class='card'>
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
          <!-- <div class="card">
            <img src="./imgs/person_FILL0_wght400_GRAD0_opsz48.png" class="card-img">
            <h4><strong>Mentor Name 2</strong></h4>
            <p>Email:<a href=mailto:mentor@gmail.com> mentor@email.com</a></p>
            <p>Descrição: formado em Sistemas de informação pela UTFPR</p>
          </div>
        </div> -->
      </section>
    </div>
  </body>
</html>
