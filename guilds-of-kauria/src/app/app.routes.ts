import { Routes } from '@angular/router';
import { CardsComponent } from './views/cards/cards.component';
import { GameplayComponent } from './views/gameplay/gameplay.component';
import { MainComponent } from './views/main/main.component';
import { NewsCardComponent } from './components/news-card/news-card.component';

export const routes: Routes = [
    { path: '', component: MainComponent },
    { path: '', pathMatch: 'full', redirectTo: '' },
    { path: 'how_to_play', component: GameplayComponent },
    { path: 'cards_list', component: CardsComponent },
    { path: 'news', component: NewsCardComponent },
];
