import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UsuariosService } from 'src/app/services/usuario.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent {
  /* `registroForm` es una propiedad de la clase `RegistroComponent` que contiene un objeto `FormGroup`
  creado usando el servicio `FormBuilder`. Este formulario se utiliza para recopilar información del
  usuario para registrar un nuevo usuario. */
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

  /**
   * Esta función envía un formulario de registro y muestra un mensaje de éxito o un mensaje de error
   * si hay un problema.
   * @returns Si el `registroForm` no es válido, la función regresará sin ejecutar el resto del código.
   * De lo contrario, registrará al usuario usando `usuariosService` y mostrará un mensaje de éxito
   * usando `Swal.fire()`. Si hay un error, mostrará un mensaje de error y registrará el error en la
   * consola. Finalmente, restablecerá el `registroForm`.
   */
  onSubmit() {
    if (this.registroForm.invalid) {
      return;
    }

    const usuario = this.registroForm.value;
    this.usuariosService.registrarUsuario(usuario).subscribe(
      () => {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Your work has been saved',
          showConfirmButton: false,
          timer: 1500
        })
        this.registroForm.reset();
      },
      error => {
        this.mensaje = 'Error en el registro';
        console.error(error);
      }
    );
  }
}