import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DatosService {

  private url = "http://my-json-server.typicode.com/luismiguel-fernandez/angular/"

  constructor(private http: HttpClient) { }

  getPiezas() {
    return this.http.get(this.url + "piezas")
  }

  getCategorias() {
    return this.http.get(this.url + "categorias")
  }
}
