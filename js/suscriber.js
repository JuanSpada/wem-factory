const suscriberForm = document.querySelector("#suscriber-form");

suscriberForm.addEventListener("submit", function (event) {
    event.preventDefault();
    let formData = new FormData(suscriberForm);
    suscriberForm.reset();
    fetch("suscriber.php", {
        body: formData,
        method: "POST",
    });
    swal({
        title: "¡Muchas Gracias!",
        text: "Te has suscribido con éxito",
        icon: "success",
        button: "Salir",
    });
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
    'event': 'Suscriber'
    });
});