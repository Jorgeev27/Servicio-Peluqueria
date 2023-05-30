import { Component } from '@angular/core';
import { LoginService } from 'src/app/services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  email!: string;
  password!: string;
  errorMessage!: string;

  constructor(private loginService: LoginService) { }

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
