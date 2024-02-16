import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GameplayEsComponent } from './gameplay-es.component';

describe('GameplayEsComponent', () => {
  let component: GameplayEsComponent;
  let fixture: ComponentFixture<GameplayEsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [GameplayEsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(GameplayEsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
