# FILES

```shell
npm init -y && npm i -D typescript && npx tsc --init
```

--- 

NodeJS etant un framework JS, il est impossible d'utiliser
les classes et fichiers directemnt en TS, il est impértif
d'installer le framework `@types/node`

```shell
npm i -D @types/node
```

---

## Mécanisme des Promises

Tout traitement asynchrone retourne une Promise
-> traitment asynchrone est un traitement non bloquant en tache de fond

Une `Promise` est une promesse de récuperer une réponse 
    -> Elle peut soit etre résolue avec succès
    -> Soit échouée
Lorsque vous déclenchez une fonction qui retourne une promesse VOUS etes dans l'obligation
d'attendre le resultat

```ts
async function getStr(): Promise<string> {
    await new Promise((resolve, reject) => setTimeout(resolve, 20000)); // ATTENDRE 20SEC
    return "BONJOUR";
}
```

Le mot clé async permet de déclarer au systeme que votre function doit d'éxecuter en tache de fond
=> Une fonction async RETOURNE FORCEMENT une Promise
=> TOUTE Promise etre attendu avec le mot `await` (attention le mot clé await peut etre UNIQUMENT des fonctions async)

Si on veut appeler la fonction getStr on est obligé aussi de l'attendre comme elle retourne une Promise
```ts
async function test(): Promise<void> {
    const s1 = getStr();
    const res = await s1;
    console.log(res); // BONJOUR au bout de 20sec
    const res2 = await s1;
    console.log(res2); // BONJOUR instant
}
```

L'ancienne mecanisme sans async/await est legerement plus difficile mais obligatoire
si vous ne pouvez pas créer une fonction async

```ts
getStr().then(function(s1: string) {
    // CODE DECLENCHEN ICI AU BOUT DE 20sec et s1=BONJOUR
    console.log(s1); // BONJOUR
}).catch(function(err) { 
    // CODE DECLENCHE ICI QUAND ERREUR EST SURVENUE
})
```

## Les fichiers

lecture de fichier -> fonction readFile

```ts
import {readFile} from 'fs/promises';

async function app(): Promise<void> {
    const data = await readFile("chemin/du/fichier");
    const txt = data.toString('utf8'); // cette fonction permet de converir le Buffer en chaine de caractètre 
    console.log(txt);
}
```

ecriture de fichier -> fonction writeFile
-> ecrase le fichier, si le fichier n'existe pas, il est crée

```ts
import {writeFile} from 'fs/promises';

async function app(): Promise<void> {
    await writeFile("chemin/du/fichier", "contenu entier du fichier");
}
```

ecrire à la fin d'un fichier -> fonction appendFile
-> si le fichier n'existe pas , ilest crée
-> n'ecrase pas le fichier

```ts
import {appendFile} from 'fs/promises';

async function app(): Promise<void> {
    await appendFile("chemin/du/fichier", "contenu du fichier ajouté à la fin");
}
```


