import { Component, OnInit } from '@angular/core';
import { DatosService } from '../datos.service';

@Component({
  selector: 'app-catalogo',
  templateUrl: './catalogo.component.html',
  styleUrls: ['./catalogo.component.css']
})
export class CatalogoComponent implements OnInit {

  piezas
  loading = false;
  patron = "";
  cat = "0";

  constructor(private datos: DatosService) { }

  ngOnInit(): void {
    this.loading = true;
    this.datos.getPiezas().subscribe(
      (response) => {
        console.log('Response received');
        this.piezas = response;
        this.loading = false; },
      (error) => {
        console.error('Request failed with error');
        console.error(error);
        this.loading = false; }
    )
  }

  nuevoPatron(patron) {
    this.patron = patron
  }

  nuevaCategoria(idCat) {
    this.cat = idCat
  }

}
