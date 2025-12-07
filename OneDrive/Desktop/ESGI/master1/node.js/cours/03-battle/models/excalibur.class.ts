import {Sword} from "./sword.class";
import {Size} from "./size.class";

export class Excalibur extends Sword {

    static readonly instance = new Excalibur();

    private constructor() {
        // super() permet de déclencher le constructeur parent
        super("Excalibur",
            new Size(10, 20),
            100,
            10000000,
            1400);
    }

    get isLegendary(): boolean {
        return true;
    }

    bonus(): number {
        return super.bonus() * 1.3;
    }
}