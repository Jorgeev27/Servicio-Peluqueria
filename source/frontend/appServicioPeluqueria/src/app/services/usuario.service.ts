import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  private apiUrl = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apiusuarios.php'; // Reemplaza con la URL de tu API

  constructor(private http: HttpClient) { }

  registrarUsuario(usuario: any): Observable<any> {
    const headers = new HttpHeaders().set('Content-Type', 'application/json');
    return this.http.post<any>(`${this.apiUrl}`, usuario, { headers: headers });
  }
}