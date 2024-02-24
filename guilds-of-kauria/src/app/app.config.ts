import { ApplicationConfig } from '@angular/core';
import { provideRouter } from '@angular/router';
import { routes } from './app.routes';
import { HttpClient, provideHttpClient } from '@angular/common/http';
import { TranslateModule, TranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';



export const appConfig: ApplicationConfig = {
  providers: [provideRouter(routes), provideHttpClient(),
    TranslateModule.forRoot({
      defaultLanguage: getSelectedLanguage(),
      loader: {
        provide: TranslateLoader,
        useFactory: HttpLoaderFactory,
        deps: [HttpClient]
      }
    }).providers!]
};

// required for AoT 
export function HttpLoaderFactory(http: HttpClient) {
  return new TranslateHttpLoader(http);
}

//Funcion para recuperar el lenguaje almacenado en local
function getSelectedLanguage(): string {
  const selectedLanguage = localStorage.getItem('selectedLanguage');
  return selectedLanguage || 'es'; 
}







