import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CortesPeloService {
  private apiURL = 'http://localhost/Servicio-Peluqueria/source/backend/apirestphp/apicorte.php'; // Reemplaza con la URL correcta de tu API

  constructor(private http: HttpClient) { }

  // Obtener todos los cortes de pelo
  getCortes(): Observable<any> {
    return this.http.get<any>(this.apiURL);
  }

  // Obtener un corte de pelo por identificador
  getCorte(identificador: string): Observable<any> {
    const url = `${this.apiURL}?identificador=${identificador}`;
    return this.http.get<any>(url);
  }

  // Registrar un nuevo corte de pelo
  registrarCorte(corte: any): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json'
      })
    };
    return this.http.post<any>(this.apiURL, corte, httpOptions);
  }

  getCorteById(identificador: number): Observable<any> {
    return this.http.get<any>(`${this.apiURL}?identificador=${identificador}`);
  }

  updateCorte(corteData: any): Observable<any> {
    return this.http.put<any>(this.apiURL, corteData);
  }

  deleteCorte(idCorte: number): Observable<any> {
    return this.http.delete<any>(`${this.apiURL}?id_corte=${idCorte}`);
  }
}
