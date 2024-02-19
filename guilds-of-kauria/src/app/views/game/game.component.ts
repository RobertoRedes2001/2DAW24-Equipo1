import { NgClass } from '@angular/common';
import { Component } from '@angular/core';
import { TranslateModule } from '@ngx-translate/core';
import { GlobalConstants } from '../../common/global-constants';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-game',
  standalone: true,
  imports: [NgClass,TranslateModule],
  templateUrl: './game.component.html',
  styleUrl: './game.component.css'
})
export class GameComponent{
  constructor(private translate: TranslateService) {}
  public changeTextTitle : string = "Ejemplo";
  public changeTextBody : string = "Lorem";
  public learn : boolean = false;

  public onChangeText(ampText:{t:string,b:string}){
    this.changeTextTitle = ampText.t;
    this.changeTextBody = ampText.b;
    this.learn=true;
    
  }

  public clickExample(){
    console.log(GlobalConstants.currentLang);
  
  }

}
