import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  private apiUrl = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apiusuarios.php'; // Reemplaza con la URL de tu API

  constructor(private http: HttpClient) { }

  /**
   * Esta función envía una solicitud POST a un extremo de la API con un objeto de usuario como carga
   * útil.
   * @param {any} usuario - El parámetro "usuario" es un objeto que representa al usuario a registrar.
   * Es de tipo "cualquiera", lo que significa que puede ser cualquier tipo de objeto. Las propiedades
   * de este objeto probablemente incluirán información como el nombre del usuario, correo electrónico,
   * contraseña y cualquier otro detalle relevante necesario para
   * @returns La función `registrarUsuario` está devolviendo un Observable de tipo `cualquiera`. Está
   * realizando una solicitud POST a un punto final de la API con los datos de `usuario` proporcionados
   * y configurando los encabezados en `Content-Type: application/json`.
   */
  registrarUsuario(usuario: any): Observable<any> {
    const headers = new HttpHeaders().set('Content-Type', 'application/json');
    return this.http.post<any>(`${this.apiUrl}`, usuario, { headers: headers });
  }
}