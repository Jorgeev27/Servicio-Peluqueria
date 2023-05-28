/* Importación de la clase EquipoFutsal desde el archivo model/equipoFutsal.ts. */
import { CortesGaleria } from "../model/galeriaCortes";

/* Creación de un array constante de objetos de tipo EquipoFutsal. */
export const GALERIACORTES: CortesGaleria[] = [
    {id: 20080, nombre: 'Tapered Afro', descripcion: 'El cabello se corta gradualmente más corto en los lados y la parte posterior, mientras que la parte superior se mantiene en su estado natural de afro.', precio: 25, tipocorte: 'Moderno'},
    {id: 20081, nombre: 'Textured Crop con Flequillo', descripcion: 'El cabello se corta en capas cortas y se texturiza, dejando flequillo en la parte frontal que puede llevarse despeinado o peinado hacia un lado.', precio: 25, tipocorte: 'Desenfadado'},
    {id: 20082, nombre: 'Bald Head', descripcion: 'Se rasura completamente el cabello, creando un aspecto completamente calvo y sin necesidad de mantenimiento', precio: 20, tipocorte: 'Sin Cabello'},
    {id: 20083, nombre: 'Faded Hawk', descripcion: 'Los lados se desvanecen gradualmente hacia arriba, mientras que la parte superior se corta en una cresta larga y puntiaguda que se mantiene en pie.', precio: 30, tipocorte: 'Moderno'},
    {id: 20084, nombre: 'Textured Side Part', descripcion: 'La parte superior se corta y se texturiza para crear un estilo pompadour desordenado y con mucho movimiento.', precio: 30, tipocorte: 'Moderno'},
    {id: 20085, nombre: 'Mullet', descripcion: 'El cabello se deja más largo en la parte posterior y los lados, mientras que la parte superior se mantiene más corta. Es un estilo distintivo y llamativo.', precio: 30, tipocorte: 'Retro'},
    {id: 20086, nombre: 'Faux Locs', descripcion: 'Se agregan extensiones de cabello trenzado para crear una apariencia de rastas temporales. Requiere tiempo y habilidad para aplicar las locs.', precio: 35, tipocorte: 'Creativo'},
    {id: 20087, nombre: 'Brush Cut', descripcion: 'El cabello se corta muy corto en todas las áreas de la cabeza y se peina hacia adelante con un acabado cepillado.', precio: 20, tipocorte: 'Práctico'},
    {id: 20088, nombre: 'Curly Fade', descripcion: 'La parte superior se deja más larga y se peina hacia atrás, creando una pompa con ondas y textura. Los lados se pueden desvanecer o cortar cortos.', precio: 30, tipocorte: 'Moderno'},
    {id: 20089, nombre: 'Box Braids', descripcion: 'Se trenzan extensiones de cabello sintético o natural en secciones más pequeñas y se suelen llevar en largas trenzas sueltas. Requiere tiempo y habilidad.', precio: 40, tipocorte: 'Versátil'}
]