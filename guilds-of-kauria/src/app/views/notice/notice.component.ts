import { Component } from '@angular/core';
import { GlobalConstants } from '../../common/global-constants';
import { KauriaNews } from '../../interfaces/kauria.interfaces';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { TranslateModule } from '@ngx-translate/core';

@Component({
  selector: 'app-notice',
  standalone: true,
  imports: [RouterLink,RouterLinkActive,TranslateModule],
  templateUrl: './notice.component.html',
  styleUrl: './notice.component.css'
})
export class NoticeComponent {
  //recibir de parametros globales la informacion de la pagina de news
  public news : KauriaNews[] = GlobalConstants.selectedNews;
  public index : number = GlobalConstants.indexNews;
}
