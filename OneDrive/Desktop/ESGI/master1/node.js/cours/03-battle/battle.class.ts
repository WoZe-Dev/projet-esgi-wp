import {Character} from "./models";

export class Battle {

    static fight(characters: Character[]): Character | undefined {
        if(characters.length === 0) {
            return undefined;
        }
        while(this.countAliveCharacters(characters) >= 2) {
            const firstCharacterIndex = this.randomAliveCharacterIndex(characters);
            let secondCharacterIndex = this.randomAliveCharacterIndex(characters);
            while(firstCharacterIndex === secondCharacterIndex) {
                secondCharacterIndex = this.randomAliveCharacterIndex(characters);
            }
            characters[firstCharacterIndex]!.attack(characters[secondCharacterIndex]!);
        }
        const characterIndex = this.randomAliveCharacterIndex(characters);
        return characters[characterIndex];
    }

    static countAliveCharacters(characters: Character[]): number {
        let count = 0;
        for(const ch of characters) {
            if(ch.health > 0) {
                count += 1;
            }
        }
        return count;
    }

    static randomAliveCharacterIndex(characters: Character[]): number {
        const rollIndex = Math.floor(Math.random() * characters.length);
        const ch = characters[rollIndex];
        if(ch!.health < 0) {
            return this.randomAliveCharacterIndex(characters);
        }
        return rollIndex;
    }
}