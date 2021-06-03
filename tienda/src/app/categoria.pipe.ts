import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'categoria'
})
export class CategoriaPipe implements PipeTransform {

  transform(value: any[], idCat:string): any[] {

    if (value && value.length && idCat != "0") {
      return value.filter( pieza => pieza.categoria == idCat )
    }
    return value;
  }

}
