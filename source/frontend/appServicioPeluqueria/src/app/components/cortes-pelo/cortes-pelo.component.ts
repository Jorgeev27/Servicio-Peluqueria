import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Cortes } from 'src/app/model/cortesPelo';
import { TipoCortes } from 'src/app/model/tipoCortes';
import { CortesPeloService } from 'src/app/services/cortesPelo.service';

@Component({
  selector: 'app-cortes-pelo',
  templateUrl: './cortes-pelo.component.html',
  styleUrls: ['./cortes-pelo.component.css']
})
export class CortesPeloComponent implements OnInit {
  corte: Cortes[] = [];
  tipoCorte: TipoCortes[] = [];
  selectedTipoCorte!: TipoCortes;
  cortesFiltrados: Cortes[] = [];

  constructor(private cortesService: CortesPeloService, private router: Router) { }

  ngOnInit(): void {
    this.cargarCortes();
    this.cargarTipoCortes();
    this.cortesFiltrados = this.corte; // Inicialmente, mostrar todos los cortes
  }

  cargarCortes() {
    this.cortesService.obtenerCortes().subscribe(corte => {
      this.corte = corte;
      this.cortesFiltrados = corte; // Actualizar cortes filtrados al cargar los cortes
    });
  }

  cargarTipoCortes() {
    this.cortesService.obtenerTipoCortes().subscribe(tipoCorte => {
      this.tipoCorte = tipoCorte.map((item: any) => ({
        id_tipo_corte: item.id_tipo_corte,
        nombre: item.nombre
      }));
    });
  }

  filtrarCortesPorTipo() {
    if (this.selectedTipoCorte) {
      this.cortesFiltrados = this.corte.filter(corte => corte.id_tipocorte === this.selectedTipoCorte.id_tipo_corte);
    } else {
      this.cortesFiltrados = this.corte;
    }
  }

  navegarReserva() {
    this.router.navigate(['/metodoPago']); // Reemplaza '/reserva' con la ruta del componente de reserva correspondiente
  }
}
