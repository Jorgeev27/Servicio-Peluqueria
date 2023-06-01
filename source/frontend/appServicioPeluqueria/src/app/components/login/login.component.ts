import { Component } from '@angular/core';
import { LoginService } from 'src/app/services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
/* Estas son declaraciones de propiedades para la clase `LoginComponent`. Declaran tres propiedades:
`email`, `password` y `errorMessage`, todas las cuales son del tipo `string`. El signo de
exclamación después de cada nombre de propiedad indica que las propiedades no aceptan valores NULL,
lo que significa que no pueden ser NULL o indefinidas. */
  email!: string;
  password!: string;
  errorMessage!: string;

  constructor(private loginService: LoginService) { }

  /**
   * Esta función maneja el envío de credenciales de inicio de sesión, procesa la respuesta del
   * servidor en caso de éxito y muestra mensajes de error en caso de falla o campos incompletos.
   */
  onSubmit(): void {
    this.errorMessage = '';
    if (this.email && this.password) {
      this.loginService.login(this.email, this.password)
        .subscribe(
          response => {
            // Procesar la respuesta del servidor en caso de éxito
            console.log(response);
          },
          error => {
            // Procesar el error en caso de fallo
            if (error.status === 401) {
              this.errorMessage = 'Credenciales inválidas';
            } else {
              this.errorMessage = 'Error al iniciar sesión';
            }
          }
        );
    } else {
      this.errorMessage = 'Por favor, complete todos los campos';
    }
  }
}
