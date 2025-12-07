console.log("Typescript <3");

// Les types du JS ?
// string
// number (int, float, double, ...)
// undefined (rien)
// object (null, array, etc)
// boolean
// function (traitement)

console.log("1. strings");
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/String

// Le mot clé pour créer une variable -> let
// Le mot clé pour créer une constante -> const

const s1 = "test"; // En TS certains types sont implicites
const s2: string = "test2"; // On peut le forcer en faisant variable: type

// Pour compter la taille d'une chaine de caractères
console.log(s1.length); // 4
// Access au caractère à l'indice 2 de la chaine
console.log(s1[2]); // s

// Pour fusionner deux chaines :
const s3 = s1 + s2;
console.log(s3); // testtest2

// Pour injecter des informations dans une chaine :
const s4 = `bonjour ${s1} blabla ${s2} esgi`; // alt gr 7 OU `
console.log(s4); // bonjour test blabla test2 esgi

console.log("2. arrays");
const arr1: number[] = [1, 2, 3]; // init avec 3 valeurs
arr1.push(12); // il est possible d'ajouter UNIQUEMENT des elements du bon type
// arr1.push("") ERR
console.log(arr1); // [1, 2 ,3, 12]
const arr2: number[] = [4, ...arr1, 29]; // eq [4, 1, 2, 3, 12, 29]
// spread operator, permet de destructurer le tab et de le mettre à plat
console.log(arr2); // [4, 1, 2, 3, 12, 29]

const arr3: (number | string)[] = [1, "test", 2, "test2"];
for(let i = 0; i < arr3.length; i++) {
    const val = arr3[i];
    if(typeof val === "string") {
        arr3[i] = val + val;
    } else {
        arr3[i] = val! * 2; // l'opérateur ! permet d'enlever l'optionnel sur l'undefined mais si val est undefined alors ça crash
    }
}
console.log(arr3); // [2, "testtest", 4, "test2test2"]

// La methode splice permet de remplacer, supprimer, inserer ou ajouter dans un tableau
// Elle prend N parametres avec les deux premier obligatoire
// 1. Indice de départ de la suppression
// 2. Nombre d'élements à supprimer
// 3-N: Les elements de remplacement

// j'ai envie d'ajouter ESGI apres 4
// -> // [2, "testtest", 4, "ESGI", "test2test2"]
arr3.splice(3, 0, "ESGI");
console.log(arr3); // [2, "testtest", 4, "ESGI", "test2test2"]

// j'ai envie de supprimer testtest et 4
arr3.splice(1, 2);
console.log(arr3); // [2, "ESGI", "test2test2"]

console.log("3. functions");

// Déclaration en TS

// function NOM(param1: type1, param2: type2, ...): return_type {
//     CODE
//}

/**
 * Permet de faire la multiplication entre toutes les cases du tableau et de retourner ce resultat
 * arr: [2,3,2] ----> 2 * 3 * 2 = 12
 * @param arr Le tableau
 */
function arrayMultiply(arr: number[]): number {
    let res = 1;
    for (let i = 0; i < arr.length; i++) {
        res *= arr[i]!;
    }
    return res;
}

function arrayMultiplyMap(arr: number[]): number {
    let res = 1;
    for (let val of arr) {
        res *= val!;
    }
    return res;
}

const bigtab : number[] = [];
for(let i = 0; i < 100_000_000; i++) {
    bigtab.push(1);
}

let before = Date.now();
const res = arrayMultiply(bigtab);
console.log(res);
let end = Date.now();
console.log(end - before);

before = Date.now();
const res2 = arrayMultiplyMap(bigtab);
console.log(res2);
end = Date.now();
console.log(end - before);

