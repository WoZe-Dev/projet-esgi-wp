export enum UserRole {
    admin,
    baron,
    watchman,
    wholesaler,
    seller,
    financial,
    customer
}

export interface User {
    _id: string;
    nickname: string;
    isActive: boolean;
    role: UserRole;
    password: string;
}