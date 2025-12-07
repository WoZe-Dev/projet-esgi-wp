```shell
npm init -y
npm i -D typescript
npx tsc --init
```

- Décommenter `outDir` dans tsconfig.json et mettre en false le `verbatimModuleSyntax`
- Créer le fichier `index.ts`

package.json
```json
{
  "scripts": {
    "start": "node dist/index.js",
    "build": "tsc",
    "dev": "npm run build && npm start"
  }
}
```

```shell
npm run dev
```

## Héritage en Typescript / JS

- Une classe peut hériter d'une autre classe (ce qui permet de récupérer 
tout son comportement et de l'ameliorer au besoin)
- Une peut hériter que d'une seule classe

```ts
class User {
    public login: string;

    constructor(login: string) {
        this.login = login;
    }

    // Math.round -> [0-1]
    random(): number {
        return Math.round(Math.random() * 100);
    }
}

class SuperUser extends User {
    public secureToken: string;

    constructor(login: string, st: string) {
        super(login);
        this.secureToken = st;
    }
    
    // change le comportement au lieu d'avoir une valeur entre 0 et 100
    /// On aura une valeur entre 0 et 1000
    random(): number {
        return super.random() * 10;
    }
}
```

---

Afin de pallier au probleme d'héritage multiple, on peut JS/TS
implémenter plusieurs interface

```ts
import {User} from "./user.class";

interface Secure {
    password: string;
    alg: string;
}

interface HistoryDate {
    lastConnectedDate?: Date;
}

class User implements Secure, HistoryDate {
    alg: string;
    lastConnectedDate?: Date;
    password: string;

    constructor(password: string, alg: string) {
        this.password = password;
        this.alg = alg;
    }
}

const histories: HistoryDate[] = [];
const u1 = new User("azertyuiop", "SHA256");
histories.push(u1); // un user EST aussi un HistoryDate
```

