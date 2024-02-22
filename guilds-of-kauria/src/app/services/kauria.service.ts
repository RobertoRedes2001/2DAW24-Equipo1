import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/internal/Observable';
import { KauriaCard } from '../interfaces/kauria.interfaces';

@Injectable({
  providedIn: 'root'
})
export class KauriaService {

  constructor(public http : HttpClient) { }
  public getAllCards():Observable<KauriaCard[]>{
    return this.http.get<KauriaCard[]>('http://localhost:8001/allCards')
  }

  public getCardByName(name:string | null):Observable<KauriaCard[]>{
    return this.http.get<KauriaCard[]>('http://localhost:8001/cardName/'+name)
  }
}
