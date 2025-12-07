import { json, Request, Response, Router } from 'express';
import { DoctorService } from '../services';

export class DoctorController {
    readonly doctorService: DoctorService;

    constructor(doctorService: DoctorService) {
        this.doctorService = doctorService;
    }

    // GET pour doctors liste tous les médecins
    getAll(req: Request, res: Response) {
        const doctors = this.doctorService.getAllDoctors();
        res.status(200).json(doctors);
    }

    // GET doctore + medecins 
    getById(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const doctor = this.doctorService.getDoctor(id);
        if (!doctor) {
            res.status(404).json({ error: 'Médecin non trouvé' });
            return;
        }

        res.status(200).json(doctor);
    }

    // POST doctors Ajoute un médecin
    create(req: Request, res: Response) {
        const { name, specialty, availability } = req.body;

        
        if (!name || typeof name !== 'string') {
            res.status(400).json({ error: 'Le nom est requis' });
            return;
        }

        if (!specialty || typeof specialty !== 'string') {
            res.status(400).json({ error: 'La spécialité est requise ' });
            return;
        }

        const doctor = this.doctorService.createDoctor({
            name,
            specialty,
            availability: availability !== undefined ? availability : true
        });

        res.status(201).json(doctor);
    }

    // PUT doctors+id  mettre à jour un médecin
    update(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const { name, specialty, availability } = req.body;

        
        if (name !== undefined && typeof name !== 'string') {
            res.status(400).json({ error: 'Le nom doit être une chaîne de caractères' });
            return;
        }

        if (specialty !== undefined && typeof specialty !== 'string') {
            res.status(400).json({ error: 'La spécialité doit être une chaîne de caractères' });
            return;
        }

        const doctor = this.doctorService.updateDoctor(id, {
            name,
            specialty,
            availability
        });

        if (!doctor) {
            res.status(404).json({ error: 'Médecin non trouvé' });
            return;
        }

        res.status(200).json(doctor);
    }

    // DELETE doctors+id  
    delete(req: Request, res: Response) {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            res.status(400).json({ error: 'ID invalide' });
            return;
        }

        const deleted = this.doctorService.deleteDoctor(id);
        if (!deleted) {
            res.status(404).json({ error: 'Médecin non trouvé' });
            return;
        }

        res.status(200).json({ message: 'Médecin supprimé avec succès' });
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