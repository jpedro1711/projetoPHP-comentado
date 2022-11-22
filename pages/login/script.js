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

function loginFormOnSubmit() {
  let form1 = document.getElementById("form-register1");
  let email = document.getElementById("email");
  let password = document.getElementById("senha");

  if (!validaEmail(email.value)) {
    alert("Insira seu e-mail corretamente");
    email.value = "";
    email.focus();
    return false;
  } else if (!passwordValidation(password.value)) {
    alert(
      "A senha deve contér:\n - pelo menos 1 letra maiúscula\n - 1 letra minúscula, \n - 1 número, \n - 1 caractere especial \n - pelo menos 8 caracteres de comprimento!"
    );
    password.value = "";
    password.focus();
  } else {
    form1.submit();
  }
}
