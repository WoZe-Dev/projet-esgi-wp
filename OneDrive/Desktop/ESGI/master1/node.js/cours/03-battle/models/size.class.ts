export class Size {
    constructor(public readonly height: number,
                public readonly width: number) {
    }

    /**
     * Le mot clé **get** permet de pouvoir déclencher
     * la methode area sans les parentheses
     * @exemple
     * const s = new Size(10, 20);
     * console.log(s.area); // 200
     * @warning
     * La méthode doit impérativement avoir aucun
     * parametre
     */
    get area(): number {
        return this.height * this.width;
    }
}

