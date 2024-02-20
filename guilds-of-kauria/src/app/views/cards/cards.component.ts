import { Component } from '@angular/core';
import { CardComponent } from '../../components/card/card.component';
import { NgStyle } from '@angular/common';
import { GlobalConstants } from '../../common/global-constants';
import { ReactiveFormsModule, FormControl } from '@angular/forms';


@Component({
  selector: 'app-cards',
  standalone: true,
  imports: [CardComponent,NgStyle,ReactiveFormsModule],
  templateUrl: './cards.component.html',
  styleUrl: './cards.component.css'
})
export class CardsComponent {



  cardVisibility: boolean = false;
  items:number[]=[1,2,3,4,5,6];
  cardType: string = ''; // Variable para almacenar el valor seleccionado del select
  cardEdition:string="";
  cardStatus:string="";
  cardTypeStats:string="";
  principalInputName = new FormControl('');
  secondaryInputName = new FormControl('');
  amountStats = new FormControl('');
  amountMana = new FormControl('');



onChangeCardEdition(event: any) {
this.cardEdition=event.target.value;
}

onChangeCardStatus(event: any) {
  this.cardStatus=event.target.value;
}

onChangeCardStats(event: any) {
  this.cardTypeStats=event.target.value;
}



 onChangeCardType(event: any) {
  this.cardType=event.target.value;
}

  public buttonFilterClicked(){
    //llamada a la api hay resultados
    if(this.cardVisibility===false){
      this.cardVisibility=true;
  console.log('Tipo de carta seleccionado:', this.cardType);
  console.log('Edición de la carta seleccionada:', this.cardEdition);
  console.log('Estado de la carta seleccionado:', this.cardStatus);
  console.log('Estadísticas del tipo de carta seleccionado:', this.cardTypeStats);
  console.log('Valor del primer input:', this.principalInputName.value);
  console.log('Valor del segundo input:', this.secondaryInputName.value);
  console.log('Cantidad de estadísticas:', this.amountStats.value);
  console.log('Cantidad de mana:', this.amountMana.value);
    }

  }

  public firstButtonClicked(){
    //llamada a la api hay resultados
    if(this.cardVisibility===false){
      this.cardVisibility=true;
  console.log('Tipo de carta seleccionado:', this.cardType);
  console.log('Edición de la carta seleccionada:', this.cardEdition);
  console.log('Estado de la carta seleccionado:', this.cardStatus);
  console.log('Estadísticas del tipo de carta seleccionado:', this.cardTypeStats);
  console.log('Valor del primer input:', this.principalInputName.value);
  console.log('Valor del segundo input:', this.secondaryInputName.value);
  console.log('Cantidad de estadísticas:', this.amountStats.value);
  console.log('Cantidad de mana:', this.amountMana.value);
    }

  }


}
