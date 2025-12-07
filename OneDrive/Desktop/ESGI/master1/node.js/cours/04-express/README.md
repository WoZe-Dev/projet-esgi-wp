# Express

1. start project

```shell
npm init -y && npm i -D typescript && npx tsc --init
```

Refaire les étapes du [starter](../01-starter/README.md)

2. Installation d'express

Ajouter la dépendance à express

```shell
npm i express
```

Express sera notre framework de routage de requete HTTP
-> malheuresement express est en JS !
Nous allons devoir installer les définitions d'express

```shell
npm i -D @types/express
```

3. Installation de dotenv

Dotenv est un framework pour gerer
en local les variables d'env

```shell
npm i dotenv
```

## [HTTPS CODES](https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP)

**OK**

- 200: OK
  - La requete est bien traitée
  - Le serveur retourne une donnée
- 201: CREATED
  - La requete est bien traitée
  - Une ressource a été crée sur une serveur
  - Le serveur retourne une donnée
- 204: NO_CONTENT
  - La requete est bien traitée
  - Le serveur n'a rien a retourné


**ERREURS CLIENT**

- 400: BAD_REQUEST
  - La requete est mal formatée -> Il manque des parametres ou ils sont invalides
- 401: UNAUTHORIZED
  - L'utilisateur n'est pas connecté
  - Il manque une session, un token...
- 403: FORBIDDEN
  - Le client bien connecté MAIS il n'a pas les autorisation necessaire
- 404: NOT_FOUND
  - La ressource est introuvable
- 409: CONFLICT
  - La ressource existe déja

**ERREURS SERVEUR**

- 500: INTERNAL_SERVER_ERROR
  - Le script sur serveur n'arrive pas a resoudre la demande
  - c'est votre faute
- 501: UNIMPLEMENTED
  - La route n'est pas encore disponible 

## HTTPS METHODS

- GET: Récuperer une donnée du serveur
- POST: Créer une donnée sur le serveur
- PUT: Modification d'une entité complete sur le serveur
- PATCH: Modification partielle d'une entité
- DELETE: Supprimer une donnée du serveur
- OPTIONS: CORS (cross orign ressource sharing)
  - Autorisation d'acces à un autre nom de domaine
