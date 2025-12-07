export class User {
    constructor(public readonly id: string,
                public readonly lastname: string,
                public readonly firstname: string,
                public readonly email: string,
                public readonly licenseId: string) {
    }
}