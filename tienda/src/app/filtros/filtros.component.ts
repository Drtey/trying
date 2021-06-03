import { Component, OnInit } from '@angular/core';
import { DatosService } from '../datos.service';
import { Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-filtros',
  templateUrl: './filtros.component.html',
  styleUrls: ['./filtros.component.css']
})
export class FiltrosComponent implements OnInit {

  categorias;
  @Output() PatronCambiado = new EventEmitter<string>();
  @Output() CambioCategoria = new EventEmitter<string>();

  constructor(private datos: DatosService) { }

  ngOnInit(): void {
    this.datos.getCategorias().subscribe(
      (data) => {
        this.categorias = data
      }
    )
  }

  cambiosPatron(patron:string){
    this.PatronCambiado.emit(patron)
  }

  cambioCategoria(idCat:string){
    this.CambioCategoria.emit(idCat)
  }

}
