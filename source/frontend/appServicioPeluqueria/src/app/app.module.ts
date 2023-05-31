import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { TipoCortesPeloPipe } from './pipes/tipoCortesPelo.pipe';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CortesPeloComponent } from './components/cortes-pelo/cortes-pelo.component';
import { HeaderComponent } from './components/header/header.component';
import { MainComponent } from './components/main/main.component';
import { SobreNosotrosComponent } from './components/sobre-nosotros/sobre-nosotros.component';
import { NoticiasComponent } from './components/noticias/noticias.component';
import { GaleriaComponent } from './components/galeria/galeria.component';
import { ContactoComponent } from './components/contacto/contacto.component';
import { FormsModule } from '@angular/forms';
import { CitaCalendarioComponent } from './components/cita-calendario/cita-calendario.component';
import { FullCalendarModule } from '@fullcalendar/angular';
import { LoginComponent } from './components/login/login.component';
import { RegistroComponent } from './components/registro/registro.component';
import { MetodoPagoComponent } from './components/metodo-pago/metodo-pago.component';
import { FooterComponent } from './components/footer/footer.component';
import { ReactiveFormsModule } from '@angular/forms';
import { CrearTipoCorteComponent } from './components/crear-tipo-corte/crear-tipo-corte.component';
import { CrearCorteComponent } from './components/crear-corte/crear-corte.component';
import { CortesPeloService } from './services/cortesPelo.service';


@NgModule({
  declarations: [
    AppComponent,
    CortesPeloComponent,
    TipoCortesPeloPipe,
    HeaderComponent,
    MainComponent,
    SobreNosotrosComponent,
    NoticiasComponent,
    GaleriaComponent,
    ContactoComponent,
    CitaCalendarioComponent,
    LoginComponent,
    RegistroComponent,
    MetodoPagoComponent,
    FooterComponent,
    CrearTipoCorteComponent,
    CrearCorteComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    FullCalendarModule,
    ReactiveFormsModule
  ],
  providers: [CortesPeloService],
  bootstrap: [AppComponent]
})
export class AppModule { }
