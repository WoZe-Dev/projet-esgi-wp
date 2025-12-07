import {Address} from "./address.interface";
import {Vehicle} from "./vehicle.class";
import {Rent} from "./rent.class";
import {User} from "./user.class";

export class Agency {

    private rents: Rent[];

    constructor(public readonly id: string,
                public readonly name: string,
                public readonly address: Address,
                public readonly vehicles: Vehicle[]) {
        this.rents = [];
    }

    rent(user: User, vehicle: Vehicle, startDate: Date, endDate: Date): boolean {
        const currentRents = this.getRentsBetweenDates(vehicle, startDate, endDate);
        if(currentRents.length > 0) {
            return false;
        }
        this.rents.push(
            new Rent(user, vehicle, startDate, endDate)
        )
        return true;
    }

    getRents(vehicle: Vehicle): Rent[] {
        const res: Rent[] = [];
        for(let i = 0; i < this.rents.length; i++) {
            const rent = this.rents[i]!;
            if(rent.vehicle.id === vehicle.id) {
                res.push(rent);
            }
        }
        return res;
    }

    getRentsBetweenDates(vehicle: Vehicle, startDate: Date, endDate: Date): Rent[] {
        const rentVehicle = this.getRents(vehicle);
        const res: Rent[] = [];
        for(let i = 0; i < rentVehicle.length; i++) {
            const rent = rentVehicle[i]!;
            if( (rent.startDate >= startDate && rent.startDate <= endDate) ||
                (rent.endDate >= startDate && rent.endDate <= endDate) ) {
                res.push(rent);
            }
        }
        return res;
    }
}