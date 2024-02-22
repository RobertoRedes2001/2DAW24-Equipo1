import { Component, Input } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { GlobalConstants } from '../../common/global-constants';

@Component({
  selector: 'app-card',
  standalone: true,
  imports: [RouterLink, RouterLinkActive],
  templateUrl: './card.component.html',
  styleUrl: './card.component.css',
})
export class CardComponent {
  @Input() title: string = '';
  @Input() img: string = '';
  @Input() littleDescription: string = '';
  @Input() index : number = 0;

  public onClickCard(index:number) {
    GlobalConstants.indexCard = index;
  }
}
