import { Pipe, PipeTransform } from "@angular/core";

@Pipe({
    name: 'tipoCortesPelo'
})

export class TipoCortesPeloPipe implements PipeTransform {

    transform(value: number): string {
        switch (value) {
            case 1:
                return 'Moderno';
            case 2:
                return 'Clásico';
            case 3:
                return 'Audaz';
            case 4:
                return 'Estructurado';
            case 5:
                return 'Elegante';
            case 6:
                return 'Gradual';
            case 7:
                return 'Militar';
            case 8:
                return 'Estilizado';
            case 9:
                return 'Natural';
            case 10:
                return 'Retro';
            default:
                return 'Tipo de corte no encontrado';
        }
    }
}