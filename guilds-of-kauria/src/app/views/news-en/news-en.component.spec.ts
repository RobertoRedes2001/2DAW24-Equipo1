import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsEnComponent } from './news-en.component';

describe('NewsEnComponent', () => {
  let component: NewsEnComponent;
  let fixture: ComponentFixture<NewsEnComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NewsEnComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(NewsEnComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
