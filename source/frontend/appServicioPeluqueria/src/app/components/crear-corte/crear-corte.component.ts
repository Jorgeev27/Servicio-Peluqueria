import { Component } from '@angular/core';
import { CortesPeloService } from 'src/app/services/cortesPelo.service';

@Component({
  selector: 'app-crear-corte',
  templateUrl: './crear-corte.component.html',
  styleUrls: ['./crear-corte.component.css']
})
export class CrearCorteComponent {
  corte = {
    nombre: '',
    descripcion: '',
    precio: 0,
    id_tipo_corte: ''
  };
  mensaje!: string;

  constructor(private corteService: CortesPeloService) { }

  registrarCorte(): void {
    this.corteService.registrarCorte(this.corte)
      .subscribe(
        response => {
          console.log(response);  // Puedes eliminar esta línea de código, es solo para depuración
          this.mensaje = 'El corte de pelo se registró correctamente.';
        },
        error => {
          console.log(error);  // Puedes eliminar esta línea de código, es solo para depuración
          this.mensaje = 'Error al registrar el corte de pelo.';
        }
      );
  }
}
