import { Component } from '@angular/core';
import { TipoCortesService } from 'src/app/services/tipoCortes.service';

@Component({
  selector: 'app-crear-tipo-corte',
  templateUrl: './crear-tipo-corte.component.html',
  styleUrls: ['./crear-tipo-corte.component.css']
})
export class CrearTipoCorteComponent {
  nombreTipoCorte: string = '';
  errorMessage: string = '';

  constructor(private tipoCorteService: TipoCortesService) { }

  registrarTipoCorte(): void {
    if (this.nombreTipoCorte) {
      this.tipoCorteService.createTipoCorte(this.nombreTipoCorte).subscribe(
        response => {
          console.log(response); // Manejar la respuesta según tus necesidades
          // Reiniciar los campos
          this.nombreTipoCorte = '';
          this.errorMessage = '';
        },
        error => {
          console.log(error); // Manejar el error según tus necesidades
          if (error.status === 409) {
            this.errorMessage = 'El tipo de corte de pelo ya existe en la base de datos.';
          } else {
            this.errorMessage = 'No se pudo insertar el tipo de corte de pelo en la base de datos.';
          }
        }
      );
    } else {
      this.errorMessage = 'El campo Nombre es obligatorio.';
    }
  }
}
