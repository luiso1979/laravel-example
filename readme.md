Il presente repository è utilizzato per le prove di programmazione da parte dei candidati per le posizioni aperte di Kopjra Srl.

# Direttive comuni e modalità di consegna

E' stata fornita una applicazione dummy in Laravel 5 che risponde esclusivamente alla chiamata `GET /helloworld`. Si prega di estendere l'applicazione, seguendo le direttive indicate nell'esercizio specifico. La soluzione dovrà effettuare anche la validazione dell'input e contenere le classi di test. Non è prevista una deadline per la consegna.

1. Effettuare un fork del presente repository;
1. Eseguire l'esercizio seguendo la descrizione e le consegne indicate;
1. Se si hanno delle domande, si prega di aprire un'issue sul repository stesso;
1. Al termine delle modifiche effettuare una Pull Request.

# Esercizio A
Si prega di estendere l'applicazione, aggiungendo la gestione di almeno altre tre chiamate delle quattro descritte di seguito. Allo sviluppatore è lasciata la libertà di definire la struttura delle chiamate.

1. Numero totale di oggetti per tesoro;
1. Valore totale del bottino per tesoro;
1. Oggetto più ricercato dai clienti;
1. Ogetto più ricercato per tesoro.

Le chiamate devono essere in grado di operare con JSON, sia in input (nel caso) che in output. L'acquisizione degli elementi dovrà avvenire utilizzando le mock request fornite (simulando un modello funzionante) indicate nei file *.json presenti nel repository.

## Esempio modello (mock request json)

```json
{
  "oggetti":[
    {
      "id":34,
      "valore":7,
      "descrizione":"Lapis Lazuli",
      "peso":1.5,
      "certezza":0.3
    },
    ...
  ]
}
```
```json
{
  "richiedenti":[
    {
      "id":1,
      "nome":"Rakmaruk Boulderhide",
      "date":"2003-03-26T14:56:46+0000",
      "budget":43653,
      "oggetti":[
        {
          "id":43,
          "valore":80,
          "quantita":6,
          "totale":480
        },
        ...
      ]
    },
    ...
    ]
}
```

# Esercizio B

L’elemento primitivo utilizzato nel presente esercizio è composto da una coppia così formata: (intero, stringa). Due elementi primitivi per i quali il primo valore intero differisca, sono da considerare sempre e comunque differenti tra loro.

Date in ingresso due collezioni complete di elementi primitivi in ordine qualsiasi, lo scopo della funzione è quello di restituire chiamante un merge delle due collezioni di elementi primitivi, includendo anche la differenza di periodo temporale tra le due collezioni. Per ogni elemento primitivo, inoltre, dovrà essere associato un flag di stato, in grado di identificare le seguenti situazioni:

1. Elemento primitivo presente solo nella prima collezione (flag R);
1. Elemento primitivo presente solo nella seconda collezione (flag A);
1. Elemento primitivo presente in maniera identica in entrambe le collezioni (flag E);
1. Componente stringa dell’elemento primitivo modificata tra la prima e la seconda collezione (flag M; in questo caso, nella collezione finale dovranno essere presenti entrambi i valori stringa).

La funzione dovrà essere accessibile tramite una API RESTful e sia gli ingressi che le uscite dovranno essere in formato JSON. Allo sviluppatore è lasciata la libertà di definire la struttura della chiamata.

Lo sviluppatore dovrà strutturare anche una seconda funzione con propria API RESTful, che sia in grado di comparare due collezioni dato solamente il loro id. La funzione dovrà quindi preoccuparsi di ottenere i dati direttamente dal modello (in questo caso, dovrà essere simulato da apposite mock request json, da allegare alla soluzione).

## Formato input di esempio per la prima funzione
```json
    {
      "collection_a":{
        "id":1,
        "date":"2015-03-25T10:00:00.000Z",
        "objects":[
          {
            "id":1,
            "value":"Foo"
          },
          {
            "id":2,
            "value":"Bar"
          },
          {
            "id":4,
            "value":"Bob"
          }
        ]
      },
      "collection_b":{
        "id":2,
        "date":"2015-03-26T11:00:00.000Z",
        "objects":[
          {
            "id":1,
            "value":"Foo"
          },
          {
            "id":3,
            "value":"Alice"
          },
          {
            "id":4,
            "value":"Eve"
          }
        ]
      }
    }
```

## Formato output di esempio per la prima funzione
```json
    {
      "collections_merge":{
        "collection_a_id":1,
        "collection_b_id":2,
        "delta_period":"P1DT1H",
        "delta":[
          {
            "id":1,
            "value":"Foo",
            "flag":"E"
          },
          {
            "id":2,
            "value":"Bar",
            "flag":"R"
          },
          {
            "id":3,
            "value":"Alice",
            "flag":"A"
          },
          {
            "id":4,
            "values":[
              "Bob",
              "Eve"
            ],
            "flag":"M"
          }
        ]
      }
    }
```
