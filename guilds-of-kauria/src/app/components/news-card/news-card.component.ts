import { Component, Input  } from '@angular/core';
import { GlobalConstants } from '../../common/global-constants';
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-news-card',
  standalone: true,
  imports: [RouterLink, RouterLinkActive],
  templateUrl: './news-card.component.html',
  styleUrl: './news-card.component.css'
})
export class NewsCardComponent {
  @Input() image : string = '';
  @Input() title : string = '';
  @Input() newsbody : string = '';
  @Input() date: string = '';
  public readed : string = GlobalConstants.currentLang === 'es' ? 'Leer más...' : 'Read more...';
  public shortnews : string = '';

  @Input() index : number = 0;

  public onClickNews(index:number) {
    GlobalConstants.indexNews = index;
  }

  ngOnInit(){
    this.shortnews = this.newsbody.substring(0, 300)+'...';
  }
}
