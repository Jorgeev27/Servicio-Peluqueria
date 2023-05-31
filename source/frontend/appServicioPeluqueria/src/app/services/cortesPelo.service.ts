import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CortesPeloService {
  private apiURL = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apicorte.php'; // Reemplaza con la URL correcta de tu API

  constructor(private http: HttpClient) { }

  getCortes(): Observable<any> {
    return this.http.get<any>(this.apiURL);
  }

  getCorteById(identificador: number): Observable<any> {
    return this.http.get<any>(`${this.apiURL}?identificador=${identificador}`);
  }

  insertCorte(corteData: any): Observable<any> {
    return this.http.post<any>(this.apiURL, corteData);
  }

  updateCorte(corteData: any): Observable<any> {
    return this.http.put<any>(this.apiURL, corteData);
  }

  deleteCorte(idCorte: number): Observable<any> {
    return this.http.delete<any>(`${this.apiURL}?id_corte=${idCorte}`);
  }
}
