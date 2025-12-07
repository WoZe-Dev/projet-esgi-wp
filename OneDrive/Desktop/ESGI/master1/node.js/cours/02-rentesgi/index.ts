import {User} from "./user.class";
import {Vehicle, VehicleType} from "./vehicle.class";
import {Agency} from "./agency.class";
import {Address} from "./address.interface";

console.log("R3NTESG1");

const user1 = new User("1", "NAIRI", "Amin", "anairi@esgi.fr", "123456789");
const user2 = new User("2", "BRIATTE", "Benoit", "bbriatte@esgi.fr", "987654321");

const v1 = new Vehicle("1", "R1 GYTR", "YAMAHA", 60, VehicleType.motorbike);
const v2 = new Vehicle("2", "Y", "TESLA", 75, VehicleType.car);
const v3 = new Vehicle("3", "MASTER", "RENAULT", 80, VehicleType.truck);

const addr: Address = {
    street: "242 R DU FBG SAINT ANTOINE",
    zipCode: "75012",
    city: "PARIS"
}

const agency = new Agency("1", "ESGI", addr, [v1, v2, v3]);
const today = new Date();
const tomorrow = new Date(today.getTime() + 86_400_001);
let success = agency.rent(user1, v1, today, tomorrow);
console.log(success);

const todayBefore3Hours = new Date(today.getTime() - 3 * 3_600_000);
const tomorrowAfter3Hours = new Date(tomorrow.getTime() + 3 * 3_600_000);
success = agency.rent(user2, v1, todayBefore3Hours, tomorrowAfter3Hours);
console.log(success);

const rents = agency.getRents(v1);
for(let i = 0; i < rents.length; i++) {
    const rent = rents[i]!;
    console.log(rent.price());
}