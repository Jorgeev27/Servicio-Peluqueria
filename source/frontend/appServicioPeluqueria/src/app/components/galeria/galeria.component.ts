import { Component } from '@angular/core';
import { GALERIACORTES } from 'src/app/mock/mock-galeriaCortes.mock';

@Component({
  selector: 'app-galeria',
  templateUrl: './galeria.component.html',
  styleUrls: ['./galeria.component.css']
})
export class GaleriaComponent {
  /* `galeriaCortes = GALERIACORTES;` está inicializando una variable `galeriaCortes` con el valor de
  `GALERIACORTES` del archivo `mock-galeriaCortes.mock.ts`. Es probable que se esté utilizando para
  mostrar una galería de cortes de cabello o peinados en un componente Angular. */
  galeriaCortes = GALERIACORTES;
}

