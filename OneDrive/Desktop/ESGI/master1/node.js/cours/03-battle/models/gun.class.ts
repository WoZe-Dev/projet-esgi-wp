import { Size } from "./size.class";
import {Weapon} from "./weapon.interface";

export class Gun implements Weapon {
    readonly name: string;
    readonly size: Size;
    readonly weight: number;
    readonly price: number;
    readonly bullets: number;

    constructor(name: string,
                size: Size,
                weight: number,
                price: number,
                bullets: number) {
        this.name = name;
        this.size = size;
        this.weight = weight;
        this.price = price;
        this.bullets = bullets;
    }

    duration(): number {
        if(this.weight === 0) {
            return 0;
        }
        return this.price / this.weight * this.damage();
    }

    damage(): number {
        const area = this.size.area;
        if(area === 0) {
            return 0;
        }
        return this.weight / area + this.bonus();
    }

    bonus(): number {
        if(this.bullets === 0) {
            return 0;
        }
        const res = this.weight % this.bullets;
        if(res === 0) {
            return 0;
        }
        return (this.bullets * this.weight) / res;
    }
}