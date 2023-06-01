import { Component } from '@angular/core';
import { TipoCortesService } from 'src/app/services/tipoCortes.service';

@Component({
  selector: 'app-crear-tipo-corte',
  templateUrl: './crear-tipo-corte.component.html',
  styleUrls: ['./crear-tipo-corte.component.css']
})
export class CrearTipoCorteComponent {
/* Estas son propiedades de clase que se inicializan con cadenas vacías. `nombreTipoCorte` se usa para
almacenar el nombre del tipo de corte de cabello que el usuario desea crear, mientras que
`errorMessage` se usa para mostrar cualquier mensaje de error que pueda ocurrir durante el proceso
de creación. */
  nombreTipoCorte: string = '';
  errorMessage: string = '';

  constructor(private tipoCorteService: TipoCortesService) { }

  /**
   * Esta función registra un nuevo tipo de corte de pelo y maneja cualquier error que pueda ocurrir.
   */
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
