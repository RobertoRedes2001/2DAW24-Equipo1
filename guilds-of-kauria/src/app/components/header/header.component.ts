import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { TranslateService } from '@ngx-translate/core';
import {TranslateModule} from '@ngx-translate/core';


@Component({
  selector: 'app-header',
  standalone: true,
  imports: [RouterLink, RouterLinkActive,TranslateModule],
  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent {

  constructor (private translateService : TranslateService){
    this.translateService.setDefaultLang('es');
  }

  public switchLanguage(lan : string){
    this.translateService.use(lan);
  }
}
