import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class AccesoDatosService {

  private url = "http://my-json-server.typicode.com/luismiguel-fernandez/angular/"
  private surl = "http://api.organizador.com:8000/api" 

  constructor(private http: HttpClient) { }

  getProfesores() {
    //return this.profesores
    return this.http.get(this.surl+"/profesors") //devuelve un observable
  }

  getModulos() {
    //return this.modulos
    return this.http.get(this.surl+"/modulos/") //devuelve un observable
  }

  getExamenes() {
    //return this.modulos
    return this.http.get(this.surl+"/exameness/") //devuelve un observable
  }

 /*  getProfesor(id: number | string) {
    return this.http.get(this.url + "profesores/" + id)
  }

  getModulo(id: number) {
    return this.http.get(this.url + "modulos/" + nombre)
  } */
}
