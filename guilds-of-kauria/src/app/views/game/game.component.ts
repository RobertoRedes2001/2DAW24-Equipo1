import { NgClass } from '@angular/common';
import { Component } from '@angular/core';
import { TranslateModule } from '@ngx-translate/core';
import { GlobalConstants } from '../../common/global-constants';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'app-game',
  standalone: true,
  imports: [NgClass,TranslateModule],
  templateUrl: './game.component.html',
  styleUrl: './game.component.css'
})
export class GameComponent{
  constructor(private translate: TranslateService) {}

  public changeTextTitle : string = "Ejemplo";
  public changeTextBody : string = "Lorem";
  public learn : boolean = false;

  public action_es : {t:string,b:string} = 
  {t:"ACCIONES DE JUEGO", b:"<ul><li><b>GIRAR Y ENDEREZAR:</b> Girar una carta es ponerla de lado; esto significa que se usó durante el turno. Haces esto cuando usas una tierra para producir maná, cuando atacas con una criatura o cuando activas una habilidad que tiene el símbolo como parte del coste ( significa “gira este permanente”).  Cuando se gira un permanente, no puedes girarlo de nuevo hasta que se endereza (se pone derecho de nuevo).  En cuanto empieza tu turno, endereza tus cartas giradas para que puedas usarlas de nuevo.</li><li><b>LANZAR HECHIZOS:</b> Para lanzar un hechizo, debes pagar su coste de maná (ubicado en la esquina superior derecha de la carta) girando tierras (u otros permanentes) para generar la cantidad y tipo de maná que requiere el hechizo. Por ejemplo, si fueras a lanzar el Ángel de Serra, que cuesta , podrías girar tres tierras básicas de cualquier tipo para pagar más dos Llanuras para pagar Una vez que hayas lanzado el hechizo, puede ocurrir una de estas dos cosas. Si el hechizo es un instantáneo o un conjuro, sigues las instrucciones en la carta y luego pones la carta en tu cementerio. Si el hechizo es una criatura, artefacto, encantamiento, pones la carta en la mesa frente a ti. La carta está ahora en el campo de batalla.</li></ul>"};

  public action_en : {t:string,b:string} = 
  {t:"GAME ACTIONS", b:"<ul><li><b>TURN AND UPRIGHT:</b> Turning a card is putting it sideways; this means it was used during the turn. You do this when you use a land to produce mana, when you attack with a creature, or when you activate an ability that has the symbol as part of the cost ( means “turn this permanent”). When a permanent is turned, you can't turn it again until it's upright (put upright again). As soon as your turn begins, straighten out your turned cards so you can use them again.</li><li><b>CASTING SPELLS:</b> To cast a spell, you must pay its mana cost (located in the upper right corner of the card) by turning lands (or other permanents) to generate the amount and type of mana required by the spell. For example, if you were to cast Serra Angel, which costs , you could turn three basic lands of any type to pay plus two Plains to pay Once you've cast the spell, one of two things can happen. If the spell is an instant or sorcery, follow the instructions on the card and then put the card in your graveyard. If the spell is a creature, artifact, enchantment, put the card on the table in front of you. The card is now on the battlefield.</li></ul>"};

  public atk_es : {t:string,b:string} = 
  {t:"ATACAR Y BLOQUEAR", b:""};

  public atk_en : {t:string,b:string} = 
  {t:"ATTACK AND BLOCK", b:""};

  public turn_es : {t:string,b:string} = 
  {t:"PARTES DEL TURNO", b:""};

  public turn_en : {t:string,b:string} = 
  {t:"PARTS OF THE TURN", b:""};
  
  public onChangeText(ampText:{t:string,b:string}){
    this.changeTextTitle = ampText.t;
    this.changeTextBody = ampText.b;
    this.learn=true;
    
  }

}
