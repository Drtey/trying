import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CarritoService {

  private carrito = []

  constructor() { }

  addPieza(pieza) {
    this.carrito.push(pieza)
  }

  deletePelicula( pelicula ) {
    this.carrito = this.carrito.filter( pieza => pieza.id != pieza.id)
  }

  getCarrito() {   
    return this.carrito
  }

}
