import { Component, Input  } from '@angular/core';

@Component({
  selector: 'app-news-card',
  standalone: true,
  imports: [],
  templateUrl: './news-card.component.html',
  styleUrl: './news-card.component.css'
})
export class NewsCardComponent {
  @Input() image : string = '';
  @Input() title : string = '';
  @Input() newsbody : string = '';
  @Input() date : string = ''
  public readed : boolean = false;
  public shortnews : string = '';

  public onReadMore(){
    if(this.readed){
      this.shortnews = this.newsbody.substring(0, 300)+'[...]';
      this.readed = false;
    }else{
      this.shortnews = this.newsbody;
      this.readed = true;
    }
    
  }

  ngOnInit(){
    this.shortnews = this.newsbody.substring(0, 300)+'[...]';
  }
}
