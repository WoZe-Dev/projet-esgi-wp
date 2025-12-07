import {readFile, appendFile} from 'fs/promises';

async function main() : Promise<void> {
    const data = await readFile("lang.txt");
    const txt = data.toString('utf-8');
    console.log(txt);
}

async function main2() : Promise<void> {
    const words = [
        "bonjour",
        "hello",
        "yassas",
        "buongiorno",
        "ola",
        "hola",
        "guten tag"
    ];
    const idx = Math.floor(Math.random() * words.length);
    const word = words[idx];
    await appendFile("lang.txt", word + "\n");
}

main2().then(function() {
    console.log("done");
});