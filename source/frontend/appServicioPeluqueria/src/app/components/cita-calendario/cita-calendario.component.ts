import { Component } from '@angular/core';
import { CalendarOptions } from '@fullcalendar/core'; // useful for typechecking
import dayGridPlugin from '@fullcalendar/daygrid';
import esLocale from '@fullcalendar/core/locales/es';


@Component({
  selector: 'app-cita-calendario',
  templateUrl: './cita-calendario.component.html',
  styleUrls: ['./cita-calendario.component.css']
})
export class CitaCalendarioComponent {

  /* `calendarOptions` es un objeto de tipo `CalendarOptions` que se inicializa con algunas
  propiedades. Estas propiedades incluyen la vista inicial del calendario (`dayGridMonth`), los
  complementos que se usan (solo `dayGridPlugin` en este caso), una matriz vacía para eventos (que
  debe definirse correctamente) y la configuración regional que se usa (`esLocale `). Es probable
  que este objeto se esté utilizando para configurar y personalizar el componente FullCalendar en
  `CitaCalendarioComponent`. */
  calendarOptions: CalendarOptions = {
    initialView: 'dayGridMonth',
    plugins: [dayGridPlugin],
    events: [], // Asegúrate de que has definido correctamente la propiedad "events"
    locale: esLocale 
  };

}
