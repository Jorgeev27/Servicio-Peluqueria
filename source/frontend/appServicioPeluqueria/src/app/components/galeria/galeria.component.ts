import { Component } from '@angular/core';
import { GALERIACORTES } from 'src/app/mock/mock-galeriaCortes.mock';

@Component({
  selector: 'app-galeria',
  templateUrl: './galeria.component.html',
  styleUrls: ['./galeria.component.css']
})
export class GaleriaComponent {
  galeriaCortes = GALERIACORTES;
}

