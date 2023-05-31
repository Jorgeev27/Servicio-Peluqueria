import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrearCorteComponent } from './crear-corte.component';

describe('CrearCorteComponent', () => {
  let component: CrearCorteComponent;
  let fixture: ComponentFixture<CrearCorteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CrearCorteComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CrearCorteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
