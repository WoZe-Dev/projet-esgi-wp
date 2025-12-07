import {Character, Excalibur, Gun, Size, Sword} from "./models";
import {Battle} from "./battle.class";

const w1 = new Sword("Knife",
    new Size(3, 1),
    1,
    1,
    2025);

const g1 = new Gun("AK-47", new Size(1, 2), 15, 2000, 100);

const e1 = Excalibur.instance;

const j1 = new Character("Benoit", 25000, w1);
const j2 = new Character("Julien", 25000, w1);
const j3 = new Character("Benjamin", 25000, w1);

const arena = [j1, j2, j3]

const winner = Battle.fight(arena);

console.log(winner);
