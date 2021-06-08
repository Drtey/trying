import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CarritoComponent } from './carrito/carrito.component';
import { NavComponent } from './nav/nav.component';
import { CatalogoComponent } from './catalogo/catalogo.component';
import { PiezaComponent } from './pieza/pieza.component';
import { FiltrosComponent } from './filtros/filtros.component';
import { DetallesComponent } from './detalles/detalles.component';
import { PatronPipe } from './patron.pipe';
import { CategoriaPipe } from './categoria.pipe';
import { CompradoComponent } from './comprado/comprado.component';


const rutas = [ 
  {path: 'catalogo', component: CatalogoComponent},
  {path: '', component: CatalogoComponent},
  {path: 'carrito', component: CarritoComponent},
  {path: 'pieza/:id', component: DetallesComponent},
]

@NgModule({
  declarations: [
    AppComponent,
    CarritoComponent,
    NavComponent,
    CatalogoComponent,
    PiezaComponent,
    FiltrosComponent,
    DetallesComponent,
    PatronPipe,
    CategoriaPipe,
    CompradoComponent
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
