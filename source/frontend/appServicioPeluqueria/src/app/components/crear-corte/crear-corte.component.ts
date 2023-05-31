import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Cortes } from 'src/app/model/cortesPelo';
import { TipoCortes } from 'src/app/model/tipoCortes';
import { CortesPeloService } from 'src/app/services/cortesPelo.service';
import { TipoCortesService } from 'src/app/services/tipoCortes.service';

@Component({
  selector: 'app-crear-corte',
  templateUrl: './crear-corte.component.html',
  styleUrls: ['./crear-corte.component.css']
})
export class CrearCorteComponent implements OnInit {
  corte: Cortes = {
    id_corte: 0,
    nombre: '',
    descripcion: '',
    precio: 0,
    id_tipocorte: 0
  };

  tiposCorte: TipoCortes[] = [];

  constructor(private cortesService: CortesPeloService, private router: Router, private tipoCortesService: TipoCortesService) { }

  ngOnInit(): void {
    this.getTiposCorte();
  }

  getTiposCorte(): void {
    this.tipoCortesService.getAllTiposCorte()
      .subscribe(data => {
        this.tiposCorte = data;
      });
  }

  registrarCorte(): void {
    this.cortesService.createCorte(this.corte)
      .subscribe(
        response => {
          console.log('Corte creado exitosamente');
          this.router.navigate(['/productos']);
        },
        error => {
          console.error(error);
        }
      );
  }
  
}
