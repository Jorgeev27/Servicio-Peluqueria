import { Pipe, PipeTransform } from "@angular/core";

@Pipe({
    name: 'tipoCortesPelo'
})

export class TipoCortesPeloPipe implements PipeTransform {

    /**
     * Esta función toma una entrada numérica y devuelve una cadena que representa un tipo de corte de
     * pelo.
     * @param {number} value - un número que representa un tipo de corte de pelo.
     * @returns Un valor de cadena que representa un tipo de corte de pelo basado en el valor del
     * número de entrada. Si el valor del número de entrada no coincide con ninguno de los casos, se
     * devuelve un mensaje predeterminado.
     */
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