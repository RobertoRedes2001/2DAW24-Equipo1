import { Component } from '@angular/core';
import { TranslateModule } from '@ngx-translate/core';
import { GlobalConstants } from '../../common/global-constants';
import { KauriaCard } from '../../interfaces/kauria.interfaces';

@Component({
  selector: 'app-detail',
  standalone: true,
  imports: [TranslateModule],
  templateUrl: './detail.component.html',
  styleUrl: './detail.component.css'
})
export class DetailComponent {
  
  public card : KauriaCard[] = GlobalConstants.selectedCard;
  public index : number = GlobalConstants.indexCard;
  
}
