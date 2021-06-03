import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CarritoComponent } from './carrito/carrito.component';
import { BuscadorComponent } from './buscador/buscador.component';
import { NavComponent } from './nav/nav.component';
import { CatalogoComponent } from './catalogo/catalogo.component';
import { PiezaComponent } from './pieza/pieza.component';
import { FiltrosComponent } from './filtros/filtros.component';

const rutas = [ 
  {path: 'catalogo', component: CatalogoComponent},
  {path: 'carrito', component: CarritoComponent}
]

@NgModule({
  declarations: [
    AppComponent,
    CarritoComponent,
    BuscadorComponent,
    NavComponent,
    CatalogoComponent,
    PiezaComponent,
    FiltrosComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(rutas),
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
