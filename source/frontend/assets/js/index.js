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