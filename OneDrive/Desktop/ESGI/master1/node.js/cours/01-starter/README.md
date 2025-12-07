# NODE JS

## Setup

Installation de [nvm](https://github.com/nvm-sh/nvm) ou [nvm-windows](https://github.com/coreybutler/nvm-windows)

- Interet: Pouvoir changer de version de node sans action manuelle


Installer Node, aller voir la derniere version 'main' `node LTS` [lien](https://nodejs.org/fr/download)

- Avec `nvm` pour voir toutes les versions installées sur votre machine il faut utilser la commande
```shell
nvm ls
```
- Pour installer une nouvelle version `nvm install XXX`
```shell
nvm install 22.20
```

- Si on veut changer de version (déja installé sur la machine), `nvm use XXX`
- La version LTS du jour: v22.20.0

## Création d'un projet

On utilise la commande npm (Node Package Manager)

```shell
npm init
```

avec l'option -y qui permet de valider automatiquement la création du projet

## Installation de package

Il est possible voir la liste des packages dispo sur [npmjs](https://www.npmjs.com)

Pour installer un package : `npm install XXX`

```shell
npm install -D typescript
```

L'option -D permet de sauvegarder la dependance uniquement pour le developpement

Il existe un alias pour eviter d'ecrire install à chaque fois => i

---

Si vous recuperez un projet node sans **node_modules** il est impératif de 
les installer en utilisant la commande `npm i` qui va installer TOUS les packages
définis dans le fichier package.json

ATTENTION, si vous souhaitez installer UNIQUEMENT les dependances de prod
`npm i --omit dev`

## Typescript

Typescript est un framework permettant de "compiler" du typescript en javascript

Apres installation du pacakge, si on souhaite compiler il faut tout d'abord preparer le projet

```shell
npx tsc --init
```

npx -> Node Pacakge Execute -> ça permet d'executer les binaires qui sont dans le repertoire
`node_modules/.bin`

Cette commande va vous initialiser le fichier `tsconfig.json`

Important décommenter la clé `outDir`

Pour compiler le programme
```shell
npx tsc
```

et enfin pour exectuer le programme
```shell
node dist/bonjour.js
```

## Configuration du projet

Afin de lancer le programme de maniere plus conventionnelle
il faut ajouter le script de démarrage au package.json dans la rubrique `scripts`
```json
{"start": "node dist/bonjour.js"}
```
Maintenant pour lancer le programme :
```shell
npm start
```

De la meme maniere pour compiler; il est préférable de faire script
```json
{"build": "tsc"}
```
Maintenant pour compiler le programme :
```shell
npm run build
```