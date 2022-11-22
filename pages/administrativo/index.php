<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrativo</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    * {
      font-family: 'Lato', sans-serif;
      padding: 0px;
      margin: 0px;
    }
    .flex_container {
      display: flex;
      gap: 100px;
      justify-content: center;
      margin: 0 auto;
    }

    .flex_container2 {
      margin-top: 50px;
      display: flex;
      gap: 50px;
      justify-content: center;
      margin-left: 0 auto;
    }

    header {
      background-color: #9D29B2;
      color: white;
      margin-bottom: 50px;
      padding: 30px;
      text-align: center;
    }

    header h1 {
      text-align: center;
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

    #course_link {
      width: 100%;
    }

    #course_name {
      width: 100%;
    }

    .form {
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px 60px;
      border-radius: 10px;
      background-color: #F3F3F3;
    }

    .form h1 {
      margin-top: 10px;
      text-align: center;
      font-size: 20px;
      margin-bottom: 5px;
    }

    .form input {
      margin-bottom: 3px;
      padding: 10px;
      border: none;
      border-bottom: 1px solid grey;
    }

    .form label {
      margin-bottom: 0px;
      margin-top: 5px;
    }

    input:focus, select:focus {
        box-shadow: 0 0 0 0;
        border: 0 none;
        outline: 0;
    } 
    .form textarea {
      margin-bottom: 10px;
      border-radius: 10px;
      padding: 10px;
    }
    header a {
      color: #CECECE;
      font-weight: bold;
    }

    main section table {
      margin: 0 auto;
      margin-bottom: 50px;
    }
    #coursesTable{
      border-spacing: 0px;
    }

    #coursesTable thead td{
      margin: 0px;
    }

    #coursesTable thead td{
      background-color: #01987A;
      padding: 10px 15px;
      text-align: center;
      font-family: 'Lato', sans-serif;
      font-weight: bold;
      color: #fff;
    }

    #coursesTable tbody tr td{
      padding: 10px 15px;
      text-align: center;
    }
    #coursesTable tbody tr td{
      border-collapse: collapse;
    }

    #coursesTable tbody tr:nth-child(odd) {
      background-color: #F3F3F3;
    }
    .borderTB {
      border-radius: 10px 0px 0px 0px;
    }

    .borderTB1 {
      border-radius: 0px 10px 0px 0px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Dashboard Administrativo StepUp</h1>
    <a href="./mentores.php">Gerenciar mentores</a>
  </header>
  <main>
  <section>
      <table id='coursesTable'>
        <h3 style="text-align: center;">Cursos</h3>
        <thead>
          <td class="thead-tr borderTB">Código do curso</td>
          <td class="thead-tr borderTB1">Nome</td>
        </thead>
        <tbody>
            <?php
            // Mostrando em forma de tabela todos os cursos cadastrados no banco de dados
              include 'connection.php';
              $sql = "SELECT * FROM cursos";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // Pegando os dados da linha correspondente de cada curso
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
      </table>
    </section>
  </main>
  <hr>
  <br>
  <div class="flex_container">
    <div>
      <form action="./adm.php" method="post" class="form" id="formCad" onsubmit="return cursoCad();">
        <h1>Cadastre um curso</h1>
        <label for="course_name">Nome do curso: </label><br>
        <input type="text" name="course_name" id="course_name">
        <br>
        <label for="course_link">Link do curso: </label><br>
        <input type="text" name="course_link" id="course_link" placeholder='<a class="link_curso" href="../../pages/pag_cursos/ADS/index.php">Análise e desenvolvimento de sistemas</a>'>
        <br>
        <label for="course_desc">Descrição do curso: </label><br>
        <textarea name="course_desc" id="course_desc" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" id="btnCad" value="cadastrar curso">
        <br>
        <?php
          if (isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            unset ($_SESSION["msg"]);
          }
        ?>
      </form>
    </div>
    <div>
      <form action="./exc.php" method="post" class="form" id='formExc' onsubmit="return validaExc();">
        <h1>Exclua um curso</h1>
        <label for="curso_id">ID do curso: </label><br>
        <input type="number" name="curso_id" id="curso_id">
        <br>
        <br>
        <input type="submit" id="btnExc" value="Excluir Curso">
        <br>
        <?php
          if (isset($_SESSION["msg_exc"])){
            echo $_SESSION["msg_exc"];
            unset ($_SESSION["msg_exc"]);
          }
        ?>
      </form>
    </div>
    <div>
      <form action="./update.php" method="post" class="form" id="formEd" onsubmit="return validaUpd();">
        <h1>Edite a descrição de um curso</h1>
        <label for="curso_id">ID do curso: </label><br>
        <input type="number" name="curso_id" id="curso_id_upd">
        <br>
        <label for="course_link">Novo link do curso: </label><br>
        <input name="course_link" id="course_link_upd" type="text"></input>
        <br>
        <label for="course_desc">Nova descrição do curso: </label><br>
        <textarea name="course_desc" id="course_desc_upd" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" id="btnEdit" value="Editar curso">
        <br>
        <?php
          if (isset($_SESSION["msg_update"])){
            echo $_SESSION["msg_update"];
            unset ($_SESSION["msg_update"]);
          }
        ?>
      </form>
    </div>
  </div>
  </div>
  <script>
    // Validação dos formulários com JS
    function validaExc() {
      const formExc = document.getElementById('formExc')
      const id = document.getElementById('curso_id');

      if (id.value === "") {
        alert("Para excluir um curso, você deve selecionar um id")
        id.focus();
        return false
      }
      return true
    }

    function cursoCad() {
      const formCad = document.getElementById('formCad');
      const name = document.getElementById('course_name')
      const link = document.getElementById('course_link')
      const desc = document.getElementById('course_desc')

      if (name.value == "" || link.value == "" || desc.value == "") {
        alert("Preencha todos os campos")
        formCad.focus();
        return false
      }
      return true
    }

    function validaUpd() {
      const formUpd =  document.getElementById('formEd');
      const id =  document.getElementById('curso_id_upd');
      const link =  document.getElementById('course_link_upd');
      const desc =  document.getElementById('course_desc_upd');

      if (id.value == "" || link.value == "" || desc.value == "") {
        alert("Preencha todos os campos")
        formUpd.focus();
        return false
      }
      return true
    }
  </script>
</body>
</html>