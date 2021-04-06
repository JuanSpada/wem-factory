const form = document.querySelector("#contact-form");

const validator = () => {
  let validated;
  const name = document.querySelector("#form_name");
  const email = document.querySelector("#form_email");
  const phone = document.querySelector("#form_phone");
  const message = document.querySelector("#form_message");

  // terminar de hacer el validate
  if(name.value == '' || email.value == '' || phone.value == ''){
    validated = false;
  }else{
    validated = true;
  }
}

form.addEventListener("submit", function (event) {
  event.preventDefault();
  let formData = new FormData(form);
  form.reset();
  fetch("contact.php", {
    body: formData,
    method: "POST",
  });
  swal({
    title: "¡Muchas Gracias!",
    text: "Tu consulta fue recibida con éxito",
    icon: "success",
    button: "Salir",
  });
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
  'event': 'Lead'
  });
});