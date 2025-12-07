import {readdir, readFile, writeFile} from "node:fs/promises";
import {StudentMark} from "../models";

export class LessonService {
    constructor(readonly directoryPath: string) {
    }

    async getLessons(): Promise<string[]> {
        try {
            const files = await readdir(this.directoryPath);
            const out: string[] = [];
            for(const file of files) {
                if(file.endsWith(".marks")) {
                    // slice permet de récuperer une sous chaine
                    out.push(file.slice(0, -6));
                }
            }
            return out;
        } catch {
            return [];
        }
    }

    async getStudentMarks(lesson: string): Promise<StudentMark[]> {
        try {
            const data = await readFile(`${this.directoryPath}/${lesson}.marks`);
            // format dans le fichier
            // NOM|PRENOM|NOTE
            // NOM2|PRENOM2|NOTE2
            const str = data.toString('utf-8');
            const lines = str.split('\n');
            const out: StudentMark[] = [];
            for(const line of lines) {
                const parts = line.split('|');
                if(parts.length === 3) {
                    out.push({
                        firstName: parts[0]!, // ! permet d'enlever la validation du type undefined
                        lastName: parts[1]!,
                        mark: parseInt(parts[2]!)
                    });
                }
            }
            return out;
        } catch {
            return [];
        }
    }

    async createStudentMark(lesson: string, studentMark: StudentMark): Promise<void> {
        const studentMarks = await this.getStudentMarks(lesson);
        let markFound = false;
        for(const mark of studentMarks) {
            if(mark.firstName === studentMark.firstName &&
                mark.lastName === studentMark.lastName) {
                mark.mark = studentMark.mark; // changement de la note de l'étudiant
                markFound = true;
                break;
            }
        }
        if(!markFound) {
            studentMarks.push(studentMark); // ajoute de la nouvelle note dans le cas ou on n'a pas trouvé
                                            // l'étudiant
        }
        const lines: string[] = [];
        for(const mark of studentMarks) {
            lines.push(`${mark.firstName}|${mark.lastName}|${mark.mark}`);
        }
        await writeFile(`${this.directoryPath}/${lesson}.marks`, lines.join('\n'));
    }
}