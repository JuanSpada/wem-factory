const form = document.querySelector("#contact-form");

const validateHandler = () => {
  const name = document.querySelector("#form_name");
  const email = document.querySelector("#form_email");
  const phone = document.querySelector("#form_phone");
  const message = document.querySelector("#form_message");
  validator(name);
  validator(email);
  validator(phone);
  validator(message);
  if(validator(name) && validator(email) && validator(phone) && validator(message)){
    validated = true;
  }else{
    validated = false;
  }
  return validated;
} 

const validator = (value) => {
  let validated;
  if(value.value == ''){
    value.nextElementSibling.style.display = "block";
    validated = false;
  }else{
    value.nextElementSibling.style.display = "none";
    validated = true;
  }
  return validated;
}

form.addEventListener("submit", function (event) {
  event.preventDefault();
  if (validateHandler()){
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
  }
});