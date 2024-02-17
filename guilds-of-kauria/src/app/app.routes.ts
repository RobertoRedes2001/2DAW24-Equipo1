import { Routes } from '@angular/router';
import { MainEsComponent } from './views/main-es/main-es.component';
import { MainEnComponent } from './views/main-en/main-en.component';
import { CardsEsComponent } from './views/cards-es/cards-es.component';
import { CardsEnComponent } from './views/cards-en/cards-en.component';
import { GameplayEsComponent } from './views/gameplay-es/gameplay-es.component';
import { GameplayEnComponent } from './views/gameplay-en/gameplay-en.component';
import { NewsEnComponent } from './views/news-en/news-en.component';
import { NewsEsComponent } from './views/news-es/news-es.component';


export const routes: Routes = [
    { path: 'es', component: MainEsComponent },
    { path: '', pathMatch: 'full', redirectTo: 'es' },
    { path: 'en', component: MainEnComponent },
    { path: 'es/game', component: GameplayEsComponent },
    { path: 'en/game', component: GameplayEnComponent },
    { path: 'es/cards', component: CardsEsComponent },
    { path: 'en/cards', component: CardsEnComponent },
    { path: 'es/news', component: NewsEsComponent },
    { path: 'en/news', component: NewsEnComponent },
];
