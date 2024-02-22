import { Component } from '@angular/core';
import { CardComponent } from '../../components/card/card.component';
import { NgStyle } from '@angular/common';
import { GlobalConstants } from '../../common/global-constants';
import { ReactiveFormsModule, FormControl } from '@angular/forms';
import { TranslateModule } from '@ngx-translate/core';
import { KauriaService } from '../../services/kauria.service';
import { KauriaCard } from '../../interfaces/kauria.interfaces';


@Component({
  selector: 'app-cards',
  standalone: true,
  imports: [CardComponent, NgStyle, ReactiveFormsModule,TranslateModule],
  templateUrl: './cards.component.html',
  styleUrl: './cards.component.css',
})
export class CardsComponent {
  public constructor(public service : KauriaService ){}
  cardVisibility: boolean = false;
  items: number[] = [1, 2, 3, 4, 5, 6];
  cardType: string = ''; // Variable para almacenar el valor seleccionado del select
  cardEdition: string = '';
  cardStatus: string = GlobalConstants.currentLang === 'es' ? 'Vetada' : 'Banned';
  cardTypeStats: string = '';
  principalInputName = new FormControl('');
  secondaryInputName = new FormControl('');
  amountStats = new FormControl('');
  amountMana = new FormControl('');
  cardsOfDDBB : KauriaCard[] = [];

  public img : string = 'https://pm1.aminoapps.com/6364/ad0ba8b1acfd4f3925c98a5fc7c340834f07bf9f_00.jpg';

  onChangeCardEdition(event: any) {
    this.cardEdition = event.target.value;
  }

  onChangeCardStatus(event: any) {
    this.cardStatus = event.target.value;
  }

  onChangeCardStats(event: any) {
    this.cardTypeStats = event.target.value;
  }

  onChangeCardType(event: any) {
    this.cardType = event.target.value;
  }

  public onSearchByName() {
    this.service.getCardByName(this.principalInputName.value).subscribe((response) => {
      this.cardsOfDDBB = response;
      GlobalConstants.selectedCard = response;
    })
  }

  ngOnInit(){
    this.service.getAllCards().subscribe((response) => {
      this.cardsOfDDBB = response;
      GlobalConstants.selectedCard = response;
    })
  }
}
