import { Component } from '@angular/core';
import { CardComponent } from '../../components/card/card.component';
import { NgStyle } from '@angular/common';
import { GlobalConstants } from '../../common/global-constants';

@Component({
  selector: 'app-cards',
  standalone: true,
  imports: [CardComponent,NgStyle],
  templateUrl: './cards.component.html',
  styleUrl: './cards.component.css'
})
export class CardsComponent {
  cardVisibility: boolean = GlobalConstants.cardsVisibility;
 public items:number[]=[1,2,3,4,5,6];

  public cardClicked(){

    if("llamada a la api hay resultados"){

      GlobalConstants.cardsVisibility=true;
      this.cardVisibility=true;
    }

  }


}
