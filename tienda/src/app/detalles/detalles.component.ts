import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { Observable } from 'rxjs';
import { switchMap } from 'rxjs/operators';
import { DatosService } from '../datos.service';

@Component({
  selector: 'app-detalles',
  templateUrl: './detalles.component.html',
  styleUrls: ['./detalles.component.css']
})
export class DetallesComponent implements OnInit {

  pieza$: Observable<any>

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private datos: DatosService
  ) { }

  ngOnInit(): void {
    this.pieza$ = this.route.paramMap.pipe(
      switchMap((params: ParamMap) =>
        this.datos.getPieza(params.get('id')))
    );
  }

  gotoCatalogo() {
    this.router.navigate(['/catalogo'])
  }

}
