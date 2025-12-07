import {Weapon} from "./weapon.interface";
import {Size} from "./size.class";

export class Sword implements Weapon {
    constructor(public readonly name: string,
                public readonly size: Size,
                public readonly weight: number,
                public readonly price: number,
                public readonly year: number) {
    }

    get isLegendary(): boolean {
        return false;
    }

    duration(): number {
        if(this.price === 0) {
            return 0;
        }
        return this.weight * this.year / this.price;
    }

    damage(): number {
        if(this.year === 0) {
            return 0;
        }
        let res = (this.weight * this.size.area + this.bonus()) / this.year;;
        if(!this.isLegendary || this.duration() < 10) {
            res *= 0.9; // recupere 90% de la valeur
        }
        return res;
    }

    bonus(): number {
        if(!this.isLegendary || this.year === 0) {
            return 0;
        }
        return this.weight * this.year;
    }


}