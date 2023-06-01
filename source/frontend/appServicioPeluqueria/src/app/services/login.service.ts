import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {
  private apiUrl = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apiusuarios.php'; // Reemplaza esto con la URL de tu API

  constructor(private http: HttpClient) { }

  /**
   * Esta función envía una solicitud GET a un extremo de la API con parámetros de correo electrónico y
   * contraseña para autenticar a un usuario.
   * @param {string} email - Una cadena que representa la dirección de correo electrónico del usuario.
   * @param {string} password - El parámetro de contraseña es una cadena que representa la contraseña
   * del usuario.
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  login(email: string, password: string): Observable<any> {
    const headers = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    const options = { headers: headers };

    const body = {
      email: email,
      pass: password
    };

    return this.http.get<any>(`${this.apiUrl}?email=${email}&pass=${password}`, options);
  }
}
