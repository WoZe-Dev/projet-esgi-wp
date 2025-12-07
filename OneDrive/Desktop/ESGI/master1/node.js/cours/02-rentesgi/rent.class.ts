import {User} from "./user.class";
import {Vehicle} from "./vehicle.class";

export class Rent {

    constructor(public readonly user: User,
                public readonly vehicle: Vehicle,
                public readonly startDate: Date,
                public readonly endDate: Date) {

    }

    public price(): number {
        const durationMS = this.endDate.getTime() - this.startDate.getTime();
        const durationDays = Math.ceil(durationMS / 86_400_000); // 2,12395 -> 3
        return this.vehicle.priceADay * durationDays;
    }
}
