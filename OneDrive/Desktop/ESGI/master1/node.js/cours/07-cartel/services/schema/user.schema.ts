import {Schema} from "mongoose";
import {User, UserRole} from "../../models";

export function getUserSchema(): Schema<User> {
    // new Schema
    // 1er parametre -> LA definition de la collection
    // 2eme parametre -> LES options
    return new Schema<User>({
        nickname: {
            type: String,
            required: true,
            unique: true // doublon impossible pour le nickname
        },
        password: {
            type: String,
            required: true
        },
        isActive: {
            type: Boolean,
            default: true
        },
        role: {
            type: Number,
            enum: Object.values(UserRole),
            required: true
        }
    }, {
        versionKey: false,
        collection: "user",
        timestamps: {
            updatedAt: true
        }
    });
}