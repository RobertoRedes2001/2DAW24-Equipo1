import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/internal/Observable';
import { KauriaCard, KauriaNews } from '../interfaces/kauria.interfaces';

@Injectable({
  providedIn: 'root'
})
export class KauriaService {

  constructor(public http : HttpClient) { }
  //Recoge todas las cartas de la BBDD
  public getAllCards():Observable<KauriaCard[]>{
    return this.http.get<KauriaCard[]>('http://localhost:8000/allCards')
  }
  //Recoge todas las cartas que coincidan con la busqueda de la BBDD
  public getCardByName(name:string | null):Observable<KauriaCard[]>{
    return this.http.get<KauriaCard[]>('http://localhost:8000/cardName/'+name)
  }
  //Recoge todas las noticias de la BBDD
  public getAllNews():Observable<KauriaNews[]>{
    return this.http.get<KauriaNews[]>('http://localhost:8000/allNews')
  }
}
