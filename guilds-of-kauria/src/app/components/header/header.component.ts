import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { TranslateService } from '@ngx-translate/core';
import {TranslateModule} from '@ngx-translate/core';
import { GlobalConstants } from '../../common/global-constants';


@Component({
  selector: 'app-header',
  standalone: true,
  imports: [RouterLink, RouterLinkActive,TranslateModule],
  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent {

  constructor (private translateService : TranslateService){}

  //Cambia el lenguaje de la pagina entre español o ingles
  public switchLanguage(lan : string){
    this.translateService.use(lan);
    GlobalConstants.currentLang=lan;
    localStorage.setItem('selectedLanguage', lan);
    window.location.reload();
  }
}
