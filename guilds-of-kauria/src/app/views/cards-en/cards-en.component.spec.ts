import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CardsEnComponent } from './cards-en.component';

describe('CardsEnComponent', () => {
  let component: CardsEnComponent;
  let fixture: ComponentFixture<CardsEnComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CardsEnComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CardsEnComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
