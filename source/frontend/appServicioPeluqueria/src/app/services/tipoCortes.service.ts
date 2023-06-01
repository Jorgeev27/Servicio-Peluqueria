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

  /**
   * Esta función devuelve un observable que recupera todos los tipos de cortes de un extremo de la
   * API.
   * @returns Se devuelve un Observable de tipo "cualquiera".
   */
  getAllTiposCorte(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  /**
   * Esta función recupera un tipo de corte por su nombre a través de una solicitud HTTP GET.
   * @param {string} nombre - Una cadena que representa el nombre de un tipo de corte. Esta función
   * devuelve un Observable que realizará una solicitud HTTP GET a un punto final de API con el nombre
   * dado como parámetro. La API luego devolverá información sobre el tipo de corte con ese nombre.
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  getTipoCorteByNombre(nombre: string): Observable<any> {
    const params = { nombre: nombre };
    return this.http.get<any>(this.apiUrl, { params: params });
  }

  /**
   * Esta función crea un nuevo "tipo de corte" (tipo de corte) con un nombre determinado mediante una
   * solicitud HTTP POST.
   * @param {string} nombre - El parámetro "nombre" es una cadena que representa el nombre de un objeto
   * "TipoCorte" que será creado y guardado en el servidor backend. La función devuelve un Observable
   * que emite la respuesta del servidor después de que el objeto se haya creado correctamente.
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  createTipoCorte(nombre: string): Observable<any> {
    const body = { nombre: nombre };
    return this.http.post<any>(this.apiUrl, body);
  }

  /**
   * Esta función actualiza un tipo corte (tipo de corte) con una identificación y un nombre
   * determinados mediante una solicitud HTTP PUT.
   * @param {number} id - El ID del tipo corte (tipo de corte) que necesita ser actualizado.
   * @param {string} nombre - El parámetro "nombre" es una cadena que representa el nuevo nombre de un
   * "tipo de corte" que se actualizará en la base de datos.
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  updateTipoCorte(id: number, nombre: string): Observable<any> {
    const body = { id_tipo_corte: id, nombre: nombre };
    return this.http.put<any>(this.apiUrl, body);
  }

  /**
   * Esta función envía una solicitud DELETE al extremo de la API especificado con el ID proporcionado
   * como parámetro.
   * @param {number} id - El parámetro id es un número que representa el id del tipo corte (tipo de
   * corte) que necesita ser eliminado.
   * @returns Se devuelve un Observable de tipo `cualquiera`.
   */
  deleteTipoCorte(id: number): Observable<any> {
    const params = { id_tipo_corte: id };
    return this.http.delete<any>(this.apiUrl, { params: params });
  }
}
