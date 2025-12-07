import {config} from "dotenv";
import {openMongooseConnection} from "./services/utils";

// charge les variables d'env dans le fichier .env
config({quiet: true});

async function main() {
    const conn = await openMongooseConnection();
    console.log(conn);
}

// LANCE L'API / ! \
main().catch(console.error);