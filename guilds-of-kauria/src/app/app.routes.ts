import { Routes } from '@angular/router';
import { MainComponent } from './views/main/main.component';


export const routes: Routes = [
    { path: '', component: MainComponent },
    { path: '', pathMatch: 'full', redirectTo: '' },
];
