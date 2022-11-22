<?php
  // Página principal
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StepUP - Página inicial</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
    :root {
      --primary-color: #00b4d8;
      --txt-dark-color: #08090a;
      --btn-bg-color-hover: #caf0f8;
      --btn-txt-color-hover: #03045e;
      --white-color: #fff;
    }
    .logo a {
      font-size: 30px;
      font-family: 'Roboto', sans-serif;
      color: var(--white-color);
      text-decoration: none;
      border: 2px solid transparent;
      transition: 0.5s;
    }

    .logo a:hover {
      border-bottom: 2px solid var(--white-color);;
    }
    .footer-links {
      text-decoration: none;
      font-family: 'Roboto', sans-serif;
      color: var(--white-color);;
      transition: 0.5s;
      border: 1px solid transparent;
    }
    .footer-links:hover {
      border-bottom: 1px solid var(--white-color);;
    }
    #login-btn {
      background-color: var(--white-color);;
      padding: 15px 20px;
      color: var(--btn-txt-color-hover);
    }
    #login-btn:hover{
      border-radius: 4px;
      background-color: #F7F5F2;
      color: var(--btn-txt-color-hover);
    }
    .section {
      background-color: #F7F5F2;
    }
    .header {
      background-color: #fff;
    }
    * {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

:root {
  --primary-color: #0061FE;
  --txt-dark-color: #08090a;
  --btn-bg-color-hover: #caf0f8;
  --btn-txt-color-hover: #03045e;
  --white-color: #fff;
}

body {
  display: flex;
  flex-direction: column;
}

.container {
  display: flex;
  flex-direction: column;
}

.header {
  color: black;
  background-color: var(--white-color);
  padding: 30px 0px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  -webkit-box-shadow: 0px 7px 5px 0px rgba(50, 50, 50, 0.75);
  -moz-box-shadow:    0px 7px 5px 0px rgba(50, 50, 50, 0.75);
  box-shadow:         0px 7px 5px 0px rgba(50, 50, 50, 0.75);
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

.logo a {
  background-color: #0061FE;
  font-size: 30px;
  font-family: 'Roboto', sans-serif;
  color: #fff;
  padding: 36px;
  text-decoration: none;
  border: 2px solid transparent;
  transition: 0.5s;
}

.logo a:hover {
  border-bottom: 2px solid #fff;
}

.section {
  min-height: 100%;
  margin-bottom: -60px;
}

.section .grid-container {
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
  font-family: 'Roboto', sans-serif;
  width: 100%;
  height: auto;
  background-color: rgb(255, 255, 255);
  display: grid;
  align-items: center;
  padding: 20px;
}

.btn-content {
  /*color: var(--white-color);*/
  font-size: 50px;
  text-decoration: none;
  background-color: var(--primary-color);
  padding: 10px 15px;
  border-radius: 4px;
  margin: 0px 5px;
  font-size: 20px;
  transition: 0.5s;
  color: white;
}

.btn-content:hover {
  background-color: #3D87FF;
  color: white;
  cursor: pointer;
}

/*DROPDOWN MENU*/

body {
  font-family: 'Roboto', sans-serif;
}

.navbar {
  overflow: hidden;
  display: flex;
  gap: 20px;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.navbar a {
  float: left;
  font-size: 16px;
  margin: 0px 15px;
  color: #22272E;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.5s;
  font-weight: 700;
  border-radius: 4px;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: #22272E;
  padding: 6px 12px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  transition: 0.5s;
  font-weight: 700;
  border-radius: 4px;
}

.navbar a:hover,
.dropdown:hover {
  border-radius: 4px;
  background-color: #F7F5F2;
  color: var(--btn-txt-color-hover);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: var(--white-color);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropbtn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
  cursor: pointer;
}

.dropbtn-icon {
  max-width: 30%;
}

#regBtn {
  background-color: #0061FE;
  color: white;
  transition: 0.5s;
}
.reg-content a{
  display: flex;
  align-items: center;
  justify-content: center;
}

#regBtn:hover {
  background-color: #3D87FF;
}

#arrow {
  width: 20%;
}

#regBtnImg {
  width: 15%;
  margin-left: 5px;
}

  </style>
  <body>
    <div class="container">
      <span id="backToTop"></span>
      <header class="header">
        <div>
          <p class="logo" title="voltar"><a href="">StepUP</a></p>
        </div>
        <div class="navbar">
          <a href="./pages/cursos/index.php" title="Cursos">Cursos</a>
          <a href="./pages/mentores/index.php" title="Mentores">Mentores</a>
          <a href="./pages/login/login.php" title="Cadastre-se" id="login-btn"
            >Login</a
          >
          <div class="reg-content">
            <a href="./pages/cadastro/cadastro.php" title="Cadastre-se" id="regBtn"
              >Cadastre-se<span class="material-symbols-outlined">arrow_right_alt</span></a>
          </div>
        </div>
        <?php
            if (isset($_SESSION["sucessufly-loged"])){
              echo $_SESSION["sucessufly-loged"];
              unset ($_SESSION["sucessufly-loged"]);
            }
        ?>
      </header>

      <section class="section">
        <div class="grid-container">
          <div class="img-content"></div>
          <div class="txt-content">
            <h1>Próximo evento:</h1>
            <h2>Acessibilidade na web</h2>
            <h3>Data: 12/10/2022</h3>
            <div class="btn-register">
              <a
                href="./pages/cadastro-evento/cadevento.php"
                class="btn-content"
                title="Inscrever-se"
                >Inscrever-se</a
              >
            </div>
          </div>
        </div>
      </section>

      <footer class="footer">
        <a href="#backToTop" class="footer-links" title="voltar ao ínicio"
          >Voltar ao ínicio</a
        >
      </footer>
    </div>
  </body>
</html>
