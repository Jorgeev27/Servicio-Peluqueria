import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UsuariosService } from 'src/app/services/usuario.service';

@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent {
  registroForm: FormGroup;
  mensaje!: string;

  constructor(private formBuilder: FormBuilder, private usuariosService: UsuariosService) {
    this.registroForm = this.formBuilder.group({
      nombre: ['', Validators.required],
      apellido: ['', Validators.required],
      dni: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      movil: ['', Validators.required],
      id_rol: ['', Validators.required],
      pass: ['', [Validators.required, Validators.minLength(6)]]
    });
  }

  onSubmit() {
    if (this.registroForm.invalid) {
      return;
    }

    const usuario = this.registroForm.value;
    this.usuariosService.registrarUsuario(usuario).subscribe(
      () => {
        this.mensaje = 'Registro exitoso';
        this.registroForm.reset();
      },
      error => {
        this.mensaje = 'Error en el registro';
        console.error(error);
      }
    );
  }
}