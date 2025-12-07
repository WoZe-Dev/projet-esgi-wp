import {json, Request, Response, Router} from "express";
import {LessonService} from "../services";
import {StudentMark} from "../models";

export class LessonController {
    readonly lessonService: LessonService;

    constructor(lessonService: LessonService) {
        this.lessonService = lessonService;
    }

    async getAll(req: Request, res: Response) {
        const lessons = await this.lessonService.getLessons();
        res.json(lessons);
    }

    async search(req: Request, res: Response) {
        const lessonName = req.params.lesson_name as string;
        const firstName = req.query.firstName;
        const lastName = req.query.lastName;
        const allMarks = await this.lessonService.getStudentMarks(lessonName);
        const out: StudentMark[] = [];
        for(const mark of allMarks) {
            if(firstName === undefined || mark.firstName === firstName) {
                if(lastName === undefined || mark.lastName === lastName) {
                    out.push(mark);
                }
            }
        }
        res.json(out);
    }

    async create(req: Request, res: Response) {
        const lessonName = req.params.lesson_name as string;
        const studentMark = req.body as StudentMark;
        await this.lessonService.createStudentMark(lessonName, studentMark);
        res.status(201).end();
    }

    buildRouter(): Router {
        const router = Router();
        // .bind permet de conserver le this dans la fonction qui sera appelée par express
        // si on mets uniquement la reference de la fonction alors le this restera toujours
        // a undefined
        router.get("/", this.getAll.bind(this));
        router.get("/:lesson_name", this.search.bind(this));
        // il est obligatoire de mettre le middleware json() pour parser le body
        // de la requete entrante en JSON
        router.post("/:lesson_name", json(), this.create.bind(this));
        return router;
    }
}
