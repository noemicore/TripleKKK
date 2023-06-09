const form = document.querySelector('#login');
form.addEventListener('submit', function(event) {

  event.preventDefault(); // prevenir el envío del formulario

  const code = document.querySelector('#usser_name').value;
  const password = document.querySelector('#password').value;

  if (code === '' || password === '') {
    swal({
      title: "DATOS VACIOS!",
      text: "Por favor ingrese todos los datos",
      icon: "warning",
      button: "Entendido!"
    });
  } else {
    // formulario válido, puedes enviar los datos
    form.submit();
  }
});