import {Size} from "./size.class";

export interface Weapon {
    name: string;
    size: Size;
    weight: number;
    price: number;

    duration(): number;
    damage(): number;
    bonus(): number;
}