import { Component, Input, OnInit } from '@angular/core';
import { CarritoService} from '../carrito.service';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';


@Component({
  selector: 'app-pieza',
  templateUrl: './pieza.component.html',
  styleUrls: ['./pieza.component.css']
})
export class PiezaComponent implements OnInit {

  @Input() pieza

  constructor(
    private route: ActivatedRoute, 
    private router: Router, 
    private carrito: CarritoService) { }

  ngOnInit(): void {
  }

  buyPieza(pieza){
    this.carrito.buyPieza(pieza)
  }

  deletePieza(pieza){
    this.carrito.deletePieza(pieza)
  }
}
