import { Component } from '@angular/core';
import { NewsCardComponent } from '../../components/news-card/news-card.component';
import { TranslateModule } from '@ngx-translate/core';
import { KauriaService } from '../../services/kauria.service';
import { KauriaNews } from '../../interfaces/kauria.interfaces';
import { GlobalConstants } from '../../common/global-constants';

@Component({
  selector: 'app-news',
  standalone: true,
  imports: [NewsCardComponent,TranslateModule],
  templateUrl: './news.component.html',
  styleUrl: './news.component.css'
})
export class NewsComponent {

  public constructor(public service : KauriaService ){}
  newsOfDDBB : KauriaNews[] = [];
  image : string = 'https://i.ytimg.com/vi/M1WBcQrlUeQ/maxresdefault.jpg';
  
  ngOnInit(){
    this.service.getAllNews().subscribe((response) => {
      this.newsOfDDBB = response;
      GlobalConstants.selectedNews = response;
    })
  }
}
