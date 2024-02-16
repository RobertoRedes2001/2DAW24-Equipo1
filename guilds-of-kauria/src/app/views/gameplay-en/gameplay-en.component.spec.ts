import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GameplayEnComponent } from './gameplay-en.component';

describe('GameplayEnComponent', () => {
  let component: GameplayEnComponent;
  let fixture: ComponentFixture<GameplayEnComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [GameplayEnComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(GameplayEnComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
