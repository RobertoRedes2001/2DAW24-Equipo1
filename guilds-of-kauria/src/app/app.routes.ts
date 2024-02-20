import { Routes } from '@angular/router';
import { MainComponent } from './views/main/main.component';
import { GameComponent } from './views/game/game.component';
import { CardsComponent } from './views/cards/cards.component';
import { NewsComponent } from './views/news/news.component';
import { DetailComponent } from './views/detail/detail.component';


export const routes: Routes = [
    { path: '', component: MainComponent },
    { path: '', pathMatch: 'full', redirectTo: '' },
    { path: 'cards', component: CardsComponent },
    { path: 'cards/detail', component: DetailComponent },
    { path: 'game', component: GameComponent },
    { path: 'news', component: NewsComponent },
];
