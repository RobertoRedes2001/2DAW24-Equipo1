import { TestBed } from '@angular/core/testing';

import { KauriaService } from './kauria.service';

describe('KauriaService', () => {
  let service: KauriaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(KauriaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
