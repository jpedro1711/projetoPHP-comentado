<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrativo - Gerenciamento de mentores</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    * {
      font-family: 'Lato', sans-serif;
      padding: 0px;
      margin: 0px;
    }

    table thead td {
      border: 1px solid black;
    }
    table tbody td {
      border: 1px solid black;
      text-align: center;
    }
    .thead-tr {
      width: auto;
      text-align: center;
      font-weight: bold;
      height: 30px;
    }
    .thead-tr-desc {
      width: auto;
      text-align: center;
      font-weight: bold;
      height: 30px;
    }
    .flex-container {
      display: flex;
      flex-direction: row;
      gap: 100px;
      margin-top: 20px;
      margin-left: 10px;
      margin-right: 10px;
      align-items: flex-start;
      justify-content: space-between;
    }
    main section table {
      margin: 0 auto;
    }
    header {
      background-color: #9D29B2;
      color: white;
      margin-bottom: 50px;
      padding: 30px;
      text-align: center;
    }

    header a {
      color: #CECECE;
      font-weight: bold;
    }
    main section form {
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px 60px;
      border-radius: 10px;
      background-color: #F3F3F3;
    }
    main section form input {
      margin-bottom: 3px;
      padding: 10px;
      border: none;
      border-bottom: 1px solid grey;
    }

    input:focus, select:focus {
        box-shadow: 0 0 0 0;
        border: 0 none;
        outline: 0;
    } 

    main section form textarea {
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 10px;
    }

    main section form h2 {
      margin-top: 10px;
      text-align: center;
      font-size: 20px;
      margin-bottom: 15px;
    }
    #btnCad {
      cursor: pointer;
      font-weight: 700;
      padding: 10px;
      background-color: #48A54C;
      color: white;
      border: transparent;
    }

    #btnExc {
      cursor: pointer;
      font-weight: 700;
      padding: 10px;
      background-color: #E8403B;
      color: white;
      border: transparent;
    }

    #btnEdit {
      cursor: pointer;
      font-weight: 700;
      padding: 10px;
      background-color: #09B4C8;
      color: white;
      border: transparent;
    }

    #tbMentores thead{
      background-color: #01987A;
      text-align: center;
      font-family: 'Lato', sans-serif;
      font-weight: bold;
      color: #fff;
    }

    #tbMentores {
      border-spacing: 0px;
    }
    #tbMentores thead td{
      border: none;
      padding: 15px;
    }

    #tbMentores tbody td{
      border: none;
      padding: 10px;
    }

    #tbMentores tbody tr:nth-child(odd) {
      background-color: #F3F3F3;
    }

    .borderTB {
      border-radius: 10px 0px 0px 0px;
    }

    .borderTB1 {
      border-radius: 0px 10px 0px 0px;
    }

    #tbCursos thead{
      background-color: #104A60;
      text-align: center;
      font-family: 'Lato', sans-serif;
      font-weight: bold;
      color: #fff;
    }

    #tbCursos-Title {
      margin-top: 50px;
    }
    #tbCursos {
      border-spacing: 0px;
    }
    #tbCursos thead td{
      border: none;
      padding: 15px;
    }
    #tbCursos tbody td{
      border: none;
      padding: 10px;
    }

    #tbCursos tbody tr:nth-child(odd) {
      background-color: #F3F3F3;
    }
  </style>
</head>
<body>
  <header>
    <h1>Gerencia de mentores</h1>
    <a href="./index.php">Voltar para a tela principal</a>
  </header>

  <main>
  <section>
      <table id="tbMentores">
        <h3 style="text-align: center;">Mentores</h3>
        <thead>
          <td class="thead-tr borderTB">ID</td>
          <td class="thead-tr">Nome</td>
          <td class="thead-tr-desc">Descrição</td>
          <td class="thead-tr">e-mail</td>
          <td class="thead-tr borderTB1">Código do curso</td>
        </thead>
        <tbody>
            <?php
            // Lendo todos os mentores cadastrados no banco de dados
              include 'connection.php';
              $sql = "SELECT * FROM mentores";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // Pegando os dados da linha correspondente a cada mentor
                while($row = $result->fetch_assoc()) {
                  $id = $row['id'];
                  $nome = $row['nome'];
                  $desc = $row['descricao'];
                  $email = $row['email'];
                  $cod_curso = $row['cod_curso'];
                  echo "<tr>
                          <td>$id</td>
                          <td>$nome</td>
                          <td>$desc</td>
                          <td>$email</td>
                          <td>$cod_curso</td>
                        </tr>";
                }
              }
              else {
                $result = "Nenhum resultado";
                echo "<tr>
                          <td>$result</td>
                          <td>$result</td>
                          <td>$result</td>
                          <td>$result</td>
                          <td>$result</td>
                      </tr>";
              }
              $conn->close();
            ?>
        </tbody>
      </table>
    </section>
    <section>
    <h3 style="text-align: center;" id='tbCursos-Title'>Cursos</h3>
      <table id='tbCursos'>
        <thead>
          <td class="thead-tr borderTB">Código do curso</td>
          <td class="thead-tr borderTB1">Nome</td>
        </thead>
        <tbody>
        <tbody>
            <?php
            // Lendo os cursos cadastrados no banco de dados
              include 'connection.php';
              $sql = "SELECT * FROM cursos";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // Lendo os dados correspondentes a cada linha de cada curso cadastrado
                while($row = $result->fetch_assoc()) {
                  $id = $row['id'];
                  $nome = $row['nome'];
                  echo "<tr>
                          <td>$id</td>
                          <td>$nome</td>
                        </tr>";
                }
              }
              else {
                echo "0 results";
              }
              $conn->close();
            ?>
        </tbody>
        </tbody>
      </table>
    </section>
    <br>
    <hr>
    <div class="flex-container">
    <section>
      <form action="./exclui_mentor.php" method="post" id="formExc" onsubmit="return validaExc();">
        <h2>Apagar mentor</h2><br>
        <label for="exc_mentor_id">Insira o id do mentor que você que apagar</label><br>
        <input type="number" name="exc_mentor_id" id="exc_mentor_id" placeholder="id do mentor"><br><br>
        <button type="submit" id="btnExc">Apagar Mentor</button><br>
        <br>
        <?php
          if (isset($_SESSION["msg_exc_mentor"])){
            echo $_SESSION["msg_exc_mentor"];
            unset ($_SESSION["msg_exc_mentor"]);
          }
        ?>
      </form>
      </section>
      <section>
        <form action="./cadastra_mentor.php" method="post" id="formCad" onsubmit="return mentCad();">
          <h2>Cadastrar mentor</h2>
          <label for="cad_mentor_nome">Nome do mentor: </label><br>
          <input type="text" name="cad_mentor_nome" id="cad_mentor_nome"><br>
          <label for="cad_mentor_email">E-mail do mentor: </label><br>
          <input type="text" name="cad_mentor_email" id="cad_mentor_email"><br>
          <label for="cod_curso">Código do curso: </label><br>
          <input type="number" name="cod_curso" id="cod_curso"><br>
          <label for="mentor_desc">Descrição do mentor: </label><br>
          <textarea name="mentor_desc" id="mentor_desc" cols="30" rows="10"></textarea><br>
          <button type="submit" id="btnCad">Cadastrar Mentor</button>
          <br>
          <?php
            if (isset($_SESSION["msg_cad"])){
              echo $_SESSION["msg_cad"];
              unset ($_SESSION["msg_cad"]);
            }
          ?>
        </form>
      </section>
      <section>
        <form action="./update_met.php" method="post" id="formUpd" onsubmit="return validaUpd();">
          <h2>Atualizar mentor</h2>
          <label for="id_mentor_upd">ID do mentor: </label><br>
          <input type="number" name="id_mentor_upd" id="id_mentor_upd"><br>
          <label for="upd_nome">Novo nome do mentor (Se não quiser mudar, colocar nome atual): </label><br>
          <input type="text" name="upd_nome" id="upd_nome"><br>
          <label for="updt_email">Novo e-mail do mentor (Se não quiser mudar, colocar e-mail atual): </label><br>
          <input type="text" name="updt_email" id="updt_email"><br>
          <label for="cod_curso_up">Novo código do curso (Se não quiser mudar, colocar código atual): </label><br>
          <input type="number" name="cod_curso_up" id="cod_curso_up"><br>
          <label for="updt_desc">Nova descrição do mentor (Se não quiser mudar, colocar descrição atual): </label><br>
          <textarea name="updt_desc" id="updt_desc" cols="30" rows="10"></textarea><br>
          <button type="submit" id="btnEdit">Atualizar Mentor</button>
          <br>
          <?php
            if (isset($_SESSION["msg_upd"])){
              echo $_SESSION["msg_upd"];
              unset ($_SESSION["msg_upd"]);
            }
          ?>
        </form>
      </section>
    </div>
  </main>
  <script>
    // Validação de formulários
    function validaExc() {
      const formExc = document.getElementById('formExc')
      const id = document.getElementById('exc_mentor_id');

      if (id.value === "") {
        alert("Para excluir um mentor, você deve selecionar um id")
        id.focus();
        return false
      }
      return true
    }

    function mentCad() {
      const formCad = document.getElementById('formCad');
      const name = document.getElementById('cad_mentor_nome')
      const email = document.getElementById('cad_mentor_email')
      const cod_curso = document.getElementById('cod_curso')
      const desc = document.getElementById('mentor_desc')

      if (name.value == "" || email.value == "" || desc.value == "" || cod_curso.value == "") {
        alert("Preencha todos os campos")
        formCad.focus();
        return false
      }
      return true
    }

    function validaUpd() {
      const formUpd =  document.getElementById('formUpd');
      const id =  document.getElementById('id_mentor_upd');
      const nome =  document.getElementById('upd_nome');
      const email =  document.getElementById('updt_email');
      const curso =  document.getElementById('cod_curso_up');
      const desc =  document.getElementById('updt_desc');

      if (id.value == "" || nome.value == "" || email.value == "" || curso.value == "" || desc.value == "") {
        alert("Preencha todos os campos")
        formUpd.focus();
        return false
      }
      return true
    }
  </script>
</body>
</html>