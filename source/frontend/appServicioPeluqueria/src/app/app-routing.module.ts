import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainComponent } from './components/main/main.component';
import { LoginComponent } from './components/login/login.component';
import { RegistroComponent } from './components/registro/registro.component';
import { SobreNosotrosComponent } from './components/sobre-nosotros/sobre-nosotros.component';
import { NoticiasComponent } from './components/noticias/noticias.component';
import { CortesPeloComponent } from './components/cortes-pelo/cortes-pelo.component';
import { MetodoPagoComponent } from './components/metodo-pago/metodo-pago.component';
import { GaleriaComponent } from './components/galeria/galeria.component';
import { ContactoComponent } from './components/contacto/contacto.component';
import { CitaCalendarioComponent } from './components/cita-calendario/cita-calendario.component';



const routes: Routes = [
  {path: '', component: MainComponent},
  {path: 'login', component: LoginComponent},
  {path: 'registro', component: RegistroComponent},
  {path: 'sobreNosotros', component: SobreNosotrosComponent},
  {path: 'noticias', component: NoticiasComponent},
  {path: 'productos', component: CortesPeloComponent},
  {path: 'metodoPago', component: MetodoPagoComponent},
  {path: 'galeria', component: GaleriaComponent},
  {path: 'contacto', component: ContactoComponent},
  {path: 'cita', component: CitaCalendarioComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }