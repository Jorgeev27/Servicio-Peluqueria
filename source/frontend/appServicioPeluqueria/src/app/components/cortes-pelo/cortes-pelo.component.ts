import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Cortes } from 'src/app/model/cortesPelo';
import { TipoCortes } from 'src/app/model/tipoCortes';
import { CortesPeloService } from 'src/app/services/cortesPelo.service';
import { TipoCortesService } from 'src/app/services/tipoCortes.service';

@Component({
  selector: 'app-cortes-pelo',
  templateUrl: './cortes-pelo.component.html',
  styleUrls: ['./cortes-pelo.component.css']
})
export class CortesPeloComponent implements OnInit {
  /* Estas son propiedades de clase en la clase `CortesPeloComponent`. */
  idCorte!: number;
  cortes: Cortes[] = [];
  tipoCorteSeleccionado!: TipoCortes ;
  cortesFiltrados: Cortes[] = [];
  tiposCorte: TipoCortes[] = [];

  constructor(private cortesService: CortesPeloService, private router: Router, private tipoCortesService: TipoCortesService) { }

  /**
   * La función ngOnInit carga e inicializa datos para un componente en una aplicación Angular.
   */
  ngOnInit(): void {
    this.cargarCortes();
    this.getTiposCorte();
  }

  /**
   * Esta función carga cortes y los filtra por tipo.
   */
  cargarCortes() {
    this.cortesService.getCortes().subscribe(cortes => {
      this.cortes = cortes;
      this.filtrarCortesPorTipo();
    });
  }

  /**
   * Esta función recupera todos los tipos de cortes de un servicio y los asigna a una variable.
   */
  getTiposCorte(): void {
    this.tipoCortesService.getAllTiposCorte()
      .subscribe(data => {
        this.tiposCorte = data;
      });
  }

  /**
   * Esta función filtra los cortes por su tipo.
   */
  filtrarCortesPorTipo(): void {
    if (this.tipoCorteSeleccionado) {
      this.cortesFiltrados = this.cortes.filter(corte => corte.id_tipocorte === this.tipoCorteSeleccionado.id_tipo_corte);
    } else {
      this.cortesFiltrados = this.cortes;
    }
  }

  /**
   * Esta función elimina un corte de pelo del servidor y maneja la respuesta.
   * @param {Cortes} corte - Objeto de Cortes, que representa un corte de pelo o un estilo de corte de
   * pelo.
   */
  borrarCorte(corte: Cortes): void {
    console.log(corte.id_corte); // Verificar el valor del id_corte
    this.cortesService.deleteCorte(corte.id_corte).subscribe(
      response => {
        console.log(response); // Verificar la respuesta del servidor
        // Resto del código para manejar la respuesta del servidor
      },
      error => {
        console.error('Error al borrar el corte de pelo:', error);
      }
    );
    window.location.reload();
  }
  

  /**
   * Esta función navega a la página del método de pago.
   */
  navegarReserva() {
    this.router.navigate(['/metodoPago']);
  }
}
