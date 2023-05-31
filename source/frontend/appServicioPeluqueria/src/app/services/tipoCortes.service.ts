import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TipoCortesService {
  private apiUrl = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apitipocorte.php'; // Reemplaza 'URL_DE_TU_API' con la URL de tu API

  constructor(private http: HttpClient) { }

  getAllTiposCorte(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  getTipoCorte(nombre: string): Observable<any> {
    return this.http.get(`${this.apiUrl}?nombre=${nombre}`);
  }

  createTipoCorte(nombre: string): Observable<any> {
    const data = { nombre: nombre };
    return this.http.post(this.apiUrl, data);
  }

  updateTipoCorte(id: number, nombre: string): Observable<any> {
    const data = { id_tipo_corte: id, nombre: nombre };
    return this.http.put(this.apiUrl, data);
  }

  deleteTipoCorte(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}?id_tipo_corte=${id}`);
  }
}
