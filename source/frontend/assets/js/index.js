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


 /*$(document).ready(function(){
  })*/

/*   $("#registrar").click(function (e) { */
  
/* const formulario = document.getElementById("registrar");

formulario.addEventListener("submit", (e) => { */
$("#registrar").click(function (event) {
    event.preventDefault(); // evita que el formulario se envíe de forma convencional
   
/*      if (!validarFormulario()) {
      return ;
  } */
 
    let form = new FormData(registerform);
    let clearForm=document.getElementById("registerform");
    let opc = {
        method: 'POST',            
        body: form
    };       
    fetch('../../../backend/model/Procesar.php',opc)
      .then(res => res.text())
	console.log(res)
      .then(function(data) {
        console.log(data);
        /* if (data === 'usuario_existente') {
          alert("El usuario ya existe. Por favor, inicia sesión.");
          clearForm.reset();
          window.location.href='login.php';
        } else {
          clearForm.reset();
          window.location.href='paginas/panel.php';
        } */
      });
  });

/* $(document).ready(function() {
	$('#registerform').on('submit', function(event) {
	  event.preventDefault();
	  
	  // Obtener los datos del formulario
	  var formData = $(this).serialize();
	  
	  // Enviar los datos del formulario al servidor usando AJAX
	  $.ajax({
		url: '../../../backend/model/Procesar.php',
		type: 'POST',
		data: formData,
		success: function(response) {
		  // Manejar la respuesta del servidor aquí
		  console.log(response);
		  alert('¡Registro exitoso!');
		},
		error: function(jqXHR, textStatus, errorThrown) {
		  // Manejar el error aquí
		  console.error(errorThrown);
		  alert('Ocurrió un error al procesar el registro');
		}
	  });
	});
  }); */