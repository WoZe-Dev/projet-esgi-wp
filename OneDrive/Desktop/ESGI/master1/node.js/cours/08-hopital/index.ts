import express from 'express';
import { PatientController, DoctorController } from './controllers';
import { PatientService, DoctorService } from './services';

const app = express();


const patientService = new PatientService();
const doctorService = new DoctorService();

// ajout data
patientService.createPatient({
    name: 'Jean Dupont',
    age: 45,
    medicalHistory: ['Diabète']
});

patientService.createPatient({
    name: 'Marie Martin',
    age: 32,
    medicalHistory: ['Asthme']
});

patientService.createPatient({
    name: 'Pierre Durand',
    age: 67,
    medicalHistory: ['Arthrose','Hypertension']
});

doctorService.createDoctor({
    name: 'Dr. Sophie Bernard',
    specialty: 'Cardiologie',
    availability: true
});

doctorService.createDoctor({
    name: 'Dr. Marc Lefebvre',
    specialty: 'Médecine',
    availability: true
});

doctorService.createDoctor({
    name: 'Dr. Claire Dubois',
    specialty: 'Pneumologie',
    availability: false
});

// controllers
const patientController = new PatientController(patientService);
const doctorController = new DoctorController(doctorService);

// config les routes
app.use('/patients', patientController.buildRouter());
app.use('/doctors', doctorController.buildRouter());

const PORT = 3000;


app.listen(PORT, () => {
    console.log(`Serveur démarré sur http://localhost:${PORT}`);
});