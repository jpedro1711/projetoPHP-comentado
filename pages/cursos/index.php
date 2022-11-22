<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cursos</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <style>
    * {
    margin: 0px;
    padding: 0px;
    font-family: 'Roboto', sans-serif;
  }
  .header {
    margin-bottom: 1px solid blue;
    padding: 36px 0px ;
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

  .logo a:hover {
    border-bottom: 2px solid #fff;
  }
  .section h1 {
    text-align: center;
    margin-bottom: 50px;
  }
  .section_container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .section_container ul {
    width: 400px;
  }
  .link_curso {
    background-color: transparent;
    padding: 10px;
    border-radius: 1px;
    text-decoration: none;
    font-weight: bold;
    color: black;
    border: 1px solid transparent;
    transition: 0.5s;
  }
  .link_curso:hover {
    border-bottom: 1px solid black;
  }
  .li_courses {
    margin-bottom: 30px;
  }
  .li_courses a {
    background-color: transparent;
    padding: 10px;
    border-radius: 1px;
    text-decoration: none;
    font-weight: bold;
    color: black;
    border: 1px solid transparent;
    transition: 0.5s;
  }
  .li_courses a:hover {
    border-bottom: 1px solid black;
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
        <h1>Saiba mais sobre os cursos</h1>
        <div class="section_container">
          <ul>
            <?php
            // Lendo os dados da tabela curso e mostrando o link para a página de cada um 
              include 'connection.php';
              $sql = "SELECT nome,link FROM cursos";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $link = $row['link'];
                  echo "<li class='li_courses'>$link</li>";
                }
              }
              else {
                echo "0 results";
              }
              $conn->close();
            ?>
          </ul>
        </div>
      </section>
    </div>
  </body>
</html>
