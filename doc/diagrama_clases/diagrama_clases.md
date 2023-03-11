# **Diagrama de Clases - Servicio Peluquería**

# **Jorge Escobar Viñuales**

## **1. Índice**<a name = "id1"></a>
1. [Índice](#id1)<br>
2. [Diagrama de Clases](#id2)<br>

## **2. Diagrama de Clases**<a name="id2"></a>
<div align="justify">
  Con respecto al diagrama de clases, la aplicación tendrá la siguiente base de datos:
  
  - La tabla empleados, contiene el ID_empleado, Nombre, Apellido1, Apellido2. Y con respecto a las funciones, los empleados tendrán que conocer la reserva del tipo de corte (ID), el corte de éste (ID), el precio del mismo. Y también, la reserva del cliente (ID, Nombre), fecha y hora.
  
  - La tabla clientes, contiene el ID_cliente, Nombre, Nombre_usuarioCliente, Apellido1, Apellido2, Correo_electronico, Telefono_movil. Y con respecto a las funciones, los clientes tendrán que conocer la reserva del tipo del corte (ID), el corte de éste (ID), el precio del corte. También, la reserva de la fecha y hora.
  
  - La tabla citaCorte, contiene el Fecha, Hora. Y con respecto a las funciones, la citaCorte tendrá que conocer la reserva del tipo del corte (ID), el corte de éste (ID), el precio del corte, fecha, hora, el cliente (ID).
  
  - La tabla corte, contiene el ID_corte, Nombre_corte, Precio_corte Y con respecto a las funciones, tendrá que conocer la reserva del tipo del corte (ID), el corte de éste (ID), el precio del corte.
  
  - La tabla tipoCorte, contiene el ID_tipo, Nombre_tipo. Y con respecto a las funciones, tendrá que conocer la reserva del tipo del corte (ID), el corte de éste (ID), el precio del corte.
  
  ![](https://github.com/Jorgeev27/Servicio-Peluqueria/blob/main/doc/diagrama_clases/DrawIO/DiagramaClases.png)
</div>
