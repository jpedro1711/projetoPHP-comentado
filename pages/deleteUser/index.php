<?php
// Página de deletar usuário
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
  font-family: 'Roboto', sans-serif;
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

.footer {
bottom: 0;
left: 0;
width: 100%;
background-color: #00b4d8;
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

.section {
  flex: 1 0 auto;
  height: auto;
}

.section .flex-container {
  height: 400px;
  width: 80%;
  margin: 0 auto;
  margin-top: 100px;
  display: flex;
  margin-bottom: 100px;
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
  max-width: 70%;
  margin: 0 auto;
  margin-top: 1.25rem;
}
form p {
  font-family: 'Roboto', sans-serif;
}
.input-field {
  display: flex;
  align-items: center;
  justify-content: center;
}
.btnGroup {
  display: flex;
  justify-content: flex-end;
}
.mostrar-senha:hover {
  cursor: pointer;
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
    </header>
    <form method="post" action="./delete.php">
      <p class="h1 text-start mb-5">Apagar Usuário</p>
      <div class="row mb-3 input-field">
        <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label><br><br>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail" autocomplete="off" name="email">
        </div>
      </div>
      <div class="row mb-3 input-field mb-5">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputSenhaAtual" autocomplete="off" name="senha">
          <div class="password-show">
            Mostrar a senha <input type="checkbox" onclick="passwordVisibility()" class="mostrar-senha">
        </div>
        </div>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-danger">Apagar usuário</button>
      </div>
      <br>
      <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset ($_SESSION['msg']);
        }
      ?>
    </form>

  <!--BOOTSTRAP SCRIPTS-->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"
></script>
<script>
  function passwordVisibility() {
  var x = document.getElementById("inputSenhaAtual");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>