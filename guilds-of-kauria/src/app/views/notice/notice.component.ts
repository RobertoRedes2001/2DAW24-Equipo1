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
  public news : KauriaNews[] = GlobalConstants.selectedNews;
  public index : number = GlobalConstants.indexNews;
}
