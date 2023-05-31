import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrearTipoCorteComponent } from './crear-tipo-corte.component';

describe('CrearTipoCorteComponent', () => {
  let component: CrearTipoCorteComponent;
  let fixture: ComponentFixture<CrearTipoCorteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CrearTipoCorteComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CrearTipoCorteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
