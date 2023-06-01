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
  /* El código está definiendo dos variables `corte` y `tiposCorte`. */
  corte: Cortes = {
    id_corte: 0,
    nombre: '',
    descripcion: '',
    precio: 0,
    id_tipocorte: 0
  };

  tiposCorte: TipoCortes[] = [];

  constructor(private cortesService: CortesPeloService, private router: Router, private tipoCortesService: TipoCortesService) { }

  /**
   * La función ngOnInit llama a la función getTiposCorte.
   */
  ngOnInit(): void {
    this.getTiposCorte();
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
   * Esta función crea un nuevo "corte" y navega a la página de "productos" luego de una creación
   * exitosa.
   */
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
