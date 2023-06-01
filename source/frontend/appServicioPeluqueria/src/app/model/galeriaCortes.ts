/* Definición de una interfaz llamada `CortesGaleria` con cinco propiedades: `id` de tipo `number`,
`nombre` de tipo `string`, `descripcion` de tipo `string`, `precio` de tipo `number` y `tipocorte` `
de tipo `cadena`. La palabra clave `export` hace que esta interfaz esté disponible para su uso en
otros módulos. */
export interface CortesGaleria{
    id: number,
    nombre: string,
    descripcion: string,
    precio: number,
    tipocorte: string
}