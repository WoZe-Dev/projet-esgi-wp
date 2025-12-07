import express from 'express';
import {LessonController} from "./controllers";
import {LessonService} from "./services";

const app = express();

const lessonService = new LessonService("data");
const lessonController = new LessonController(lessonService);
app.use('/lesson', lessonController.buildRouter())

app.listen(3000, function() {
    console.log("listening on 3000...");
});