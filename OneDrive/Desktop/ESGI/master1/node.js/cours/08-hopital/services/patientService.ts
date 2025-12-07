import { Patient } from '../models';

export class PatientService {
    private patients: Patient[] = [];
    private nextId: number = 1;

    getAllPatients(): Patient[] {
        return this.patients;
    }

    getPatient(id: number): Patient | undefined {
        return this.patients.find(patient => patient.id === id);
    }

    createPatient(patientData: Omit<Patient, 'id'>): Patient {
        const newPatient: Patient = { 
            ...patientData, 
            id: this.nextId++ 
        };
        this.patients.push(newPatient);
        return newPatient;
    }

    updatePatient(id: number, updatedData: Partial<Patient>): Patient | undefined {
        const patientIndex = this.patients.findIndex(patient => patient.id === id);
        if (patientIndex === -1) return undefined;

        const updatedPatient = { ...this.patients[patientIndex], ...updatedData };
        this.patients[patientIndex] = updatedPatient;
        return updatedPatient;
    }

    deletePatient(id: number): boolean {
        const patientIndex = this.patients.findIndex(patient => patient.id === id);
        if (patientIndex === -1) return false;

        this.patients.splice(patientIndex, 1);
        return true;
    }
}