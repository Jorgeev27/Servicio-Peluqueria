# **Entidad-Relación - Servicio Peluquería**

# **Jorge Escobar Viñuales**

## **1. Índice**<a name = "id1"></a>
1. [Índice](#id1)<br>
2. [Tablas de Base de Datos](#id2)<br>
3. [Entidad-Relación con las Bases de Datos](#id3)<br>

## **2. Tablas de Base de Datos**<a name="id2"></a>
<div align="justify">
  La aplicación del servicio de peluquería cuenta con las siguientes tablas de Base de Datos con sus respectivos atributos:

  - Empleados: ID_Empleado(Primary Key), Nombre_Empleado, NombreUsuario_Empleado, Apellido1, Apellido2, DNI, CorreoElectronico_Empleado.

  - Cliente: ID_Cliente(Primary Key), Nombre_Cliente, NombreUsuario_Cliente, Apellido1, Apellido2, DNI, CorreoElectronico_Cliente, Telefono_movil.

  - CitaCorte: Fecha(PK), Hora, ID_Cliente(Foreign Key), Nombre_Cliente, ID_Corte(Foreign Key), Nombre_Corte, Precio_Corte, ID_TipoCorte(Foreign Key), Nombre_TipoCorte.

  - CortePelo: ID_Corte(Primary Key), Nombre_Corte, Precio_Corte, ID_TipoCorte(Foreign Key), Nombre_TipoCorte.

  - TipoCorte: ID_TipoCorte(Primary Key), Nombre_TipoCorte, ID_Corte(Foreign Key), Nombre_Corte.
</div>
  
## **3. Entidad-Relación con las Bases de Datos**<a name="id3"></a>
<div align="justify">
  Estas tablas de Bases de Datos (mencionadas anteriormente en el punto 2) están relacionadas de la siguiente forma que se va a mostrar a continuación:
  
  
  ![](https://github.com/Jorgeev27/Servicio-Peluqueria/blob/main/doc/entidad_relacion/DrawIO/Entidad-Relacion.png)
</div>
