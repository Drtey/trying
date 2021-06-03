import { Injectable } from '@angular/core';
import { findIndex } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CarritoService {

  private carrito = []

  constructor() { }

  buyPieza(pieza) {
    this.carrito.push(pieza)
  }

  deletePieza(pieza) {
    let index = this.carrito.indexOf(pieza)
    this.carrito.splice(index,1)
  }

  getCarrito() {   
    return this.carrito
  }
}
