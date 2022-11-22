function validaEmail(email) {
  const re = /^[a-z]\w*@\w{4}.*\.\w{2,4}$/;
  return re.test(email);
}

function eventoCadFormOnSubmit() {
  const form1 = document.getElementById("form-event");
  const email = document.getElementById("email");
  const evento = form1.evento;

  if (!validaEmail(email.value)) {
    alert("Insira seu e-mail corretamente");
    email.value = "";
    email.focus();
    return false;
  }
  if (evento.value == "") {
    alert("Por favor, escolha um evento!");
    return false;
  }

  return true;
}
