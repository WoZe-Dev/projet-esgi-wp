import express from 'express';
import { PatientController, DoctorController } from './controllers';
import { PatientService, DoctorService } from './services';

const app = express();

// services
const patientService = new PatientService();
const doctorService = new DoctorService();

// controllers
const patientController = new PatientController(patientService);
const doctorController = new DoctorController(doctorService);

// config routes
app.use('/patients', patientController.buildRouter());
app.use('/doctors', doctorController.buildRouter());

export default app;