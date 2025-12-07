import { Doctor } from '../models';

export class DoctorService {
    private doctors: Doctor[] = [];
    private nextId: number = 1;

    getAllDoctors(): Doctor[] {
        return this.doctors;
    }

    getDoctor(id: number): Doctor | undefined {
        return this.doctors.find(doctor => doctor.id === id);
    }

    createDoctor(doctorData: Omit<Doctor, 'id'>): Doctor {
        const newDoctor: Doctor = {
            id: this.nextId++,
            ...doctorData,
        };
        this.doctors.push(newDoctor);
        return newDoctor;
    }

    updateDoctor(id: number, updatedData: Partial<Omit<Doctor, 'id'>>): Doctor | undefined {
        const doctorIndex = this.doctors.findIndex(doctor => doctor.id === id);
        if (doctorIndex === -1) return undefined;

        const updatedDoctor = { ...this.doctors[doctorIndex], ...updatedData };
        this.doctors[doctorIndex] = updatedDoctor;
        return updatedDoctor;
    }

    deleteDoctor(id: number): boolean {
        const doctorIndex = this.doctors.findIndex(doctor => doctor.id === id);
        if (doctorIndex === -1) return false;

        this.doctors.splice(doctorIndex, 1);
        return true;
    }
}