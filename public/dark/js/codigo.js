document.getElementById("showPassword").addEventListener("click", function () {
    var passwordField = document.getElementById("pass");
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  });
  

  function cambiarTexto() {
    const boton = document.getElementById('showPassword');
    
    if (boton.innerHTML === 'Mostrar') {
      boton.innerHTML = 'Ocultar';
    } else {
      boton.innerHTML = 'Mostrar';
    }
}

