export interface KauriaCard {
    carta_cod:         number;
    nombre:            string;
    habilidad_recurso: string;
    habilidad_batalla: string;
    coste:             string;
    estado_carta:      string;
    vida:              number;
    rareza:            string;
    observaciones:     string;
    foto:              string;
    defensa:           number;
    ataque:            number;
    tipo_carta:        string;
    texto:             string;
    puntos_victoria:   number;
}

export interface KauriaNews {
    noticia_cod:       number;
    fecha_publicacion: FechaPublicacion;
    titulo:            string;
    texto:             string;
    foto:              string;
    tienda:            Tienda;
}

export interface FechaPublicacion {
    date:          string;
    timezone_type: number;
    timezone:      string;
}

export interface Tienda {
}