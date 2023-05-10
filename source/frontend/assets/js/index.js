const loginContainer = document.querySelector("#login-container");
const registerContainer = document.querySelector("#register-container");
const registerLink = document.querySelector("#register-link");
const loginLink = document.querySelector("#login-link");
let modalBody = document.getElementById("modalBody");

onload = () =>{
  modalBody.style.display="none";
}

registerLink.addEventListener("click", () => {
    modalBody.style.display="block";
    loginContainer.style.display = "none";
    registerContainer.style.display = "block";
  });
  
  loginLink.addEventListener("click", () => {
    modalBody.style.display="block";
    registerContainer.style.display = "none";
    loginContainer.style.display = "block";
  });


  $("#registrar").click(function (event) {
    event.preventDefault(); // evita que el formulario se envíe de forma convencional
    let form = new FormData(registerform);
    let clearForm=document.getElementById("registerform");
    let opc = {
      method: 'POST',            
      body: form
    };       
    fetch('http://localhost/Servicio-Peluqueria/source/backend/model/Procesar.php',opc)
      .then(res => res.text())
      .then(function(data) {
        if (data === 'usuario_existente') {
          alert("El usuario ya existe. Por favor, inicia sesión.");
          clearForm.reset();
          window.location.href='http://localhost/Servicio-Peluqueria/source/frontend/index.php';
        }else{
          clearForm.reset();
          window.location.href='http://localhost/Servicio-Peluqueria/source/frontend/Producto.php';
        }
      });
  });
