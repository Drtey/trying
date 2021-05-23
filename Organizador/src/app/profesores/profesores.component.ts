import { Component, OnInit } from '@angular/core';
import { Subject } from 'rxjs';
import { AccesoDatosService } from '../acceso-datos.service';


@Component({
  selector: 'app-profesores',
  templateUrl: './profesores.component.html',
  styleUrls: ['./profesores.component.css']
})
export class ProfesoresComponent implements OnInit {

  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  profesores
 
  constructor(private basedatos:AccesoDatosService) { }

  ngOnInit(): void {
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 4
    };
    
    this.basedatos.getProfesores().subscribe(
      (response) => {
        console.log('Responde received')
        this.profesores = response
        this.dtTrigger.next();
        
      },
      (error) => {
        console.error('Request failed with error')
        console.error(error)
        
      }
    )
  }
  ngOnDestroy(): void {
    this.dtTrigger.unsubscribe();
  }
}


