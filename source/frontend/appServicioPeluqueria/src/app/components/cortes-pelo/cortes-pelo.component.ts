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

  navegarReserva() {
    this.router.navigate(['/metodoPago']);
  }
}
