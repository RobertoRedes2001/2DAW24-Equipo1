import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-card',
  standalone: true,
  imports: [],
  templateUrl: './card.component.html',
  styleUrl: './card.component.css',
})
export class CardComponent {
  @Input() title: string = 'Michi';
  @Input() img: string =
    'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Flacocinadebender.com%2Fwp-content%2Fuploads%2F2016%2F07%2Fvideo-gatos-gordos-graciosos.jpg%3Fis-pending-load%3D1&f=1&nofb=1&ipt=1ff8ed8ed020b04493e71584053968b1d3a5f5499497c18774d4769c2c302d64&ipo=images';
  @Input() littleDescription: string = 'The legendary Michi';
}
