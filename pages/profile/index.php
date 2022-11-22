<?php
// Página de redefinição de senha do usuário
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <!--CSS BOOTSTRAP-->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
  crossorigin="anonymous"
/>

<style>
  * {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

.container {
  display: flex;
  flex-direction: column;
}

.header {
  color: black;
  background-color: var(--white-color);
  padding: 30px 0px;
  padding-bottom: 12px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  border-bottom: 2px solid #0061FE;
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

.section {
  flex: 1 0 auto;
  height: 600px;
}

.section .flex-container {
  height: 400px;
  width: 80%;
  margin: 0 auto;
  margin-top: 100px;
  display: flex;
  margin-bottom: 100px;
}

.img-content {
  width: 100%;
  height: auto;
  background-image: url("https://storage.googleapis.com/twg-content/original_images/TwG-4011-01-Thumbnail.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.txt-content {
  font-family: Arial;
  width: 100%;
  height: auto;
  background-color: rgb(255, 255, 255);
  display: grid;
  align-items: center;
  padding: 20px;
}

.btn-content {
  color: #fff;
  text-decoration: none;
  background-color: #0096c7;
  padding: 10px 15px;
  border-radius: 4px;
  margin: 0px 5px;
  font-size: 20px;
  transition: 0.5s;
}

.btn-content:hover {
  background-color: #caf0f8;
  color: #03045e;
  cursor: pointer;
}

.flex-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.mentores {
  display: flex;
  max-width: 800px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
  padding: 10px;
  margin: 10px;
  font-family: Arial, Helvetica, sans-serif;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px;
}

.card-container {
  padding: 2px 16px;
}

.card-container h4 {
  margin-top: 10px;
  margin-bottom: 5px;
}
form {
  padding: 50px;
  border-radius: 4px;
  background-color: #F7F5F2;
  width: 70%;
  margin: 0 auto;
  margin-top: 1.25rem;
}
.input-field {
  display: flex;
  align-items: center;
  justify-content: center;
}
.btnGroup {
  display: flex;
  justify-content: space-between;
}
.header {
  display: flex;
  justify-content: space-between;
}
.header a {
  margin-right: 20px;
}
</style>
</head>
<body>

    <header class="header">
      <div>
        <p class="logo">
          <a href="../../index.php" title="Voltar">StepUP</a>
        </p>
      </div>
      <a class="btn btn-outline-primary" href="../info/index.php">Visualizar suas informações</a>
    </header>
    <section class="section">
      <form method="post" action="./newpass_php.php">
        <p class="h1">Redefinir senha</p>
        <div class="row mb-3 input-field">
          <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" autocomplete="off" name="email">
          </div>
        </div>
        <div class="row mb-3 input-field">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Senha Atual</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputSenhaAtual" autocomplete="off" name="senha">
          </div>
        </div>
        <div class="row mb-3 input-field">
          <label for="inputPassword2" class="col-sm-2 col-form-label">Nova Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword2" autocomplete="off" name="novaSenha">
          </div>
        </div>
        <div class="row mb-3 input-field">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Confirme a nova senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" autocomplete="off" name="confNovaSenha">
          </div>
        </div>
        <div class="btnGroup">
          <button type="submit" class="btn btn-primary" onclick="registerFormOnSubmit()">Redefinir senha</button>
          <a type="button" class="btn btn-outline-danger" href='../../pages/deleteUser/delete.php'>Apagar usuário</a>
        </div>
        <br>
        <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
          }
        ?>
      </form>
    </section>

  <!--BOOTSTRAP SCRIPTS-->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"
></script>
<script src="./script.js"></script>
</body>
</html>