import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'patron'
})
export class PatronPipe implements PipeTransform {

  transform(value: any[], patron: string ): any[] {
    if (value && value.length) {
      return value.filter( pieza => pieza.nombre.toLowerCase().includes(patron.toLowerCase()))
    }
    return value;
  }
}
