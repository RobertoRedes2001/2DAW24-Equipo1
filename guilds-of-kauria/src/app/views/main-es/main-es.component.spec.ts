import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MainEsComponent } from './main-es.component';

describe('MainEsComponent', () => {
  let component: MainEsComponent;
  let fixture: ComponentFixture<MainEsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [MainEsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(MainEsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
