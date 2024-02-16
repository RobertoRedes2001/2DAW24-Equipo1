import { Component, Input  } from '@angular/core';

@Component({
  selector: 'app-news-card',
  standalone: true,
  imports: [],
  templateUrl: './news-card.component.html',
  styleUrl: './news-card.component.css'
})
export class NewsCardComponent {
  //@Input() image : string = '';
  @Input() title : string = '';
  @Input() newsbody : string = '';
  public shortnews : string = this.newsbody.substring(299)+"...";

  public onReadMore(){
    this.shortnews = this.newsbody;
  }
}
