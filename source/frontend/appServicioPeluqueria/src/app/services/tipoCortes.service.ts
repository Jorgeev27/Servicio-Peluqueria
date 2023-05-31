import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TipoCortesService {
  private apiUrl = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apitipocorte.php';
   // Reemplaza con la URL correcta de tu API

  constructor(private http: HttpClient) { }

  getAllTiposCorte(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  getTipoCorteByNombre(nombre: string): Observable<any> {
    const params = { nombre: nombre };
    return this.http.get<any>(this.apiUrl, { params: params });
  }

  createTipoCorte(nombre: string): Observable<any> {
    const body = { nombre: nombre };
    return this.http.post<any>(this.apiUrl, body);
  }

  updateTipoCorte(id: number, nombre: string): Observable<any> {
    const body = { id_tipo_corte: id, nombre: nombre };
    return this.http.put<any>(this.apiUrl, body);
  }

  deleteTipoCorte(id: number): Observable<any> {
    const params = { id_tipo_corte: id };
    return this.http.delete<any>(this.apiUrl, { params: params });
  }
}
