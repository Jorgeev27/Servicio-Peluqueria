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
  calendarOptions: CalendarOptions = {
    initialView: 'dayGridMonth',
    plugins: [dayGridPlugin],
    events: [], // Asegúrate de que has definido correctamente la propiedad "events"
    locale: esLocale 
  };

}
