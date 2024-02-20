import { Component } from '@angular/core';
import { NewsCardComponent } from '../../components/news-card/news-card.component';
import { TranslateModule } from '@ngx-translate/core';

@Component({
  selector: 'app-news',
  standalone: true,
  imports: [NewsCardComponent,TranslateModule],
  templateUrl: './news.component.html',
  styleUrl: './news.component.css'
})
export class NewsComponent {

  public title : string = "¡GUILDS OF KAURA HA SALIDO!";
  public date : string = "31-01-01";
  public body : string = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium vitae mauris vel tincidunt. Nulla auctor dui eu ultrices gravida. Mauris ut facilisis justo. Morbi et odio mauris. Donec id dui quis orci euismod aliquet sed ut leo. Pellentesque congue convallis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In blandit ante non imperdiet auctor. Proin maximus diam eu mi lacinia fermentum. In non quam in mi aliquet vestibulum. Aliquam erat volutpat. Aliquam non ex tempus, interdum sem ut, lacinia augue. Donec porta est nisl, ut condimentum purus hendrerit non. Pellentesque interdum dignissim odio sed suscipit. Nulla eu vehicula enim. Morbi egestas risus in sodales efficitur. Etiam egestas, nibh quis faucibus sagittis, magna velit auctor lectus, vitae eleifend neque mauris ut magna. Donec id neque tellus. Aenean volutpat purus gravida est interdum, vel finibus risus auctor. Fusce dapibus, sem a aliquam posuere, eros enim tempus odio, non ullamcorper dui massa laoreet nunc. Nunc facilisis ex tempus urna ultricies, a venenatis lacus accumsan. Nulla ut risus odio. Suspendisse sit amet lorem semper, dignissim nisl at, rutrum ante. Suspendisse dignissim sagittis sem. Sed imperdiet eu dui id lacinia. Pellentesque rutrum maximus neque, non pretium est tincidunt eget. Nam diam massa, convallis nec bibendum luctus, varius at quam. Maecenas non iaculis sapien. Morbi bibendum lacus mauris. Nullam at egestas quam. Sed varius tortor non hendrerit convallis. Pellentesque odio metus, sodales ut arcu porta, maximus pharetra lorem. Maecenas luctus, turpis id convallis ornare, dui diam lobortis eros, ac lobortis tortor est in justo. Duis ut posuere magna. Fusce tincidunt turpis enim, quis scelerisque nibh dignissim ac. Praesent iaculis fringilla mi, non viverra eros semper quis. Suspendisse consectetur tempus diam, id mattis ligula mattis nec. Nullam a porta sapien. Nunc ultricies pellentesque aliquam. Aliquam urna diam, auctor vel urna nec, mattis scelerisque tellus. Suspendisse ultricies fermentum est sit amet accumsan. Nulla in imperdiet lacus. Duis non ex ex. Aliquam facilisis purus ac ipsum condimentum, at maximus felis sagittis. Duis condimentum, sapien sed tristique suscipit, turpis tortor tempor tellus, eget congue augue nisi ac est. Aliquam ultricies urna vitae fermentum faucibus. Aenean euismod maximus nulla, in mollis enim commodo ut. Quisque eu mauris vitae neque ornare tincidunt vel facilisis massa. Nam congue, diam in aliquam interdum, libero arcu facilisis arcu, vitae rhoncus augue augue at nulla. Vestibulum euismod id dui ac hendrerit. Nulla facilisi. Quisque vel odio at risus dignissim tempus. Aliquam molestie lectus ac interdum scelerisque. In eget euismod ipsum. Maecenas ut ullamcorper risus. Maecenas ac finibus diam. Donec odio velit, viverra a tristique vel, vestibulum sed lacus.";
  public img : string = "https://images.pexels.com/photos/20787/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1";

  public ejemplo : {t:string,d:string,b:string,i:string} = {t:this.title,d:this.date,b:this.body,i:this.img};

  public ejemplos : {t:string,d:string,b:string,i:string}[] = [this.ejemplo,this.ejemplo,this.ejemplo,this.ejemplo];
}
