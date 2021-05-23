import { Component, OnInit } from '@angular/core';
import { AccesoDatosService } from '../acceso-datos.service';

@Component({
  selector: 'app-calendario',
  templateUrl: './calendario.component.html',
  styleUrls: ['./calendario.component.css']
})
export class CalendarioComponent implements OnInit {

  examenes
  profesores
  modulos

  constructor(private basedatos:AccesoDatosService) { }

  ngOnInit(): void {
    this.basedatos.getExamenes().subscribe(
      (response) => {
        console.log('Responde received')
        this.modulos = response
/*         this.dtTrigger.next();
 */      },
      (error) => {
        console.error('Request failed with error')
        console.error(error)
        
      }
    )
  }
   /*  this.basedatos.getModulos().subscribe(
      (response) => {
        this.modulos = response
        //ahora lanzo la siguiente paloma mensajera
            this.basedatos.getProfesores().subscribe(
              (response) => {
                this.profesores = response
                //ahora lanzo la 3ª paloma mensajera
                this.basedatos.getExamenes().subscribe(
                  (response) => {
                    let arraytemporal
                    //adaptar ese array examenes (donde ponga un ID = 1 tendrá que poner un nombre)
                    arraytemporal.forEach(examen => {
                      examen.mod_id = this.getModByID(examen.mod_id)
                      examen.prof_id = this.getProfByID(examen.prof_id)
                    });
                    this.examenes = arraytemporal
                  },
                  (error) => {
                    console.error(error)
                  }
                )
              },
              (error) => {
                console.error(error)
              }
            )
      },
      (error) => {
        console.error(error)
      }
    ) */

      //aplicar el plugin DATATABLES
      //$('#tablaexamenes').DataTable();
  }

  /* private getProfByID(id:number) {
    
    return this.profesores.filter( prof => prof.id == id).nombre
  }

  private getModByID(id:number) { 

    return this.modulos.filter( mod => mod.id == id).nombre
  } */
