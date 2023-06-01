import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Cortes } from '../model/cortesPelo';

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
  createCorte(corte: Cortes): Observable<any> {
    const body = { corte: corte };
    return this.http.post<any>(this.apiURL, body);
  }

  /**
   * Esta función devuelve un observable que recupera un objeto corte de una API en función de su
   * identificador.
   * @param {number} identificador - identificador es un parámetro numérico que representa el
   * identificador único de un objeto de corte. Este método, getCorteById, toma este identificador como
   * entrada y devuelve un Observable que emite el objeto corte con el identificador coincidente. El
   * método utiliza la solicitud HTTP GET para recuperar el objeto corte
   * @returns Se devuelve un Observable de tipo `cualquiera`. El método `http.get()` se utiliza para
   * realizar una solicitud HTTP GET al extremo de la API especificado por `this.apiURL` con el
   * parámetro de consulta `identificador` establecido en el valor del parámetro `identificador` pasado
   * a la función. Luego, la respuesta de la API se devuelve como un Observable.
   */
  getCorteById(identificador: number): Observable<any> {
    return this.http.get<any>(`${this.apiURL}?identificador=${identificador}`);
  }

  /**
   * Esta función envía una solicitud PUT a la URL de la API especificada con el corteData
   * proporcionado y devuelve un Observable.
   * @param {any} corteData - Es una variable de tipo "cualquiera" que representa los datos que deben
   * actualizarse para un "corte" (que podría ser un objeto o entidad específica en una base de datos).
   * Estos datos pueden incluir propiedades como el nombre del corte, descripción, fecha, estado, etc.
   * La función
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  updateCorte(corteData: any): Observable<any> {
    return this.http.put<any>(this.apiURL, corteData);
  }

  /**
   * Esta función envía una solicitud de ELIMINACIÓN HTTP a la URL de API especificada con el parámetro
   * de ID proporcionado.
   * @param {number} id - El parámetro "id" es un número que representa el identificador de un "corte"
   * (que puede ser un corte o una sección de algo). Esta función se utiliza para eliminar un "corte"
   * del servidor mediante el envío de una solicitud HTTP DELETE a la URL de la API especificada con el
   * "id_c
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  deleteCorte(id: number): Observable<any> {
    return this.http.delete<any>(`${this.apiURL}?id_corte=${id}`);
  }
}
