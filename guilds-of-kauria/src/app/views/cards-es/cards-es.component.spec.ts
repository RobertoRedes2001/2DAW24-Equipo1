import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CardsEsComponent } from './cards-es.component';

describe('CardsEsComponent', () => {
  let component: CardsEsComponent;
  let fixture: ComponentFixture<CardsEsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CardsEsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CardsEsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
