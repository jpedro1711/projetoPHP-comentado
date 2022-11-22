function passwordVisibility() {
  var x = document.getElementById("senha");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function validaEmail(email) {
  const re = /^[a-z]\w*@\w{4}.*\.\w{2,4}$/;
  return re.test(email);
}

function passwordValidation(password) {
  const re = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/;
  return re.test(password);
}

function registerFormOnSubmit() {
  const form1 = document.getElementById("form-register1");
  const name = document.getElementById("nome");
  const email = document.getElementById("email");
  const password = document.getElementById("senha");
  const profession = form1.profession;
  const schooling = form1.schooling;

  if (name.value.length < 5) {
    alert("Preencha seu nome corretamente!");
    name.value = "";
    name.focus();
    return false;
  }
  if (!validaEmail(email.value)) {
    alert("Insira seu e-mail corretamente");
    email.value = "";
    email.focus();
    return false;
  }
  if (!passwordValidation(password.value)) {
    alert(
      "A senha deve contér:\n - pelo menos 1 letra maiúscula\n - 1 letra minúscula, \n - 1 número, \n - 1 caractere especial \n - pelo menos 8 caracteres de comprimento!"
    );
    password.value = "";
    password.focus();
    return false;
  }
  if (schooling.value == "") {
    alert("Por favor, escolha uma opção de escolaridade!");
    schooling.focus();
    return false;
  }
  if (profession.value == "") {
    alert("Por favor, escolha uma opção de escolaridade!");
    profession.focus();
    return false;
  }

  return true;
}
