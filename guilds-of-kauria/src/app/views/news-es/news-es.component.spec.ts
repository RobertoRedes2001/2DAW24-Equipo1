import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsEsComponent } from './news-es.component';

describe('NewsEsComponent', () => {
  let component: NewsEsComponent;
  let fixture: ComponentFixture<NewsEsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NewsEsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(NewsEsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
