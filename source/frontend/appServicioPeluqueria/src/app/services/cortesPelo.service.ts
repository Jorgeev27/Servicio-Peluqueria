import { Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { Observable} from "rxjs";

@Injectable({
    providedIn: 'root',
})

export class CortesPeloService{
  url = "http://localhost/Servicio-Peluqueria/source/backend/apirestphp/";

  constructor(private http: HttpClient) { }

  obtenerCortes(): Observable<any>{
    return this.http.get(`${this.url}/apicorte.php`);
  }

  obtenerTipoCortes(): Observable<any>{
    return this.http.get(`${this.url}/apitipocorte.php`);
  }
}