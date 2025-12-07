import { json, Request, Response, Router } from 'express';
import { PatientService } from '../services';

export class PatientController {
    readonly patientService: PatientService;

    constructor(patientService: PatientService) {
        this.patientService = patientService;
    }

    // GET /patients - Liste tous les patients
    getAll(req: Request, res: Response) {
        const patients = this.patientService.getAllPatients();
        res.status(200).json(patients);
    }

    // GET /patients/:id - Affiche un patient spécifique
    getById(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const patient = this.patientService.getPatient(id);
        if (!patient) {
            res.status(404).json({ error: 'Patient non trouvé' });
            return;
        }

        res.status(200).json(patient);
    }

    // POST /patients - Ajoute un patient
    create(req: Request, res: Response) {
        const { name, age, medicalHistory } = req.body;

        // Validation des données
        if (!name || typeof name !== 'string') {
            res.status(400).json({ error: 'Le nom est requis !' });
            return;
        }

        if (age === undefined || typeof age !== 'number' || age < 0) {
            res.status(400).json({ error: 'age requis et doit être un nombre positif ' });
            return;
        }

        if (!Array.isArray(medicalHistory)) {
            res.status(400).json({ error: 'les log médical doit être un tableau' });
            return;
        }

        const patient = this.patientService.createPatient({
            name,
            age,
            medicalHistory
        });

        res.status(201).json(patient);
    }

    // PUT /patients/:id - Met à jour un patient
    update(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const { name, age, medicalHistory } = req.body;

        // Validation des données
        if (name !== undefined && typeof name !== 'string') {
            res.status(400).json({ error: 'Le nom doit être une chaîne de caractères' });
            return;
        }

        if (age !== undefined && (typeof age !== 'number' || age < 0)) {
            res.status(400).json({ error: ' âge doit être positif' });
            return;
        }

        if (medicalHistory !== undefined && !Array.isArray(medicalHistory)) {
            res.status(400).json({ error: 'les log médical doit être un tableau' });
            return;
        }

        const patient = this.patientService.updatePatient(id, {
            name,
            age,
            medicalHistory
        });

        if (!patient) {
            res.status(404).json({ error: 'Patient non trouvé' });
            return;
        }

        res.status(200).json(patient);
    }

    // DELETE pour patients
    delete(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const deleted = this.patientService.deletePatient(id);
        if (!deleted) {
            res.status(404).json({ error: 'Patient non trouvé' });
            return;
        }

        res.status(200).json({ message: 'Patient supprimé avec succès' });
    }

    buildRouter(): Router {
        const router = Router();
        router.get('/', this.getAll.bind(this));
        router.get('/:id', this.getById.bind(this));
        router.post('/', json(), this.create.bind(this));
        router.put('/:id', json(), this.update.bind(this));
        router.delete('/:id', this.delete.bind(this));
        return router;
    }
}