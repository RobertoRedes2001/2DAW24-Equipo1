import { NgClass } from '@angular/common';
import { Component } from '@angular/core';
import { TranslateModule } from '@ngx-translate/core';

@Component({
  selector: 'app-game',
  standalone: true,
  imports: [NgClass,TranslateModule],
  templateUrl: './game.component.html',
  styleUrl: './game.component.css'
})
export class GameComponent {

  public changeTextTitle : string = "Ejemplo";
  public changeTextBody : string = "Lorem";
  public learn : boolean = true;

  public onChangeText(title : string, body : string){
    this.changeTextTitle = title;
    this.changeTextBody = body;
    this.learn = true;
  }

}
