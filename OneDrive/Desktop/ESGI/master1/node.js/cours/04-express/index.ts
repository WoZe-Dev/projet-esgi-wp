import express from 'express';
import {config} from "dotenv";
config(); // charger le fichier .env en variable d'environnement

const app = express();

// GET http://localhost:$PORT/ping
app.get('/ping', function(req,
                          res) {
    res.send('pong');
});

// GET http://localhost:$PORT/hello?lg=FR
app.get('/hello', function(req,
                          res) {
    const lang = req.query.lg;
    if(typeof lang !== 'string') {
        res.status(400).end(); // Change le status HTTP en 400
        return;
    }
    if(lang === 'FR') {
        res.send('Bonjour');
    } else if(lang === 'EN') {
        res.send('Hello');
    } else if(lang === 'ES') {
        res.send('Hola');
    } else if(lang === 'DE') {
        res.send('Hallo');
    } else {
        res.status(400).end();
    }
});

// GET http://localhost:$PORT/user/4567876543
app.get('/user/:userId', function(req,
                                  res){
    // req.params permet de récuperer un texte directement dans l'URL
    const id = req.params.userId;
    // res.json permet de repondre un objet en JSON
    res.json({id: id});
});

/**
 * Le middleware express.json() permet de parser le body de la requete HTTP en JSON
 * Puis de l'affecter dans le req.body
 */
app.post('/admin', express.json(), function(req, res) {
    if(req.body.user === process.env.ADMIN_USER &&
        req.body.pwd === process.env.ADMIN_PWD) {
        res.send('OK');
    } else {
        res.status(403).end();
    }
});

app.listen(process.env.PORT, function() {
    console.log(`listening on port ${process.env.PORT}...`);
});