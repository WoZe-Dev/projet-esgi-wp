// readonly -> lecture seul, impossible a modifier apres le constructeur

export enum VehicleType {
    car,
    bike,
    motorbike,
    truck
}

export class Vehicle {
    constructor(public readonly id: string,
                public readonly model: string,
                public readonly brand: string,
                public readonly priceADay: number,
                public readonly type: VehicleType = VehicleType.car) {
    }
}
