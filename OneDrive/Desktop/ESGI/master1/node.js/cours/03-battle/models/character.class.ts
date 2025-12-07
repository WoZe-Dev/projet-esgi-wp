import {Weapon} from "./weapon.interface";

export class Character {
    public health: number;
    public readonly hitChance: number;

    constructor(public readonly name: string,
                health: number,
                public weapon?: Weapon | undefined) {
        if(health < 25000) {
            this.health = 25000
        } else {
            this.health = health;
        }
        // 0.5 -> 50 + (0.5 * 20) -> 60
        // 0.2 -> 50 + (0.2 * 20) -> 54
        // 0 -> 50 + (0 * 20) -> 50
        // 1 -> 50 + (1 * 20) -> 70
        this.hitChance = 50 + Math.random() * 20;
    }

    protect(damage: number): void {
        this.health -= damage * 0.55;
    }

    attack(target: Character): boolean {
       const roll = Math.random() * 100;
       if(roll < this.hitChance) {
           const dmg = this.weapon?.damage() || 0;
           target.protect(dmg * 1.13);
           return true;
       }
       return false;
    }

}