import { Component } from '@angular/core';
import { NewsCardComponent } from '../../components/news-card/news-card.component';

@Component({
  selector: 'app-news-es',
  standalone: true,
  imports: [NewsCardComponent],
  templateUrl: './news-es.component.html',
  styleUrl: './news-es.component.css'
})
export class NewsEsComponent {
  public news_title : string = "GUILDS OF KAURIA ESTA ABIERTO";
  public news_body : string = "Por otra parte, denunciamos con justa indignación y disgusto a los hombres que están tan engañados y desmoralizados por los encantos del placer del momento, tan cegados por el deseo, que no pueden prever el dolor y los problemas que seguramente seguirán; e igual La culpa es de quienes fallan en su deber por debilidad de voluntad, lo que es lo mismo que decir por huir del trabajo y del dolor. Estos casos son perfectamente simples y fáciles de distinguir. En una hora libre, cuando nuestro poder de elección está libre y Cuando nada impide que podamos hacer lo que más nos gusta, todo placer debe ser bienvenido y todo dolor evitado, pero en determinadas circunstancias y debido a las exigencias del deber o de las obligaciones de los negocios, ocurrirá frecuentemente que los placeres deban ser repudiados. y las molestias aceptadas. El hombre sabio, por tanto, se atiene siempre en estas materias a este principio de selección: rechaza los placeres para asegurarse otros placeres mayores, o bien soporta los dolores para evitar dolores peores.";
  public news_img : string = "https://i.ytimg.com/vi/gJz36GITHWk/hqdefault.jpg";
  public news_date : string = '01-01-2024';
}
