import { Component, OnInit } from '@angular/core';
import { Subject } from 'rxjs';
import { AccesoDatosService } from '../acceso-datos.service';

@Component({
  selector: 'app-modulos',
  templateUrl: './modulos.component.html',
  styleUrls: ['./modulos.component.css']
})

export class ModulosComponent implements OnInit {

  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  modulos
 
  constructor(private basedatos:AccesoDatosService) { 
    
  }

  ngOnInit(): void {
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 2
    };
    
    
    this.basedatos.getModulos().subscribe(
      (response) => {
        console.log('Responde received')
        this.modulos = response
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