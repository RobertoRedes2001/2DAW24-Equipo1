import { Routes } from '@angular/router';
import { CardsComponent } from './views/cards/cards.component';
import { GameplayComponent } from './views/gameplay/gameplay.component';
import { MainComponent } from './views/main/main.component';
import { NewsComponent } from './views/news/news.component';

export const routes: Routes = [
    { path: '', component: MainComponent },
    { path: '', pathMatch: 'full', redirectTo: '' },
    { path: 'how_to_play', component: GameplayComponent },
    { path: 'cards_list', component: CardsComponent },
    { path: 'news', component: NewsComponent },
];
