# **Entidad-Relación - Servicio Peluquería**

# **Jorge Escobar Viñuales**

## **1. Índice**<a name = "id1"></a>
1. [Índice](#id1)<br>
2. [Tablas de Base de Datos](#id2)<br>
3. [Entidad-Relación con las Bases de Datos](#id3)<br>

## **2. Tablas de Base de Datos**<a name="id2"></a>
<div align="justify">
  La aplicación del servicio de peluquería cuenta con las siguientes tablas de Base de Datos con sus respectivos atributos:

  - Empleado: id (Primary Key), nombre, apellido, dni, movil, email, id_rol (Foreign Key), pass.

  - Roles: id_rol (Primary Key), rol.

  - Clientes: id (Primary Key), nombre, apellido, dni, email, movil, id_rol (Foreign Key).

  - Cita: id_cita (Primary Key), hora, fecha, id_cliente (Foreign Key), id_tipocorte (Foreign Key), id_corte (Foreign Key).

  - Usuarios: id (Primary Key), nombre, apellido, dni, email, movil, id_rol (Foreign Key), pass.

  - Corte: id(Primary Key), nombre, descripcion, precio, id_tipocorte (Foreign Key).

  - Tipo_Corte: id_tipocorte(Primary Key), nombre.
</div>
  
## **3. Entidad-Relación con las Bases de Datos**<a name="id3"></a>
<div align="justify">
  Estas tablas de Bases de Datos (mencionadas anteriormente en el punto 2) están relacionadas de la siguiente forma que se va a mostrar a continuación:
  
  
  ![](https://github.com/Jorgeev27/Servicio-Peluqueria/blob/main/doc/entidad_relacion/DrawIO/Entidad-Relacion.png)
</div>
