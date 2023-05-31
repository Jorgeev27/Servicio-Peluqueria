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
  idCorte!: number;
  cortes: Cortes[] = [];
  tipoCorteSeleccionado!: TipoCortes ;
  cortesFiltrados: Cortes[] = [];
  tiposCorte: TipoCortes[] = [];

  constructor(private cortesService: CortesPeloService, private router: Router, private tipoCortesService: TipoCortesService) { }

  ngOnInit(): void {
    this.cargarCortes();
    this.getTiposCorte();
  }

  cargarCortes() {
    this.cortesService.getCortes().subscribe(cortes => {
      this.cortes = cortes;
      this.filtrarCortesPorTipo();
    });
  }

  getTiposCorte(): void {
    this.tipoCortesService.getAllTiposCorte()
      .subscribe(data => {
        this.tiposCorte = data;
      });
  }

  filtrarCortesPorTipo(): void {
    if (this.tipoCorteSeleccionado) {
      this.cortesFiltrados = this.cortes.filter(corte => corte.id_tipocorte === this.tipoCorteSeleccionado.id_tipo_corte);
    } else {
      this.cortesFiltrados = this.cortes;
    }
  }

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
  }
  

  navegarReserva() {
    this.router.navigate(['/metodoPago']);
  }
}
