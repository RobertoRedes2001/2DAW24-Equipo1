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
  cardVisibility: boolean = false;
  public items:number[]=[1,2,3,4,5,6];
  public cardType: string = 'null'; // Variable para almacenar el valor seleccionado del select

onChangeCardEdition($event: Event) {
throw new Error('Method not implemented.');
}

onChangeCardStatus($event: Event) {
throw new Error('Method not implemented.');
}

onChangeCardStats($event: Event) {
throw new Error('Method not implemented.');
}



 onChangeCardType(event: any) {
  const valorSeleccionado = event.target.value;
  console.log(valorSeleccionado); // Muestra el valor seleccionado en la consola
}

  public cardClicked(){
    //llamada a la api hay resultados
    if(this.cardVisibility===false){
      this.cardVisibility=true;
    }

  }


}
